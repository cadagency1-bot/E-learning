<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions | Super Admin - ÉtudeEnLigne</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #031f17;
            --surface: #0a3427;
            --surface-2: #0f4535;
            --border: #14604a;
            --text: #ecfdf5;
            --muted: #8fc7b2;
            --faint: #5fa38b;
            --brand: #34d399;
            --brand-dark: #10b981;
            --radius: 18px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            background: linear-gradient(160deg, #021710 0%, #05301f 45%, #0a4a36 100%) fixed;
            color: var(--text);
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        .tabular { font-variant-numeric: tabular-nums; }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #06382b 0%, #021c14 100%);
            border-inline-end: 1px solid var(--border);
            position: fixed;
            inset-block: 0;
            inset-inline-start: 0;
            z-index: 40;
            padding: 22px 14px 96px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar::-webkit-scrollbar { width: 0; }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 2px 6px 20px;
            margin-bottom: 18px;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
        }

        .brand-text { flex: 1; min-width: 0; }

        .logo-crop {
            position: relative;
            overflow: hidden;
            background: #f7f7f7;
            border-radius: 12px;
        }

        .logo-crop img { display: block; max-width: none; }

        .logo-full { width: 100%; max-width: 190px; aspect-ratio: 950 / 400; }
        .logo-full img { width: 105.263%; margin-left: -2.632%; margin-top: -31.579%; }

        .logo-mark { display: none; width: 44px; aspect-ratio: 415 / 400; flex-shrink: 0; }
        .logo-mark img { width: 240.964%; margin-left: -6.024%; margin-top: -72.289%; }

        .nav-label { font-size: 11px; color: var(--faint); font-weight: 600; padding: 0 12px; margin-bottom: 8px; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            margin-bottom: 6px;
            border-radius: 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background .18s ease, color .18s ease;
        }

        .nav-link svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-link:hover { background: var(--surface-2); color: var(--text); }
        .nav-link.active { background: #ffffff; color: #052e22; }

        .sidebar-user {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 14px;
            background: #021c14;
            border-top: 1px solid var(--border);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: linear-gradient(135deg, #4ade80, #16a34a);
            color: #052e16;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* ---------- LAYOUT ---------- */
        .main-content { margin-inline-start: 250px; min-height: 100vh; }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(3, 31, 23, .82);
            backdrop-filter: saturate(160%) blur(12px);
            -webkit-backdrop-filter: saturate(160%) blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .page-content { max-width: 1440px; margin: 0 auto; }

        /* ---------- CARTES EN DÉGRADÉ ---------- */
        .g-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 18px 20px;
            color: #fff;
            min-height: 118px;
            box-shadow: 0 14px 28px -14px rgba(0, 0, 0, .6);
            transition: transform .2s ease;
        }

        .g-card:hover { transform: translateY(-3px); }

        .g-1 { background: linear-gradient(135deg, #065f46 0%, #10b981 100%); }
        .g-2 { background: linear-gradient(135deg, #047857 0%, #34d399 100%); }
        .g-3 { background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%); }
        .g-4 { background: linear-gradient(135deg, #166534 0%, #4ade80 100%); }

        .g-card .g-label { font-size: 12.5px; font-weight: 600; opacity: .92; }
        .g-card .g-number { font-size: 28px; font-weight: 800; margin-top: 6px; line-height: 1.1; }
        .g-card .g-sub { font-size: 11.5px; opacity: .85; margin-top: 8px; }

        .g-card .g-icon {
            position: absolute;
            inset-inline-end: 16px;
            top: 16px;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .18);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---------- PANNEAU / TABLEAU ---------- */
        .card {
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            min-width: 0;
        }

        .table-wrap { width: 100%; overflow-x: auto; }

        .data-table { width: 100%; border-collapse: collapse; text-align: start; }

        .data-table thead th {
            background: var(--surface-2);
            padding: 13px 22px;
            font-size: 11.5px;
            font-weight: 700;
            color: var(--muted);
            white-space: nowrap;
            text-align: start;
        }

        .data-table tbody td {
            padding: 14px 22px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            text-align: start;
            font-size: 13px;
            color: var(--text);
        }

        .data-table tbody tr:last-child td { border-bottom: 0; }
        .data-table tbody tr { transition: background .15s ease; }
        .data-table tbody tr:hover { background: rgba(255, 255, 255, .03); }

        .muted { color: var(--muted); }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 13px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .st-pending   { background: rgba(245, 158, 11, .16); color: #fbbf24; }
        .st-accepted  { background: rgba(59, 130, 246, .16); color: #60a5fa; }
        .st-confirmed { background: rgba(74, 222, 128, .16); color: #4ade80; }
        .st-rejected  { background: rgba(244, 63, 94, .16);  color: #fb7185; }
        .st-other     { background: var(--surface-2);        color: var(--muted); }

        /* Boutons d'action (icônes) */
        .ib {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            transition: filter .15s ease, transform .15s ease;
        }

        .ib:hover { filter: brightness(1.25); transform: translateY(-1px); }
        .ib-accept { background: rgba(74, 222, 128, .16); color: #4ade80; }
        .ib-reject { background: rgba(244, 63, 94, .16); color: #fb7185; }
        .ib-delete { background: var(--surface-2); color: var(--muted); }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: transparent;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background .15s ease, color .15s ease;
        }

        .btn-ghost:hover { background: var(--surface-2); color: var(--text); }

        .alert { border-radius: 14px; padding: 13px 16px; margin-bottom: 20px; font-size: 13.5px; font-weight: 600; }
        .alert-success { background: rgba(52, 211, 153, .14); border: 1px solid rgba(52, 211, 153, .4); color: #6ee7b7; }
        .alert-error { background: rgba(244, 63, 94, .13); border: 1px solid rgba(244, 63, 94, .4); color: #fda4af; }

        .empty-box {
            width: 56px;
            height: 56px;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: var(--surface-2);
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1023px) {
            .sidebar { width: 72px; padding: 20px 10px 96px; }
            .sidebar .brand-text, .sidebar .nav-text, .sidebar .nav-label, .sidebar .sidebar-bottom-text { display: none; }
            .brand-link { justify-content: center; padding: 2px 0 18px; }
            .logo-mark { display: block; }
            .sidebar .nav-link { justify-content: center; padding: 12px 8px; }
            .sidebar-user { padding: 12px 8px; }
            .sidebar-user > div { justify-content: center; }
            .main-content { margin-inline-start: 72px; }
        }

        @media (max-width: 640px) {
            .sidebar { display: none; }
            .main-content { margin-inline-start: 0; }
            .page-content { padding: 16px !important; }
        }
    </style>
</head>

<body>

{{-- SIDEBAR --}}
<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}" class="brand-link">
        <div class="brand-text">
            <div class="logo-crop logo-full">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy">
            </div>
            <div class="text-[11px] mt-2.5 px-0.5" style="color: var(--muted);">Super Administration</div>
        </div>

        <div class="logo-crop logo-mark">
            <img src="{{ asset('images/cad-academy-logo.png') }}" alt="CAD Academy">
        </div>
    </a>

    <div class="nav-label">Menu principal</div>

    <a href="{{ route('superadmin.dashboard') }}" class="nav-link">
        <i data-lucide="layout-dashboard"></i>
        <span class="nav-text">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}" class="nav-link">
        <i data-lucide="shield-check"></i>
        <span class="nav-text">Administrateurs</span>
    </a>

    <a href="{{ route('superadmin.inscriptions.index') }}" class="nav-link active">
        <i data-lucide="users"></i>
        <span class="nav-text">Inscriptions</span>
    </a>

    <div class="nav-label" style="margin-top: 26px;">Compte</div>

    <a href="{{ route('profile.edit') }}" class="nav-link">
        <i data-lucide="settings"></i>
        <span class="nav-text">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link w-full text-start bg-transparent border-0 cursor-pointer">
            <i data-lucide="log-out"></i>
            <span class="nav-text">Déconnexion</span>
        </button>
    </form>

    <div class="sidebar-user">
        <div class="flex items-center gap-3">
            <div class="avatar !w-9 !h-9 !rounded-xl text-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0 sidebar-bottom-text">
                <p class="text-xs font-semibold truncate" style="color: var(--text);">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-[11px]" style="color: var(--muted);">Super Administrateur</p>
            </div>
        </div>
    </div>

</aside>

{{-- CONTENU --}}
<div class="main-content">

    <header class="topbar px-5 md:px-8 py-4 flex items-center justify-between gap-4">
        <div class="min-w-0">
            <p class="text-xs mb-0.5" style="color: var(--muted);">
                ÉtudeEnLigne / Super Administration
            </p>
            <h1 class="text-xl font-extrabold tracking-tight truncate">Gestion des inscriptions</h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden sm:block text-end">
                <p class="text-sm font-bold leading-tight">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                <p class="text-xs" style="color: var(--muted);">Super Administrateur</p>
            </div>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>
        </div>
    </header>

    <main class="page-content p-5 md:p-8">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-extrabold">Inscriptions des étudiants</h2>
                <p class="text-sm mt-1" style="color: var(--muted);">
                    Consultez les demandes et gérez leur statut.
                </p>
            </div>

            <a href="{{ route('superadmin.dashboard') }}" class="btn-ghost">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Retour au tableau de bord
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @php
            $total = $registrations->count();
            $pending = $registrations->where('status', 'pending')->count();
            $accepted = $registrations->where('status', 'accepted')->count();
            $confirmed = $registrations->where('status', 'confirmed')->count();
            $rejected = $registrations->where('status', 'rejected')->count();

            $labels = [
                'pending' => 'En attente',
                'accepted' => 'Accepté',
                'confirmed' => 'Confirmé',
                'rejected' => 'Refusé',
            ];

            $classes = [
                'pending' => 'st-pending',
                'accepted' => 'st-accepted',
                'confirmed' => 'st-confirmed',
                'rejected' => 'st-rejected',
            ];
        @endphp

        {{-- STATISTIQUES --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

            <div class="g-card g-1">
                <div class="g-icon"><i data-lucide="users" class="w-5 h-5"></i></div>
                <p class="g-label">Total</p>
                <p class="g-number tabular">{{ $total }}</p>
                <p class="g-sub">Inscriptions</p>
            </div>

            <div class="g-card g-2">
                <div class="g-icon"><i data-lucide="clock-3" class="w-5 h-5"></i></div>
                <p class="g-label">En attente</p>
                <p class="g-number tabular">{{ $pending }}</p>
                <p class="g-sub">À examiner</p>
            </div>

            <div class="g-card g-3">
                <div class="g-icon"><i data-lucide="user-check" class="w-5 h-5"></i></div>
                <p class="g-label">Confirmés</p>
                <p class="g-number tabular">{{ $confirmed }}</p>
                <p class="g-sub">Accès confirmé</p>
            </div>

            <div class="g-card g-4">
                <div class="g-icon"><i data-lucide="user-x" class="w-5 h-5"></i></div>
                <p class="g-label">Refusés</p>
                <p class="g-number tabular">{{ $rejected }}</p>
                <p class="g-sub">Demandes refusées</p>
            </div>

        </div>

        {{-- TABLEAU --}}
        <section class="card overflow-hidden">

            <div class="px-5 md:px-6 py-5" style="border-bottom: 1px solid var(--border);">
                <h3 class="font-extrabold">Liste des étudiants</h3>
                <p class="text-xs mt-1" style="color: var(--muted);">
                    Acceptez, refusez ou supprimez une demande.
                </p>
            </div>

            <div class="table-wrap">
                <table class="data-table">

                    <thead>
                        <tr>
                            <th>Étudiant</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($registrations as $registration)

                        @php $status = $registration->status ?? 'pending'; @endphp

                        <tr>

                            <td class="whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold"
                                         style="background: rgba(74,222,128,.14); color:#4ade80;">
                                        {{ strtoupper(substr($registration->name ?? '?', 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-bold">{{ $registration->name }}</p>
                                        <p class="text-xs" style="color: var(--faint);">ID: {{ $registration->id }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="muted">
                                <div>{{ $registration->email }}</div>
                                <div class="text-xs mt-1" style="color: var(--faint);">
                                    <bdi>{{ $registration->whatsapp_phone ?? 'Pas de téléphone' }}</bdi>
                                </div>
                            </td>

                            <td class="tabular muted whitespace-nowrap">
                                {{ $registration->created_at?->format('d/m/Y') ?? '—' }}
                            </td>

                            <td class="whitespace-nowrap">
                                <span class="badge {{ $classes[$status] ?? 'st-other' }}">
                                    {{ $labels[$status] ?? $status }}
                                </span>
                            </td>

                            <td class="font-bold whitespace-nowrap" style="color: var(--brand);">
                                {{ $registration->confirmation_code ?: '—' }}
                            </td>

                            <td>
                                <div class="flex items-center gap-2">

                                    @if($status === 'pending')

                                        <form method="POST"
                                              action="{{ route('superadmin.inscriptions.accept', $registration) }}"
                                              onsubmit="return confirm('Accepter cette inscription ?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" title="Accepter" class="ib ib-accept">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                        <form method="POST"
                                              action="{{ route('superadmin.inscriptions.reject', $registration) }}"
                                              onsubmit="return confirm('Refuser cette inscription ?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" title="Refuser" class="ib ib-reject">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                    @elseif($status === 'accepted')

                                        <span class="text-xs font-semibold" style="color:#60a5fa;">Code généré</span>

                                    @elseif($status === 'confirmed')

                                        <span class="text-xs font-semibold" style="color:#4ade80;">Accès actif</span>

                                    @else

                                        <span class="text-xs" style="color: var(--faint);">Refusée</span>

                                    @endif

                                    <form method="POST"
                                          action="{{ route('superadmin.inscriptions.destroy', $registration) }}"
                                          onsubmit="return confirm('Supprimer définitivement cette inscription ?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" title="Supprimer" class="ib ib-delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="!py-14 text-center">
                                <div class="empty-box"><i data-lucide="users" class="w-7 h-7"></i></div>
                                <p class="text-sm font-bold" style="color: var(--muted);">
                                    Aucune inscription pour le moment
                                </p>
                                <p class="text-xs mt-2" style="color: var(--faint);">
                                    Les nouvelles demandes apparaîtront ici.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>

        </section>

        <footer class="text-center text-xs mt-8 pb-3" style="color: var(--faint);">
            © {{ date('Y') }} ÉtudeEnLigne. Tous droits réservés.
        </footer>

    </main>
</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>