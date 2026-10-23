<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /**
     * Afficher les inscriptions et les demandes de formations.
     */
    public function index(): View
    {
        $registrations = User::where('role', 'student')
            ->whereIn('status', [
                'pending',
                'accepted',
                'rejected',
                'confirmed',
            ])
            ->latest()
            ->get();

        // Demandes de formations des étudiants
        $formationRequests = DB::table('user_formations')
            ->join(
                'users',
                'user_formations.user_id',
                '=',
                'users.id'
            )
            ->join(
                'formations',
                'user_formations.formation_id',
                '=',
                'formations.id'
            )
            ->where('users.role', 'student')
            ->select(
                'user_formations.id',
                'user_formations.user_id',
                'user_formations.formation_id',
                'user_formations.status as formation_status',
                'user_formations.activated_at',
                'user_formations.created_at',
                'users.name as user_name',
                'users.email as user_email',
                'users.status as student_status',
                'formations.name as formation_name'
            )
            ->orderByDesc('user_formations.created_at')
            ->get();

        return view(
            'admin.registrations.index',
            compact('registrations', 'formationRequests')
        );
    }

    /**
     * Accepter une inscription :
     * génère le code de confirmation et prépare l'envoi sur WhatsApp.
     */
    public function accept(User $user): RedirectResponse
    {
        if (
            $user->role !== 'student' ||
            $user->status !== 'pending'
        ) {
            return back()->with(
                'error',
                'Cette demande ne peut pas être acceptée.'
            );
        }

        $code = strtoupper(Str::random(6));

        $user->update([
            'status' => 'accepted',
            'confirmation_code' => $code,
            'confirmed_at' => null,
        ]);

        $response = back()->with(
            'success',
            'La demande de ' . $user->name .
            ' a été acceptée. Le code de confirmation a été généré.'
        );

        // Lien WhatsApp avec le code déjà écrit dans le message
        if (!empty($user->whatsapp_phone)) {
            $response->with('whatsapp_url', $this->whatsappUrl($user, $code));
        }

        return $response;
    }

    /**
     * Refuser une inscription.
     */
    public function reject(User $user): RedirectResponse
    {
        if (
            $user->role !== 'student' ||
            $user->status !== 'pending'
        ) {
            return back()->with(
                'error',
                'Cette demande ne peut pas être refusée.'
            );
        }

        $user->update([
            'status' => 'rejected',
            'confirmation_code' => null,
            'confirmed_at' => null,
        ]);

        return back()->with(
            'success',
            'La demande de ' . $user->name . ' a été refusée.'
        );
    }

    /**
     * Supprimer uniquement un compte étudiant.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->role !== 'student') {
            return back()->with(
                'error',
                'Seuls les comptes étudiants peuvent être supprimés ici.'
            );
        }

        $user->delete();

        return back()->with(
            'success',
            'L’étudiant a été supprimé avec succès.'
        );
    }

    /**
     * Construit le lien WhatsApp contenant le code de confirmation.
     */
    private function whatsappUrl(User $user, string $code): string
    {
        $phone = preg_replace('/\D+/', '', $user->whatsapp_phone ?? '');

        // Numéros marocains : 0612345678 ou 00212612345678 -> 212612345678
        if (str_starts_with($phone, '00')) {
            $phone = substr($phone, 2);
        } elseif (strlen($phone) === 10 && str_starts_with($phone, '0')) {
            $phone = '212' . substr($phone, 1);
        }

        $text = "Bonjour {$user->name},\n\n"
            . "Votre inscription sur ÉtudeEnLigne a été acceptée ✅\n\n"
            . "Votre code de confirmation : {$code}\n\n"
            . "Confirmez votre inscription ici : " . route('confirmation.show') . "\n\n"
            . "مرحبا {$user->name}، تم قبول تسجيلك في ÉtudeEnLigne ✅\n"
            . "رمز التأكيد الخاص بك : {$code}";

        return 'https://wa.me/' . $phone . '?text=' . rawurlencode($text);
    }
}