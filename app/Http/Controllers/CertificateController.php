<?php

namespace App\Http\Controllers;

use App\Notifications\CertificateActivated;
use App\Models\Certificate;
use App\Models\Formation;
use App\Models\LessonProgress;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    /**
     * Vérifier si l'étudiant a terminé tous les cours
     * et réussi tous les quiz de la formation.
     */
    private function checkEligibility($user, Formation $formation): array
    {
        $lessonIds = $formation->cours()->pluck('cours.id');

        if ($lessonIds->isEmpty()) {
            return [
                'eligible' => false,
                'message' => 'Cette formation ne contient aucun cours.',
            ];
        }

        $completedCount = LessonProgress::query()
            ->where('user_id', $user->id)
            ->where('formation_id', $formation->id)
            ->whereIn('cours_id', $lessonIds)
            ->whereNotNull('completed_at')
            ->distinct()
            ->count('cours_id');

        if ($completedCount < $lessonIds->count()) {
            return [
                'eligible' => false,
                'message' => 'Vous devez terminer tous les cours avant d’obtenir le certificat.',
            ];
        }

        $quizzes = $formation->quizzes()
            ->withCount('questions')
            ->get();

        foreach ($quizzes as $quiz) {
            if ($quiz->questions_count === 0) {
                return [
                    'eligible' => false,
                    'message' => 'Certains quiz ne contiennent aucune question.',
                ];
            }

            $passed = QuizAttempt::query()
                ->where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->where('passed', true)
                ->where('percentage', '>=', 80)
                ->exists();

            if (!$passed) {
                return [
                    'eligible' => false,
                    'message' => 'Vous devez réussir tous les quiz avec au moins 80 % avant d’obtenir le certificat.',
                ];
            }
        }

        return [
            'eligible' => true,
            'message' => 'Toutes les conditions sont remplies.',
        ];
    }

    /**
     * Créer la demande de certificat (statut « pending »)
     * uniquement si toutes les conditions sont validées côté serveur.
     * Répond en JSON pour les requêtes AJAX, sinon par une redirection.
     */
    public function issue(Request $request, Formation $formation)
    {
        $validated = $request->validate([
            'name_on_certificate' => [
                'required',
                'string',
                'min:2',
                'max:150',
            ],
        ]);

        $user = $request->user();

        $hasAccess = $user->formations()
            ->where('formations.id', $formation->id)
            ->wherePivot('status', 'active')
            ->exists();

        abort_unless(
            $hasAccess,
            403,
            'Vous n’avez pas accès à cette formation.'
        );

        $eligibility = $this->checkEligibility($user, $formation);

        if (!$eligibility['eligible']) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $eligibility['message'],
                ], 422);
            }

            return redirect()->back()
                ->withFragment('certificat')
                ->withInput()
                ->with('error', $eligibility['message']);
        }

        $certificate = DB::transaction(function () use (
            $user,
            $formation,
            $validated
        ) {
            $existing = Certificate::query()
                ->where('user_id', $user->id)
                ->where('formation_id', $formation->id)
                ->lockForUpdate()
                ->first();

            if ($existing) {
                // Une ancienne demande refusée peut être renvoyée.
                if ($existing->status === 'rejected') {
                    $existing->update([
                        'name_on_certificate' => trim($validated['name_on_certificate']),
                        'status' => 'pending',
                        'activated_at' => null,
                    ]);
                }

                return $existing;
            }

            return Certificate::create([
                'user_id' => $user->id,
                'formation_id' => $formation->id,
                'certificate_number' => 'EEL-'
                    . $formation->id . '-'
                    . $user->id . '-'
                    . Str::upper(Str::random(8)),
                'name_on_certificate' => trim(
                    $validated['name_on_certificate']
                ),
                'status' => 'pending',
                'issued_at' => now(),
                'activated_at' => null,
            ]);
        });

        $message = 'Votre demande a été envoyée à l’administration.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'certificate' => [
                    'number' => $certificate->certificate_number,
                    'name' => $certificate->name_on_certificate,
                    'formation' => $formation->name,
                    'status' => $certificate->status,
                    'issued_at' => optional($certificate->issued_at)->format('d/m/Y'),
                ],
            ]);
        }

        return redirect()->back()
            ->withFragment('certificat')
            ->with('certificate_message', $message);
    }

    public function activateCertificate($id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->status = 'active';
        $certificate->activated_at = now();
        $certificate->save();

        $certificate->user->notify(
            new CertificateActivated($certificate)
        );

        return redirect()->back()->with(
            'success',
            'Le certificat a été activé avec succès !'
        );
    }
}