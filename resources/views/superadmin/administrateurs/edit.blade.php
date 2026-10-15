
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un administrateur | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #064e3b;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #d1fae5;
            border-radius: 10px;
            transition: 0.2s;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #10b981;
            color: white;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            background: white;
        }

        .form-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .layout {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="layout flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="sidebar p-5 text-white">
        <div class="mb-10">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-emerald-700">
                    <i data-lucide="graduation-cap"></i>
                </div>

                <div>
                    <h1 class="text-lg font-bold">ÉtudeEnLigne</h1>
                    <p class="text-xs text-emerald-200">Super Administration</p>
                </div>
            </div>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('superadmin.dashboard') }}" class="menu-link">
                <i data-lucide="layout-dashboard"></i>
                <span>Tableau de bord</span>
            </a>

            <a href="{{ route('superadmin.administrateurs.index') }}"
               class="menu-link active">
                <i data-lucide="users"></i>
                <span>Administrateurs</span>
            </a>

            <a href="{{ route('admin.registrations.index') }}" class="menu-link">
                <i data-lucide="user-check"></i>
                <span>Inscriptions</span>
            </a>

            <a href="{{ route('superadmin.dashboard') }}" class="menu-link">
                <i data-lucide="settings"></i>
                <span>Paramètres</span>
            </a>
        </nav>

        <div class="mt-10 border-t border-emerald-800 pt-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-link w-full text-left">
                    <i data-lucide="log-out"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="min-w-0 flex-1 p-5 md:p-10">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="mb-2 text-sm text-gray-500">
                    Super Admin / Administrateurs / Modifier
                </p>

                <h2 class="text-2xl font-bold text-gray-800 md:text-3xl">
                    Modifier un administrateur
                </h2>

                <p class="mt-2 text-gray-500">
                    Modifiez les informations du compte administrateur.
                </p>
            </div>

            <a href="{{ route('superadmin.administrateurs.index') }}"
               class="flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-3 font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
                Retour
            </a>
        </div>

        {{-- MESSAGES --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                <p class="mb-2 font-semibold">Veuillez corriger les erreurs suivantes :</p>
                <ul class="list-inside list-disc space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULAIRE --}}
        <div class="mx-auto max-w-3xl overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">

            <div class="border-b border-gray-100 p-6 md:p-8">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">
                        <i data-lucide="user-cog" class="h-7 w-7"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            Informations du compte
                        </h3>
                        <p class="text-sm text-gray-500">
                            Les champs marqués d'un * sont obligatoires.
                        </p>
                    </div>
                </div>
            </div>

            <form method="POST"
                  action="{{ route('superadmin.administrateurs.update', $administrateur->id) }}"
                  class="space-y-6 p-6 md:p-8">

                @csrf
                @method('PUT')

                {{-- NOM --}}
                <div>
                    <label for="name" class="mb-2 block font-semibold text-gray-700">
                        Nom complet *
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input"
                        value="{{ old('name', $administrateur->name) }}"
                        placeholder="Entrez le nom complet"
                        required
                    >
                </div>

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="mb-2 block font-semibold text-gray-700">
                        Adresse e-mail *
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email', $administrateur->email) }}"
                        placeholder="exemple@email.com"
                        required
                    >
                </div>

                {{-- MOT DE PASSE --}}
                <div>
                    <label for="password" class="mb-2 block font-semibold text-gray-700">
                        Nouveau mot de passe
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Laisser vide pour conserver le mot de passe actuel"
                        autocomplete="new-password"
                    >

                    <p class="mt-2 text-sm text-gray-500">
                        Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe.
                    </p>
                </div>

                {{-- CONFIRMATION MOT DE PASSE --}}
                <div>
                    <label for="password_confirmation"
                           class="mb-2 block font-semibold text-gray-700">
                        Confirmer le nouveau mot de passe
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Confirmez le nouveau mot de passe"
                        autocomplete="new-password"
                    >
                </div>

                {{-- ACTIONS --}}
                <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end">

                    <a href="{{ route('superadmin.administrateurs.index') }}"
                       class="flex items-center justify-center gap-2 rounded-xl border border-gray-200 px-5 py-3 font-semibold text-gray-600 transition hover:bg-gray-50">
                        Annuler
                    </a>

                    <button type="submit"
                            class="flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                        <i data-lucide="save" class="h-5 w-5"></i>
                        Enregistrer les modifications
                    </button>
                </div>

            </form>
        </div>

        <p class="mt-6 text-center text-sm text-gray-400">
            © {{ date('Y') }} ÉtudeEnLigne — Espace Super Admin
        </p>

    </main>
</div>

<script>
    lucide.createIcons();
</script>
</body>
</html>
