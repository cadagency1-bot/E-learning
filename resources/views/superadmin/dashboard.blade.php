<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin | cad Academy</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        html {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            background: linear-gradient(160deg, #021710 0%, #05301f 45%, #0a4a36 100%) fixed;
            color: var(--text);
            margin: 0;
            letter-spacing: -0.005em;
        }

        html[lang="ar"] * { letter-spacing: 0 !important; }

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

        .logo-full {
            width: 100%;
            max-width: 190px;
            aspect-ratio: 950 / 400;
        }

        .logo-full img {
            width: 105.263%;
            margin-left: -2.632%;
            margin-top: -31.579%;
        }

        .logo-mark {
            display: none;
            width: 44px;
            aspect-ratio: 415 / 400;
            flex-shrink: 0;
        }

        .logo-mark img {
            width: 240.964%;
            margin-left: -6.024%;
            margin-top: -72.289%;
        }

        .nav-label {
            font-size: 11px;
            color: var(--faint);
            font-weight: 600;
            padding: 0 12px;
            margin-bottom: 8px;
        }

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

        .nav-link svg {
            width: 18px;
            height: 18px;
            stroke-width: 2;
            flex-shrink: 0;
        }

        .nav-link:hover {
            background: var(--surface-2);
            color: var(--text);
        }

        /* Onglet actif : pilule blanche comme sur la maquette */
        .nav-link.active {
            background: #ffffff;
            color: #052e22;
        }

        .sidebar-user {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 14px;
            background: #021c14;
            border-top: 1px solid var(--border);
        }

        /* ---------- LAYOUT ---------- */
        .main-content {
            margin-inline-start: 250px;
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(3, 31, 23, .82);
            backdrop-filter: saturate(160%) blur(12px);
            -webkit-backdrop-filter: saturate(160%) blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .page-content {
            max-width: 1440px;
            margin: 0 auto;
        }

        /* ---------- BARRE DU HAUT ---------- */
        .search-box {
            position: relative;
            width: 100%;
            max-width: 340px;
        }

        .search-box svg {
            position: absolute;
            inset-inline-start: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--faint);
        }

        .search-box input {
            width: 100%;
            height: 42px;
            padding-inline: 40px 14px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            font-family: inherit;
            font-size: 13px;
        }

        .search-box input::placeholder { color: var(--faint); }

        .search-box input:focus {
            outline: none;
            border-color: var(--brand-dark);
            box-shadow: 0 0 0 3px rgba(74, 222, 128, .15);
        }

        .icon-btn {
            position: relative;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--muted);
            text-decoration: none;
            transition: color .15s ease, border-color .15s ease;
        }

        .icon-btn:hover { color: var(--text); border-color: #1f8a68; }
        .icon-btn svg { width: 18px; height: 18px; }

        .notif-dot {
            position: absolute;
            top: -4px;
            inset-inline-end: -4px;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            border-radius: 999px;
            background: #ef4444;
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--bg);
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
        }

        .lang-switch {
            display: inline-flex;
            padding: 3px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 999px;
            gap: 2px;
        }

        .lang-btn {
            border: 0;
            background: transparent;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            padding: 7px 14px;
            border-radius: 999px;
            transition: all .18s ease;
        }

        .lang-btn:hover { color: var(--text); }

        .lang-btn.active {
            background: #ffffff;
            color: #052e22;
        }

        /* ---------- CARTES EN DÉGRADÉ (haut de page) ---------- */
        .g-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 18px 20px;
            color: #fff;
            min-height: 124px;
            box-shadow: 0 14px 28px -14px rgba(0, 0, 0, .6);
            transition: transform .2s ease;
        }

        .g-card:hover { transform: translateY(-3px); }

        .g-purple { background: linear-gradient(135deg, #065f46 0%, #10b981 100%); }
        .g-pink   { background: linear-gradient(135deg, #047857 0%, #34d399 100%); }
        .g-blue   { background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%); }
        .g-orange { background: linear-gradient(135deg, #166534 0%, #4ade80 100%); }

        .g-card .g-label { font-size: 12.5px; font-weight: 600; opacity: .92; }
        .g-card .g-number { font-size: 28px; font-weight: 800; margin-top: 6px; line-height: 1.1; }
        .g-card .g-sub { font-size: 11.5px; opacity: .85; margin-top: 8px; }

        .g-card .g-spark {
            position: absolute;
            inset-inline-end: 12px;
            top: 14px;
            width: 46%;
            height: 46px;
            opacity: .9;
        }

        [dir="rtl"] .g-spark { transform: scaleX(-1); }

        /* ---------- CARTES SOMBRES ---------- */
        .card {
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            min-width: 0;
        }

        .pad { padding: 22px; }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
        }

        .section-sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 3px;
        }

        .chart-container {
            position: relative;
            height: 290px;
            width: 100%;
        }

        .chart-donut {
            position: relative;
            height: 220px;
            width: 100%;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 11px;
            border-radius: 999px;
            background: var(--surface-2);
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .icon-box {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .icon-box svg { width: 22px; height: 22px; }

        .mini-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 20px 22px;
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: border-color .2s ease, transform .2s ease;
        }

        .mini-card:hover { border-color: #1f8a68; transform: translateY(-2px); }

        .link-arrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 700;
            color: var(--brand);
            text-decoration: none;
        }

        .link-arrow svg { width: 15px; height: 15px; transition: transform .18s ease; }
        .link-arrow:hover svg { transform: translateX(3px); }

        [dir="rtl"] .rtl-flip { transform: scaleX(-1); }
        [dir="rtl"] .link-arrow:hover svg { transform: scaleX(-1) translateX(3px); }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 12.5px;
            font-weight: 700;
            color: #052e16;
            background: var(--brand);
            padding: 9px 16px;
            border-radius: 999px;
            text-decoration: none;
            transition: background .18s ease;
        }

        .btn-soft:hover { background: #86efac; }

        /* ---------- LÉGENDE DE L'ANNEAU ---------- */
        .donut-legend {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 8px;
            margin-top: 16px;
            text-align: center;
        }

        .donut-legend .pct { font-size: 17px; font-weight: 800; }
        .donut-legend .lbl {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            font-size: 10.5px;
            color: var(--muted);
            margin-top: 3px;
        }

        .dot { width: 7px; height: 7px; border-radius: 999px; flex-shrink: 0; }

        /* ---------- ACTIVITÉS RÉCENTES ---------- */
        .activity {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .activity:last-child { border-bottom: 0; }

        .activity .a-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity .a-icon svg { width: 17px; height: 17px; }
        .activity .a-name { font-size: 13px; font-weight: 700; color: var(--text); }
        .activity .a-meta { font-size: 11.5px; color: var(--muted); margin-top: 2px; }

        /* ---------- TABLEAUX ---------- */
        .table-wrap { width: 100%; overflow-x: auto; }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: start;
        }

        .data-table thead th {
            background: var(--surface-2);
            padding: 12px 22px;
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
        .data-table tbody tr:hover { background: rgba(255, 255, 255, .025); }

        .muted { color: var(--muted); }

        /* Pastilles de statut */
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

        .badge-plain { background: var(--surface-2); color: var(--muted); }

        .empty-box {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            border-radius: 16px;
            background: var(--surface-2);
            color: var(--faint);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-box svg { width: 24px; height: 24px; }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1023px) {
            .sidebar { width: 72px; padding: 20px 10px 96px; }

            .sidebar .brand-text,
            .sidebar .nav-text,
            .sidebar .nav-label,
            .sidebar .sidebar-bottom-text { display: none; }

            .brand-link { justify-content: center; padding: 2px 0 18px; }
            .logo-mark { display: block; }
            .sidebar .nav-link { justify-content: center; padding: 12px 8px; }
            .sidebar-user { padding: 12px 8px; }
            .sidebar-user > div { justify-content: center; }
            .main-content { margin-inline-start: 72px; }

            .data-table thead th,
            .data-table tbody td { padding-left: 16px; padding-right: 16px; }
        }

        @media (max-width: 640px) {
            .sidebar { display: none; }
            .main-content { margin-inline-start: 0; }
            .page-content { padding: 16px !important; }
            .chart-container { height: 240px; }
            .search-box { display: none; }
        }
    </style>
</head>

<body>

@php
    $totalStudents = $totalStudents ?? 0;
    $pendingStudents = $pendingStudents ?? 0;
    $acceptedStudents = $acceptedStudents ?? 0;
    $confirmedStudents = $confirmedStudents ?? 0;
    $rejectedStudents = $rejectedStudents ?? 0;
    $totalFormations = $totalFormations ?? 0;
    $totalAdmins = $totalAdmins ?? 0;

    $latestStudents = $latestStudents ?? collect();
    $monthlyLabels = $monthlyLabels ?? [];
    $monthlyCounts = $monthlyCounts ?? [];

    $formationsStats = $formationsStats ?? collect();
    $formationLabels = $formationLabels ?? [];
    $formationStudentCounts = $formationStudentCounts ?? [];

    // Pourcentages de l'anneau
    $statusTotal = max(1, $pendingStudents + $acceptedStudents + $confirmedStudents + $rejectedStudents);
    $pct = fn ($n) => round($n * 100 / $statusTotal);

    $statusLabels = [
        'pending' => 'En attente',
        'accepted' => 'Accepté',
        'confirmed' => 'Confirmé',
        'rejected' => 'Refusé',
    ];

    $statusClasses = [
        'pending' => 'st-pending',
        'accepted' => 'st-accepted',
        'confirmed' => 'st-confirmed',
        'rejected' => 'st-rejected',
    ];

    $statusIcons = [
        'pending' => 'clock-3',
        'accepted' => 'check-check',
        'confirmed' => 'user-check',
        'rejected' => 'user-x',
    ];
@endphp

{{-- SIDEBAR --}}
<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}" class="brand-link">
        <div class="brand-text">
            <div class="logo-crop logo-full">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy">
            </div>
            <div class="text-[11px] mt-2.5 px-0.5" style="color: var(--muted);" data-i18n="super_admin">Super Administration</div>
        </div>

        <div class="logo-crop logo-mark">
            <img src="{{ asset('images/cad-academy-logo.png') }}" alt="CAD Academy">
        </div>
    </a>

    <div class="nav-label" data-i18n="main_menu">Menu principal</div>

    <a href="{{ route('superadmin.dashboard') }}"
       class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
        <i data-lucide="layout-dashboard"></i>
        <span class="nav-text" data-i18n="dashboard">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="nav-link {{ request()->routeIs('superadmin.administrateurs.*') ? 'active' : '' }}">
        <i data-lucide="shield-check"></i>
        <span class="nav-text" data-i18n="admins">Administrateurs</span>
    </a>

    <a href="{{ route('superadmin.inscriptions.index') }}"
       class="nav-link {{ request()->routeIs('superadmin.inscriptions.*') ? 'active' : '' }}">
        <i data-lucide="users"></i>
        <span class="nav-text" data-i18n="registrations">Inscriptions</span>
    </a>

    <div class="nav-label" style="margin-top: 26px;" data-i18n="account">Compte</div>

    <a href="{{ route('profile.edit') }}"
       class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i data-lucide="settings"></i>
        <span class="nav-text" data-i18n="settings">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="nav-link w-full text-start bg-transparent border-0 cursor-pointer">
            <i data-lucide="log-out"></i>
            <span class="nav-text" data-i18n="logout">Déconnexion</span>
        </button>
    </form>

    <div class="sidebar-user">
        <div class="flex items-center gap-3">
            <div class="avatar !w-9 !h-9 !rounded-xl text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0 sidebar-bottom-text">
                <p class="text-xs font-semibold truncate" style="color: var(--text);">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-[11px]" style="color: var(--muted);" data-i18n="super_admin_role">Super Administrateur</p>
            </div>
        </div>
    </div>

</aside>

{{-- CONTENU PRINCIPAL --}}
<div class="main-content">

    {{-- HEADER --}}
    <header class="topbar px-5 md:px-8 py-4 flex items-center justify-between gap-4">

        <div class="min-w-0">
            <h1 class="text-xl font-extrabold tracking-tight truncate" style="color: var(--text);">
                <span data-i18n="welcome">Bienvenue,</span> {{ auth()->user()->name ?? 'Super Admin' }} !
            </h1>
            <p class="text-xs mt-0.5 truncate" style="color: var(--muted);" data-i18n="overview">
                Voici un aperçu de votre plateforme aujourd'hui.
            </p>
        </div>

        <div class="flex items-center gap-3">

            <div class="search-box">
                <i data-lucide="search"></i>
                <input id="globalSearch" type="text"
                       placeholder="Rechercher un étudiant..."
                       data-i18n-ph="search_ph">
            </div>

            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" class="lang-btn active" data-lang="fr">FR</button>
                <button type="button" class="lang-btn" data-lang="ar">عربية</button>
            </div>

            <a href="{{ route('superadmin.inscriptions.index') }}" class="icon-btn" aria-label="Notifications">
                <i data-lucide="bell"></i>
                @if($pendingStudents > 0)
                    <span class="notif-dot">{{ $pendingStudents > 99 ? '99+' : $pendingStudents }}</span>
                @endif
            </a>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>
        </div>
    </header>

    <main class="page-content p-5 md:p-8">

        {{-- CARTES EN DÉGRADÉ --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

            <div class="g-card g-purple">
                <svg class="g-spark" viewBox="0 0 100 40" fill="none" aria-hidden="true">
                    <path d="M0 30 C10 8 20 36 32 20 S52 4 62 22 S82 34 100 8" stroke="rgba(255,255,255,.85)" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
                <p class="g-label" data-i18n="total_students">Total des étudiants</p>
                <p class="g-number tabular">{{ $totalStudents }}</p>
                <p class="g-sub" data-i18n="all_student_accounts">Tous les comptes étudiants</p>
            </div>

            <div class="g-card g-pink">
                <svg class="g-spark" viewBox="0 0 100 40" fill="none" aria-hidden="true">
                    <path d="M0 22 C12 34 22 6 36 18 S56 36 68 14 S88 8 100 26" stroke="rgba(255,255,255,.85)" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
                <p class="g-label" data-i18n="pending_regs">Inscriptions en attente</p>
                <p class="g-number tabular">{{ $pendingStudents }}</p>
                <p class="g-sub" data-i18n="to_review">À examiner par l'administration</p>
            </div>

            <div class="g-card g-blue">
                <svg class="g-spark" viewBox="0 0 100 40" fill="none" aria-hidden="true">
                    <path d="M0 32 C14 30 22 10 36 16 S58 34 70 20 S88 6 100 12" stroke="rgba(255,255,255,.85)" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
                <p class="g-label" data-i18n="confirmed_students">Étudiants confirmés</p>
                <p class="g-number tabular">{{ $confirmedStudents }}</p>
                <p class="g-sub" data-i18n="confirmed_access">Accès confirmé à la plateforme</p>
            </div>

            <div class="g-card g-orange">
                <svg class="g-spark" viewBox="0 0 100 40" fill="none" aria-hidden="true">
                    <path d="M0 16 C10 30 24 34 34 20 S54 2 66 18 S86 32 100 14" stroke="rgba(255,255,255,.85)" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
                <p class="g-label" data-i18n="formations_available">Formations disponibles</p>
                <p class="g-number tabular">{{ $totalFormations }}</p>
                <p class="g-sub" data-i18n="formations_registered">Formations enregistrées</p>
            </div>

        </div>

        {{-- GRAPHIQUE PRINCIPAL + ANNEAU --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">

            <section class="card pad xl:col-span-2">
                <div class="flex items-center justify-between gap-3 mb-5">
                    <div>
                        <h3 class="section-title" data-i18n="reg_evolution">Évolution des inscriptions</h3>
                        <p class="section-sub" data-i18n="regs_per_month">Nombre d'inscriptions par mois</p>
                    </div>
                    <span class="pill" data-i18n="last_6">6 derniers mois</span>
                </div>

                <div class="chart-container">
                    <canvas id="registrationsChart"></canvas>
                </div>
            </section>

            <section class="card pad">
                <div class="mb-3">
                    <h3 class="section-title" data-i18n="student_status">Statut des étudiants</h3>
                    <p class="section-sub" data-i18n="regs_breakdown">Répartition des inscriptions</p>
                </div>

                <div class="chart-donut">
                    <canvas id="statusChart"></canvas>
                </div>

                <div class="donut-legend">
                    <div>
                        <div class="pct" style="color:#fbbf24;">{{ $pct($pendingStudents) }}%</div>
                        <div class="lbl"><span class="dot" style="background:#f59e0b"></span><span data-i18n="ch_pending">En attente</span></div>
                    </div>
                    <div>
                        <div class="pct" style="color:#60a5fa;">{{ $pct($acceptedStudents) }}%</div>
                        <div class="lbl"><span class="dot" style="background:#3b82f6"></span><span data-i18n="ch_accepted">Acceptés</span></div>
                    </div>
                    <div>
                        <div class="pct" style="color:#4ade80;">{{ $pct($confirmedStudents) }}%</div>
                        <div class="lbl"><span class="dot" style="background:#4ade80"></span><span data-i18n="ch_confirmed">Confirmés</span></div>
                    </div>
                    <div>
                        <div class="pct" style="color:#fb7185;">{{ $pct($rejectedStudents) }}%</div>
                        <div class="lbl"><span class="dot" style="background:#f43f5e"></span><span data-i18n="ch_rejected">Refusés</span></div>
                    </div>
                </div>
            </section>

        </div>

        {{-- ADMINISTRATEURS + ACCEPTÉES + REFUSÉES --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

            <div class="mini-card">
                <div class="min-w-0">
                    <p class="text-[13px] font-medium" style="color: var(--muted);" data-i18n="admins">Administrateurs</p>
                    <h3 class="tabular text-2xl font-extrabold mt-1.5" style="color: var(--text);">{{ $totalAdmins }}</h3>
                    <a href="{{ route('superadmin.administrateurs.index') }}" class="link-arrow mt-3">
                        <span data-i18n="manage_admins">Gérer les administrateurs</span>
                        <i data-lucide="arrow-right" class="rtl-flip"></i>
                    </a>
                </div>
                <div class="icon-box" style="background: rgba(129,140,248,.15); color:#a5b4fc;">
                    <i data-lucide="shield-check"></i>
                </div>
            </div>

            <div class="mini-card">
                <div>
                    <p class="text-[13px] font-medium" style="color: var(--muted);" data-i18n="accepted_regs">Inscriptions acceptées</p>
                    <h3 class="tabular text-2xl font-extrabold mt-1.5" style="color: var(--text);">{{ $acceptedStudents }}</h3>
                    <p class="text-xs mt-1" style="color: var(--faint);" data-i18n="awaiting_final">En attente de confirmation finale</p>
                </div>
                <div class="icon-box" style="background: rgba(59,130,246,.15); color:#60a5fa;">
                    <i data-lucide="check-check"></i>
                </div>
            </div>

            <div class="mini-card">
                <div>
                    <p class="text-[13px] font-medium" style="color: var(--muted);" data-i18n="rejected_regs">Inscriptions refusées</p>
                    <h3 class="tabular text-2xl font-extrabold mt-1.5" style="color: var(--text);">{{ $rejectedStudents }}</h3>
                    <p class="text-xs mt-1" style="color: var(--faint);" data-i18n="not_retained">Demandes non retenues</p>
                </div>
                <div class="icon-box" style="background: rgba(244,63,94,.15); color:#fb7185;">
                    <i data-lucide="user-x"></i>
                </div>
            </div>

        </div>

        {{-- ÉTUDIANTS PAR FORMATION + ACTIVITÉS RÉCENTES --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">

            <section class="card pad xl:col-span-2">
                <div class="mb-5">
                    <h3 class="section-title" data-i18n="students_per_formation">Étudiants par formation</h3>
                    <p class="section-sub" data-i18n="students_per_formation_desc">Nombre d'étudiants ayant une formation activée</p>
                </div>

                <div class="chart-container">
                    <canvas id="formationStudentsChart"></canvas>
                </div>
            </section>

            <section class="card pad">
                <div class="mb-2">
                    <h3 class="section-title" data-i18n="recent_activities">Activités récentes</h3>
                    <p class="section-sub" data-i18n="recent_activities_desc">Derniers étudiants inscrits</p>
                </div>

                @forelse($latestStudents->take(5) as $student)
                    @php $st = $student->status ?? 'pending'; @endphp

                    <div class="activity">
                        <div class="a-icon {{ $statusClasses[$st] ?? 'st-other' }}">
                            <i data-lucide="{{ $statusIcons[$st] ?? 'user' }}"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="a-name truncate">{{ $student->name }}</p>
                            <p class="a-meta"
                               @if(isset($statusLabels[$st])) data-i18n="st_{{ $st }}" @endif>
                                {{ $statusLabels[$st] ?? $st }}
                            </p>
                        </div>

                        <span class="tabular text-[11px] whitespace-nowrap" style="color: var(--faint);">
                            {{ $student->created_at?->format('d/m/Y') ?? '—' }}
                        </span>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <div class="empty-box"><i data-lucide="users"></i></div>
                        <p class="text-sm font-semibold" style="color: var(--muted);" data-i18n="no_regs">
                            Aucune inscription pour le moment
                        </p>
                    </div>
                @endforelse
            </section>

        </div>

        {{-- DÉTAIL PAR FORMATION --}}
        <section class="card overflow-hidden mb-6">

            <div class="px-5 md:px-6 py-5">
                <h3 class="section-title" data-i18n="formation_detail">Détail des formations</h3>
                <p class="section-sub" data-i18n="formation_detail_desc">Nombre total d'étudiants et formations activées</p>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th data-i18n="th_formation">Formation</th>
                            <th data-i18n="th_category">Catégorie</th>
                            <th data-i18n="th_enrolled">Étudiants inscrits</th>
                            <th data-i18n="th_activated">Formations activées</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($formationsStats as $formation)
                            <tr>
                                <td>
                                    <span class="font-semibold">{{ $formation->name }}</span>
                                </td>

                                <td>
                                    <span class="badge badge-plain"
                                          @if(!$formation->category) data-i18n="uncategorized" @endif>
                                        {{ $formation->category ?: 'Non classée' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="tabular inline-flex items-center gap-2 font-bold" style="color:#60a5fa;">
                                        <i data-lucide="users" class="w-4 h-4"></i>
                                        {{ $formation->total_students_count }}
                                    </span>
                                </td>

                                <td>
                                    <span class="tabular inline-flex items-center gap-2 font-bold" style="color:#4ade80;">
                                        <i data-lucide="user-check" class="w-4 h-4"></i>
                                        {{ $formation->active_students_count }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="!py-12 text-center">
                                    <div class="empty-box"><i data-lucide="book-open"></i></div>
                                    <p class="text-sm font-semibold" style="color: var(--muted);" data-i18n="no_formation">
                                        Aucune formation disponible
                                    </p>
                                    <p class="text-xs mt-1" style="color: var(--faint);" data-i18n="no_formation_desc">
                                        Les statistiques apparaîtront lorsque les formations seront enregistrées.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- DERNIÈRES INSCRIPTIONS --}}
        <section class="card overflow-hidden">

            <div class="px-5 md:px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div>
                    <h3 class="section-title" data-i18n="latest_regs">Dernières inscriptions</h3>
                    <p class="section-sub" data-i18n="latest_regs_desc">Les derniers étudiants inscrits sur la plateforme</p>
                </div>

                <a href="{{ route('superadmin.inscriptions.index') }}" class="btn-soft">
                    <span data-i18n="view_regs">Voir les inscriptions</span>
                    <i data-lucide="arrow-up-right" class="w-4 h-4 rtl-flip"></i>
                </a>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th data-i18n="th_student">Étudiant</th>
                            <th data-i18n="th_email">Email</th>
                            <th data-i18n="th_date">Date d'inscription</th>
                            <th data-i18n="th_status">Statut</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($latestStudents as $student)
                            @php $status = $student->status ?? 'pending'; @endphp

                            <tr class="reg-row"
                                data-search="{{ strtolower(($student->name ?? '') . ' ' . ($student->email ?? '')) }}">

                                <td class="whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl flex items-center justify-center font-bold text-sm"
                                             style="background: rgba(74,222,128,.14); color:#4ade80;">
                                            {{ strtoupper(substr($student->name ?? '?', 0, 1)) }}
                                        </div>
                                        <span class="font-semibold">{{ $student->name }}</span>
                                    </div>
                                </td>

                                <td class="muted whitespace-nowrap">{{ $student->email }}</td>

                                <td class="tabular muted whitespace-nowrap">
                                    {{ $student->created_at?->format('d/m/Y') ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap">
                                    <span class="badge {{ $statusClasses[$status] ?? 'st-other' }}"
                                          @if(isset($statusLabels[$status])) data-i18n="st_{{ $status }}" @endif>
                                        {{ $statusLabels[$status] ?? $status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="!py-12 text-center">
                                    <div class="empty-box"><i data-lucide="users"></i></div>
                                    <p class="text-sm font-semibold" style="color: var(--muted);" data-i18n="no_regs">
                                        Aucune inscription pour le moment
                                    </p>
                                    <p class="text-xs mt-1" style="color: var(--faint);" data-i18n="no_regs_desc">
                                        Les nouveaux étudiants apparaîtront ici.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

        {{-- FOOTER --}}
        <footer class="text-center text-xs mt-10 pb-3" style="color: var(--faint);">
            © {{ date('Y') }} ÉtudeEnLigne. <span data-i18n="rights">Tous droits réservés.</span>
        </footer>

    </main>
</div>

{{-- JAVASCRIPT --}}
<script>
    lucide.createIcons();

    // =========================================================
    // TRADUCTIONS  FR / AR
    // =========================================================
    const I18N = {
        page_title: { fr: 'Super Admin | ÉtudeEnLigne', ar: 'المشرف العام | ÉtudeEnLigne' },

        super_admin: { fr: 'Super Administration', ar: 'الإدارة العليا' },
        super_admin_role: { fr: 'Super Administrateur', ar: 'المشرف العام' },
        main_menu: { fr: 'Menu principal', ar: 'القائمة الرئيسية' },
        dashboard: { fr: 'Tableau de bord', ar: 'لوحة التحكم' },
        admins: { fr: 'Administrateurs', ar: 'المشرفون' },
        registrations: { fr: 'Inscriptions', ar: 'التسجيلات' },
        account: { fr: 'Compte', ar: 'الحساب' },
        settings: { fr: 'Paramètres', ar: 'الإعدادات' },
        logout: { fr: 'Déconnexion', ar: 'تسجيل الخروج' },

        welcome: { fr: 'Bienvenue,', ar: 'مرحباً،' },
        overview: { fr: "Voici un aperçu de votre plateforme aujourd'hui.", ar: 'إليك نظرة عامة على منصتك اليوم.' },
        search_ph: { fr: 'Rechercher un étudiant...', ar: 'ابحث عن طالب...' },

        total_students: { fr: 'Total des étudiants', ar: 'إجمالي الطلاب' },
        all_student_accounts: { fr: 'Tous les comptes étudiants', ar: 'جميع حسابات الطلاب' },
        pending_regs: { fr: 'Inscriptions en attente', ar: 'التسجيلات قيد الانتظار' },
        to_review: { fr: "À examiner par l'administration", ar: 'بانتظار مراجعة الإدارة' },
        confirmed_students: { fr: 'Étudiants confirmés', ar: 'الطلاب المؤكَّدون' },
        confirmed_access: { fr: 'Accès confirmé à la plateforme', ar: 'وصول مؤكَّد إلى المنصة' },
        formations_available: { fr: 'Formations disponibles', ar: 'التكوينات المتاحة' },
        formations_registered: { fr: 'Formations enregistrées', ar: 'التكوينات المسجَّلة' },

        manage_admins: { fr: 'Gérer les administrateurs', ar: 'إدارة المشرفين' },
        accepted_regs: { fr: 'Inscriptions acceptées', ar: 'التسجيلات المقبولة' },
        awaiting_final: { fr: 'En attente de confirmation finale', ar: 'بانتظار التأكيد النهائي' },
        rejected_regs: { fr: 'Inscriptions refusées', ar: 'التسجيلات المرفوضة' },
        not_retained: { fr: 'Demandes non retenues', ar: 'طلبات غير مقبولة' },

        reg_evolution: { fr: 'Évolution des inscriptions', ar: 'تطور التسجيلات' },
        regs_per_month: { fr: "Nombre d'inscriptions par mois", ar: 'عدد التسجيلات حسب الشهر' },
        last_6: { fr: '6 derniers mois', ar: 'آخر 6 أشهر' },
        student_status: { fr: 'Statut des étudiants', ar: 'حالة الطلاب' },
        regs_breakdown: { fr: 'Répartition des inscriptions', ar: 'توزيع التسجيلات' },

        students_per_formation: { fr: 'Étudiants par formation', ar: 'الطلاب حسب التكوين' },
        students_per_formation_desc: {
            fr: "Nombre d'étudiants ayant une formation activée",
            ar: 'عدد الطلاب الذين فُعِّل لهم تكوين'
        },
        recent_activities: { fr: 'Activités récentes', ar: 'الأنشطة الأخيرة' },
        recent_activities_desc: { fr: 'Derniers étudiants inscrits', ar: 'آخر الطلاب المسجلين' },

        formation_detail: { fr: 'Détail des formations', ar: 'تفاصيل التكوينات' },
        formation_detail_desc: {
            fr: "Nombre total d'étudiants et formations activées",
            ar: 'العدد الإجمالي للطلاب والتكوينات المفعّلة'
        },
        th_formation: { fr: 'Formation', ar: 'التكوين' },
        th_category: { fr: 'Catégorie', ar: 'الفئة' },
        th_enrolled: { fr: 'Étudiants inscrits', ar: 'الطلاب المسجلون' },
        th_activated: { fr: 'Formations activées', ar: 'التكوينات المفعّلة' },
        uncategorized: { fr: 'Non classée', ar: 'غير مصنفة' },
        no_formation: { fr: 'Aucune formation disponible', ar: 'لا توجد تكوينات متاحة' },
        no_formation_desc: {
            fr: 'Les statistiques apparaîtront lorsque les formations seront enregistrées.',
            ar: 'ستظهر الإحصائيات عند تسجيل التكوينات.'
        },

        latest_regs: { fr: 'Dernières inscriptions', ar: 'آخر التسجيلات' },
        latest_regs_desc: {
            fr: 'Les derniers étudiants inscrits sur la plateforme',
            ar: 'آخر الطلاب المسجلين في المنصة'
        },
        view_regs: { fr: 'Voir les inscriptions', ar: 'عرض التسجيلات' },
        th_student: { fr: 'Étudiant', ar: 'الطالب' },
        th_email: { fr: 'Email', ar: 'البريد الإلكتروني' },
        th_date: { fr: "Date d'inscription", ar: 'تاريخ التسجيل' },
        th_status: { fr: 'Statut', ar: 'الحالة' },
        st_pending: { fr: 'En attente', ar: 'قيد الانتظار' },
        st_accepted: { fr: 'Accepté', ar: 'مقبول' },
        st_confirmed: { fr: 'Confirmé', ar: 'مؤكَّد' },
        st_rejected: { fr: 'Refusé', ar: 'مرفوض' },
        no_regs: { fr: 'Aucune inscription pour le moment', ar: 'لا توجد تسجيلات حالياً' },
        no_regs_desc: { fr: 'Les nouveaux étudiants apparaîtront ici.', ar: 'سيظهر الطلاب الجدد هنا.' },
        rights: { fr: 'Tous droits réservés.', ar: 'جميع الحقوق محفوظة.' },

        // Graphiques
        ch_registrations: { fr: 'Inscriptions', ar: 'التسجيلات' },
        ch_pending: { fr: 'En attente', ar: 'قيد الانتظار' },
        ch_accepted: { fr: 'Acceptés', ar: 'مقبولون' },
        ch_confirmed: { fr: 'Confirmés', ar: 'مؤكَّدون' },
        ch_rejected: { fr: 'Refusés', ar: 'مرفوضون' },
        ch_active_students: { fr: 'Étudiants actifs', ar: 'الطلاب النشطون' }
    };

    let currentLang = 'fr';
    try {
        const saved = localStorage.getItem('dashboard_lang');
        if (saved === 'fr' || saved === 'ar') currentLang = saved;
    } catch (e) { /* stockage indisponible */ }

    function t(key) {
        const entry = I18N[key];
        if (!entry) return key;
        return entry[currentLang] ?? entry.fr ?? key;
    }

    // =========================================================
    // CHART.JS — thème sombre
    // =========================================================
    Chart.defaults.font.family = "'Plus Jakarta Sans', 'Cairo', sans-serif";
    Chart.defaults.font.size = 11;
    Chart.defaults.color = '#8fc7b2';

    const GRID = '#14604a';

    const tooltipStyle = {
        backgroundColor: '#021710',
        titleColor: '#ffffff',
        bodyColor: '#d6dae1',
        borderColor: '#14604a',
        borderWidth: 1,
        padding: 12,
        cornerRadius: 10,
        displayColors: false,
        titleFont: { weight: '600', size: 12 },
        bodyFont: { size: 12 }
    };

    let registrationsChart = null;
    let statusChart = null;
    let formationChart = null;

    // INSCRIPTIONS PAR MOIS (courbe verte)
    const monthlyLabels = @json($monthlyLabels);
    const monthlyCounts = @json($monthlyCounts);

    function getMonthLabels() {
        return monthlyLabels.map(function (item) {
            if (typeof item === 'string') return item;
            return item[currentLang] ?? item.fr ?? item.ar ?? '';
        });
    }

    const registrationValues = monthlyCounts.map(function (value) {
        return Number(value) || 0;
    });

    const registrationsCanvas = document.getElementById('registrationsChart');

    if (registrationsCanvas) {
        const ctx = registrationsCanvas.getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 290);
        gradient.addColorStop(0, 'rgba(74, 222, 128, 0.30)');
        gradient.addColorStop(1, 'rgba(74, 222, 128, 0)');

        registrationsChart = new Chart(registrationsCanvas, {
            type: 'line',
            data: {
                labels: getMonthLabels(),
                datasets: [{
                    label: t('ch_registrations'),
                    data: registrationValues,
                    borderColor: '#4ade80',
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.35,
                    borderWidth: 2.5,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#0a3427',
                    pointBorderColor: '#4ade80',
                    pointBorderWidth: 2.5,
                    pointHoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { display: false },
                    tooltip: tooltipStyle
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, padding: 8 },
                        grid: { color: GRID, drawTicks: false },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { padding: 6 }
                    }
                }
            }
        });
    }

    // STATUT DES ÉTUDIANTS (anneau)
    const statusCanvas = document.getElementById('statusChart');

    if (statusCanvas) {
        statusChart = new Chart(statusCanvas, {
            type: 'doughnut',
            data: {
                labels: [t('ch_pending'), t('ch_accepted'), t('ch_confirmed'), t('ch_rejected')],
                datasets: [{
                    data: [
                        {{ $pendingStudents }},
                        {{ $acceptedStudents }},
                        {{ $confirmedStudents }},
                        {{ $rejectedStudents }}
                    ],
                    backgroundColor: ['#f59e0b', '#3b82f6', '#4ade80', '#f43f5e'],
                    borderColor: '#0a3427',
                    borderWidth: 4,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: { display: false },
                    tooltip: { ...tooltipStyle, displayColors: true, boxPadding: 4 }
                }
            }
        });
    }

    // ÉTUDIANTS PAR FORMATION
    const formationLabels = @json($formationLabels);
    const formationStudentCounts = @json($formationStudentCounts);

    const formationCanvas = document.getElementById('formationStudentsChart');

    if (formationCanvas) {
        formationChart = new Chart(formationCanvas, {
            type: 'bar',
            data: {
                labels: formationLabels,
                datasets: [{
                    label: t('ch_active_students'),
                    data: formationStudentCounts,
                    backgroundColor: '#4ade80',
                    hoverBackgroundColor: '#86efac',
                    borderRadius: 8,
                    borderSkipped: false,
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: tooltipStyle,
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            padding: 16,
                            color: '#8fc7b2',
                            font: { size: 11, weight: '500' }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, padding: 8 },
                        grid: { color: GRID, drawTicks: false },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 35,
                            minRotation: 0
                        }
                    }
                }
            }
        });
    }

    // =========================================================
    // CHANGEMENT DE LANGUE
    // =========================================================
    function updateCharts() {
        const isRtl = currentLang === 'ar';

        if (registrationsChart) {
            registrationsChart.data.labels = getMonthLabels();
            registrationsChart.data.datasets[0].label = t('ch_registrations');
            registrationsChart.options.scales.x.reverse = isRtl;
            registrationsChart.options.scales.y.position = isRtl ? 'right' : 'left';
            registrationsChart.update();
        }

        if (statusChart) {
            statusChart.data.labels = [t('ch_pending'), t('ch_accepted'), t('ch_confirmed'), t('ch_rejected')];
            statusChart.update();
        }

        if (formationChart) {
            formationChart.data.datasets[0].label = t('ch_active_students');
            formationChart.options.scales.x.reverse = isRtl;
            formationChart.options.scales.y.position = isRtl ? 'right' : 'left';
            formationChart.options.plugins.legend.rtl = isRtl;
            formationChart.update();
        }
    }

    function applyLang(lang) {
        currentLang = lang;

        try { localStorage.setItem('dashboard_lang', lang); } catch (e) { /* ignoré */ }

        const root = document.documentElement;
        root.lang = lang;
        root.dir = lang === 'ar' ? 'rtl' : 'ltr';
        document.title = t('page_title');

        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            el.textContent = t(el.getAttribute('data-i18n'));
        });

        document.querySelectorAll('[data-i18n-ph]').forEach(function (el) {
            el.placeholder = t(el.getAttribute('data-i18n-ph'));
        });

        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });

        updateCharts();
    }

    document.querySelectorAll('.lang-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            applyLang(btn.getAttribute('data-lang'));
        });
    });

    // Recherche instantanée dans « Dernières inscriptions »
    const globalSearch = document.getElementById('globalSearch');

    if (globalSearch) {
        globalSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();

            document.querySelectorAll('.reg-row').forEach(function (row) {
                const content = (row.dataset.search || '').toLowerCase();
                row.style.display = content.includes(query) ? '' : 'none';
            });
        });
    }

    // Application de la langue enregistrée au chargement
    applyLang(currentLang);
</script>

</body>
</html>