<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Ajouter un Quiz / إضافة اختبار | ÉtudeEnLigne</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body class="bg-gray-100">


<div class="min-h-screen py-6">

    <div class="max-w-2xl mx-auto px-4">

        {{-- RETOUR DASHBOARD --}}
        <div class="mb-4">

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 px-3 py-2 rounded-lg
                      border border-gray-200 bg-white text-gray-600
                      hover:bg-emerald-50 hover:text-emerald-600
                      hover:border-emerald-200 transition-all duration-200
                      font-medium text-sm">

                <i class="fa-solid fa-arrow-left text-xs"></i>

                <span>
                    Retour
                    <span class="text-emerald-500 mx-1">/</span>
                    رجوع
                </span>

            </a>

        </div>


        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            {{-- TITRE --}}
            <div class="mb-6">

                <h1 class="text-xl font-bold text-gray-800">

                    Ajouter un Quiz

                    <span class="text-emerald-500 mx-1">/</span>

                    إضافة اختبار

                </h1>

                <p class="text-sm text-gray-500 mt-1">

                    Créez un nouveau quiz pour une formation.

                    <span class="block mt-1 text-gray-400" dir="rtl">
                        أنشئ اختبارًا جديدًا خاصًا بأحد التكوينات.
                    </span>

                </p>

            </div>


            {{-- FORM --}}
            <form action="{{ route('admin.quiz.store') }}"
                  method="POST">

                @csrf


                {{-- FORMATION --}}
                <div class="mb-4">

                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">

                        Formation

                        <span class="text-emerald-500 mx-1">/</span>

                        التكوين

                    </label>

                    <select name="formation_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2.5
                                   text-sm bg-white
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500
                                   focus:border-emerald-500">

                        <option value="">
                            -- Choisir une formation / اختر التكوين --
                        </option>

                        @foreach($formations as $formation)

                            <option value="{{ $formation->id }}"
                                {{ old('formation_id') == $formation->id ? 'selected' : '' }}>

                                {{ $formation->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('formation_id')

                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- TITRE --}}
                <div class="mb-4">

                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">

                        Titre du Quiz

                        <span class="text-emerald-500 mx-1">/</span>

                        عنوان الاختبار

                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Exemple : Quiz HTML débutant / مثال: اختبار HTML للمبتدئين"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5
                                  text-sm
                                  focus:outline-none focus:ring-2 focus:ring-emerald-500
                                  focus:border-emerald-500">

                    @error('title')

                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- DESCRIPTION --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">

                        Description

                        <span class="text-emerald-500 mx-1">/</span>

                        الوصف

                    </label>

                    <textarea name="description"
                              rows="3"
                              placeholder="Description du quiz / اكتب وصف الاختبار..."
                              class="w-full border border-gray-300 rounded-lg px-3 py-2.5
                                     text-sm
                                     focus:outline-none focus:ring-2 focus:ring-emerald-500
                                     focus:border-emerald-500">{{ old('description') }}</textarea>

                </div>


                {{-- BOUTONS --}}
                <div class="flex items-center justify-end gap-2">

                    <a href="{{ route('admin.quiz.index') }}"
                       class="px-4 py-2.5 rounded-lg
                              border border-gray-300
                              text-gray-600 text-sm font-medium
                              hover:bg-gray-50 transition">

                        Annuler
                        <span class="text-emerald-500 mx-1">/</span>
                        إلغاء

                    </a>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-lg
                                   bg-emerald-500 hover:bg-emerald-600
                                   text-white text-sm font-semibold
                                   transition shadow-sm">

                        <i class="fa-solid fa-plus text-xs mr-1"></i>

                        Créer le Quiz
                        <span class="mx-1">/</span>
                        إنشاء الاختبار

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


</body>
</html>
