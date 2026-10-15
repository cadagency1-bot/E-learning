
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $formation->name }} | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'IBM Plex Sans Arabic', 'sans-serif']
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
            margin: 0;
            background: linear-gradient(180deg, #f0fdf7 0%, #f8fffb 45%, #ffffff 100%);
            background-attachment: fixed;
            color: #1f3d33;
            font-family: 'Plus Jakarta Sans', 'IBM Plex Sans Arabic', sans-serif;
        }

        html[dir="rtl"] body {
            font-family: 'IBM Plex Sans Arabic', 'Plus Jakarta Sans', sans-serif;
        }

        .card {
            background: #fff;
            border: 1px solid #d9f2e6;
            border-radius: 22px;
            box-shadow: 0 6px 24px rgba(52, 211, 153, .10);
        }

        .player {
            background: #0f2a21;
            border-radius: 22px;
            overflow: hidden;
            border: 4px solid #fff;
            box-shadow: 0 14px 40px rgba(52, 211, 153, .18);
        }

        .player video {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 9;
            max-height: 70vh;
            background: #0f2a21;
            object-fit: contain;
        }

        .player-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 14px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            font-weight: 600;
        }

        .speed-btn {
            padding: 4px 10px;
            border-radius: 8px;
            background: #d1fae5;
            color: #047857;
            transition: .15s;
        }

        .speed-btn:hover {
            background: #a7f3d0;
        }

        .speed-btn.on {
            background: #34d399;
            color: #fff;
        }

        .lesson-item {
            width: 100%;
            text-align: start;
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 12px;
            border-radius: 14px;
            border: 1px solid transparent;
            transition: .15s;
        }

        .lesson-item:hover {
            background: #f0fdf7;
        }

        .lesson-item.active {
            background: #d1fae5;
            border-color: #a7f3d0;
        }

        .lesson-num {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #f0fdf7;
            color: #059669;
            font-weight: 800;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .lesson-item.active .lesson-num {
            background: #34d399;
            color: #fff;
        }

        .lesson-item.done .lesson-num {
            background: #a7f3d0;
            color: #047857;
        }

        .tab-btn {
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 700;
            color: #6b7d75;
            border-bottom: 3px solid transparent;
            transition: .15s;
            white-space: nowrap;
        }

        .tab-btn.on {
            color: #047857;
            border-color: #10b981;
        }

        .bar {
            height: 10px;
            border-radius: 20px;
            background: #d1fae5;
            overflow: hidden;
        }

        .bar > div {
            height: 100%;
            background: linear-gradient(90deg, #6ee7b7, #34d399);
            border-radius: inherit;
            transition: width .4s;
        }

        .panel {
            display: none;
        }

        .panel.show {
            display: block;
            animation: fade .25s ease;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(6px);
            }
            to {
                opacity: 1;
                transform: none;
            }
        }

        .scroll-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scroll-thin::-webkit-scrollbar-thumb {
            background: #c9d8cf;
            border-radius: 10px;
        }

        html[dir="rtl"] .flip {
            transform: scaleX(-1);
        }
    </style>
</head>

<body>

@php
    $lessons = $formation->cours->sortBy('order')->values();
    $quizzes = $formation->quizzes;

    // Compter les deux vidéos de chaque cours
    $videoCount = $lessons->sum(function ($c) {
        return (int) !empty($c->video_path)
             + (int) !empty($c->video2_path);
    });

    $pdfCount = $lessons->filter(fn ($c) => !empty($c->file_path))->count();
    $lessonCount = $lessons->count();
    $quizCount = $quizzes->count();
@endphp

<!-- HEADER -->
<header class="bg-white/90 backdrop-blur text-emerald-900 sticky top-0 z-30 border-b border-emerald-100 shadow-sm">
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-3">

        <div class="flex items-center gap-3 min-w-0">
            <a href="{{ route('dashboard') }}" class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                <i data-lucide="graduation-cap" class="w-6 h-6 text-emerald-800"></i>
            </a>

            <div class="min-w-0">
                <p class="text-[10px] uppercase tracking-[2px] text-emerald-500 font-bold" data-i18n="space">
                    Espace étudiant
                </p>
                <h1 class="font-extrabold text-sm sm:text-base truncate">
                    {{ $formation->name }}
                </h1>
            </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
            <div class="flex rounded-xl bg-emerald-50 p-1 text-xs font-bold">
                <button type="button" id="lang-fr" class="px-3 py-1.5 rounded-lg">FR</button>
                <button type="button" id="lang-ar" class="px-3 py-1.5 rounded-lg">عربي</button>
            </div>

            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 px-3 py-2 text-sm font-semibold transition">
                <i data-lucide="arrow-left" class="w-4 h-4 flip"></i>
                <span class="hidden sm:inline" data-i18n="back">Mon espace</span>
            </a>
        </div>
    </div>
</header>

<div class="max-w-[1500px] mx-auto px-4 sm:px-6 py-6">

    <!-- PROGRESSION -->
    <section class="card p-4 sm:p-5 mb-6 flex flex-col md:flex-row md:items-center gap-4">

        <div class="flex-1">
            <div class="flex items-center justify-between mb-2">
                <p class="font-extrabold text-gray-900" data-i18n="progress">
                    Votre progression
                </p>

                <p class="text-sm font-bold text-emerald-700">
                    <span id="done-count">0</span> / {{ $lessonCount }}
                </p>
            </div>

            <div class="bar">
                <div id="progress-fill" style="width:0%"></div>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 text-xs font-bold">
            <span class="rounded-xl bg-emerald-50 text-emerald-700 px-3 py-2 inline-flex items-center gap-2">
                <i data-lucide="play-circle" class="w-4 h-4"></i>
                {{ $videoCount }}
                <span data-i18n="videos">Vidéos</span>
            </span>

            <span class="rounded-xl bg-blue-50 text-blue-700 px-3 py-2 inline-flex items-center gap-2">
                <i data-lucide="file-text" class="w-4 h-4"></i>
                {{ $pdfCount }}
                <span data-i18n="docs">Documents</span>
            </span>

            <span class="rounded-xl bg-violet-50 text-violet-700 px-3 py-2 inline-flex items-center gap-2">
                <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                {{ $quizCount }}
                <span data-i18n="quiz">Quiz</span>
            </span>
        </div>
    </section>

    @if($lessonCount === 0)

        <div class="card px-6 py-16 text-center">
            <div class="w-16 h-16 mx-auto rounded-2xl bg-emerald-50 flex items-center justify-center mb-5">
                <i data-lucide="book-open" class="w-8 h-8 text-emerald-600"></i>
            </div>

            <h2 class="text-lg font-extrabold" data-i18n="no_lesson">
                Aucune leçon disponible
            </h2>

            <p class="text-sm text-gray-500 mt-2" data-i18n="no_lesson_sub">
                Les cours seront affichés ici dès qu'ils seront ajoutés.
            </p>
        </div>

    @else

    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_370px] gap-6 items-start">

        <!-- ZONE D'ÉTUDE -->
        <main class="min-w-0 order-1">

            @foreach($lessons as $index => $cours)

                @php
                    $title = $cours->title ?? $cours->name ?? 'Leçon ' . ($index + 1);
                @endphp

                <section
                    class="panel {{ $index === 0 ? 'show' : '' }}"
                    data-panel="{{ $index }}"
                    id="lecon-{{ $cours->id }}"
                >

                    <div class="mb-4">
                        <p class="text-xs font-bold uppercase tracking-[1.5px] text-emerald-700">
                            <span data-i18n="lesson">Leçon</span>
                            {{ $index + 1 }} / {{ $lessonCount }}
                        </p>

                        <h2 class="text-2xl sm:text-3xl font-extrabold text-emerald-950 mt-1 leading-tight">
                            {{ $title }}
                        </h2>
                    </div>

                    <!-- VIDÉOS 1 ET 2 -->
                    @if($cours->video_path || $cours->video2_path)

                        <div class="space-y-5">

                            <!-- VIDÉO 1 -->
                            @if($cours->video_path)
                                <div class="player">

                                    <div class="player-bar">
                                        <span class="font-extrabold">
                                            <span data-i18n="video">Vidéo</span> 1
                                        </span>
                                    </div>

                                    <video controls playsinline preload="metadata" controlsList="nodownload">
                                        <source src="{{ asset('storage/' . $cours->video_path) }}">
                                        Votre navigateur ne prend pas en charge la lecture vidéo.
                                    </video>

                                    <div class="player-bar">
                                        <span class="inline-flex items-center gap-2">
                                            <i data-lucide="gauge" class="w-4 h-4"></i>
                                            <span data-i18n="speed">Vitesse</span>
                                        </span>

                                        <div class="flex gap-1.5">
                                            @foreach([0.75, 1, 1.25, 1.5, 2] as $s)
                                                <button
                                                    type="button"
                                                    class="speed-btn {{ $s == 1 ? 'on' : '' }}"
                                                    data-speed="{{ $s }}"
                                                >
                                                    {{ $s }}x
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- VIDÉO 2 -->
                            @if($cours->video2_path)
                                <div class="player">

                                    <div class="player-bar">
                                        <span class="font-extrabold">
                                            <span data-i18n="video">Vidéo</span> 2
                                        </span>
                                    </div>

                                    <video controls playsinline preload="metadata" controlsList="nodownload">
                                        <source src="{{ asset('storage/' . $cours->video2_path) }}">
                                        Votre navigateur ne prend pas en charge la lecture vidéo.
                                    </video>

                                    <div class="player-bar">
                                        <span class="inline-flex items-center gap-2">
                                            <i data-lucide="gauge" class="w-4 h-4"></i>
                                            <span data-i18n="speed">Vitesse</span>
                                        </span>

                                        <div class="flex gap-1.5">
                                            @foreach([0.75, 1, 1.25, 1.5, 2] as $s)
                                                <button
                                                    type="button"
                                                    class="speed-btn {{ $s == 1 ? 'on' : '' }}"
                                                    data-speed="{{ $s }}"
                                                >
                                                    {{ $s }}x
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    @else

                        <div class="card p-8 text-center bg-gradient-to-br from-emerald-50 to-white">
                            <i data-lucide="book-open" class="w-10 h-10 mx-auto text-emerald-600 mb-3"></i>

                            <p class="font-bold text-gray-700" data-i18n="text_lesson">
                                Leçon de lecture : consultez le contenu ci-dessous.
                            </p>
                        </div>

                    @endif

                    <!-- ACTIONS -->
                    <div class="flex flex-wrap items-center justify-between gap-3 mt-4">

                        <div class="flex gap-2">
                            <button type="button" class="nav-prev inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 transition">
                                <i data-lucide="chevron-left" class="w-4 h-4 flip"></i>
                                <span data-i18n="prev">Précédent</span>
                            </button>

                            <button type="button" class="nav-next inline-flex items-center gap-2 rounded-xl bg-emerald-400 hover:bg-emerald-500 text-white px-4 py-2.5 text-sm font-bold transition">
                                <span data-i18n="next">Suivant</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 flip"></i>
                            </button>
                        </div>

                        <button
                            type="button"
                            class="mark-done inline-flex items-center gap-2 rounded-xl border-2 border-emerald-200 text-emerald-700 hover:bg-emerald-50 px-4 py-2 text-sm font-bold transition"
                            data-index="{{ $index }}"
                        >
                            <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                            <span class="done-label" data-i18n="mark">Marquer comme terminée</span>
                        </button>
                    </div>

                    <!-- ONGLETS -->
                    <div class="card mt-5 overflow-hidden">

                        <div class="flex border-b border-gray-100 overflow-x-auto">
                            <button type="button" class="tab-btn on" data-tab="desc">
                                <span data-i18n="tab_desc">Description</span>
                            </button>

                            <button type="button" class="tab-btn" data-tab="content">
                                <span data-i18n="tab_content">Contenu du cours</span>
                            </button>

                            <button type="button" class="tab-btn" data-tab="files">
                                <span data-i18n="tab_files">Documents</span>

                                @if($cours->file_path)
                                    <span class="ms-1 text-[10px] bg-blue-100 text-blue-700 rounded-full px-1.5 py-0.5">1</span>
                                @endif
                            </button>
                        </div>

                        <div class="p-5 sm:p-6">

                            <!-- DESCRIPTION -->
                            <div data-tabpane="desc">
                                @if(!empty($cours->description))
                                    <p class="text-gray-600 leading-8 text-[15px]">
                                        {{ $cours->description }}
                                    </p>
                                @else
                                    <p class="text-gray-400 text-sm" data-i18n="no_desc">
                                        Aucune description pour cette leçon.
                                    </p>
                                @endif
                            </div>

                            <!-- CONTENU -->
                            <div data-tabpane="content" class="hidden">
                                @if($cours->content)
                                    <div class="text-gray-700 leading-8 text-[15px] whitespace-pre-line break-words">
                                        {{ $cours->content }}
                                    </div>
                                @else
                                    <p class="text-gray-400 text-sm" data-i18n="no_content">
                                        Aucun contenu écrit pour cette leçon.
                                    </p>
                                @endif
                            </div>

                            <!-- PDF -->
                            <div data-tabpane="files" class="hidden">
                                @if($cours->file_path)

                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 rounded-xl border border-blue-100 bg-blue-50/60 p-4">

                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded-xl bg-white border border-blue-100 flex items-center justify-center">
                                                <i data-lucide="file-text" class="w-6 h-6 text-blue-600"></i>
                                            </div>

                                            <div>
                                                <p class="font-bold text-gray-800 text-sm" data-i18n="support">
                                                    Support de cours (PDF)
                                                </p>

                                                <p class="text-xs text-gray-500 mt-1" data-i18n="support_sub">
                                                    À consulter ou à télécharger
                                                </p>
                                            </div>
                                        </div>

                                        <a
                                            href="{{ asset('storage/' . $cours->file_path) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 text-sm font-bold transition"
                                        >
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                            <span data-i18n="open_pdf">Ouvrir le PDF</span>
                                        </a>
                                    </div>

                                @else

                                    <p class="text-gray-400 text-sm" data-i18n="no_file">
                                        Aucun document pour cette leçon.
                                    </p>

                                @endif
                            </div>
                        </div>
                    </div>
                </section>

            @endforeach

            <!-- QUIZ -->
            <section id="liste-quiz" class="mt-8 scroll-mt-24">

                <div class="mb-4">
                    <p class="text-xs font-bold uppercase tracking-[1.5px] text-violet-700" data-i18n="evaluation">
                        Évaluation
                    </p>

                    <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900" data-i18n="test">
                        Testez vos connaissances
                    </h2>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">

                    @forelse($quizzes as $quiz)

                        <article class="card p-5 flex flex-col gap-4">

                            <div class="flex items-start gap-3">
                                <div class="w-11 h-11 shrink-0 rounded-xl bg-violet-50 flex items-center justify-center">
                                    <i data-lucide="clipboard-check" class="w-5 h-5 text-violet-600"></i>
                                </div>

                                <div class="min-w-0">
                                    <h3 class="font-extrabold text-gray-900">
                                        {{ $quiz->title ?? $quiz->name ?? 'Quiz de formation' }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1 leading-6">
                                        {{ !empty($quiz->description) ? $quiz->description : 'Évaluez votre compréhension de la formation.' }}
                                    </p>
                                </div>
                            </div>

                            <a
                                href="{{ url('/quiz/' . $quiz->id) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 hover:bg-violet-700 text-white px-5 py-2.5 text-sm font-bold transition"
                            >
                                <span data-i18n="start_quiz">Commencer le quiz</span>
                                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </a>

                        </article>

                    @empty

                        <div class="card p-6 sm:col-span-2 flex items-center gap-4">
                            <div class="w-11 h-11 rounded-xl bg-gray-100 flex items-center justify-center shrink-0">
                                <i data-lucide="clipboard-list" class="w-5 h-5 text-gray-500"></i>
                            </div>

                            <p class="font-bold text-gray-700" data-i18n="no_quiz">
                                Aucun quiz disponible pour le moment.
                            </p>
                        </div>

                    @endforelse

                </div>
            </section>
        </main>

        <!-- PLAYLIST -->
        <aside class="order-2 lg:sticky lg:top-24" id="liste-lecons">

            <div class="card p-4">

                <div class="flex items-center justify-between mb-3 px-1">
                    <h2 class="font-extrabold text-gray-900 flex items-center gap-2">
                        <i data-lucide="list-video" class="w-5 h-5 text-emerald-600"></i>
                        <span data-i18n="plan">Plan du cours</span>
                    </h2>

                    <span class="text-xs font-bold bg-emerald-50 text-emerald-700 rounded-lg px-2 py-1">
                        {{ $lessonCount }}
                    </span>
                </div>

                <div class="space-y-1 max-h-[60vh] overflow-y-auto scroll-thin pe-1">

                    @foreach($lessons as $index => $cours)

                        <button
                            type="button"
                            class="lesson-item {{ $index === 0 ? 'active' : '' }}"
                            data-go="{{ $index }}"
                        >
                            <span class="lesson-num">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>

                            <span class="min-w-0 flex-1">

                                <span class="block text-sm font-bold text-gray-800 leading-snug">
                                    {{ $cours->title ?? $cours->name ?? 'Leçon ' . ($index + 1) }}
                                </span>

                                <span class="flex flex-wrap items-center gap-2 mt-1 text-[11px] text-gray-400 font-semibold">

                                    @if($cours->video_path || $cours->video2_path)
                                        <span class="inline-flex items-center gap-1">
                                            <i data-lucide="play" class="w-3 h-3"></i>
                                            <span data-i18n="video">Vidéo</span>

                                            @if($cours->video_path && $cours->video2_path)
                                                (2)
                                            @endif
                                        </span>
                                    @endif

                                    @if($cours->file_path)
                                        <span class="inline-flex items-center gap-1">
                                            <i data-lucide="file-text" class="w-3 h-3"></i>
                                            PDF
                                        </span>
                                    @endif

                                    @if(!$cours->video_path && !$cours->video2_path && !$cours->file_path)
                                        <span class="inline-flex items-center gap-1">
                                            <i data-lucide="book-open" class="w-3 h-3"></i>
                                            <span data-i18n="reading">Lecture</span>
                                        </span>
                                    @endif

                                </span>
                            </span>

                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-500 check-icon hidden"></i>
                        </button>

                    @endforeach

                </div>

                <a
                    href="#liste-quiz"
                    class="mt-3 flex items-center justify-between gap-3 rounded-xl bg-violet-50 hover:bg-violet-100 text-violet-700 px-4 py-3 text-sm font-bold transition"
                >
                    <span class="inline-flex items-center gap-2">
                        <i data-lucide="clipboard-check" class="w-4 h-4"></i>
                        <span data-i18n="quiz">Quiz</span>
                        ({{ $quizCount }})
                    </span>

                    <i data-lucide="chevron-right" class="w-4 h-4 flip"></i>
                </a>

            </div>

            <div class="card p-5 mt-4 bg-gradient-to-br from-emerald-100 to-teal-50 text-emerald-900">
                <p class="text-lg font-extrabold leading-snug" data-i18n="motto">
                    Apprends, progresse et atteins tes objectifs
                </p>

                <p class="text-sm text-emerald-800/80 mt-2 leading-7" data-i18n="advice">
                    Consacre un moment chaque jour, regarde les leçons avec attention et révise avant les quiz.
                </p>
            </div>

        </aside>
    </div>
    @endif

    <!-- FOOTER -->
    <footer class="mt-10 py-5 border-t border-gray-200 text-xs text-gray-400 flex flex-col sm:flex-row justify-between gap-2">
        <p>© {{ date('Y') }} ÉtudeEnLigne</p>

        <a href="{{ route('dashboard') }}" class="font-bold text-emerald-700 hover:text-emerald-800" data-i18n="back_full">
            Retour à mon espace
        </a>
    </footer>

</div>

<script>
    const TOTAL = {{ $lessonCount }};
    const STORE = 'formation-{{ $formation->id }}';

    const I18N = {
        fr: {
            space: 'Espace étudiant',
            back: 'Mon espace',
            progress: 'Votre progression',
            videos: 'Vidéos',
            docs: 'Documents',
            quiz: 'Quiz',
            lesson: 'Leçon',
            speed: 'Vitesse',
            prev: 'Précédent',
            next: 'Suivant',
            mark: 'Marquer comme terminée',
            marked: 'Leçon terminée ✓',
            tab_desc: 'Description',
            tab_content: 'Contenu du cours',
            tab_files: 'Documents',
            no_desc: 'Aucune description pour cette leçon.',
            no_content: 'Aucun contenu écrit pour cette leçon.',
            no_file: 'Aucun document pour cette leçon.',
            support: 'Support de cours (PDF)',
            support_sub: 'À consulter ou à télécharger',
            open_pdf: 'Ouvrir le PDF',
            text_lesson: 'Leçon de lecture : consultez le contenu ci-dessous.',
            evaluation: 'Évaluation',
            test: 'Testez vos connaissances',
            start_quiz: 'Commencer le quiz',
            no_quiz: 'Aucun quiz disponible pour le moment.',
            plan: 'Plan du cours',
            video: 'Vidéo',
            reading: 'Lecture',
            motto: 'Apprends, progresse et atteins tes objectifs',
            advice: 'Consacre un moment chaque jour, regarde les leçons avec attention et révise avant les quiz.',
            back_full: 'Retour à mon espace',
            no_lesson: 'Aucune leçon disponible',
            no_lesson_sub: "Les cours seront affichés ici dès qu'ils seront ajoutés."
        },

        ar: {
            space: 'فضاء الطالب',
            back: 'فضائي',
            progress: 'تقدمك في التكوين',
            videos: 'فيديوهات',
            docs: 'مستندات',
            quiz: 'اختبارات',
            lesson: 'الدرس',
            speed: 'السرعة',
            prev: 'السابق',
            next: 'التالي',
            mark: 'تحديد الدرس كمكتمل',
            marked: 'تم إكمال الدرس ✓',
            tab_desc: 'الوصف',
            tab_content: 'محتوى الدرس',
            tab_files: 'المستندات',
            no_desc: 'لا يوجد وصف لهذا الدرس.',
            no_content: 'لا يوجد محتوى مكتوب لهذا الدرس.',
            no_file: 'لا يوجد مستند لهذا الدرس.',
            support: 'مرجع الدرس (PDF)',
            support_sub: 'للاطلاع أو التحميل',
            open_pdf: 'فتح الملف',
            text_lesson: 'درس للقراءة: اطّلع على المحتوى أدناه.',
            evaluation: 'التقييم',
            test: 'اختبر معلوماتك',
            start_quiz: 'ابدأ الاختبار',
            no_quiz: 'لا توجد اختبارات حالياً.',
            plan: 'خطة الدورة',
            video: 'فيديو',
            reading: 'قراءة',
            motto: 'تعلّم، تطوّر وحقّق أهدافك',
            advice: 'خصص وقتاً يومياً للتعلم، شاهد الدروس بتركيز، وراجع المعلومات قبل اجتياز الاختبارات.',
            back_full: 'العودة إلى فضائي',
            no_lesson: 'لا توجد دروس متاحة',
            no_lesson_sub: 'ستظهر الدروس هنا بمجرد إضافتها.'
        }
    };

    let lang = 'fr';
    let current = 0;
    let done = [];

    function save(key, value) {
        try {
            localStorage.setItem(STORE + key, JSON.stringify(value));
        } catch (error) {}
    }

    function load(key, defaultValue) {
        try {
            const value = localStorage.getItem(STORE + key);
            return value ? JSON.parse(value) : defaultValue;
        } catch (error) {
            return defaultValue;
        }
    }

    function setLang(language) {
        lang = language;
        save('-lang', language);

        document.documentElement.lang = language;
        document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';

        document.querySelectorAll('[data-i18n]').forEach(function (element) {
            const key = element.getAttribute('data-i18n');
            const translation = I18N[language][key];

            if (translation) {
                element.textContent = translation;
            }
        });

        document.getElementById('lang-fr').className =
            'px-3 py-1.5 rounded-lg ' +
            (language === 'fr' ? 'bg-emerald-400 text-white' : 'text-emerald-700');

        document.getElementById('lang-ar').className =
            'px-3 py-1.5 rounded-lg ' +
            (language === 'ar' ? 'bg-emerald-400 text-white' : 'text-emerald-700');

        refreshDone();
    }

    function refreshDone() {
        const percentage = TOTAL
            ? Math.round(done.length / TOTAL * 100)
            : 0;

        document.getElementById('done-count').textContent = done.length;
        document.getElementById('progress-fill').style.width = percentage + '%';

        document.querySelectorAll('.lesson-item').forEach(function (button) {
            const index = parseInt(button.getAttribute('data-go'), 10);
            const isDone = done.indexOf(index) !== -1;

            button.classList.toggle('done', isDone);
            button.querySelector('.check-icon').classList.toggle('hidden', !isDone);
        });

        document.querySelectorAll('.mark-done').forEach(function (button) {
            const index = parseInt(button.getAttribute('data-index'), 10);
            const isDone = done.indexOf(index) !== -1;

            button.classList.toggle('bg-emerald-400', isDone);
            button.classList.toggle('text-white', isDone);

            button.querySelector('.done-label').textContent =
                isDone ? I18N[lang].marked : I18N[lang].mark;
        });
    }

    function go(index, shouldScroll) {
        if (index < 0 || index >= TOTAL) {
            return;
        }

        document.querySelectorAll('video').forEach(function (video) {
            video.pause();
        });

        current = index;
        save('-current', index);

        document.querySelectorAll('.panel').forEach(function (panel) {
            panel.classList.toggle(
                'show',
                parseInt(panel.getAttribute('data-panel'), 10) === index
            );
        });

        document.querySelectorAll('.lesson-item').forEach(function (button) {
            button.classList.toggle(
                'active',
                parseInt(button.getAttribute('data-go'), 10) === index
            );
        });

        if (shouldScroll) {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {

        if (window.lucide) {
            lucide.createIcons();
        }

        if (!TOTAL) {
            setLang(load('-lang', 'fr'));
            return;
        }

        done = load('-done', []);

        document.querySelectorAll('[data-go]').forEach(function (button) {
            button.addEventListener('click', function () {
                go(parseInt(button.getAttribute('data-go'), 10), true);
            });
        });

        document.querySelectorAll('.nav-prev').forEach(function (button) {
            button.addEventListener('click', function () {
                go(current - 1, true);
            });
        });

        document.querySelectorAll('.nav-next').forEach(function (button) {
            button.addEventListener('click', function () {
                go(current + 1, true);
            });
        });

        document.querySelectorAll('.mark-done').forEach(function (button) {
            button.addEventListener('click', function () {
                const index = parseInt(button.getAttribute('data-index'), 10);
                const position = done.indexOf(index);

                if (position > -1) {
                    done.splice(position, 1);
                } else {
                    done.push(index);
                }

                save('-done', done);
                refreshDone();
            });
        });

        document.querySelectorAll('.panel').forEach(function (panel) {

            const tabs = panel.querySelectorAll('.tab-btn');

            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {

                    tabs.forEach(function (item) {
                        item.classList.remove('on');
                    });

                    tab.classList.add('on');

                    panel.querySelectorAll('[data-tabpane]').forEach(function (pane) {
                        pane.classList.toggle(
                            'hidden',
                            pane.getAttribute('data-tabpane') !== tab.getAttribute('data-tab')
                        );
                    });
                });
            });

            // Chaque vidéo possède ses propres boutons de vitesse
            panel.querySelectorAll('.player').forEach(function (player) {

                const video = player.querySelector('video');

                player.querySelectorAll('.speed-btn').forEach(function (button) {
                    button.addEventListener('click', function () {

                        if (video) {
                            video.playbackRate = parseFloat(
                                button.getAttribute('data-speed')
                            );
                        }

                        player.querySelectorAll('.speed-btn').forEach(function (item) {
                            item.classList.remove('on');
                        });

                        button.classList.add('on');
                    });
                });
            });
        });

        document.getElementById('lang-fr').addEventListener('click', function () {
            setLang('fr');
        });

        document.getElementById('lang-ar').addEventListener('click', function () {
            setLang('ar');
        });

        setLang(load('-lang', 'fr'));

        const savedLesson = load('-current', 0);

        go(savedLesson < TOTAL ? savedLesson : 0, false);
    });
</script>

</body>
</html>
