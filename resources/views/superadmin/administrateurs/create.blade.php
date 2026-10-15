
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un administrateur | ÉtudeEnLigne</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

<div class="max-w-3xl mx-auto px-5 py-10">

    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="text-emerald-600 font-semibold text-sm">
        ← Retour aux administrateurs
    </a>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 md:p-8 mt-5 shadow-sm">

        <h1 class="text-2xl font-extrabold mb-2">
            Ajouter un administrateur
        </h1>

        <p class="text-sm text-gray-500 mb-7">
            Créez un compte administrateur pour gérer la plateforme.
        </p>

        @if ($errors->any())
            <div class="bg-red-50 text-red-700 rounded-xl p-4 mb-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superadmin.administrateurs.store') }}"
              method="POST"
              class="space-y-5">

            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold mb-2">
                    Nom complet
                </label>
                <input id="name" name="name" type="text"
                       value="{{ old('name') }}" required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-2">
                    Adresse e-mail
                </label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}" required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-2">
                    Mot de passe
                </label>
                <input id="password" name="password" type="password"
                       required minlength="8"
                       autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
                <p class="text-xs text-gray-400 mt-2">
                    8 caractères minimum.
                </p>
            </div>

            <div>
                <label for="password_confirmation"
                       class="block text-sm font-semibold mb-2">
                    Confirmer le mot de passe
                </label>
                <input id="password_confirmation"
                       name="password_confirmation"
                       type="password" required minlength="8"
                       autocomplete="new-password"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-3">
                <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl px-6 py-3">
                    Créer l'administrateur
                </button>

                <a href="{{ route('superadmin.administrateurs.index') }}"
                   class="text-center bg-gray-100 hover:bg-gray-200 font-semibold rounded-xl px-6 py-3">
                    Annuler
                </a>
            </div>

        </form>
    </div>
</div>

</body>
</html>
