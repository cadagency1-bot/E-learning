<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonMediaController extends Controller
{
    /**
     * Sert une vidéo ou un PDF d'une leçon, uniquement aux étudiants
     * ayant un accès actif à la formation. La lecture partielle (Range)
     * est gérée par Laravel/Symfony : l'avance rapide de la vidéo fonctionne.
     */
    public function show(Request $request, Formation $formation, Cours $cours, string $type)
    {
        $hasAccess = $request->user()->formations()
            ->where('formations.id', $formation->id)
            ->wherePivot('status', 'active')
            ->exists();

        abort_unless($hasAccess, 403, 'Accès à cette formation refusé.');

        abort_unless(
            $formation->cours()->where('cours.id', $cours->id)->exists(),
            404,
            'Cours introuvable dans cette formation.'
        );

        $path = match ($type) {
            'video'  => $cours->video_path,
            'video2' => $cours->video2_path,
            'file'   => $cours->file_path,
            default  => null,
        };

        abort_if(empty($path), 404);

        $disk = Storage::disk('public');
        abort_unless($disk->exists($path), 404, 'Fichier introuvable.');

        $fullPath = $disk->path($path);

        if ($request->boolean('download')) {
            return response()->download($fullPath, basename($path));
        }

        return response()->file($fullPath, [
            'Cache-Control' => 'private, max-age=3600',
        ]);
    }
}