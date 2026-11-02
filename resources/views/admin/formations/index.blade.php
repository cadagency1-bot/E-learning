<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations | CAD ACADEMY</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --red: #D90429;
            --red-700: #9B0320;
            --red-50: #FFF1F3;
            --red-100: #FFE0E5;
            --red-200: #FFC2CC;
            --ink: #1A1A1A;
            --soft: #FAFAFA;
            --border: #EDEDED;
            --text: #1F1F1F;
            --muted: #6E6E6E;
            --radius: 12px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Inter, Arial, sans-serif;
            background: var(--soft);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Cairo', 'Plus Jakarta Sans', Arial, sans-serif; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }
        [dir="rtl"] .flip svg, [dir="rtl"] .flip i { transform: scaleX(-1); }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); color: #fff; position: relative; }
        .topbar::after { content: ""; position: absolute; inset-inline: 0; bottom: 0; height: 4px; background: var(--red-700); }
        .topbar-inner {
            max-width: 1100px; margin: 0 auto; padding: 16px 16px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;
        }
        .topbar-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .brand { display: flex; align-items: center; gap: 12px; color: #fff; text-decoration: none; }
        .brand-icon { width: 42px; height: 42px; border-radius: 10px; background: #fff; color: var(--red); display: grid; place-items: center; }
        .brand-icon svg { width: 22px; height: 22px; }
        .brand-name { font-size: 22px; font-weight: 800; letter-spacing: .5px; line-height: 1; }

        .lang-switch { display: inline-flex; gap: 2px; background: rgba(0, 0, 0, .18); border-radius: 10px; padding: 3px; }
        .lang-switch button {
            border: none; background: transparent; color: #fff; padding: 7px 13px; border-radius: 7px;
            font-family: 'Plus Jakarta Sans', 'Cairo', sans-serif; font-size: 12.5px; font-weight: 700; cursor: pointer;
        }
        .lang-switch button[data-lang-btn="ar"] { font-family: 'Cairo', sans-serif; font-size: 13.5px; }
        .lang-switch button.active { background: #fff; color: var(--red); }

        /* ---------- Boutons ---------- */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 15px; border-radius: 10px; font-family: inherit; font-size: 13px; font-weight: 700;
            text-decoration: none; cursor: pointer; border: 1px solid transparent; transition: background .15s, border-color .15s;
        }
        .btn:focus-visible, .action-btn:focus-visible, .lang-switch button:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }
        .btn-top { background: #fff; color: var(--red); }
        .btn-top:hover { background: var(--red-50); }
        .btn-primary { background: var(--red); color: #fff; }
        .btn-primary:hover { background: var(--red-700); }

        .page { max-width: 1100px; margin: 0 auto; padding: 26px 16px 48px; }

        .header { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 18px; }
        .header h1 { font-size: 26px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; }
        .header p { margin-top: 4px; color: var(--muted); font-size: 13px; line-height: 1.6; }

        .alert { display: flex; gap: 12px; padding: 12px 15px; border-radius: 12px; margin-bottom: 14px; line-height: 1.55; font-size: 13px; }
        .alert svg { margin-top: 2px; }
        .alert ul { margin: 6px 0 0; padding-inline-start: 18px; }
        .alert-success { background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); color: var(--ink); }
        .alert-error { background: var(--red-50); border: 1px solid var(--red-200); color: var(--red-700); }

        .stat { display: inline-flex; align-items: center; gap: 12px; background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 12px 18px; margin-bottom: 18px; }
        .stat-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--red-50); color: var(--red); display: grid; place-items: center; }
        .stat-icon svg { width: 19px; height: 19px; }
        .stat-number { font-size: 22px; font-weight: 800; line-height: 1.1; color: var(--ink); }
        .stat-text { font-size: 12px; color: var(--muted); margin-top: 2px; }

        /* ---------- Grille ---------- */
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }

        .card {
            display: flex; flex-direction: column; min-width: 0; background: #fff;
            border: 1px solid var(--border); border-top: 3px solid var(--red);
            border-radius: var(--radius); padding: 18px; transition: border-color .2s, box-shadow .2s;
        }
        .card:hover { border-color: var(--red-200); border-top-color: var(--red); box-shadow: 0 8px 22px rgba(217, 4, 41, .08); }
        .card-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 12px; }
        .card-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--red-50); color: var(--red); display: grid; place-items: center; }
        .card-icon svg { width: 20px; height: 20px; }
        .card-number { color: #C9C9C9; font-size: 12px; font-weight: 800; }

        .category {
            display: inline-flex; align-items: center; gap: 6px; width: fit-content; max-width: 100%;
            padding: 4px 9px; margin-bottom: 9px; border-radius: 999px;
            background: var(--red-50); border: 1px solid var(--red-100); color: var(--red-700);
            font-size: 11px; font-weight: 700; overflow-wrap: anywhere;
        }
        .category svg { width: 12px; height: 12px; }

        .name { font-size: 16px; line-height: 1.4; font-weight: 800; color: var(--ink); overflow-wrap: anywhere; }
        .description { flex: 1; margin-top: 7px; color: var(--muted); font-size: 12.5px; line-height: 1.7; overflow-wrap: anywhere; }
        .no-description { color: #9A9A9A; font-style: italic; }

        .video-badge {
            display: inline-flex; align-items: center; gap: 6px; width: fit-content; margin-top: 10px;
            padding: 5px 9px; border-radius: 8px; background: var(--ink); color: #fff; font-size: 11px; font-weight: 700;
        }
        .video-badge svg { width: 13px; height: 13px; }

        .card-footer { margin-top: 14px; padding-top: 12px; border-top: 1px solid var(--border); display: flex; flex-direction: column; gap: 10px; }
        .date { display: flex; align-items: center; gap: 5px; font-size: 11px; color: #9A9A9A; }
        .date svg { width: 13px; height: 13px; }

        .actions { display: flex; gap: 8px; }
        .actions form { margin: 0; flex: 1; display: flex; }
        .action-btn {
            flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
            padding: 8px 10px; border-radius: 9px; border: 1px solid transparent;
            font-family: inherit; font-size: 11.5px; font-weight: 700; text-decoration: none; cursor: pointer; transition: background .15s;
        }
        .action-btn svg { width: 14px; height: 14px; }
        .edit { background: var(--red); color: #fff; }
        .edit:hover { background: var(--red-700); }
        .delete { background: #fff; border-color: var(--border); color: #555; width: 100%; }
        .delete:hover { background: var(--red-50); border-color: var(--red-100); color: var(--red); }

        .empty { padding: 48px 20px; text-align: center; background: #fff; border: 1.5px dashed var(--red-200); border-radius: var(--radius); }
        .empty-icon { width: 56px; height: 56px; margin: 0 auto 14px; border-radius: 14px; background: var(--red-50); color: var(--red); display: grid; place-items: center; }
        .empty-icon svg { width: 26px; height: 26px; }
        .empty h2 { font-size: 18px; font-weight: 800; color: var(--ink); }
        .empty p { margin: 8px 0 18px; color: var(--muted); font-size: 13px; line-height: 1.7; }

        @media (max-width: 950px) { .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 640px) {
            .page { padding: 18px 10px 36px; }
            .topbar-inner { padding: 14px 10px 18px; }
            .topbar-actions { width: 100%; justify-content: space-between; }
            .topbar-actions .btn { flex: 1; }
            .header .btn { width: 100%; }
            .header h1 { font-size: 21px; }
            .grid { grid-template-columns: 1fr; gap: 12px; }
        }
    </style>
</head>

<body>

    <!-- ===== BARRE DU HAUT ===== -->
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
                <span class="brand-name">CAD ACADEMY</span>
            </a>

            <div class="topbar-actions">
                <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                    <button type="button" data-lang-btn="fr" class="active">FR</button>
                    <button type="button" data-lang-btn="ar">العربية</button>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="btn btn-top flip">
                    <i data-lucide="arrow-left"></i>
                    <span data-i18n="backDash">Retour au tableau de bord</span>
                </a>
            </div>
        </div>
    </header>

<div class="page">

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

    @if(session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle-2"></i>
            <div><strong data-i18n="ok">Opération réussie :</strong> {{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i data-lucide="alert-triangle"></i>
            <div><strong data-i18n="attention">Attention :</strong> {{ session('error') }}</div>
        </div>
    @endif

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

                    <div class="category">
                        <i data-lucide="tag"></i>
                        @if($formation->category)
                            <span data-cat="{{ $formation->category }}">{{ $formation->category }}</span>
                        @else
                            <span data-i18n="noCat">Sans catégorie</span>
                        @endif
                    </div>

                    <h2 class="name">{{ $formation->name }}</h2>

                    <div class="description">
                        @if($formation->description)
                            {{ \Illuminate\Support\Str::limit($formation->description, 120) }}
                        @else
                            <span class="no-description" data-i18n="noDesc">Aucune description</span>
                        @endif
                    </div>

                    @if($formation->video_path ?? false)
                        <div class="video-badge">
                            <i data-lucide="play-circle"></i>
                            <span data-i18n="video">Vidéo disponible</span>
                        </div>
                    @endif

                    <div class="card-footer">

                        <div class="date">
                            <i data-lucide="calendar"></i>
                            <span data-i18n="added">Ajoutée le</span>
                            <bdi>{{ $formation->created_at ? $formation->created_at->format('d/m/Y') : '—' }}</bdi>
                        </div>

                        <div class="actions">

                            <a href="{{ route('admin.formations.edit', $formation) }}" class="action-btn edit">
                                <i data-lucide="pencil"></i>
                                <span data-i18n="edit">Modifier</span>
                            </a>

                            <form action="{{ route('admin.formations.destroy', $formation) }}"
                                  method="POST"
                                  onsubmit="return confirmDelete();">
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
            ? 'التكوينات | CAD ACADEMY'
            : 'Formations | CAD ACADEMY';

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