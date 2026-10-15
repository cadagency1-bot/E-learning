
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscriptions | Super Admin - ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f7f9fc;
            color: #172033;
        }

        .sidebar {
            width: 255px;
            position: fixed;
            inset: 0 auto 0 0;
            background: white;
            border-right: 1px solid #e8edf3;
            padding: 26px 17px;
            z-index: 40;
        }

        .main-content {
            margin-left: 255px;
            min-height: 100vh;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #ecfdf5;
            color: #059669;
        }

        .panel {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .025);
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        @media (max-width: 1023px) {
            .sidebar {
                width: 72px;
                padding: 22px 10px;
            }

            .brand-text,
            .nav-text,
            .sidebar-bottom-text {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 13px 8px;
            }

            .main-content {
                margin-left: 72px;
            }
        }

        @media (max-width: 640px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .page-content { padding: 17px !important; }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}"
       class="flex items-center gap-3 mb-10 px-2 no-underline">

        <div class="w-11 h-11 rounded-2xl bg-emerald-500 flex items-center justify-center text-white">
            <i data-lucide="graduation-cap" class="w-6 h-6"></i>
        </div>

        <div class="brand-text">
            <div class="font-extrabold text-gray-900 text-sm">ÉtudeEnLigne</div>
            <div class="text-xs text-gray-400 mt-1">Super Administration</div>
        </div>
    </a>

    <div class="text-[10px] uppercase tracking-[2px] text-gray-400 font-bold px-3 mb-3">
        Menu principal
    </div>

    <a href="{{ route('superadmin.dashboard') }}" class="nav-link">
        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
        <span class="nav-text">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="nav-link">
        <i data-lucide="shield-check" class="w-5 h-5"></i>
        <span class="nav-text">Administrateurs</span>
    </a>

    <a href="{{ route('superadmin.inscriptions.index') }}"
       class="nav-link active">
        <i data-lucide="users" class="w-5 h-5"></i>
        <span class="nav-text">Inscriptions</span>
    </a>



    <div class="mt-8 text-[10px] uppercase tracking-[2px] text-gray-400 font-bold px-3 mb-3">
        Compte
    </div>

    <a href="{{ route('profile.edit') }}" class="nav-link">
        <i data-lucide="settings" class="w-5 h-5"></i>
        <span class="nav-text">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link w-full border-0 bg-transparent cursor-pointer">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            <span class="nav-text">Déconnexion</span>
        </button>
    </form>

    <div class="absolute bottom-5 left-4 right-4 border-t border-gray-100 pt-4 sidebar-bottom-text">
        <div class="flex items-center gap-3 px-2">
            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0">
                <p class="text-xs font-bold text-gray-800 truncate">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-[10px] text-gray-400">Super Administrateur</p>
            </div>
        </div>
    </div>

</aside>

<div class="main-content">

    <header class="bg-white border-b border-gray-100 px-5 md:px-8 py-5 flex items-center justify-between gap-4">
        <div>
            <p class="text-xs text-gray-400 mb-1">
                ÉtudeEnLigne / Super Administration
            </p>
            <h1 class="text-xl md:text-2xl font-extrabold text-gray-900">
                Gestion des inscriptions
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden sm:block text-right">
                <p class="text-sm font-bold text-gray-800">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-xs text-gray-400">Super Administrateur</p>
            </div>

            <div class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-extrabold">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>
        </div>
    </header>

    <main class="page-content p-5 md:p-8">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">

            <div>
                <h2 class="text-lg font-extrabold text-gray-900">
                    Inscriptions des étudiants
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Consultez les demandes et gérez leur statut.
                </p>
            </div>

            <a href="{{ route('superadmin.dashboard') }}"
               class="inline-flex items-center justify-center gap-2 bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 no-underline">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Retour au tableau de bord
            </a>

        </div>

        @if(session('success'))
            <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @php
            $total = $registrations->count();
            $pending = $registrations->where('status', 'pending')->count();
            $accepted = $registrations->where('status', 'accepted')->count();
            $confirmed = $registrations->where('status', 'confirmed')->count();
            $rejected = $registrations->where('status', 'rejected')->count();
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

            <div class="panel p-5">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Total</span>
                    <i data-lucide="users" class="w-5 h-5 text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-extrabold mt-3">{{ $total }}</h3>
                <p class="text-xs text-gray-400 mt-1">Inscriptions</p>
            </div>

            <div class="panel p-5">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">En attente</span>
                    <i data-lucide="clock-3" class="w-5 h-5 text-amber-500"></i>
                </div>
                <h3 class="text-3xl font-extrabold mt-3">{{ $pending }}</h3>
                <p class="text-xs text-gray-400 mt-1">À examiner</p>
            </div>

            <div class="panel p-5">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Confirmés</span>
                    <i data-lucide="user-check" class="w-5 h-5 text-emerald-600"></i>
                </div>
                <h3 class="text-3xl font-extrabold mt-3">{{ $confirmed }}</h3>
                <p class="text-xs text-gray-400 mt-1">Accès confirmé</p>
            </div>

            <div class="panel p-5">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Refusés</span>
                    <i data-lucide="user-x" class="w-5 h-5 text-rose-600"></i>
                </div>
                <h3 class="text-3xl font-extrabold mt-3">{{ $rejected }}</h3>
                <p class="text-xs text-gray-400 mt-1">Demandes refusées</p>
            </div>

        </div>

        <section class="panel overflow-hidden">

            <div class="px-5 md:px-6 py-5 border-b border-gray-100">
                <h3 class="font-extrabold text-gray-900">Liste des étudiants</h3>
                <p class="text-xs text-gray-400 mt-1">
                    Acceptez, refusez ou supprimez une demande.
                </p>
            </div>

            <div class="table-wrap">
                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Étudiant</th>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Contact</th>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Date</th>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Statut</th>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Code</th>
                            <th class="px-5 py-4 text-xs font-bold text-gray-500">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                    @forelse($registrations as $registration)

                        @php
                            $status = $registration->status ?? 'pending';

                            $labels = [
                                'pending' => 'En attente',
                                'accepted' => 'Accepté',
                                'confirmed' => 'Confirmé',
                                'rejected' => 'Refusé',
                            ];

                            $classes = [
                                'pending' => 'bg-amber-50 text-amber-700',
                                'accepted' => 'bg-blue-50 text-blue-700',
                                'confirmed' => 'bg-emerald-50 text-emerald-700',
                                'rejected' => 'bg-rose-50 text-rose-700',
                            ];
                        @endphp

                        <tr class="hover:bg-gray-50/70">

                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($registration->name ?? '?', 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="text-sm font-bold text-gray-800">
                                            {{ $registration->name }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            ID: {{ $registration->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-gray-500">
                                <div>{{ $registration->email }}</div>
                                <div class="text-xs mt-1">
                                    {{ $registration->whatsapp_phone ?? 'Pas de téléphone' }}
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ $registration->created_at?->format('d/m/Y') ?? '—' }}
                            </td>

                            <td class="px-5 py-4 whitespace-nowrap">
                                <span class="inline-flex px-3 py-1.5 rounded-lg text-xs font-bold {{ $classes[$status] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ $labels[$status] ?? $status }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-sm font-bold text-gray-600 whitespace-nowrap">
                                {{ $registration->confirmation_code ?: '—' }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">

                                    @if($status === 'pending')

                                        <form method="POST"
                                              action="{{ route('superadmin.inscriptions.accept', $registration) }}"
                                              onsubmit="return confirm('Accepter cette inscription ?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    title="Accepter"
                                                    class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                        <form method="POST"
                                              action="{{ route('superadmin.inscriptions.reject', $registration) }}"
                                              onsubmit="return confirm('Refuser cette inscription ?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    title="Refuser"
                                                    class="p-2 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                    @elseif($status === 'accepted')

                                        <span class="text-xs text-blue-600 font-semibold">
                                            Code généré
                                        </span>

                                    @elseif($status === 'confirmed')

                                        <span class="text-xs text-emerald-600 font-semibold">
                                            Accès actif
                                        </span>

                                    @else

                                        <span class="text-xs text-gray-400">
                                            Refusée
                                        </span>

                                    @endif

                                    <form method="POST"
                                          action="{{ route('superadmin.inscriptions.destroy', $registration) }}"
                                          onsubmit="return confirm('Supprimer définitivement cette inscription ?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                title="Supprimer"
                                                class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-5 py-14 text-center">
                                <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                                    <i data-lucide="users" class="w-7 h-7"></i>
                                </div>

                                <p class="text-sm font-bold text-gray-700">
                                    Aucune inscription pour le moment
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Les nouvelles demandes apparaîtront ici.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>

        </section>

        <footer class="text-center text-xs text-gray-400 mt-8 pb-3">
            © {{ date('Y') }} ÉtudeEnLigne. Tous droits réservés.
        </footer>

    </main>
</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
