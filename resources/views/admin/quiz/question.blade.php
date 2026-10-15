
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter une question / إضافة سؤال | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen py-6">

    <div class="max-w-2xl mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-sm p-6">

            {{-- QUIZ --}}
            <div class="mb-5">

                <p class="text-emerald-600 text-sm font-semibold">
                    {{ $quiz->title }}
                </p>

                <h1 class="text-xl font-bold text-gray-800 mt-1">

                    Ajouter une question
                    <span class="text-emerald-500">/</span>
                    إضافة سؤال

                </h1>

            </div>


            <form action="{{ route('admin.quiz.question.store', $quiz) }}"
                  method="POST">

                @csrf


                {{-- QUESTION --}}
                <div class="mb-5">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">

                        Question
                        <span class="text-emerald-500">/</span>
                        السؤال

                    </label>

                    <textarea
                        name="question"
                        rows="3"
                        placeholder="Écrivez votre question / اكتب سؤالك..."
                        class="w-full border border-gray-300 rounded-lg
                        px-3 py-2.5 text-sm
                        focus:outline-none focus:ring-2
                        focus:ring-emerald-500">{{ old('question') }}</textarea>

                    @error('question')

                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- OPTIONS --}}
                <div class="mb-5">

                    <label class="block text-sm font-semibold text-gray-700 mb-3">

                        Réponses
                        <span class="text-emerald-500">/</span>
                        الاختيارات

                    </label>


                    @for($i = 0; $i < 4; $i++)

                        <div class="flex items-center gap-2 mb-2.5">

                            {{-- RADIO --}}
                            <input
                                type="radio"
                                name="correct_option"
                                value="{{ $i }}"
                                class="w-4 h-4 text-emerald-500
                                focus:ring-emerald-500">


                            {{-- OPTION --}}
                            <input
                                type="text"
                                name="options[]"
                                value="{{ old('options.' . $i) }}"
                                placeholder="Réponse {{ $i + 1 }} / الاختيار {{ $i + 1 }}"
                                class="flex-1 border border-gray-300
                                rounded-lg px-3 py-2.5 text-sm
                                focus:outline-none focus:ring-2
                                focus:ring-emerald-500">

                        </div>

                    @endfor


                    <p class="text-xs text-gray-500 mt-2">

                        Sélectionnez la réponse correcte.
                        <span class="text-gray-400">
                            / اختر الإجابة الصحيحة.
                        </span>

                    </p>


                    @error('correct_option')

                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- BUTTONS --}}
                <div class="flex gap-2 pt-1">

                    <a
                        href="{{ route('admin.quiz.index') }}"
                        class="px-4 py-2.5 border border-gray-300
                        rounded-lg text-sm text-gray-700
                        hover:bg-gray-50 transition">

                        Retour
                        <span class="text-emerald-500">/</span>
                        رجوع

                    </a>


                    <button
                        type="submit"
                        class="px-4 py-2.5 bg-emerald-500
                        hover:bg-emerald-600 text-white
                        rounded-lg text-sm font-semibold
                        transition">

                        Ajouter la question
                        <span class="mx-1">/</span>
                        إضافة السؤال

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>

