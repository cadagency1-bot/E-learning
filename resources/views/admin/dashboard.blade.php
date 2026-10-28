<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Cad Academy</title>

    <script>
        try {
            if (localStorage.getItem('etudierenligne_admin_language') === 'ar') {
                document.documentElement.lang = 'ar';
                document.documentElement.dir = 'rtl';
            }
        } catch (e) {}
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        arabic: ['Tajawal', 'sans-serif']
                    },
                    colors: {
                        page: '#eef3f1',
                        forest: {
                            50: '#eef5f2', 100: '#d9ebe4', 200: '#b5d7ca',
                            300: '#86bba8', 400: '#4f9a80', 500: '#2b7a5f',
                            600: '#1d6149', 700: '#154c3a', 800: '#0f3b2d',
                            900: '#0a2e23', 950: '#061c15'
                        }
                    }
                }
            }
        };
    </script>

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #eef3f1; -webkit-font-smoothing: antialiased; }
        html[lang="ar"] body { font-family: 'Tajawal', sans-serif; }
        button, a { -webkit-tap-highlight-color: transparent; }
        :focus-visible { outline: 2px solid #2b7a5f; outline-offset: 2px; }

        .sidebar {
            position: fixed; inset-block: 0; inset-inline-start: 0; z-index: 60;
            width: 272px; max-width: 86vw; display: flex; flex-direction: column;
            overflow-y: auto; background: #154c3a; color: #fff; visibility: hidden;
            transform: translateX(-100%); transition: transform .25s ease, visibility 0s linear .25s;
        }
        [dir="rtl"] .sidebar { transform: translateX(100%); }
        .sidebar.open, [dir="rtl"] .sidebar.open {
            visibility: visible; transform: none; transition: transform .25s ease, visibility 0s;
        }
        .logo-block { background: #0f3b2d; border-end-end-radius: 28px; }
        .side-link {
            display: flex; align-items: center; gap: 12px; margin-inline-start: 16px;
            padding: 11px 16px; border-start-start-radius: 16px; border-end-start-radius: 16px;
            font-size: 14px; font-weight: 600; color: #cfe6dd; transition: background-color .2s, color .2s;
        }
        .side-link:hover { background: rgba(255,255,255,.08); color: #fff; }
        .side-link[aria-current="page"] { background: #eef3f1; color: #0f3b2d; font-weight: 800; }
        .panel { background: #fff; border-radius: 20px; box-shadow: 0 1px 2px rgba(15,59,45,.06); }
        .icon-tile {
            display: flex; align-items: center; justify-content: center; width: 40px; height: 40px;
            flex-shrink: 0; border-radius: 12px; border: 1px solid #cfe5db; background: #e6f1ec; color: #154c3a;
        }
        .module-card { transition: box-shadow .2s ease, transform .2s ease; }
        .module-card:hover { box-shadow: 0 14px 28px -16px rgba(15,59,45,.45); transform: translateY(-2px); }
        .arrow-icon { transition: transform .2s ease; }
        .group:hover .arrow-icon { transform: translateX(2px); }
        [dir="rtl"] .arrow-icon { transform: scaleX(-1); }
        [dir="rtl"] .group:hover .arrow-icon { transform: scaleX(-1) translateX(2px); }
        @@media (min-width: 1024px) {
            .sidebar, [dir="rtl"] .sidebar { visibility: visible; transform: none; transition: none; }
        }
        @@media (prefers-reduced-motion: reduce) {
            * { transition: none !important; animation: none !important; }
        }
    </style>
</head>

<body class="text-slate-800">
@php
    $adminName = auth()->user()->name ?? 'Admin';
    $adminInitial = mb_strtoupper(mb_substr($adminName, 0, 1));

    $pendingRegistrations = (int) ($pendingRegistrations ?? 0);
    $pendingFormationRequests = (int) ($pendingFormationRequests ?? 0);
    $pendingCertificates = (int) ($pendingCertificates ?? 0);
    $notificationCount = $pendingRegistrations + $pendingFormationRequests + $pendingCertificates;

    $donutCircumference = 2 * pi() * 42;
    $registrationsLength = $notificationCount > 0 ? $donutCircumference * ($pendingRegistrations / $notificationCount) : 0;
    $requestsLength = $notificationCount > 0 ? $donutCircumference * ($pendingFormationRequests / $notificationCount) : 0;
    $certificatesLength = $notificationCount > 0 ? $donutCircumference * ($pendingCertificates / $notificationCount) : 0;
@endphp

<div id="sidebarOverlay" class="fixed inset-0 z-50 hidden bg-forest-950/50 lg:hidden" onclick="closeSidebar()"></div>

<aside id="sidebar" class="sidebar" aria-label="Navigation">
    <div class="logo-block flex h-20 shrink-0 items-center justify-between gap-3 px-5">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-forest-500 text-white">
                <i data-lucide="graduation-cap" class="h-5 w-5"></i>
            </span>
            <span class="leading-tight">
                <span class="block text-lg font-extrabold tracking-tight text-white">Cad<span class="text-forest-300">Academy</span></span>
                <span class="block text-[10px] font-semibold tracking-wide text-forest-200" data-i18n="admin_brand">ADMINISTRATION · الإدارة</span>
            </span>
        </a>
        <button type="button" onclick="closeSidebar()" aria-label="Fermer le menu" data-i18n-aria="aria_menu_close"
            class="flex h-9 w-9 items-center justify-center rounded-lg text-forest-200 transition hover:bg-white/10 hover:text-white lg:hidden">
            <i data-lucide="x" class="h-5 w-5"></i>
        </button>
    </div>

    <nav class="flex-1 space-y-1 py-7">
        <a href="{{ route('admin.dashboard') }}" aria-current="page" class="side-link"><i data-lucide="layout-dashboard" class="h-[18px] w-[18px]"></i><span data-i18n="dashboard">Tableau de bord</span></a>
        <a href="{{ route('admin.formations.index') }}" class="side-link"><i data-lucide="book-open" class="h-[18px] w-[18px]"></i><span data-i18n="formations">Formations</span></a>
        <a href="{{ route('admin.cours.index') }}" class="side-link"><i data-lucide="file-text" class="h-[18px] w-[18px]"></i><span data-i18n="courses">Cours</span></a>
        <a href="{{ route('admin.quiz.index') }}" class="side-link"><i data-lucide="clipboard-check" class="h-[18px] w-[18px]"></i><span data-i18n="quizzes">Quiz</span></a>
        <a href="{{ route('admin.registrations.index') }}" class="side-link">
            <i data-lucide="users" class="h-[18px] w-[18px]"></i><span data-i18n="registrations">Inscriptions</span>
            @if($pendingRegistrations > 0)<span class="ms-auto min-w-[22px] rounded-full bg-orange-400 px-1.5 text-center text-[11px] font-extrabold leading-[22px] text-forest-950">{{ $pendingRegistrations }}</span>@endif
        </a>
        <a href="{{ route('admin.formation-requests.index') }}" class="side-link">
            <i data-lucide="clipboard-list" class="h-[18px] w-[18px]"></i><span data-i18n="nav_requests">Demandes</span>
            @if($pendingFormationRequests > 0)<span class="ms-auto min-w-[22px] rounded-full bg-forest-300 px-1.5 text-center text-[11px] font-extrabold leading-[22px] text-forest-950">{{ $pendingFormationRequests }}</span>@endif
        </a>
        <a href="{{ route('admin.certificates.index') }}" class="side-link">
            <i data-lucide="award" class="h-[18px] w-[18px]"></i><span data-i18n="certificates">Certificats</span>
            @if($pendingCertificates > 0)<span class="ms-auto min-w-[22px] rounded-full bg-amber-300 px-1.5 text-center text-[11px] font-extrabold leading-[22px] text-forest-950">{{ $pendingCertificates }}</span>@endif
        </a>
    </nav>

    <div class="shrink-0 space-y-3 p-4">
        <div class="flex items-center gap-3 rounded-2xl bg-white/10 p-3">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest-100 text-sm font-extrabold text-forest-800">{{ $adminInitial }}</span>
            <div class="min-w-0 leading-tight">
                <p class="truncate text-sm font-bold text-white">{{ $adminName }}</p>
                <p class="mt-0.5 text-xs text-forest-200" data-i18n="admin_role">Administrateur</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold text-forest-100 transition hover:bg-white/10 hover:text-white">
                <i data-lucide="log-out" class="h-[18px] w-[18px]"></i><span data-i18n="logout">Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<div class="lg:ps-[272px]">
    <header class="sticky top-0 z-40 flex h-16 items-center justify-between gap-3 border-b border-forest-100 bg-page px-4 sm:px-6 lg:px-8">
        <div class="flex min-w-0 items-center gap-3">
            <button id="sidebarButton" type="button" onclick="openSidebar()" aria-label="Ouvrir le menu" data-i18n-aria="aria_menu_open" aria-expanded="false" aria-controls="sidebar"
                class="flex h-9 w-9 items-center justify-center rounded-lg bg-white text-forest-700 shadow-sm transition hover:bg-forest-50 lg:hidden">
                <i data-lucide="menu" class="h-5 w-5"></i>
            </button>
            <h1 class="truncate text-base font-extrabold text-forest-900 sm:text-lg" data-i18n="dashboard">Tableau de bord</h1>
        </div>

        <div class="flex items-center gap-2">
            <div class="relative shrink-0">
                <button id="notificationButton" type="button" onclick="toggleNotifications()" aria-label="Notifications" data-i18n-aria="aria_notifications" aria-expanded="false" aria-controls="notificationPanel"
                    class="relative flex h-9 w-9 items-center justify-center rounded-lg bg-white text-forest-700 shadow-sm transition hover:bg-forest-50">
                    <i data-lucide="bell" class="h-[18px] w-[18px]"></i>
                    @if($notificationCount > 0)<span class="absolute -end-1.5 -top-1.5 flex h-[18px] min-w-[18px] items-center justify-center rounded-full border-2 border-page bg-red-500 px-1 text-[10px] font-extrabold text-white">{{ $notificationCount > 99 ? '99+' : $notificationCount }}</span>@endif
                </button>

                <div id="notificationPanel" class="fixed inset-x-3 top-[68px] z-[100] hidden overflow-hidden rounded-2xl border border-forest-100 bg-white shadow-xl sm:absolute sm:inset-x-auto sm:end-0 sm:top-full sm:mt-2 sm:w-[360px]">
                    <div class="flex items-start gap-3 border-b border-slate-100 px-4 py-3.5">
                        <span class="icon-tile !h-9 !w-9"><i data-lucide="bell-ring" class="h-[18px] w-[18px]"></i></span>
                        <div class="min-w-0">
                            <h3 class="text-sm font-extrabold text-slate-900" data-i18n="notifications_title">Notifications</h3>
                            <p class="mt-0.5 text-xs text-slate-500" data-i18n="notifications_subtitle">Consultez les nouvelles demandes.</p>
                        </div>
                    </div>
                    <div class="p-2">
                        @if($notificationCount === 0)
                            <div class="flex flex-col items-center px-4 pb-3 pt-5 text-center">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-forest-50 text-forest-500"><i data-lucide="check-check" class="h-5 w-5"></i></span>
                                <p class="mt-3 text-sm font-bold text-slate-700" data-i18n="notifications_clear">Tout est à jour</p>
                                <p class="mt-1 text-xs text-slate-400" data-i18n="notifications_empty">Aucune nouvelle demande pour le moment.</p>
                            </div>
                        @endif
                        <a href="{{ route('admin.registrations.index') }}" class="group flex items-center gap-3 rounded-xl p-3 transition hover:bg-slate-50">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-orange-600"><i data-lucide="users" class="h-5 w-5"></i></span>
                            <div class="min-w-0 flex-1"><p class="truncate text-sm font-bold text-slate-700" data-i18n="notification_registrations">Inscriptions en attente</p><p class="mt-0.5 text-xs text-slate-400" data-i18n="notification_view">Cliquer pour consulter</p></div>
                            <span class="min-w-[28px] rounded-full px-2 py-0.5 text-center text-xs font-extrabold {{ $pendingRegistrations > 0 ? 'bg-orange-100 text-orange-700' : 'bg-slate-100 text-slate-400' }}">{{ $pendingRegistrations }}</span>
                            <i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i>
                        </a>
                        <a href="{{ route('admin.formation-requests.index') }}" class="group flex items-center gap-3 rounded-xl p-3 transition hover:bg-slate-50">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-forest-50 text-forest-600"><i data-lucide="clipboard-list" class="h-5 w-5"></i></span>
                            <div class="min-w-0 flex-1"><p class="truncate text-sm font-bold text-slate-700" data-i18n="notification_requests">Demandes de formation</p><p class="mt-0.5 text-xs text-slate-400" data-i18n="notification_view">Cliquer pour consulter</p></div>
                            <span class="min-w-[28px] rounded-full px-2 py-0.5 text-center text-xs font-extrabold {{ $pendingFormationRequests > 0 ? 'bg-forest-100 text-forest-700' : 'bg-slate-100 text-slate-400' }}">{{ $pendingFormationRequests }}</span>
                            <i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i>
                        </a>
                        <a href="{{ route('admin.certificates.index') }}" class="group flex items-center gap-3 rounded-xl p-3 transition hover:bg-slate-50">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600"><i data-lucide="award" class="h-5 w-5"></i></span>
                            <div class="min-w-0 flex-1"><p class="truncate text-sm font-bold text-slate-700" data-i18n="notification_certificates">Demandes de certificats</p><p class="mt-0.5 text-xs text-slate-400" data-i18n="notification_view">Cliquer pour consulter</p></div>
                            <span class="min-w-[28px] rounded-full px-2 py-0.5 text-center text-xs font-extrabold {{ $pendingCertificates > 0 ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-400' }}">{{ $pendingCertificates }}</span>
                            <i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i>
                        </a>
                    </div>
                </div>
            </div>

            <button id="languageButton" type="button" onclick="toggleLanguage()" class="inline-flex h-9 items-center gap-1.5 rounded-lg bg-white px-2.5 text-xs font-bold text-forest-700 shadow-sm transition hover:bg-forest-50 sm:px-3 sm:text-[13px]">
                <i data-lucide="languages" class="hidden h-4 w-4 sm:block"></i><span id="languageLabel">العربية</span>
            </button>

            <div class="hidden items-center gap-2.5 rounded-xl bg-white py-1.5 pe-3 ps-1.5 shadow-sm md:flex">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-forest-700 text-sm font-extrabold text-white">{{ $adminInitial }}</span>
                <div class="min-w-0 leading-tight"><p class="max-w-[140px] truncate text-[13px] font-bold text-slate-800">{{ $adminName }}</p><p class="text-[11px] text-slate-400" data-i18n="admin_role">Administrateur</p></div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-[1400px] space-y-5 px-4 py-5 sm:px-6 sm:py-6 lg:px-8">
        <section class="panel relative overflow-hidden p-5 sm:p-7">
            <div class="flex items-center justify-between gap-6">
                <div class="min-w-0 max-w-xl">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-forest-50 px-2.5 py-1 text-[11px] font-bold text-forest-700"><i data-lucide="shield-check" class="h-3.5 w-3.5"></i><span data-i18n="welcome_badge">ESPACE ADMINISTRATEUR</span></span>
                    <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-forest-900 sm:text-3xl"><span data-i18n="welcome_title">Bienvenue,</span> <span class="text-forest-500">{{ $adminName }}</span></h2>
                    <p class="mt-2 text-sm leading-6 text-slate-500" data-i18n="welcome_description">Pilotez votre plateforme de formation depuis un espace simple, moderne et centralisé.</p>
                    <div class="mt-5 flex flex-wrap items-center gap-2.5">
                        <a href="{{ route('admin.formations.index') }}" class="group inline-flex items-center gap-2 rounded-xl bg-forest-700 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-forest-800"><i data-lucide="book-open" class="h-4 w-4"></i><span data-i18n="manage_formations">Gérer les formations</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></a>
                        <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-forest-200 bg-white px-4 py-2.5 text-sm font-bold text-forest-700 transition hover:bg-forest-50"><i data-lucide="users" class="h-4 w-4"></i><span data-i18n="view_registrations">Voir les inscriptions</span></a>
                    </div>
                </div>
                <svg class="hidden h-40 w-auto shrink-0 sm:block lg:h-44" viewBox="0 0 260 170" fill="none" aria-hidden="true">
                    <rect x="14" y="132" width="232" height="8" rx="4" fill="#154c3a"/><rect x="40" y="140" width="8" height="26" rx="3" fill="#154c3a"/><rect x="212" y="140" width="8" height="26" rx="3" fill="#154c3a"/>
                    <rect x="80" y="48" width="108" height="70" rx="8" fill="#0f3b2d"/><rect x="87" y="55" width="94" height="56" rx="4" fill="#d9ebe4"/>
                    <rect x="97" y="88" width="10" height="16" rx="2" fill="#86bba8"/><rect x="113" y="78" width="10" height="26" rx="2" fill="#4f9a80"/><rect x="129" y="68" width="10" height="36" rx="2" fill="#2b7a5f"/><rect x="145" y="82" width="10" height="22" rx="2" fill="#4f9a80"/><rect x="161" y="72" width="10" height="32" rx="2" fill="#154c3a"/>
                    <rect x="126" y="118" width="16" height="9" fill="#0f3b2d"/><rect x="108" y="126" width="52" height="6" rx="3" fill="#0f3b2d"/>
                    <rect x="22" y="122" width="46" height="10" rx="2" fill="#154c3a"/><rect x="28" y="112" width="36" height="10" rx="2" fill="#2b7a5f"/><rect x="25" y="102" width="40" height="10" rx="2" fill="#86bba8"/>
                    <rect x="206" y="112" width="20" height="20" rx="4" fill="#154c3a"/><ellipse cx="210" cy="100" rx="6" ry="13" transform="rotate(-20 210 100)" fill="#2b7a5f"/><ellipse cx="222" cy="98" rx="6" ry="14" transform="rotate(20 222 98)" fill="#4f9a80"/><ellipse cx="216" cy="94" rx="5" ry="13" fill="#1d6149"/>
                    <path d="M134 10 168 25 134 40 100 25Z" fill="#154c3a"/><path d="M116 33v10c0 4 8 8 18 8s18-4 18-8V33l-18 8Z" fill="#2b7a5f"/><path d="M168 25v14" stroke="#86bba8" stroke-width="2" stroke-linecap="round"/><circle cx="168" cy="42" r="3" fill="#86bba8"/><circle cx="62" cy="52" r="3" fill="#86bba8"/><circle cx="206" cy="48" r="2.5" fill="#4f9a80"/><circle cx="224" cy="70" r="2" fill="#b5d7ca"/>
                </svg>
            </div>
        </section>

        <div class="grid gap-5 xl:grid-cols-[minmax(0,1fr)_340px]">
            <section>
                <div class="mb-3 flex items-end justify-between gap-3">
                    <div class="min-w-0"><h3 class="text-base font-extrabold text-forest-900" data-i18n="quick_access">Accès rapide</h3><p class="mt-0.5 text-sm text-slate-500" data-i18n="quick_description">Retrouvez tous les outils de gestion de votre plateforme.</p></div>
                    <span class="hidden shrink-0 items-center gap-1.5 rounded-full bg-white px-3 py-1.5 text-xs font-semibold text-slate-500 shadow-sm sm:inline-flex"><i data-lucide="lock" class="h-3.5 w-3.5 text-forest-500"></i><span data-i18n="secure_admin">Espace sécurisé</span></span>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 2xl:grid-cols-3">
                    <a href="{{ route('admin.formations.index') }}" class="module-card panel group flex h-full flex-col p-5"><span class="icon-tile"><i data-lucide="book-open" class="h-5 w-5"></i></span><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="formations">Formations</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="formations_desc">Créez, modifiez et organisez les formations proposées aux étudiants.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <a href="{{ route('admin.cours.index') }}" class="module-card panel group flex h-full flex-col p-5"><span class="icon-tile"><i data-lucide="file-text" class="h-5 w-5"></i></span><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="courses">Cours</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="courses_desc">Gérez les leçons, les documents et les ressources pédagogiques.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <a href="{{ route('admin.quiz.index') }}" class="module-card panel group flex h-full flex-col p-5"><span class="icon-tile"><i data-lucide="clipboard-check" class="h-5 w-5"></i></span><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="quizzes">Quiz</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="quizzes_desc">Préparez des évaluations et gérez les questions des quiz.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <a href="{{ route('admin.registrations.index') }}" class="module-card panel group flex h-full flex-col p-5"><div class="flex items-start justify-between gap-3"><span class="icon-tile"><i data-lucide="users" class="h-5 w-5"></i></span>@if($pendingRegistrations > 0)<span class="inline-flex items-center gap-1.5 rounded-full bg-orange-50 px-2.5 py-1 text-xs font-bold text-orange-700"><span class="tabular-nums">{{ $pendingRegistrations }}</span><span data-i18n="pending">en attente</span></span>@endif</div><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="registrations">Inscriptions</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="registrations_desc">Consultez les étudiants et gérez leurs inscriptions.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <a href="{{ route('admin.formation-requests.index') }}" class="module-card panel group flex h-full flex-col p-5"><div class="flex items-start justify-between gap-3"><span class="icon-tile"><i data-lucide="clipboard-list" class="h-5 w-5"></i></span>@if($pendingFormationRequests > 0)<span class="inline-flex items-center gap-1.5 rounded-full bg-forest-50 px-2.5 py-1 text-xs font-bold text-forest-700"><span class="tabular-nums">{{ $pendingFormationRequests }}</span><span data-i18n="pending">en attente</span></span>@endif</div><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="requests">Demandes de formations</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="requests_desc">Consultez les demandes et gérez l'accès aux formations.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <a href="{{ route('admin.certificates.index') }}" class="module-card panel group flex h-full flex-col p-5"><div class="flex items-start justify-between gap-3"><span class="icon-tile"><i data-lucide="award" class="h-5 w-5"></i></span>@if($pendingCertificates > 0)<span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-1 text-xs font-bold text-amber-700"><span class="tabular-nums">{{ $pendingCertificates }}</span><span data-i18n="pending">en attente</span></span>@endif</div><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="certificates">Certificats</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="certificates_desc">Consultez les demandes de certificats et gérez leur activation.</p><div class="mt-auto flex items-center justify-between pt-5 text-sm font-bold text-forest-700"><span data-i18n="manage">Gérer</span><i data-lucide="arrow-right" class="arrow-icon h-4 w-4"></i></div></a>

                    <div class="panel flex h-full flex-col p-5"><span class="icon-tile"><i data-lucide="shield-check" class="h-5 w-5"></i></span><h4 class="mt-4 text-base font-extrabold text-slate-900" data-i18n="security_title">Sécurité du compte</h4><p class="mt-1.5 text-sm leading-6 text-slate-500" data-i18n="account_desc">Vous êtes connecté à l'espace de gestion de la plateforme.</p><div class="mt-auto pt-5"><span class="inline-flex items-center gap-2 rounded-full bg-forest-50 px-3 py-1.5 text-xs font-bold text-forest-700"><span class="h-2 w-2 rounded-full bg-forest-400"></span><span data-i18n="account_active">Compte administrateur actif</span></span></div></div>
                </div>
            </section>

            <aside class="order-first space-y-5 xl:order-none">
                <section class="panel p-5">
                    <div class="flex items-center justify-between gap-3"><h3 class="text-base font-extrabold text-forest-900" data-i18n="pending_title">À traiter</h3><span class="icon-tile !h-8 !w-8 !rounded-lg"><i data-lucide="bell" class="h-4 w-4"></i></span></div>
                    <div class="relative mx-auto mt-4 h-40 w-40">
                        <svg class="h-40 w-40 -rotate-90" viewBox="0 0 100 100" fill="none" aria-hidden="true">
                            <circle cx="50" cy="50" r="42" fill="none" stroke="#d9ebe4" stroke-width="11"/>
                            @if($notificationCount > 0)
                                <circle cx="50" cy="50" r="42" fill="none" stroke="#154c3a" stroke-width="11" stroke-dasharray="{{ number_format($registrationsLength, 2, '.', '') }} {{ number_format($donutCircumference, 2, '.', '') }}" stroke-dashoffset="0"/>
                                <circle cx="50" cy="50" r="42" fill="none" stroke="#4f9a80" stroke-width="11" stroke-dasharray="{{ number_format($requestsLength, 2, '.', '') }} {{ number_format($donutCircumference, 2, '.', '') }}" stroke-dashoffset="-{{ number_format($registrationsLength, 2, '.', '') }}"/>
                                <circle cx="50" cy="50" r="42" fill="none" stroke="#f59e0b" stroke-width="11" stroke-dasharray="{{ number_format($certificatesLength, 2, '.', '') }} {{ number_format($donutCircumference, 2, '.', '') }}" stroke-dashoffset="-{{ number_format($registrationsLength + $requestsLength, 2, '.', '') }}"/>
                            @endif
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center"><p class="text-3xl font-extrabold leading-none text-forest-900 tabular-nums">{{ $notificationCount }}</p><p class="mt-1 max-w-[90px] text-[11px] leading-tight text-slate-500" data-i18n="stat_total">Total à traiter</p></div>
                    </div>
                    @if($notificationCount === 0)<p class="mt-3 flex items-center justify-center gap-1.5 text-center text-xs font-semibold text-forest-600"><i data-lucide="check-check" class="h-4 w-4"></i><span data-i18n="notifications_clear">Tout est à jour</span></p>@endif

                    <div class="mt-4 space-y-1.5">
                        <a href="{{ route('admin.registrations.index') }}" class="group flex items-center gap-3 rounded-xl bg-page px-3 py-2.5 transition hover:bg-forest-50"><span class="h-3 w-3 shrink-0 rounded-full bg-forest-700"></span><span class="min-w-0 flex-1 truncate text-[13px] font-semibold text-slate-700" data-i18n="notification_registrations">Inscriptions en attente</span><span class="text-sm font-extrabold text-forest-900 tabular-nums">{{ $pendingRegistrations }}</span><i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i></a>
                        <a href="{{ route('admin.formation-requests.index') }}" class="group flex items-center gap-3 rounded-xl bg-page px-3 py-2.5 transition hover:bg-forest-50"><span class="h-3 w-3 shrink-0 rounded-full bg-forest-400"></span><span class="min-w-0 flex-1 truncate text-[13px] font-semibold text-slate-700" data-i18n="notification_requests">Demandes de formation</span><span class="text-sm font-extrabold text-forest-900 tabular-nums">{{ $pendingFormationRequests }}</span><i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i></a>
                        <a href="{{ route('admin.certificates.index') }}" class="group flex items-center gap-3 rounded-xl bg-page px-3 py-2.5 transition hover:bg-forest-50"><span class="h-3 w-3 shrink-0 rounded-full bg-amber-500"></span><span class="min-w-0 flex-1 truncate text-[13px] font-semibold text-slate-700" data-i18n="notification_certificates">Demandes de certificats</span><span class="text-sm font-extrabold text-forest-900 tabular-nums">{{ $pendingCertificates }}</span><i data-lucide="chevron-right" class="arrow-icon h-4 w-4 shrink-0 text-slate-300"></i></a>
                    </div>
                </section>

                <section class="panel flex items-start gap-3 p-5"><span class="icon-tile !h-9 !w-9"><i data-lucide="lightbulb" class="h-[18px] w-[18px]"></i></span><div class="min-w-0"><h4 class="text-sm font-extrabold text-slate-900" data-i18n="tip_title">Conseil d'administration</h4><p class="mt-1 text-[13px] leading-6 text-slate-500" data-i18n="tip_description">Pensez à vérifier les inscriptions et les demandes de formation régulièrement afin de faciliter l'accès des étudiants aux cours.</p></div></section>
            </aside>
        </div>
    </main>

    <footer class="mx-auto max-w-[1400px] px-4 pb-6 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-2 border-t border-forest-100 pt-5 sm:flex-row">
            <div class="flex items-center gap-2"><span class="flex h-6 w-6 items-center justify-center rounded-md bg-forest-100 text-forest-700"><i data-lucide="graduation-cap" class="h-3.5 w-3.5"></i></span><span class="text-sm font-extrabold text-slate-700">Étude<span class="text-forest-500">EnLigne</span></span></div>
            <p class="text-center text-xs text-slate-400">© {{ date('Y') }} ÉtudeEnLigne. <span data-i18n="footer_text">Tous droits réservés.</span></p>
            <p class="text-xs text-slate-400" data-i18n="footer_admin">Espace Administration</p>
        </div>
    </footer>
</div>

<script>
const translations = {
    fr: {
        admin_brand:"ADMINISTRATION · الإدارة", dashboard:"Tableau de bord", formations:"Formations", courses:"Cours", quizzes:"Quiz", registrations:"Inscriptions", requests:"Demandes de formations", nav_requests:"Demandes", certificates:"Certificats", certificates_desc:"Consultez les demandes de certificats et gérez leur activation.", admin_role:"Administrateur", logout:"Déconnexion",
        aria_notifications:"Notifications", aria_menu_open:"Ouvrir le menu", aria_menu_close:"Fermer le menu", notifications_title:"Notifications", notifications_subtitle:"Consultez les nouvelles demandes.", notification_registrations:"Inscriptions en attente", notification_requests:"Demandes de formation", notification_certificates:"Demandes de certificats", notification_view:"Cliquer pour consulter", notifications_empty:"Aucune nouvelle demande pour le moment.", notifications_clear:"Tout est à jour",
        welcome_badge:"ESPACE ADMINISTRATEUR", welcome_title:"Bienvenue,", welcome_description:"Pilotez votre plateforme de formation depuis un espace simple, moderne et centralisé.", manage_formations:"Gérer les formations", view_registrations:"Voir les inscriptions", quick_access:"Accès rapide", quick_description:"Retrouvez tous les outils de gestion de votre plateforme.", secure_admin:"Espace sécurisé", pending_title:"À traiter", stat_total:"Total à traiter", pending:"en attente",
        formations_desc:"Créez, modifiez et organisez les formations proposées aux étudiants.", courses_desc:"Gérez les leçons, les documents et les ressources pédagogiques.", quizzes_desc:"Préparez des évaluations et gérez les questions des quiz.", registrations_desc:"Consultez les étudiants et gérez leurs inscriptions.", requests_desc:"Consultez les demandes et gérez l'accès aux formations.", manage:"Gérer", security_title:"Sécurité du compte", account_desc:"Vous êtes connecté à l'espace de gestion de la plateforme.", account_active:"Compte administrateur actif", tip_title:"Conseil d'administration", tip_description:"Pensez à vérifier les inscriptions et les demandes de formation régulièrement afin de faciliter l'accès des étudiants aux cours.", footer_text:"Tous droits réservés.", footer_admin:"Espace Administration"
    },
    ar: {
        admin_brand:"الإدارة · ADMINISTRATION", dashboard:"لوحة التحكم", formations:"التكوينات", courses:"الدروس", quizzes:"الاختبارات", registrations:"التسجيلات", requests:"طلبات التكوين", nav_requests:"الطلبات", certificates:"الشهادات", certificates_desc:"اطلعي على طلبات الشهادات ودبّري تفعيلها.", admin_role:"مديرة المنصة", logout:"تسجيل الخروج",
        aria_notifications:"الإشعارات", aria_menu_open:"فتح القائمة", aria_menu_close:"إغلاق القائمة", notifications_title:"الإشعارات", notifications_subtitle:"اطلعي على الطلبات الجديدة.", notification_registrations:"التسجيلات المعلقة", notification_requests:"طلبات التكوين", notification_certificates:"طلبات الشهادات", notification_view:"اضغطي للاطلاع", notifications_empty:"لا توجد طلبات جديدة حالياً.", notifications_clear:"كل شيء محدّث",
        welcome_badge:"فضاء الإدارة", welcome_title:"مرحباً،", welcome_description:"دبّري منصة التكوين من خلال فضاء بسيط وعصري يجمع جميع أدوات الإدارة.", manage_formations:"تدبير التكوينات", view_registrations:"عرض التسجيلات", quick_access:"الوصول السريع", quick_description:"جميع أدوات تدبير المنصة متوفرة هنا.", secure_admin:"فضاء آمن", pending_title:"قيد المعالجة", stat_total:"المجموع قيد المعالجة", pending:"معلقة",
        formations_desc:"إضافة التكوينات وتعديلها وتنظيمها للطلبة.", courses_desc:"تدبير الدروس والوثائق والموارد التعليمية.", quizzes_desc:"إعداد الاختبارات وتدبير الأسئلة.", registrations_desc:"الاطلاع على الطلبة وتدبير تسجيلاتهم.", requests_desc:"الاطلاع على طلبات التكوين وتدبير الولوج إليها.", manage:"تدبير", security_title:"أمان الحساب", account_desc:"أنت متصلة بفضاء تدبير المنصة.", account_active:"حساب الإدارة نشط", tip_title:"نصيحة للإدارة", tip_description:"احرصي على مراجعة التسجيلات وطلبات التكوين بانتظام لتسهيل ولوج الطلبة إلى الدروس.", footer_text:"جميع الحقوق محفوظة.", footer_admin:"فضاء الإدارة"
    }
};

let currentLanguage = 'fr';
try { currentLanguage = localStorage.getItem('etudierenligne_admin_language') || 'fr'; } catch (e) {}
if (!translations[currentLanguage]) currentLanguage = 'fr';

const notificationButton = document.getElementById('notificationButton');
const notificationPanel = document.getElementById('notificationPanel');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const sidebarButton = document.getElementById('sidebarButton');

function refreshIcons() { if (window.lucide) lucide.createIcons(); }

function applyLanguage(language) {
    currentLanguage = translations[language] ? language : 'fr';
    const isArabic = currentLanguage === 'ar';
    const dictionary = translations[currentLanguage];
    document.documentElement.lang = currentLanguage;
    document.documentElement.dir = isArabic ? 'rtl' : 'ltr';
    document.getElementById('languageLabel').textContent = isArabic ? 'Français' : 'العربية';

    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.dataset.i18n;
        if (Object.prototype.hasOwnProperty.call(dictionary, key)) element.textContent = dictionary[key];
    });
    document.querySelectorAll('[data-i18n-aria]').forEach(element => {
        const key = element.dataset.i18nAria;
        if (Object.prototype.hasOwnProperty.call(dictionary, key)) element.setAttribute('aria-label', dictionary[key]);
    });
    try { localStorage.setItem('etudierenligne_admin_language', currentLanguage); } catch (e) {}
    refreshIcons();
}

function toggleLanguage() { applyLanguage(currentLanguage === 'fr' ? 'ar' : 'fr'); }

function closeNotifications() {
    if (!notificationPanel || !notificationButton) return;
    notificationPanel.classList.add('hidden');
    notificationButton.setAttribute('aria-expanded', 'false');
}
function toggleNotifications() {
    if (!notificationPanel || !notificationButton) return;
    notificationPanel.classList.toggle('hidden');
    notificationButton.setAttribute('aria-expanded', notificationPanel.classList.contains('hidden') ? 'false' : 'true');
}
document.addEventListener('click', event => {
    if (notificationPanel && notificationButton && !notificationPanel.contains(event.target) && !notificationButton.contains(event.target)) closeNotifications();
});

function openSidebar() {
    if (!sidebar || !sidebarOverlay || !sidebarButton) return;
    sidebar.classList.add('open');
    sidebarOverlay.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    sidebarButton.setAttribute('aria-expanded', 'true');
    closeNotifications();
}
function closeSidebar() {
    if (!sidebar || !sidebarOverlay || !sidebarButton) return;
    sidebar.classList.remove('open');
    sidebarOverlay.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
    sidebarButton.setAttribute('aria-expanded', 'false');
}
document.addEventListener('keydown', event => {
    if (event.key === 'Escape') { closeNotifications(); closeSidebar(); }
});
window.addEventListener('resize', () => { if (window.innerWidth >= 1024) closeSidebar(); });

applyLanguage(currentLanguage);
refreshIcons();
</script>
</body>
</html>
