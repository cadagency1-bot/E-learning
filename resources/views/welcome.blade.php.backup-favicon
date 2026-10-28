<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">

    <title>CAD Academy | Formations en ligne</title>

    <!-- Thème : appliqué avant l'affichage pour éviter tout "flash" -->
    <script>
        (function () {
            var t = 'light';
            try { t = localStorage.getItem('ee_theme') === 'dark' ? 'dark' : 'light'; } catch (e) {}
            if (t === 'dark') document.documentElement.classList.add('dark');
        })();
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#061510',
                        ink: '#04120d',
                        forest: '#0a2e22',
                        mint: '#34d399',
                        paper: '#f3f6f1'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'IBM Plex Sans Arabic', 'sans-serif'],
                        head: ['Sora', 'Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        /* ====== Thèmes (variables) ====== */
        :root {
            --ee-page: #f3f6f1;
            --ee-hero: #e4f3ea;
            --ee-grid: rgba(5, 150, 105, .14);
            --ee-strong: #04120d;
            --ee-text: #1b2b24;
            --ee-muted: #3d5148;
            --ee-accent: #047857;
            --ee-card: #ffffff;
            --ee-border: rgba(4, 18, 13, .13);
            --ee-hover: rgba(4, 18, 13, .07);
            --ee-chip: rgba(255, 255, 255, .75);
            --ee-nav: rgba(255, 255, 255, .88);
            --ee-active: rgba(5, 150, 105, .13);
            --ee-tile: #d1fae5;
            --ee-tile-fg: #047857;
            --ee-band: #0a2e22;
            --ee-contact-bg: #34d399;
            --ee-contact-text: #04120d;
            --ee-contact-sub: rgba(4, 18, 13, .85);
            --ee-contact-ar: #0a2e22;
            --ee-contact-tile-bg: #04120d;
            --ee-contact-tile-fg: #34d399;
            --ee-contact-btn-bg: #04120d;
            --ee-contact-btn-fg: #ffffff;
        }
        html.dark {
            --ee-page: #06130e;
            --ee-hero: #04120d;
            --ee-grid: rgba(52, 211, 153, .07);
            --ee-strong: #ffffff;
            --ee-text: #e6f2ec;
            --ee-muted: #b6cdc2;
            --ee-accent: #6ee7b7;
            --ee-card: #0d231b;
            --ee-border: rgba(255, 255, 255, .13);
            --ee-hover: rgba(255, 255, 255, .08);
            --ee-chip: rgba(255, 255, 255, .08);
            --ee-nav: rgba(4, 18, 13, .85);
            --ee-active: rgba(255, 255, 255, .1);
            --ee-tile: rgba(52, 211, 153, .16);
            --ee-tile-fg: #6ee7b7;
            --ee-band: #0c3527;
            --ee-contact-bg: #0f3a2b;
            --ee-contact-text: #ffffff;
            --ee-contact-sub: #d3e8de;
            --ee-contact-ar: #a7f3d0;
            --ee-contact-tile-bg: #34d399;
            --ee-contact-tile-fg: #04120d;
            --ee-contact-btn-bg: #34d399;
            --ee-contact-btn-fg: #04120d;
        }

        /* ====== Base ====== */
        html { scroll-behavior: smooth; scroll-padding-top: 6.5rem; }
        body {
            font-family: 'Plus Jakarta Sans', 'IBM Plex Sans Arabic', sans-serif;
            -webkit-font-smoothing: antialiased;
            background: var(--ee-page);
            color: var(--ee-text);
            font-size: 1.0625rem; /* 17px */
            line-height: 1.7;
            transition: background-color .3s ease, color .3s ease;
        }
        [dir="rtl"] { font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif; }
        .font-head { font-family: 'Sora', 'Plus Jakarta Sans', sans-serif; letter-spacing: -.03em; }

        /* Classes thématiques */
        .ee-hero { background: var(--ee-hero); color: var(--ee-text); transition: background-color .3s ease; }
        .ee-grid-bg {
            background-image:
                linear-gradient(var(--ee-grid) 1px, transparent 1px),
                linear-gradient(90deg, var(--ee-grid) 1px, transparent 1px);
            background-size: 44px 44px;
            -webkit-mask-image: radial-gradient(ellipse at 70% 30%, #000 20%, transparent 75%);
            mask-image: radial-gradient(ellipse at 70% 30%, #000 20%, transparent 75%);
        }
        .ee-strong { color: var(--ee-strong); }
        .ee-text { color: var(--ee-text); }
        .ee-muted { color: var(--ee-muted); }
        .ee-accent { color: var(--ee-accent); }
        .ee-surface { background: var(--ee-card); border: 1px solid var(--ee-border); color: var(--ee-text); transition: background-color .3s ease, border-color .3s ease; }
        .ee-nav { background: var(--ee-nav); border: 1px solid var(--ee-border); box-shadow: 0 10px 30px rgba(4, 18, 13, .12); }
        .ee-navlink { color: var(--ee-muted); }
        .ee-navlink:hover { background: var(--ee-hover); color: var(--ee-strong); }
        .ee-navlink.is-active { background: var(--ee-active); color: var(--ee-accent); }
        .ee-ghost { border: 1px solid var(--ee-border); color: var(--ee-strong); }
        .ee-ghost:hover { background: var(--ee-hover); }
        .ee-chip { background: var(--ee-chip); border: 1px solid var(--ee-border); color: var(--ee-accent); }
        .ee-tilebox { background: var(--ee-tile); color: var(--ee-tile-fg); }
        .ee-band { background: var(--ee-band); }
        html.dark .ee-band { border: 1px solid rgba(255, 255, 255, .08); }

        .ee-contact { background: var(--ee-contact-bg); color: var(--ee-contact-text); border: 1px solid transparent; }
        html.dark .ee-contact { border-color: rgba(255, 255, 255, .12); }
        .ee-contact-sub { color: var(--ee-contact-sub); }
        .ee-contact-ar { color: var(--ee-contact-ar); }
        .ee-contact-tile { background: var(--ee-contact-tile-bg); color: var(--ee-contact-tile-fg); }
        .ee-contact-btn { background: var(--ee-contact-btn-bg); color: var(--ee-contact-btn-fg); }
        .ee-contact-btn:hover { filter: brightness(1.12); }

        /* Bouton thème : lune en mode clair, soleil en mode sombre */
        .ee-ico-sun { display: none; }
        html.dark .ee-ico-sun { display: inline-flex; }
        html.dark .ee-ico-moon { display: none; }

        /* ====== Cartes de formation ====== */
        .ee-tile { transition: transform .25s ease, box-shadow .25s ease; }
        .ee-tile:hover { transform: translateY(-4px); box-shadow: 0 22px 44px rgba(4, 18, 13, .28); }
        .ee-tile img.ee-bg { transition: transform .6s ease; }
        .ee-tile:hover img.ee-bg { transform: scale(1.06); }

        .ee-card-btn { cursor: pointer; }
        .ee-card-btn:focus-visible { outline: 3px solid #34d399; outline-offset: 6px; border-radius: 12px; }
        .ee-chev { transition: transform .35s ease, background-color .25s ease, color .25s ease; }
        .ee-card-btn[aria-expanded="true"] .ee-chev { transform: rotate(180deg); background: #34d399; color: #04120d; }
        .ee-tile:hover .ee-chev { background: rgba(255, 255, 255, .28); }
        .ee-card-btn[aria-expanded="true"] .ee-chev,
        .ee-tile:hover .ee-card-btn[aria-expanded="true"] .ee-chev { background: #34d399; }
        .ee-hint-open { display: none; }
        .ee-card-btn[aria-expanded="true"] .ee-hint-closed { display: none; }
        .ee-card-btn[aria-expanded="true"] .ee-hint-open { display: inline; }

        /* Panneau déroulant (animation fluide, sans hauteur fixe) */
        .ee-panel {
            display: grid;
            grid-template-rows: 0fr;
            opacity: 0;
            visibility: hidden;
            transition: grid-template-rows .4s ease, opacity .3s ease, visibility 0s linear .4s;
        }
        .ee-panel.is-open {
            grid-template-rows: 1fr;
            opacity: 1;
            visibility: visible;
            transition: grid-template-rows .4s ease, opacity .35s ease .05s, visibility 0s linear 0s;
        }
        .ee-panel-inner { overflow: hidden; min-height: 0; }

        /* ====== Animations d'entrée ====== */
        .ee-rise { animation: ee-rise .8s cubic-bezier(.2, .7, .2, 1) both; }
        .ee-rise-2 { animation-delay: .12s; }
        .ee-rise-3 { animation-delay: .24s; }
        @keyframes ee-rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }

        /* ====== Parcours (compatible RTL) ====== */
        .ee-path::before {
            content: ""; position: absolute; inset-inline-start: 1.25rem; top: 1rem; bottom: 1rem; width: 2px;
            background: linear-gradient(#34d399, rgba(52, 211, 153, .15));
        }
        @media (min-width: 1024px) {
            .ee-path::before {
                inset-inline-start: 1.25rem; inset-inline-end: 1.25rem; top: 1.25rem; bottom: auto; width: auto; height: 2px;
                background: linear-gradient(90deg, #34d399, rgba(52, 211, 153, .15));
            }
            html[dir="rtl"] .ee-path::before { background: linear-gradient(270deg, #34d399, rgba(52, 211, 153, .15)); }
        }

        /* ====== Langue : une seule langue affichée à la fois ====== */
        body[data-lang="fr"] .ee-ar { display: none !important; }
        body[data-lang="ar"] .ee-fr { display: none !important; }
        html[dir="rtl"] body, html[dir="rtl"] .font-head { font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif; letter-spacing: 0; }
        html[dir="rtl"] .lucide-arrow-right { transform: scaleX(-1); }
        html[dir="rtl"] .ee-hero-ar { font-size: clamp(2.4rem, 7vw, 4.4rem); line-height: 1.25; font-weight: 800; color: var(--ee-accent); }
        html[dir="rtl"] body { line-height: 1.85; }

        a:focus-visible, button:focus-visible { outline: 3px solid #34d399; outline-offset: 2px; border-radius: 12px; }
        html:not(.dark) a:focus-visible, html:not(.dark) button:focus-visible { outline-color: #047857; }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .ee-rise { animation: none; }
            .ee-tile, .ee-tile img.ee-bg, .ee-chev, .ee-panel, .ee-panel.is-open, body { transition: none; }
        }


        
/* Afficher la description au survol de la carte */
@media (hover: hover) and (pointer: fine) {
    .ee-tile:hover .ee-panel {
        grid-template-rows: 1fr;
        opacity: 1;
        visibility: visible;
        transition: grid-template-rows .3s ease,
                    opacity .3s ease,
                    visibility 0s;
    }
}

    </style>
</head>

<body data-lang="fr">

    <!-- ========== NAVBAR flottante ========== -->

    <header class="sticky top-0 z-50 px-3 sm:px-6 pt-3">
        <div class="ee-nav max-w-6xl mx-auto rounded-2xl backdrop-blur-md">
            <div class="h-14 sm:h-16 ps-3 pe-2.5 flex items-center justify-between gap-3">

                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-white flex items-center justify-center ring-1 ring-black/5">
                        <img
                            src="{{ asset('images/logo-centre.png') }}"
                            alt="Logo CAD Academy"
                            class="w-8 h-8 object-contain"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <span class="hidden items-center justify-center text-emerald-600">
                            <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                        </span>
                    </div>
                    <div class="leading-tight">
                        <div class="font-head text-lg sm:text-xl font-bold ee-strong">
                            CAD <span class="ee-accent">Academy</span>
                        </div>
                        <p class="hidden md:block text-sm ee-muted font-medium">
                            <span class="ee-fr">Apprendre • Progresser • Réussir</span><span class="ee-ar">تعلّم • تقدّم • انجح</span>
                        </p>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1 text-[0.9375rem] font-semibold" aria-label="Navigation principale">
                    <a href="{{ route('home') }}" class="ee-navlink is-active px-3.5 py-2 rounded-xl transition"><span class="ee-fr">Accueil</span><span class="ee-ar">الرئيسية</span></a>
                    <a href="#formations" class="ee-navlink px-3.5 py-2 rounded-xl transition"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                    <a href="#about" class="ee-navlink px-3.5 py-2 rounded-xl transition"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                    <a href="#quiz" class="ee-navlink px-3.5 py-2 rounded-xl transition"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                    <a href="#contact" class="ee-navlink px-3.5 py-2 rounded-xl transition"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                </nav>

                <div class="flex items-center gap-2">
                    <button type="button" id="ee-theme" aria-pressed="false" aria-label="Changer de thème clair/sombre / تبديل المظهر" title="Thème / المظهر"
                            class="ee-ghost w-10 h-10 sm:w-11 sm:h-11 inline-flex items-center justify-center rounded-xl transition">
                        <span class="ee-ico-moon inline-flex"><i data-lucide="moon" class="w-5 h-5"></i></span>
                        <span class="ee-ico-sun inline-flex"><i data-lucide="sun" class="w-5 h-5"></i></span>
                    </button>

                    <button type="button" id="ee-lang" aria-label="Changer de langue / تغيير اللغة" class="ee-ghost inline-flex items-center gap-1.5 h-10 sm:h-11 px-3 rounded-xl font-bold text-[0.9375rem] transition">
                        <i data-lucide="globe" class="w-4 h-4"></i>
                        <span class="ee-fr">العربية</span><span class="ee-ar">Français</span>
                    </button>

                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 h-10 sm:h-11 px-3 sm:px-4 rounded-xl bg-mint hover:bg-emerald-300 text-ink font-bold text-[0.9375rem] transition">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            <span class="hidden sm:inline"><span class="ee-fr">Mon espace</span><span class="ee-ar">فضائي</span></span>
                            <span class="sr-only sm:hidden"><span class="ee-fr">Mon espace</span><span class="ee-ar">فضائي</span></span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="ee-ghost hidden md:inline-flex items-center h-11 px-4 rounded-xl font-bold text-[0.9375rem] transition border-transparent">
                            <span class="ee-fr">Connexion</span><span class="ee-ar">تسجيل الدخول</span>
                        </a>
                        <a href="{{ route('register') }}"
                           class="hidden sm:inline-flex items-center gap-2 h-11 px-4 rounded-xl bg-mint hover:bg-emerald-300 text-ink font-bold text-[0.9375rem] transition">
                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                            <span class="ee-fr">Inscription</span><span class="ee-ar">التسجيل</span>
                        </a>
                    @endauth

                    <button type="button" id="ee-menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="ee-mobile-menu"
                            class="ee-ghost lg:hidden w-10 h-10 sm:w-11 sm:h-11 inline-flex items-center justify-center rounded-xl">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <nav id="ee-mobile-menu" class="hidden lg:hidden px-3 pb-3 grid gap-1 text-base font-semibold" aria-label="Navigation mobile">
                <a href="{{ route('home') }}" class="ee-navlink is-active px-3 py-3 rounded-lg"><span class="ee-fr">Accueil</span><span class="ee-ar">الرئيسية</span></a>
                <a href="#formations" class="ee-navlink px-3 py-3 rounded-lg"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                <a href="#about" class="ee-navlink px-3 py-3 rounded-lg"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                <a href="#quiz" class="ee-navlink px-3 py-3 rounded-lg"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                <a href="#contact" class="ee-navlink px-3 py-3 rounded-lg"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                @guest
                    <a href="{{ route('login') }}" class="ee-navlink md:hidden px-3 py-3 rounded-lg"><span class="ee-fr">Connexion</span><span class="ee-ar">تسجيل الدخول</span></a>
                    <a href="{{ route('register') }}" class="sm:hidden px-3 py-3 rounded-lg bg-mint text-ink text-center"><span class="ee-fr">Inscription</span><span class="ee-ar">التسجيل</span></a>
                @endguest
            </nav>
        </div>
    </header>


    <!-- ========== HERO (remonte sous la navbar pour que celle-ci reste collée au défilement) ========== -->

    <div class="ee-hero relative overflow-hidden -mt-[68px] sm:-mt-[76px]">
        <div class="ee-grid-bg absolute inset-0 pointer-events-none"></div>
        <div class="absolute -top-40 -end-40 w-[34rem] h-[34rem] rounded-full bg-emerald-500/20 blur-3xl pointer-events-none"></div>

        <main>
        <section class="relative max-w-6xl mx-auto px-5 sm:px-6 pt-28 sm:pt-32 pb-14 sm:pb-20">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">

                <div class="lg:col-span-7">
                    <span class="ee-chip ee-rise inline-flex items-center gap-2 ps-2 pe-4 py-1.5 rounded-full text-[0.9375rem] font-semibold">
                        <span class="w-7 h-7 rounded-full bg-mint text-ink flex items-center justify-center">
                            <i data-lucide="sparkles" class="w-4 h-4"></i>
                        </span>
                        <span class="ee-fr">Plateforme d'apprentissage en ligne</span><span class="ee-ar">منصة للتعلم عن بعد</span>
                    </span>

                    <h1 class="ee-fr ee-strong ee-rise ee-rise-2 font-head text-[2.7rem] sm:text-6xl lg:text-[4.4rem] font-extrabold leading-[1.04] mt-6">
                        Apprenez.<br>
                        Progressez.<br>
                        <span class="ee-accent">Réussissez.</span>
                    </h1>

                    <h2 dir="rtl" class="ee-ar ee-hero-ar ee-rise ee-rise-2 text-2xl sm:text-3xl font-bold mt-5 leading-relaxed">
                        تعلم، تطور وحقق النجاح
                    </h2>

                    <p class="ee-fr ee-muted ee-rise ee-rise-3 text-lg sm:text-xl leading-8 mt-5 max-w-xl">
                        Découvrez des formations, apprenez à votre rythme et développez des compétences utiles pour votre avenir.
                    </p>

                    <p dir="rtl" class="ee-ar ee-muted ee-rise ee-rise-3 text-lg sm:text-xl leading-9 mt-3 max-w-xl">
                        اكتشف التكوينات، وتعلم حسب وتيرتك، وطوّر مهاراتك من أجل مستقبلك.
                    </p>

                    <div class="ee-rise ee-rise-3 flex flex-wrap gap-3 mt-8">
                        <a href="#formations"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-mint hover:bg-emerald-300 text-ink text-base font-extrabold shadow-lg shadow-emerald-500/25 transition">
                            <span class="ee-fr">Découvrir les formations</span><span class="ee-ar">اكتشف التكوينات</span>
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>

                        @guest
                            <a href="{{ route('register') }}"
                               class="ee-ghost inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-base font-bold transition">
                                <span class="ee-fr">Créer un compte</span><span class="ee-ar">إنشاء حساب</span>
                                <i data-lucide="user-plus" class="w-5 h-5"></i>
                            </a>
                        @endguest
                    </div>

                    <div class="ee-rise ee-rise-3 ee-text flex flex-wrap gap-x-6 gap-y-3 mt-8 text-base font-semibold">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 ee-accent"></i>
                            <span class="ee-fr">Plusieurs domaines</span><span class="ee-ar">مجالات متعددة</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <i data-lucide="book-open" class="w-5 h-5 ee-accent"></i>
                            <span class="ee-fr">Cours en ligne</span><span class="ee-ar">دروس عبر الإنترنت</span>
                        </span>
                    </div>
                </div>

                <!-- Visuel en arche -->
                <div class="lg:col-span-5 relative ee-rise ee-rise-2">
                    <div class="relative mx-auto max-w-sm lg:max-w-none">
                        <div class="rounded-t-[10rem] rounded-b-3xl overflow-hidden ring-1 ring-black/10 dark:ring-white/15 shadow-2xl shadow-black/30">
                            <img
                                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1000&q=85"
                                alt="Étudiants apprenant ensemble"
                                class="w-full h-[340px] sm:h-[460px] object-cover"
                            >
                        </div>

                        <div class="ee-surface absolute -start-3 sm:-start-8 bottom-10 p-3.5 pe-5 rounded-2xl shadow-xl max-w-[17rem]">
                            <div class="flex items-center gap-3">
                                <div class="ee-tilebox w-11 h-11 rounded-xl flex items-center justify-center shrink-0">
                                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-head font-bold text-base ee-strong">CAD Academy</p>
                                    <p class="ee-fr ee-muted text-sm leading-5">Votre parcours commence ici</p>
                                </div>
                            </div>
                            <p dir="rtl" class="ee-ar ee-accent font-semibold text-sm mt-2">
                                ابدأ رحلتك التعليمية من هنا
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>


    <!-- ========== FORMATIONS (bento) ========== -->

    <section id="formations" class="py-14 sm:py-20">
        <div class="max-w-6xl mx-auto px-5 sm:px-6">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5">
                <div class="max-w-xl">
                    <p class="ee-accent inline-flex items-center gap-2 text-base font-bold">
                        <i data-lucide="layers" class="w-5 h-5"></i>
                        <span class="ee-fr">Nos domaines de formation</span><span class="ee-ar">مجالات التكوين لدينا</span>
                    </p>
                    <h2 class="ee-fr ee-strong font-head text-3xl sm:text-4xl font-extrabold mt-2 leading-tight">
                        Trouvez la formation qui vous correspond
                    </h2>
                    <p dir="rtl" class="ee-ar ee-strong text-2xl sm:text-3xl font-bold mt-2">
                        اكتشف التكوين المناسب لك
                    </p>
                </div>

                <div class="max-w-sm">
                    <p class="ee-fr ee-muted text-base leading-7">
                        Explorez nos domaines de formation et cliquez sur une carte pour découvrir la description.
                    </p>
                    <p dir="rtl" class="ee-ar ee-muted text-base leading-8">
                        اكتشف مجالات التكوين وانقر على البطاقة للاطلاع على الوصف.
                    </p>
                </div>
            </div>


            @php
                $categories = [
                    [
                        'title' => 'Design & programmation',
                        'arabic' => 'التصميم والبرمجة',
                        'description' => 'Découvrez la création de sites web, la programmation et les outils numériques.',
                        'description_ar' => 'اكتشف تصميم المواقع والبرمجة والأدوات الرقمية.',
                        'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'code-2',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'emerald',
                    ],
                    [
                        'title' => 'Informatique bureautique',
                        'arabic' => 'المعلوميات المكتبية',
                        'description' => 'Apprenez à utiliser les outils bureautiques et à organiser vos documents.',
                        'description_ar' => 'تعلم استعمال برامج المكتب وتنظيم الوثائق.',
                        'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'monitor',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'blue',
                    ],
                    [
                        'title' => 'Aide médicale et administrative',
                        'arabic' => 'المساعدة الطبية والإدارية',
                        'description' => 'Découvrez les bases de l’accompagnement, de l’accueil et de l’organisation administrative.',
                        'description_ar' => 'تعرف على أساسيات المساعدة والاستقبال والتنظيم الإداري.',
                        'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'heart-pulse',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'rose',
                    ],
                    [
                        'title' => 'Hôtellerie & restauration',
                        'arabic' => 'الفندقة والمطاعم',
                        'description' => 'Initiez-vous aux métiers de l’accueil, du service et de la restauration.',
                        'description_ar' => 'تعرف على مهن الاستقبال والخدمات والمطاعم.',
                        'image' => 'https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'utensils',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'amber',
                    ],
                    [
                        'title' => 'Secrétariat',
                        'arabic' => 'السكرتارية',
                        'description' => 'Développez vos compétences en communication, classement et gestion des dossiers.',
                        'description_ar' => 'طور مهارات التواصل وترتيب الملفات والتدبير الإداري.',
                        'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'clipboard-list',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'violet',
                    ],
                    [
                        'title' => 'Commerce',
                        'arabic' => 'التجارة',
                        'description' => 'Découvrez la vente, la relation client et les bases de la gestion commerciale.',
                        'description_ar' => 'اكتشف البيع والتعامل مع الزبناء وأساسيات التجارة.',
                        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'shopping-bag',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'orange',
                    ],
                    [
                        'title' => 'Métiers & artisanat',
                        'arabic' => 'المهن والحرف',
                        'description' => 'Explorez les métiers pratiques : construction, menuiserie, mécanique et artisanat.',
                        'description_ar' => 'اكتشف المهن التطبيقية مثل البناء والنجارة والميكانيك والحرف.',
                        'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'hammer',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'yellow',
                    ],
                ];
            @endphp


            <div class="grid sm:grid-cols-2 lg:grid-cols-4 lg:grid-flow-dense gap-4 mt-10">

                @foreach ($categories as $category)
                    <article data-ee-card
                             class="ee-tile group relative overflow-hidden rounded-3xl bg-ink text-white min-h-[320px] cursor-pointer
                                    {{ $loop->first ? 'lg:col-span-2 lg:row-span-2 lg:min-h-[640px]' : '' }}
                                    {{ $loop->iteration > 5 ? 'lg:col-span-2' : '' }}
                                    {{ $loop->last ? 'sm:col-span-2' : '' }}">

                        <img
                            src="{{ $category['image'] }}"
                            alt=""
                            loading="lazy"
                            class="ee-bg absolute inset-0 w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/85 to-ink/25"></div>

                        <div class="relative h-full flex flex-col p-5 {{ $loop->first ? 'lg:p-8' : 'sm:p-6' }}">

                            <div class="flex items-start justify-between gap-3">
                                <span class="w-12 h-12 shrink-0 rounded-xl bg-mint text-ink flex items-center justify-center">
                                    <i data-lucide="{{ $category['icon'] }}" class="w-6 h-6"></i>
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-black/45 backdrop-blur text-sm font-semibold leading-5 text-start">
                                    <i data-lucide="calendar-clock" class="w-4 h-4 shrink-0"></i>
                                    <span class="ee-fr">Durée : {{ $category['duration'] }}</span><span class="ee-ar">المدة : {{ $category['duration_ar'] }}</span>
                                </span>
                            </div>

                            <div class="mt-auto pt-16">
                                <h3 class="m-0">
                                    <button type="button"
                                            id="ee-card-btn-{{ $loop->iteration }}"
                                            class="ee-card-btn w-full flex items-end justify-between gap-4 text-start"
                                            aria-expanded="false"
                                            aria-controls="ee-panel-{{ $loop->iteration }}">
                                        <span class="block">
                                            <span class="ee-fr block font-head font-bold leading-tight {{ $loop->first ? 'text-3xl sm:text-4xl' : 'text-2xl' }}">{{ $category['title'] }}</span>
                                            <span class="ee-ar block font-bold leading-snug {{ $loop->first ? 'text-3xl sm:text-4xl' : 'text-2xl' }}">{{ $category['arabic'] }}</span>
                                            <span class="block text-mint text-sm font-semibold mt-2">
                                                <span class="ee-hint-closed"><span class="ee-fr">Voir la description</span><span class="ee-ar">عرض الوصف</span></span>
                                                <span class="ee-hint-open"><span class="ee-fr">Masquer la description</span><span class="ee-ar">إخفاء الوصف</span></span>
                                            </span>
                                        </span>
                                        <span class="ee-chev shrink-0 w-11 h-11 rounded-full bg-white/15 flex items-center justify-center" aria-hidden="true">
                                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                                        </span>
                                    </button>
                                </h3>

                                <div id="ee-panel-{{ $loop->iteration }}" class="ee-panel">
                                    <div class="ee-panel-inner">
                                        <div class="pt-4">
                                            <p class="ee-fr text-base sm:text-[1.0625rem] text-emerald-50 leading-7">
                                                {{ $category['description'] }}
                                            </p>

                                            <p dir="rtl" class="ee-ar text-base sm:text-[1.0625rem] text-emerald-50 leading-8">
                                                {{ $category['description_ar'] }}
                                            </p>

                                            <a href="#contact"
                                               class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/15 hover:bg-mint hover:text-ink backdrop-blur text-[0.9375rem] font-bold transition">
                                                <span class="ee-fr">Demander des informations</span><span class="ee-ar">طلب معلومات</span>
                                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div class="ee-muted mt-7 flex items-start sm:items-center justify-center gap-2 text-base text-center">
                <i data-lucide="info" class="w-5 h-5 shrink-0 mt-0.5 sm:mt-0"></i>
                <div>
                    <p class="ee-fr">Les durées exactes et les programmes sont à confirmer auprès du centre.</p>
                    <p dir="rtl" class="ee-ar mt-1">يرجى التأكد من المدة والبرنامج الرسمي لكل تكوين لدى المركز.</p>
                </div>
            </div>

        </div>
    </section>


    <!-- ========== À PROPOS : parcours d'apprentissage ========== -->

    <section id="about" class="pb-14 sm:pb-20">
        <div class="max-w-6xl mx-auto px-5 sm:px-6">
            <div class="ee-band rounded-[2rem] text-white p-7 sm:p-10 lg:p-12 relative overflow-hidden">
                <div class="absolute -bottom-32 -start-24 w-80 h-80 rounded-full bg-emerald-400/15 blur-3xl pointer-events-none"></div>

                <div class="relative grid lg:grid-cols-12 gap-8 items-end">
                    <div class="lg:col-span-6">
                        <p class="inline-flex items-center gap-2 text-base font-bold text-mint">
                            <i data-lucide="compass" class="w-5 h-5"></i>
                            <span class="ee-fr">À propos de nous</span><span class="ee-ar">من نحن</span>
                        </p>
                        <h2 class="font-head text-3xl sm:text-4xl font-extrabold mt-2 leading-tight">
                            <span class="ee-fr">Apprendre pour construire son avenir</span><span class="ee-ar">نتعلم لنبني مستقبلنا</span>
                        </h2>
                    </div>
                    <div class="lg:col-span-6">
                        <p class="ee-fr text-emerald-50 text-base sm:text-[1.0625rem] leading-7">
                            CAD Academy facilite l’accès aux formations et aux ressources pédagogiques pour accompagner votre apprentissage.
                        </p>
                        <p dir="rtl" class="ee-ar text-emerald-50 text-base sm:text-[1.0625rem] leading-8">
                            تسهّل منصة CAD Academy الوصول إلى التكوينات والموارد التعليمية لمساعدتك على التعلم وتطوير مهاراتك.
                        </p>
                    </div>
                </div>

                <!-- Le parcours : étapes réellement séquentielles -->
                <div class="ee-path relative grid lg:grid-cols-4 gap-6 lg:gap-5 mt-10 ps-12 lg:ps-0">

                    <div class="relative lg:pt-12">
                        <span class="absolute -start-12 top-0 lg:start-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">1</span>
                        <i data-lucide="book-open" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-xl mt-2"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></h3>
                        <p class="ee-fr text-emerald-50/90 mt-1 text-base leading-7">Découvrez différents domaines d’apprentissage.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/90 mt-1 text-base leading-8">اكتشف مجالات تعلم مختلفة.</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -start-12 top-0 lg:start-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">2</span>
                        <i data-lucide="file-text" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-xl mt-2"><span class="ee-fr">Cours</span><span class="ee-ar">الدروس</span></h3>
                        <p class="ee-fr text-emerald-50/90 mt-1 text-base leading-7">Consultez les ressources disponibles.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/90 mt-1 text-base leading-8">اطلع على الموارد المتاحة.</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -start-12 top-0 lg:start-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">3</span>
                        <i data-lucide="clipboard-check" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-xl mt-2"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></h3>
                        <p class="ee-fr text-emerald-50/90 mt-1 text-base leading-7">Testez vos connaissances.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/90 mt-1 text-base leading-8">اختبر معرفتك.</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -start-12 top-0 lg:start-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">4</span>
                        <i data-lucide="target" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-xl mt-2"><span class="ee-fr">Progression</span><span class="ee-ar">التقدّم</span></h3>
                        <p class="ee-fr text-emerald-50/90 mt-1 text-base leading-7">Avancez progressivement dans votre parcours.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/90 mt-1 text-base leading-8">تقدم تدريجياً في مسارك.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ========== QUIZ + CONTACT côte à côte ========== -->

    <section class="pb-14 sm:pb-20">
        <div class="max-w-6xl mx-auto px-5 sm:px-6 grid lg:grid-cols-2 gap-4">

            <div id="quiz" class="ee-surface rounded-[2rem] shadow-sm p-7 sm:p-9">
                <div class="ee-tilebox w-14 h-14 rounded-2xl flex items-center justify-center">
                    <i data-lucide="clipboard-check" class="w-7 h-7"></i>
                </div>

                <h2 class="ee-fr ee-strong font-head text-2xl sm:text-3xl font-extrabold mt-5">
                    Testez vos connaissances
                </h2>

                <p dir="rtl" class="ee-ar ee-strong text-2xl sm:text-3xl font-bold mt-5">
                    اختبر معلوماتك
                </p>

                <p class="ee-fr ee-muted text-base sm:text-[1.0625rem] leading-7 mt-4">
                    Les quiz permettent de réviser et d’évaluer les connaissances acquises pendant votre apprentissage.
                </p>

                <p dir="rtl" class="ee-ar ee-muted text-base sm:text-[1.0625rem] leading-8 mt-4">
                    تساعدك الاختبارات على مراجعة وتقييم المعارف التي اكتسبتها خلال التعلم.
                </p>
            </div>

            <div id="contact" class="ee-contact rounded-[2rem] p-7 sm:p-9 flex flex-col">
                <div class="ee-contact-tile w-14 h-14 rounded-2xl flex items-center justify-center">
                    <i data-lucide="message-circle" class="w-7 h-7"></i>
                </div>

                <h2 class="ee-fr font-head text-2xl sm:text-3xl font-extrabold mt-5">
                    Besoin de plus d’informations ?
                </h2>

                <p dir="rtl" class="ee-ar text-2xl sm:text-3xl font-bold mt-5">
                    هل تحتاج إلى مزيد من المعلومات؟
                </p>

                <p class="ee-fr ee-contact-sub text-base sm:text-[1.0625rem] leading-7 mt-4">
                    Créez votre compte pour commencer votre parcours sur CAD Academy.
                </p>

                <p dir="rtl" class="ee-ar ee-contact-sub text-base sm:text-[1.0625rem] leading-8 mt-4">
                    أنشئ حسابك لبدء رحلتك التعليمية على منصة CAD Academy.
                </p>

                <div class="mt-auto pt-7">
                    @guest
                        <a href="{{ route('register') }}"
                           class="ee-contact-btn inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-base font-extrabold transition">
                            <span class="ee-fr">Créer mon compte</span><span class="ee-ar">أنشئ حسابي</span>
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="ee-contact-btn inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-base font-extrabold transition">
                            <span class="ee-fr">Accéder à mon espace</span><span class="ee-ar">الدخول إلى فضائي</span>
                            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        </a>
                    @endguest
                </div>
            </div>

        </div>
    </section>

    </main>


    <!-- ========== FOOTER ========== -->

    <footer class="bg-ink text-white border-t border-white/10">
        <div class="max-w-6xl mx-auto px-5 sm:px-6 py-10">

            <div class="grid md:grid-cols-3 gap-6 items-center">

                <div class="text-center md:text-start">
                    <p class="font-head text-2xl font-extrabold">
                        CAD <span class="text-mint">Academy</span>
                    </p>
                    <p class="ee-fr text-base text-emerald-50/85 mt-1.5">Plateforme d’étude et de formation en ligne.</p>
                    <p dir="rtl" class="ee-ar text-base text-emerald-50/85 mt-1 text-center md:text-start">منصة للدراسة والتكوين عبر الإنترنت.</p>
                </div>

                <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-base text-emerald-50/90 font-semibold" aria-label="Liens du pied de page">
                    <a href="#formations" class="hover:text-mint"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                    <a href="#about" class="hover:text-mint"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                    <a href="#quiz" class="hover:text-mint"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                    <a href="#contact" class="hover:text-mint"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                </nav>

                <div class="text-[0.9375rem] text-emerald-50/75 text-center md:text-end">
                    <span class="ee-fr">© {{ date('Y') }} CAD Academy — Tous droits réservés.</span><span class="ee-ar">© {{ date('Y') }} CAD Academy — جميع الحقوق محفوظة.</span>
                </div>

            </div>
        </div>
    </footer>


    <script>
        lucide.createIcons();

        // Menu mobile (affichage uniquement)
        (function () {
            var btn = document.getElementById('ee-menu-toggle');
            var menu = document.getElementById('ee-mobile-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', function () {
                var open = menu.classList.toggle('hidden') === false;
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
            menu.querySelectorAll('a').forEach(function (a) {
                a.addEventListener('click', function () {
                    menu.classList.add('hidden');
                    btn.setAttribute('aria-expanded', 'false');
                });
            });
        })();
    </script>

    <script>
        // Thème clair / sombre (mémorisé dans localStorage)
        (function () {
            var KEY = 'ee_theme';
            var root = document.documentElement;
            var b = document.getElementById('ee-theme');
            function apply(t, save) {
                root.classList.toggle('dark', t === 'dark');
                root.style.colorScheme = t;
                if (b) b.setAttribute('aria-pressed', t === 'dark' ? 'true' : 'false');
                if (save) { try { localStorage.setItem(KEY, t); } catch (e) {} }
            }
            apply(root.classList.contains('dark') ? 'dark' : 'light', false);
            if (b) b.addEventListener('click', function () {
                apply(root.classList.contains('dark') ? 'light' : 'dark', true);
            });
        })();
    </script>

    <script>
        // Changement de langue (affichage uniquement) : français ou arabe, mémorisé dans le navigateur
        (function () {
            var KEY = 'ee_lang';
            function apply(l) {
                document.body.setAttribute('data-lang', l);
                document.documentElement.lang = l;
                document.documentElement.dir = l === 'ar' ? 'rtl' : 'ltr';
                try { localStorage.setItem(KEY, l); } catch (e) {}
            }
            var saved = 'fr';
            try { saved = localStorage.getItem(KEY) === 'ar' ? 'ar' : 'fr'; } catch (e) {}
            apply(saved);
            var b = document.getElementById('ee-lang');
            if (b) b.addEventListener('click', function () {
                apply(document.body.getAttribute('data-lang') === 'ar' ? 'fr' : 'ar');
            });
        })();
    </script>

    
<script>
    (function () {
        var cards = document.querySelectorAll('[data-ee-card]');

        cards.forEach(function (card) {
            var btn = card.querySelector('.ee-card-btn');
            var panel = btn
                ? document.getElementById(btn.getAttribute('aria-controls'))
                : null;

            if (!btn || !panel) return;

            card.addEventListener('mouseenter', function () {
                panel.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
            });

            card.addEventListener('mouseleave', function () {
                panel.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
            });
        });
    })();
</script>

</body>
</html>