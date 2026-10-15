<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin | ÉtudeEnLigne</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f7f9fc;
            --surface: #ffffff;
            --border: #e8edf3;
            --border-soft: #f1f5f9;
            --text: #172033;
            --muted: #64748b;
            --faint: #94a3b8;
            --brand: #10b981;
            --brand-dark: #059669;
            --brand-soft: #ecfdf5;
            --radius-lg: 18px;
            --shadow-sm: 0 1px 2px rgba(15, 23, 42, .04);
            --shadow-md: 0 10px 28px -10px rgba(15, 23, 42, .14);
        }

        * {
            box-sizing: border-box;
        }

        html {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Plus Jakarta Sans pour le latin, Cairo pour l'arabe (repli automatique par caractère) */
        body {
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            letter-spacing: -0.005em;
        }

        /* L'arabe ne supporte pas l'espacement des lettres */
        html[lang="ar"] * {
            letter-spacing: 0 !important;
        }

        .tabular {
            font-variant-numeric: tabular-nums;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 260px;
            background: var(--surface);
            border-inline-end: 1px solid var(--border);
            position: fixed;
            inset-block: 0;
            inset-inline-start: 0;
            z-index: 40;
            padding: 24px 16px 96px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar::-webkit-scrollbar {
            width: 0;
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 8px 24px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-soft);
            text-decoration: none;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            box-shadow: 0 6px 14px -4px rgba(16, 185, 129, .45);
            flex-shrink: 0;
        }

        /* Logo CAD Academy : l'image d'origine (1000x1000 avec marges) est recadrée en CSS */
        .logo-crop {
            position: relative;
            overflow: hidden;
            background: #f7f7f7;
            border-radius: 12px;
        }

        .logo-crop img {
            display: block;
            max-width: none;
        }

        /* Logo complet (icône + texte) */
        .logo-full {
            width: 100%;
            max-width: 200px;
            aspect-ratio: 950 / 400;
        }

        .logo-full img {
            width: 105.263%;
            margin-left: -2.632%;
            margin-top: -31.579%;
        }

        /* Icône seule (sidebar réduite) */
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

        .brand-text {
            flex: 1;
            min-width: 0;
        }

        .nav-label {
            font-size: 10.5px;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--faint);
            font-weight: 700;
            padding: 0 12px;
            margin-bottom: 8px;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            margin-bottom: 4px;
            border-radius: 999px;
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
            background: #f8fafc;
            color: var(--text);
        }

        .nav-link.active {
            background: var(--brand-soft);
            color: var(--brand-dark);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            inset-inline-start: -16px;
            top: 9px;
            bottom: 9px;
            width: 3px;
            border-radius: 0 4px 4px 0;
            background: var(--brand);
        }

        [dir="rtl"] .nav-link.active::before {
            border-radius: 4px 0 0 4px;
        }

        .sidebar-user {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 16px;
            background: var(--surface);
            border-top: 1px solid var(--border-soft);
        }

        /* ---------- LAYOUT ---------- */
        .main-content {
            margin-inline-start: 260px;
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(255, 255, 255, .85);
            backdrop-filter: saturate(180%) blur(12px);
            -webkit-backdrop-filter: saturate(180%) blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .page-content {
            max-width: 1440px;
            margin: 0 auto;
        }

        /* ---------- SÉLECTEUR DE LANGUE ---------- */
        .lang-switch {
            display: inline-flex;
            padding: 3px;
            background: #f1f5f9;
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
            padding: 6px 14px;
            border-radius: 999px;
            transition: all .18s ease;
        }

        .lang-btn:hover {
            color: var(--text);
        }

        .lang-btn.active {
            background: #fff;
            color: var(--brand-dark);
            box-shadow: 0 1px 3px rgba(15, 23, 42, .10);
        }

        /* ---------- BANNIÈRE ---------- */
        .welcome-banner {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            padding: 26px 28px;
            background: linear-gradient(120deg, #059669 0%, #10b981 100%);
            color: #fff;
            box-shadow: 0 14px 30px -14px rgba(5, 150, 105, .55);
        }

        .welcome-banner::before,
        .welcome-banner::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, .10);
            pointer-events: none;
        }

        .welcome-banner::before {
            width: 220px;
            height: 220px;
            top: -90px;
            inset-inline-end: -50px;
        }

        .welcome-banner::after {
            width: 120px;
            height: 120px;
            bottom: -60px;
            inset-inline-end: 140px;
        }

        .banner-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            border: 1px solid rgba(255, 255, 255, .25);
            color: #fff;
            position: relative;
            z-index: 1;
        }

        /* ---------- CARDS ---------- */
        .stat-card,
        .chart-card,
        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            min-width: 0;
        }

        .stat-card,
        .chart-card {
            padding: 22px;
        }

        .stat-card {
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            border-color: #dde4ed;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .icon-box svg {
            width: 20px;
            height: 20px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 999px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.01em;
        }

        .section-sub {
            font-size: 12px;
            color: var(--faint);
            margin-top: 3px;
        }

        .chart-container {
            position: relative;
            height: 280px;
            width: 100%;
        }

        /* ---------- TABLES ---------- */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: start;
        }

        .data-table thead th {
            background: #fafbfd;
            border-top: 1px solid var(--border-soft);
            border-bottom: 1px solid var(--border);
            padding: 12px 24px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--muted);
            white-space: nowrap;
            text-align: start;
        }

        .data-table tbody td {
            padding: 14px 24px;
            border-bottom: 1px solid var(--border-soft);
            vertical-align: middle;
            text-align: start;
        }

        .data-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .data-table tbody tr {
            transition: background .15s ease;
        }

        .data-table tbody tr:hover {
            background: #fafbfd;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 700;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: currentColor;
            opacity: .85;
        }

        .badge-plain::before {
            display: none;
        }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--brand-dark);
            background: var(--brand-soft);
            padding: 9px 16px;
            border-radius: 999px;
            text-decoration: none;
            transition: background .18s ease;
        }

        .btn-soft:hover {
            background: #d1fae5;
        }

        .link-arrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--brand-dark);
            text-decoration: none;
        }

        .link-arrow svg {
            width: 15px;
            height: 15px;
            transition: transform .18s ease;
        }

        .link-arrow:hover svg {
            transform: translateX(3px);
        }

        /* Les flèches se retournent en mode arabe */
        [dir="rtl"] .rtl-flip {
            transform: scaleX(-1);
        }

        [dir="rtl"] .link-arrow:hover svg {
            transform: scaleX(-1) translateX(3px);
        }

        .live-dot {
            position: relative;
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #fff;
        }

        .live-dot::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 999px;
            background: #fff;
            opacity: .45;
            animation: ping 1.8s cubic-bezier(0, 0, .2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1023px) {
            .sidebar {
                width: 72px;
                padding: 20px 10px 96px;
            }

            .sidebar .brand-text,
            .sidebar .nav-text,
            .sidebar .nav-label,
            .sidebar .sidebar-bottom-text {
                display: none;
            }

            .brand-link {
                justify-content: center;
                padding: 4px 0 20px;
            }

            .logo-mark {
                display: block;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 12px 8px;
            }

            .nav-link.active::before {
                inset-inline-start: -10px;
            }

            .sidebar-user {
                padding: 12px 8px;
            }

            .sidebar-user>div {
                justify-content: center;
            }

            .main-content {
                margin-inline-start: 72px;
            }

            .data-table thead th,
            .data-table tbody td {
                padding-left: 18px;
                padding-right: 18px;
            }
        }

        @media (max-width: 640px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-inline-start: 0;
            }

            .page-content {
                padding: 16px !important;
            }

            .chart-container {
                height: 240px;
            }

            .welcome-banner {
                padding: 20px;
            }
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
@endphp

{{-- SIDEBAR --}}
<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}" class="brand-link">
        {{-- Logo complet (sidebar large) --}}
        <div class="brand-text">
            <div class="logo-crop logo-full">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy">
            </div>
            <div class="text-[11px] text-gray-400 mt-2.5 px-0.5" data-i18n="super_admin">Super Administration</div>
        </div>

        {{-- Icône seule (sidebar réduite) --}}
        <div class="logo-crop logo-mark">
            <img src="{{ asset('images/cad-academy-logo.png') }}" alt="CAD Academy">
        </div>
    </a>

    <div class="nav-label" data-i18n="main_menu">Menu principal</div>

    {{-- TABLEAU DE BORD --}}
    <a href="{{ route('superadmin.dashboard') }}"
       class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
        <i data-lucide="layout-dashboard"></i>
        <span class="nav-text" data-i18n="dashboard">Tableau de bord</span>
    </a>

    {{-- ADMINISTRATEURS --}}
    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="nav-link {{ request()->routeIs('superadmin.administrateurs.*') ? 'active' : '' }}">
        <i data-lucide="shield-check"></i>
        <span class="nav-text" data-i18n="admins">Administrateurs</span>
    </a>

    {{-- INSCRIPTIONS --}}
    <a href="{{ route('superadmin.inscriptions.index') }}"
       class="nav-link {{ request()->routeIs('superadmin.inscriptions.*') ? 'active' : '' }}">
        <i data-lucide="users"></i>
        <span class="nav-text" data-i18n="registrations">Inscriptions</span>
    </a>

    {{-- COMPTE --}}
    <div class="nav-label" style="margin-top: 28px;" data-i18n="account">Compte</div>

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

    {{-- COMPTE CONNECTÉ --}}
    <div class="sidebar-user">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0 sidebar-bottom-text">
                <p class="text-xs font-semibold text-gray-800 truncate">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-[11px] text-gray-400" data-i18n="super_admin_role">Super Administrateur</p>
            </div>
        </div>
    </div>

</aside>

{{-- CONTENU PRINCIPAL --}}
<div class="main-content">

    {{-- HEADER --}}
    <header class="topbar px-5 md:px-8 py-4 flex items-center justify-between gap-4">
        <div>
            <p class="text-xs text-gray-400 mb-0.5">
                ÉtudeEnLigne <span class="mx-1">/</span> <span data-i18n="super_admin">Super Administration</span>
            </p>
            <h1 class="text-xl font-bold text-gray-900 tracking-tight" data-i18n="dashboard">
                Tableau de bord
            </h1>
        </div>

        <div class="flex items-center gap-3 sm:gap-4">

            {{-- SÉLECTEUR DE LANGUE --}}
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" class="lang-btn active" data-lang="fr">FR</button>
                <button type="button" class="lang-btn" data-lang="ar">عربية</button>
            </div>

            <div class="hidden sm:block text-end">
                <p class="text-sm font-semibold text-gray-800 leading-tight">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-xs text-gray-400" data-i18n="super_admin_role">Super Administrateur</p>
            </div>

            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>
        </div>
    </header>

    <main class="page-content p-5 md:p-8">

        {{-- BIENVENUE --}}
        <div class="welcome-banner flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-7">
            <div class="relative z-10">
                <h2 class="text-xl font-bold tracking-tight">
                    <span data-i18n="hello">Bonjour,</span> {{ auth()->user()->name ?? 'Super Admin' }}
                </h2>
                <p class="text-sm text-emerald-50 mt-1.5" data-i18n="overview">
                    Voici un aperçu de votre plateforme aujourd'hui.
                </p>
            </div>

            <span class="banner-pill w-fit">
                <span class="live-dot"></span>
                <span data-i18n="platform_active">Plateforme active</span>
            </span>
        </div>

        {{-- STATISTIQUES PRINCIPALES --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-5">

            {{-- TOTAL ÉTUDIANTS --}}
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <div class="icon-box bg-blue-50 text-blue-600">
                        <i data-lucide="users"></i>
                    </div>
                    <span class="pill bg-gray-50 text-gray-500" data-i18n="total">Total</span>
                </div>
                <p class="text-[13px] font-medium text-gray-500 mt-5" data-i18n="total_students">Total des étudiants</p>
                <h3 class="tabular text-3xl font-bold text-gray-900 mt-1.5 tracking-tight">{{ $totalStudents }}</h3>
                <p class="text-xs text-gray-400 mt-2" data-i18n="all_student_accounts">Tous les comptes étudiants</p>
            </div>

            {{-- INSCRIPTIONS EN ATTENTE --}}
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <div class="icon-box bg-amber-50 text-amber-600">
                        <i data-lucide="clock-3"></i>
                    </div>
                    <span class="pill bg-amber-50 text-amber-700" data-i18n="pending_badge">En attente</span>
                </div>
                <p class="text-[13px] font-medium text-gray-500 mt-5" data-i18n="pending_regs">Inscriptions en attente</p>
                <h3 class="tabular text-3xl font-bold text-gray-900 mt-1.5 tracking-tight">{{ $pendingStudents }}</h3>
                <p class="text-xs text-gray-400 mt-2" data-i18n="to_review">À examiner par l'administration</p>
            </div>

            {{-- ÉTUDIANTS CONFIRMÉS --}}
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <div class="icon-box bg-emerald-50 text-emerald-600">
                        <i data-lucide="user-check"></i>
                    </div>
                    <span class="pill bg-emerald-50 text-emerald-700" data-i18n="confirmed_badge">Confirmés</span>
                </div>
                <p class="text-[13px] font-medium text-gray-500 mt-5" data-i18n="confirmed_students">Étudiants confirmés</p>
                <h3 class="tabular text-3xl font-bold text-gray-900 mt-1.5 tracking-tight">{{ $confirmedStudents }}</h3>
                <p class="text-xs text-gray-400 mt-2" data-i18n="confirmed_access">Accès confirmé à la plateforme</p>
            </div>

            {{-- TOTAL FORMATIONS --}}
            <div class="stat-card">
                <div class="flex justify-between items-start">
                    <div class="icon-box bg-purple-50 text-purple-600">
                        <i data-lucide="book-open"></i>
                    </div>
                    <span class="pill bg-purple-50 text-purple-700" data-i18n="content">Contenu</span>
                </div>
                <p class="text-[13px] font-medium text-gray-500 mt-5" data-i18n="formations_available">Formations disponibles</p>
                <h3 class="tabular text-3xl font-bold text-gray-900 mt-1.5 tracking-tight">{{ $totalFormations }}</h3>
                <p class="text-xs text-gray-400 mt-2" data-i18n="formations_registered">Formations enregistrées</p>
            </div>

        </div>

        {{-- STATISTIQUES ADMINISTRATEURS --}}
        <div class="stat-card mb-5">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-[13px] font-medium text-gray-500" data-i18n="admins">Administrateurs</p>
                    <h3 class="tabular text-3xl font-bold text-gray-900 mt-1.5 tracking-tight">{{ $totalAdmins }}</h3>
                    <p class="text-xs text-gray-400 mt-2" data-i18n="admins_desc">
                        Comptes administrateurs de la plateforme
                    </p>

                    <a href="{{ route('superadmin.administrateurs.index') }}" class="link-arrow mt-4">
                        <span data-i18n="manage_admins">Gérer les administrateurs</span>
                        <i data-lucide="arrow-right" class="rtl-flip"></i>
                    </a>
                </div>

                <div class="icon-box !w-12 !h-12 !rounded-2xl bg-indigo-50 text-indigo-600">
                    <i data-lucide="shield-check" style="width:24px;height:24px"></i>
                </div>
            </div>
        </div>

        {{-- STATUTS DES INSCRIPTIONS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-7">

            <div class="stat-card flex items-center justify-between gap-4">
                <div>
                    <p class="text-[13px] font-medium text-gray-500" data-i18n="accepted_regs">Inscriptions acceptées</p>
                    <h3 class="tabular text-2xl font-bold mt-1.5 text-gray-900 tracking-tight">{{ $acceptedStudents }}</h3>
                    <p class="text-xs text-gray-400 mt-1" data-i18n="awaiting_final">En attente de confirmation finale</p>
                </div>
                <div class="icon-box !w-12 !h-12 !rounded-2xl bg-sky-50 text-sky-600">
                    <i data-lucide="check-check" style="width:24px;height:24px"></i>
                </div>
            </div>

            <div class="stat-card flex items-center justify-between gap-4">
                <div>
                    <p class="text-[13px] font-medium text-gray-500" data-i18n="rejected_regs">Inscriptions refusées</p>
                    <h3 class="tabular text-2xl font-bold mt-1.5 text-gray-900 tracking-tight">{{ $rejectedStudents }}</h3>
                    <p class="text-xs text-gray-400 mt-1" data-i18n="not_retained">Demandes non retenues</p>
                </div>
                <div class="icon-box !w-12 !h-12 !rounded-2xl bg-rose-50 text-rose-600">
                    <i data-lucide="user-x" style="width:24px;height:24px"></i>
                </div>
            </div>

        </div>

        {{-- GRAPHIQUES GÉNÉRAUX --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-7">

            <section class="chart-card xl:col-span-2">
                <div class="flex items-center justify-between gap-3 mb-5">
                    <div>
                        <h3 class="section-title" data-i18n="reg_evolution">Évolution des inscriptions</h3>
                        <p class="section-sub" data-i18n="regs_per_month">Nombre d'inscriptions par mois</p>
                    </div>
                    <span class="pill bg-gray-50 text-gray-500 border border-gray-100 !py-1.5 !px-3" data-i18n="last_6">
                        6 derniers mois
                    </span>
                </div>

                <div class="chart-container">
                    <canvas id="registrationsChart"></canvas>
                </div>
            </section>

            <section class="chart-card">
                <div class="mb-5">
                    <h3 class="section-title" data-i18n="student_status">Statut des étudiants</h3>
                    <p class="section-sub" data-i18n="regs_breakdown">Répartition des inscriptions</p>
                </div>
                <div class="chart-container">
                    <canvas id="statusChart"></canvas>
                </div>
            </section>

        </div>

        {{-- STATISTIQUES PAR FORMATION --}}
        <section class="mb-7">

            <div class="mb-5">
                <h3 class="text-lg font-bold text-gray-900 tracking-tight" data-i18n="stats_by_formation">
                    Statistiques par formation
                </h3>
                <p class="text-sm text-gray-500 mt-1" data-i18n="stats_by_formation_desc">
                    Consultez le nombre d'étudiants inscrits dans chaque formation.
                </p>
            </div>

            {{-- GRAPHIQUE PAR FORMATION --}}
            <div class="chart-card mb-5">
                <div class="mb-5">
                    <h4 class="section-title" data-i18n="students_per_formation">Étudiants par formation</h4>
                    <p class="section-sub" data-i18n="students_per_formation_desc">Nombre d'étudiants ayant une formation activée</p>
                </div>

                <div class="chart-container">
                    <canvas id="formationStudentsChart"></canvas>
                </div>
            </div>

            {{-- TABLEAU PAR FORMATION --}}
            <div class="panel overflow-hidden">

                <div class="px-5 md:px-6 py-5">
                    <h4 class="section-title" data-i18n="formation_detail">Détail des formations</h4>
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
                                        <div class="font-semibold text-sm text-gray-800">
                                            {{ $formation->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-plain bg-gray-100 text-gray-600"
                                              @if(!$formation->category) data-i18n="uncategorized" @endif>
                                            {{ $formation->category ?: 'Non classée' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="tabular inline-flex items-center gap-2 text-sm font-bold text-blue-700">
                                            <i data-lucide="users" class="w-4 h-4"></i>
                                            {{ $formation->total_students_count }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="tabular inline-flex items-center gap-2 text-sm font-bold text-emerald-700">
                                            <i data-lucide="user-check" class="w-4 h-4"></i>
                                            {{ $formation->active_students_count }}
                                        </span>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="!py-12 text-center">
                                        <div class="w-12 h-12 mx-auto rounded-2xl bg-gray-50 text-gray-400 flex items-center justify-center mb-3">
                                            <i data-lucide="book-open" class="w-6 h-6"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-600" data-i18n="no_formation">
                                            Aucune formation disponible
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1" data-i18n="no_formation_desc">
                                            Les statistiques apparaîtront lorsque les formations seront enregistrées.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        {{-- DERNIÈRES INSCRIPTIONS --}}
        <section class="panel overflow-hidden">

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
                            <tr>

                                <td class="whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-sm">
                                            {{ strtoupper(substr($student->name ?? '?', 0, 1)) }}
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">
                                            {{ $student->name }}
                                        </span>
                                    </div>
                                </td>

                                <td class="text-sm text-gray-500 whitespace-nowrap">
                                    {{ $student->email }}
                                </td>

                                <td class="tabular text-sm text-gray-500 whitespace-nowrap">
                                    {{ $student->created_at?->format('d/m/Y') ?? '—' }}
                                </td>

                                <td class="whitespace-nowrap">
                                    @php
                                        $status = $student->status ?? 'pending';

                                        $statusLabels = [
                                            'pending' => 'En attente',
                                            'accepted' => 'Accepté',
                                            'confirmed' => 'Confirmé',
                                            'rejected' => 'Refusé',
                                        ];

                                        $statusClasses = [
                                            'pending' => 'bg-amber-50 text-amber-700',
                                            'accepted' => 'bg-blue-50 text-blue-700',
                                            'confirmed' => 'bg-emerald-50 text-emerald-700',
                                            'rejected' => 'bg-rose-50 text-rose-700',
                                        ];
                                    @endphp

                                    <span class="badge {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-600' }}"
                                          @if(isset($statusLabels[$status])) data-i18n="st_{{ $status }}" @endif>
                                        {{ $statusLabels[$status] ?? $status }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="!py-12 text-center">
                                    <div class="w-12 h-12 mx-auto rounded-2xl bg-gray-50 text-gray-400 flex items-center justify-center mb-3">
                                        <i data-lucide="users" class="w-6 h-6"></i>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-600" data-i18n="no_regs">
                                        Aucune inscription pour le moment
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1" data-i18n="no_regs_desc">
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
        <footer class="text-center text-xs text-gray-400 mt-10 pb-3">
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

        hello: { fr: 'Bonjour,', ar: 'مرحباً،' },
        overview: { fr: "Voici un aperçu de votre plateforme aujourd'hui.", ar: 'إليك نظرة عامة على منصتك اليوم.' },
        platform_active: { fr: 'Plateforme active', ar: 'المنصة نشطة' },

        total: { fr: 'Total', ar: 'المجموع' },
        total_students: { fr: 'Total des étudiants', ar: 'إجمالي الطلاب' },
        all_student_accounts: { fr: 'Tous les comptes étudiants', ar: 'جميع حسابات الطلاب' },
        pending_badge: { fr: 'En attente', ar: 'قيد الانتظار' },
        pending_regs: { fr: 'Inscriptions en attente', ar: 'التسجيلات قيد الانتظار' },
        to_review: { fr: "À examiner par l'administration", ar: 'بانتظار مراجعة الإدارة' },
        confirmed_badge: { fr: 'Confirmés', ar: 'مؤكَّدون' },
        confirmed_students: { fr: 'Étudiants confirmés', ar: 'الطلاب المؤكَّدون' },
        confirmed_access: { fr: 'Accès confirmé à la plateforme', ar: 'وصول مؤكَّد إلى المنصة' },
        content: { fr: 'Contenu', ar: 'المحتوى' },
        formations_available: { fr: 'Formations disponibles', ar: 'التكوينات المتاحة' },
        formations_registered: { fr: 'Formations enregistrées', ar: 'التكوينات المسجَّلة' },

        admins_desc: { fr: 'Comptes administrateurs de la plateforme', ar: 'حسابات مشرفي المنصة' },
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

        stats_by_formation: { fr: 'Statistiques par formation', ar: 'إحصائيات حسب التكوين' },
        stats_by_formation_desc: {
            fr: "Consultez le nombre d'étudiants inscrits dans chaque formation.",
            ar: 'اطّلع على عدد الطلاب المسجلين في كل تكوين.'
        },
        students_per_formation: { fr: 'Étudiants par formation', ar: 'الطلاب حسب التكوين' },
        students_per_formation_desc: {
            fr: "Nombre d'étudiants ayant une formation activée",
            ar: 'عدد الطلاب الذين فُعِّل لهم تكوين'
        },
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
    // CHART.JS — réglages globaux
    // =========================================================
    Chart.defaults.font.family = "'Plus Jakarta Sans', 'Cairo', sans-serif";
    Chart.defaults.font.size = 11;
    Chart.defaults.color = '#94a3b8';

    const tooltipStyle = {
        backgroundColor: '#172033',
        titleColor: '#fff',
        bodyColor: '#e2e8f0',
        padding: 12,
        cornerRadius: 10,
        displayColors: false,
        titleFont: { weight: '600', size: 12 },
        bodyFont: { size: 12 }
    };

    let registrationsChart = null;
    let statusChart = null;
    let formationChart = null;

    // INSCRIPTIONS PAR MOIS
    const monthlyLabels = @json($monthlyLabels);
    const monthlyCounts = @json($monthlyCounts);

    function getMonthLabels() {
        return monthlyLabels.map(function(item) {
            if (typeof item === 'string') return item;
            return item[currentLang] ?? item.fr ?? item.ar ?? '';
        });
    }

    const registrationValues = monthlyCounts.map(function(value) {
        return Number(value) || 0;
    });

    const registrationsCanvas = document.getElementById('registrationsChart');

    if (registrationsCanvas) {
        const ctx = registrationsCanvas.getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 280);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.18)');
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

        registrationsChart = new Chart(registrationsCanvas, {
            type: 'line',
            data: {
                labels: getMonthLabels(),
                datasets: [{
                    label: t('ch_registrations'),
                    data: registrationValues,
                    borderColor: '#10b981',
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2.5,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
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
                        grid: { color: '#f1f5f9' },
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

    // STATUT DES ÉTUDIANTS
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
                    backgroundColor: [
                        '#f59e0b',
                        '#3b82f6',
                        '#10b981',
                        '#f43f5e'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 3,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    tooltip: { ...tooltipStyle, displayColors: true, boxPadding: 4 },
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            padding: 16,
                            color: '#64748b',
                            font: { size: 11, weight: '500' }
                        }
                    }
                }
            }
        });
    }

    // NOMBRE D'ÉTUDIANTS PAR FORMATION
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
                    backgroundColor: '#10b981',
                    hoverBackgroundColor: '#059669',
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
                            color: '#64748b',
                            font: { size: 11, weight: '500' }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, padding: 8 },
                        grid: { color: '#f1f5f9' },
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
            statusChart.options.plugins.legend.rtl = isRtl;
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

        document.querySelectorAll('[data-i18n]').forEach(function(el) {
            el.textContent = t(el.getAttribute('data-i18n'));
        });

        document.querySelectorAll('.lang-btn').forEach(function(btn) {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });

        updateCharts();
    }

    document.querySelectorAll('.lang-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            applyLang(btn.getAttribute('data-lang'));
        });
    });

    // Application de la langue enregistrée au chargement
    applyLang(currentLang);
</script>

</body>
</html>