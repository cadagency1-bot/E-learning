
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Quiz - Administration | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-gray-100">

<div class="min-h-screen">


    <!-- HEADER -->

    <header class="bg-white shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

            <div>

                <h1 class="text-2xl font-bold text-gray-800">

                    Gestion des Quiz
                    <span class="text-emerald-500">/</span>
                    إدارة الاختبارات

                </h1>

                <p class="text-gray-500 mt-1">

                    ÉtudeEnLigne
                    <span class="mx-1">•</span>
                    منصة ÉtudeEnLigne

                </p>

            </div>


            <!-- ACTIONS -->

            <div class="flex items-center gap-3">


                {{-- RETOUR DASHBOARD --}}

                <a href="{{ route('admin.dashboard') }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-3 rounded-xl font-semibold">

                    <i class="fa-solid fa-arrow-left mr-2"></i>

                    Retour
                    <span class="mx-1">/</span>
                    رجوع

                </a>


                {{-- AJOUTER QUIZ --}}

                <a href="{{ route('admin.quiz.create') }}"
                   class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-3 rounded-xl font-semibold">

                    <i class="fa-solid fa-plus mr-2"></i>

                    Ajouter un Quiz
                    <span class="mx-1">/</span>
                    إضافة اختبار

                </a>

            </div>

        </div>

    </header>


    <!-- CONTENT -->

    <main class="max-w-7xl mx-auto px-6 py-8">


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

                <i class="fa-solid fa-circle-check mr-2"></i>

                {{ session('success') }}

            </div>

        @endif


        {{-- QUIZZES --}}

        @if($quizzes->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                @foreach($quizzes as $quiz)

                    <div class="bg-white rounded-2xl shadow-sm p-6">


                        {{-- ICON --}}

                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4">

                            <i class="fa-solid fa-circle-question text-xl"></i>

                        </div>


                        {{-- TITLE --}}

                        <h2 class="text-xl font-bold text-gray-800">

                            {{ $quiz->title }}

                        </h2>


                        {{-- FORMATION --}}

                        <p class="text-sm text-emerald-600 font-semibold mt-2">

                            {{ $quiz->formation->name ?? 'Formation supprimée / التكوين محذوف' }}

                        </p>


                        {{-- DESCRIPTION --}}

                        @if($quiz->description)

                            <p class="text-gray-500 mt-3 line-clamp-3">

                                {{ $quiz->description }}

                            </p>

                        @endif


                        {{-- FOOTER CARD --}}

                        <div class="mt-5 flex items-center justify-between">

                            <span class="text-sm text-gray-500">

                                {{ $quiz->questions->count() }}

                                questions

                                <span class="text-emerald-500">/</span>

                                أسئلة

                            </span>


                            <a href="{{ route('admin.quiz.question.create', $quiz) }}"
                               class="text-emerald-600 hover:text-emerald-700 font-semibold">

                                Ajouter question

                                <span class="mx-1">/</span>

                                إضافة سؤال

                                <i class="fa-solid fa-arrow-right ml-1"></i>

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>


        @else


            {{-- EMPTY STATE --}}

            <div class="bg-white rounded-2xl p-12 text-center shadow-sm">


                <div class="text-gray-300 text-5xl mb-5">

                    <i class="fa-solid fa-circle-question"></i>

                </div>


                <h2 class="text-xl font-bold text-gray-700">

                    Aucun quiz pour le moment

                    <span class="text-emerald-500">/</span>

                    لا توجد اختبارات حاليًا

                </h2>


                <p class="text-gray-500 mt-2">

                    Commencez par créer votre premier quiz.

                    <span class="block mt-1">

                        ابدأ بإنشاء أول اختبار لك.

                    </span>

                </p>


                <a href="{{ route('admin.quiz.create') }}"
                   class="inline-block mt-6 bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold">

                    Créer un Quiz

                    <span class="mx-1">/</span>

                    إنشاء اختبار

                </a>

            </div>

        @endif


    </main>

</div>

</body>

</html>

