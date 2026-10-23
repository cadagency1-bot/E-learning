<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        'courses.*.video' => ['nullable', 'file', 'mimes:mp4,mov,webm,m4v', 'max:102400'],
        'courses.*.video2' => ['nullable', 'file', 'mimes:mp4,mov,webm,m4v', 'max:102400'],
    ]);

    $uploadedFiles = [];

    try {
        DB::transaction(function () use ($request, $validated, &$uploadedFiles) {
            $formation = Formation::create([
                'name' => $validated['name'],
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
            ]);

            foreach ($request->input('courses', []) as $index => $courseData) {
                $title = trim($courseData['title'] ?? '');
                $description = trim($courseData['description'] ?? '');
                $content = trim($courseData['content'] ?? '');

                $pdf = $request->file("courses.$index.pdf");
                $video = $request->file("courses.$index.video");
                $video2 = $request->file("courses.$index.video2");

                if (
                    $title === '' &&
                    $description === '' &&
                    $content === '' &&
                    !$pdf && !$video && !$video2
                ) {
                    continue;
                }

                if ($title === '') {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        "courses.$index.title" => 'Veuillez donner un titre à chaque cours renseigné.',
                    ]);
                }

                $filePath = null;
                $videoPath = null;
                $video2Path = null;

                if ($pdf) {
                    $filePath = $pdf->store('cours', 'public');
                    $uploadedFiles[] = $filePath;
                }

                if ($video) {
                    $videoPath = $video->store('cours/videos', 'public');
                    $uploadedFiles[] = $videoPath;
                }

                if ($video2) {
                    $video2Path = $video2->store('cours/videos', 'public');
                    $uploadedFiles[] = $video2Path;
                }

                $formation->cours()->create([
                    'title' => $title,
                    'description' => $description !== '' ? $description : null,
                    'content' => $content !== '' ? $content : null,
                    'file_path' => $filePath,
                    'video_path' => $videoPath,
                    'video2_path' => $video2Path,
                    'order' => $index + 1,
                ]);
            }
        });
    } catch (\Throwable $e) {
        foreach ($uploadedFiles as $file) {
            Storage::disk('public')->delete($file);
        }

        throw $e;
    }

    return redirect()
        ->route('admin.formations.index')
        ->with('success', 'La formation et ses cours ont été ajoutés avec succès.');
}

    
    
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

