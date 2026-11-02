<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfirmationController extends Controller
{
    /**
     * Afficher la page de confirmation
     */
    public function show(): View
    {
        return view('auth.confirm-registration');
    }

    /**
     * Vérifier le code de confirmation
     */
    public function confirm(Request $request): RedirectResponse
    {
        $request->validate([
            'whatsapp_phone' => [
                'required',
                'string',
            ],

            'confirmation_code' => [
                'required',
                'string',
                'size:6',
            ],
        ], [
            'whatsapp_phone.required' => 'Veuillez entrer votre numéro WhatsApp.',
            'confirmation_code.required' => 'Veuillez entrer votre code de confirmation.',
            'confirmation_code.size' => 'Le code doit contenir 6 caractères.',
        ]);

        $phone = trim($request->whatsapp_phone);
        $code = strtoupper(trim($request->confirmation_code));

        $user = User::where('whatsapp_phone', $phone)
            ->where('role', 'student')
            ->where('status', 'accepted')
            ->where('confirmation_code', $code)
            ->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors([
                    'confirmation_code' =>
                        'Numéro WhatsApp ou code de confirmation incorrect.'
                ]);
        }

        $user->update([
            'status' => 'confirmed',
            'confirmation_code' => null,
            'confirmed_at' => now(),
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Votre inscription est confirmée avec succès. Vous pouvez maintenant vous connecter.'
            );
    }
}
