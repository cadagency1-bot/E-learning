<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewRegistrationMail;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la page d'inscription.
     */
    public function create(): View
    {
        // Récupérer toutes les formations disponibles
        $formations = Formation::orderBy('name')->get();

        return view('auth.register', compact('formations'));
    }

    /**
     * Enregistrer un nouvel étudiant.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'whatsapp_phone' => [
                'required',
                'string',
                'max:30',
            ],

            'formation_id' => [
                'required',
                'exists:formations,id',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Création de l'étudiant
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp_phone' => $request->whatsapp_phone,
            'password' => $request->password,

            'role' => 'student',
            'status' => 'pending',
            'confirmation_code' => null,
            'confirmed_at' => null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Demande de formation
        |--------------------------------------------------------------------------
        |
        | La formation choisie par l'étudiant est enregistrée
        | comme demande "pending".
        |
        | L'administration pourra ensuite :
        |
        | - accepter la demande
        | - refuser la demande
        | - activer l'accès après paiement
        |
        */

        $user->formations()->attach($request->formation_id, [
            'status' => 'pending',
            'activated_at' => null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Notification email au manager
        |--------------------------------------------------------------------------
        */

        Mail::to('cadacademy37@gmail.com')
            ->send(new NewRegistrationMail($user));

        /*
        |--------------------------------------------------------------------------
        | Redirection
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Votre demande d’inscription a été envoyée. Veuillez attendre la validation de l’administration.'
            );
    }

    /*
     * Important :
     *
     * L'étudiant n'est PAS connecté automatiquement.
     *
     * Il doit attendre :
     *
     * 1. La validation de l'admin
     * 2. Le paiement / activation de sa formation
     * 3. Le code de confirmation
     */
}