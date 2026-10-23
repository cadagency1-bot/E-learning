<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un administrateur | ÉtudeEnLigne</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --surface-2: #0f4535;
            --border: #14604a;
            --text: #ecfdf5;
            --muted: #8fc7b2;
            --faint: #5fa38b;
            --brand: #34d399;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            background: linear-gradient(160deg, #021710 0%, #05301f 45%, #0a4a36 100%) fixed;
            color: var(--text);
            margin: 0;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        .card {
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 20px 40px -20px rgba(0, 0, 0, .6);
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(52, 211, 153, .15);
            color: var(--brand);
            flex-shrink: 0;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            outline: none;
            background: rgba(2, 23, 16, .55);
            color: var(--text);
            font-family: inherit;
            font-size: 14px;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .form-input::placeholder { color: var(--faint); }

        .form-input:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(52, 211, 153, .18);
        }

        .hint { margin-top: 8px; font-size: 12px; color: var(--muted); }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #052e22;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: filter .15s ease, transform .15s ease;
        }

        .btn-primary:hover { filter: brightness(1.08); transform: translateY(-1px); }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: background .15s ease, color .15s ease;
        }

        .btn-ghost:hover { background: var(--surface-2); color: var(--text); }

        .alert-error {
            background: rgba(244, 63, 94, .13);
            border: 1px solid rgba(244, 63, 94, .4);
            color: #fda4af;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 20px;
            font-size: 13.5px;
        }
    </style>
</head>

<body>

<div class="max-w-3xl mx-auto px-5 py-10">

    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="inline-flex items-center gap-2 text-sm font-bold"
       style="color: var(--brand); text-decoration: none;">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Retour aux administrateurs
    </a>

    <div class="card p-6 md:p-8 mt-5">

        <div class="flex items-center gap-4 mb-7">
            <div class="icon-box">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>

            <div>
                <h1 class="text-2xl font-extrabold">Ajouter un administrateur</h1>
                <p class="text-sm mt-1" style="color: var(--muted);">
                    Créez un compte administrateur pour gérer la plateforme.
                </p>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <ul class="list-disc pl-5 space-y-1">
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
                <label for="name" class="form-label">Nom complet</label>
                <input id="name" name="name" type="text"
                       value="{{ old('name') }}" required class="form-input">
            </div>

            <div>
                <label for="email" class="form-label">Adresse e-mail</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}" required class="form-input">
            </div>

            <div>
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" name="password" type="password"
                       required minlength="8" autocomplete="new-password"
                       class="form-input">
                <p class="hint">8 caractères minimum.</p>
            </div>

            <div>
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation"
                       type="password" required minlength="8"
                       autocomplete="new-password" class="form-input">
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-3">
                <button type="submit" class="btn-primary">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    Créer l'administrateur
                </button>

                <a href="{{ route('superadmin.administrateurs.index') }}" class="btn-ghost">
                    Annuler
                </a>
            </div>

        </form>
    </div>

    <p class="mt-8 text-center text-xs" style="color: var(--faint);">
        © {{ date('Y') }} ÉtudeEnLigne — Espace Super Admin
    </p>
</div>

<script>
    lucide.createIcons();
</script>
</body>
</html>