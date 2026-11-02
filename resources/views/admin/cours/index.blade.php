<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <title>Gestion des cours | CAD ACADEMY</title>

    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --red: #D90429;
            --red-700: #9B0320;
            --red-50: #FFF1F3;
            --red-100: #FFE0E5;
            --red-200: #FFC2CC;
            --ink: #1A1A1A;
            --text: #1F1F1F;
            --muted: #6E6E6E;
            --border: #EDEDED;
            --soft: #FAFAFA;
        }

        * { box-sizing: border-box; }

        body { margin: 0; background: var(--soft); color: var(--text); font-family: 'Plus Jakarta Sans', sans-serif; }
        html[dir="rtl"] body { font-family: 'Cairo', sans-serif; }
        button, input, a { font-family: inherit; }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); position: relative; }
        .topbar::after { content: ""; position: absolute; inset-inline: 0; bottom: 0; height: 4px; background: var(--red-700); }

        .topbar-inner {
            max-width: 1280px; margin: auto; padding: 16px 24px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 15px; flex-wrap: wrap;
        }

        .brand { display: flex; align-items: center; gap: 12px; text-decoration: none; color: #fff; }
        .brand-icon { width: 44px; height: 44px; display: grid; place-items: center; border-radius: 11px; background: #fff; color: var(--red); }
        .brand-name { font-size: 22px; font-weight: 800; letter-spacing: .5px; line-height: 1; }
        .brand-subtitle { font-size: 10px; color: #FFD3DA; margin-top: 4px; letter-spacing: 1px; font-weight: 700; }

        .top-actions { display: flex; gap: 9px; flex-wrap: wrap; align-items: center; }
        .top-actions form { margin: 0; }

        .top-btn {
            min-height: 41px; padding: 10px 13px; display: inline-flex; align-items: center; justify-content: center; gap: 7px;
            border-radius: 10px; border: 1px solid rgba(255, 255, 255, .6); background: transparent; color: #fff;
            text-decoration: none; font-size: 12px; font-weight: 800; cursor: pointer; transition: background .15s;
        }
        .top-btn:hover { background: rgba(0, 0, 0, .18); }
        .top-btn.primary { background: #fff; border-color: #fff; color: var(--red); }
        .top-btn.primary:hover { background: var(--red-50); }
        .top-btn:focus-visible, .add-btn:focus-visible, .card-btn:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        .page { max-width: 1280px; margin: auto; padding: 28px 24px 60px; }

        .breadcrumb { display: flex; align-items: center; flex-wrap: wrap; gap: 9px; color: #9A9A9A; font-size: 12px; margin-bottom: 22px; }
        .breadcrumb a { color: var(--red); text-decoration: none; font-weight: 700; }

        /* ---------- Titre ---------- */
        .hero {
            background: #fff; border: 1px solid var(--border); border-top: 4px solid var(--red);
            border-radius: 16px; padding: 26px 28px; display: flex; justify-content: space-between;
            align-items: center; gap: 20px; margin-bottom: 26px;
        }
        .hero-tag { display: inline-flex; align-items: center; gap: 7px; color: var(--red); font-size: 12px; font-weight: 800; margin-bottom: 8px; }
        .hero h1 { font-size: clamp(23px, 3.5vw, 30px); line-height: 1.35; font-weight: 800; margin: 0; color: var(--ink); letter-spacing: -.5px; }
        .hero p { color: var(--muted); font-size: 13px; line-height: 1.8; margin: 8px 0 0; }
        .hero-icon { flex-shrink: 0; width: 72px; height: 72px; border-radius: 18px; background: var(--red-50); color: var(--red); display: grid; place-items: center; }

        .list-bar { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 22px; }
        .list-bar h2 { font-size: 18px; font-weight: 800; color: var(--ink); margin: 0; }
        .list-bar p { font-size: 12px; color: #9A9A9A; margin: 4px 0 0; }

        .add-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 17px;
            border-radius: 11px; background: var(--red); color: #fff; text-decoration: none;
            font-size: 12px; font-weight: 800; transition: background .2s; border: none;
        }
        .add-btn:hover { background: var(--red-700); }

        /* ---------- Statistiques ---------- */
        .stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin: 0 0 30px; }
        .stat-card { padding: 20px; background: #fff; border: 1px solid var(--border); border-radius: 14px; }
        .stat-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
        .stat-label { color: var(--muted); font-size: 12px; font-weight: 700; }
        .stat-ar { color: #A3A3A3; font-family: 'Cairo', sans-serif; font-size: 11px; margin-top: 4px; }
        .stat-number { font-size: 30px; line-height: 1.3; font-weight: 800; color: var(--ink); margin-top: 12px; }
        .stat-icon { width: 45px; height: 45px; display: grid; place-items: center; border-radius: 12px; flex-shrink: 0; background: var(--red-50); color: var(--red); }

        .list-heading { display: flex; align-items: center; justify-content: space-between; gap: 15px; flex-wrap: wrap; margin-bottom: 17px; }
        .list-heading h2 { font-size: 19px; font-weight: 800; margin: 0; color: var(--ink); }
        .list-heading p { font-size: 12px; color: #9A9A9A; margin-top: 5px; }

        .count-pill {
            display: inline-flex; align-items: center; gap: 6px; padding: 8px 12px; border-radius: 999px;
            background: #fff; border: 1px solid var(--border); color: var(--muted); font-size: 11px; font-weight: 800;
        }

        /* ---------- Cartes ---------- */
        .course-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 19px; }

        .course-card {
            min-width: 0; background: #fff; border: 1px solid var(--border); border-top: 3px solid var(--red);
            border-radius: 14px; overflow: hidden; transition: border-color .2s, box-shadow .2s;
        }
        .course-card:hover { border-color: var(--red-200); border-top-color: var(--red); box-shadow: 0 8px 22px rgba(217, 4, 41, .08); }

        .course-body { padding: 20px; }
        .course-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
        .course-icon { width: 45px; height: 45px; display: grid; place-items: center; border-radius: 12px; background: var(--red-50); color: var(--red); }
        .order-pill { background: var(--soft); border: 1px solid var(--border); color: var(--muted); padding: 6px 9px; border-radius: 999px; font-size: 10px; font-weight: 800; }

        .course-title { color: var(--ink); font-size: 16px; font-weight: 800; line-height: 1.7; overflow-wrap: anywhere; margin: 16px 0 0; }

        .formation-name { display: flex; align-items: flex-start; gap: 7px; color: var(--red-700); font-size: 11px; font-weight: 700; line-height: 1.8; margin-top: 10px; }
        .formation-name svg { flex-shrink: 0; margin-top: 2px; }

        .description { color: var(--muted); font-size: 12px; line-height: 1.9; margin-top: 12px; min-height: 45px; overflow-wrap: anywhere; }

        .file-status { display: flex; align-items: center; gap: 7px; flex-wrap: wrap; padding-top: 14px; margin-top: 13px; border-top: 1px solid var(--border); }

        .file-badge { display: inline-flex; align-items: center; gap: 5px; border-radius: 8px; padding: 6px 8px; font-size: 10px; font-weight: 800; }
        .file-yes { background: var(--red-100); color: var(--red-700); }
        .file-no { background: #F3F3F3; color: #8A8A8A; }
        .video-badge { background: var(--ink); color: #fff; }

        .card-actions { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 9px; margin-top: 18px; width: 100%; }
        .card-actions form { display: block; width: 100%; min-width: 0; margin: 0; }

        .card-btn {
            display: flex; align-items: center; justify-content: center; gap: 7px; width: 100%; min-width: 0; min-height: 43px;
            padding: 10px 7px; border-radius: 10px; text-decoration: none; border: 1px solid transparent;
            cursor: pointer; font-size: 12px; font-weight: 800; transition: background .2s;
        }
        .card-btn i, .card-btn svg { flex-shrink: 0; }

        .edit-btn { background: var(--red); color: #fff; }
        .edit-btn:hover { background: var(--red-700); }

        .delete-btn { background: #fff; color: #555; border-color: var(--border); }
        .delete-btn:hover { background: var(--red-50); color: var(--red); border-color: var(--red-100); }

        /* ---------- État vide ---------- */
        .empty-state { background: #fff; border: 1.5px dashed var(--red-200); border-radius: 16px; padding: 48px 20px; text-align: center; }
        .empty-icon { width: 72px; height: 72px; display: grid; place-items: center; margin: auto; background: var(--red-50); color: var(--red); border-radius: 18px; }
        .empty-state h3 { font-size: 20px; font-weight: 800; margin: 18px 0 0; color: var(--ink); }
        .empty-state p { color: var(--muted); font-size: 12px; margin: 9px 0 0; line-height: 1.8; }
        .empty-state .ar { font-family: 'Cairo', sans-serif; color: var(--red); font-size: 15px; font-weight: 700; }

        .alert { padding: 14px 16px; border-radius: 12px; display: flex; align-items: flex-start; gap: 10px; margin-bottom: 18px; font-size: 12px; line-height: 1.8; }
        .alert ul { margin: 4px 0 0; padding-inline-start: 20px; }
        .alert-success { color: var(--ink); background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); }
        .alert-error { color: var(--red-700); background: var(--red-50); border: 1px solid var(--red-200); }

        .footer { text-align: center; padding: 25px 15px; color: #9A9A9A; font-size: 11px; border-top: 1px solid var(--border); background: #fff; }
        .footer .name { color: var(--ink); font-weight: 800; font-size: 15px; letter-spacing: .5px; margin-bottom: 4px; }
        .footer .copy { margin-top: 8px; }

        @media (max-width: 1000px) { .course-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

        @media (max-width: 700px) {
            .topbar-inner { padding: 13px 15px 18px; }
            .top-actions { width: 100%; }
            .top-actions form { flex: 1; display: flex; }
            .top-btn { flex: 1; padding: 10px 8px; font-size: 10px; }
            .page { padding: 20px 14px 40px; }
            .hero { padding: 20px 18px; }
            .hero-icon { width: 54px; height: 54px; border-radius: 14px; }
            .hero-icon svg { width: 28px; }
            .list-bar .add-btn { width: 100%; }
            .stats { grid-template-columns: 1fr; gap: 11px; }
            .stat-card { padding: 17px; }
            .stat-number { font-size: 27px; }
            .course-grid { grid-template-columns: 1fr; }
            .course-body { padding: 18px; }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="topbar-inner">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-icon">
                <i data-lucide="graduation-cap" width="24"></i>
            </div>

            <div>
                <div class="brand-name">CAD ACADEMY</div>
                <div class="brand-subtitle" data-i18n="admin">ADMINISTRATION</div>
            </div>
        </a>

        <div class="top-actions">

            <a href="{{ route('admin.dashboard') }}" class="top-btn primary">
                <i data-lucide="layout-dashboard" width="16"></i>
                <span data-i18n="dashboard">Tableau de bord</span>
            </a>

            <button type="button" class="top-btn" onclick="toggleLanguage()">
                <i data-lucide="languages" width="16"></i>
                <span id="language-button">العربية</span>
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="top-btn">
                    <i data-lucide="log-out" width="16"></i>
                    <span data-i18n="logout">Déconnexion</span>
                </button>
            </form>

        </div>
    </div>
</header>

<main class="page">

    <div class="breadcrumb">
        <a href="{{ route('admin.dashboard') }}" data-i18n="dashboard">
            Tableau de bord
        </a>
        <i data-lucide="chevron-right" width="14"></i>
        <span data-i18n="courses">Cours</span>
    </div>

    <section class="hero">
        <div class="hero-content">

            <div class="hero-tag">
                <i data-lucide="shield-check" width="14"></i>
                <span data-i18n="adminSpace">Espace administrateur</span>
            </div>

            <h1 data-i18n="pageTitle">Gestion des cours</h1>

            <p data-i18n="subtitle">
                Gérez, consultez et organisez les cours de vos formations.
            </p>

            <p style="font-family:'Cairo',sans-serif">
                إدارة الدروس وتنظيم محتوى التكوينات
            </p>

        </div>

        <div class="hero-icon">
            <i data-lucide="book-open-check" width="36"></i>
        </div>
    </section>

    <div class="list-bar">
        <div>
            <h2 data-i18n="listTitle">Tous les cours</h2>
            <p data-i18n="listSubtitle">Retrouvez ici les cours enregistrés sur la plateforme.</p>
        </div>

        <a href="{{ route('admin.cours.create') }}" class="add-btn">
            <i data-lucide="plus-circle" width="18"></i>
            <span data-i18n="addCourse">Ajouter un cours</span>
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle" width="19"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i data-lucide="alert-circle" width="19"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <i data-lucide="alert-circle" width="19"></i>
            <div>
                <strong data-i18n="errorTitle">Une erreur est survenue :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <section class="stats">

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label" data-i18n="totalCourses">Total des cours</div>
                    <div class="stat-ar">مجموع الدروس</div>
                    <div class="stat-number">{{ $cours->count() }}</div>
                </div>
                <div class="stat-icon">
                    <i data-lucide="library" width="23"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label" data-i18n="totalFormations">
                        Formations concernées
                    </div>
                    <div class="stat-ar">التكوينات المعنية</div>
                    <div class="stat-number">
                        {{ $cours->pluck('formation_id')->unique()->count() }}
                    </div>
                </div>
                <div class="stat-icon">
                    <i data-lucide="book-open" width="23"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label" data-i18n="totalPdf">Documents PDF</div>
                    <div class="stat-ar">ملفات PDF</div>
                    <div class="stat-number">
                        {{ $cours->whereNotNull('file_path')->count() }}
                    </div>
                </div>
                <div class="stat-icon">
                    <i data-lucide="file-text" width="23"></i>
                </div>
            </div>
        </div>

    </section>

    <section>

        <div class="list-heading">
            <div>
                <h2 data-i18n="coursesList">Liste des cours</h2>
                <p data-i18n="manageCourses">
                    Consultez les informations de chaque cours.
                </p>
            </div>

            <div class="count-pill">
                <i data-lucide="layers" width="14"></i>
                {{ $cours->count() }}
                <span data-i18n="courseCount">cours</span>
            </div>
        </div>

        @if($cours->count() > 0)

            <div class="course-grid">

                @foreach($cours as $cour)

                    <article class="course-card">

                        <div class="course-body">

                            <div class="course-top">
                                <div class="course-icon">
                                    <i data-lucide="book-open" width="23"></i>
                                </div>

                                <span class="order-pill">
                                    <span data-i18n="order">Ordre</span>
                                    #{{ $cour->order }}
                                </span>
                            </div>

                            <h3 class="course-title">
                                {{ $cour->title }}
                            </h3>

                            <div class="formation-name">
                                <i data-lucide="layers" width="15"></i>
                                <span>
                                    {{ $cour->formation->name ?? 'Formation inconnue' }}
                                </span>
                            </div>

                            @if($cour->description)
                                <p class="description">
                                    {{ \Illuminate\Support\Str::limit($cour->description, 120) }}
                                </p>
                            @else
                                <p class="description" data-i18n="noDescription">
                                    Aucune description disponible.
                                </p>
                            @endif

                            <div class="file-status">

                                @if($cour->file_path)
                                    <span class="file-badge file-yes">
                                        <i data-lucide="file-check" width="13"></i>
                                        <span data-i18n="pdfAvailable">PDF disponible</span>
                                    </span>
                                @else
                                    <span class="file-badge file-no">
                                        <i data-lucide="file-x" width="13"></i>
                                        <span data-i18n="noPdf">Sans PDF</span>
                                    </span>
                                @endif

                                @if($cour->video_path)
                                    <span class="file-badge video-badge">
                                        <i data-lucide="video" width="13"></i>
                                        <span data-i18n="videoAvailable">Vidéo 1</span>
                                    </span>
                                @endif

                                @if($cour->video2_path)
                                    <span class="file-badge video-badge">
                                        <i data-lucide="video" width="13"></i>
                                        <span data-i18n="video2Available">Vidéo 2</span>
                                    </span>
                                @endif

                                @if($cour->video_url)
                                    <span class="file-badge video-badge">
                                        <i data-lucide="video" width="13"></i>
                                        <span data-i18n="externalVideo">Lien vidéo</span>
                                    </span>
                                @endif

                            </div>

                            <!-- BOUTONS MODIFIER ET SUPPRIMER -->
                            <div class="card-actions">

                                <a href="{{ route('admin.cours.edit', $cour) }}"
                                   class="card-btn edit-btn">
                                    <i data-lucide="pencil" width="16"></i>
                                    <span data-i18n="edit">Modifier</span>
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('admin.cours.destroy', $cour) }}"
                                    onsubmit="return confirm(
                                        document.documentElement.lang === 'ar'
                                            ? 'واش متأكدة بغيتي تحذفي هاد الدرس والملفات ديالو؟'
                                            : 'Voulez-vous vraiment supprimer ce cours et ses fichiers ?'
                                    );"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="card-btn delete-btn">
                                        <i data-lucide="trash-2" width="16"></i>
                                        <span data-i18n="delete">Supprimer</span>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    <i data-lucide="library" width="36"></i>
                </div>

                <h3 data-i18n="emptyTitle">Aucun cours pour le moment</h3>

                <p class="ar">
                    لا توجد دروس حالياً
                </p>

                <p data-i18n="emptyText">
                    Commencez par ajouter votre premier cours à une formation.
                </p>

                <a href="{{ route('admin.cours.create') }}" class="add-btn" style="margin-top:22px">
                    <i data-lucide="plus" width="17"></i>
                    <span data-i18n="addFirst">Ajouter mon premier cours</span>
                </a>

            </div>

        @endif

    </section>

</main>

<footer class="footer">
    <div class="name">CAD ACADEMY</div>
    <span data-i18n="footer">
        Plateforme de formation en ligne · Administration
    </span>
    <div class="copy">© {{ date('Y') }} CAD ACADEMY</div>
</footer>

<script>
    const translations = {
        fr: {
            admin: "ADMINISTRATION",
            dashboard: "Tableau de bord",
            logout: "Déconnexion",
            courses: "Cours",
            adminSpace: "Espace administrateur",
            pageTitle: "Gestion des cours",
            subtitle: "Gérez, consultez et organisez les cours de vos formations.",
            listTitle: "Tous les cours",
            listSubtitle: "Retrouvez ici les cours enregistrés sur la plateforme.",
            addCourse: "Ajouter un cours",
            errorTitle: "Une erreur est survenue :",
            totalCourses: "Total des cours",
            totalFormations: "Formations concernées",
            totalPdf: "Documents PDF",
            coursesList: "Liste des cours",
            manageCourses: "Consultez les informations de chaque cours.",
            courseCount: "cours",
            order: "Ordre",
            noDescription: "Aucune description disponible.",
            pdfAvailable: "PDF disponible",
            noPdf: "Sans PDF",
            videoAvailable: "Vidéo 1",
            video2Available: "Vidéo 2",
            externalVideo: "Lien vidéo",
            edit: "Modifier",
            delete: "Supprimer",
            emptyTitle: "Aucun cours pour le moment",
            emptyText: "Commencez par ajouter votre premier cours à une formation.",
            addFirst: "Ajouter mon premier cours",
            footer: "Plateforme de formation en ligne · Administration"
        },

        ar: {
            admin: "الإدارة",
            dashboard: "لوحة التحكم",
            logout: "تسجيل الخروج",
            courses: "الدروس",
            adminSpace: "فضاء الإدارة",
            pageTitle: "إدارة الدروس",
            subtitle: "تصفحي الدروس ونظمي محتوى التكوينات.",
            listTitle: "جميع الدروس",
            listSubtitle: "هنا ستجدين الدروس المسجلة في المنصة.",
            addCourse: "إضافة درس",
            errorTitle: "وقع خطأ:",
            totalCourses: "مجموع الدروس",
            totalFormations: "التكوينات المعنية",
            totalPdf: "ملفات PDF",
            coursesList: "قائمة الدروس",
            manageCourses: "اطلعي على معلومات كل درس.",
            courseCount: "درس",
            order: "الترتيب",
            noDescription: "لا يوجد وصف لهذا الدرس.",
            pdfAvailable: "ملف PDF متوفر",
            noPdf: "بدون PDF",
            videoAvailable: "الفيديو الأول",
            video2Available: "الفيديو الثاني",
            externalVideo: "رابط فيديو",
            edit: "تعديل",
            delete: "حذف",
            emptyTitle: "لا توجد دروس حالياً",
            emptyText: "ابدئي بإضافة أول درس إلى أحد التكوينات.",
            addFirst: "إضافة أول درس",
            footer: "منصة للتكوين عن بعد · الإدارة"
        }
    };

    function applyLanguage(lang) {
        const dict = translations[lang] || translations.fr;

        document.documentElement.lang = lang;
        document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
        document.title = (lang === "ar" ? "إدارة الدروس | " : "Gestion des cours | ") + "CAD ACADEMY";

        document.querySelectorAll("[data-i18n]").forEach(element => {
            const key = element.dataset.i18n;

            if (Object.prototype.hasOwnProperty.call(dict, key)) {
                element.textContent = dict[key];
            }
        });

        const languageButton = document.getElementById("language-button");

        if (languageButton) {
            languageButton.textContent = lang === "ar" ? "Français" : "العربية";
        }

        try {
            localStorage.setItem("cadacademy_admin_language", lang);
        } catch (error) {
            // La page reste utilisable sans localStorage.
        }

        if (window.lucide) {
            lucide.createIcons();
        }
    }

    function toggleLanguage() {
        const current = document.documentElement.lang;
        applyLanguage(current === "ar" ? "fr" : "ar");
    }

    let savedLanguage = "fr";

    try {
        savedLanguage = localStorage.getItem("cadacademy_admin_language") || "fr";
    } catch (error) {
        savedLanguage = "fr";
    }

    applyLanguage(savedLanguage);
    lucide.createIcons();
</script>

</body>
</html>