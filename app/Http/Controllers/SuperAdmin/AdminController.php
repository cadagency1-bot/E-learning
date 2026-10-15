<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Liste des administrateurs.
     */
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $admins = User::where('role', 'admin')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalAdmins = User::where('role', 'admin')->count();

        return view('superadmin.administrateurs.index', compact(
            'admins',
            'totalAdmins',
            'search'
        ));
    }

    /**
     * Formulaire d'ajout.
     */
    public function create(): View
    {
        return view('superadmin.administrateurs.create');
    }

    /**
     * Enregistrer un nouvel administrateur.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
            'status' => 'confirmed',
        ]);

        return redirect()
            ->route('superadmin.administrateurs.index')
            ->with('success', 'Administrateur ajouté avec succès.');
    }

    /**
     * Formulaire de modification.
     */
    public function edit(User $administrateur): View|RedirectResponse
    {
        if ($administrateur->role !== 'admin') {
            return redirect()
                ->route('superadmin.administrateurs.index')
                ->with('error', 'Ce compte n’est pas un administrateur.');
        }

        return view('superadmin.administrateurs.edit', compact('administrateur'));
    }

    /**
     * Modifier un administrateur.
     */
    public function update(
        Request $request,
        User $administrateur
    ): RedirectResponse {
        if ($administrateur->role !== 'admin') {
            return redirect()
                ->route('superadmin.administrateurs.index')
                ->with('error', 'Ce compte n’est pas un administrateur.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($administrateur->id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $administrateur->name = $validated['name'];
        $administrateur->email = $validated['email'];

        if (!empty($validated['password'])) {
            $administrateur->password = Hash::make($validated['password']);
        }

        $administrateur->save();

        return redirect()
            ->route('superadmin.administrateurs.index')
            ->with('success', 'Administrateur modifié avec succès.');
    }

    /**
     * Supprimer un administrateur.
     */
    public function destroy(User $administrateur): RedirectResponse
    {
        if ($administrateur->role !== 'admin') {
            return redirect()
                ->route('superadmin.administrateurs.index')
                ->with('error', 'Seuls les comptes Admin peuvent être supprimés ici.');
        }

        if (auth()->id() === $administrateur->id) {
            return redirect()
                ->route('superadmin.administrateurs.index')
                ->with('error', 'Vous ne pouvez pas supprimer le compte connecté.');
        }

        $administrateur->delete();

        return redirect()
            ->route('superadmin.administrateurs.index')
            ->with('success', 'Administrateur supprimé avec succès.');
    }
}
