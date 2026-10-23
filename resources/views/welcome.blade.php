<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ÉtudeEnLigne | Formations en ligne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
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
        /* Styles isolés de la page d'accueil (préfixe ee-) */
        html { scroll-behavior: smooth; scroll-padding-top: 6rem; }
        body { font-family: 'Plus Jakarta Sans', 'IBM Plex Sans Arabic', sans-serif; -webkit-font-smoothing: antialiased; background: #f3f6f1; }
        [dir="rtl"] { font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif; }
        .font-head { font-family: 'Sora', 'Plus Jakarta Sans', sans-serif; letter-spacing: -.03em; }

        .ee-grid-bg {
            background-image:
                linear-gradient(rgba(52, 211, 153, .07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(52, 211, 153, .07) 1px, transparent 1px);
            background-size: 44px 44px;
            -webkit-mask-image: radial-gradient(ellipse at 70% 30%, #000 20%, transparent 75%);
            mask-image: radial-gradient(ellipse at 70% 30%, #000 20%, transparent 75%);
        }

        .ee-tile { transition: transform .25s ease, box-shadow .25s ease; }
        .ee-tile:hover { transform: translateY(-4px); box-shadow: 0 22px 44px rgba(4, 18, 13, .25); }
        .ee-tile img.ee-bg { transition: transform .6s ease; }
        .ee-tile:hover img.ee-bg { transform: scale(1.06); }

        .ee-rise { animation: ee-rise .8s cubic-bezier(.2, .7, .2, 1) both; }
        .ee-rise-2 { animation-delay: .12s; }
        .ee-rise-3 { animation-delay: .24s; }
        @keyframes ee-rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }

        .ee-path::before {
            content: ""; position: absolute; left: 1.25rem; top: 1rem; bottom: 1rem; width: 2px;
            background: linear-gradient(#34d399, rgba(52, 211, 153, .15));
        }
        @media (min-width: 1024px) {
            .ee-path::before { left: 2rem; right: 2rem; top: 1.25rem; bottom: auto; width: auto; height: 2px;
                background: linear-gradient(90deg, #34d399, rgba(52, 211, 153, .15)); }
        }

        /* Langue : une seule langue affichée à la fois */
        body[data-lang="fr"] .ee-ar { display: none !important; }
        body[data-lang="ar"] .ee-fr { display: none !important; }
        html[dir="rtl"] body, html[dir="rtl"] .font-head { font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif; letter-spacing: 0; }
        html[dir="rtl"] .lucide-arrow-right { transform: scaleX(-1); }
        html[dir="rtl"] .ee-hero-ar { font-size: clamp(2.4rem, 7vw, 4.4rem); line-height: 1.25; font-weight: 800; color: #a7f3d0; }

        a:focus-visible, button:focus-visible { outline: 3px solid #34d399; outline-offset: 2px; border-radius: 12px; }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .ee-rise { animation: none; }
            .ee-tile, .ee-tile img.ee-bg { transition: none; }
        }
    </style>
</head>

<body class="text-gray-800" data-lang="fr">

    <!-- ========== HERO + NAVBAR (fond sombre) ========== -->

    <div class="relative bg-ink text-white overflow-hidden">
        <div class="ee-grid-bg absolute inset-0 pointer-events-none"></div>
        <div class="absolute -top-40 -right-40 w-[34rem] h-[34rem] rounded-full bg-emerald-500/20 blur-3xl pointer-events-none"></div>

        <!-- NAVBAR flottante -->
        <header class="sticky top-0 z-50 px-3 sm:px-6 pt-3">
            <div class="max-w-6xl mx-auto rounded-2xl bg-ink/80 backdrop-blur-md border border-white/10 shadow-lg shadow-black/20">
                <div class="h-14 sm:h-16 pl-3 pr-2.5 flex items-center justify-between gap-3">

                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                        <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-white flex items-center justify-center">
                            <img
                                src="{{ asset('images/logo-centre.png') }}"
                                alt="Logo du centre"
                                class="w-8 h-8 object-contain"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <span class="hidden items-center justify-center text-emerald-600">
                                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                            </span>
                        </div>
                        <div class="leading-tight">
                            <div class="font-head text-base sm:text-lg font-bold">
                                Étude<span class="text-mint">EnLigne</span>
                            </div>
                            <p class="hidden md:block text-[10.5px] text-emerald-100/60 font-medium">
                                <span class="ee-fr">Apprendre • Progresser • Réussir</span><span class="ee-ar">تعلّم • تقدّم • انجح</span>
                            </p>
                        </div>
                    </a>

                    <nav class="hidden lg:flex items-center gap-1 text-sm font-semibold" aria-label="Navigation principale">
                        <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl bg-white/10 text-mint"><span class="ee-fr">Accueil</span><span class="ee-ar">الرئيسية</span></a>
                        <a href="#formations" class="px-3.5 py-2 rounded-xl text-emerald-50/80 hover:bg-white/5 hover:text-white transition"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                        <a href="#about" class="px-3.5 py-2 rounded-xl text-emerald-50/80 hover:bg-white/5 hover:text-white transition"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                        <a href="#quiz" class="px-3.5 py-2 rounded-xl text-emerald-50/80 hover:bg-white/5 hover:text-white transition"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                        <a href="#contact" class="px-3.5 py-2 rounded-xl text-emerald-50/80 hover:bg-white/5 hover:text-white transition"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                    </nav>

                    <div class="flex items-center gap-2">
                        <button type="button" id="ee-lang" aria-label="Changer de langue / تغيير اللغة" class="inline-flex items-center gap-1.5 px-3 py-2.5 rounded-xl border border-white/20 hover:bg-white/10 text-white font-bold text-sm transition"><i data-lucide="globe" class="w-4 h-4"></i><span class="ee-fr">العربية</span><span class="ee-ar">Français</span></button>
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-mint hover:bg-emerald-300 text-ink font-bold text-sm transition">
                                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                <span class="ee-fr">Mon espace</span><span class="ee-ar">فضائي</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="hidden sm:inline-flex items-center px-4 py-2.5 rounded-xl text-white hover:bg-white/10 font-bold text-sm transition">
                                <span class="ee-fr">Connexion</span><span class="ee-ar">تسجيل الدخول</span>
                            </a>
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-mint hover:bg-emerald-300 text-ink font-bold text-sm transition">
                                <i data-lucide="user-plus" class="w-4 h-4"></i>
                                <span class="ee-fr">Inscription</span><span class="ee-ar">التسجيل</span>
                            </a>
                        @endauth

                        <button type="button" id="ee-menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="ee-mobile-menu"
                                class="lg:hidden w-10 h-10 inline-flex items-center justify-center rounded-xl bg-white/10 text-white">
                            <i data-lucide="menu" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <nav id="ee-mobile-menu" class="hidden lg:hidden px-3 pb-3 grid gap-1 text-sm font-semibold" aria-label="Navigation mobile">
                    <a href="{{ route('home') }}" class="px-3 py-2.5 rounded-lg bg-white/10 text-mint"><span class="ee-fr">Accueil</span><span class="ee-ar">الرئيسية</span></a>
                    <a href="#formations" class="px-3 py-2.5 rounded-lg text-emerald-50/90 hover:bg-white/5"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                    <a href="#about" class="px-3 py-2.5 rounded-lg text-emerald-50/90 hover:bg-white/5"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                    <a href="#quiz" class="px-3 py-2.5 rounded-lg text-emerald-50/90 hover:bg-white/5"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                    <a href="#contact" class="px-3 py-2.5 rounded-lg text-emerald-50/90 hover:bg-white/5"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                    @guest
                        <a href="{{ route('login') }}" class="sm:hidden px-3 py-2.5 rounded-lg text-emerald-50/90 hover:bg-white/5"><span class="ee-fr">Connexion</span><span class="ee-ar">تسجيل الدخول</span></a>
                    @endguest
                </nav>
            </div>
        </header>


        <!-- HERO -->

        <main>
        <section class="relative max-w-6xl mx-auto px-5 sm:px-6 pt-10 sm:pt-14 pb-14 sm:pb-20">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-8 items-center">

                <div class="lg:col-span-7">
                    <span class="ee-rise inline-flex items-center gap-2 pl-2 pr-3.5 py-1.5 rounded-full bg-white/10 border border-white/10 text-emerald-100 text-sm font-semibold">
                        <span class="w-6 h-6 rounded-full bg-mint text-ink flex items-center justify-center">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                        </span>
                        <span class="ee-fr">Plateforme d'apprentissage en ligne</span><span class="ee-ar">منصة للتعلم عن بعد</span>
                    </span>

                    <h1 class="ee-fr ee-rise ee-rise-2 font-head text-[2.6rem] sm:text-6xl lg:text-[4.4rem] font-extrabold leading-[1.02] mt-6">
                        Apprenez.<br>
                        Progressez.<br>
                        <span class="text-mint">Réussissez.</span>
                    </h1>

                    <h2 dir="rtl" class="ee-ar ee-hero-ar ee-rise ee-rise-2 text-xl sm:text-2xl font-bold text-emerald-200 mt-5 leading-relaxed">
                        تعلم، تطور وحقق النجاح
                    </h2>

                    <p class="ee-fr ee-rise ee-rise-3 text-emerald-50/75 text-base sm:text-lg leading-8 mt-4 max-w-xl">
                        Découvrez des formations, apprenez à votre rythme et développez des compétences utiles pour votre avenir.
                    </p>

                    <p dir="rtl" class="ee-ar ee-rise ee-rise-3 text-emerald-50/55 text-base leading-8 mt-2 max-w-xl">
                        اكتشف التكوينات، وتعلم حسب وتيرتك، وطوّر مهاراتك من أجل مستقبلك.
                    </p>

                    <div class="ee-rise ee-rise-3 flex flex-wrap gap-3 mt-8">
                        <a href="#formations"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-mint hover:bg-emerald-300 text-ink font-extrabold shadow-lg shadow-emerald-500/20 transition">
                            <span class="ee-fr">Découvrir les formations</span><span class="ee-ar">اكتشف التكوينات</span>
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>

                        @guest
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl border border-white/20 hover:bg-white/10 text-white font-bold transition">
                                <span class="ee-fr">Créer un compte</span><span class="ee-ar">إنشاء حساب</span>
                                <i data-lucide="user-plus" class="w-5 h-5"></i>
                            </a>
                        @endguest
                    </div>

                    <div class="ee-rise ee-rise-3 flex flex-wrap gap-x-6 gap-y-3 mt-8 text-sm text-emerald-50/85 font-semibold">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5 text-mint"></i>
                            <span class="ee-fr">Plusieurs domaines</span><span class="ee-ar">مجالات متعددة</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <i data-lucide="book-open" class="w-5 h-5 text-mint"></i>
                            <span class="ee-fr">Cours en ligne</span><span class="ee-ar">دروس عبر الإنترنت</span>
                        </span>
                    </div>
                </div>

                <!-- Visuel en arche -->
                <div class="lg:col-span-5 relative ee-rise ee-rise-2">
                    <div class="relative mx-auto max-w-sm lg:max-w-none">
                        <div class="rounded-t-[10rem] rounded-b-3xl overflow-hidden ring-1 ring-white/15 shadow-2xl shadow-black/40">
                            <img
                                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1000&q=85"
                                alt="Étudiants apprenant ensemble"
                                class="w-full h-[340px] sm:h-[460px] object-cover"
                            >
                        </div>

                        <div class="absolute -left-3 sm:-left-8 bottom-10 bg-white text-ink p-3.5 pr-5 rounded-2xl shadow-xl max-w-[16rem]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-head font-bold text-sm">ÉtudeEnLigne</p>
                                    <p class="ee-fr text-gray-600 text-xs">Votre parcours commence ici</p>
                                </div>
                            </div>
                            <p dir="rtl" class="ee-ar text-emerald-700 font-semibold text-xs mt-2">
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
                    <p class="inline-flex items-center gap-2 text-sm font-bold text-emerald-700">
                        <i data-lucide="layers" class="w-4 h-4"></i>
                        <span class="ee-fr">Nos domaines de formation</span><span class="ee-ar">مجالات التكوين لدينا</span>
                    </p>
                    <h2 class="ee-fr font-head text-3xl sm:text-4xl font-extrabold text-primary mt-2 leading-tight">
                        Trouvez la formation qui vous correspond
                    </h2>
                    <p dir="rtl" class="ee-ar text-xl font-bold text-emerald-700 mt-2">
                        اكتشف التكوين المناسب لك
                    </p>
                </div>

                <div class="max-w-sm">
                    <p class="ee-fr text-gray-600 text-sm leading-7">
                        Explorez nos domaines de formation et découvrez les compétences que vous pouvez développer.
                    </p>
                    <p dir="rtl" class="ee-ar text-gray-500 text-sm leading-7 mt-1">
                        اكتشف مجالات التكوين وتعرّف على المهارات التي يمكنك اكتسابها.
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
                    [
                        'title' => 'Programmes d’ingénierie',
                        'arabic' => 'برامج الهندسة',
                        'description' => 'Découvrez les sciences appliquées, les systèmes techniques et la résolution de problèmes.',
                        'description_ar' => 'اكتشف العلوم التطبيقية والأنظمة التقنية وحل المشكلات.',
                        'image' => 'https://images.unsplash.com/photo-1581092921461-eab62e97a780?auto=format&fit=crop&w=900&q=80',
                        'icon' => 'settings',
                        'duration' => 'À confirmer selon le programme',
                        'duration_ar' => 'تحدد حسب البرنامج',
                        'color' => 'cyan',
                    ],
                ];
            @endphp


            <div class="grid sm:grid-cols-2 lg:grid-cols-4 lg:grid-flow-dense gap-4 mt-10">

                @foreach ($categories as $category)
                    <article class="ee-tile group relative overflow-hidden rounded-3xl bg-ink text-white min-h-[300px]
                                    {{ $loop->first ? 'lg:col-span-2 lg:row-span-2 lg:min-h-[620px]' : '' }}
                                    {{ $loop->last ? 'lg:col-span-2' : '' }}">

                        <img
                            src="{{ $category['image'] }}"
                            alt="{{ $category['title'] }}"
                            loading="lazy"
                            class="ee-bg absolute inset-0 w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/70 to-ink/10"></div>

                        <div class="relative h-full flex flex-col p-5 {{ $loop->first ? 'lg:p-8' : '' }}">

                            <div class="flex items-start justify-between gap-3">
                                <span class="w-11 h-11 rounded-xl bg-mint text-ink flex items-center justify-center">
                                    <i data-lucide="{{ $category['icon'] }}" class="w-5 h-5"></i>
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/15 backdrop-blur text-[11px] font-semibold">
                                    <i data-lucide="calendar-clock" class="w-3.5 h-3.5"></i>
                                    <span class="ee-fr">Durée : {{ $category['duration'] }}</span><span class="ee-ar">المدة : {{ $category['duration_ar'] }}</span>
                                </span>
                            </div>

                            <div class="mt-auto pt-24">
                                <h3 class="ee-fr font-head font-bold leading-tight {{ $loop->first ? 'text-2xl sm:text-3xl' : 'text-xl' }}">
                                    {{ $category['title'] }}
                                </h3>

                                <p dir="rtl" class="ee-ar text-mint font-bold text-sm mt-1">
                                    {{ $category['arabic'] }}
                                </p>

                                <p class="ee-fr text-emerald-50/80 text-sm leading-6 mt-3">
                                    {{ $category['description'] }}
                                </p>

                                <p dir="rtl" class="ee-ar text-emerald-50/60 text-sm leading-6 mt-1.5">
                                    {{ $category['description_ar'] }}
                                </p>

                                

                                <a href="#contact"
                                   class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/15 hover:bg-mint hover:text-ink backdrop-blur text-sm font-bold transition">
                                    <span class="ee-fr">Découvrir la formation</span><span class="ee-ar">اكتشف التكوين</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div class="mt-7 flex items-start sm:items-center justify-center gap-2 text-sm text-gray-500 text-center">
                <i data-lucide="info" class="w-4 h-4 shrink-0 mt-0.5 sm:mt-0"></i>
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
            <div class="rounded-[2rem] bg-forest text-white p-7 sm:p-10 lg:p-12 relative overflow-hidden">
                <div class="absolute -bottom-32 -left-24 w-80 h-80 rounded-full bg-emerald-400/15 blur-3xl pointer-events-none"></div>

                <div class="relative grid lg:grid-cols-12 gap-8 items-end">
                    <div class="lg:col-span-6">
                        <p class="inline-flex items-center gap-2 text-sm font-bold text-mint">
                            <i data-lucide="compass" class="w-4 h-4"></i>
                            <span class="ee-fr">À propos de nous</span><span class="ee-ar">من نحن</span>
                        </p>
                        <h2 class="font-head text-3xl sm:text-4xl font-extrabold mt-2 leading-tight">
                            <span class="ee-fr">Apprendre pour construire son avenir</span><span class="ee-ar">نتعلم لنبني مستقبلنا</span>
                        </h2>
                    </div>
                    <div class="lg:col-span-6">
                        <p class="ee-fr text-emerald-50/80 leading-7">
                            ÉtudeEnLigne facilite l’accès aux formations et aux ressources pédagogiques pour accompagner votre apprentissage.
                        </p>
                        <p dir="rtl" class="ee-ar text-emerald-50/60 leading-8 mt-2">
                            تسهّل منصة ÉtudeEnLigne الوصول إلى التكوينات والموارد التعليمية لمساعدتك على التعلم وتطوير مهاراتك.
                        </p>
                    </div>
                </div>

                <!-- Le parcours : étapes réellement séquentielles -->
                <div class="ee-path relative grid lg:grid-cols-4 gap-6 lg:gap-5 mt-10 pl-12 lg:pl-0">

                    <div class="relative lg:pt-12">
                        <span class="absolute -left-12 top-0 lg:left-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">1</span>
                        <i data-lucide="book-open" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-lg mt-2"><span class="ee-fr"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></span><span class="ee-ar">تدريبات</span></h3>
                        <p class="ee-fr text-emerald-50/75 mt-1 text-sm leading-6">Découvrez différents domaines d’apprentissage.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/55 mt-1 text-sm">اكتشف مجالات تعلم مختلفة</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -left-12 top-0 lg:left-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">2</span>
                        <i data-lucide="file-text" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-lg mt-2"><span class="ee-fr">Cours</span><span class="ee-ar">درس</span></h3>
                        <p class="ee-fr text-emerald-50/75 mt-1 text-sm leading-6">Consultez les ressources disponibles.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/55 mt-1 text-sm">اطلع على الموارد المتاحة.</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -left-12 top-0 lg:left-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">3</span>
                        <i data-lucide="clipboard-check" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-lg mt-2"><span class="ee-fr"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></span><span class="ee-ar">اختبار</span></h3>
                        <p class="ee-fr text-emerald-50/75 mt-1 text-sm leading-6">Testez vos connaissances.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/55 mt-1 text-sm">اختبر معرفتك.</p>
                    </div>

                    <div class="relative lg:pt-12">
                        <span class="absolute -left-12 top-0 lg:left-0 w-10 h-10 rounded-full bg-mint text-ink flex items-center justify-center font-head font-extrabold">4</span>
                        <i data-lucide="target" class="w-6 h-6 text-mint"></i>
                        <h3 class="font-head font-bold text-lg mt-2"><span class="ee-fr">Progression</span><span class="ee-ar">تقدّم</span></h3>
                        <p class="ee-fr text-emerald-50/75 mt-1 text-sm leading-6">Avancez progressivement dans votre parcours.</p>
                        <p dir="rtl" class="ee-ar text-emerald-50/55 mt-1 text-sm">تقدم تدريجياً في مسارك.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ========== QUIZ + CONTACT côte à côte ========== -->

    <section class="pb-14 sm:pb-20">
        <div class="max-w-6xl mx-auto px-5 sm:px-6 grid lg:grid-cols-2 gap-4">

            <div id="quiz" class="rounded-[2rem] bg-white border border-black/5 shadow-sm p-7 sm:p-9">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                    <i data-lucide="clipboard-check" class="w-7 h-7"></i>
                </div>

                <h2 class="ee-fr font-head text-2xl sm:text-3xl font-extrabold text-primary mt-5">
                    Testez vos connaissances
                </h2>

                <p dir="rtl" class="ee-ar text-xl font-bold text-emerald-700 mt-2">
                    اختبر معلوماتك
                </p>

                <p class="ee-fr text-gray-600 leading-7 mt-4">
                    Les quiz permettent de réviser et d’évaluer les connaissances acquises pendant votre apprentissage.
                </p>

                <p dir="rtl" class="ee-ar text-gray-500 leading-7 mt-2">
                    تساعدك الاختبارات على مراجعة وتقييم المعارف التي اكتسبتها خلال التعلم.
                </p>
            </div>

            <div id="contact" class="rounded-[2rem] bg-mint text-ink p-7 sm:p-9 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-ink text-mint flex items-center justify-center">
                    <i data-lucide="message-circle" class="w-7 h-7"></i>
                </div>

                <h2 class="ee-fr font-head text-2xl sm:text-3xl font-extrabold mt-5">
                    Besoin de plus d’informations ?
                </h2>

                <p dir="rtl" class="ee-ar text-xl font-bold text-forest mt-2">
                    هل تحتاج إلى مزيد من المعلومات؟
                </p>

                <p class="ee-fr text-ink/80 leading-7 mt-4">
                    Créez votre compte pour commencer votre parcours sur ÉtudeEnLigne.
                </p>

                <p dir="rtl" class="ee-ar text-ink/70 leading-7 mt-2">
                    أنشئ حسابك لبدء رحلتك التعليمية على المنصة.
                </p>

                <div class="mt-auto pt-7">
                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-ink hover:bg-forest text-white font-extrabold transition">
                            <span class="ee-fr">Créer mon compte</span><span class="ee-ar">أنشئ حسابي</span>
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-ink hover:bg-forest text-white font-extrabold transition">
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

    <footer class="bg-ink text-white">
        <div class="max-w-6xl mx-auto px-5 sm:px-6 py-9">

            <div class="grid md:grid-cols-3 gap-6 items-center">

                <div class="text-center md:text-start">
                    <p class="font-head text-xl font-extrabold">
                        Étude<span class="text-mint">EnLigne</span>
                    </p>
                    <p class="ee-fr text-sm text-emerald-50/70 mt-1.5">Plateforme d’étude et de formation en ligne.</p>
                    <p dir="rtl" class="ee-ar text-sm text-emerald-50/55 mt-1 text-center md:text-start">منصة للدراسة والتكوين عبر الإنترنت.</p>
                </div>

                <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-emerald-50/80 font-semibold" aria-label="Liens du pied de page">
                    <a href="#formations" class="hover:text-mint"><span class="ee-fr">Formations</span><span class="ee-ar">التكوينات</span></a>
                    <a href="#about" class="hover:text-mint"><span class="ee-fr">À propos</span><span class="ee-ar">من نحن</span></a>
                    <a href="#quiz" class="hover:text-mint"><span class="ee-fr">Quiz</span><span class="ee-ar">الاختبارات</span></a>
                    <a href="#contact" class="hover:text-mint"><span class="ee-fr">Contact</span><span class="ee-ar">اتصل بنا</span></a>
                </nav>

                <div class="text-sm text-emerald-50/55 text-center md:text-end">
                    <span class="ee-fr">© {{ date('Y') }} ÉtudeEnLigne — Tous droits réservés.</span><span class="ee-ar">© {{ date('Y') }} ÉtudeEnLigne — جميع الحقوق محفوظة.</span>
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

</body>
</html>