<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Afficher la page du profil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Modifier les informations du profil.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Ajouter ou remplacer la photo de profil.
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_photo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'profile_photo.required' => 'Veuillez choisir une photo.',
            'profile_photo.image'    => 'Le fichier doit être une image.',
            'profile_photo.mimes'    => 'La photo doit être au format JPG, JPEG, PNG ou WEBP.',
            'profile_photo.max'      => 'La photo ne doit pas dépasser 2 Mo.',
            'profile_photo.uploaded' => 'Le téléversement a échoué. Vérifiez la taille de l’image (2 Mo maximum).',
        ]);

        $user = $request->user();

        if (!$request->hasFile('profile_photo')) {
            return back()->withErrors([
                'profile_photo' => 'Aucune image reçue, veuillez réessayer.',
            ]);
        }

        // Enregistrer la nouvelle photo dans storage/app/public/profile-photos.
        $path = $request->file('profile_photo')->store(
            'profile-photos',
            'public'
        );

        if (!$path) {
            return back()->withErrors([
                'profile_photo' => 'Erreur lors de l’enregistrement de la photo. Veuillez réessayer.',
            ]);
        }

        // Garder le chemin de l'ancienne photo.
        $oldPath = $user->profile_photo_path;

        // Enregistrer le chemin de la nouvelle photo dans la base de données.
        $user->profile_photo_path = $path;
        $user->save();

        // Supprimer l'ancienne photo après l'enregistrement de la nouvelle.
        if ($oldPath && $oldPath !== $path) {
            Storage::disk('public')->delete($oldPath);
        }

        return redirect()
            ->route('profile.edit')
            ->with('status', 'photo-updated');
    }

    /**
     * Supprimer la photo de profil.
     */
    public function destroyPhoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        $oldPath = $user->profile_photo_path;

        $user->profile_photo_path = null;
        $user->save();

        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        return redirect()
            ->route('profile.edit')
            ->with('status', 'photo-deleted');
    }

    /**
     * Supprimer le compte utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Supprimer la photo associée au compte.
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete(
                $user->profile_photo_path
            );
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}