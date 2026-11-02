<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationController extends Controller
{
    /**
     * Documents stockés sur le disque local privé.
     */
    private const DOCUMENTS = [
        'photo',
        'cin_recto',
        'cin_verso',
    ];

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
            ->with('formations')
            ->latest()
            ->get();

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
                'users.whatsapp_phone as user_phone',
                'users.status as student_status',
                'users.photo as user_photo',
                'users.cin_recto as user_cin_recto',
                'users.cin_verso as user_cin_verso',
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
     * Afficher une pièce jointe privée :
     * photo, CIN recto ou CIN verso.
     */
    public function document(User $user, string $type): StreamedResponse
    {
        abort_unless(
            $user->role === 'student'
            && in_array($type, self::DOCUMENTS, true),
            404
        );

        $path = $user->{$type};

        abort_if(
            empty($path)
            || !Storage::disk('local')->exists($path),
            404
        );

        return Storage::disk('local')->response($path);
    }

    /**
     * Télécharger le CV privé d'un étudiant.
     */
    public function cv(User $user): StreamedResponse
    {
        abort_unless($user->role === 'student', 404);

        $path = $user->cv_path;

        abort_if(
            empty($path)
            || !Storage::disk('local')->exists($path),
            404
        );

        return Storage::disk('local')->download(
            $path,
            'CV-' . Str::slug($user->name) . '.pdf',
            ['Content-Type' => 'application/pdf']
        );
    }

    /**
     * Accepter une inscription.
     */
    public function accept(User $user): RedirectResponse
    {
        if (
            $user->role !== 'student'
            || $user->status !== 'pending'
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

        $response = back()
            ->with(
                'success',
                'La demande de ' . $user->name .
                ' a été acceptée. Le code de confirmation a été généré.'
            )
            ->with('show_confirmation', true);

        if (!empty($user->whatsapp_phone)) {
            $response->with(
                'whatsapp_url',
                $this->whatsappUrl($user, $code)
            );
        }

        return $response;
    }

    /**
     * Refuser une inscription.
     */
    public function reject(User $user): RedirectResponse
    {
        if (
            $user->role !== 'student'
            || $user->status !== 'pending'
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
     * Supprimer un compte étudiant et ses documents privés.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->role !== 'student') {
            return back()->with(
                'error',
                'Seuls les comptes étudiants peuvent être supprimés ici.'
            );
        }

        // Supprimer la photo et les deux faces de la CIN.
        foreach (self::DOCUMENTS as $field) {
            if (!empty($user->{$field})) {
                Storage::disk('local')->delete($user->{$field});
            }
        }

        // Supprimer également le CV privé.
        if (!empty($user->cv_path)) {
            Storage::disk('local')->delete($user->cv_path);
        }

        $user->delete();

        return back()->with(
            'success',
            'L’étudiant a été supprimé avec succès.'
        );
    }

    /**
     * Construire le lien WhatsApp contenant le code de confirmation.
     */
    private function whatsappUrl(User $user, string $code): string
    {
        $phone = preg_replace('/\D+/', '', $user->whatsapp_phone ?? '');

        // Numéros marocains : 0612345678 ou 00212612345678.
        if (str_starts_with($phone, '00')) {
            $phone = substr($phone, 2);
        } elseif (
            strlen($phone) === 10
            && str_starts_with($phone, '0')
        ) {
            $phone = '212' . substr($phone, 1);
        }

        $text = "Bonjour {$user->name},\n\n"
            . "Votre inscription sur CAD Academy a été acceptée ✅\n\n"
            . "Votre numéro WhatsApp : {$user->whatsapp_phone}\n"
            . "Votre code de connexion : {$code}\n\n"
            . "Connectez-vous ici : " . route('login') . "\n\n"
            . "مرحبا {$user->name}، تم قبول تسجيلك في CAD Academy ✅\n"
            . "رمز الدخول الخاص بك : {$code}";

        return 'https://wa.me/' . $phone . '?text=' . rawurlencode($text);
    }
}
