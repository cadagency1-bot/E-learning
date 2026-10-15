<!DOCTYPE html>
<html lang="fr" dir="ltr" data-lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace étudiant - ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'IBM Plex Sans Arabic', 'sans-serif'] }
                }
            }
        };
    </script>

    <style>
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 150px; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', 'IBM Plex Sans Arabic', sans-serif;
            background: linear-gradient(180deg, #f0fdf7 0%, #f8fffb 45%, #ffffff 100%);
            background-attachment: fixed;
            color: #1f3d33;
            -webkit-font-smoothing: antialiased;
        }
        html[dir="rtl"] body { font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif; line-height: 1.9; }

        :focus-visible { outline: 2px solid #34d399; outline-offset: 2px; }

        /* Bascule de langue : un seul texte visible à la fois */
        html[data-lang="fr"] .t-ar { display: none !important; }
        html[data-lang="ar"] .t-fr { display: none !important; }

        html[dir="rtl"] .flip { transform: scaleX(-1); }

        .card {
            background: #fff;
            border: 1px solid #d9f2e6;
            border-radius: 22px;
            box-shadow: 0 6px 24px rgba(52, 211, 153, .10);
        }

        .menu-link {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 16px; border-radius: 999px;
            color: #4b6b5d; font-size: 14px; font-weight: 700; white-space: nowrap;
            transition: background .15s, color .15s;
        }
        .menu-link:hover, .menu-link.active { background: #d1fae5; color: #047857; }

        .formation-card {
            background: #fff;
            border: 1px solid #d9f2e6;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(52, 211, 153, .10);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .formation-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(52, 211, 153, .22); }

        .formation-image { height: 176px; width: 100%; object-fit: cover; display: block; }

        .btn-start {
            display: flex; width: 100%; align-items: center; justify-content: center; gap: 8px;
            padding: 13px 16px; border-radius: 14px;
            background: #34d399; color: #fff; font-size: 14px; font-weight: 800;
            text-decoration: none; box-shadow: 0 8px 18px rgba(52, 211, 153, .35);
            transition: background .15s, transform .15s;
        }
        .btn-start:hover { background: #10b981; transform: translateY(-1px); }

        .btn-soft {
            display: flex; width: 100%; align-items: center; justify-content: center; gap: 8px;
            padding: 12px 16px; border-radius: 14px;
            background: #d1fae5; color: #047857; font-size: 14px; font-weight: 800;
            transition: background .15s;
        }
        .btn-soft:hover { background: #a7f3d0; }

        .lang-btn { padding: 6px 12px; border-radius: 9px; font-size: 12px; font-weight: 800; color: #047857; }
        .lang-btn.on { background: #34d399; color: #fff; }

        @media (max-width: 640px) {
            .formation-image { height: 160px; }
            .menu-link { padding: 8px 12px; font-size: 13px; }
        }
    </style>
</head>

<body>

@php
    $student = auth()->user();

    $getFormationImage = function ($formation) {
        $text = \Illuminate\Support\Str::ascii(
            strtolower(($formation->category ?? '') . ' ' . ($formation->name ?? ''))
        );

        if (str_contains($text, 'medical') || str_contains($text, 'sante') ||
            str_contains($text, 'aide medicale') || str_contains($text, 'diabete') ||
            str_contains($text, 'soin') || str_contains($text, 'patient') ||
            str_contains($text, 'personne agee')) {
            return 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=85';
        }

        if (str_contains($text, 'hotel') || str_contains($text, 'restauration') ||
            str_contains($text, 'cuisine') || str_contains($text, 'restaurant') ||
            str_contains($text, 'hospitality')) {
            return 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=1200&q=85';
        }

        if (str_contains($text, 'programmation') || str_contains($text, 'informatique') ||
            str_contains($text, 'developpement') || str_contains($text, 'web') ||
            str_contains($text, 'design') || str_contains($text, 'digital') ||
            str_contains($text, 'reseau')) {
            return 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=85';
        }

        if (str_contains($text, 'secretariat') || str_contains($text, 'commerce') ||
            str_contains($text, 'bureautique') || str_contains($text, 'gestion') ||
            str_contains($text, 'entreprise') || str_contains($text, 'administrative')) {
            return 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=85';
        }

        if (str_contains($text, 'construction') || str_contains($text, 'batiment') ||
            str_contains($text, 'mecanique') || str_contains($text, 'menuiserie') ||
            str_contains($text, 'artisanat') || str_contains($text, 'platre') ||
            str_contains($text, 'electricite')) {
            return 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=85';
        }

        if (str_contains($text, 'ingenierie') || str_contains($text, 'ingenieur') ||
            str_contains($text, 'industriel')) {
            return 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=85';
        }

        return 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=85';
    };

    $getFormationColor = function ($formation) {
        $text = \Illuminate\Support\Str::ascii(
            strtolower(($formation->category ?? '') . ' ' . ($formation->name ?? ''))
        );

        if (str_contains($text, 'medical') || str_contains($text, 'sante')) {
            return ['bg'=>'bg-rose-50','text'=>'text-rose-600','border'=>'border-rose-100','icon'=>'heart-pulse'];
        }

        if (str_contains($text, 'hotel') || str_contains($text, 'restauration')) {
            return ['bg'=>'bg-orange-50','text'=>'text-orange-600','border'=>'border-orange-100','icon'=>'utensils'];
        }

        if (str_contains($text, 'programmation') || str_contains($text, 'informatique') ||
            str_contains($text, 'web') || str_contains($text, 'digital')) {
            return ['bg'=>'bg-blue-50','text'=>'text-blue-600','border'=>'border-blue-100','icon'=>'laptop'];
        }

        if (str_contains($text, 'commerce') || str_contains($text, 'secretariat')) {
            return ['bg'=>'bg-purple-50','text'=>'text-purple-600','border'=>'border-purple-100','icon'=>'briefcase-business'];
        }

        return ['bg'=>'bg-emerald-50','text'=>'text-emerald-600','border'=>'border-emerald-100','icon'=>'graduation-cap'];
    };

    // Charger les statuts de demande pour cet étudiant
    $studentFormationStatuses = $student->formations()
        ->get()
        ->keyBy('id');

    $totalFormations = isset($allFormations) ? $allFormations->count() : 0;
    $activeFormations = $studentFormationStatuses
        ->filter(fn ($f) => ($f->pivot->status ?? '') === 'active')
        ->count();
    $pendingFormations = $studentFormationStatuses
        ->filter(fn ($f) => ($f->pivot->status ?? '') === 'pending')
        ->count();
@endphp

<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-emerald-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between gap-4 py-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-0">
                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-emerald-100 overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/logo-centre.png') }}"
                         alt="Logo du centre"
                         class="w-full h-full object-contain"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <i data-lucide="graduation-cap" class="w-6 h-6 text-emerald-600" style="display:none"></i>
                </div>

                <div class="min-w-0">
                    <h1 class="text-lg font-extrabold text-emerald-700 leading-tight">ÉtudeEnLigne</h1>
                    <p class="text-xs text-emerald-600/70">
                        <span class="t-fr">Votre espace d'apprentissage</span>
                        <span class="t-ar">فضاؤك للتعلم</span>
                    </p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <div class="flex rounded-xl bg-emerald-50 p-1">
                    <button type="button" id="lang-fr" class="lang-btn">FR</button>
                    <button type="button" id="lang-ar" class="lang-btn">عربي</button>
                </div>

                <div class="hidden sm:block text-end">
                    <p class="text-sm font-bold text-emerald-900">{{ $student->name }}</p>
                    <p class="text-xs text-emerald-600/70">
                        <span class="t-fr">Espace étudiant</span>
                        <span class="t-ar">فضاء الطالب</span>
                    </p>
                </div>

                <a href="{{ route('profile.edit') }}"
                   title="Mon profil"
                   class="flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition">
                    <i data-lucide="user-round" class="w-5 h-5"></i>
                </a>
            </div>
        </div>

        <nav class="flex items-center gap-1 sm:gap-2 overflow-x-auto pb-3">
            <a href="#accueil" class="menu-link active">
                <i data-lucide="house" class="w-4 h-4"></i>
                <span class="t-fr">Accueil</span><span class="t-ar">الرئيسية</span>
            </a>

            <a href="#formations" class="menu-link">
                <i data-lucide="book-open" class="w-4 h-4"></i>
                <span class="t-fr">Mes formations</span><span class="t-ar">تكويناتي</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="menu-link">
                <i data-lucide="user-round" class="w-4 h-4"></i>
                <span class="t-fr">Mon profil</span><span class="t-ar">ملفي الشخصي</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="ms-auto flex-shrink-0">
                @csrf
                <button type="submit" class="menu-link text-rose-500 hover:bg-rose-50">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span class="t-fr">Déconnexion</span><span class="t-ar">تسجيل الخروج</span>
                </button>
            </form>
        </nav>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 sm:py-10">

    <!-- HERO -->
    <section id="accueil"
             class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-emerald-200 via-emerald-100 to-teal-50 border border-emerald-200/70 p-6 sm:p-9 lg:p-10 mb-10 shadow-[0_12px_40px_rgba(52,211,153,.18)]">

        <div class="absolute -top-16 -end-10 w-64 h-64 rounded-full bg-white/50 blur-2xl"></div>
        <div class="absolute -bottom-20 start-1/3 w-56 h-56 rounded-full bg-emerald-300/30 blur-3xl"></div>

        <div class="relative z-10 grid gap-8 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-center">
            <div class="max-w-2xl">
                <p class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1.5 text-emerald-700 text-xs font-bold mb-4">
                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                    <span class="t-fr">Votre espace étudiant</span>
                    <span class="t-ar">فضاؤك الدراسي</span>
                </p>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight text-emerald-950 mb-4">
                    <span class="t-fr">Bienvenue, {{ $student->name }} !</span>
                    <span class="t-ar">مرحباً، {{ $student->name }} !</span>
                </h2>

                <p class="t-fr text-sm sm:text-base leading-7 text-emerald-900/80">
                    Retrouvez vos formations, consultez vos cours et documents PDF, puis testez vos connaissances grâce aux quiz disponibles.
                </p>

                <p class="t-ar text-sm sm:text-base text-emerald-900/80">
                    اكتشف التكوينات الخاصة بك، واطّلع على الدروس والملفات والاختبارات المتاحة لك.
                </p>

                <a href="#formations" class="inline-flex items-center gap-2 mt-6 rounded-2xl bg-emerald-500 hover:bg-emerald-600 px-5 py-3 text-sm font-extrabold text-white shadow-lg shadow-emerald-500/30 transition">
                    <span class="t-fr">Découvrir mes formations</span><span class="t-ar">اكتشف تكويناتي</span>
                    <i data-lucide="arrow-down" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <div class="rounded-2xl bg-white/80 px-4 py-4 text-center min-w-[92px]">
                    <p class="text-2xl font-extrabold text-emerald-700">{{ $totalFormations }}</p>
                    <p class="text-[11px] font-bold text-emerald-600/80 mt-1">
                        <span class="t-fr">Formations</span><span class="t-ar">تكوينات</span>
                    </p>
                </div>
                <div class="rounded-2xl bg-white/80 px-4 py-4 text-center min-w-[92px]">
                    <p class="text-2xl font-extrabold text-emerald-700">{{ $activeFormations }}</p>
                    <p class="text-[11px] font-bold text-emerald-600/80 mt-1">
                        <span class="t-fr">Activées</span><span class="t-ar">مفعّلة</span>
                    </p>
                </div>
                <div class="rounded-2xl bg-white/80 px-4 py-4 text-center min-w-[92px]">
                    <p class="text-2xl font-extrabold text-amber-500">{{ $pendingFormations }}</p>
                    <p class="text-[11px] font-bold text-emerald-600/80 mt-1">
                        <span class="t-fr">En attente</span><span class="t-ar">قيد الانتظار</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FORMATIONS -->
    <section id="formations" class="scroll-mt-40">

        @if(session('formation_message'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">
                <div class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 flex-shrink-0"></i>
                    <span>{{ session('formation_message') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-7">
            <p class="flex items-center gap-2 text-xs font-bold uppercase tracking-[1.5px] text-emerald-600 mb-2">
                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                <span class="t-fr">Mon apprentissage</span><span class="t-ar">تعلّمي</span>
            </p>

            <h2 class="text-2xl sm:text-3xl font-extrabold text-emerald-950">
                <span class="t-fr">Mes formations</span><span class="t-ar">تكويناتي</span>
            </h2>

            <p class="t-fr text-sm text-emerald-800/70 mt-2 leading-6">
                Accédez aux cours, aux fichiers PDF et aux quiz depuis chaque formation.
            </p>
            <p class="t-ar text-sm text-emerald-800/70 mt-2">
                يمكنك الوصول إلى الدروس وملفات PDF والاختبارات من خلال كل تكوين.
            </p>
        </div>

        @if(isset($allFormations) && $allFormations->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                @foreach($allFormations as $formation)
                    @php
                        $studentFormation = $studentFormationStatuses->get($formation->id);

                        $status = $studentFormation
                            ? ($studentFormation->pivot->status ?? 'locked')
                            : 'locked';

                        $isActive = $status === 'active';
                        $isPending = $status === 'pending';
                        $isRejected = $status === 'rejected';

                        $image = $getFormationImage($formation);
                        $color = $getFormationColor($formation);
                        $courses = $formation->cours->sortBy('order');
                        $quizzes = $formation->quizzes ?? collect();
                    @endphp

                    <article class="formation-card flex flex-col">

                        <div class="relative bg-emerald-100">
                            <img src="{{ $image }}"
                                 alt="{{ $formation->name }}"
                                 class="formation-image"
                                 loading="lazy">

                            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-emerald-900/40 to-transparent"></div>

                            <div class="absolute top-3 start-3">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1.5 text-xs font-bold text-emerald-900 shadow-sm">
                                    <i data-lucide="{{ $color['icon'] }}" class="w-3.5 h-3.5 {{ $color['text'] }}"></i>
                                    {{ $formation->category ?: 'Formation' }}
                                </span>
                            </div>

                            <div class="absolute top-3 end-3">
                                @if($isActive)
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-400 px-2.5 py-1 text-[11px] font-extrabold text-white shadow-sm">
                                        <i data-lucide="check" class="w-3 h-3"></i>
                                        <span class="t-fr">Activée</span><span class="t-ar">مفعّل</span>
                                    </span>
                                @elseif($isPending)
                                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-300 px-2.5 py-1 text-[11px] font-extrabold text-amber-900 shadow-sm">
                                        <i data-lucide="clock" class="w-3 h-3"></i>
                                        <span class="t-fr">En attente</span><span class="t-ar">قيد الانتظار</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-white/95 px-2.5 py-1 text-[11px] font-extrabold text-slate-600 shadow-sm">
                                        <i data-lucide="lock-keyhole" class="w-3 h-3"></i>
                                        <span class="t-fr">Verrouillée</span><span class="t-ar">مقفل</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-5 flex flex-col flex-1">

                            <h3 class="text-lg font-extrabold text-emerald-950 leading-snug mb-2">
                                {{ $formation->name }}
                            </h3>

                            <p class="text-sm text-emerald-800/70 leading-6 mb-5 line-clamp-3">
                                {{ $formation->description ?: 'Découvrez les ressources pédagogiques proposées dans cette formation.' }}
                            </p>

                            {{-- FORMATION ACTIVE : bouton pour commencer --}}
                            @if($isActive)

                                <div class="mt-auto">

                                    <div class="flex items-center gap-3 rounded-2xl bg-emerald-50 border border-emerald-100 px-3.5 py-3 mb-4">
                                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500 flex-shrink-0"></i>
                                        <div>
                                            <p class="text-sm font-bold text-emerald-800">
                                                <span class="t-fr">Formation activée</span><span class="t-ar">تم تفعيل التكوين</span>
                                            </p>
                                            <p class="text-xs text-emerald-700/80 mt-0.5">
                                                <span class="t-fr">Vos ressources sont disponibles.</span>
                                                <span class="t-ar">مواردك متاحة الآن.</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-5 text-xs font-bold text-emerald-700/80 mb-4">
                                        <span class="inline-flex items-center gap-1.5">
                                            <i data-lucide="book-open" class="w-4 h-4 text-emerald-500"></i>
                                            {{ $courses->count() }} <span class="t-fr">cours</span><span class="t-ar">دروس</span>
                                        </span>

                                        <span class="inline-flex items-center gap-1.5">
                                            <i data-lucide="clipboard-check" class="w-4 h-4 text-emerald-500"></i>
                                            {{ $quizzes->count() }} <span class="t-fr">quiz</span><span class="t-ar">اختبارات</span>
                                        </span>
                                    </div>

                                    <a href="{{ route('formations.learn', $formation) }}" class="btn-start">
                                        <i data-lucide="play-circle" class="w-5 h-5"></i>
                                        <span class="t-fr">Commencer la formation</span><span class="t-ar">ابدأ التكوين</span>
                                    </a>

                                </div>

                            {{-- DEMANDE EN ATTENTE --}}
                            @elseif($isPending)

                                <div class="mt-auto rounded-2xl border border-amber-200 bg-amber-50 p-4">
                                    <div class="flex items-start gap-3">
                                        <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-amber-100 flex-shrink-0">
                                            <i data-lucide="clock" class="w-5 h-5 text-amber-600"></i>
                                        </span>

                                        <div>
                                            <h4 class="font-bold text-amber-800 text-sm">
                                                <span class="t-fr">Demande en attente</span><span class="t-ar">الطلب قيد الانتظار</span>
                                            </h4>

                                            <p class="t-fr text-sm text-amber-700 leading-6 mt-1.5">
                                                Votre demande d'accès à cette formation est en cours de traitement par l'administration.
                                            </p>
                                            <p class="t-ar text-sm text-amber-700 mt-1.5">
                                                طلب الالتحاق بهذا التكوين ما زال في انتظار موافقة الإدارة.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            {{-- DEMANDE REFUSÉE : NOUVELLE DEMANDE POSSIBLE --}}
                            @elseif($isRejected)

                                <div class="mt-auto rounded-2xl border border-rose-200 bg-rose-50 p-4">
                                    <div class="flex items-start gap-3">
                                        <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-rose-100 flex-shrink-0">
                                            <i data-lucide="lock-keyhole" class="w-5 h-5 text-rose-500"></i>
                                        </span>

                                        <div>
                                            <h4 class="font-bold text-rose-800 text-sm">
                                                <span class="t-fr">Demande refusée</span><span class="t-ar">تم رفض الطلب</span>
                                            </h4>

                                            <p class="t-fr text-sm text-rose-700 leading-6 mt-1.5">
                                                Votre demande précédente n'a pas été acceptée. Vous pouvez envoyer une nouvelle demande à l'administration.
                                            </p>
                                            <p class="t-ar text-sm text-rose-700 mt-1.5">
                                                يمكنك إرسال طلب جديد للالتحاق بهذا التكوين.
                                            </p>
                                        </div>
                                    </div>

                                    <form action="{{ route('formations.request', $formation) }}"
                                          method="POST"
                                          class="mt-4">
                                        @csrf

                                        <button type="submit" class="btn-soft">
                                            <i data-lucide="send" class="w-4 h-4 flip"></i>
                                            <span class="t-fr">Demander à nouveau l’accès</span>
                                            <span class="t-ar">إعادة طلب الوصول</span>
                                        </button>
                                    </form>
                                </div>

                            {{-- FORMATION VERROUILLÉE : DEMANDER L'ACCÈS --}}
                            @else

                                <div class="mt-auto rounded-2xl border border-emerald-100 bg-emerald-50/60 p-4">
                                    <div class="flex items-start gap-3">
                                        <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-emerald-100 flex-shrink-0">
                                            <i data-lucide="lock-keyhole" class="w-5 h-5 text-emerald-600"></i>
                                        </span>

                                        <div>
                                            <h4 class="font-bold text-emerald-900 text-sm">
                                                <span class="t-fr">Formation verrouillée</span><span class="t-ar">تكوين مقفل</span>
                                            </h4>

                                            <p class="t-fr text-sm text-emerald-800/70 leading-6 mt-1.5">
                                                Demandez l'accès à cette formation. L'administration étudiera votre demande avant d'activer les cours, les PDF et les quiz.
                                            </p>
                                            <p class="t-ar text-sm text-emerald-800/70 mt-1.5">
                                                يمكنك طلب الالتحاق بهذا التكوين. ستقوم الإدارة بدراسة طلبك قبل تفعيل الدروس والملفات والاختبارات.
                                            </p>
                                        </div>
                                    </div>

                                    <form action="{{ route('formations.request', $formation) }}"
                                          method="POST"
                                          class="mt-4">
                                        @csrf

                                        <button type="submit" class="btn-start">
                                            <i data-lucide="send" class="w-4 h-4 flip"></i>
                                            <span class="t-fr">Demander l’accès à cette formation</span>
                                            <span class="t-ar">طلب الوصول إلى هذا التكوين</span>
                                        </button>
                                    </form>
                                </div>

                            @endif

                        </div>
                    </article>
                @endforeach

            </div>

        @else

            <div class="card border-dashed px-5 py-14 text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-2xl bg-emerald-100 mb-5">
                    <i data-lucide="graduation-cap" class="w-8 h-8 text-emerald-600"></i>
                </div>

                <h3 class="text-xl font-extrabold text-emerald-950">
                    <span class="t-fr">Aucune formation disponible</span><span class="t-ar">لا توجد تكوينات متاحة</span>
                </h3>

                <p class="t-fr max-w-md mx-auto text-sm text-emerald-800/70 leading-7 mt-3">
                    Les formations proposées par le centre apparaîtront ici. Veuillez contacter l'administration si vous avez besoin d'aide.
                </p>
                <p class="t-ar max-w-md mx-auto text-sm text-emerald-800/70 mt-3">
                    ستظهر التكوينات المتاحة هنا. يمكنك التواصل مع الإدارة إذا كنت تحتاج إلى المساعدة.
                </p>
            </div>

        @endif
    </section>

    <!-- AIDE -->
    <section class="card mt-10 p-5 sm:p-6 bg-gradient-to-br from-emerald-50 to-white">
        <div class="flex items-start gap-4">
            <div class="flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-100 flex-shrink-0">
                <i data-lucide="lightbulb" class="w-6 h-6 text-emerald-600"></i>
            </div>

            <div>
                <h3 class="font-extrabold text-emerald-950">
                    <span class="t-fr">Besoin d'aide ?</span><span class="t-ar">هل تحتاج إلى مساعدة؟</span>
                </h3>

                <p class="t-fr text-sm text-emerald-800/70 leading-7 mt-1">
                    Si une formation, un cours ou un quiz n'est pas visible, vérifiez son statut ou contactez l'administration du centre.
                </p>
                <p class="t-ar text-sm text-emerald-800/70 mt-1">
                    إذا لم يظهر لك أحد التكوينات أو الدروس أو الاختبارات، يرجى التواصل مع إدارة المركز.
                </p>
            </div>
        </div>
    </section>

</main>

<footer class="border-t border-emerald-100 bg-white/80 mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <i data-lucide="graduation-cap" class="w-5 h-5 text-emerald-500"></i>
            <span class="text-sm font-extrabold text-emerald-700">ÉtudeEnLigne</span>
        </div>

        <p class="text-xs text-emerald-700/60 text-center">
            © {{ date('Y') }} ÉtudeEnLigne
        </p>
    </div>
</footer>

<script>
    function setLang(l) {
        var root = document.documentElement;
        root.setAttribute('data-lang', l);
        root.setAttribute('lang', l);
        root.setAttribute('dir', l === 'ar' ? 'rtl' : 'ltr');
        document.getElementById('lang-fr').className = 'lang-btn' + (l === 'fr' ? ' on' : '');
        document.getElementById('lang-ar').className = 'lang-btn' + (l === 'ar' ? ' on' : '');
        try { localStorage.setItem('etude-lang', l); } catch (e) {}
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) { window.lucide.createIcons(); }

        document.getElementById('lang-fr').addEventListener('click', function () { setLang('fr'); });
        document.getElementById('lang-ar').addEventListener('click', function () { setLang('ar'); });

        var saved = 'fr';
        try { saved = localStorage.getItem('etude-lang') || 'fr'; } catch (e) {}
        setLang(saved === 'ar' ? 'ar' : 'fr');
    });
</script>

</body>
</html>