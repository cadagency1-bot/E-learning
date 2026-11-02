<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewRegistrationMail;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la page d'inscription.
     */
    public function create(): View
    {
        $formations = Formation::orderBy('name')->get();

        return view('auth.register', compact('formations'));
    }

    /**
     * Enregistrer un nouvel étudiant.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'whatsapp_phone' => ['required', 'string', 'max:30'],
            'formation_id' => ['required', 'exists:formations,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'cin_recto' => ['required', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:4096'],
            'cin_verso' => ['required', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:4096'],
        ]);

        // Enregistrer les documents dans le stockage privé
        $photoPath = $request->file('photo')
            ->store('student-documents/photos', 'local');

        $cinRectoPath = $request->file('cin_recto')
            ->store('student-documents/cin', 'local');

        $cinVersoPath = $request->file('cin_verso')
            ->store('student-documents/cin', 'local');

        // Créer le compte étudiant
        $user = User::create([
            'name' => $request->name,
            'whatsapp_phone' => $request->whatsapp_phone,
            'password' => $request->password,
            'role' => 'student',
            'status' => 'pending',
            'confirmation_code' => null,
            'confirmed_at' => null,

            // Chemins des documents
            'photo' => $photoPath,
            'cin_recto' => $cinRectoPath,
            'cin_verso' => $cinVersoPath,
        ]);

        // Associer la formation
        $user->formations()->attach($request->formation_id, [
            'status' => 'pending',
            'activated_at' => null,
        ]);

        // Envoyer la notification par Gmail
        Mail::to('cadacademy37@gmail.com')
            ->send(new NewRegistrationMail($user));

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Votre demande d’inscription a été envoyée. Veuillez attendre la validation de l’administration.'
            );
    }
}
