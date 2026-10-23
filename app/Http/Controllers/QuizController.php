<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Formation;
use App\Models\QuizAttempt;
use App\Models\Certificate;
use App\Models\LessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - Liste des Quiz
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $quizzes = Quiz::with('formation', 'questions')
            ->latest()
            ->get();

        return view('admin.quiz.index', compact('quizzes'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - Créer un Quiz
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $formations = Formation::orderBy('name')->get();

        return view('admin.quiz.create', compact('formations'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - Enregistrer un Quiz
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
        ]);

        Quiz::create($validated);

        return redirect()
            ->route('admin.quiz.index')
            ->with('success', 'Quiz créé avec succès.');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - Ajouter une question
    |--------------------------------------------------------------------------
    */

    public function createQuestion(Quiz $quiz)
    {
        return view('admin.quiz.question', compact('quiz'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - Enregistrer une question
    |--------------------------------------------------------------------------
    */

    public function storeQuestion(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'question'       => 'required|string',
            'options'        => 'required|array|size:4',
            'options.*'      => 'required|string|max:255',
            'correct_option' => 'required|integer|between:0,3',
        ]);

        $question = $quiz->questions()->create([
            'question' => $validated['question'],
        ]);

        foreach ($validated['options'] as $index => $optionText) {
            $question->options()->create([
                'option'     => $optionText,
                'is_correct' => $index == $validated['correct_option'],
            ]);
        }

        return redirect()
            ->route('admin.quiz.index')
            ->with('success', 'Question ajoutée avec succès.');
    }

    /*
    |--------------------------------------------------------------------------
    | ETUDIANT - Vérifier l'accès à la formation
    |--------------------------------------------------------------------------
    */

    private function verifyStudentAccess(Request $request, Quiz $quiz): void
    {
        $user = $request->user();

        abort_unless(
            $user,
            403,
            'Vous devez vous connecter pour accéder au quiz.'
        );

        $hasAccess = $user->formations()
            ->where('formations.id', $quiz->formation_id)
            ->wherePivot('status', 'active')
            ->exists();

        abort_unless(
            $hasAccess,
            403,
            'Vous n’avez pas accès à cette formation.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ETUDIANT - Afficher le Quiz
    |--------------------------------------------------------------------------
    */

    public function show(Request $request, Quiz $quiz)
    {
        $this->verifyStudentAccess($request, $quiz);

        $quiz->load([
            'formation',
            'questions.options',
        ]);

        return view('quiz.show', compact('quiz'));
    }

    /*
    |--------------------------------------------------------------------------
    | CERTIFICAT - Vérifier les conditions de réussite
    |--------------------------------------------------------------------------
    */

    private function requestCertificateIfEligible($user, Formation $formation): bool
    {
        // Vérifier que la formation contient des cours.
        $lessonIds = $formation->cours()->pluck('cours.id');

        if ($lessonIds->isEmpty()) {
            return false;
        }

        // Vérifier que tous les cours sont terminés.
        $completedCount = LessonProgress::query()
            ->where('user_id', $user->id)
            ->where('formation_id', $formation->id)
            ->whereIn('cours_id', $lessonIds)
            ->whereNotNull('completed_at')
            ->distinct()
            ->count('cours_id');

        if ($completedCount < $lessonIds->count()) {
            return false;
        }

        // Vérifier que tous les quiz possèdent des questions
        // et que l'étudiant a réussi chaque quiz avec au moins 80 %.
        $quizzes = $formation->quizzes()
            ->withCount('questions')
            ->get();

        foreach ($quizzes as $quiz) {
            if ($quiz->questions_count === 0) {
                return false;
            }

            $passed = QuizAttempt::query()
                ->where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->where('passed', true)
                ->where('percentage', '>=', 80)
                ->exists();

            if (!$passed) {
                return false;
            }
        }

        // Ne jamais remplacer ou désactiver une demande existante.
        $certificate = Certificate::firstOrCreate(
            [
                'user_id'     => $user->id,
                'formation_id' => $formation->id,
            ],
            [
                'certificate_number' => 'EEL-'
                    . $formation->id . '-'
                    . $user->id . '-'
                    . Str::upper(Str::random(8)),

                'name_on_certificate' => $user->name,
                'status'              => 'pending',
                'issued_at'           => now(),
                'activated_at'        => null,
            ]
        );

        // Retourner true si la demande existe et attend l'Admin.
        return $certificate->status === 'pending';
    }

    /*
    |--------------------------------------------------------------------------
    | ETUDIANT - Enregistrer les réponses et le résultat
    |--------------------------------------------------------------------------
    */

    public function submit(Request $request, Quiz $quiz)
    {
        $this->verifyStudentAccess($request, $quiz);

        $request->validate([
            'answers'   => ['nullable', 'array'],
            'answers.*' => ['nullable', 'integer'],
        ]);

        $quiz->load('questions.options');

        $answers = $request->input('answers', []);

        $score = 0;
        $total = $quiz->questions->count();

        /*
        |--------------------------------------------------------------------------
        | Calculer le score
        |--------------------------------------------------------------------------
        */

        foreach ($quiz->questions as $question) {
            $selectedOptionId = $answers[$question->id] ?? null;

            if (!$selectedOptionId) {
                continue;
            }

            $selectedOption = $question->options->firstWhere(
                'id',
                (int) $selectedOptionId
            );

            if ($selectedOption && $selectedOption->is_correct) {
                $score++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Calculer le pourcentage et déterminer la réussite
        |--------------------------------------------------------------------------
        */

        $percentage = $total > 0
            ? (int) round(($score / $total) * 100)
            : 0;

        $passed = $total > 0 && $percentage >= 80;

        /*
        |--------------------------------------------------------------------------
        | Enregistrer la tentative
        |--------------------------------------------------------------------------
        */

        $attempt = QuizAttempt::create([
            'user_id'         => $request->user()->id,
            'quiz_id'         => $quiz->id,
            'score'           => $score,
            'total_questions' => $total,
            'percentage'      => $percentage,
            'passed'          => $passed,
            'attempted_at'    => now(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Vérifier si une demande de certificat peut être créée
        |--------------------------------------------------------------------------
        */

        $certificateRequestPending = false;

        if ($passed) {
            $formation = Formation::findOrFail($quiz->formation_id);

            $certificateRequestPending = $this->requestCertificateIfEligible(
                $request->user(),
                $formation
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Afficher la page de résultat existante
        |--------------------------------------------------------------------------
        */

        return view('quiz.result', [
            'quiz'                       => $quiz,
            'score'                      => $score,
            'total'                      => $total,
            'answers'                    => $answers,
            'percentage'                 => $percentage,
            'passed'                     => $passed,
            'attempt'                    => $attempt,
            'certificateRequestPending'  => $certificateRequestPending,
        ]);
    }
}
