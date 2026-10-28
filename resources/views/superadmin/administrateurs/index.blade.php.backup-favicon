<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des administrateurs | cad academy</title>
    <link rel="icon" type="image/png" href="{{ asset('images/cad-academy-logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    {{-- ============ Traductions FR / AR ============ --}}
    <script>
        const I18N = {
            fr: {
                page_title: "Gestion des administrateurs | ÉtudeEnLigne",
                brand_sub: "Super Administration",
                menu_main: "Menu principal",
                nav_dashboard: "Tableau de bord",
                nav_admins: "Administrateurs",
                nav_registrations: "Inscriptions",
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
                nav_admins: "المسؤولون",
                nav_registrations: "التسجيلات",
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
                if (dict[el.dataset.i18n] !== undefined) el.textContent = dict[el.dataset.i18n];
            });
            document.querySelectorAll('[data-i18n-placeholder]').forEach(function (el) {
                if (dict[el.dataset.i18nPlaceholder] !== undefined) el.placeholder = dict[el.dataset.i18nPlaceholder];
            });
            document.querySelectorAll('[data-i18n-aria]').forEach(function (el) {
                if (dict[el.dataset.i18nAria] !== undefined) el.setAttribute('aria-label', dict[el.dataset.i18nAria]);
            });
            document.querySelectorAll('[data-i18n-title]').forEach(function (el) {
                if (dict[el.dataset.i18nTitle] !== undefined) el.title = dict[el.dataset.i18nTitle];
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
            font-family: 'Plus Jakarta Sans', 'Cairo', system-ui, sans-serif;
            background: linear-gradient(160deg, #021710 0%, #05301f 45%, #0a4a36 100%) fixed;
            color: var(--text);
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        html[dir="rtl"] * { letter-spacing: 0 !important; }

        :focus-visible { outline: 2px solid var(--brand); outline-offset: 2px; }

        .tabular { font-variant-numeric: tabular-nums; }

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

        /* ---------- CARTES EN DÉGRADÉ ---------- */
        .g-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 18px 20px;
            color: #fff;
            min-height: 118px;
            box-shadow: 0 14px 28px -14px rgba(0, 0, 0, .6);
            transition: transform .2s ease;
        }

        .g-card:hover { transform: translateY(-3px); }

        .g-1 { background: linear-gradient(135deg, #065f46 0%, #10b981 100%); }
        .g-2 { background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%); }
        .g-3 { background: linear-gradient(135deg, #166534 0%, #4ade80 100%); }

        .g-card .g-label { font-size: 12.5px; font-weight: 600; opacity: .92; }
        .g-card .g-number { font-size: 28px; font-weight: 800; margin-top: 6px; line-height: 1.1; }
        .g-card .g-text { font-size: 19px; font-weight: 800; margin-top: 8px; line-height: 1.2; }
        .g-card .g-sub { font-size: 11.5px; opacity: .85; margin-top: 8px; }

        .g-card .g-icon {
            position: absolute;
            inset-inline-end: 16px;
            top: 16px;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .18);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---------- PANNEAU / TABLEAU ---------- */
        .panel {
            background: linear-gradient(145deg, #0d4132 0%, #08291f 100%);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            min-width: 0;
        }

        .table-wrap { width: 100%; overflow-x: auto; }

        .data-table { width: 100%; border-collapse: collapse; text-align: start; }

        .data-table th {
            background: var(--surface-2);
            padding: 13px 24px;
            font-size: 11.5px;
            font-weight: 700;
            color: var(--muted);
            white-space: nowrap;
            text-align: start;
        }

        .data-table th.col-actions { text-align: end; }

        .data-table td {
            padding: 15px 24px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: var(--muted);
            vertical-align: middle;
        }

        .data-table tbody tr:last-child td { border-bottom: 0; }
        .data-table tbody tr { transition: background .15s ease; }
        .data-table tbody tr:hover { background: rgba(255, 255, 255, .03); }

        .ltr-value { direction: ltr; unicode-bidi: isolate; display: inline-block; }

        .badge-role {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 8px;
            background: rgba(74, 222, 128, .16);
            color: #4ade80;
            font-size: 11.5px;
            font-weight: 700;
        }

        /* ---------- BOUTONS ---------- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.2;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            font-family: inherit;
            transition: filter .15s ease, transform .15s ease, background .15s ease, color .15s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #052e22;
        }

        .btn-primary:hover { filter: brightness(1.08); transform: translateY(-1px); }

        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border-color: var(--border);
            font-weight: 700;
        }

        .btn-ghost:hover { background: var(--surface-2); color: var(--text); }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 10px;
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            font-family: inherit;
            transition: filter .15s ease, transform .15s ease;
        }

        .action-btn:hover { filter: brightness(1.25); transform: translateY(-1px); }
        .action-edit { background: rgba(245, 158, 11, .16); color: #fbbf24; }
        .action-delete { background: rgba(244, 63, 94, .16); color: #fb7185; }

        .search-input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding-block: 11px;
            padding-inline-start: 40px;
            padding-inline-end: 14px;
            font-size: 13.5px;
            font-family: inherit;
            color: var(--text);
            background: rgba(2, 23, 16, .55);
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .search-input::placeholder { color: var(--faint); }

        .search-input:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(52, 211, 153, .18);
        }

        /* ---------- SÉLECTEUR DE LANGUE ---------- */
        .lang-switch {
            display: inline-flex;
            padding: 3px;
            gap: 2px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: var(--surface);
        }

        .lang-switch button {
            padding: 7px 14px;
            border: 0;
            border-radius: 999px;
            background: transparent;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: all .15s ease;
        }

        .lang-switch button:hover { color: var(--text); }
        .lang-switch button[aria-pressed="true"] { background: #ffffff; color: #052e22; }

        /* ---------- ALERTES ---------- */
        .alert { display: flex; gap: 12px; border-radius: 14px; padding: 13px 16px; margin-bottom: 20px; font-size: 13.5px; font-weight: 600; }
        .alert-success { background: rgba(52, 211, 153, .14); border: 1px solid rgba(52, 211, 153, .4); color: #6ee7b7; }
        .alert-error { background: rgba(244, 63, 94, .13); border: 1px solid rgba(244, 63, 94, .4); color: #fda4af; }

        .empty-box {
            width: 56px;
            height: 56px;
            margin: 0 auto 14px;
            border-radius: 18px;
            background: var(--surface-2);
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---------- PAGINATION (vue Laravel par défaut) ---------- */
        .pagination-dark nav * { border-color: var(--border) !important; }
        .pagination-dark nav a,
        .pagination-dark nav button,
        .pagination-dark nav span > span,
        .pagination-dark nav span[aria-current] > span,
        .pagination-dark nav span[aria-disabled] > span {
            background: var(--surface-2) !important;
            color: var(--text) !important;
        }
        .pagination-dark nav span[aria-current] > span { background: var(--brand-dark) !important; color: #052e22 !important; }
        .pagination-dark nav p { color: var(--muted) !important; }
        .pagination-dark nav svg { color: var(--text); }

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
            .data-table th, .data-table td { padding-inline: 16px; }
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
            <div class="text-[11px] mt-2.5 px-0.5" style="color: var(--muted);" data-i18n="brand_sub">Super Administration</div>
        </div>

        <div class="logo-crop logo-mark">
            <img src="{{ asset('images/cad-academy-logo.png') }}" alt="CAD Academy">
        </div>
    </a>

    <div class="nav-label" data-i18n="menu_main">Menu principal</div>

    <a href="{{ route('superadmin.dashboard') }}" class="nav-link">
        <i data-lucide="layout-dashboard"></i>
        <span class="nav-text" data-i18n="nav_dashboard">Tableau de bord</span>
    </a>

    <a href="{{ route('superadmin.administrateurs.index') }}" class="nav-link active">
        <i data-lucide="shield-check"></i>
        <span class="nav-text" data-i18n="nav_admins">Administrateurs</span>
    </a>

    <a href="{{ route('superadmin.inscriptions.index') }}" class="nav-link">
        <i data-lucide="users"></i>
        <span class="nav-text" data-i18n="nav_registrations">Inscriptions</span>
    </a>

    <div class="nav-label" style="margin-top: 26px;" data-i18n="account">Compte</div>

    <a href="{{ route('profile.edit') }}" class="nav-link">
        <i data-lucide="settings"></i>
        <span class="nav-text" data-i18n="settings">Paramètres</span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link w-full text-start bg-transparent border-0 cursor-pointer" style="font-family:inherit">
            <i data-lucide="log-out"></i>
            <span class="nav-text" data-i18n="logout">Déconnexion</span>
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
                <p class="text-[11px]" style="color: var(--muted);" data-i18n="super_admin_role">Super administrateur</p>
            </div>
        </div>
    </div>

</aside>


{{-- CONTENU --}}
<div class="main-content">

    <header class="topbar px-5 md:px-8 py-4 flex items-center justify-between gap-4">

        <div class="min-w-0">
            <p class="text-xs mb-0.5" style="color: var(--muted);" data-i18n="breadcrumb">
                ÉtudeEnLigne / Administration
            </p>

            <h1 class="text-xl font-extrabold tracking-tight truncate" data-i18n="page_h1">
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
                <p class="text-sm font-bold leading-tight">
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </p>

                <p class="text-xs" style="color: var(--muted);" data-i18n="super_admin_role">
                    Super administrateur
                </p>
            </div>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'S', 0, 1)) }}
            </div>

        </div>
    </header>


    <main class="page-content p-5 md:p-8">

        {{-- En-tête de la page --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h2 class="text-2xl font-extrabold">
                    <span data-i18n="hello">Bonjour,</span>
                    {{ auth()->user()->name ?? 'Super Admin' }}
                </h2>

                <p class="text-sm mt-1" style="color: var(--muted);" data-i18n="subtitle">
                    Gérez les comptes administrateurs de votre plateforme.
                </p>
            </div>

            <a href="{{ route('superadmin.administrateurs.create') }}" class="btn btn-primary">
                <i data-lucide="user-plus" class="w-4 h-4"></i>
                <span data-i18n="add_admin">Ajouter un administrateur</span>
            </a>

        </div>


        {{-- Messages (texte fourni par le serveur) --}}
        @if(session('success'))
            <div role="status" class="alert alert-success">
                <i data-lucide="check-circle" class="w-5 h-5 shrink-0"></i>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div role="alert" class="alert alert-error">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div role="alert" class="alert alert-error" style="display:block;">
                <p class="font-bold mb-2" data-i18n="fix_errors">Veuillez corriger les erreurs suivantes :</p>

                <ul class="list-disc ps-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Statistiques --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

            <div class="g-card g-1">
                <div class="g-icon"><i data-lucide="shield-check" class="w-5 h-5"></i></div>
                <p class="g-label" data-i18n="kpi_total">Total des administrateurs</p>
                <p class="g-number tabular">{{ $totalAdmins ?? $admins->total() }}</p>
                <p class="g-sub" data-i18n="kpi_total_sub">Comptes administrateurs enregistrés</p>
            </div>

            <div class="g-card g-2">
                <div class="g-icon"><i data-lucide="user-check" class="w-5 h-5"></i></div>
                <p class="g-label" data-i18n="kpi_account">Votre compte</p>
                <p class="g-text" data-i18n="kpi_account_val">Super Admin</p>
                <p class="g-sub" data-i18n="kpi_account_sub">Gestion globale de la plateforme</p>
            </div>

            <div class="g-card g-3">
                <div class="g-icon"><i data-lucide="list" class="w-5 h-5"></i></div>
                <p class="g-label" data-i18n="kpi_shown">Résultats affichés</p>
                <p class="g-number tabular">{{ $admins->count() }}</p>
                <p class="g-sub" data-i18n="kpi_shown_sub">Administrateurs sur cette page</p>
            </div>

        </div>


        {{-- Tableau des administrateurs --}}
        <section class="panel overflow-hidden">

            <div class="px-5 md:px-6 py-5" style="border-bottom: 1px solid var(--border);">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                    <div>
                        <h3 class="font-extrabold" data-i18n="list_title">Liste des administrateurs</h3>

                        <p class="text-xs mt-1" style="color: var(--muted);" data-i18n="list_sub">
                            Consultez et gérez les comptes existants.
                        </p>
                    </div>


                    {{-- Recherche --}}
                    <form method="GET"
                          action="{{ route('superadmin.administrateurs.index') }}"
                          class="flex flex-col sm:flex-row gap-2">

                        <div class="relative">
                            <i data-lucide="search"
                               class="w-4 h-4 absolute start-3 top-1/2 -translate-y-1/2 pointer-events-none"
                               style="color: var(--faint);"></i>

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

                        <button type="submit" class="btn btn-primary" data-i18n="search_btn">
                            Rechercher
                        </button>

                        @if(request('search'))
                            <a href="{{ route('superadmin.administrateurs.index') }}"
                               class="btn btn-ghost"
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

                                        <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold shrink-0"
                                             style="background: rgba(74,222,128,.14); color:#4ade80;">
                                            {{ strtoupper(substr($admin->name ?? '?', 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-bold" style="color: var(--text);">
                                                {{ $admin->name }}
                                            </p>

                                            <p class="text-xs mt-0.5" style="color: var(--faint);">
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
                                <td class="whitespace-nowrap tabular">
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

                                    <div class="empty-box">
                                        <i data-lucide="users" class="w-7 h-7"></i>
                                    </div>

                                    <h4 class="font-bold" style="color: var(--text);" data-i18n="empty_title">
                                        Aucun administrateur trouvé
                                    </h4>

                                    <p class="text-sm mt-1" style="color: var(--muted);">
                                        @if(request('search'))
                                            <span data-i18n="empty_search">Essayez un autre nom ou une autre adresse email.</span>
                                        @else
                                            <span data-i18n="empty_none">Vous pouvez ajouter votre premier administrateur.</span>
                                        @endif
                                    </p>

                                    @if(!request('search'))
                                        <a href="{{ route('superadmin.administrateurs.create') }}"
                                           class="btn btn-primary mt-5">
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

                <div class="pagination-dark px-5 md:px-6 py-4" style="border-top: 1px solid var(--border);" dir="ltr">
                    {{ $admins->links() }}
                </div>

            @endif

        </section>


        <footer class="text-center text-xs mt-8 pb-3" style="color: var(--faint);">
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