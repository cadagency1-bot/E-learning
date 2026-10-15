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
     * Accepter une inscription.
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

        $user->update([
            'status' => 'accepted',
            'confirmation_code' => strtoupper(Str::random(6)),
            'confirmed_at' => null,
        ]);

        return back()->with(
            'success',
            'La demande de ' . $user->name .
            ' a été acceptée. Le code de confirmation a été généré.'
        );
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
}
