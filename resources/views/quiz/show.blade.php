<!DOCTYPE html>

<html lang="fr">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>{{ $quiz->title }} | ÉtudeEnLigne</title>



    <script src="https://cdn.tailwindcss.com"></script>



    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        mint: {

                            50: '#f3fbf5',

                            100: '#e6f6ea',

                            200: '#cfeed8',

                            300: '#a8e0b8',

                            400: '#6fcb8d',

                            500: '#3fb868',

                            600: '#2a9a52',

                            700: '#217a43',

                            800: '#1c5f38',

                            900: '#16432b',

                        },

                    },

                    fontFamily: {

                        jakarta: ['Plus Jakarta Sans', 'Tajawal', 'sans-serif'],

                    }

                }

            }

        }

    </script>



    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link

        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap"

        rel="stylesheet">



    <link rel="stylesheet"

          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">



    <style>

        :root {

            --bg: #eaf7ee;

            --ink: #16432b;

            --leaf: #3fb868;

            --leaf-dark: #217a43;

            --leaf-soft: #e6f6ea;

            --line: #d3ecda;

        }



        body {

            font-family: 'Plus Jakarta Sans', 'Tajawal', sans-serif;

            background-color: var(--bg);

            background-image:

                radial-gradient(900px 400px at 10% -5%, #d6f1de 0%, transparent 60%),

                radial-gradient(700px 400px at 100% 0%, #dff5e5 0%, transparent 55%);

            background-attachment: fixed;

            color: var(--ink);

        }



        /\* Options \*/

        .option-label .option-content {

            transition: border-color .18s ease, background-color .18s ease, box-shadow .18s ease;

        }



        .option-label:hover .option-content {

            border-color: var(--leaf);

            background-color: #f3fbf5;

        }



        .option-label .option-letter,

        .option-label .option-check {

            transition: background-color .18s ease, color .18s ease, opacity .18s ease, transform .18s ease;

        }



        .option-label .option-check {

            opacity: 0;

            transform: scale(.6);

        }



        input[type="radio"]:checked + .option-content {

            border-color: var(--leaf);

            background-color: var(--leaf-soft);

            box-shadow: 0 0 0 3px rgba(63, 184, 104, .18);

        }



        input[type="radio"]:checked + .option-content .option-letter {

            background-color: var(--leaf);

            color: #fff;

        }



        input[type="radio"]:checked + .option-content .option-check {

            opacity: 1;

            transform: scale(1);

        }



        input[type="radio"]:focus-visible + .option-content {

            outline: 3px solid var(--leaf-dark);

            outline-offset: 2px;

        }



        /\* Barre de progression \*/

        #progress-bar {

            transition: width .3s ease;

        }



        @media (prefers-reduced-motion: reduce) {

            \* {

                transition: none !important;

            }

        }



        /* Mise en page plus compacte et professionnelle */
        main.max-w-4xl {
            max-width: 790px !important;
            padding-top: 24px !important;
            padding-bottom: 24px !important;
        }
        nav .h-16 { height: 56px !important; }
        nav .w-9.h-9 { width: 34px !important; height: 34px !important; }
        main .mb-8 { margin-bottom: 18px !important; }
        main .rounded-3xl { border-radius: 18px !important; }
        main .px-6.py-8 { padding: 20px 24px !important; }
        main .px-6.sm\:px-8.py-5 { padding: 14px 24px !important; }
        main .p-6.sm\:p-7 { padding: 18px !important; }
        main .mb-5 { margin-bottom: 12px !important; }
        main .space-y-3 > :not([hidden]) ~ :not([hidden]) { margin-top: 8px !important; }
        main .option-content { padding: 9px 12px !important; border-radius: 12px !important; }
        main .option-letter { width: 28px !important; height: 28px !important; }
        main h1 { font-size: clamp(1.25rem, 2.4vw, 1.75rem) !important; }
        main h2 { font-size: 1rem !important; }
        main .text-sm { line-height: 1.5 !important; }
        main .p-6.mt-6 { padding: 16px !important; margin-top: 14px !important; }
        footer { margin-top: 22px !important; }
        @media (max-width: 640px) {
            main.max-w-4xl { padding: 16px 12px !important; }
            main .px-6.py-8 { padding: 18px 16px !important; }
            main .px-6.sm\:px-8.py-5 { padding: 14px 16px !important; }
            main .p-6.sm\:p-7 { padding: 15px !important; }
            nav .max-w-6xl { padding-left: 12px !important; padding-right: 12px !important; }
        }

    </style>

</head>



<body class="min-h-screen">



    <!-- NAVBAR -->

    <nav class="bg-white/80 backdrop-blur border-b border-mint-200 sticky top-0 z-50">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-16 flex items-center justify-between">



                <!-- Logo -->

                <a href="{{ route('dashboard') }}"

                   class="flex items-center gap-2">

                    <div class="w-9 h-9 rounded-xl bg-mint-500

                                flex items-center justify-center text-white shadow-sm">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>



                    <div>

                        <div class="font-extrabold text-mint-900">

                            Étude<span class="text-mint-500">EnLigne</span>

                        </div>

                        <div class="text-[10px] text-mint-700/60">

                            Plateforme d'apprentissage

                        </div>

                    </div>

                </a>



                <!-- Retour -->

                <a href="{{ route('dashboard') }}"

                   class="inline-flex items-center gap-2 px-4 py-2

                          rounded-full border border-mint-200 bg-white

                          text-mint-800 hover:bg-mint-100

                          hover:border-mint-300

                          transition text-sm font-medium">



                    <i class="fa-solid fa-arrow-left text-xs"></i>



                    <span>

                        Retour

                        <span class="text-mint-500 mx-1">/</span>

                        رجوع

                    </span>

                </a>



            </div>

        </div>



        @if($quiz->questions->count() > 0)

            <!-- PROGRESSION -->

            <div class="h-1 bg-mint-100">

                <div id="progress-bar" class="h-1 bg-mint-500" style="width: 0%"></div>

            </div>

        @endif

    </nav>





    <!-- MAIN -->

    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-10">



        <!-- HEADER QUIZ -->

        <div class="rounded-3xl overflow-hidden mb-8 shadow-sm

                    border border-mint-200 bg-white">



            <div class="bg-gradient-to-br from-mint-700 to-mint-500

                        px-6 sm:px-8 py-8 text-white">



                <div class="flex items-start gap-4">



                    <div class="w-12 h-12 rounded-2xl bg-white/20

                                flex items-center justify-center

                                shrink-0">



                        <i class="fa-solid fa-circle-question text-xl"></i>

                    </div>



                    <div class="flex-1">



                        <div class="text-sm font-semibold text-mint-100 mb-1">

                            Quiz

                            <span class="mx-1 opacity-60">/</span>

                            اختبار

                        </div>



                        <h1 class="text-2xl sm:text-3xl font-extrabold leading-tight">

                            {{ $quiz->title }}

                        </h1>



                        @if($quiz->formation)

                            <p class="text-sm text-mint-50/90 mt-3">

                                Formation :

                                <span class="font-semibold text-white">

                                    {{ $quiz->formation->name }}

                                </span>



                                <span class="mx-1 opacity-60">/</span>



                                التكوين :

                                <span class="font-semibold text-white">

                                    {{ $quiz->formation->name }}

                                </span>

                            </p>

                        @endif

                    </div>

                </div>

            </div>



            <div class="px-6 sm:px-8 py-5">



                @if($quiz->description)

                    <p class="text-mint-900/80 text-sm leading-6">

                        {{ $quiz->description }}

                    </p>

                @endif



                <div class="flex flex-wrap gap-3 {{ $quiz->description ? 'mt-4' : '' }}">



                    <div class="inline-flex items-center gap-2

                                bg-mint-50 border border-mint-200 px-3 py-2 rounded-full

                                text-sm text-mint-800">



                        <i class="fa-solid fa-list-check text-mint-500"></i>



                        {{ $quiz->questions->count() }}

                        questions



                        <span class="text-mint-500">/</span>



                        سؤال

                    </div>



                    <div class="inline-flex items-center gap-2

                                bg-mint-100 px-3 py-2 rounded-full

                                text-sm text-mint-800">



                        <i class="fa-solid fa-pen-to-square"></i>



                        Quiz

                        <span>/</span>

                        اختبار

                    </div>



                </div>



            </div>

        </div>





        <!-- FORMULAIRE -->

        <form action="{{ route('quiz.submit', $quiz) }}"

              method="POST"

              id="quiz-form">



            @csrf



            @forelse($quiz->questions as $index => $question)



                <div class="bg-white rounded-3xl border border-mint-200

                            shadow-sm p-6 sm:p-7 mb-5">



                    <!-- QUESTION HEADER -->

                    <div class="flex items-start gap-4 mb-5">



                        <div class="w-10 h-10 rounded-full bg-mint-100

                                    text-mint-700 flex items-center

                                    justify-center font-extrabold shrink-0">



                            {{ $index + 1 }}

                        </div>



                        <div class="flex-1">



                            <div class="text-xs text-mint-700/60 mb-1">

                                Question {{ $index + 1 }}

                                <span class="text-mint-500 mx-1">/</span>

                                السؤال {{ $index + 1 }}

                            </div>



                            <h2 class="text-lg font-bold text-mint-900 leading-snug">

                                {{ $question->question }}

                            </h2>



                        </div>

                    </div>





                    <!-- OPTIONS -->

                    <div class="space-y-3">



                        @foreach($question->options as $option)



                            <label class="option-label block cursor-pointer">



                                <input

                                    type="radio"

                                    name="answers[{{ $question->id }}]"

                                    value="{{ $option->id }}"

                                    class="sr-only"

                                >



                                <div class="option-content flex items-center gap-3

                                            border border-mint-200 bg-white rounded-2xl

                                            px-4 py-3">



                                    <div class="option-letter w-8 h-8 rounded-full

                                                bg-mint-100 text-mint-700

                                                flex items-center justify-center

                                                font-bold text-sm shrink-0">



                                        {{ chr(65 + $loop->index) }}



                                    </div>



                                    <span class="flex-1 text-sm font-medium text-mint-900">

                                        {{ $option->option }}

                                    </span>



                                    <i class="option-check fa-solid fa-circle-check text-mint-500 text-lg"></i>



                                </div>



                            </label>



                        @endforeach



                    </div>



                </div>



            @empty



                <!-- NO QUESTIONS -->

                <div class="bg-white rounded-3xl border border-mint-200

                            shadow-sm p-10 text-center">



                    <div class="w-16 h-16 mx-auto rounded-full

                                bg-amber-50 text-amber-500

                                flex items-center justify-center mb-4">



                        <i class="fa-solid fa-circle-exclamation text-2xl"></i>



                    </div>



                    <h2 class="text-lg font-bold text-mint-900">

                        Aucune question

                        <span class="text-mint-500">/</span>

                        لا توجد أسئلة

                    </h2>



                    <p class="text-sm text-mint-800/70 mt-2">

                        Ce quiz ne contient pas encore de questions.

                        <br>

                        هذا الاختبار لا يحتوي على أسئلة بعد.

                    </p>



                    <a href="{{ route('dashboard') }}"

                       class="inline-flex items-center gap-2 mt-6

                              px-5 py-2.5 rounded-full

                              bg-mint-500 text-white

                              hover:bg-mint-600 transition

                              text-sm font-semibold">



                        <i class="fa-solid fa-arrow-left"></i>



                        Retour

                        <span class="opacity-70">/</span>

                        رجوع



                    </a>



                </div>



            @endforelse





            @if($quiz->questions->count() > 0)



                <!-- SUBMIT -->

                <div class="bg-white rounded-3xl border border-mint-200

                            shadow-sm p-6 mt-6">



                    <div class="flex flex-col sm:flex-row

                                items-center justify-between gap-4">



                        <div class="text-center sm:text-left">



                            <p class="font-semibold text-mint-900">

                                Vous avez terminé ?

                                <span class="text-mint-500 mx-1">/</span>

                                انتهيت؟

                            </p>



                            <p class="text-xs text-mint-800/70 mt-1">

                                Vérifiez vos réponses avant de terminer.

                                <br>

                                تأكد من إجاباتك قبل إنهاء الاختبار.

                            </p>



                            <p class="text-xs font-semibold text-mint-700 mt-2">

                                <span id="answered-count">0</span> / {{ $quiz->questions->count() }}

                                réponses

                                <span class="text-mint-500 mx-1">/</span>

                                إجابات

                            </p>



                        </div>



                        <button type="submit"

                                class="inline-flex items-center justify-center

                                       gap-2 px-7 py-3 rounded-full

                                       bg-mint-500 text-white

                                       hover:bg-mint-600

                                       shadow-sm hover:shadow-md

                                       focus-visible:outline focus-visible:outline-2

                                       focus-visible:outline-offset-2

                                       focus-visible:outline-mint-700

                                       transition font-semibold">



                            <i class="fa-solid fa-check"></i>



                            Terminer le Quiz

                            <span class="opacity-80">/</span>

                            إنهاء الاختبار



                        </button>



                    </div>



                </div>



            @endif



        </form>



    </main>





    <!-- FOOTER -->

    <footer class="border-t border-mint-200 bg-white/70 mt-10">



        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6">



            <div class="text-center text-xs text-mint-700/70">



                © {{ date('Y') }} ÉtudeEnLigne



                <span class="mx-1">•</span>



                Tous droits réservés



                <span class="text-mint-500 mx-1">/</span>



                جميع الحقوق محفوظة



            </div>



        </div>



    </footer>



    @if($quiz->questions->count() > 0)

        <script>

            (function () {

                var total = {{ $quiz->questions->count() }};

                var form = document.getElementById('quiz-form');

                var bar = document.getElementById('progress-bar');

                var counter = document.getElementById('answered-count');



                function update() {

                    var names = {};

                    form.querySelectorAll('input[type="radio"]:checked').forEach(function (r) {

                        names[r.name] = true;

                    });

                    var answered = Object.keys(names).length;

                    counter.textContent = answered;

                    bar.style.width = (answered / total \* 100) + '%';

                }



                form.addEventListener('change', update);

                update();

            })();

        </script>

    @endif



</body>



</html>