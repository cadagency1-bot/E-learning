<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un administrateur | ÉtudeEnLigne</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #031f17;
            --surface: #0a3427;
            --surface-2: #0f4535;
            --border: #14604a;
            --text: #ecfdf5;
            --muted: #8fc7b2;
            --faint: #5fa38b;
            --brand: #34d399;
            --brand-dark: #10b981;
            --radius: 18px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            background: linear-gradient(160deg, #021710 0%, #05301f 45%, #0a4a36 100%) fixed;
            color: var(--text);
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #06382b 0%, #021c14 100%);
            border-inline-end: 1px solid var(--border);
            position: fixed;
            inset-block: 0;
            inset-inline-start: 0;
            z-index: 40;
            padding: 22px 14px 96px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar::-webkit-scrollbar { width: 0; }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 2px 6px 20px;
            margin-bottom: 18px;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
        }

        .brand-text { flex: 1; min-width: 0; }

        .logo-crop {
            position: relative;
            overflow: hidden;
            background: #f7f7f7;
            border-radius: 12px;
        }

        .logo-crop img { display: block; max-width: none; }

        .logo-full { width: 100%; max-width: 190px; aspect-ratio: 950 / 400; }
        .logo-full img { width: 105.263%; margin-left: -2.632%; margin-top: -31.579%; }

        .logo-mark { display: none; width: 44px; aspect-ratio: 415 / 400; flex-shrink: 0; }
        .logo-mark img { width: 240.964%; margin-left: -6.024%; margin-top: -72.289%; }

        .nav-label { font-size: 11px; color: var(--faint); font-weight: 600; padding: 0 12px; margin-bottom: 8px; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            margin-bottom: 6px;
            border-radius: 12px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background .18s ease, color .18s ease;
        }

        .nav-link svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-link:hover { background: var(--surface-2); color: var(--text); }
        .nav-link.active { background: #ffffff; color: #052e22; }

        .sidebar-user {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 14px;
            background: #021c14;
            border-top: 1px solid var(--border);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: linear-gradient(135deg, #4ade80, #16a34a);
            color: #052e16;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* ---------- LAYOUT ---------- */
        .main-content { margin-inline-start: 250px; min-height: 100vh; }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(3, 31, 23, .82);
            backdrop-filter: saturate(160%) blur(12px);
            -webkit-backdrop-filter: saturate(160%) blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .page-content { max-width: 1440px; margin: 0 auto; }

        /* ---------- CARTES / FORMULAIRE ---------- */
        .card {
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            min-width: 0;
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
            padding: 12px 22px;
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
            gap: 8px;
            padding: 12px 20px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: transparent;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: background .15s ease, color .15s ease;
        }

        .btn-ghost:hover { background: var(--surface-2); color: var(--text); }

        .alert { border-radius: 14px; padding: 14px 16px; margin-bottom: 20px; font-size: 13.5px; }
        .alert-success { background: rgba(52, 211, 153, .14); border: 1px solid rgba(52, 211, 153, .4); color: #6ee7b7; }
        .alert-error { background: rgba(244, 63, 94, .13); border: 1px solid rgba(244, 63, 94, .4); color: #fda4af; }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1023px) {
            .sidebar { width: 72px; padding: 20px 10px 96px; }
            .sidebar .brand-text, .sidebar .nav-text, .sidebar .nav-label, .sidebar .sidebar-bottom-text { display: none; }
            .brand-link { justify-content: center; padding: 2px 0 18px; }
            .logo-mark { display: block; }
            .sidebar .nav-link { justify-content: center; padding: 12px 8px; }
            .sidebar-user { padding: 12px 8px; }
            .sidebar-user > div { justify-content: center; }
            .main-content { margin-inline-start: 72px; }
        }

        @media (max-width: 640px) {
            .sidebar { display: none; }
            .main-content { margin-inline-start: 0; }
            .page-content { padding: 16px !important; }
        }
    </style>
</head>

<body>

{{-- SIDEBAR --}}
<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}" class="brand-link">
        <div class="brand-text">
            <div class="logo-crop logo-full">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy">
            </div>
            <div class="text-[11px] mt-2.5 px-0.5" style="color: var(--muted);">Super Administration</div>
        </div>

        <div class="logo-crop logo-mark">
            <img src="{{ asset('images/cad-academy-logo.png') }}" alt="CAD Academy">
        </div>
    </a>

    <div class="nav-label">Menu principal</div>

    <a href="{{ route('superadmin.dashboard') }}" class="nav-link">
        <i data-lucide="layout-dashboard"></i>
        <span class="nav-text">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}" class="nav-link active">
        <i data-lucide="shield-check"></i>
        <span class="nav-text">Administrateurs</span>
    </a>

    <a href="{{ route('superadmin.inscriptions.index') }}" class="nav-link">
        <i data-lucide="users"></i>
        <span class="nav-text">Inscriptions</span>
    </a>

    <div class="nav-label" style="margin-top: 26px;">Compte</div>

    <a href="{{ route('profile.edit') }}" class="nav-link">
        <i data-lucide="settings"></i>
        <span class="nav-text">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link w-full text-start bg-transparent border-0 cursor-pointer">
            <i data-lucide="log-out"></i>
            <span class="nav-text">Déconnexion</span>
        </button>
    </form>

    <div class="sidebar-user">
        <div class="flex items-center gap-3">
            <div class="avatar !w-9 !h-9 !rounded-xl text-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0 sidebar-bottom-text">
                <p class="text-xs font-semibold truncate" style="color: var(--text);">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>
                <p class="text-[11px]" style="color: var(--muted);">Super Administrateur</p>
            </div>
        </div>
    </div>

</aside>

{{-- CONTENU --}}
<div class="main-content">

    <header class="topbar px-5 md:px-8 py-4 flex items-center justify-between gap-4">
        <div class="min-w-0">
            <p class="text-xs mb-0.5" style="color: var(--muted);">
                Super Admin / Administrateurs / Modifier
            </p>
            <h1 class="text-xl font-extrabold tracking-tight truncate">Modifier un administrateur</h1>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.administrateurs.index') }}" class="btn-ghost">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Retour
            </a>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>
        </div>
    </header>

    <main class="page-content p-5 md:p-8">

        <p class="mb-6 text-sm" style="color: var(--muted);">
            Modifiez les informations du compte administrateur.
        </p>

        {{-- MESSAGES --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <p class="mb-2 font-bold">Veuillez corriger les erreurs suivantes :</p>
                <ul class="list-inside list-disc space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULAIRE --}}
        <div class="card mx-auto max-w-3xl overflow-hidden">

            <div class="p-6 md:p-8" style="border-bottom: 1px solid var(--border);">
                <div class="flex items-center gap-4">
                    <div class="icon-box">
                        <i data-lucide="user-cog" class="w-6 h-6"></i>
                    </div>

                    <div>
                        <h3 class="text-base font-extrabold">Informations du compte</h3>
                        <p class="text-sm" style="color: var(--muted);">
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

                <div>
                    <label for="name" class="form-label">Nom complet *</label>
                    <input type="text" id="name" name="name" class="form-input"
                           value="{{ old('name', $administrateur->name) }}"
                           placeholder="Entrez le nom complet" required>
                </div>

                <div>
                    <label for="email" class="form-label">Adresse e-mail *</label>
                    <input type="email" id="email" name="email" class="form-input"
                           value="{{ old('email', $administrateur->email) }}"
                           placeholder="exemple@email.com" required>
                </div>

                <div>
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input type="password" id="password" name="password" class="form-input"
                           placeholder="Laisser vide pour conserver le mot de passe actuel"
                           autocomplete="new-password">
                    <p class="hint">Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe.</p>
                </div>

                <div>
                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-input" placeholder="Confirmez le nouveau mot de passe"
                           autocomplete="new-password">
                </div>

                <div class="flex flex-col-reverse gap-3 pt-6 sm:flex-row sm:justify-end"
                     style="border-top: 1px solid var(--border);">

                    <a href="{{ route('superadmin.administrateurs.index') }}" class="btn-ghost">
                        Annuler
                    </a>

                    <button type="submit" class="btn-primary">
                        <i data-lucide="save" class="w-5 h-5"></i>
                        Enregistrer les modifications
                    </button>
                </div>

            </form>
        </div>

        <p class="mt-8 text-center text-xs" style="color: var(--faint);">
            © {{ date('Y') }} ÉtudeEnLigne — Espace Super Admin
        </p>

    </main>
</div>

<script>
    lucide.createIcons();
</script>
</body>
</html>