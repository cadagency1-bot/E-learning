<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Formation;
use Illuminate\Http\Request;

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
            'question'        => 'required|string',
            'options'         => 'required|array|size:4',
            'options.*'       => 'required|string|max:255',
            'correct_option'  => 'required|integer|between:0,3',
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
    | ETUDIANT - Afficher le Quiz
    |--------------------------------------------------------------------------
    */

    public function show(Quiz $quiz)
    {
        $quiz->load([
            'formation',
            'questions.options'
        ]);

        return view('quiz.show', compact('quiz'));
    }


    /*
    |--------------------------------------------------------------------------
    | ETUDIANT - Envoyer les réponses
    |--------------------------------------------------------------------------
    */

    public function submit(Request $request, Quiz $quiz)
    {
        /*
        |--------------------------------------------------------------------------
        | Récupérer les questions du Quiz
        |--------------------------------------------------------------------------
        */

        $quiz->load('questions.options');

        $answers = $request->input('answers', []);

        $score = 0;

        $total = $quiz->questions->count();


        /*
        |--------------------------------------------------------------------------
        | Vérifier chaque réponse
        |--------------------------------------------------------------------------
        */

        foreach ($quiz->questions as $question) {

            // Réponse choisie par l'étudiant
            $selectedOptionId = $answers[$question->id] ?? null;

            if (!$selectedOptionId) {
                continue;
            }

            // Chercher l'option correcte
            $correctOption = $question->options
                ->where('is_correct', true)
                ->first();

            if (
                $correctOption &&
                (int) $selectedOptionId === (int) $correctOption->id
            ) {
                $score++;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Afficher la page résultat
        |--------------------------------------------------------------------------
        */

        return view('quiz.result', [
            'quiz'  => $quiz,
            'score' => $score,
            'total' => $total,
        ]);
    }
}

