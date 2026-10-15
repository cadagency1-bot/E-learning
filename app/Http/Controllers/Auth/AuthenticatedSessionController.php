<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
/**
 * Handle an incoming authentication request.
 */
public function store(LoginRequest $request): RedirectResponse
{
    // Vérifier l'email et le mot de passe
    $request->authenticate();

    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    /*
    |--------------------------------------------------------------------------
    | SUPER ADMIN
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'super_admin') {

        $request->session()->regenerate();

        return redirect()->route('superadmin.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'admin') {

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | ÉTUDIANT EN ATTENTE
    |--------------------------------------------------------------------------
    */

    if ($user->status === 'pending') {

        Auth::logout();

        return redirect()
            ->route('login')
            ->with(
                'error',
                'Votre demande est encore en attente de validation par l’administration.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | ÉTUDIANT REFUSÉ
    |--------------------------------------------------------------------------
    */

    if ($user->status === 'rejected') {

        Auth::logout();

        return redirect()
            ->route('login')
            ->with(
                'error',
                'Votre demande d’inscription a été refusée par l’administration.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | ÉTUDIANT ACCEPTÉ MAIS PAS ENCORE CONFIRMÉ
    |--------------------------------------------------------------------------
    */

    if ($user->status === 'accepted') {

        Auth::logout();

        return redirect()
            ->route('login')
            ->with([
                'error' =>
                    'Votre inscription a été acceptée. Veuillez confirmer votre inscription avec le code reçu sur WhatsApp.',
                'show_confirmation' => true,
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ÉTUDIANT CONFIRMÉ
    |--------------------------------------------------------------------------
    */

    if ($user->status === 'confirmed') {

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | STATUT INCONNU
    |--------------------------------------------------------------------------
    */

    Auth::logout();

    return redirect()
        ->route('login')
        ->with(
            'error',
            'Votre compte ne peut pas être connecté pour le moment.'
        );
}

    
     
    public function destroy(Request $request): RedirectResponse
    {
        // Déconnexion
        Auth::guard('web')->logout();

        // Invalider la session
        $request->session()->invalidate();

        // Régénérer le token CSRF
        $request->session()->regenerateToken();

        // Retour à l'accueil
        return redirect('/');
    }
}