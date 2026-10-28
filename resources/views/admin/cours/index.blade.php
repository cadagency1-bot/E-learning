
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <title>Gestion des cours | cad acadmey</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --green: #059669;
            --green-dark: #047857;
            --green-light: #ecfdf5;
            --text: #172b25;
            --muted: #73827b;
            --border: #e5eee9;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f8f6;
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html[dir="rtl"] body {
            font-family: 'Cairo', sans-serif;
        }

        button, input, a {
            font-family: inherit;
        }

        .topbar {
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(12px);
        }

        .topbar-inner {
            max-width: 1280px;
            min-height: 76px;
            margin: auto;
            padding: 13px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: inherit;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(135deg,#10b981,#047857);
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .brand-name span {
            color: var(--green);
        }

        .brand-subtitle {
            font-size: 10px;
            color: #94a39b;
            margin-top: 2px;
            letter-spacing: 1px;
        }

        .top-actions {
            display: flex;
            gap: 9px;
            flex-wrap: wrap;
            align-items: center;
        }

        .top-btn {
            min-height: 41px;
            padding: 10px 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: white;
            color: #50625a;
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .top-btn:hover {
            background: var(--green-light);
            color: var(--green-dark);
        }

        .top-btn.primary {
            background: var(--green);
            border-color: var(--green);
            color: white;
        }

        .top-btn.primary:hover {
            background: var(--green-dark);
        }

        .page {
            max-width: 1280px;
            margin: auto;
            padding: 30px 24px 60px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            color: #8a9991;
            font-size: 12px;
            margin-bottom: 23px;
        }

        .breadcrumb a {
            color: var(--green);
            text-decoration: none;
            font-weight: 700;
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg,#064e3b,#047857 65%,#059669);
            color: white;
            border-radius: 22px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 27px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border: 1px solid #ffffff35;
            background: #ffffff12;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: clamp(25px,3.5vw,34px);
            line-height: 1.4;
            font-weight: 800;
            margin: 0;
        }

        .hero p {
            color: #d1fae5;
            font-size: 13px;
            line-height: 1.9;
            margin: 8px 0 0;
        }

        .hero-icon {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            width: 75px;
            height: 75px;
            border-radius: 21px;
            background: #ffffff15;
            border: 1px solid #ffffff2b;
            display: grid;
            place-items: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 1px solid #ffffff20;
            border-radius: 50%;
            right: -65px;
            top: -130px;
            box-shadow: 0 0 0 35px #ffffff08,0 0 0 70px #ffffff05;
        }

        html[dir="rtl"] .hero::after {
            right: auto;
            left: -65px;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 17px;
            border-radius: 11px;
            background: var(--green);
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
            transition: .2s;
            border: none;
        }

        .add-btn:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 16px;
            margin: 24px 0 30px;
        }

        .stat-card {
            padding: 21px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 17px;
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .stat-label {
            color: #718078;
            font-size: 12px;
            font-weight: 700;
        }

        .stat-ar {
            color: #9aa79f;
            font-family: 'Cairo',sans-serif;
            font-size: 11px;
            margin-top: 4px;
        }

        .stat-number {
            font-size: 30px;
            line-height: 1.3;
            font-weight: 800;
            color: #172b25;
            margin-top: 12px;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            flex-shrink: 0;
        }

        .purple {
            background: #f3e8ff;
            color: #9333ea;
        }

        .blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .green {
            background: #dcfce7;
            color: #059669;
        }

        .list-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 17px;
        }

        .list-heading h2 {
            font-size: 19px;
            font-weight: 800;
            margin: 0;
        }

        .list-heading p {
            font-size: 12px;
            color: #89978f;
            margin-top: 5px;
        }

        .count-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 999px;
            background: white;
            border: 1px solid var(--border);
            color: #64746b;
            font-size: 11px;
            font-weight: 800;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 19px;
        }

        .course-card {
            min-width: 0;
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 25px #173d2c04;
            transition: .2s;
        }

        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px #173d2c0c;
            border-color: #cde8d9;
        }

        .card-topline {
            height: 5px;
            background: linear-gradient(90deg,#34d399,#059669,#0f766e);
        }

        .course-body {
            padding: 20px;
        }

        .course-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .course-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: #f3e8ff;
            color: #9333ea;
        }

        .order-pill {
            background: #f5f8f6;
            border: 1px solid #edf2ef;
            color: #73827b;
            padding: 6px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 800;
        }

        .course-title {
            color: #1b3026;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.7;
            overflow-wrap: anywhere;
            margin: 16px 0 0;
        }

        .formation-name {
            display: flex;
            align-items: flex-start;
            gap: 7px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
            line-height: 1.8;
            margin-top: 10px;
        }

        .formation-name svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .description {
            color: #819087;
            font-size: 12px;
            line-height: 1.9;
            margin-top: 12px;
            min-height: 45px;
            overflow-wrap: anywhere;
        }

        .file-status {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
            padding-top: 14px;
            margin-top: 13px;
            border-top: 1px solid #edf2ef;
        }

        .file-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 8px;
            padding: 6px 8px;
            font-size: 10px;
            font-weight: 800;
        }

        .file-yes {
            background: #ecfdf5;
            color: #059669;
        }

        .file-no {
            background: #f5f7f6;
            color: #8a9991;
        }

        .video-badge {
            background: #eff6ff;
            color: #2563eb;
        }

        /* Les boutons Modifier et Supprimer */
        .card-actions {
            display: grid;
            grid-template-columns: repeat(2,minmax(0,1fr));
            gap: 9px;
            margin-top: 18px;
            width: 100%;
        }

        .card-actions form {
            display: block;
            width: 100%;
            min-width: 0;
            margin: 0;
        }

        .card-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
            min-width: 0;
            min-height: 43px;
            padding: 10px 7px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 12px;
            font-weight: 800;
            transition: .2s;
        }

        .card-btn i,
        .card-btn svg {
            flex-shrink: 0;
        }

        .edit-btn {
            background: #eff6ff;
            color: #2563eb;
            border-color: #dbeafe;
        }

        .edit-btn:hover {
            background: #dbeafe;
        }

        .delete-btn {
            background: #fff1f2;
            color: #e11d48;
            border-color: #fecdd3;
        }

        .delete-btn:hover {
            background: #ffe4e6;
            border-color: #fda4af;
        }

        .empty-state {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 48px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            margin: auto;
            background: #f3e8ff;
            color: #9333ea;
            border-radius: 20px;
        }

        .empty-state h3 {
            font-size: 20px;
            font-weight: 800;
            margin-top: 18px;
        }

        .empty-state p {
            color: #84938a;
            font-size: 12px;
            margin-top: 9px;
            line-height: 1.8;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 12px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.8;
        }

        .alert-success {
            color: #047857;
            background: #ecfdf5;
            border: 1px solid #d1fae5;
        }

        .alert-error {
            color: #be123c;
            background: #fff1f2;
            border: 1px solid #fecdd3;
        }

        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #9aa79f;
            font-size: 11px;
            border-top: 1px solid var(--border);
            background: white;
        }

        .footer strong {
            color: var(--green);
        }

        @media (max-width: 1000px) {
            .course-grid {
                grid-template-columns: repeat(2,minmax(0,1fr));
            }
        }

        @media (max-width: 700px) {
            .topbar-inner {
                padding: 13px 15px;
            }

            .top-actions {
                width: 100%;
            }

            .top-btn {
                flex: 1;
                padding: 10px 8px;
                font-size: 10px;
            }

            .page {
                padding: 23px 14px 40px;
            }

            .hero {
                padding: 22px 18px;
                border-radius: 18px;
            }

            .hero-icon {
                width: 54px;
                height: 54px;
                border-radius: 15px;
            }

            .hero-icon svg {
                width: 28px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .stat-card {
                padding: 17px;
            }

            .stat-number {
                font-size: 27px;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .course-body {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="topbar-inner">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-icon">
                <i data-lucide="graduation-cap" width="25"></i>
            </div>

            <div>
                <div class="brand-name">Cad<span>Acadmey</span></div>
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
                <i data-lucide="layers" width="14"></i>
                <span data-i18n="adminSpace">ESPACE ADMINISTRATEUR</span>
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
            <i data-lucide="book-open-check" width="38"></i>
        </div>
    </section>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-gray-900" data-i18n="listTitle">
                Tous les cours
            </h2>
            <p class="text-xs text-gray-400 mt-1" data-i18n="listSubtitle">
                Retrouvez ici les cours enregistrés sur la plateforme.
            </p>
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
                <ul class="list-disc ps-5 mt-1">
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
                <div class="stat-icon purple">
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
                    <div class="stat-number" style="color:#2563eb">
                        {{ $cours->pluck('formation_id')->unique()->count() }}
                    </div>
                </div>
                <div class="stat-icon blue">
                    <i data-lucide="book-open" width="23"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label" data-i18n="totalPdf">Documents PDF</div>
                    <div class="stat-ar">ملفات PDF</div>
                    <div class="stat-number" style="color:#059669">
                        {{ $cours->whereNotNull('file_path')->count() }}
                    </div>
                </div>
                <div class="stat-icon green">
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

                        <div class="card-topline"></div>

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

                <p style="font-family:'Cairo',sans-serif;color:#059669;font-size:15px;font-weight:700">
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
    <div class="font-bold text-base mb-1">
        Étude<strong>EnLigne</strong>
    </div>
    <span data-i18n="footer">
        Plateforme de formation en ligne · Administration
    </span>
    <div class="mt-2">© {{ date('Y') }} ÉtudeEnLigne</div>
</footer>

<script>
    const translations = {
        fr: {
            admin: "ADMINISTRATION",
            dashboard: "Tableau de bord",
            logout: "Déconnexion",
            courses: "Cours",
            adminSpace: "ESPACE ADMINISTRATEUR",
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
            localStorage.setItem("etudierenligne_admin_language", lang);
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
        savedLanguage = localStorage.getItem("etudierenligne_admin_language") || "fr";
    } catch (error) {
        savedLanguage = "fr";
    }

    applyLanguage(savedLanguage);
    lucide.createIcons();
</script>

</body>
</html>
