<!DOCTYPE html>
<html lang="fr" dir="ltr" data-lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mes formations - CAD Academy</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --red: #d71920;
            --red-dark: #a80f15;
            --red-soft: #fff1f1;
            --red-line: #f5c9cb;
            --ink: #1f1415;
            --muted: #6b5b5c;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', 'IBM Plex Sans Arabic', sans-serif;
            background: #fff;
            color: var(--ink);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        html[dir="rtl"] body {
            font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif;
            line-height: 1.8;
        }

        :focus-visible {
            outline: 3px solid var(--red);
            outline-offset: 2px;
            border-radius: 8px;
        }

        html[data-lang="fr"] .t-ar,
        html[data-lang="ar"] .t-fr {
            display: none !important;
        }

        /* ===== Hero ===== */
        .hero {
            background: linear-gradient(135deg, var(--red) 0%, var(--red-dark) 100%);
            color: #fff;
            border-radius: 24px;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset-inline-end: -60px;
            top: -60px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset-inline-end: 80px;
            bottom: -80px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
        }

        /* ===== Boutons langue / filtres ===== */
        .lb {
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            background: transparent;
            cursor: pointer;
            transition: all .15s ease;
        }

        .lb.on {
            background: var(--red);
            color: #fff;
        }

        .fb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
            background: #fff;
            border: 1px solid var(--red-line);
            cursor: pointer;
            transition: all .15s ease;
        }

        .fb:hover {
            border-color: var(--red);
            color: var(--red);
            transform: translateY(-1px);
        }

        .fb.on {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .fb .cnt {
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            display: inline-grid;
            place-items: center;
            background: var(--red-soft);
            color: var(--red);
        }

        .fb.on .cnt {
            background: rgba(255,255,255,.25);
            color: #fff;
        }

        /* ===== Statistiques ===== */
        .stat {
            background: #fff;
            border: 1px solid var(--red-line);
            border-radius: 16px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all .2s ease;
            text-align: start;
            width: 100%;
        }

        .stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px -12px rgba(215,25,32,.45);
            border-color: var(--red);
        }

        .stat .ico {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--red-soft);
            color: var(--red);
            display: grid;
            place-items: center;
        }

        .stat b {
            font-size: 22px;
            font-weight: 800;
            line-height: 1;
            display: block;
        }

        .stat span.l {
            font-size: 12px;
            color: var(--muted);
            font-weight: 600;
        }

        /* ===== Boutons d'action ===== */
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 11px 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all .15s ease;
            border: 1px solid transparent;
        }

        .b-main {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .b-main:hover {
            background: var(--red-dark);
            box-shadow: 0 8px 18px -8px rgba(215,25,32,.7);
        }

        .b-soft {
            background: var(--red-soft);
            color: var(--red);
            border-color: var(--red-line);
        }

        .b-soft:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .b-cert {
            background: #fff;
            color: var(--red);
            border-color: var(--red);
        }

        .b-cert:hover {
            background: var(--red-soft);
        }

        .btn.loading {
            pointer-events: none;
            opacity: .75;
        }

        .spin {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid currentColor;
            border-top-color: transparent;
            animation: sp .7s linear infinite;
        }

        @keyframes sp {
            to { transform: rotate(360deg); }
        }

        /* ===== Cartes ===== */
        .card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 20px;
            border: 1px solid var(--red-line);
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
            animation: rise .45s ease both;
        }

        .card::before {
            content: "";
            position: absolute;
            inset-inline: 0;
            top: 0;
            height: 4px;
            background: var(--red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .3s ease;
        }

        html[dir="rtl"] .card::before {
            transform-origin: right;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 36px -18px rgba(215,25,32,.5);
            border-color: var(--red);
        }

        .card:hover::before,
        .card.is-active::before {
            transform: scaleX(1);
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: none; }
        }

        .badge {
            flex-shrink: 0;
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 700;
        }

        .bd-active { background: var(--red); color: #fff; }
        .bd-pending { background: #fff; color: var(--red); border: 1px dashed var(--red); }
        .bd-locked { background: #f1ecec; color: #6b5b5c; }

        /* ===== Recherche ===== */
        .search {
            width: 100%;
            padding: 11px 16px;
            padding-inline-start: 42px;
            border-radius: 999px;
            border: 1px solid var(--red-line);
            background: #fff;
            font-size: 14px;
            font-family: inherit;
            transition: all .15s ease;
        }

        .search:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 0 4px rgba(215,25,32,.12);
        }

        /* ===== Tiroir profil ===== */
        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(31,20,21,.5);
            backdrop-filter: blur(2px);
            opacity: 0;
            pointer-events: none;
            transition: opacity .25s ease;
            z-index: 40;
        }

        .overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        .drawer {
            position: fixed;
            top: 0;
            bottom: 0;
            inset-inline-end: 0;
            width: min(440px, 100%);
            background: #fff;
            z-index: 50;
            overflow-y: auto;
            transform: translateX(100%);
            transition: transform .3s cubic-bezier(.2,.8,.2,1);
            box-shadow: -20px 0 40px -20px rgba(0,0,0,.3);
        }

        html[dir="rtl"] .drawer {
            transform: translateX(-100%);
            box-shadow: 20px 0 40px -20px rgba(0,0,0,.3);
        }

        .drawer.open {
            transform: none !important;
        }

        .avatar {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: #fff;
            color: var(--red);
            display: grid;
            place-items: center;
            font-size: 30px;
            font-weight: 800;
            border: 4px solid rgba(255,255,255,.5);
            box-shadow: 0 8px 20px -8px rgba(0,0,0,.4);
        }

        .tab {
            flex: 1;
            padding: 10px;
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: all .15s ease;
        }

        .tab.on {
            color: var(--red);
            border-color: var(--red);
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--ink);
        }

        .field input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 12px;
            border: 1px solid var(--red-line);
            font-size: 14px;
            font-family: inherit;
            background: #fff;
            transition: all .15s ease;
        }

        .field input:focus {
            outline: none;
            border-color: var(--red);
            box-shadow: 0 0 0 4px rgba(215,25,32,.12);
        }

        .field input.bad {
            border-color: var(--red);
            background: var(--red-soft);
        }

        .field .err {
            color: var(--red);
            font-size: 12px;
            font-weight: 600;
            margin-top: 4px;
        }

        .eye {
            position: absolute;
            inset-inline-end: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            cursor: pointer;
            padding: 4px;
        }

        .meter {
            height: 6px;
            border-radius: 99px;
            background: #f1ecec;
            overflow: hidden;
        }

        .meter i {
            display: block;
            height: 100%;
            width: 0;
            background: var(--red);
            transition: width .25s ease;
        }

        /* ===== CV ===== */
        .cv-panel {
            border: 1px solid var(--red-line);
            background: var(--red-soft);
            border-radius: 16px;
            padding: 18px;
        }

        .cv-file {
            border: 1px solid var(--red-line);
            background: #fff;
            border-radius: 14px;
            padding: 14px;
        }

        .cv-input {
            width: 100%;
            padding: 12px;
            border: 1px dashed var(--red-line);
            border-radius: 12px;
            background: #fff;
            font-size: 13px;
        }

        .cv-input:focus {
            outline: none;
            border-color: var(--red);
        }

        /* ===== Modal confirmation + toast ===== */
        .modal {
            position: fixed;
            inset: 0;
            display: none;
            place-items: center;
            z-index: 60;
            padding: 16px;
            background: rgba(31,20,21,.5);
            backdrop-filter: blur(2px);
        }

        .modal.open {
            display: grid;
        }

        .modal > div {
            animation: rise .25s ease both;
        }

        .toast {
            position: fixed;
            bottom: 20px;
            inset-inline-start: 50%;
            transform: translate(-50%, 30px);
            background: var(--ink);
            color: #fff;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            opacity: 0;
            pointer-events: none;
            transition: all .3s ease;
            z-index: 70;
            border-inline-start: 4px solid var(--red);
        }

        html[dir="rtl"] .toast {
            transform: translate(50%, 30px);
        }

        .toast.show {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        html[dir="rtl"] .toast.show {
            transform: translate(50%, 0);
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

@php
    $student = auth()->user();

    $sfs = $student ? $student->formations()->get()->keyBy('id') : collect();

    $certs = $student
        ? $student->certificates()->whereIn('status', ['active', 'approved'])->get()->keyBy('formation_id')
        : collect();

    $counts = ['all' => 0, 'active' => 0, 'pending' => 0, 'locked' => 0];

    foreach (($allFormations ?? collect()) as $f) {
        $s = optional($sfs->get($f->id))->pivot->status ?? 'locked';
        $k = $s === 'active' ? 'active' : ($s === 'pending' ? 'pending' : 'locked');
        $counts[$k]++;
        $counts['all']++;
    }

    $initials = $student
        ? mb_strtoupper(mb_substr($student->name ?? 'E', 0, 1) . (mb_substr(strstr($student->name ?? '', ' ') ?: '', 1, 1)))
        : 'E';

    // Erreurs CV : ouvrir automatiquement l'onglet CV
    $profileErrors = $errors->has('cv');

    $passwordErrors = $errors->hasAny(['current_password', 'password']);
@endphp

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-5">

    {{-- Barre de navigation --}}
    <div class="flex items-center justify-between gap-3 mb-6">

        <span class="text-lg font-extrabold" style="color:var(--ink)">
            CAD <span style="color:var(--red)">Academy</span>
        </span>

        <div class="flex items-center gap-2">

            <div class="flex rounded-lg bg-white p-1 border" style="border-color:var(--red-line)">
                <button type="button" id="lang-fr" class="lb">FR</button>
                <button type="button" id="lang-ar" class="lb">عربي</button>
            </div>

            {{-- Bouton profil --}}
            <button type="button" id="openProfile" class="fb" aria-haspopup="dialog">
                <span class="w-6 h-6 rounded-full grid place-items-center text-xs font-extrabold text-white" style="background:var(--red)">
                    {{ $initials }}
                </span>
                <span class="t-fr">Mon profil</span>
                <span class="t-ar">ملفي الشخصي</span>
            </button>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="fb" aria-label="Déconnexion">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    <span class="t-fr hidden sm:inline">Déconnexion</span>
                    <span class="t-ar hidden sm:inline">تسجيل الخروج</span>
                </button>
            </form>

        </div>
    </div>

    {{-- Messages --}}
    @foreach(['formation_message', 'certificate_message', 'profile_message'] as $k)
        @if(session($k))
            <div class="flash mb-4 rounded-xl border p-4 text-sm font-semibold flex items-start justify-between gap-3"
                 style="background:var(--red-soft);border-color:var(--red-line);color:var(--red-dark)">
                <span>{{ session($k) }}</span>
                <button type="button" class="font-bold" onclick="this.parentElement.remove()" aria-label="Fermer">✕</button>
            </div>
        @endif
    @endforeach

    @if(session('error'))
        <div class="flash mb-4 rounded-xl border p-4 text-sm font-semibold flex items-start justify-between gap-3"
             style="background:#fff;border-color:var(--red);color:var(--red-dark)">
            <span>{{ session('error') }}</span>
            <button type="button" class="font-bold" onclick="this.parentElement.remove()" aria-label="Fermer">✕</button>
        </div>
    @endif

    {{-- Hero --}}
    <section class="hero p-6 sm:p-8 mb-6">
        <div class="relative z-10 flex items-center gap-4">

            <div class="hidden sm:grid avatar">{{ $initials }}</div>

            <div>
                <p class="text-sm font-semibold opacity-90">
                    <span class="t-fr">Bienvenue</span>
                    <span class="t-ar">مرحبا</span>
                </p>

                <h1 class="text-2xl sm:text-3xl font-extrabold">
                    {{ $student->name ?? '' }}
                </h1>

                <p class="text-sm opacity-90 mt-1">
                    <span class="t-fr">Retrouvez ici toutes vos formations et leur état.</span>
                    <span class="t-ar">تجد هنا جميع تكويناتك وحالتها.</span>
                </p>
            </div>

        </div>
    </section>

    @if(isset($allFormations) && $allFormations->count() > 0)

        {{-- Statistiques cliquables --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">

            <button type="button" class="stat" data-jump="all">
                <span class="ico">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </span>
                <span>
                    <b data-count="{{ $counts['all'] }}">0</b>
                    <span class="l">
                        <span class="t-fr">Formations</span>
                        <span class="t-ar">التكوينات</span>
                    </span>
                </span>
            </button>

            <button type="button" class="stat" data-jump="active">
                <span class="ico">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </span>
                <span>
                    <b data-count="{{ $counts['active'] }}">0</b>
                    <span class="l">
                        <span class="t-fr">Actives</span>
                        <span class="t-ar">مفعّلة</span>
                    </span>
                </span>
            </button>

            <button type="button" class="stat" data-jump="pending">
                <span class="ico">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </span>
                <span>
                    <b data-count="{{ $counts['pending'] }}">0</b>
                    <span class="l">
                        <span class="t-fr">En attente</span>
                        <span class="t-ar">قيد الانتظار</span>
                    </span>
                </span>
            </button>

            <button type="button" class="stat" data-jump="locked">
                <span class="ico">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </span>
                <span>
                    <b data-count="{{ $counts['locked'] }}">0</b>
                    <span class="l">
                        <span class="t-fr">Verrouillées</span>
                        <span class="t-ar">مقفلة</span>
                    </span>
                </span>
            </button>

        </div>

        {{-- Recherche + filtres --}}
        <div class="flex flex-col lg:flex-row lg:items-center gap-3 mb-6">

            <div class="relative flex-1">
                <svg class="absolute top-1/2 -translate-y-1/2"
                     style="inset-inline-start:15px;color:var(--red)"
                     width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>

                <input id="search" type="search" class="search" autocomplete="off"
                       placeholder="Rechercher une formation…"
                       aria-label="Rechercher une formation">
            </div>

            <div class="flex flex-wrap gap-2" role="group" aria-label="Filtres des formations">

                <button type="button" class="fb on" data-filter="all">
                    <span class="t-fr">Toutes</span>
                    <span class="t-ar">الكل</span>
                    <span class="cnt">{{ $counts['all'] }}</span>
                </button>

                <button type="button" class="fb" data-filter="active">
                    <span class="t-fr">Actives</span>
                    <span class="t-ar">مفعّلة</span>
                    <span class="cnt">{{ $counts['active'] }}</span>
                </button>

                <button type="button" class="fb" data-filter="pending">
                    <span class="t-fr">En attente</span>
                    <span class="t-ar">قيد الانتظار</span>
                    <span class="cnt">{{ $counts['pending'] }}</span>
                </button>

                <button type="button" class="fb" data-filter="locked">
                    <span class="t-fr">Verrouillées</span>
                    <span class="t-ar">مقفلة</span>
                    <span class="cnt">{{ $counts['locked'] }}</span>
                </button>

            </div>
        </div>

        {{-- Cartes des formations --}}
        <div id="grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

            @foreach($allFormations as $formation)

                @php
                    $sf = $sfs->get($formation->id);
                    $st = $sf ? ($sf->pivot->status ?? 'locked') : 'locked';

                    $isA = $st === 'active';
                    $isP = $st === 'pending';
                    $isR = $st === 'rejected';

                    $fk = $isA ? 'active' : ($isP ? 'pending' : 'locked');

                    $nc = $formation->cours->count();
                    $nq = ($formation->quizzes ?? collect())->count();

                    $certificate = $certs->get($formation->id);
                @endphp

                <article class="card {{ $isA ? 'is-active' : '' }}"
                         style="animation-delay: {{ min($loop->index, 8) * 60 }}ms"
                         data-status="{{ $fk }}"
                         data-name="{{ mb_strtolower($formation->name . ' ' . ($formation->category ?? '')) }}">

                    <div class="flex items-start justify-between gap-3 mb-3">

                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase tracking-wide" style="color:var(--red)">
                                {{ $formation->category ?: 'Formation' }}
                            </p>

                            <h2 class="text-lg font-bold leading-snug">
                                {{ $formation->name }}
                            </h2>
                        </div>

                        <span class="badge {{ $isA ? 'bd-active' : ($isP ? 'bd-pending' : 'bd-locked') }}">

                            @if($isA)
                                <span class="t-fr">Activée</span>
                                <span class="t-ar">مفعّلة</span>
                            @elseif($isP)
                                <span class="t-fr">En attente</span>
                                <span class="t-ar">قيد الانتظار</span>
                            @else
                                <span class="t-fr">Verrouillée</span>
                                <span class="t-ar">مقفلة</span>
                            @endif

                        </span>
                    </div>

                    <p class="text-sm mb-3 line-clamp-2" style="color:var(--muted)">
                        {{ $formation->description ?: 'Accédez aux cours et documents pour progresser.' }}
                    </p>

                    <p class="text-sm mb-5 flex flex-wrap items-center gap-x-3 gap-y-1" style="color:var(--muted)">

                        <span class="inline-flex items-center gap-1.5">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polygon points="23 7 16 12 23 17 23 7"/>
                                <rect x="1" y="5" width="15" height="14" rx="2"/>
                            </svg>
                            {{ $nc }}
                            <span class="t-fr">cours</span>
                            <span class="t-ar">دروس</span>
                        </span>

                        <span class="inline-flex items-center gap-1.5">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                <line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                            {{ $nq }}
                            <span class="t-fr">quiz</span>
                            <span class="t-ar">اختبارات</span>
                        </span>

                        @if(!empty($formation->duration))
                            <span class="inline-flex items-center gap-1.5">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                                {{ $formation->duration }}
                            </span>
                        @endif

                    </p>

                    <div class="mt-auto space-y-2">

                        @if($isA)

                            <a href="{{ route('formations.learn', $formation) }}" class="btn b-main">
                                <span class="t-fr">Commencer la formation</span>
                                <span class="t-ar">ابدأ التكوين</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="rtl:rotate-180">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </a>

                            @if($certificate && !empty($certificate->file_path))
                                <a href="{{ route('student.certificates.download', $certificate->id) }}" class="btn b-cert">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="7 10 12 15 17 10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                    <span class="t-fr">Télécharger le certificat</span>
                                    <span class="t-ar">تحميل الشهادة</span>
                                </a>
                            @endif

                        @elseif($isP)

                            <p class="rounded-xl border p-3 text-sm font-semibold flex items-center gap-2"
                               style="border-color:var(--red-line);background:var(--red-soft);color:var(--red-dark)">
                                <span class="spin" style="color:var(--red)"></span>
                                <span class="t-fr">Demande en attente de validation.</span>
                                <span class="t-ar">الطلب قيد المراجعة.</span>
                            </p>

                        @else

                            @if($isR)
                                <p class="text-xs font-bold" style="color:var(--red)">
                                    <span class="t-fr">Demande refusée : vous pouvez la renvoyer.</span>
                                    <span class="t-ar">تم رفض الطلب: يمكنك إعادة إرساله.</span>
                                </p>
                            @endif

                            <form action="{{ route('formations.request', $formation) }}"
                                  method="POST"
                                  class="request-form"
                                  data-title="{{ $formation->name }}">

                                @csrf

                                <button type="submit" class="btn b-soft">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 9.9-1"/>
                                    </svg>

                                    @if($isR)
                                        <span class="t-fr">Demander à nouveau</span>
                                        <span class="t-ar">إعادة الطلب</span>
                                    @else
                                        <span class="t-fr">Demander l'accès</span>
                                        <span class="t-ar">طلب الوصول</span>
                                    @endif
                                </button>

                            </form>

                        @endif

                    </div>
                </article>

            @endforeach

        </div>

        <p id="filterEmpty" class="hidden text-center text-sm py-10" style="color:var(--muted)">
            <span class="t-fr">Aucune formation ne correspond à votre recherche.</span>
            <span class="t-ar">لا توجد تكوينات مطابقة لبحثك.</span>
        </p>

    @else

        <p class="text-center py-12" style="color:var(--muted)">
            <span class="t-fr">Aucune formation disponible pour le moment.</span>
            <span class="t-ar">لا توجد تكوينات متاحة حاليا.</span>
        </p>

    @endif

</div>

{{-- ============ TIROIR PROFIL ============ --}}

<div id="overlay" class="overlay"></div>

<aside id="drawer"
       class="drawer"
       role="dialog"
       aria-modal="true"
       aria-labelledby="profileTitle"
       aria-hidden="true">

    <div class="hero rounded-none p-6 pb-8" style="border-radius:0 0 28px 28px">

        <div class="relative z-10 flex items-center justify-between mb-4">

            <h2 id="profileTitle" class="text-lg font-extrabold">
                <span class="t-fr">Mon profil</span>
                <span class="t-ar">ملفي الشخصي</span>
            </h2>

            <button type="button"
                    id="closeProfile"
                    class="w-9 h-9 rounded-full grid place-items-center bg-white/20 hover:bg-white/30 transition"
                    aria-label="Fermer">
                ✕
            </button>

        </div>

        <div class="relative z-10 flex items-center gap-4">

            <div class="avatar" id="avatarLive">{{ $initials }}</div>

            <div class="min-w-0">
                <p class="font-extrabold text-lg truncate" id="nameLive">
                    {{ $student->name ?? '' }}
                </p>

                <p class="text-sm opacity-90 truncate">
                    {{ $student->email ?? '' }}
                </p>
            </div>

        </div>
    </div>

    {{-- Onglets --}}
    <div class="flex border-b mx-6 mt-4"
         style="border-color:var(--red-line)"
         role="tablist">

        <button type="button"
                class="tab on"
                data-tab="infos"
                role="tab">
            <span class="t-fr">Mon CV</span>
            <span class="t-ar">سيرتي الذاتية</span>
        </button>

        <button type="button"
                class="tab"
                data-tab="security"
                role="tab">
            <span class="t-fr">Mot de passe</span>
            <span class="t-ar">كلمة المرور</span>
        </button>

    </div>

    {{-- ============ ONGLET CV ============ --}}
    <div id="tab-infos" class="p-6 space-y-4">

        <div class="cv-panel">

            <div class="flex items-center gap-3 mb-3">

                <div class="w-12 h-12 rounded-xl bg-white grid place-items-center"
                     style="color:var(--red)">
                    <svg width="27" height="27" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="8" y1="13" x2="16" y2="13"/>
                        <line x1="8" y1="17" x2="16" y2="17"/>
                    </svg>
                </div>

                <div>
                    <h3 class="font-extrabold text-lg">
                        <span class="t-fr">Mon CV</span>
                        <span class="t-ar">سيرتي الذاتية</span>
                    </h3>

                    <p class="text-xs" style="color:var(--muted)">
                        <span class="t-fr">Mon parcours et mes compétences</span>
                        <span class="t-ar">مساري الدراسي ومهاراتي</span>
                    </p>
                </div>

            </div>

            <p class="text-sm mb-4" style="color:var(--muted)">
                <span class="t-fr">
                    Ajoutez votre CV au format PDF. Votre parcours, vos diplômes,
                    vos expériences et vos compétences seront présentés dans ce document.
                </span>

                <span class="t-ar">
                    أضف سيرتك الذاتية بصيغة PDF. ستجد داخلها مسارك الدراسي
                    وشهاداتك وتجاربك ومهاراتك.
                </span>
            </p>

            {{-- CV déjà ajouté --}}
            @if($student->cv_path)

                <div class="cv-file mb-4">

                    <div class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl grid place-items-center font-extrabold text-sm"
                             style="background:var(--red-soft);color:var(--red)">
                            PDF
                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="font-bold text-sm truncate">
                                CV-etudiant-{{ $student->id }}.pdf
                            </p>

                            <p class="text-xs mt-1" style="color:var(--muted)">
                                <span class="t-fr">Déposé le :</span>
                                <span class="t-ar">تاريخ الإيداع:</span>

                                {{ $student->cv_uploaded_at?->format('d/m/Y à H:i') ?? 'Date inconnue' }}
                            </p>

                        </div>

                    </div>

                    <a href="{{ route('profile.cv.download') }}"
                       class="btn b-cert mt-4">

                        <svg width="18" height="18" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>

                        <span class="t-fr">Télécharger mon CV</span>
                        <span class="t-ar">تحميل سيرتي الذاتية</span>

                    </a>

                </div>

            @else

                <div class="cv-file mb-4 text-center">

                    <div class="w-12 h-12 rounded-full mx-auto mb-2 grid place-items-center"
                         style="background:var(--red-soft);color:var(--red)">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>
                        </svg>
                    </div>

                    <p class="font-bold text-sm">
                        <span class="t-fr">Aucun CV ajouté</span>
                        <span class="t-ar">لم تتم إضافة السيرة الذاتية بعد</span>
                    </p>

                    <p class="text-xs mt-1" style="color:var(--muted)">
                        <span class="t-fr">Ajoutez votre CV pour compléter votre profil.</span>
                        <span class="t-ar">أضف سيرتك الذاتية لإكمال ملفك الشخصي.</span>
                    </p>

                </div>

            @endif

            {{-- Formulaire upload / remplacement --}}
            <form action="{{ route('profile.cv.upload') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-3">

                @csrf

                <label for="cv-file" class="block font-bold text-sm">
                    @if($student->cv_path)
                        <span class="t-fr">Remplacer mon CV (PDF)</span>
                        <span class="t-ar">استبدال سيرتي الذاتية (PDF)</span>
                    @else
                        <span class="t-fr">Choisir mon CV (PDF)</span>
                        <span class="t-ar">اختيار سيرتي الذاتية (PDF)</span>
                    @endif
                </label>

                <input
                    id="cv-file"
                    type="file"
                    name="cv"
                    accept=".pdf,application/pdf"
                    required
                    class="cv-input"
                >

                @error('cv')
                    <p class="text-sm font-semibold" style="color:var(--red)">
                        {{ $message }}
                    </p>
                @enderror

                <p class="text-xs" style="color:var(--muted)">
                    <span class="t-fr">Format accepté : PDF. Taille maximale : 5 Mo.</span>
                    <span class="t-ar">الصيغة المقبولة: PDF. الحجم الأقصى: 5 ميغابايت.</span>
                </p>

                <button type="submit" class="btn b-main">

                    <svg width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="17 8 12 3 7 8"/>
                        <line x1="12" y1="3" x2="12" y2="15"/>
                    </svg>

                    @if($student->cv_path)
                        <span class="t-fr">Mettre à jour mon CV</span>
                        <span class="t-ar">تحديث سيرتي الذاتية</span>
                    @else
                        <span class="t-fr">Envoyer mon CV</span>
                        <span class="t-ar">إرسال سيرتي الذاتية</span>
                    @endif

                </button>

            </form>

        </div>

        <p class="text-xs text-center" style="color:var(--muted)">
            <span class="t-fr">Votre CV est privé et accessible uniquement depuis votre compte.</span>
            <span class="t-ar">سيرتك الذاتية خاصة ويمكنك الوصول إليها من حسابك فقط.</span>
        </p>

    </div>

    {{-- ============ ONGLET MOT DE PASSE ============ --}}
    <form id="tab-security"
          action="{{ route('password.update') }}"
          method="POST"
          class="p-6 space-y-4 hidden"
          novalidate>

        @csrf
        @method('PUT')

        <div class="field">

            <label for="s-current">
                <span class="t-fr">Mot de passe actuel</span>
                <span class="t-ar">كلمة المرور الحالية</span>
            </label>

            <div class="relative">
                <input id="s-current"
                       name="current_password"
                       type="password"
                       autocomplete="current-password"
                       class="{{ $errors->has('current_password') ? 'bad' : '' }}">

                <button type="button" class="eye" data-eye="s-current" aria-label="Afficher">👁</button>
            </div>

            <p class="err {{ $errors->has('current_password') ? '' : 'hidden' }}">
                {{ $errors->first('current_password') }}
            </p>

        </div>

        <div class="field">

            <label for="s-new">
                <span class="t-fr">Nouveau mot de passe</span>
                <span class="t-ar">كلمة المرور الجديدة</span>
            </label>

            <div class="relative">
                <input id="s-new"
                       name="password"
                       type="password"
                       autocomplete="new-password"
                       class="{{ $errors->has('password') ? 'bad' : '' }}">

                <button type="button" class="eye" data-eye="s-new" aria-label="Afficher">👁</button>
            </div>

            <div class="meter mt-2">
                <i id="meterBar"></i>
            </div>

            <p class="text-xs mt-1" style="color:var(--muted)" id="meterTxt"></p>

            <p class="err {{ $errors->has('password') ? '' : 'hidden' }}">
                {{ $errors->first('password') }}
            </p>

        </div>

        <div class="field">

            <label for="s-conf">
                <span class="t-fr">Confirmer le mot de passe</span>
                <span class="t-ar">تأكيد كلمة المرور</span>
            </label>

            <div class="relative">
                <input id="s-conf"
                       name="password_confirmation"
                       type="password"
                       autocomplete="new-password">

                <button type="button" class="eye" data-eye="s-conf" aria-label="Afficher">👁</button>
            </div>

            <p class="err hidden" id="confErr">
                <span class="t-fr">Les mots de passe ne correspondent pas.</span>
                <span class="t-ar">كلمتا المرور غير متطابقتين.</span>
            </p>

        </div>

        <button type="submit" id="savePwd" class="btn b-main">
            <span class="t-fr">Changer le mot de passe</span>
            <span class="t-ar">تغيير كلمة المرور</span>
        </button>

    </form>

</aside>

{{-- ============ MODAL CONFIRMATION ============ --}}
<div id="confirmModal" class="modal" role="dialog" aria-modal="true">

    <div class="bg-white rounded-2xl p-6 w-full max-w-sm text-center shadow-2xl">

        <div class="mx-auto w-14 h-14 rounded-full grid place-items-center mb-3"
             style="background:var(--red-soft);color:var(--red)">
            <svg width="26" height="26" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 9.9-1"/>
            </svg>
        </div>

        <h3 class="font-extrabold text-lg mb-1">
            <span class="t-fr">Demander l'accès ?</span>
            <span class="t-ar">طلب الوصول؟</span>
        </h3>

        <p class="text-sm mb-5" style="color:var(--muted)">
            <span class="t-fr">Votre demande pour</span>
            <span class="t-ar">سيتم إرسال طلبك لـ</span>
            <b id="confirmTitle" style="color:var(--ink)"></b>
            <span class="t-fr">sera envoyée pour validation.</span>
            <span class="t-ar">للمراجعة.</span>
        </p>

        <div class="flex gap-2">

            <button type="button" id="confirmNo" class="btn b-cert">
                <span class="t-fr">Annuler</span>
                <span class="t-ar">إلغاء</span>
            </button>

            <button type="button" id="confirmYes" class="btn b-main">
                <span class="t-fr">Confirmer</span>
                <span class="t-ar">تأكيد</span>
            </button>

        </div>

    </div>
</div>

<div id="toast" class="toast" role="status" aria-live="polite"></div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const $ = (s, r = document) => r.querySelector(s);
    const $$ = (s, r = document) => [...r.querySelectorAll(s)];
    const html = document.documentElement;

    /* ---------- Langue ---------- */
    const fr = $('#lang-fr');
    const ar = $('#lang-ar');
    const search = $('#search');

    const placeholders = {
        fr: 'Rechercher une formation…',
        ar: 'ابحث عن تكوين…'
    };

    function setLanguage(language) {

        const isAr = language === 'ar';

        html.dataset.lang = isAr ? 'ar' : 'fr';
        html.dir = isAr ? 'rtl' : 'ltr';
        html.lang = isAr ? 'ar' : 'fr';

        ar.classList.toggle('on', isAr);
        fr.classList.toggle('on', !isAr);

        if (search) {
            search.placeholder = placeholders[isAr ? 'ar' : 'fr'];
        }

        try {
            localStorage.setItem('etude_lang', isAr ? 'ar' : 'fr');
        } catch (e) {}
    }

    let saved = 'fr';

    try {
        saved = localStorage.getItem('etude_lang') || 'fr';
    } catch (e) {}

    setLanguage(saved);

    fr.addEventListener('click', () => setLanguage('fr'));
    ar.addEventListener('click', () => setLanguage('ar'));

    const isAr = () => html.dataset.lang === 'ar';

    /* ---------- Toast ---------- */
    const toast = $('#toast');
    let tt;

    function say(msg) {
        toast.textContent = msg;
        toast.classList.add('show');

        clearTimeout(tt);

        tt = setTimeout(() => {
            toast.classList.remove('show');
        }, 2800);
    }

    /* ---------- Compteurs animés ---------- */
    $$('[data-count]').forEach(el => {

        const target = +el.dataset.count;
        let n = 0;

        if (!target) {
            el.textContent = 0;
            return;
        }

        const step = Math.max(1, Math.ceil(target / 20));

        const iv = setInterval(() => {

            n = Math.min(target, n + step);
            el.textContent = n;

            if (n >= target) {
                clearInterval(iv);
            }

        }, 35);

    });

    /* ---------- Filtres + recherche ---------- */
    const cards = $$('[data-status]');
    const empty = $('#filterEmpty');
    const fbtns = $$('[data-filter]');

    let current = 'all';

    function apply() {

        const q = (search ? search.value : '').trim().toLowerCase();
        let visible = 0;

        cards.forEach(c => {

            const ok =
                (current === 'all' || c.dataset.status === current) &&
                (!q || c.dataset.name.includes(q));

            c.style.display = ok ? '' : 'none';

            if (ok) {
                visible++;
                c.style.animation = 'none';
                c.offsetHeight;
                c.style.animation = '';
            }

        });

        if (empty) {
            empty.classList.toggle('hidden', visible > 0);
        }
    }

    function setFilter(f) {

        current = f;

        fbtns.forEach(b => {
            b.classList.toggle('on', b.dataset.filter === f);
        });

        apply();
    }

    fbtns.forEach(b => {
        b.addEventListener('click', () => setFilter(b.dataset.filter));
    });

    $$('[data-jump]').forEach(b => {

        b.addEventListener('click', () => {

            setFilter(b.dataset.jump);

            const g = $('#grid');

            if (g) {
                g.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

        });

    });

    if (search) {
        search.addEventListener('input', apply);
    }

    /* ---------- Confirmation demande d'accès ---------- */
    const modal = $('#confirmModal');
    let pendingForm = null;

    $$('.request-form').forEach(f => {

        f.addEventListener('submit', e => {

            if (f.dataset.ok) return;

            e.preventDefault();

            pendingForm = f;

            $('#confirmTitle').textContent = '« ' + f.dataset.title + ' »';

            modal.classList.add('open');

        });

    });

    $('#confirmNo').addEventListener('click', () => {

        modal.classList.remove('open');
        pendingForm = null;

    });

    modal.addEventListener('click', e => {

        if (e.target === modal) {
            modal.classList.remove('open');
        }

    });

    $('#confirmYes').addEventListener('click', () => {

        if (!pendingForm) return;

        const btn = $('button[type=submit]', pendingForm);

        btn.classList.add('loading');
        btn.innerHTML = '<span class="spin"></span>';

        pendingForm.dataset.ok = '1';

        modal.classList.remove('open');

        pendingForm.submit();

    });

    /* ---------- Profil : tiroir ---------- */
    const drawer = $('#drawer');
    const overlay = $('#overlay');

    function openD() {

        drawer.classList.add('open');
        overlay.classList.add('open');

        drawer.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';

    }

    function closeD() {

        drawer.classList.remove('open');
        overlay.classList.remove('open');

        drawer.setAttribute('aria-hidden', 'true');

        document.body.style.overflow = '';

    }

    $('#openProfile').addEventListener('click', openD);
    $('#closeProfile').addEventListener('click', closeD);
    overlay.addEventListener('click', closeD);

    document.addEventListener('keydown', e => {

        if (e.key === 'Escape') {
            closeD();
            modal.classList.remove('open');
        }

    });

    /* ---------- Onglets profil ---------- */
    function showTab(name) {

        $$('.tab').forEach(t => {
            t.classList.toggle('on', t.dataset.tab === name);
        });

        $('#tab-infos').classList.toggle('hidden', name !== 'infos');
        $('#tab-security').classList.toggle('hidden', name !== 'security');

    }

    $$('.tab').forEach(t => {

        t.addEventListener('click', () => {
            showTab(t.dataset.tab);
        });

    });

    /* ---------- Ouverture automatique si erreurs ---------- */
    @if($passwordErrors)
        showTab('security');
        openD();
    @elseif($profileErrors)
        showTab('infos');
        openD();
    @endif

    /* ---------- CV : vérification du fichier ---------- */
    const cvInput = $('#cv-file');

    if (cvInput) {

        cvInput.addEventListener('change', () => {

            const file = cvInput.files[0];

            if (!file) return;

            const isPdf =
                file.type === 'application/pdf' ||
                file.name.toLowerCase().endsWith('.pdf');

            if (!isPdf) {

                cvInput.value = '';

                say(
                    isAr()
                        ? 'المرجو اختيار ملف PDF فقط.'
                        : 'Veuillez choisir un fichier PDF.'
                );

                return;
            }

            if (file.size > 5 * 1024 * 1024) {

                cvInput.value = '';

                say(
                    isAr()
                        ? 'حجم الملف يجب ألا يتجاوز 5 ميغابايت.'
                        : 'Le fichier ne doit pas dépasser 5 Mo.'
                );

                return;
            }

        });

    }

    /* ---------- Profil : mot de passe ---------- */
    $$('[data-eye]').forEach(b => {

        b.addEventListener('click', () => {

            const i = document.getElementById(b.dataset.eye);

            i.type = i.type === 'password' ? 'text' : 'password';

        });

    });

    const pw = $('#s-new');
    const conf = $('#s-conf');
    const bar = $('#meterBar');
    const txt = $('#meterTxt');

    const labels = {
        fr: ['', 'Faible', 'Moyen', 'Bon', 'Excellent'],
        ar: ['', 'ضعيفة', 'متوسطة', 'جيدة', 'ممتازة']
    };

    pw.addEventListener('input', () => {

        const v = pw.value;
        let s = 0;

        if (v.length >= 8) s++;
        if (/[A-Z]/.test(v) && /[a-z]/.test(v)) s++;
        if (/\d/.test(v)) s++;
        if (/[^A-Za-z0-9]/.test(v)) s++;

        if (!v) s = 0;

        bar.style.width = (s * 25) + '%';

        txt.textContent = labels[isAr() ? 'ar' : 'fr'][s];

    });

    $('#tab-security').addEventListener('submit', e => {

        if (pw.value !== conf.value) {

            e.preventDefault();

            $('#confErr').classList.remove('hidden');
            conf.classList.add('bad');

        } else {

            const b = $('#savePwd');

            b.classList.add('loading');
            b.innerHTML = '<span class="spin"></span>';

        }

    });

    conf.addEventListener('input', () => {

        $('#confErr').classList.add('hidden');
        conf.classList.remove('bad');

    });

    /* Fermer les messages flash après 6 s */
    $$('.flash').forEach(f => {
        setTimeout(() => f.remove(), 6000);
    });

});
</script>

</body>
</html>