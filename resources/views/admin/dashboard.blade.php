
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration | ÉtudeEnLigne</title>

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
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#649786',
                            600: '#059669',
                            700: '#047857',
                            900: '#86d8c3'
                        }
                    }
                }
            }
        };
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f7faf8;
            -webkit-font-smoothing: antialiased;
        }

        html[lang="ar"] body {
            font-family: 'Tajawal', sans-serif;
        }

        .glass-header {
            background: rgba(255, 255, 255, .94);
            backdrop-filter: blur(16px);
        }

        .nav-link {
            transition: all .2s ease;
        }

        .nav-link:hover {
            background: #ecfdf5;
            color: #047857;
        }

        .nav-link.active {
            background: #10b981;
            color: white;
            box-shadow: 0 5px 14px rgba(16, 185, 129, .18);
        }

        .module-card {
            transition: transform .25s ease, box-shadow .25s ease,
                        border-color .25s ease;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, .07);
        }

        .hero-pattern {
            background-image: radial-gradient(
                rgba(255,255,255,.18) 1px,
                transparent 1px
            );
            background-size: 23px 23px;
        }

        .icon-box {
            transition: all .25s ease;
        }

        .module-card:hover .icon-box {
            transform: scale(1.06);
        }

        [dir="rtl"] .arrow-icon {
            transform: rotate(180deg);
        }

        [dir="rtl"] .user-info {
            text-align: right;
        }

        [dir="rtl"] #notificationPanel {
            right: auto;
            left: 0;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="text-slate-800">

@php
    $adminName = auth()->user()->name ?? 'Admin';

    $pendingRegistrations = $pendingRegistrations ?? 0;
    $pendingFormationRequests = $pendingFormationRequests ?? 0;

    $notificationCount = $pendingRegistrations + $pendingFormationRequests;
@endphp

<!-- HEADER -->
<header class="sticky top-0 z-50 px-3 sm:px-5 pt-3">

    <div class="max-w-[1500px] mx-auto glass-header rounded-2xl border border-slate-200/70 shadow-sm">

        <div class="min-h-[76px] px-4 sm:px-6 flex items-center justify-between gap-4">

            <!-- LOGO -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 shrink-0">

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-700 flex items-center justify-center shadow-md shadow-emerald-200">
                    <i data-lucide="graduation-cap" class="w-7 h-7 text-white"></i>
                </div>

                <div>
                    <h1 class="font-extrabold text-lg sm:text-xl tracking-tight text-slate-900">
                        Étude<span class="text-emerald-500">EnLigne</span>
                    </h1>

                    <p class="text-[10px] sm:text-xs text-slate-400 font-semibold tracking-wide"
                       data-i18n="admin_brand">
                        ADMINISTRATION · الإدارة
                    </p>
                </div>

            </a>

            <!-- DESKTOP NAV -->
            <nav class="hidden xl:flex items-center gap-1">

                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link active flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-bold">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span data-i18n="dashboard">Tableau de bord</span>
                </a>

                <a href="{{ route('admin.formations.index') }}"
                   class="nav-link flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-500">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                    <span data-i18n="formations">Formations</span>
                </a>

                <a href="{{ route('admin.cours.index') }}"
                   class="nav-link flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-500">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    <span data-i18n="courses">Cours</span>
                </a>

                <a href="{{ route('admin.quiz.index') }}"
                   class="nav-link flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-500">
                    <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                    <span data-i18n="quizzes">Quiz</span>
                </a>

                <a href="{{ route('admin.registrations.index') }}"
                   class="nav-link flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-500">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span data-i18n="registrations">Inscriptions</span>
                </a>

                <a href="{{ route('admin.formation-requests.index') }}"
                   class="nav-link flex items-center gap-2 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-500">
                    <i data-lucide="clipboard-list" class="w-4 h-4"></i>
                    <span data-i18n="requests">Demandes</span>
                </a>

            </nav>

            <!-- USER + NOTIFICATIONS + LANGUAGE + MOBILE -->
            <div class="flex items-center gap-2 sm:gap-3">

                <!-- NOTIFICATIONS -->
                <div class="relative shrink-0">

                    <button id="notificationButton"
                            type="button"
                            onclick="toggleNotifications()"
                            aria-label="Notifications"
                            aria-expanded="false"
                            class="relative w-10 h-10 sm:w-11 sm:h-11 rounded-xl border border-slate-200 bg-white hover:bg-emerald-50 hover:border-emerald-200 flex items-center justify-center transition">

                        <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>

                        @if($notificationCount > 0)
                            <span class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-red-500 text-white text-[10px] font-extrabold flex items-center justify-center border-2 border-white">
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>
                        @endif

                    </button>

                    <!-- NOTIFICATIONS DROPDOWN -->
                    <div id="notificationPanel"
                         class="hidden absolute top-full right-0 mt-3 w-[320px] max-w-[calc(100vw-32px)] bg-white rounded-2xl border border-slate-200 shadow-xl z-[100] overflow-hidden">

                        <div class="px-4 py-4 bg-emerald-50 border-b border-emerald-100">
                            <div class="flex items-center gap-2">
                                <i data-lucide="bell-ring" class="w-5 h-5 text-emerald-600"></i>

                                <h3 class="font-extrabold text-slate-800"
                                    data-i18n="notifications_title">
                                    Notifications
                                </h3>
                            </div>

                            <p class="text-xs text-slate-500 mt-1"
                               data-i18n="notifications_subtitle">
                                Consultez les nouvelles demandes.
                            </p>
                        </div>

                        <div class="p-2">

                            <!-- REGISTRATION NOTIFICATIONS -->
                            <a href="{{ route('admin.registrations.index') }}"
                               class="flex items-center gap-3 p-3 rounded-xl hover:bg-orange-50 transition">

                                <div class="w-10 h-10 shrink-0 rounded-xl bg-orange-100 flex items-center justify-center">
                                    <i data-lucide="users" class="w-5 h-5 text-orange-600"></i>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-700"
                                       data-i18n="notification_registrations">
                                        Inscriptions en attente
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1"
                                       data-i18n="notification_view">
                                        Cliquer pour consulter
                                    </p>
                                </div>

                                <span class="px-2.5 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-extrabold">
                                    {{ $pendingRegistrations }}
                                </span>

                            </a>

                            <!-- FORMATION REQUEST NOTIFICATIONS -->
                            <a href="{{ route('admin.formation-requests.index') }}"
                               class="flex items-center gap-3 p-3 rounded-xl hover:bg-emerald-50 transition">

                                <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-100 flex items-center justify-center">
                                    <i data-lucide="clipboard-list" class="w-5 h-5 text-emerald-600"></i>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-700"
                                       data-i18n="notification_requests">
                                        Demandes de formation
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1"
                                       data-i18n="notification_view">
                                        Cliquer pour consulter
                                    </p>
                                </div>

                                <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-extrabold">
                                    {{ $pendingFormationRequests }}
                                </span>

                            </a>

                            <!-- EMPTY STATE -->
                            @if($notificationCount === 0)
                                <p class="px-3 py-4 text-center text-xs text-slate-400"
                                   data-i18n="notifications_empty">
                                    Aucune nouvelle demande pour le moment.
                                </p>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- LANGUAGE BUTTON -->
                <button id="languageButton"
                        type="button"
                        onclick="toggleLanguage()"
                        class="flex items-center gap-2 px-3 py-2.5 rounded-xl border border-emerald-100 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition text-sm font-bold">

                    <i data-lucide="languages" class="w-4 h-4"></i>
                    <span id="languageLabel">العربية</span>

                </button>

                <!-- DESKTOP USER -->
                <div class="hidden md:flex items-center gap-3 border-l border-slate-200 pl-4">

                    <div class="user-info text-right">
                        <p class="text-sm font-bold text-slate-800">
                            {{ $adminName }}
                        </p>

                        <p class="text-xs text-slate-400 mt-0.5"
                           data-i18n="admin_role">
                            Administrateur
                        </p>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <i data-lucide="user-round" class="w-5 h-5 text-emerald-700"></i>
                    </div>

                </div>

                <!-- DESKTOP LOGOUT -->
                <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                    @csrf

                    <button type="submit"
                            aria-label="Déconnexion"
                            class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 transition">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                    </button>
                </form>

                <!-- MOBILE MENU BUTTON -->
                <button id="mobileMenuButton"
                        type="button"
                        aria-label="Ouvrir le menu"
                        aria-expanded="false"
                        class="xl:hidden w-10 h-10 rounded-xl bg-slate-100 hover:bg-emerald-50 text-slate-600 hover:text-emerald-700 flex items-center justify-center transition">

                    <i data-lucide="menu" class="w-5 h-5"></i>

                </button>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu" class="hidden xl:hidden border-t border-slate-100 p-3">

            <nav class="grid grid-cols-1 sm:grid-cols-2 gap-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link active flex items-center gap-3 p-3 rounded-xl font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span data-i18n="dashboard">Tableau de bord</span>
                </a>

                <a href="{{ route('admin.formations.index') }}"
                   class="nav-link flex items-center gap-3 p-3 rounded-xl font-semibold text-sm text-slate-600">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span data-i18n="formations">Formations</span>
                </a>

                <a href="{{ route('admin.cours.index') }}"
                   class="nav-link flex items-center gap-3 p-3 rounded-xl font-semibold text-sm text-slate-600">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                    <span data-i18n="courses">Cours</span>
                </a>

                <a href="{{ route('admin.quiz.index') }}"
                   class="nav-link flex items-center gap-3 p-3 rounded-xl font-semibold text-sm text-slate-600">
                    <i data-lucide="clipboard-check" class="w-5 h-5"></i>
                    <span data-i18n="quizzes">Quiz</span>
                </a>

                <a href="{{ route('admin.registrations.index') }}"
                   class="nav-link flex items-center gap-3 p-3 rounded-xl font-semibold text-sm text-slate-600">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span data-i18n="registrations">Inscriptions</span>
                </a>

                <a href="{{ route('admin.formation-requests.index') }}"
                   class="nav-link flex items-center gap-3 p-3 rounded-xl font-semibold text-sm text-slate-600">
                    <i data-lucide="clipboard-list" class="w-5 h-5"></i>
                    <span data-i18n="requests">Demandes de formations</span>
                </a>

            </nav>

            <!-- MOBILE USER + LOGOUT -->
            <div class="md:hidden flex items-center justify-between gap-3 mt-3 pt-3 border-t border-slate-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <i data-lucide="user-round" class="w-5 h-5 text-emerald-700"></i>
                    </div>

                    <div>
                        <p class="text-sm font-bold">{{ $adminName }}</p>

                        <p class="text-xs text-slate-400"
                           data-i18n="admin_role">
                            Administrateur
                        </p>
                    </div>

                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="flex items-center gap-2 px-3 py-2 rounded-xl bg-red-50 text-red-600 text-sm font-bold">

                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span data-i18n="logout">Déconnexion</span>

                    </button>
                </form>

            </div>
        </div>

    </div>
</header>


<!-- MAIN CONTENT -->
<main class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

    <!-- WELCOME HERO -->
    <section class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-500 text-white shadow-xl shadow-emerald-900/10">

        <div class="hero-pattern absolute inset-0 opacity-50 pointer-events-none"></div>

        <div class="absolute -top-20 -right-10 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>
        <div class="absolute -bottom-24 left-1/3 w-72 h-72 rounded-full bg-teal-300/20 blur-3xl"></div>

        <div class="relative grid grid-cols-1 lg:grid-cols-[1fr_auto] items-center gap-8 p-6 sm:p-9 lg:p-12">

            <div class="max-w-2xl">

                <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-bold mb-5">
                    <span class="w-2 h-2 rounded-full bg-emerald-200"></span>
                    <span data-i18n="welcome_badge">ESPACE ADMINISTRATEUR</span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight tracking-tight">
                    <span data-i18n="welcome">Bienvenue</span>,
                    <br class="hidden sm:block">
                    <span class="text-emerald-100">{{ $adminName }}</span>
                </h2>

                <p class="mt-5 text-sm sm:text-base leading-7 text-emerald-50/95 max-w-xl"
                   data-i18n="welcome_description">
                    Pilotez votre plateforme de formation depuis un espace simple,
                    moderne et centralisé.
                </p>

                <div class="flex flex-wrap items-center gap-3 mt-7">

                    <a href="{{ route('admin.formations.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-extrabold text-emerald-700 hover:bg-emerald-50 transition shadow-lg shadow-emerald-900/10">

                        <i data-lucide="book-open" class="w-4 h-4"></i>
                        <span data-i18n="manage_formations">Gérer les formations</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 arrow-icon"></i>

                    </a>

                    <a href="{{ route('admin.registrations.index') }}"
                       class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-bold text-white hover:bg-white/20 transition">

                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span data-i18n="view_registrations">Voir les inscriptions</span>

                    </a>

                </div>
            </div>

            <div class="hidden lg:flex items-center justify-center">

                <div class="w-44 h-44 xl:w-52 xl:h-52 rounded-[36px] border border-white/20 bg-white/10 backdrop-blur-sm flex items-center justify-center shadow-2xl rotate-3">

                    <div class="w-32 h-32 xl:w-36 xl:h-36 rounded-[28px] bg-white flex items-center justify-center shadow-lg -rotate-3">
                        <i data-lucide="graduation-cap" class="w-20 h-20 text-emerald-600"></i>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <!-- SECTION HEADING -->
    <section class="mt-10 sm:mt-12 mb-6">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">

            <div>

                <div class="flex items-center gap-2 text-emerald-600 text-xs font-extrabold tracking-widest mb-2">
                    <span class="w-7 h-1 rounded-full bg-emerald-500"></span>
                    <span data-i18n="workspace">VOTRE ESPACE DE TRAVAIL</span>
                </div>

                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900"
                    data-i18n="quick_access">
                    Accès rapide
                </h3>

                <p class="text-sm text-slate-500 mt-2"
                   data-i18n="quick_description">
                    Retrouvez tous les outils de gestion de votre plateforme.
                </p>

            </div>

            <div class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 bg-white border border-slate-200 rounded-full px-3 py-2 w-fit">

                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                <span data-i18n="secure_admin">Espace sécurisé</span>

            </div>

        </div>
    </section>


    <!-- MODULE CARDS -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

        <!-- FORMATIONS -->
        <a href="{{ route('admin.formations.index') }}"
           class="module-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center">
                    <i data-lucide="book-open" class="w-7 h-7 text-emerald-600"></i>
                </div>

                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 rounded-full px-3 py-1.5"
                      data-i18n="module_01">
                    MODULE 01
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="formations">
                Formations
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="formations_desc">
                Créez, modifiez et organisez les formations proposées aux étudiants.
            </p>

            <div class="mt-6 flex items-center justify-between">

                <span class="text-sm font-bold text-emerald-700" data-i18n="manage">
                    Gérer
                </span>

                <span class="w-9 h-9 rounded-full bg-emerald-50 group-hover:bg-emerald-500 flex items-center justify-center transition">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-emerald-700 group-hover:text-white arrow-icon"></i>
                </span>

            </div>
        </a>


        <!-- COURS -->
        <a href="{{ route('admin.cours.index') }}"
           class="module-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center">
                    <i data-lucide="file-text" class="w-7 h-7 text-blue-600"></i>
                </div>

                <span class="text-xs font-bold text-blue-700 bg-blue-50 rounded-full px-3 py-1.5"
                      data-i18n="module_02">
                    MODULE 02
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="courses">
                Cours
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="courses_desc">
                Gérez les leçons, les documents et les ressources pédagogiques.
            </p>

            <div class="mt-6 flex items-center justify-between">

                <span class="text-sm font-bold text-blue-700" data-i18n="manage">
                    Gérer
                </span>

                <span class="w-9 h-9 rounded-full bg-blue-50 group-hover:bg-blue-500 flex items-center justify-center transition">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-blue-700 group-hover:text-white arrow-icon"></i>
                </span>

            </div>
        </a>


        <!-- QUIZ -->
        <a href="{{ route('admin.quiz.index') }}"
           class="module-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-violet-50 flex items-center justify-center">
                    <i data-lucide="clipboard-check" class="w-7 h-7 text-violet-600"></i>
                </div>

                <span class="text-xs font-bold text-violet-700 bg-violet-50 rounded-full px-3 py-1.5"
                      data-i18n="module_03">
                    MODULE 03
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="quizzes">
                Quiz
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="quizzes_desc">
                Préparez des évaluations et gérez les questions des quiz.
            </p>

            <div class="mt-6 flex items-center justify-between">

                <span class="text-sm font-bold text-violet-700" data-i18n="manage">
                    Gérer
                </span>

                <span class="w-9 h-9 rounded-full bg-violet-50 group-hover:bg-violet-500 flex items-center justify-center transition">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-violet-700 group-hover:text-white arrow-icon"></i>
                </span>

            </div>
        </a>


        <!-- INSCRIPTIONS -->
        <a href="{{ route('admin.registrations.index') }}"
           class="module-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-orange-50 flex items-center justify-center">
                    <i data-lucide="users" class="w-7 h-7 text-orange-600"></i>
                </div>

                <span class="text-xs font-bold text-orange-700 bg-orange-50 rounded-full px-3 py-1.5"
                      data-i18n="module_04">
                    MODULE 04
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="registrations">
                Inscriptions
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="registrations_desc">
                Consultez les étudiants et gérez leurs inscriptions.
            </p>

            <div class="mt-6 flex items-center justify-between">

                <span class="text-sm font-bold text-orange-700" data-i18n="manage">
                    Gérer
                </span>

                <span class="w-9 h-9 rounded-full bg-orange-50 group-hover:bg-orange-500 flex items-center justify-center transition">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-orange-700 group-hover:text-white arrow-icon"></i>
                </span>

            </div>
        </a>


        <!-- FORMATION REQUESTS -->
        <a href="{{ route('admin.formation-requests.index') }}"
           class="module-card group relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-teal-50 flex items-center justify-center">
                    <i data-lucide="clipboard-list" class="w-7 h-7 text-teal-600"></i>
                </div>

                <span class="text-xs font-bold text-teal-700 bg-teal-50 rounded-full px-3 py-1.5"
                      data-i18n="module_05">
                    MODULE 05
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="requests">
                Demandes de formations
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="requests_desc">
                Consultez les demandes et gérez l'accès aux formations.
            </p>

            <div class="mt-6 flex items-center justify-between">

                <span class="text-sm font-bold text-teal-700" data-i18n="manage">
                    Gérer
                </span>

                <span class="w-9 h-9 rounded-full bg-teal-50 group-hover:bg-teal-500 flex items-center justify-center transition">
                    <i data-lucide="arrow-right" class="w-4 h-4 text-teal-700 group-hover:text-white arrow-icon"></i>
                </span>

            </div>
        </a>


        <!-- ACCOUNT SECURITY -->
        <div class="module-card relative overflow-hidden bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7">

            <div class="flex items-start justify-between gap-3">

                <div class="icon-box w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-7 h-7 text-slate-600"></i>
                </div>

                <span class="text-xs font-bold text-slate-600 bg-slate-100 rounded-full px-3 py-1.5"
                      data-i18n="secure">
                    SÉCURITÉ
                </span>

            </div>

            <h4 class="mt-6 text-lg font-extrabold text-slate-900"
                data-i18n="account_title">
                Votre espace sécurisé
            </h4>

            <p class="mt-2 text-sm leading-6 text-slate-500"
               data-i18n="account_desc">
                Vous êtes connecté à l'espace de gestion de la plateforme.
            </p>

            <div class="mt-6 flex items-center gap-2 text-sm font-bold text-emerald-700">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                <span data-i18n="account_active">Compte administrateur actif</span>
            </div>

        </div>

    </section>


    <!-- INFORMATION BANNER -->
    <section class="mt-8 rounded-3xl border border-emerald-100 bg-white p-5 sm:p-7">

        <div class="flex flex-col sm:flex-row items-start gap-4">

            <div class="w-12 h-12 shrink-0 rounded-2xl bg-emerald-50 flex items-center justify-center">
                <i data-lucide="lightbulb" class="w-6 h-6 text-emerald-600"></i>
            </div>

            <div>

                <h4 class="font-extrabold text-slate-900"
                    data-i18n="tip_title">
                    Conseil d'administration
                </h4>

                <p class="mt-2 text-sm leading-7 text-slate-500"
                   data-i18n="tip_description">
                    Pensez à vérifier les inscriptions et les demandes de formation régulièrement
                    afin de faciliter l'accès des étudiants aux cours.
                </p>

            </div>
        </div>
    </section>

</main>


<!-- FOOTER -->
<footer class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 pb-6">

    <div class="border-t border-slate-200 pt-5 flex flex-col sm:flex-row items-center justify-between gap-3">

        <div class="flex items-center gap-2">

            <div class="w-7 h-7 rounded-lg bg-emerald-100 flex items-center justify-center">
                <i data-lucide="graduation-cap" class="w-4 h-4 text-emerald-700"></i>
            </div>

            <span class="text-sm font-extrabold text-slate-700">
                Étude<span class="text-emerald-500">EnLigne</span>
            </span>

        </div>

        <p class="text-xs text-slate-400 text-center">
            © {{ date('Y') }} ÉtudeEnLigne.
            <span data-i18n="footer_text">Tous droits réservés.</span>
        </p>

        <p class="text-xs text-slate-400" data-i18n="footer_admin">
            Espace Administration
        </p>

    </div>
</footer>


<script>
    const translations = {
        fr: {
            admin_brand: "ADMINISTRATION · الإدارة",
            dashboard: "Tableau de bord",
            formations: "Formations",
            courses: "Cours",
            quizzes: "Quiz",
            registrations: "Inscriptions",
            requests: "Demandes de formations",
            admin_role: "Administrateur",
            logout: "Déconnexion",

            notifications_title: "Notifications",
            notifications_subtitle: "Consultez les nouvelles demandes.",
            notification_registrations: "Inscriptions en attente",
            notification_requests: "Demandes de formation",
            notification_view: "Cliquer pour consulter",
            notifications_empty: "Aucune nouvelle demande pour le moment.",

            welcome_badge: "ESPACE ADMINISTRATEUR",
            welcome: "Bienvenue",
            welcome_description: "Pilotez votre plateforme de formation depuis un espace simple, moderne et centralisé.",
            manage_formations: "Gérer les formations",
            view_registrations: "Voir les inscriptions",
            workspace: "VOTRE ESPACE DE TRAVAIL",
            quick_access: "Accès rapide",
            quick_description: "Retrouvez tous les outils de gestion de votre plateforme.",
            secure_admin: "Espace sécurisé",

            module_01: "MODULE 01",
            module_02: "MODULE 02",
            module_03: "MODULE 03",
            module_04: "MODULE 04",
            module_05: "MODULE 05",

            formations_desc: "Créez, modifiez et organisez les formations proposées aux étudiants.",
            courses_desc: "Gérez les leçons, les documents et les ressources pédagogiques.",
            quizzes_desc: "Préparez des évaluations et gérez les questions des quiz.",
            registrations_desc: "Consultez les étudiants et gérez leurs inscriptions.",
            requests_desc: "Consultez les demandes et gérez l'accès aux formations.",

            manage: "Gérer",
            secure: "SÉCURITÉ",
            account_title: "Votre espace sécurisé",
            account_desc: "Vous êtes connecté à l'espace de gestion de la plateforme.",
            account_active: "Compte administrateur actif",

            tip_title: "Conseil d'administration",
            tip_description: "Pensez à vérifier les inscriptions et les demandes de formation régulièrement afin de faciliter l'accès des étudiants aux cours.",

            footer_text: "Tous droits réservés.",
            footer_admin: "Espace Administration"
        },

        ar: {
            admin_brand: "الإدارة · ADMINISTRATION",
            dashboard: "لوحة التحكم",
            formations: "التكوينات",
            courses: "الدروس",
            quizzes: "الاختبارات",
            registrations: "التسجيلات",
            requests: "طلبات التكوين",
            admin_role: "مدير المنصة",
            logout: "تسجيل الخروج",

            notifications_title: "الإشعارات",
            notifications_subtitle: "اطلعي على الطلبات الجديدة.",
            notification_registrations: "التسجيلات المعلقة",
            notification_requests: "طلبات التكوين",
            notification_view: "اضغطي للاطلاع",
            notifications_empty: "لا توجد طلبات جديدة حالياً.",

            welcome_badge: "فضاء الإدارة",
            welcome: "مرحبا بك",
            welcome_description: "قومي بتدبير منصة التكوين من خلال فضاء بسيط وعصري يجمع جميع أدوات الإدارة.",
            manage_formations: "تدبير التكوينات",
            view_registrations: "عرض التسجيلات",
            workspace: "فضاء العمل الخاص بك",
            quick_access: "الوصول السريع",
            quick_description: "جميع أدوات تدبير المنصة متوفرة هنا.",
            secure_admin: "فضاء آمن",

            module_01: "الوحدة 01",
            module_02: "الوحدة 02",
            module_03: "الوحدة 03",
            module_04: "الوحدة 04",
            module_05: "الوحدة 05",

            formations_desc: "إضافة التكوينات وتعديلها وتنظيمها للطلبة.",
            courses_desc: "تدبير الدروس والوثائق والموارد التعليمية.",
            quizzes_desc: "إعداد الاختبارات وتدبير الأسئلة.",
            registrations_desc: "الاطلاع على الطلبة وتدبير تسجيلاتهم.",
            requests_desc: "الاطلاع على طلبات التكوين وتدبير الولوج إليها.",

            manage: "تدبير",
            secure: "الأمان",
            account_title: "فضاء إداري آمن",
            account_desc: "أنت متصلة بفضاء تدبير المنصة.",
            account_active: "حساب الإدارة نشط",

            tip_title: "نصيحة للإدارة",
            tip_description: "احرصي على مراجعة التسجيلات وطلبات التكوين بانتظام لتسهيل ولوج الطلبة إلى الدروس.",

            footer_text: "جميع الحقوق محفوظة.",
            footer_admin: "فضاء الإدارة"
        }
    };

    let currentLanguage =
        localStorage.getItem('etudierenligne_admin_language') || 'fr';

    if (!translations[currentLanguage]) {
        currentLanguage = 'fr';
    }

    function applyLanguage(language) {
        currentLanguage = language;

        const isArabic = language === 'ar';
        const dictionary = translations[language];

        document.documentElement.lang = language;
        document.documentElement.dir = isArabic ? 'rtl' : 'ltr';

        document.getElementById('languageLabel').textContent =
            isArabic ? 'Français' : 'العربية';

        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.dataset.i18n;

            if (Object.prototype.hasOwnProperty.call(dictionary, key)) {
                element.textContent = dictionary[key];
            }
        });

        document.querySelectorAll('.user-info').forEach(element => {
            element.classList.toggle('text-right', !isArabic);
            element.classList.toggle('text-left', isArabic);
        });

        localStorage.setItem('etudierenligne_admin_language', language);

        lucide.createIcons();
    }

    function toggleLanguage() {
        applyLanguage(currentLanguage === 'fr' ? 'ar' : 'fr');
    }

    // OPEN AND CLOSE NOTIFICATIONS
    function toggleNotifications() {
        const panel = document.getElementById('notificationPanel');
        const button = document.getElementById('notificationButton');

        if (!panel || !button) {
            return;
        }

        panel.classList.toggle('hidden');

        const isOpen = !panel.classList.contains('hidden');

        button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    // CLOSE NOTIFICATIONS WHEN CLICKING OUTSIDE
    document.addEventListener('click', function (event) {
        const panel = document.getElementById('notificationPanel');
        const button = document.getElementById('notificationButton');

        if (
            panel &&
            button &&
            !panel.contains(event.target) &&
            !button.contains(event.target)
        ) {
            panel.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // MOBILE MENU
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');

        const isOpen = !mobileMenu.classList.contains('hidden');

        mobileMenuButton.setAttribute(
            'aria-expanded',
            isOpen ? 'true' : 'false'
        );

        mobileMenuButton.innerHTML = isOpen
            ? '<i data-lucide="x" class="w-5 h-5"></i>'
            : '<i data-lucide="menu" class="w-5 h-5"></i>';

        lucide.createIcons();
    });

    // INITIALIZE PAGE
    applyLanguage(currentLanguage);
    lucide.createIcons();
</script>

</body>
</html>
