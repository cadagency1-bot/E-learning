
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours | ÉtudeEnLigne</title>

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
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f5f8f6;
            color: var(--text);
        }

        html[dir="rtl"] body {
            font-family: 'Cairo', sans-serif;
        }

        button, input, select, textarea {
            font: inherit;
        }

        .topbar {
            background: rgba(255, 255, 255, .95);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 30;
            backdrop-filter: blur(12px);
        }

        .topbar-inner {
            max-width: 1200px;
            min-height: 82px;
            margin: auto;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
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
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #10b981, #047857);
            color: white;
            border-radius: 15px;
            display: grid;
            place-items: center;
            box-shadow: 0 7px 18px #05966925;
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
            color: #94a39b;
            font-size: 10px;
            margin-top: 2px;
            letter-spacing: 1px;
        }

        .top-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
        }

        .top-btn {
            min-height: 42px;
            padding: 10px 14px;
            border-radius: 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid var(--border);
            color: #50625a;
            background: white;
            cursor: pointer;
            transition: .2s;
        }

        .top-btn:hover {
            background: var(--green-light);
            color: var(--green-dark);
            border-color: #a7f3d0;
        }

        .top-btn.primary {
            color: white;
            background: var(--green);
            border-color: var(--green);
        }

        .top-btn.primary:hover {
            background: var(--green-dark);
        }

        .page {
            max-width: 1080px;
            margin: 0 auto;
            padding: 35px 22px 65px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #8a9991;
            font-size: 12px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: var(--green);
            text-decoration: none;
            font-weight: 700;
        }

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #064e3b, #047857 68%, #059669);
            color: white;
            border-radius: 24px;
            padding: 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 27px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border: 1px solid #ffffff1c;
            border-radius: 50%;
            right: -70px;
            top: -145px;
            box-shadow: 0 0 0 35px #ffffff08, 0 0 0 70px #ffffff05;
        }

        html[dir="rtl"] .hero::after {
            right: auto;
            left: -70px;
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
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero h1 {
            font-size: clamp(25px, 4vw, 34px);
            font-weight: 800;
            line-height: 1.3;
            margin: 0;
            letter-spacing: -.8px;
        }

        .hero p {
            color: #d1fae5;
            font-size: 13px;
            line-height: 1.9;
            margin: 10px 0 0;
            max-width: 550px;
        }

        .hero-icon {
            width: 95px;
            height: 95px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 25px;
            background: #ffffff15;
            border: 1px solid #ffffff2b;
            position: relative;
            z-index: 1;
        }

        .layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 275px;
            gap: 23px;
            align-items: start;
        }

        .form-card, .side-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 5px 25px #173d2c05;
        }

        .form-card {
            padding: 28px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 21px;
            border-bottom: 1px solid #edf2ef;
            margin-bottom: 24px;
        }

        .section-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
        }

        .section-heading h2 {
            font-size: 16px;
            font-weight: 800;
            margin: 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            margin: 5px 0 0;
        }

        .field {
            margin-bottom: 23px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            color: #253a31;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .required {
            color: #ef4444;
        }

        .field-hint {
            font-family: 'Cairo', sans-serif;
            font-size: 12px;
            color: #91a097;
            margin: -3px 0 9px;
        }

        .control {
            display: block;
            width: 100%;
            min-height: 49px;
            padding: 13px 15px;
            background: #fbfdfc;
            color: #263b32;
            border: 1px solid #dfe9e3;
            border-radius: 12px;
            outline: none;
            font-size: 13px;
            transition: .2s;
        }

        .control:focus {
            background: white;
            border-color: #10b981;
            box-shadow: 0 0 0 4px #10b98114;
        }

        textarea.control {
            min-height: 115px;
            line-height: 1.8;
            resize: vertical;
        }

        #content {
            min-height: 190px;
        }

        .upload-box {
            padding: 25px 20px;
            border: 1.5px dashed #c9e7d7;
            background: #f8fdf9;
            border-radius: 16px;
            text-align: center;
            transition: .2s;
        }

        .upload-box:hover {
            border-color: var(--green);
            background: #f0fdf4;
        }

        .upload-icon {
            width: 56px;
            height: 56px;
            margin: 0 auto 13px;
            display: grid;
            place-items: center;
            border-radius: 17px;
            background: #dcfce7;
            color: #059669;
        }

        .upload-title {
            font-size: 13px;
            font-weight: 800;
            color: #2c4136;
            margin: 0;
        }

        .upload-description {
            font-size: 11px;
            color: #91a097;
            margin: 8px 0 0;
            line-height: 1.8;
        }

        .choose-file {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            background: var(--green);
            color: white;
            border-radius: 10px;
            margin-top: 17px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 800;
            transition: .2s;
        }

        .choose-file:hover {
            background: var(--green-dark);
        }

        .file-name {
            overflow-wrap: anywhere;
            color: #64776b;
            font-size: 12px;
            margin-top: 13px;
        }

        .pdf-box {
            border-color: #f0d4d4;
            background: #fffafa;
        }

        .pdf-box:hover {
            border-color: #fca5a5;
            background: #fff7f7;
        }

        .pdf-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .info-note {
            display: flex;
            gap: 12px;
            padding: 15px;
            background: #effcf5;
            border: 1px solid #d4f5e2;
            border-radius: 13px;
            color: #08764f;
            font-size: 12px;
            line-height: 1.8;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 22px;
            border-top: 1px solid #edf2ef;
            margin-top: 27px;
        }

        .action-btn {
            min-height: 49px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 19px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
            border: 1px solid transparent;
        }

        .action-cancel {
            background: white;
            color: #64746b;
            border-color: #dfe9e3;
        }

        .action-cancel:hover {
            background: #f8faf9;
        }

        .action-save {
            flex: 1;
            color: white;
            background: var(--green);
            box-shadow: 0 6px 15px #05966920;
        }

        .action-save:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        .side-card {
            padding: 22px;
            margin-bottom: 18px;
        }

        .side-card h3 {
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 17px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 18px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 29px;
            height: 29px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            background: var(--green-light);
            color: var(--green);
            border-radius: 9px;
            font-size: 12px;
            font-weight: 800;
        }

        .step strong {
            display: block;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .step p {
            font-size: 11px;
            line-height: 1.7;
            color: var(--muted);
            margin: 0;
        }

        .tip-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px;
        }

        .tip-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-weight: 800;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .tip-card p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.9;
            margin: 0;
        }

        .footer {
            text-align: center;
            padding: 24px 16px;
            color: #9aa79f;
            font-size: 11px;
            border-top: 1px solid var(--border);
            background: white;
        }

        .footer strong {
            color: var(--green);
        }

        .error-box {
            padding: 15px;
            margin-bottom: 22px;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            border-radius: 13px;
            color: #be123c;
            font-size: 12px;
        }

        @media (max-width: 850px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .side-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 600px) {
            .topbar-inner {
                padding: 13px 16px;
            }

            .top-actions {
                width: 100%;
            }

            .top-btn {
                flex: 1;
                padding: 10px 9px;
                font-size: 11px;
            }

            .page {
                padding: 23px 14px 40px;
            }

            .hero {
                padding: 24px 20px;
                border-radius: 19px;
            }

            .hero-icon {
                width: 60px;
                height: 60px;
                border-radius: 17px;
            }

            .hero-icon svg {
                width: 29px;
            }

            .form-card {
                padding: 20px 16px;
            }

            .side-column {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .action-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION -->
<header class="topbar">
    <div class="topbar-inner">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-icon">
                <i data-lucide="graduation-cap" width="25"></i>
            </div>
            <div>
                <div class="brand-name">Étude<span>EnLigne</span></div>
                <div class="brand-subtitle" data-i18n="admin">ADMINISTRATION</div>
            </div>
        </a>

        <div class="top-actions">
            <a href="{{ route('admin.dashboard') }}" class="top-btn primary">
                <i data-lucide="layout-dashboard" width="16"></i>
                <span data-i18n="dashboard">Tableau de bord</span>
            </a>

            <a href="{{ route('admin.cours.index') }}" class="top-btn">
                <i data-lucide="arrow-left" class="back-icon" width="16"></i>
                <span data-i18n="back">Retour aux cours</span>
            </a>

            <button type="button" class="top-btn" onclick="toggleLanguage()">
                <i data-lucide="languages" width="16"></i>
                <span id="language-button">العربية</span>
            </button>
        </div>

    </div>
</header>

<main class="page">

    <div class="breadcrumb">
        <a href="{{ route('admin.dashboard') }}" data-i18n="dashboard">Tableau de bord</a>
        <i data-lucide="chevron-right" width="14"></i>
        <a href="{{ route('admin.cours.index') }}" data-i18n="courses">Cours</a>
        <i data-lucide="chevron-right" width="14"></i>
        <span data-i18n="newCourse">Nouveau cours</span>
    </div>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-tag">
                <i data-lucide="sparkles" width="14"></i>
                <span data-i18n="heroTag">ESPACE ADMINISTRATEUR</span>
            </div>

            <h1 data-i18n="pageTitle">Ajouter un nouveau cours</h1>

            <p data-i18n="subtitle">
                Préparez un contenu pédagogique complet avec texte, vidéo et document PDF.
            </p>
        </div>

        <div class="hero-icon">
            <i data-lucide="book-open" width="43"></i>
        </div>
    </section>

    <div class="layout">

        <!-- MAIN FORM -->
        <section class="form-card">

            <div class="section-heading">
                <div class="section-icon">
                    <i data-lucide="file-pen-line" width="22"></i>
                </div>
                <div>
                    <h2 data-i18n="formHeading">Informations du cours</h2>
                    <p data-i18n="formSubtitle">Complétez les informations ci-dessous</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="error-box">
                    <strong data-i18n="errorsTitle">Veuillez corriger les erreurs suivantes :</strong>
                    <ul class="list-disc ps-5 mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('admin.cours.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <!-- FORMATION -->
                <div class="field">
                    <label for="formation_id" data-i18n="formation">
                        Formation <span class="required">*</span>
                    </label>

                    <p class="field-hint" data-i18n="formationHint">اختاري التكوين الذي سينتمي إليه الدرس</p>

                    <select name="formation_id" id="formation_id" required class="control">
                        <option value="" data-i18n="chooseFormation">-- Choisir une formation --</option>

                        @foreach ($formations as $formation)
                            <option value="{{ $formation->id }}"
                                {{ old('formation_id') == $formation->id ? 'selected' : '' }}>
                                {{ $formation->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('formation_id')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TITLE -->
                <div class="field">
                    <label for="title" data-i18n="courseTitle">
                        Titre du cours <span class="required">*</span>
                    </label>

                    <input id="title"
                           type="text"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           class="control"
                           data-i18n-placeholder="titlePlaceholder"
                           placeholder="Exemple : Introduction au HTML">

                    @error('title')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- DESCRIPTION -->
                <div class="field">
                    <label for="description" data-i18n="description">Description</label>

                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="control"
                              data-i18n-placeholder="descriptionPlaceholder"
                              placeholder="Présentez brièvement le cours...">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CONTENT -->
                <div class="field">
                    <label for="content" data-i18n="content">Contenu pédagogique</label>

                    <textarea id="content"
                              name="content"
                              rows="7"
                              class="control"
                              data-i18n-placeholder="contentPlaceholder"
                              placeholder="Écrivez ici le contenu du cours...">{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- VIDEO -->
                <div class="field">
                    <label data-i18n="videoTitle">Vidéo du cours</label>

                    <div class="upload-box">
                        <div class="upload-icon">
                            <i data-lucide="video" width="27"></i>
                        </div>

                        <p class="upload-title" data-i18n="uploadVideo">
                            Importer une vidéo depuis mon ordinateur
                        </p>

                        <p class="upload-description" data-i18n="videoFormats">
                            Formats acceptés : MP4, WebM, MOV, M4V
                        </p>

                        <p class="upload-description" data-i18n="videoLimit">
                            Taille maximale prévue : 100 MB
                        </p>

                        <label for="video" class="choose-file">
                            <i data-lucide="folder-open" width="17"></i>
                            <span data-i18n="chooseVideo">Choisir une vidéo</span>
                        </label>

                        <input id="video"
                               type="file"
                               name="video"
                               accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
                               hidden>

                        <p id="video-name" class="file-name" data-i18n="noVideo">
                            Aucune vidéo sélectionnée
                        </p>
                    </div>

                    <div id="video-preview-container" class="hidden mt-4">
                        <video id="video-preview"
                               controls
                               playsinline
                               class="w-full max-h-80 rounded-xl bg-black"></video>
                    </div>

                    @error('video')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror

                    <p class="upload-description" data-i18n="videoNote">
                        La vidéo sera enregistrée sur votre plateforme, sans lien YouTube.
                    </p>
                </div>

                
<!-- DEUXIÈME VIDÉO -->
<div class="field">
    <label for="video2">
        <i data-lucide="video" width="16"
           style="display:inline-block;vertical-align:middle"></i>
        Deuxième vidéo du cours
    </label>

    <div class="upload-box">
        <div class="upload-icon">
            <i data-lucide="video" width="27"></i>
        </div>

        <p class="upload-title">
            Importer une deuxième vidéo
        </p>

        <p class="upload-description">
            Formats acceptés : MP4, WebM, MOV, M4V
        </p>

        <p class="upload-description">
            Vidéo facultative — maximum prévu : 100 MB
        </p>

        <label for="video2" class="choose-file">
            <i data-lucide="folder-open" width="17"></i>
            <span>Choisir la deuxième vidéo</span>
        </label>

        <input
            id="video2"
            type="file"
            name="video2"
            accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
            hidden
        >

        <p id="video2-name" class="file-name">
            Aucune deuxième vidéo sélectionnée
        </p>
    </div>

    <div id="video2-preview-container" class="hidden mt-4">
        <video
            id="video2-preview"
            controls
            playsinline
            class="w-full max-h-80 rounded-xl bg-black">
        </video>
    </div>

    @error('video2')
        <p class="text-sm text-red-500 mt-2">
            {{ $message }}
        </p>
    @enderror
</div>


                <!-- PDF -->
                <div class="field">
                    <label data-i18n="pdfTitle">Document PDF</label>

                    <div class="upload-box pdf-box">
                        <div class="upload-icon pdf-icon">
                            <i data-lucide="file-text" width="27"></i>
                        </div>

                        <p class="upload-title" data-i18n="addPdf">Ajouter un document PDF</p>

                        <p class="upload-description" data-i18n="pdfLimit">
                            PDF uniquement — maximum 10 MB
                        </p>

                        <input id="file"
                               type="file"
                               name="file"
                               accept=".pdf,application/pdf"
                               class="mt-4 block mx-auto text-xs max-w-full">
                    </div>

                    @error('file')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ORDER -->
                <div class="field">
                    <label for="order" data-i18n="orderTitle">Ordre du cours</label>

                    <input id="order"
                           type="number"
                           name="order"
                           min="0"
                           value="{{ old('order', 0) }}"
                           class="control">

                    <p class="field-hint mt-2" data-i18n="orderHint">
                        Un nombre plus petit permet d'afficher le cours plus tôt.
                    </p>

                    @error('order')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- INFO -->
                <div class="info-note">
                    <i data-lucide="info" width="19" class="shrink-0 mt-1"></i>
                    <div>
                        <strong data-i18n="infoTitle">À retenir</strong>
                        <div data-i18n="infoText">
                            Le cours sera associé à la formation sélectionnée.
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <a href="{{ route('admin.cours.index') }}" class="action-btn action-cancel">
                        <i data-lucide="x" width="17"></i>
                        <span data-i18n="cancel">Annuler</span>
                    </a>

                    <button type="submit" class="action-btn action-save">
                        <i data-lucide="save" width="18"></i>
                        <span data-i18n="save">Enregistrer le cours</span>
                    </button>
                </div>

            </form>
        </section>

        <!-- SIDE INFORMATION -->
        <aside class="side-column">

            <div class="side-card">
                <h3 data-i18n="stepsTitle">Comment procéder ?</h3>

                <div class="step">
                    <div class="step-number">1</div>
                    <div>
                        <strong data-i18n="step1Title">Choisir la formation</strong>
                        <p data-i18n="step1Text">Sélectionnez la formation concernée par ce cours.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div>
                        <strong data-i18n="step2Title">Ajouter le contenu</strong>
                        <p data-i18n="step2Text">Saisissez le titre, la description et le contenu pédagogique.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div>
                        <strong data-i18n="step3Title">Importer les fichiers</strong>
                        <p data-i18n="step3Text">Ajoutez une vidéo et un document PDF si nécessaire.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div>
                        <strong data-i18n="step4Title">Enregistrer</strong>
                        <p data-i18n="step4Text">Cliquez sur le bouton pour enregistrer votre cours.</p>
                    </div>
                </div>
            </div>

            <div class="tip-card">
                <div class="tip-title">
                    <i data-lucide="lightbulb" width="19" class="text-emerald-600"></i>
                    <span data-i18n="tipTitle">Conseil pédagogique</span>
                </div>

                <p data-i18n="tipText">
                    Utilisez un titre clair, une description courte et un contenu bien organisé pour faciliter l'apprentissage.
                </p>

                <p dir="rtl" class="mt-3">
                    استعملي عنواناً واضحاً ومحتوى منظماً لتسهيل التعلم.
                </p>
            </div>

        </aside>

    </div>
</main>

<footer class="footer">
    <div class="font-bold text-base mb-1">
        Étude<strong>EnLigne</strong>
    </div>
    <span data-i18n="footer">Plateforme de formation en ligne · Espace administration</span>
</footer>

<script>
    const translations = {
        fr: {
            admin: "ADMINISTRATION",
            dashboard: "Tableau de bord",
            back: "Retour aux cours",
            courses: "Cours",
            newCourse: "Nouveau cours",
            heroTag: "ESPACE ADMINISTRATEUR",
            pageTitle: "Ajouter un nouveau cours",
            subtitle: "Préparez un contenu pédagogique complet avec texte, vidéo et document PDF.",
            formHeading: "Informations du cours",
            formSubtitle: "Complétez les informations ci-dessous",
            errorsTitle: "Veuillez corriger les erreurs suivantes :",
            formation: "Formation *",
            formationHint: "Sélectionnez la formation concernée par ce cours.",
            chooseFormation: "-- Choisir une formation --",
            courseTitle: "Titre du cours *",
            titlePlaceholder: "Exemple : Introduction au HTML",
            description: "Description",
            descriptionPlaceholder: "Présentez brièvement le cours...",
            content: "Contenu pédagogique",
            contentPlaceholder: "Écrivez ici le contenu du cours...",
            videoTitle: "Vidéo du cours",
            uploadVideo: "Importer une vidéo depuis mon ordinateur",
            videoFormats: "Formats acceptés : MP4, WebM, MOV, M4V",
            videoLimit: "Taille maximale prévue : 100 MB",
            chooseVideo: "Choisir une vidéo",
            noVideo: "Aucune vidéo sélectionnée",
            videoNote: "La vidéo sera enregistrée sur votre plateforme, sans lien YouTube.",
            pdfTitle: "Document PDF",
            addPdf: "Ajouter un document PDF",
            pdfLimit: "PDF uniquement — maximum 10 MB",
            orderTitle: "Ordre du cours",
            orderHint: "Un nombre plus petit permet d'afficher le cours plus tôt.",
            infoTitle: "À retenir",
            infoText: "Le cours sera associé à la formation sélectionnée.",
            cancel: "Annuler",
            save: "Enregistrer le cours",
            stepsTitle: "Comment procéder ?",
            step1Title: "Choisir la formation",
            step1Text: "Sélectionnez la formation concernée par ce cours.",
            step2Title: "Ajouter le contenu",
            step2Text: "Saisissez le titre, la description et le contenu pédagogique.",
            step3Title: "Importer les fichiers",
            step3Text: "Ajoutez une vidéo et un document PDF si nécessaire.",
            step4Title: "Enregistrer",
            step4Text: "Cliquez sur le bouton pour enregistrer votre cours.",
            tipTitle: "Conseil pédagogique",
            tipText: "Utilisez un titre clair, une description courte et un contenu bien organisé pour faciliter l'apprentissage.",
            footer: "Plateforme de formation en ligne · Espace administration"
        },

        ar: {
            admin: "الإدارة",
            dashboard: "لوحة التحكم",
            back: "الرجوع إلى الدروس",
            courses: "الدروس",
            newCourse: "درس جديد",
            heroTag: "فضاء الإدارة",
            pageTitle: "إضافة درس جديد",
            subtitle: "حضّري محتوى تعليمياً متكاملاً يتضمن النص والفيديو وملف PDF.",
            formHeading: "معلومات الدرس",
            formSubtitle: "املئي المعلومات التالية",
            errorsTitle: "يرجى تصحيح الأخطاء التالية:",
            formation: "التكوين *",
            formationHint: "اختاري التكوين الذي سينتمي إليه الدرس.",
            chooseFormation: "-- اختاري التكوين --",
            courseTitle: "عنوان الدرس *",
            titlePlaceholder: "مثال: مقدمة في HTML",
            description: "وصف الدرس",
            descriptionPlaceholder: "قدمي وصفاً مختصراً للدرس...",
            content: "المحتوى التعليمي",
            contentPlaceholder: "اكتبي هنا المحتوى التعليمي للدرس...",
            videoTitle: "فيديو الدرس",
            uploadVideo: "تحميل فيديو من الحاسوب",
            videoFormats: "الصيغ المقبولة: MP4 وWebM وMOV وM4V",
            videoLimit: "الحجم الأقصى المتوقع: 100 ميغابايت",
            chooseVideo: "اختيار فيديو",
            noVideo: "لم يتم اختيار أي فيديو",
            videoNote: "سيتم حفظ الفيديو على المنصة دون الحاجة إلى رابط YouTube.",
            pdfTitle: "ملف PDF",
            addPdf: "إضافة ملف PDF",
            pdfLimit: "ملف PDF فقط — الحد الأقصى 10 ميغابايت",
            orderTitle: "ترتيب الدرس",
            orderHint: "الرقم الأصغر يسمح بعرض الدرس في ترتيب أبكر.",
            infoTitle: "معلومة مهمة",
            infoText: "سيتم ربط الدرس بالتكوين الذي اخترته.",
            cancel: "إلغاء",
            save: "حفظ الدرس",
            stepsTitle: "كيفاش تضيفي الدرس؟",
            step1Title: "اختيار التكوين",
            step1Text: "اختاري التكوين المرتبط بهذا الدرس.",
            step2Title: "إضافة المحتوى",
            step2Text: "أدخلي العنوان والوصف والمحتوى التعليمي.",
            step3Title: "إضافة الملفات",
            step3Text: "أضيفي الفيديو وملف PDF عند الحاجة.",
            step4Title: "حفظ الدرس",
            step4Text: "اضغطي على الزر لحفظ الدرس.",
            tipTitle: "نصيحة تعليمية",
            tipText: "استعملي عنواناً واضحاً ووصفاً قصيراً ومحتوى منظماً لتسهيل التعلم.",
            footer: "منصة للتكوين عن بعد · فضاء الإدارة"
        }
    };

    function applyLanguage(lang) {
        const dict = translations[lang] || translations.fr;

        document.documentElement.lang = lang;
        document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";

        document.querySelectorAll("[data-i18n]").forEach(element => {
            const key = element.getAttribute("data-i18n");
            if (Object.prototype.hasOwnProperty.call(dict, key)) {
                element.textContent = dict[key];
            }
        });

        document.querySelectorAll("[data-i18n-placeholder]").forEach(element => {
            const key = element.getAttribute("data-i18n-placeholder");
            if (Object.prototype.hasOwnProperty.call(dict, key)) {
                element.placeholder = dict[key];
            }
        });

        const languageButton = document.getElementById("language-button");
        if (languageButton) {
            languageButton.textContent = lang === "ar" ? "Français" : "العربية";
        }

        document.querySelectorAll(".back-icon").forEach(icon => {
            icon.style.transform = lang === "ar" ? "scaleX(-1)" : "scaleX(1)";
        });

        try {
            localStorage.setItem("etudierenligne_admin_language", lang);
        } catch (error) {
            // La page fonctionne aussi si le stockage local est désactivé.
        }

        if (window.lucide) {
            lucide.createIcons();
        }
    }

    function toggleLanguage() {
        const current = document.documentElement.lang;
        applyLanguage(current === "ar" ? "fr" : "ar");
    }

    // Aperçu local de la vidéo sélectionnée
    const videoInput = document.getElementById("video");
    const videoName = document.getElementById("video-name");
    const previewContainer = document.getElementById("video-preview-container");
    const videoPreview = document.getElementById("video-preview");
    let currentVideoUrl = null;

    videoInput.addEventListener("change", function () {
        const file = this.files && this.files[0];

        if (currentVideoUrl) {
            URL.revokeObjectURL(currentVideoUrl);
            currentVideoUrl = null;
        }

        if (!file) {
            previewContainer.classList.add("hidden");
            videoPreview.removeAttribute("src");
            videoPreview.load();
            videoName.textContent = translations[document.documentElement.lang].noVideo;
            return;
        }

        videoName.textContent =
            file.name + " (" + (file.size / (1024 * 1024)).toFixed(1) + " MB)";

        currentVideoUrl = URL.createObjectURL(file);
        videoPreview.src = currentVideoUrl;
        previewContainer.classList.remove("hidden");
    });

    // Appliquer la langue sauvegardée
    let savedLanguage = "fr";

    try {
        savedLanguage = localStorage.getItem("etudierenligne_admin_language") || "fr";
    } catch (error) {
        savedLanguage = "fr";
    }

    applyLanguage(savedLanguage);
</script>

</body>
</html>
