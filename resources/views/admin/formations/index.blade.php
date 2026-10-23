<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations | ÉtudeEnLigne</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --emerald: #10B981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --emerald-50: #ECFDF5;
            --emerald-100: #D1FAE5;
            --dark: #064E3B;
            --bg: #F5F8F7;
            --border: #E5E9E8;
            --text: #1F2937;
            --muted: #6B7280;
            --radius: 14px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Inter, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Cairo', 'Plus Jakarta Sans', Arial, sans-serif; }

        .page { max-width: 1100px; margin: 0 auto; padding: 22px 16px 48px; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }
        [dir="rtl"] .flip svg, [dir="rtl"] .flip i { transform: scaleX(-1); }

        /* ---------- Barre du haut ---------- */
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 12px; flex-wrap: wrap; margin-bottom: 22px;
        }
        .topbar-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .brand {
            display: flex; align-items: center; gap: 10px;
            color: var(--dark); font-size: 18px; font-weight: 800; text-decoration: none;
        }
        .brand-icon {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--emerald), var(--dark));
            color: #fff; display: grid; place-items: center;
            box-shadow: 0 5px 14px rgba(16, 185, 129, .3);
        }
        .brand-icon svg { width: 19px; height: 19px; }

        /* ---------- Sélecteur de langue ---------- */
        .lang-switch {
            display: inline-flex; align-items: center; gap: 2px;
            background: #fff; border: 1px solid var(--border);
            border-radius: 10px; padding: 3px;
        }
        .lang-switch button {
            border: none; background: transparent; color: var(--muted);
            padding: 7px 13px; border-radius: 7px;
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif;
            font-size: 12.5px; font-weight: 700; cursor: pointer; transition: all .15s;
        }
        .lang-switch button[data-lang-btn="ar"] { font-family: 'Cairo', sans-serif; font-size: 13.5px; }
        .lang-switch button.active { background: var(--emerald-600); color: #fff; }

        /* ---------- Boutons ---------- */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 15px; border-radius: 10px;
            font-family: inherit; font-size: 13px; font-weight: 700;
            text-decoration: none; cursor: pointer;
            border: 1px solid transparent; transition: all .15s ease;
        }
        .btn-light { background: #fff; color: var(--emerald-700); border-color: var(--border); }
        .btn-light:hover { background: var(--emerald-50); border-color: var(--emerald-100); }
        .btn-primary { background: var(--emerald-600); color: #fff; box-shadow: 0 4px 12px rgba(5, 150, 105, .25); }
        .btn-primary:hover { background: var(--dark); }

        /* ---------- En-tête ---------- */
        .header {
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; flex-wrap: wrap; margin-bottom: 18px;
        }
        .header h1 { font-size: 22px; font-weight: 800; color: var(--dark); letter-spacing: -.3px; }
        .header p { margin-top: 4px; color: var(--muted); font-size: 13px; line-height: 1.6; }

        /* ---------- Alertes ---------- */
        .alert { display: flex; gap: 12px; padding: 12px 15px; border-radius: 12px; margin-bottom: 14px; line-height: 1.55; font-size: 13px; }
        .alert svg { margin-top: 2px; }
        .alert ul { margin: 6px 0 0; padding-inline-start: 18px; }
        .alert-success { background: var(--emerald-50); border: 1px solid #A7F3D0; color: #065F46; }
        .alert-error { background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; }

        /* ---------- Statistique ---------- */
        .stat {
            display: inline-flex; align-items: center; gap: 12px;
            background: #fff; border: 1px solid var(--border);
            border-radius: var(--radius); padding: 12px 18px; margin-bottom: 18px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
        }
        .stat-icon {
            width: 38px; height: 38px; border-radius: 10px;
            background: var(--emerald-50); color: var(--emerald-600);
            display: grid; place-items: center;
        }
        .stat-icon svg { width: 19px; height: 19px; }
        .stat-number { font-size: 20px; font-weight: 800; line-height: 1.1; }
        .stat-text { font-size: 12px; color: var(--muted); margin-top: 2px; }

        /* ---------- Grille ---------- */
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }

        .card {
            display: flex; flex-direction: column; min-width: 0;
            background: #fff; border: 1px solid var(--border);
            border-radius: var(--radius); padding: 18px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
            transition: border-color .2s, box-shadow .2s, transform .2s;
        }
        .card:hover {
            border-color: #A7F3D0;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .07);
            transform: translateY(-2px);
        }
        .card-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 12px; }
        .card-icon {
            width: 40px; height: 40px; border-radius: 11px;
            background: var(--emerald-50); color: var(--emerald-600);
            display: grid; place-items: center;
        }
        .card-icon svg { width: 20px; height: 20px; }
        .card-number { color: #CBD5E1; font-size: 12px; font-weight: 800; }

        .category {
            display: inline-flex; align-items: center; gap: 6px; width: fit-content; max-width: 100%;
            padding: 4px 9px; margin-bottom: 9px;
            border-radius: 999px; background: var(--emerald-50); border: 1px solid var(--emerald-100);
            color: var(--emerald-700); font-size: 11px; font-weight: 700; overflow-wrap: anywhere;
        }
        .category svg { width: 12px; height: 12px; }

        .name { font-size: 16px; line-height: 1.4; font-weight: 800; color: var(--dark); overflow-wrap: anywhere; }
        .description { flex: 1; margin-top: 7px; color: var(--muted); font-size: 12.5px; line-height: 1.7; overflow-wrap: anywhere; }
        .no-description { color: #94A3B8; font-style: italic; }

        .video-badge {
            display: inline-flex; align-items: center; gap: 6px; width: fit-content;
            margin-top: 10px; padding: 5px 9px; border-radius: 8px;
            background: #EFF6FF; color: #1D4ED8; font-size: 11px; font-weight: 700;
        }
        .video-badge svg { width: 13px; height: 13px; }

        .card-footer {
            margin-top: 14px; padding-top: 12px; border-top: 1px solid #F1F5F9;
            display: flex; flex-direction: column; gap: 10px;
        }
        .date { display: flex; align-items: center; gap: 5px; font-size: 11px; color: #94A3B8; }
        .date svg { width: 13px; height: 13px; }

        .actions { display: flex; gap: 8px; }
        .actions form { margin: 0; flex: 1; display: flex; }
        .action-btn {
            flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
            padding: 8px 10px; border-radius: 9px; border: 1px solid transparent;
            font-family: inherit; font-size: 11.5px; font-weight: 700;
            text-decoration: none; cursor: pointer; transition: all .15s;
        }
        .action-btn svg { width: 14px; height: 14px; }
        .edit { background: #EFF6FF; border-color: #DBEAFE; color: #1D4ED8; }
        .edit:hover { background: #DBEAFE; }
        .delete { background: #FEF2F2; border-color: #FEE2E2; color: #DC2626; width: 100%; }
        .delete:hover { background: #FEE2E2; }

        /* ---------- État vide ---------- */
        .empty {
            padding: 48px 20px; text-align: center; background: #fff;
            border: 1.5px dashed #CBD5E1; border-radius: var(--radius);
        }
        .empty-icon {
            width: 56px; height: 56px; margin: 0 auto 14px; border-radius: 15px;
            background: var(--emerald-50); color: var(--emerald-600); display: grid; place-items: center;
        }
        .empty-icon svg { width: 26px; height: 26px; }
        .empty h2 { font-size: 18px; font-weight: 800; color: var(--dark); }
        .empty p { margin: 8px 0 18px; color: var(--muted); font-size: 13px; line-height: 1.7; }

        /* ---------- Responsive ---------- */
        @media (max-width: 950px) {
            .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 640px) {
            .page { padding: 14px 10px 36px; }
            .topbar-actions { width: 100%; justify-content: space-between; }
            .topbar-actions .btn { flex: 1; }
            .header .btn { width: 100%; }
            .header h1 { font-size: 19px; }
            .grid { grid-template-columns: 1fr; gap: 12px; }
        }
    </style>
</head>

<body>
<div class="page">

    <!-- ===== BARRE DU HAUT ===== -->
    <div class="topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
            <span>ÉtudeEnLigne</span>
        </a>

        <div class="topbar-actions">
            <!-- Option de langue : Français / العربية -->
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" data-lang-btn="fr" class="active">FR</button>
                <button type="button" data-lang-btn="ar">العربية</button>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-light flip">
                <i data-lucide="arrow-left"></i>
                <span data-i18n="backDash">Retour au tableau de bord</span>
            </a>
        </div>
    </div>

    <!-- ===== EN-TÊTE ===== -->
    <div class="header">
        <div>
            <h1 data-i18n="title">Gestion des formations</h1>
            <p data-i18n="subtitle">Gérez les formations disponibles sur votre plateforme.</p>
        </div>

        <a href="{{ route('admin.formations.create') }}" class="btn btn-primary">
            <i data-lucide="plus"></i>
            <span data-i18n="add">Ajouter une formation</span>
        </a>
    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle-2"></i>
            <div><strong data-i18n="ok">Opération réussie :</strong> {{ session('success') }}</div>
        </div>
    @endif

    <!-- ERROR -->
    @if(session('error'))
        <div class="alert alert-error">
            <i data-lucide="alert-triangle"></i>
            <div><strong data-i18n="attention">Attention :</strong> {{ session('error') }}</div>
        </div>
    @endif

    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="alert alert-error">
            <i data-lucide="alert-circle"></i>
            <div>
                <strong data-i18n="verify">Veuillez vérifier les informations :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- ===== STATISTIQUE ===== -->
    <div class="stat">
        <div class="stat-icon"><i data-lucide="library"></i></div>
        <div>
            <div class="stat-number">{{ $formations->count() }}</div>
            <div class="stat-text" data-i18n="statText">Formation(s) enregistrée(s)</div>
        </div>
    </div>

    <!-- ===== LISTE ===== -->
    @if($formations->count() > 0)

        <div class="grid">

            @foreach($formations as $formation)

                <article class="card">

                    <div class="card-top">
                        <div class="card-icon"><i data-lucide="book-open"></i></div>
                        <span class="card-number">#{{ $loop->iteration }}</span>
                    </div>

                    <!-- CATEGORY -->
                    <div class="category">
                        <i data-lucide="tag"></i>
                        @if($formation->category)
                            <span data-cat="{{ $formation->category }}">{{ $formation->category }}</span>
                        @else
                            <span data-i18n="noCat">Sans catégorie</span>
                        @endif
                    </div>

                    <!-- NAME -->
                    <h2 class="name">{{ $formation->name }}</h2>

                    <!-- DESCRIPTION -->
                    <div class="description">
                        @if($formation->description)
                            {{ \Illuminate\Support\Str::limit($formation->description, 120) }}
                        @else
                            <span class="no-description" data-i18n="noDesc">Aucune description</span>
                        @endif
                    </div>

                    <!-- VIDEO STATUS -->
                    @if($formation->video_path ?? false)
                        <div class="video-badge">
                            <i data-lucide="play-circle"></i>
                            <span data-i18n="video">Vidéo disponible</span>
                        </div>
                    @endif

                    <!-- FOOTER -->
                    <div class="card-footer">

                        <div class="date">
                            <i data-lucide="calendar"></i>
                            <span data-i18n="added">Ajoutée le</span>
                            <bdi>{{ $formation->created_at ? $formation->created_at->format('d/m/Y') : '—' }}</bdi>
                        </div>

                        <div class="actions">

                            <a
                                href="{{ route('admin.formations.edit', $formation) }}"
                                class="action-btn edit"
                            >
                                <i data-lucide="pencil"></i>
                                <span data-i18n="edit">Modifier</span>
                            </a>

                            <form
                                action="{{ route('admin.formations.destroy', $formation) }}"
                                method="POST"
                                onsubmit="return confirmDelete();"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="action-btn delete">
                                    <i data-lucide="trash-2"></i>
                                    <span data-i18n="del">Supprimer</span>
                                </button>
                            </form>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <!-- ===== ÉTAT VIDE ===== -->
        <div class="empty">
            <div class="empty-icon"><i data-lucide="book-open"></i></div>

            <h2 data-i18n="emptyTitle">Aucune formation pour le moment</h2>
            <p data-i18n="emptyText">Commencez par ajouter votre première formation à la plateforme.</p>

            <a href="{{ route('admin.formations.create') }}" class="btn btn-primary">
                <i data-lucide="plus"></i>
                <span data-i18n="add">Ajouter une formation</span>
            </a>
        </div>

    @endif

</div>

<script>
    // ================= TRADUCTIONS (FR / AR) =================
    const I18N = {
        fr: {
            backDash: 'Retour au tableau de bord',
            title: 'Gestion des formations',
            subtitle: 'Gérez les formations disponibles sur votre plateforme.',
            add: 'Ajouter une formation',
            ok: 'Opération réussie :',
            attention: 'Attention :',
            verify: 'Veuillez vérifier les informations :',
            statText: 'Formation(s) enregistrée(s)',
            noCat: 'Sans catégorie',
            noDesc: 'Aucune description',
            video: 'Vidéo disponible',
            added: 'Ajoutée le',
            edit: 'Modifier',
            del: 'Supprimer',
            emptyTitle: 'Aucune formation pour le moment',
            emptyText: 'Commencez par ajouter votre première formation à la plateforme.',
            confirmDelete: 'Voulez-vous vraiment supprimer cette formation ?'
        },
        ar: {
            backDash: 'العودة إلى لوحة التحكم',
            title: 'إدارة التكوينات',
            subtitle: 'قم بإدارة التكوينات المتوفرة على المنصة.',
            add: 'إضافة تكوين',
            ok: 'تمت العملية بنجاح :',
            attention: 'تنبيه :',
            verify: 'يرجى التحقق من المعلومات :',
            statText: 'عدد التكوينات المسجلة',
            noCat: 'بدون فئة',
            noDesc: 'لا يوجد وصف',
            video: 'فيديو متوفر',
            added: 'تاريخ الإضافة :',
            edit: 'تعديل',
            del: 'حذف',
            emptyTitle: 'لا توجد تكوينات حالياً',
            emptyText: 'ابدأ بإضافة أول تكوين إلى المنصة.',
            confirmDelete: 'هل تريد فعلاً حذف هذا التكوين؟'
        }
    };

    // Traduction d'affichage des catégories (la valeur en base reste en français)
    const CATEGORIES_AR = {
        'Design & Programmation': 'التصميم والبرمجة',
        'Informatique bureautique': 'المعلوميات المكتبية',
        'Aide médicale et administrative': 'المساعدة الطبية والإدارية',
        'Hôtellerie & restauration': 'الفندقة والمطعمة',
        'Secrétariat': 'السكرتارية',
        'Commerce': 'التجارة',
        'Métiers & artisanat': 'المهن والصناعة التقليدية',
        "Programmes d'ingénierie": 'برامج الهندسة'
    };

    let currentLang = 'fr';

    function t(key) {
        return (I18N[currentLang] && I18N[currentLang][key]) || I18N.fr[key] || key;
    }

    function confirmDelete() {
        return confirm(t('confirmDelete'));
    }

    function setLang(lang, persist) {
        currentLang = lang === 'ar' ? 'ar' : 'fr';

        document.documentElement.lang = currentLang;
        document.documentElement.dir = currentLang === 'ar' ? 'rtl' : 'ltr';
        document.title = currentLang === 'ar'
            ? 'التكوينات | ÉtudeEnLigne'
            : 'Formations | ÉtudeEnLigne';

        document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
            btn.classList.toggle('active', btn.dataset.langBtn === currentLang);
        });

        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            el.textContent = t(el.dataset.i18n);
        });

        document.querySelectorAll('[data-cat]').forEach(function (el) {
            const fr = el.dataset.cat;
            el.textContent = currentLang === 'ar' ? (CATEGORIES_AR[fr] || fr) : fr;
        });

        if (persist) {
            try { localStorage.setItem('etudeenligne_lang', currentLang); } catch (e) {}
        }
    }

    document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            setLang(this.dataset.langBtn, true);
        });
    });

    // Langue mémorisée (partagée avec la page d'ajout d'une formation)
    let savedLang = 'fr';
    try { savedLang = localStorage.getItem('etudeenligne_lang') || 'fr'; } catch (e) {}
    setLang(savedLang, false);

    if (window.lucide) {
        lucide.createIcons();
    }
</script>
</body>
</html>