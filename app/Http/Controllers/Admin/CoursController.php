<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Formation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CoursController extends Controller
{
    /**
     * Afficher tous les cours
     */
    public function index(): View
    {
        $cours = Cours::with('formation')
            ->orderBy('order')
            ->latest()
            ->get();

        return view('admin.cours.index', compact('cours'));
    }

    /**
     * Page d'ajout
     */
    public function create(): View
    {
        $formations = Formation::orderBy('name')->get();

        return view('admin.cours.create', compact('formations'));
    }

    /**
     * Ajouter un cours avec PDF et deux vidéos
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',

            'file' => 'nullable|file|mimes:pdf|max:10240',

            'video' => 'nullable|file|mimes:mp4,mov,webm,m4v|max:102400',
            'video2' => 'nullable|file|mimes:mp4,mov,webm,m4v|max:102400',

            'video_url' => 'nullable|url|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Enregistrer le PDF
        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')
                ->store('cours', 'public');
        }

        // Enregistrer la première vidéo
        $videoPath = null;

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')
                ->store('cours/videos', 'public');
        }

        // Enregistrer la deuxième vidéo
        $video2Path = null;

        if ($request->hasFile('video2')) {
            $video2Path = $request->file('video2')
                ->store('cours/videos', 'public');
        }

        // Créer le cours
        Cours::create([
            'formation_id' => $validated['formation_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'content' => $validated['content'] ?? null,
            'file_path' => $filePath,
            'video_path' => $videoPath,
            'video2_path' => $video2Path,
            'video_url' => $validated['video_url'] ?? null,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.cours.index')
            ->with('success', 'Le cours a été ajouté avec succès.');
    }

    /**
     * Afficher un cours
     */
    
public function show(Cours $cour): RedirectResponse
{
    return redirect()
        ->route('admin.cours.index');
}


    /**
     * Page de modification
     */
    public function edit($id): View
    {
        $cours = Cours::findOrFail($id);
        $formations = Formation::orderBy('name')->get();

        return view('admin.cours.edit', compact('cours', 'formations'));
    }

    /**
     * Modifier un cours, son PDF et ses deux vidéos
     */
    public function update(
        Request $request,
        Cours $cour
    ): RedirectResponse {
        $validated = $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',

            'file' => 'nullable|file|mimes:pdf|max:10240',

            'video' => 'nullable|file|mimes:mp4,mov,webm,m4v|max:102400',
            'video2' => 'nullable|file|mimes:mp4,mov,webm,m4v|max:102400',

            'video_url' => 'nullable|url|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Remplacer le PDF seulement si un nouveau fichier est envoyé
        if ($request->hasFile('file')) {
            if ($cour->file_path) {
                Storage::disk('public')->delete($cour->file_path);
            }

            $validated['file_path'] = $request->file('file')
                ->store('cours', 'public');
        }

        // Remplacer la première vidéo seulement si nécessaire
        if ($request->hasFile('video')) {
            if ($cour->video_path) {
                Storage::disk('public')->delete($cour->video_path);
            }

            $validated['video_path'] = $request->file('video')
                ->store('cours/videos', 'public');
        }

        // Remplacer la deuxième vidéo seulement si nécessaire
        if ($request->hasFile('video2')) {
            if ($cour->video2_path) {
                Storage::disk('public')->delete($cour->video2_path);
            }

            $validated['video2_path'] = $request->file('video2')
                ->store('cours/videos', 'public');
        }

        // Ne pas envoyer les objets fichiers à update()
        unset(
            $validated['file'],
            $validated['video'],
            $validated['video2']
        );

        // Conserver les vidéos existantes si aucun nouveau fichier n'est envoyé
        $cour->update($validated);

        return redirect()
            ->route('admin.cours.index')
            ->with('success', 'Le cours a été modifié avec succès.');
    }


    
/**
 * Supprimer un cours et ses fichiers
 */
public function destroy(Cours $cour): RedirectResponse
{
    // Récupérer les chemins des fichiers avant suppression
    $files = array_unique(array_filter([
        $cour->file_path,
        $cour->video_path,
        $cour->video2_path,
    ]));

    // Supprimer le cours de la base de données
    $cour->delete();

    // Supprimer le PDF et les deux vidéos
    foreach ($files as $file) {
        Storage::disk('public')->delete($file);
    }

    return redirect()
        ->route('admin.cours.index')
        ->with('success', 'Le cours a été supprimé avec succès.');
}

public function deleteMedia(\App\Models\Cours $cour, string $type)
{
    $fields = [
        'pdf' => 'file_path',
        'video1' => 'video_path',
        'video2' => 'video2_path',
    ];

    if (!array_key_exists($type, $fields)) {
        abort(404);
    }

    $field = $fields[$type];
    $path = $cour->{$field};

    if (!$path) {
        return back()->with('error', 'Ce fichier n’existe pas.');
    }

    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($path);
    }

    $cour->{$field} = null;
    $cour->save();

    return back()->with('success', 'Le fichier a été supprimé avec succès.');
}
    
}