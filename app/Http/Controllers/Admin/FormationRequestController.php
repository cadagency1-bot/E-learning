<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FormationRequestController extends Controller
{
    /**
     * Afficher les demandes de formations.
     */
    public function index(): View
    {
        $requests = DB::table('user_formations')
            ->join('users', 'user_formations.user_id', '=', 'users.id')
            ->join('formations', 'user_formations.formation_id', '=', 'formations.id')
            ->select(
                'user_formations.id',
                'user_formations.user_id',
                'user_formations.formation_id',
                'user_formations.status',
                'user_formations.activated_at',
                'user_formations.created_at',
                'users.name as user_name',
                'users.email as user_email',
                'users.whatsapp_phone',
                'formations.name as formation_name'
            )
            ->orderByDesc('user_formations.created_at')
            ->get();

        return view('admin.formation-requests.index', compact('requests'));
    }

    /**
     * Activer l'accès à une formation pour un étudiant.
     */
    public function activate(int $id): RedirectResponse
    {
        $formationRequest = DB::table('user_formations')
            ->where('id', $id)
            ->first();

        if (!$formationRequest) {
            return back()->with(
                'error',
                'Demande de formation introuvable.'
            );
        }

        $student = DB::table('users')
            ->where('id', $formationRequest->user_id)
            ->first();

        $formation = DB::table('formations')
            ->where('id', $formationRequest->formation_id)
            ->first();

        if (!$student || !$formation) {
            return back()->with(
                'error',
                'Étudiant ou formation introuvable.'
            );
        }

        DB::table('user_formations')
            ->where('id', $id)
            ->update([
                'status' => 'active',
                'activated_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('admin.formation-requests.index')
            ->with(
                'success',
                'La formation « ' . $formation->name .
                ' » est maintenant activée pour ' . $student->name . '.'
            );
    }

    /**
     * Refuser une demande de formation.
     */
    public function reject(int $id): RedirectResponse
    {
        $formationRequest = DB::table('user_formations')
            ->where('id', $id)
            ->first();

        if (!$formationRequest) {
            return back()->with(
                'error',
                'Demande de formation introuvable.'
            );
        }

        DB::table('user_formations')
            ->where('id', $id)
            ->update([
                'status' => 'rejected',
                'activated_at' => null,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('admin.formation-requests.index')
            ->with(
                'success',
                'La demande de formation a été refusée.'
            );
    }
}