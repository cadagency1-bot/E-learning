<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\LessonProgress;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LearnController extends Controller
{
    public function show(Request $request, Formation $formation)
    {
        $user = $request->user();

        // Accès : uniquement les étudiants dont l'inscription à cette formation est active.
        $hasAccess = $user->formations()
            ->where('formations.id', $formation->id)
            ->wherePivot('status', 'active')
            ->exists();

        abort_unless($hasAccess, 403, 'Vous n’avez pas accès à cette formation.');

        $disk = Storage::disk('public');

        // ---------- Leçons (uniquement des données réelles) ----------
        $lessons = $formation->cours()->orderBy('order')->get()->values()
            ->map(function ($c, $i) use ($formation, $disk) {
                $attrs = $c->getAttributes();
                $media = fn (string $type) => route('formations.cours.media', [
                    'formation' => $formation->id,
                    'cours'     => $c->id,
                    'type'      => $type,
                ]);

                $has1 = !empty($c->video_path) && $disk->exists($c->video_path);
                $has2 = !empty($c->video2_path) && $disk->exists($c->video2_path);
                $hasPdf = !empty($c->file_path) && $disk->exists($c->file_path);
                $content = trim((string) ($c->content ?? ''));

                return [
                    'id'          => (int) $c->id,
                    'index'       => $i,
                    'title'       => $c->title ?? $c->name ?? 'Leçon ' . ($i + 1),
                    'description' => trim((string) ($c->description ?? '')),
                    // Markdown simple, HTML brut échappé : sûr avec {!! !!}
                    'content_html' => $content !== '' ? Str::markdown($content, [
                        'html_input'         => 'escape',
                        'allow_unsafe_links' => false,
                        'renderer'           => ['soft_break' => "<br>\n"],
                    ]) : null,
                    'duration'    => $attrs['duration'] ?? $attrs['video_duration'] ?? null,
                    'has_v1'      => $has1,
                    'has_v2'      => $has2,
                    'has_pdf'     => $hasPdf,
                    'has_text'    => $content !== '',
                    'v1_url'      => $has1 ? $media('video') : null,
                    'v2_url'      => $has2 ? $media('video2') : null,
                    'pdf_view'    => $hasPdf ? $media('file') : null,
                    'pdf_dl'      => $hasPdf ? $media('file') . '?download=1' : null,
                    'pdf_name'    => $hasPdf ? basename($c->file_path) : null,
                ];
            });

        $lessonIds = $lessons->pluck('id');
        $lessonCount = $lessons->count();

        // ---------- Progression réelle (base de données) ----------
        $completedIds = LessonProgress::query()
            ->where('user_id', $user->id)
            ->where('formation_id', $formation->id)
            ->whereIn('cours_id', $lessonIds)
            ->whereNotNull('completed_at')
            ->distinct()
            ->pluck('cours_id')
            ->map(fn ($id) => (int) $id)
            ->values()
            ->all();

        // ---------- Quiz : état réel de l'étudiant ----------
        $quizModels = $formation->quizzes()->withCount('questions')->get();

        $attempts = QuizAttempt::query()
            ->where('user_id', $user->id)
            ->whereIn('quiz_id', $quizModels->pluck('id'))
            ->get()
            ->groupBy('quiz_id');

        $quizzes = $quizModels->map(function ($q) use ($attempts) {
            $list = $attempts->get($q->id, collect());
            $best = $list->max('percentage');
            $passed = $list->contains(fn ($a) => $a->passed && $a->percentage >= 80);

            return [
                'id'          => (int) $q->id,
                'title'       => $q->title ?? $q->name ?? 'Quiz',
                'description' => trim((string) ($q->description ?? '')),
                'questions'   => (int) $q->questions_count,
                'attempts'    => $list->count(),
                'best'        => $best !== null ? (int) round($best) : null,
                'passed'      => $passed,
                'url'         => url('/quiz/' . $q->id),
            ];
        })->values();

        // Seuls les quiz qui contiennent des questions comptent pour le certificat.
        $quizIds = $quizzes->where('questions', '>', 0)->pluck('id')->values()->all();
        $passedIds = $quizzes->where('passed', true)->where('questions', '>', 0)->pluck('id')->values()->all();

        // ---------- Certificat (logique inchangée) ----------
        $cert = method_exists($user, 'certificates')
            ? $user->certificates()->where('formation_id', $formation->id)->first()
            : null;

        $certStatus = $cert
            ? (in_array($cert->status, ['active', 'approved']) ? 'active' : ($cert->status ?? 'none'))
            : 'none';

        $studentName = $user->name ?? '';

        // ---------- Photo de profil ----------
        $profilePhotoUrl = null;
        $userAttributes = $user->getAttributes();
        foreach (['profile_photo_path', 'profile_photo', 'profile_image', 'avatar', 'photo', 'image'] as $field) {
            if (!empty($userAttributes[$field])) {
                $p = $userAttributes[$field];
                $profilePhotoUrl = preg_match('/^https?:\/\//i', $p)
                    ? $p
                    : asset(str_starts_with($p, 'storage/') ? $p : 'storage/' . ltrim($p, '/'));
                break;
            }
        }

        $fAttrs = $formation->getAttributes();

        $navProfile = Route::has('profile.edit') ? route('profile.edit') : route('dashboard');

        return view('formations.learn', [
            'formation'       => $formation,
            'lessons'         => $lessons,
            'lessonCount'     => $lessonCount,
            'videoCount'      => $lessons->sum(fn ($l) => (int) $l['has_v1'] + (int) $l['has_v2']),
            'pdfCount'        => $lessons->where('has_pdf', true)->count(),
            'quizzes'         => $quizzes,
            'quizIds'         => $quizIds,
            'passedIds'       => $passedIds,
            'completedIds'    => $completedIds,
            'studentName'     => $studentName,
            'initial'         => $studentName !== '' ? mb_strtoupper(mb_substr($studentName, 0, 1)) : 'É',
            'profilePhotoUrl' => $profilePhotoUrl,
            'certStatus'      => $certStatus,
            'certDate'        => ($certStatus === 'active' && $cert)
                ? optional($cert->activated_at ?? $cert->updated_at)->toIso8601String() : null,
            'certCode'        => $cert->certificate_number ?? null,
            'certName'        => $cert->name_on_certificate ?? $studentName,
            'certRoute'       => Route::has('certificates.issue') ? route('certificates.issue', $formation) : null,
            'eligibleServer'  => $lessonCount > 0
                && count($completedIds) >= $lessonCount
                && count(array_diff($quizIds, $passedIds)) === 0,
            'progressUrl'     => Route::has('lesson-progress.update')
                ? route('lesson-progress.update', ['formation' => $formation->id, 'cours' => '__COURS_ID__'])
                : null,
            'fDescription'    => array_key_exists('description', $fAttrs) ? trim((string) $formation->description) : '',
            'fDuration'       => array_key_exists('duration', $fAttrs) ? $formation->duration : null,
            'fLevel'          => array_key_exists('level', $fAttrs) ? $formation->level : null,
            'navFormations'   => Route::has('formations.index') ? route('formations.index') : route('dashboard'),
            'navProfile'      => $navProfile,
            'navSettings'     => Route::has('settings') ? route('settings') : $navProfile,
            'supportMail'     => config('mail.from.address'),
        ]);
    }
}
