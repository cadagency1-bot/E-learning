<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Afficher toutes les formations
     */
    public function index(): View
    {
        $formations = Formation::latest()->get();

        return view('admin.formations.index', compact('formations'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create(): View
    {
        return view('admin.formations.create');
    }

    /**
     * Enregistrer une nouvelle formation
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'category' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],

        'courses' => ['nullable', 'array'],
        'courses.*.title' => ['nullable', 'string', 'max:255'],
        'courses.*.description' => ['nullable', 'string'],
        'courses.*.content' => ['nullable', 'string'],
        'courses.*.pdf' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
    ]);

    $uploadedFiles = [];

    try {
        DB::transaction(function () use ($request, $validated, &$uploadedFiles) {

            // 1. Création de la formation
            $formation = Formation::create([
                'name' => $validated['name'],
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
            ]);

            // 2. Création des cours liés à cette formation
            foreach ($request->input('courses', []) as $index => $courseData) {

                $title = trim($courseData['title'] ?? '');
                $description = trim($courseData['description'] ?? '');
                $content = trim($courseData['content'] ?? '');

                $pdf = $request->file("courses.$index.pdf");

                // Ignorer les lignes de cours laissées entièrement vides
                if ($title === '' && $description === '' && $content === '' && !$pdf) {
                    continue;
                }

                // Un cours renseigné doit avoir un titre
                if ($title === '') {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        "courses.$index.title" => 'Veuillez donner un titre à chaque cours renseigné.',
                    ]);
                }

                $filePath = null;

                if ($pdf) {
                    $filePath = $pdf->store('cours', 'public');
                    $uploadedFiles[] = $filePath;
                }

                $formation->cours()->create([
                    'title' => $title,
                    'description' => $description !== '' ? $description : null,
                    'content' => $content !== '' ? $content : null,
                    'file_path' => $filePath,
                    'order' => $index + 1,
                ]);
            }
        });
    } catch (\Throwable $e) {
        // Nettoyer les fichiers enregistrés si la transaction échoue
        foreach ($uploadedFiles as $file) {
            Storage::disk('public')->delete($file);
        }

        throw $e;
    }

    return redirect()
        ->route('admin.formations.index')
        ->with('success', 'La formation et ses cours ont été ajoutés avec succès.');
}
    /**
     * Afficher une formation
     */
    public function show(Formation $formation): View
    {
        return view('admin.formations.show', compact('formation'));
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(Formation $formation): View
    {
        return view('admin.formations.edit', compact('formation'));
    }

    /**
     * Modifier une formation
     */
    public function update(
        Request $request,
        Formation $formation
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);

        $formation->update($validated);

        return redirect()
            ->route('admin.formations.index')
            ->with(
                'success',
                'La formation a été modifiée avec succès.'
            );
    }

    /**
     * Supprimer une formation
     */
    public function destroy(Formation $formation): RedirectResponse
    {
        $formation->delete();

        return redirect()
            ->route('admin.formations.index')
            ->with(
                'success',
                'La formation a été supprimée avec succès.'
            );
    }
}

