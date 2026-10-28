<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Formation;
use App\Models\LessonProgress;
use App\Models\QuizAttempt;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LessonProgressController extends Controller
{
    public function update(
        Request $request,
        Formation $formation,
        Cours $cours
    ) {
        $validated = $request->validate([
            'completed' => ['required', 'boolean'],
        ]);

        $user = $request->user();

        // Vérifier que l'étudiant a accès à la formation.
        $hasAccess = $user->formations()
            ->where('formations.id', $formation->id)
            ->wherePivot('status', 'active')
            ->exists();

        abort_unless($hasAccess, 403, 'Accès à cette formation refusé.');

        // Vérifier que le cours appartient à la formation.
        $courseBelongsToFormation = $formation->cours()
            ->where('cours.id', $cours->id)
            ->exists();

        abort_unless($courseBelongsToFormation, 404, 'Cours introuvable dans cette formation.');

        // Enregistrer ou retirer la progression.
        DB::transaction(function () use ($validated, $user, $formation, $cours) {
            if ($validated['completed']) {
                LessonProgress::updateOrCreate(
                    [
                        'user_id'      => $user->id,
                        'formation_id' => $formation->id,
                        'cours_id'     => $cours->id,
                    ],
                    ['completed_at' => now()]
                );
            } else {
                LessonProgress::query()
                    ->where('user_id', $user->id)
                    ->where('formation_id', $formation->id)
                    ->where('cours_id', $cours->id)
                    ->delete();
            }
        });

        // Cours réels de la formation.
        $lessonIds = $formation->cours()
            ->pluck('cours.id')
            ->map(fn ($id) => (int) $id)
            ->values();

        $totalLessons = $lessonIds->count();

        // Cours réellement terminés (base de données).
        $completedIds = LessonProgress::query()
            ->where('user_id', $user->id)
            ->where('formation_id', $formation->id)
            ->whereIn('cours_id', $lessonIds)
            ->whereNotNull('completed_at')
            ->distinct()
            ->pluck('cours_id')
            ->map(fn ($id) => (int) $id)
            ->values();

        $completedCount = $completedIds->count();
        $certificateRequestPending = false;

        $allLessonsCompleted = $totalLessons > 0 && $completedCount >= $totalLessons;

        if ($allLessonsCompleted) {
            // Même règle que la page Learn : seuls les quiz qui contiennent
            // des questions comptent. Chaque quiz doit être réussi (>= 80 %).
            $quizzes = $formation->quizzes()
                ->withCount('questions')
                ->having('questions_count', '>', 0)
                ->get();

            $allQuizzesPassed = true;

            foreach ($quizzes as $quiz) {
                $passed = QuizAttempt::query()
                    ->where('user_id', $user->id)
                    ->where('quiz_id', $quiz->id)
                    ->where('passed', true)
                    ->where('percentage', '>=', 80)
                    ->exists();

                if (!$passed) {
                    $allQuizzesPassed = false;
                    break;
                }
            }

            // La demande est créée uniquement si toutes les conditions sont remplies.
            // L'activation du certificat reste manuelle (administrateur).
            if ($allQuizzesPassed) {
                $certificate = Certificate::firstOrCreate(
                    [
                        'user_id'      => $user->id,
                        'formation_id' => $formation->id,
                    ],
                    [
                        'certificate_number' => 'EEL-'
                            . $formation->id . '-'
                            . $user->id . '-'
                            . Str::upper(Str::random(8)),
                        'name_on_certificate' => $user->name,
                        'status'       => 'pending',
                        'issued_at'    => now(),
                        'activated_at' => null,
                    ]
                );

                $certificateRequestPending = $certificate->status === 'pending';
            }
        }

        return response()->json([
            'success'       => true,
            'completed'     => (bool) $validated['completed'],
            'completed_count' => $completedCount,
            'total_lessons'   => $totalLessons,
            'completed_ids'   => $completedIds,
            'progress_percentage' => $totalLessons > 0
                ? (int) round(($completedCount / $totalLessons) * 100)
                : 0,
            'all_lessons_completed'       => $allLessonsCompleted,
            'certificate_request_pending' => $certificateRequestPending,
            'message' => $validated['completed']
                ? 'Progression enregistrée.'
                : 'Progression mise à jour.',
        ]);
    }
}