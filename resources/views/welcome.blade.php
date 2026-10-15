
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ÉtudeEnLigne | Formations en ligne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#061510',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .course-card {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 40px rgba(6, 21, 16, .10);
        }

        .course-image {
            transition: transform .4s ease;
        }

        .course-card:hover .course-image {
            transform: scale(1.05);
        }

        [dir="rtl"] {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    <!-- NAVBAR -->

    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-20 py-3 flex flex-wrap items-center justify-between gap-4">

                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 flex-shrink-0 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-center bg-white">
                        <img
                            src="{{ asset('images/logo-centre.png') }}"
                            alt="Logo du centre"
                            class="w-12 h-12 sm:w-14 sm:h-14 object-contain"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <span class="hidden items-center justify-center text-emerald-600">
                            <i data-lucide="graduation-cap" class="w-9 h-9"></i>
                        </span>
                    </div>

                    <div>
                        <div class="text-lg sm:text-xl font-extrabold text-gray-900">
                            Étude<span class="text-emerald-500">EnLigne</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-gray-500 font-semibold mt-1">
                            APPRENDRE • PROGRESSER • RÉUSSIR
                        </p>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-3 py-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-sm">
                        Accueil
                    </a>
                    <a href="#formations" class="px-3 py-2.5 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 font-semibold text-sm">
                        Formations
                    </a>
                    <a href="#about" class="px-3 py-2.5 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 font-semibold text-sm">
                        À propos
                    </a>
                    <a href="#quiz" class="px-3 py-2.5 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 font-semibold text-sm">
                        Quiz
                    </a>
                    <a href="#contact" class="px-3 py-2.5 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 font-semibold text-sm">
                        Contact
                    </a>
                </nav>

                <div class="flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm">
                            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                            Mon espace
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="hidden sm:inline-flex items-center px-4 py-3 rounded-xl border border-gray-200 hover:border-emerald-400 text-gray-700 font-bold text-sm">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm">
                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                            Inscription
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </header>


    <!-- HERO -->

    <main>
        <section class="bg-gradient-to-br from-emerald-50 via-white to-teal-50 overflow-hidden">
            <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <div>
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-800 text-sm sm:text-base font-bold">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            Plateforme d'apprentissage en ligne
                        </span>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mt-7">
                            Apprenez.
                            <span class="text-emerald-500">Progressez.</span>
                            Réussissez.
                        </h1>

                        <h2 dir="rtl" class="text-2xl sm:text-3xl font-extrabold text-emerald-700 mt-6 leading-relaxed">
                            تعلم، تطور وحقق النجاح
                        </h2>

                        <p class="text-gray-600 text-lg leading-8 mt-6 max-w-xl">
                            Découvrez des formations, apprenez à votre rythme et développez des compétences utiles pour votre avenir.
                        </p>

                        <p dir="rtl" class="text-gray-600 text-lg leading-9 mt-4 max-w-xl">
                            اكتشف التكوينات، وتعلم حسب وتيرتك، وطوّر مهاراتك من أجل مستقبلك.
                        </p>

                        <div class="flex flex-wrap gap-3 mt-8">
                            <a href="#formations"
                               class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold shadow-md transition">
                                Découvrir les formations
                                <i data-lucide="arrow-right" class="w-5 h-5"></i>
                            </a>

                            @guest
                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-white border border-gray-200 hover:border-emerald-400 text-gray-800 font-bold transition">
                                    Créer un compte
                                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                                </a>
                            @endguest
                        </div>

                        <div class="flex flex-wrap gap-5 mt-8 text-sm sm:text-base text-gray-700 font-semibold">
                            <span class="flex items-center gap-2">
                                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                                Plusieurs domaines
                            </span>
                            <span class="flex items-center gap-2">
                                <i data-lucide="book-open" class="w-5 h-5 text-emerald-600"></i>
                                Cours en ligne
                            </span>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="rounded-3xl overflow-hidden shadow-xl border border-white">
                            <img
                                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1100&q=85"
                                alt="Étudiants apprenant ensemble"
                                class="w-full h-[300px] sm:h-[420px] object-cover"
                            >
                        </div>

                        <div class="relative sm:absolute sm:-bottom-6 sm:-left-6 mt-4 sm:mt-0 bg-white p-5 rounded-2xl shadow-lg border border-gray-100 max-w-sm">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                                    <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <p class="font-extrabold text-gray-900 text-lg">ÉtudeEnLigne</p>
                                    <p class="text-gray-600 mt-1">Votre parcours commence ici</p>
                                </div>
                            </div>
                            <p dir="rtl" class="text-emerald-700 font-bold mt-3">
                                ابدأ رحلتك التعليمية من هنا
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- FORMATIONS -->

        <section id="formations" class="py-16 sm:py-20 bg-white">
            <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto">
                    <span class="text-sm sm:text-base font-extrabold text-emerald-700 uppercase tracking-wider">
                        Nos domaines de formation
                    </span>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mt-4 leading-tight">
                        Trouvez la formation qui vous correspond
                    </h2>

                    <p dir="rtl" class="text-2xl sm:text-3xl font-extrabold text-emerald-700 mt-5">
                        اكتشف التكوين المناسب لك
                    </p>

                    <p class="text-gray-600 text-base sm:text-lg leading-8 mt-5">
                        Explorez nos domaines de formation et découvrez les compétences que vous pouvez développer.
                    </p>

                    <p dir="rtl" class="text-gray-600 text-base sm:text-lg leading-8 mt-3">
                        اكتشف مجالات التكوين وتعرّف على المهارات التي يمكنك اكتسابها.
                    </p>
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


                <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-12">

                    @foreach ($categories as $category)
                        <article class="course-card bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm flex flex-col">

                            <!-- Image du domaine -->
                            <div class="relative h-52 overflow-hidden bg-emerald-50">
                                <img
                                    src="{{ $category['image'] }}"
                                    alt="{{ $category['title'] }}"
                                    loading="lazy"
                                    class="course-image w-full h-full object-cover"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                >

                                <div class="hidden absolute inset-0 items-center justify-center bg-emerald-50 text-emerald-600">
                                    <i data-lucide="{{ $category['icon'] }}" class="w-16 h-16"></i>
                                </div>

                                <div class="absolute top-3 left-3 bg-white/95 text-emerald-800 px-3 py-2 rounded-lg text-xs font-extrabold shadow-sm">
                                    Formation
                                </div>
                            </div>

                            <!-- Informations -->
                            <div class="p-5 sm:p-6 flex flex-col flex-1">

                                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 mb-4">
                                    <i data-lucide="{{ $category['icon'] }}" class="w-6 h-6"></i>
                                </div>

                                <h3 class="text-xl font-extrabold text-gray-900 leading-7">
                                    {{ $category['title'] }}
                                </h3>

                                <p dir="rtl" class="text-emerald-700 font-bold text-base leading-7 mt-2">
                                    {{ $category['arabic'] }}
                                </p>

                                <p class="text-gray-600 text-sm sm:text-base leading-7 mt-4">
                                    {{ $category['description'] }}
                                </p>

                                <p dir="rtl" class="text-gray-600 text-sm leading-7 mt-3">
                                    {{ $category['description_ar'] }}
                                </p>

                                <div class="mt-5 pt-4 border-t border-gray-100">
                                    <div class="flex items-start gap-2 text-gray-700">
                                        <i data-lucide="calendar-clock" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                                        <div>
                                            <p class="text-sm font-bold">Durée</p>
                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $category['duration'] }}
                                            </p>
                                            <p dir="rtl" class="text-sm text-gray-500 mt-1">
                                                {{ $category['duration_ar'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <a href="#contact"
                                   class="mt-6 inline-flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl bg-emerald-50 hover:bg-emerald-500 text-emerald-800 hover:text-white font-extrabold transition">
                                    Découvrir la formation
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>

                            </div>
                        </article>
                    @endforeach

                </div>

                <p class="text-sm text-gray-500 text-center mt-8 leading-7">
                    Les durées exactes et les programmes sont à confirmer auprès du centre.
                </p>

                <p dir="rtl" class="text-sm text-gray-500 text-center mt-2 leading-7">
                    يرجى التأكد من المدة والبرنامج الرسمي لكل تكوين لدى المركز.
                </p>

            </div>
        </section>


        <!-- À PROPOS -->

        <section id="about" class="py-16 sm:py-20 bg-gray-50">
            <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-10 items-center">

                    <div>
                        <span class="text-sm font-extrabold uppercase tracking-wider text-emerald-700">
                            À propos de nous
                        </span>

                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-4 leading-tight">
                            Apprendre pour construire son avenir
                        </h2>

                        <p class="text-gray-600 text-lg leading-8 mt-5">
                            ÉtudeEnLigne facilite l’accès aux formations et aux ressources pédagogiques pour accompagner votre apprentissage.
                        </p>

                        <p dir="rtl" class="text-gray-600 text-lg leading-9 mt-4">
                            تسهّل منصة ÉtudeEnLigne الوصول إلى التكوينات والموارد التعليمية لمساعدتك على التعلم وتطوير مهاراتك.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white border border-gray-100 rounded-2xl p-5 sm:p-7 shadow-sm">
                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                                <i data-lucide="book-open" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-extrabold text-gray-900 text-lg mt-4">Formations /   تدريبات</h3>
                            <p class="text-gray-600 mt-2 leading-6">Découvrez différents domaines d’apprentissage.</p>  
                            <p>اكتشف مجالات تعلم مختلفة</p>
                        </div>

                        <div class="bg-white border border-gray-100 rounded-2xl p-5 sm:p-7 shadow-sm">
                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                <i data-lucide="file-text" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-extrabold text-gray-900 text-lg mt-4">Cours/ درس</h3>
                            <p class="text-gray-600 mt-2 leading-6">Consultez les ressources disponibles.</p>
                            <P>اطلع على الموارد المتاحة.</P>
                        </div>

                        <div class="bg-white border border-gray-100 rounded-2xl p-5 sm:p-7 shadow-sm">
                            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center">
                                <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-extrabold text-gray-900 text-lg mt-4">Quiz/اختبار</h3>
                            <p class="text-gray-600 mt-2 leading-6">Testez vos connaissances.</p>
                            <p>اختبر معرفتك.</p>
                        </div>

                        <div class="bg-white border border-gray-100 rounded-2xl p-5 sm:p-7 shadow-sm">
                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center">
                                <i data-lucide="target" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-extrabold text-gray-900 text-lg mt-4">Progression/ تقدّم</h3>
                            <p class="text-gray-600 mt-2 leading-6">Avancez progressivement dans votre parcours.</p>
                            <P>تقدم تدريجياً في مسارك.</P>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- QUIZ -->

        <section id="quiz" class="py-16 sm:py-20 bg-white">
            <div class="max-w-4xl mx-auto px-5 text-center">

                <div class="w-16 h-16 rounded-2xl bg-purple-50 text-purple-700 flex items-center justify-center mx-auto">
                    <i data-lucide="clipboard-check" class="w-8 h-8"></i>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-6">
                    Testez vos connaissances
                </h2>

                <p dir="rtl" class="text-2xl font-extrabold text-purple-700 mt-4">
                    اختبر معلوماتك
                </p>

                <p class="text-gray-600 text-lg leading-8 mt-5">
                    Les quiz permettent de réviser et d’évaluer les connaissances acquises pendant votre apprentissage.
                </p>

                <p dir="rtl" class="text-gray-600 text-lg leading-8 mt-3">
                    تساعدك الاختبارات على مراجعة وتقييم المعارف التي اكتسبتها خلال التعلم.
                </p>

            </div>
        </section>


        <!-- CONTACT -->

        <section id="contact" class="py-16 sm:py-20 bg-emerald-50">
            <div class="max-w-4xl mx-auto px-5 text-center">

                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-emerald-700 mx-auto shadow-sm">
                    <i data-lucide="message-circle" class="w-8 h-8"></i>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-6">
                    Besoin de plus d’informations ?
                </h2>

                <p dir="rtl" class="text-2xl font-extrabold text-emerald-700 mt-4">
                    هل تحتاج إلى مزيد من المعلومات؟
                </p>

                <p class="text-gray-600 text-lg leading-8 mt-5">
                    Créez votre compte pour commencer votre parcours sur ÉtudeEnLigne.
                </p>

                <p dir="rtl" class="text-gray-600 leading-8 mt-3">
                    أنشئ حسابك لبدء رحلتك التعليمية على المنصة.
                </p>

                @guest
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center gap-2 mt-7 px-7 py-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold shadow-md transition">
                        Créer mon compte
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center justify-center gap-2 mt-7 px-7 py-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold shadow-md transition">
                        Accéder à mon espace
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    </a>
                @endguest

            </div>
        </section>

    </main>


    <!-- FOOTER -->

    <footer class="border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-9">

            <div class="flex flex-col md:flex-row items-center justify-between gap-5">

                <div class="text-center md:text-left">
                    <p class="text-xl font-extrabold text-gray-900">
                        Étude<span class="text-emerald-500">EnLigne</span>
                    </p>

                    <p class="text-sm sm:text-base text-gray-600 mt-2">
                        Plateforme d’étude et de formation en ligne.
                    </p>

                    <p dir="rtl" class="text-sm sm:text-base text-gray-600 mt-2">
                        منصة للدراسة والتكوين عبر الإنترنت.
                    </p>
                </div>

                <div class="text-sm text-gray-500 text-center">
                    © {{ date('Y') }} ÉtudeEnLigne — Tous droits réservés.
                </div>

            </div>
        </div>
    </footer>


    <script>
        lucide.createIcons();
    </script>

</body>
</html>
