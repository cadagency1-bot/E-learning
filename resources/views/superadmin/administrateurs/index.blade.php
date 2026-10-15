<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des administrateurs | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- ============ Traductions FR / AR ============ --}}
    <script>
        const I18N = {
            fr: {
                page_title: "Gestion des administrateurs | ÉtudeEnLigne",
                brand_sub: "Super administration",
                menu_main: "Menu principal",
                nav_dashboard: "Tableau de bord",
                nav_admins: "Gestion des administrateurs",
                account: "Compte",
                settings: "Paramètres",
                logout: "Déconnexion",
                super_admin_role: "Super administrateur",
                breadcrumb: "ÉtudeEnLigne / Administration",
                page_h1: "Gestion des administrateurs",
                hello: "Bonjour,",
                subtitle: "Gérez les comptes administrateurs de votre plateforme.",
                add_admin: "Ajouter un administrateur",
                fix_errors: "Veuillez corriger les erreurs suivantes :",
                kpi_total: "Total des administrateurs",
                kpi_total_sub: "Comptes administrateurs enregistrés",
                kpi_account: "Votre compte",
                kpi_account_val: "Super Admin",
                kpi_account_sub: "Gestion globale de la plateforme",
                kpi_shown: "Résultats affichés",
                kpi_shown_sub: "Administrateurs sur cette page",
                list_title: "Liste des administrateurs",
                list_sub: "Consultez et gérez les comptes existants.",
                search_ph: "Nom ou adresse email...",
                search_aria: "Rechercher un administrateur",
                search_btn: "Rechercher",
                reset: "Réinitialiser",
                th_admin: "Administrateur",
                th_email: "Adresse email",
                th_role: "Rôle",
                th_date: "Date de création",
                th_actions: "Actions",
                id_label: "ID :",
                role_admin: "Administrateur",
                edit: "Modifier",
                del: "Supprimer",
                confirm_delete: "Voulez-vous vraiment supprimer cet administrateur ?",
                empty_title: "Aucun administrateur trouvé",
                empty_search: "Essayez un autre nom ou une autre adresse email.",
                empty_none: "Vous pouvez ajouter votre premier administrateur.",
                rights: "ÉtudeEnLigne. Tous droits réservés."
            },
            ar: {
                page_title: "إدارة المسؤولين | ÉtudeEnLigne",
                brand_sub: "الإدارة العليا",
                menu_main: "القائمة الرئيسية",
                nav_dashboard: "لوحة التحكم",
                nav_admins: "إدارة المسؤولين",
                account: "الحساب",
                settings: "الإعدادات",
                logout: "تسجيل الخروج",
                super_admin_role: "المسؤول الأعلى",
                breadcrumb: "ÉtudeEnLigne / الإدارة",
                page_h1: "إدارة المسؤولين",
                hello: "مرحبًا،",
                subtitle: "قم بإدارة حسابات المسؤولين في منصتك.",
                add_admin: "إضافة مسؤول",
                fix_errors: "يرجى تصحيح الأخطاء التالية:",
                kpi_total: "إجمالي المسؤولين",
                kpi_total_sub: "حسابات المسؤولين المسجَّلة",
                kpi_account: "حسابك",
                kpi_account_val: "المسؤول الأعلى",
                kpi_account_sub: "الإدارة الشاملة للمنصة",
                kpi_shown: "النتائج المعروضة",
                kpi_shown_sub: "المسؤولون في هذه الصفحة",
                list_title: "قائمة المسؤولين",
                list_sub: "اطّلع على الحسابات الحالية وقم بإدارتها.",
                search_ph: "الاسم أو البريد الإلكتروني...",
                search_aria: "البحث عن مسؤول",
                search_btn: "بحث",
                reset: "إعادة تعيين",
                th_admin: "المسؤول",
                th_email: "البريد الإلكتروني",
                th_role: "الدور",
                th_date: "تاريخ الإنشاء",
                th_actions: "الإجراءات",
                id_label: "المعرّف:",
                role_admin: "مسؤول",
                edit: "تعديل",
                del: "حذف",
                confirm_delete: "هل أنت متأكد من حذف هذا المسؤول؟",
                empty_title: "لم يتم العثور على أي مسؤول",
                empty_search: "جرّب اسمًا أو بريدًا إلكترونيًا آخر.",
                empty_none: "يمكنك إضافة أول مسؤول.",
                rights: "ÉtudeEnLigne. جميع الحقوق محفوظة."
            }
        };

        function getSavedLang() {
            try {
                const l = localStorage.getItem('lang');
                if (l === 'fr' || l === 'ar') return l;
            } catch (e) {}
            return 'fr';
        }

        function t(key) {
            const l = document.documentElement.lang === 'ar' ? 'ar' : 'fr';
            return (I18N[l] && I18N[l][key]) || I18N.fr[key] || key;
        }

        function applyLang(lang) {
            const html = document.documentElement;
            html.lang = lang;
            html.dir = lang === 'ar' ? 'rtl' : 'ltr';

            const dict = I18N[lang];

            document.querySelectorAll('[data-i18n]').forEach(function (el) {
                el.textContent = dict[el.dataset.i18n];
            });
            document.querySelectorAll('[data-i18n-placeholder]').forEach(function (el) {
                el.placeholder = dict[el.dataset.i18nPlaceholder];
            });
            document.querySelectorAll('[data-i18n-aria]').forEach(function (el) {
                el.setAttribute('aria-label', dict[el.dataset.i18nAria]);
            });
            document.querySelectorAll('[data-i18n-title]').forEach(function (el) {
                el.title = dict[el.dataset.i18nTitle];
            });
            document.querySelectorAll('[data-lang]').forEach(function (btn) {
                btn.setAttribute('aria-pressed', btn.dataset.lang === lang ? 'true' : 'false');
            });

            document.title = dict.page_title;

            try { localStorage.setItem('lang', lang); } catch (e) {}
        }

        // Appliquer la direction tout de suite pour éviter un saut visuel
        (function () {
            const l = getSavedLang();
            document.documentElement.lang = l;
            document.documentElement.dir = l === 'ar' ? 'rtl' : 'ltr';
        })();
    </script>

    <style>
        :root {
            --bg: #f4f6f8;
            --surface: #ffffff;
            --border: #e3e8ee;
            --border-soft: #eef1f5;
            --text: #0f172a;
            --text-muted: #5b6678;
            --text-faint: #8a94a6;

            --primary: #059669;
            --primary-hover: #047857;
            --primary-soft: #ecfdf5;
            --primary-ring: rgba(5, 150, 105, .22);

            --danger: #be123c;
            --danger-soft: #fff1f2;
            --warning: #b45309;
            --warning-soft: #fffbeb;

            --radius: 10px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans', 'IBM Plex Sans Arabic', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        :focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* ---------- Sidebar (propriétés logiques : fonctionne en LTR et RTL) ---------- */

        .sidebar {
            width: 256px;
            background: var(--surface);
            border-inline-end: 1px solid var(--border);
            position: fixed;
            inset-block: 0;
            inset-inline-start: 0;
            z-index: 40;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            margin-inline-start: 256px;
            min-height: 100vh;
        }

        .nav-section {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .04em;
            color: var(--text-faint);
            padding: 0 12px;
            margin: 24px 0 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            margin-bottom: 2px;
            border-radius: 8px;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: background .15s, color .15s;
        }

        .nav-link:hover {
            background: var(--bg);
            color: var(--text);
        }

        .nav-link.active {
            background: var(--primary-soft);
            color: var(--primary-hover);
            font-weight: 600;
            box-shadow: inset 3px 0 0 var(--primary);
        }

        /* ---------- Cartes & tableau ---------- */

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .kpi {
            padding: 20px 24px;
        }

        .kpi + .kpi {
            border-top: 1px solid var(--border-soft);
        }

        @media (min-width: 768px) {
            .kpi + .kpi {
                border-top: 0;
                border-inline-start: 1px solid var(--border-soft);
            }
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .data-table th {
            padding: 12px 24px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            background: #f8fafc;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            text-align: start;
        }

        .data-table th.col-actions {
            text-align: end;
        }

        .data-table td {
            padding: 16px 24px;
            font-size: 14px;
            color: var(--text-muted);
            vertical-align: middle;
        }

        .data-table tbody tr {
            border-bottom: 1px solid var(--border-soft);
        }

        .data-table tbody tr:last-child {
            border-bottom: 0;
        }

        .data-table tbody tr:hover {
            background: #fafbfc;
        }

        /* ---------- Boutons ---------- */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.2;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: background .15s, border-color .15s, color .15s;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-dark {
            background: var(--text);
            color: #fff;
        }

        .btn-dark:hover {
            background: #1e293b;
        }

        .btn-ghost {
            background: var(--surface);
            color: var(--text-muted);
            border-color: var(--border);
        }

        .btn-ghost:hover {
            background: var(--bg);
            color: var(--text);
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            background: var(--surface);
            border: 1px solid var(--border);
            cursor: pointer;
            transition: background .15s, border-color .15s, color .15s;
            font-family: inherit;
        }

        .action-edit {
            color: var(--warning);
        }

        .action-edit:hover {
            background: var(--warning-soft);
            border-color: #fcd9a1;
        }

        .action-delete {
            color: var(--danger);
        }

        .action-delete:hover {
            background: var(--danger-soft);
            border-color: #fecdd3;
        }

        .badge-role {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary-hover);
            font-size: 12px;
            font-weight: 600;
        }

        .search-input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding-block: 10px;
            padding-inline-start: 38px;
            padding-inline-end: 14px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text);
            background: var(--surface);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }

        .search-input::placeholder {
            color: var(--text-faint);
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-ring);
        }

        /* ---------- Sélecteur de langue ---------- */

        .lang-switch {
            display: inline-flex;
            padding: 3px;
            gap: 2px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
        }

        .lang-switch button {
            padding: 5px 12px;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background .15s, color .15s;
        }

        .lang-switch button:hover {
            color: var(--text);
        }

        .lang-switch button[aria-pressed="true"] {
            background: var(--primary-soft);
            color: var(--primary-hover);
        }

        /* ---------- Ajustements RTL (arabe) ---------- */

        html[dir="rtl"] .nav-link.active {
            box-shadow: inset -3px 0 0 var(--primary);
        }

        /* L'espacement entre lettres casse la liaison des lettres arabes */
        html[dir="rtl"] .nav-section {
            letter-spacing: 0;
        }

        html[dir="rtl"] body {
            line-height: 1.6;
        }

        /* Valeurs techniques toujours lues de gauche à droite */
        .ltr-value {
            direction: ltr;
            unicode-bidi: isolate;
            display: inline-block;
        }

        /* ---------- Responsive ---------- */

        @media (max-width: 1023px) {
            .sidebar {
                width: 72px;
                padding: 20px 10px;
            }

            .sidebar .brand-text,
            .sidebar .nav-text,
            .sidebar .nav-section,
            .sidebar .sidebar-bottom-text {
                display: none;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 12px 8px;
            }

            .main-content {
                margin-inline-start: 72px;
            }
        }

        @media (max-width: 640px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-inline-start: 0;
            }

            .page-content {
                padding: 16px !important;
            }

            .data-table th,
            .data-table td {
                padding-inline: 16px;
            }
        }

        
    </style>
</head>

<body>

<aside class="sidebar">

    <a href="{{ route('superadmin.dashboard') }}"
       class="flex items-center gap-3 mb-8 px-2 no-underline">

       <div class="logo-crop logo-full">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy">
            </div>
            <div class="text-[11px] text-gray-400 mt-2.5 px-0.5" data-i18n="super_admin">Super Administration</div>
        </div>

        <div class="brand-text">
            <div class="font-bold text-slate-900 text-[15px] leading-tight">
                ÉtudeEnLigne
            </div>
            <div class="text-xs text-slate-500 mt-0.5" data-i18n="brand_sub">
                Super administration
            </div>
        </div>
    </a>

    <div class="nav-section" style="margin-top:0" data-i18n="menu_main">
        Menu principal
    </div>

    <a href="{{ route('superadmin.dashboard') }}" class="nav-link">
        <i data-lucide="layout-dashboard" class="w-[18px] h-[18px] shrink-0"></i>
        <span class="nav-text" data-i18n="nav_dashboard">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}"
       class="nav-link active">
        <i data-lucide="shield-check" class="w-[18px] h-[18px] shrink-0"></i>
        <span class="nav-text" data-i18n="nav_admins">Gestion des administrateurs</span>
    </a>

    <div class="nav-section" data-i18n="account">
        Compte
    </div>

    <a href="{{ route('profile.edit') }}" class="nav-link">
        <i data-lucide="settings" class="w-[18px] h-[18px] shrink-0"></i>
        <span class="nav-text" data-i18n="settings">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
                class="nav-link w-full text-start bg-transparent border-0 cursor-pointer"
                style="font-family:inherit">
            <i data-lucide="log-out" class="w-[18px] h-[18px] shrink-0"></i>
            <span class="nav-text" data-i18n="logout">Déconnexion</span>
        </button>
    </form>

    <div class="mt-auto border-t border-slate-100 pt-4 sidebar-bottom-text">
        <div class="flex items-center gap-3 px-2">

            <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-semibold shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

            <div class="min-w-0">
                <p class="text-sm font-semibold text-slate-800 truncate">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>

                <p class="text-xs text-slate-500" data-i18n="super_admin_role">
                    Super administrateur
                </p>
            </div>
        </div>
    </div>

</aside>


<div class="main-content">

    <header class="bg-white border-b border-slate-200 px-5 md:px-8 py-4 flex items-center justify-between gap-4">

        <div>
            <p class="text-xs text-slate-500 mb-0.5" data-i18n="breadcrumb">
                ÉtudeEnLigne / Administration
            </p>

            <h1 class="text-lg md:text-xl font-bold text-slate-900" data-i18n="page_h1">
                Gestion des administrateurs
            </h1>
        </div>

        <div class="flex items-center gap-3 sm:gap-4">

            {{-- Sélecteur de langue --}}
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" data-lang="fr" aria-pressed="true" onclick="applyLang('fr')">FR</button>
                <button type="button" data-lang="ar" aria-pressed="false" onclick="applyLang('ar')">العربية</button>
            </div>

            <div class="hidden sm:block text-end">
                <p class="text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>

                <p class="text-xs text-slate-500" data-i18n="super_admin_role">
                    Super administrateur
                </p>
            </div>

            <div class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-semibold">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

        </div>
    </header>


    <main class="page-content p-5 md:p-8 max-w-[1280px]">

        {{-- En-tête de la page --}}

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h2 class="text-2xl font-bold text-slate-900">
                    <span data-i18n="hello">Bonjour,</span>
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </h2>

                <p class="text-sm text-slate-500 mt-1" data-i18n="subtitle">
                    Gérez les comptes administrateurs de votre plateforme.
                </p>
            </div>

            <a href="{{ route('superadmin.administrateurs.create') }}"
               class="btn btn-primary no-underline">

                <i data-lucide="user-plus" class="w-4 h-4"></i>
                <span data-i18n="add_admin">Ajouter un administrateur</span>
            </a>

        </div>


        {{-- Messages de confirmation (texte fourni par le serveur) --}}

        @if(session('success'))
            <div role="status" class="mb-5 flex items-center gap-3 px-4 py-3 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800">
                <i data-lucide="check-circle" class="w-5 h-5 shrink-0"></i>
                <p class="text-sm font-medium">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        @if(session('error'))
            <div role="alert" class="mb-5 flex items-center gap-3 px-4 py-3 rounded-lg bg-rose-50 border border-rose-200 text-rose-800">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                <p class="text-sm font-medium">
                    {{ session('error') }}
                </p>
            </div>
        @endif

        @if($errors->any())
            <div role="alert" class="mb-5 px-4 py-3 rounded-lg bg-rose-50 border border-rose-200 text-rose-800">
                <p class="font-semibold text-sm mb-2" data-i18n="fix_errors">Veuillez corriger les erreurs suivantes :</p>

                <ul class="list-disc ps-5 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Statistiques --}}

        <div class="panel grid grid-cols-1 md:grid-cols-3 mb-6">

            <div class="kpi">
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                    <span data-i18n="kpi_total">Total des administrateurs</span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mt-2 tabular-nums">
                    {{ $totalAdmins ?? $admins->total() }}
                </p>

                <p class="text-xs text-slate-400 mt-1" data-i18n="kpi_total_sub">
                    Comptes administrateurs enregistrés
                </p>
            </div>


            <div class="kpi">
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <i data-lucide="user-check" class="w-4 h-4 text-emerald-600"></i>
                    <span data-i18n="kpi_account">Votre compte</span>
                </div>

                <p class="text-xl font-bold text-slate-900 mt-3" data-i18n="kpi_account_val">
                    Super Admin
                </p>

                <p class="text-xs text-slate-400 mt-2" data-i18n="kpi_account_sub">
                    Gestion globale de la plateforme
                </p>
            </div>


            <div class="kpi">
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <i data-lucide="list" class="w-4 h-4 text-emerald-600"></i>
                    <span data-i18n="kpi_shown">Résultats affichés</span>
                </div>

                <p class="text-3xl font-bold text-slate-900 mt-2 tabular-nums">
                    {{ $admins->count() }}
                </p>

                <p class="text-xs text-slate-400 mt-1" data-i18n="kpi_shown_sub">
                    Administrateurs sur cette page
                </p>
            </div>

        </div>


        {{-- Tableau des administrateurs --}}

        <section class="panel overflow-hidden">

            <div class="px-5 md:px-6 py-4 border-b border-slate-200">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                    <div>
                        <h3 class="font-semibold text-slate-900" data-i18n="list_title">
                            Liste des administrateurs
                        </h3>

                        <p class="text-xs text-slate-500 mt-0.5" data-i18n="list_sub">
                            Consultez et gérez les comptes existants.
                        </p>
                    </div>


                    {{-- Formulaire de recherche --}}

                    <form method="GET"
                          action="{{ route('superadmin.administrateurs.index') }}"
                          class="flex flex-col sm:flex-row gap-2">

                        <div class="relative">
                            <i data-lucide="search"
                               class="w-4 h-4 text-slate-400 absolute start-3 top-1/2 -translate-y-1/2 pointer-events-none"></i>

                            <input
                                type="text"
                                name="search"
                                value="{{ $search ?? request('search') }}"
                                placeholder="Nom ou adresse email..."
                                aria-label="Rechercher un administrateur"
                                data-i18n-placeholder="search_ph"
                                data-i18n-aria="search_aria"
                                class="search-input sm:w-72"
                            >
                        </div>

                        <button type="submit" class="btn btn-dark" data-i18n="search_btn">
                            Rechercher
                        </button>

                        @if(request('search'))
                            <a href="{{ route('superadmin.administrateurs.index') }}"
                               class="btn btn-ghost no-underline"
                               data-i18n="reset">
                                Réinitialiser
                            </a>
                        @endif

                    </form>

                </div>
            </div>


            <div class="table-wrap">

                <table class="data-table w-full">

                    <thead>

                        <tr>
                            <th data-i18n="th_admin">Administrateur</th>
                            <th data-i18n="th_email">Adresse email</th>
                            <th data-i18n="th_role">Rôle</th>
                            <th data-i18n="th_date">Date de création</th>
                            <th class="col-actions" data-i18n="th_actions">Actions</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($admins as $admin)

                            <tr>

                                {{-- Nom --}}

                                <td class="whitespace-nowrap">

                                    <div class="flex items-center gap-3">

                                        <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-semibold shrink-0">
                                            {{ strtoupper(substr($admin->name ?? '?', 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">
                                                {{ $admin->name }}
                                            </p>

                                            <p class="text-xs text-slate-400 mt-0.5">
                                                <span data-i18n="id_label">ID :</span> {{ $admin->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}

                                <td class="whitespace-nowrap">
                                    <span class="ltr-value">{{ $admin->email }}</span>
                                </td>


                                {{-- Rôle --}}

                                <td class="whitespace-nowrap">

                                    <span class="badge-role">
                                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                        <span data-i18n="role_admin">Administrateur</span>
                                    </span>

                                </td>


                                {{-- Date --}}

                                <td class="whitespace-nowrap tabular-nums">
                                    <span class="ltr-value">{{ $admin->created_at?->format('d/m/Y') ?? '—' }}</span>
                                </td>


                                {{-- Actions --}}

                                <td>

                                    <div class="flex items-center justify-end gap-2">

                                        <a href="{{ route('superadmin.administrateurs.edit', $admin) }}"
                                           class="action-btn action-edit"
                                           title="Modifier"
                                           data-i18n-title="edit">

                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                            <span data-i18n="edit">Modifier</span>
                                        </a>


                                        <form
                                            method="POST"
                                            action="{{ route('superadmin.administrateurs.destroy', $admin) }}"
                                            onsubmit="return confirm(t('confirm_delete'));"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn action-delete"
                                                title="Supprimer"
                                                data-i18n-title="del"
                                            >
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                <span data-i18n="del">Supprimer</span>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-5 py-14 text-center">

                                    <div class="w-14 h-14 mx-auto rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center mb-4">
                                        <i data-lucide="users" class="w-7 h-7"></i>
                                    </div>

                                    <h4 class="font-semibold text-slate-800" data-i18n="empty_title">
                                        Aucun administrateur trouvé
                                    </h4>

                                    <p class="text-sm text-slate-500 mt-1">
                                        @if(request('search'))
                                            <span data-i18n="empty_search">Essayez un autre nom ou une autre adresse email.</span>
                                        @else
                                            <span data-i18n="empty_none">Vous pouvez ajouter votre premier administrateur.</span>
                                        @endif
                                    </p>

                                    @if(!request('search'))
                                        <a href="{{ route('superadmin.administrateurs.create') }}"
                                           class="btn btn-primary no-underline mt-5">

                                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                                            <span data-i18n="add_admin">Ajouter un administrateur</span>
                                        </a>
                                    @endif

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}

            @if($admins->hasPages())

                <div class="px-5 md:px-6 py-4 border-t border-slate-200" dir="ltr">

                    {{ $admins->links() }}

                </div>

            @endif

        </section>


        <footer class="text-center text-xs text-slate-400 mt-8 pb-3">
            © {{ date('Y') }} <span data-i18n="rights">ÉtudeEnLigne. Tous droits réservés.</span>
        </footer>

    </main>

</div>


<script>
    applyLang(getSavedLang());
    lucide.createIcons();
</script>

</body>
</html>