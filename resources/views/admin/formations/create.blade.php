<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une formation | CAD ACADEMY</title>

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
            --card: #FFFFFF;
            --border: #EDEDED;
            --text: #1F1F1F;
            --muted: #6E6E6E;
            --radius: 12px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', Inter, Arial, sans-serif;
            background: var(--soft);
            color: var(--text);
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Cairo', 'Plus Jakarta Sans', Arial, sans-serif; }

        i[data-lucide], svg.lucide { width: 18px; height: 18px; flex-shrink: 0; }
        [dir="rtl"] .flip svg, [dir="rtl"] .flip i { transform: scaleX(-1); }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); position: relative; }
        .topbar::after { content: ""; position: absolute; inset-inline: 0; bottom: 0; height: 4px; background: var(--red-700); }
        .topbar-inner {
            max-width: 1000px; margin: 0 auto; padding: 16px 16px 20px;
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

        .container { max-width: 1000px; margin: 0 auto; padding: 26px 16px 48px; }

        /* ---------- En-tête ---------- */
        .header { margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 26px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; }
        .header p { margin: 4px 0 0; color: var(--muted); font-size: 13px; }

        /* ---------- Boutons ---------- */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 16px; border-radius: 10px; font-family: inherit; font-size: 13.5px; font-weight: 700;
            text-decoration: none; cursor: pointer; border: 1px solid transparent; transition: background .15s, border-color .15s;
        }
        .btn svg { width: 16px; height: 16px; }
        .btn:focus-visible, .lang-switch button:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }
        .btn-top { background: #fff; color: var(--red); }
        .btn-top:hover { background: var(--red-50); }
        .btn-light { background: #fff; color: #444; border-color: var(--border); }
        .btn-light:hover { background: var(--soft); border-color: #D4D4D4; }
        .btn-primary { background: var(--red); color: #fff; padding: 12px 22px; }
        .btn-primary:hover { background: var(--red-700); }
        .btn-add { background: var(--red-50); color: var(--red-700); border: 1.5px dashed var(--red-200); width: 100%; padding: 13px; }
        .btn-add:hover { background: var(--red-100); }
        .btn-remove { background: #fff; color: var(--red); border-color: var(--red-200); padding: 7px 11px; font-size: 12px; }
        .btn-remove:hover { background: var(--red-50); }

        /* ---------- Cartes ---------- */
        .panel { background: var(--card); border: 1px solid var(--border); border-radius: var(--radius); padding: 20px; margin-bottom: 16px; }
        .panel-title { display: flex; align-items: center; gap: 10px; margin: 0 0 16px; font-size: 16px; font-weight: 800; color: var(--ink); }
        .panel-title .ico { width: 32px; height: 32px; border-radius: 9px; background: var(--red-50); color: var(--red); display: grid; place-items: center; }
        .panel-title .ico svg { width: 17px; height: 17px; }
        .panel-sub { margin: -8px 0 16px; color: var(--muted); font-size: 12.5px; line-height: 1.6; }

        /* ---------- Champs ---------- */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 16px; }
        .field { margin-bottom: 14px; }
        .grid-2 .field { margin-bottom: 0; }
        .grid-2 + .field { margin-top: 14px; }
        .field:last-child { margin-bottom: 0; }

        label.lbl { display: block; font-size: 12.5px; font-weight: 700; color: var(--ink); margin-bottom: 6px; }
        label.lbl .req { color: var(--red); }

        input[type="text"], select, textarea {
            width: 100%; padding: 10px 12px; border: 1px solid #D9D9D9; border-radius: 10px; background: #fff;
            font-size: 13.5px; font-family: inherit; color: var(--text); transition: border-color .15s, box-shadow .15s;
        }
        input[type="text"]::placeholder, textarea::placeholder { color: #A3A3A3; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .13); }
        textarea { min-height: 80px; resize: vertical; line-height: 1.5; }

        /* ---------- Alertes ---------- */
        .alert { display: flex; gap: 12px; padding: 13px 15px; border-radius: 12px; margin-bottom: 16px; line-height: 1.55; font-size: 13.5px; }
        .alert svg { margin-top: 2px; }
        .alert ul { margin: 6px 0 0; padding-inline-start: 18px; }
        .alert-error { background: var(--red-50); border: 1px solid var(--red-200); color: var(--red-700); }
        .alert-success { background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); color: var(--ink); }

        /* ---------- Cartes de cours ---------- */
        .course-card { border: 1px solid var(--border); border-inline-start: 4px solid var(--red); background: #fff; border-radius: 12px; padding: 16px; margin-bottom: 14px; }
        .course-header { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 14px; }
        .course-badge { display: flex; align-items: center; gap: 10px; min-width: 0; }
        .course-num { width: 30px; height: 30px; border-radius: 9px; background: var(--ink); color: #fff; display: grid; place-items: center; font-weight: 800; font-size: 13px; flex-shrink: 0; }
        .course-title { margin: 0; font-size: 15px; font-weight: 800; color: var(--ink); }
        .files-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px 16px; margin-top: 14px; }

        /* ---------- Zones de fichiers ---------- */
        .dropzone {
            position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 6px; text-align: center; padding: 16px 12px;
            border: 1.5px dashed #CFCFCF; border-radius: 12px; background: #fff; cursor: pointer; transition: border-color .15s, background .15s;
        }
        .dropzone:hover, .dropzone.dragover { border-color: var(--red); background: var(--red-50); }
        .dropzone input[type="file"] { position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; font-size: 0; }
        .dz-icon { width: 38px; height: 38px; border-radius: 10px; display: grid; place-items: center; }
        .dz-icon svg { width: 19px; height: 19px; }
        .dz-pdf .dz-icon { background: var(--red-100); color: var(--red-700); }
        .dz-video .dz-icon { background: var(--ink); color: #fff; }
        .dz-main { font-weight: 700; font-size: 13px; color: var(--text); }
        .dz-main .link { color: var(--red); text-decoration: underline; }
        .dz-hint { font-size: 11.5px; color: var(--muted); line-height: 1.5; }

        .file-info {
            display: none; align-items: center; gap: 8px; margin-top: 8px; padding: 8px 10px; border-radius: 9px;
            background: var(--red-50); border: 1px solid var(--red-100); color: var(--red-700); font-size: 12px; font-weight: 600;
        }
        .file-info.show { display: flex; }
        .file-info svg { width: 15px; height: 15px; }
        .file-label { overflow-wrap: anywhere; flex: 1; min-width: 0; }
        .file-clear { border: none; background: transparent; color: var(--red); cursor: pointer; padding: 2px; display: grid; place-items: center; border-radius: 6px; }
        .file-clear:hover { background: var(--red-100); }
        .file-clear svg { width: 15px; height: 15px; }

        .video-preview { display: none; width: 100%; max-height: 260px; margin-top: 10px; border-radius: 10px; background: var(--ink); }

        /* ---------- Actions ---------- */
        .actions { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
        .panel.actions-panel { padding: 14px 20px; margin-bottom: 0; }

        @media (max-width: 820px) { .files-grid { grid-template-columns: 1fr; } }
        @media (max-width: 640px) {
            .container { padding: 18px 10px 36px; }
            .topbar-inner { padding: 14px 10px 18px; }
            .topbar-actions { width: 100%; justify-content: space-between; }
            .topbar-actions .btn-top { flex: 1; }
            .panel { padding: 15px; }
            .grid-2 { grid-template-columns: 1fr; }
            .header h1 { font-size: 21px; }
            .actions { flex-direction: column-reverse; align-items: stretch; }
            .actions .btn { width: 100%; }
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

                <a href="{{ route('admin.formations.index') }}" class="btn btn-top flip">
                    <i data-lucide="arrow-left"></i> <span data-i18n="back">Retour aux formations</span>
                </a>
            </div>
        </div>
    </header>

<div class="container">

    <!-- ===== A. EN-TÊTE ===== -->
    <div class="header">
        <h1 data-i18n="title">Ajouter une formation</h1>
        <p data-i18n="subtitle">Créez une formation et ajoutez ses cours, documents PDF et vidéos.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <i data-lucide="alert-circle"></i>
            <div>
                <strong data-i18n="errorsTitle">Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form
        action="{{ route('admin.formations.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <!-- ===== B. INFORMATIONS DE LA FORMATION ===== -->
        <div class="panel">
            <h2 class="panel-title">
                <span class="ico"><i data-lucide="info"></i></span>
                <span data-i18n="infoTitle">Informations de la formation</span>
            </h2>

            <div class="grid-2">
                <div class="field">
                    <label class="lbl" for="name">
                        <span data-i18n="nameLbl">Nom de la formation</span> <span class="req">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Exemple : Développement Web"
                        data-i18n-ph="namePh"
                        required
                    >
                </div>

                <div class="field">
                    <label class="lbl" for="category">
                        <span data-i18n="catLbl">Catégorie</span> <span class="req">*</span>
                    </label>
                    <select id="category" name="category" required>
                        <option value="" data-i18n="catPlaceholder">-- Choisir une catégorie --</option>

                        @php
                            $categories = [
                                'Design & Programmation',
                                'Informatique bureautique',
                                'Aide médicale et administrative',
                                'Hôtellerie & restauration',
                                'Secrétariat',
                                'Commerce',
                                'Métiers & artisanat',
                                "Programmes d'ingénierie",
                            ];

                            // Libellés arabes affichés uniquement (la valeur envoyée reste en français)
                            $categoriesAr = [
                                'Design & Programmation' => 'التصميم والبرمجة',
                                'Informatique bureautique' => 'المعلوميات المكتبية',
                                'Aide médicale et administrative' => 'المساعدة الطبية والإدارية',
                                'Hôtellerie & restauration' => 'الفندقة والمطعمة',
                                'Secrétariat' => 'السكرتارية',
                                'Commerce' => 'التجارة',
                                'Métiers & artisanat' => 'المهن والصناعة التقليدية',
                                "Programmes d'ingénierie" => 'برامج الهندسة',
                            ];
                        @endphp

                        @foreach($categories as $category)
                            <option
                                value="{{ $category }}"
                                data-fr="{{ $category }}"
                                data-ar="{{ $categoriesAr[$category] ?? $category }}"
                                {{ old('category') === $category ? 'selected' : '' }}
                            >
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="lbl" for="description" data-i18n="descLbl">Description de la formation</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Présentez cette formation : objectifs, public visé, prérequis..."
                    data-i18n-ph="descPh"
                >{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- ===== C. CONTENU DES COURS ===== -->
        <div class="panel">
            <h2 class="panel-title">
                <span class="ico"><i data-lucide="book-open"></i></span>
                <span data-i18n="coursesTitle">Contenu des cours</span>
            </h2>
            <p class="panel-sub" data-i18n="coursesSub">
                Ajoutez un ou plusieurs cours. Chaque cours peut contenir du texte,
                un document PDF et deux vidéos depuis votre ordinateur.
            </p>

            <div id="courses-container"></div>

            <button type="button" class="btn btn-add" id="add-course">
                <i data-lucide="plus-circle"></i> <span data-i18n="addCourse">Ajouter un autre cours</span>
            </button>
        </div>

        <!-- ===== E. ACTIONS FINALES ===== -->
        <div class="panel actions-panel">
            <div class="actions">
                <a href="{{ route('admin.formations.index') }}" class="btn btn-light">
                    <i data-lucide="x"></i> <span data-i18n="cancel">Annuler</span>
                </a>

                <button type="submit" class="btn btn-primary">
                    <i data-lucide="save"></i> <span data-i18n="save">Enregistrer la formation</span>
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Modèle d'un cours (utilisé pour le premier cours et les cours ajoutés) -->
<template id="course-template">
    <div class="course-card" data-course-card>
        <div class="course-header">
            <div class="course-badge">
                <span class="course-num" data-course-num>1</span>
                <h3 class="course-title">Cours 1</h3>
            </div>

            <button type="button" class="btn btn-remove" data-remove style="display:none;">
                <i data-lucide="trash-2"></i> <span data-i18n="removeCourse">Supprimer ce cours</span>
            </button>
        </div>

        <div class="field">
            <label class="lbl">
                <span data-i18n="cTitle">Titre du cours</span> <span class="req">*</span>
            </label>
            <input
                type="text"
                name="courses[__INDEX__][title]"
                data-field="title"
                placeholder="Exemple : Introduction au cours"
                data-i18n-ph="cTitlePh"
                required
            >
        </div>

        <div class="grid-2" style="margin-top:14px;">
            <div class="field">
                <label class="lbl" data-i18n="cDesc">Description du cours</label>
                <textarea
                    name="courses[__INDEX__][description]"
                    data-field="description"
                    placeholder="Courte description du cours..."
                    data-i18n-ph="cDescPh"
                ></textarea>
            </div>

            <div class="field">
                <label class="lbl" data-i18n="cContent">Contenu textuel du cours</label>
                <textarea
                    name="courses[__INDEX__][content]"
                    data-field="content"
                    placeholder="Écrivez ici le contenu du cours..."
                    data-i18n-ph="cContentPh"
                ></textarea>
            </div>
        </div>

        <div class="files-grid">
            <!-- PDF -->
            <div>
                <label class="lbl" data-i18n="pdfLbl">Document PDF</label>
                <div class="dropzone dz-pdf" data-dropzone>
                    <input
                        type="file"
                        name="courses[__INDEX__][pdf]"
                        accept=".pdf,application/pdf"
                        data-pdf-input
                    >
                    <div class="dz-icon"><i data-lucide="file-text"></i></div>
                    <div class="dz-main">
                        <span class="link" data-i18n="pdfChoose">Choisir un PDF</span>
                        <span data-i18n="dragDrop">ou glisser-déposer</span>
                    </div>
                    <div class="dz-hint" data-i18n="pdfHint">PDF uniquement — maximum 10 Mo.</div>
                </div>
                <div class="file-info" data-pdf-info>
                    <i data-lucide="file-check"></i>
                    <span class="file-label" data-pdf-name></span>
                    <button type="button" class="file-clear" data-pdf-clear data-i18n-title="removeFile" title="Retirer le fichier">
                        <i data-lucide="x"></i>
                    </button>
                </div>
            </div>

            <!-- Vidéo 1 -->
            <div data-video-block>
                <label class="lbl" data-i18n="videoLbl">Vidéo 1 du cours</label>
                <div class="dropzone dz-video" data-dropzone>
                    <input
                        type="file"
                        name="courses[__INDEX__][video]"
                        accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
                        data-video-input
                    >
                    <div class="dz-icon"><i data-lucide="video"></i></div>
                    <div class="dz-main">
                        <span class="link" data-i18n="videoChoose">Choisir une vidéo</span>
                        <span data-i18n="dragDrop">ou glisser-déposer</span>
                    </div>
                    <div class="dz-hint" data-i18n="videoHint">MP4, WebM, MOV, M4V — maximum prévu : 100 Mo.</div>
                </div>
                <div class="file-info" data-video-info>
                    <i data-lucide="file-video"></i>
                    <span class="file-label" data-video-name></span>
                    <button type="button" class="file-clear" data-video-clear data-i18n-title="removeFile" title="Retirer la vidéo">
                        <i data-lucide="x"></i>
                    </button>
                </div>
                <video
                    class="video-preview"
                    controls
                    playsinline
                    data-video-preview
                ></video>
            </div>

            <!-- Vidéo 2 -->
            <div data-video-block>
                <label class="lbl" data-i18n="videoLbl2">Vidéo 2 du cours</label>
                <div class="dropzone dz-video" data-dropzone>
                    <input
                        type="file"
                        name="courses[__INDEX__][video2]"
                        accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
                        data-video-input
                    >
                    <div class="dz-icon"><i data-lucide="video"></i></div>
                    <div class="dz-main">
                        <span class="link" data-i18n="videoChoose">Choisir une vidéo</span>
                        <span data-i18n="dragDrop">ou glisser-déposer</span>
                    </div>
                    <div class="dz-hint" data-i18n="videoHint">MP4, WebM, MOV, M4V — maximum prévu : 100 Mo.</div>
                </div>
                <div class="file-info" data-video-info>
                    <i data-lucide="file-video"></i>
                    <span class="file-label" data-video-name></span>
                    <button type="button" class="file-clear" data-video-clear data-i18n-title="removeFile" title="Retirer la vidéo">
                        <i data-lucide="x"></i>
                    </button>
                </div>
                <video
                    class="video-preview"
                    controls
                    playsinline
                    data-video-preview
                ></video>
            </div>
        </div>
    </div>
</template>

<script>
    // ================= TRADUCTIONS (FR / AR) =================
    const I18N = {
        fr: {
            title: 'Ajouter une formation',
            subtitle: 'Créez une formation et ajoutez ses cours, documents PDF et vidéos.',
            back: 'Retour aux formations',
            errorsTitle: 'Veuillez corriger les erreurs suivantes :',
            infoTitle: 'Informations de la formation',
            nameLbl: 'Nom de la formation',
            namePh: 'Exemple : Développement Web',
            catLbl: 'Catégorie',
            catPlaceholder: '-- Choisir une catégorie --',
            descLbl: 'Description de la formation',
            descPh: 'Présentez cette formation : objectifs, public visé, prérequis...',
            coursesTitle: 'Contenu des cours',
            coursesSub: 'Ajoutez un ou plusieurs cours. Chaque cours peut contenir du texte, un document PDF et deux vidéos depuis votre ordinateur.',
            addCourse: 'Ajouter un autre cours',
            cancel: 'Annuler',
            save: 'Enregistrer la formation',
            course: 'Cours',
            removeCourse: 'Supprimer ce cours',
            cTitle: 'Titre du cours',
            cTitlePh: 'Exemple : Introduction au cours',
            cDesc: 'Description du cours',
            cDescPh: 'Courte description du cours...',
            cContent: 'Contenu textuel du cours',
            cContentPh: 'Écrivez ici le contenu du cours...',
            pdfLbl: 'Document PDF',
            pdfChoose: 'Choisir un PDF',
            dragDrop: 'ou glisser-déposer',
            pdfHint: 'PDF uniquement — maximum 10 Mo.',
            videoLbl: 'Vidéo 1 du cours',
            videoLbl2: 'Vidéo 2 du cours',
            videoChoose: 'Choisir une vidéo',
            videoHint: 'MP4, WebM, MOV, M4V — maximum prévu : 100 Mo.',
            removeFile: 'Retirer le fichier',
            pdfSelected: 'Fichier sélectionné : ',
            videoSelected: 'Vidéo sélectionnée : ',
            mb: 'Mo',
            kb: 'Ko'
        },
        ar: {
            title: 'إضافة تكوين',
            subtitle: 'أنشئ تكوينًا وأضف دروسه وملفات PDF والفيديوهات.',
            back: 'العودة إلى التكوينات',
            errorsTitle: 'يرجى تصحيح الأخطاء التالية :',
            infoTitle: 'معلومات التكوين',
            nameLbl: 'اسم التكوين',
            namePh: 'مثال : تطوير الويب',
            catLbl: 'الفئة',
            catPlaceholder: '-- اختر فئة --',
            descLbl: 'وصف التكوين',
            descPh: 'قدّم هذا التكوين : الأهداف، الفئة المستهدفة، المتطلبات...',
            coursesTitle: 'محتوى الدروس',
            coursesSub: 'أضف درسًا واحدًا أو أكثر. يمكن أن يحتوي كل درس على نص وملف PDF وفيديوهين من حاسوبك.',
            addCourse: 'إضافة درس آخر',
            cancel: 'إلغاء',
            save: 'حفظ التكوين',
            course: 'الدرس',
            removeCourse: 'حذف هذا الدرس',
            cTitle: 'عنوان الدرس',
            cTitlePh: 'مثال : مقدمة الدرس',
            cDesc: 'وصف الدرس',
            cDescPh: 'وصف مختصر للدرس...',
            cContent: 'المحتوى النصي للدرس',
            cContentPh: 'اكتب هنا محتوى الدرس...',
            pdfLbl: 'ملف PDF',
            pdfChoose: 'اختيار ملف PDF',
            dragDrop: 'أو اسحب وأفلت',
            pdfHint: 'ملف PDF فقط — الحد الأقصى 10 ميغابايت.',
            videoLbl: 'الفيديو 1 للدرس',
            videoLbl2: 'الفيديو 2 للدرس',
            videoChoose: 'اختيار فيديو',
            videoHint: 'MP4 و WebM و MOV و M4V — الحد الأقصى المتوقع : 100 ميغابايت.',
            removeFile: 'إزالة الملف',
            pdfSelected: 'الملف المحدد : ',
            videoSelected: 'الفيديو المحدد : ',
            mb: 'م.ب',
            kb: 'ك.ب'
        }
    };

    let currentLang = 'fr';

    function t(key) {
        return (I18N[currentLang] && I18N[currentLang][key]) || I18N.fr[key] || key;
    }

    function applyLang(root) {
        root.querySelectorAll('[data-i18n]').forEach(function (el) {
            el.textContent = t(el.dataset.i18n);
        });
        root.querySelectorAll('[data-i18n-ph]').forEach(function (el) {
            el.placeholder = t(el.dataset.i18nPh);
        });
        root.querySelectorAll('[data-i18n-title]').forEach(function (el) {
            el.title = t(el.dataset.i18nTitle);
        });
        root.querySelectorAll('option[data-ar]').forEach(function (opt) {
            opt.textContent = currentLang === 'ar' ? opt.dataset.ar : opt.dataset.fr;
        });
    }

    function setLang(lang, persist) {
        currentLang = lang === 'ar' ? 'ar' : 'fr';

        document.documentElement.lang = currentLang;
        document.documentElement.dir = currentLang === 'ar' ? 'rtl' : 'ltr';
        document.title = currentLang === 'ar'
            ? 'إضافة تكوين | CAD ACADEMY'
            : 'Ajouter une formation | CAD ACADEMY';

        document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
            btn.classList.toggle('active', btn.dataset.langBtn === currentLang);
        });

        applyLang(document);
        updateCourseTitles();

        if (persist) {
            try { localStorage.setItem('etudeenligne_lang', currentLang); } catch (e) {}
        }
    }

    // ================= COURS DYNAMIQUES =================
    // Anciennes valeurs (old) conservées après une erreur de validation.
    const oldCourses = @json(old('courses', [[]]));

    const container = document.getElementById('courses-container');
    const addCourseButton = document.getElementById('add-course');
    const template = document.getElementById('course-template');

    let courseIndex = 0;

    function refreshIcons() {
        if (window.lucide) {
            lucide.createIcons();
        }
    }

    function formatSize(bytes) {
        if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' ' + t('mb');
        return Math.max(1, Math.round(bytes / 1024)) + ' ' + t('kb');
    }

    function updateCourseTitles() {
        const cards = container.querySelectorAll('[data-course-card]');

        cards.forEach((card, index) => {
            const title = card.querySelector('.course-title');
            const num = card.querySelector('[data-course-num]');

            if (title) title.textContent = t('course') + ' ' + (index + 1);
            if (num) num.textContent = index + 1;

            const removeButton = card.querySelector('.btn-remove');

            if (removeButton) {
                removeButton.style.display =
                    cards.length > 1 ? 'inline-flex' : 'none';
            }
        });
    }

    function attachFileListeners(card) {
        // ----- PDF -----
        const pdfInput = card.querySelector('[data-pdf-input]');
        const pdfName = card.querySelector('[data-pdf-name]');
        const pdfInfo = card.querySelector('[data-pdf-info]');
        const pdfClear = card.querySelector('[data-pdf-clear]');

        if (pdfInput && pdfName) {
            pdfInput.addEventListener('change', function () {
                if (this.files.length) {
                    pdfName.textContent = t('pdfSelected') + this.files[0].name
                        + ' (' + formatSize(this.files[0].size) + ')';
                    pdfInfo.classList.add('show');
                } else {
                    pdfName.textContent = '';
                    pdfInfo.classList.remove('show');
                }
            });

            pdfClear.addEventListener('click', function () {
                pdfInput.value = '';
                pdfInput.dispatchEvent(new Event('change'));
            });
        }

        // ----- Vidéos (deux champs par cours) -----
        card.querySelectorAll('[data-video-block]').forEach(function (block) {
        const videoInput = block.querySelector('[data-video-input]');
        const videoName = block.querySelector('[data-video-name]');
        const videoInfo = block.querySelector('[data-video-info]');
        const videoClear = block.querySelector('[data-video-clear]');
        const videoPreview = block.querySelector('[data-video-preview]');

        if (videoInput && videoName && videoPreview) {
            videoInput.addEventListener('change', function () {
                const file = this.files[0];

                if (videoPreview.dataset.objectUrl) {
                    URL.revokeObjectURL(videoPreview.dataset.objectUrl);
                    delete videoPreview.dataset.objectUrl;
                }

                if (!file) {
                    videoName.textContent = '';
                    videoInfo.classList.remove('show');
                    videoPreview.removeAttribute('src');
                    videoPreview.load();
                    videoPreview.style.display = 'none';
                    return;
                }

                videoName.textContent = t('videoSelected') + file.name
                    + ' (' + formatSize(file.size) + ')';
                videoInfo.classList.add('show');

                const videoUrl = URL.createObjectURL(file);

                videoPreview.src = videoUrl;
                videoPreview.dataset.objectUrl = videoUrl;
                videoPreview.style.display = 'block';
                videoPreview.load();
            });

            videoClear.addEventListener('click', function () {
                videoInput.value = '';
                videoInput.dispatchEvent(new Event('change'));
            });
        }
        });

        // ----- Glisser-déposer -----
        card.querySelectorAll('[data-dropzone]').forEach(function (zone) {
            ['dragenter', 'dragover'].forEach(function (evt) {
                zone.addEventListener(evt, function () {
                    zone.classList.add('dragover');
                });
            });

            ['dragleave', 'drop'].forEach(function (evt) {
                zone.addEventListener(evt, function () {
                    zone.classList.remove('dragover');
                });
            });
        });
    }

    function addCourse(values) {
        const index = courseIndex;
        const fragment = template.content.cloneNode(true);
        const card = fragment.querySelector('[data-course-card]');

        // Remplace l'index dans les noms de champs : courses[index][field]
        card.querySelectorAll('[name]').forEach(function (el) {
            el.name = el.name.replace('__INDEX__', index);
        });

        // Restaure les anciennes valeurs (old) pour les champs texte
        if (values) {
            ['title', 'description', 'content'].forEach(function (field) {
                const el = card.querySelector('[data-field="' + field + '"]');

                if (el && values[field] !== undefined && values[field] !== null) {
                    el.value = values[field];
                }
            });
        }

        // Suppression du cours + libération de l'URL temporaire de la vidéo
        const removeButton = card.querySelector('[data-remove]');

        removeButton.addEventListener('click', function () {
            card.querySelectorAll('[data-video-preview]').forEach(function (preview) {
                if (preview.dataset.objectUrl) {
                    URL.revokeObjectURL(preview.dataset.objectUrl);
                }
            });

            card.remove();
            updateCourseTitles();
        });

        attachFileListeners(card);
        applyLang(card);
        container.appendChild(card);
        courseIndex++;

        updateCourseTitles();
        refreshIcons();

        return card;
    }

    addCourseButton.addEventListener('click', function () {
        const card = addCourse();
        const firstInput = card.querySelector('input[type="text"]');

        if (firstInput) firstInput.focus();
    });

    document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            setLang(this.dataset.langBtn, true);
        });
    });

    // Initialisation : un cours par entrée old('courses'), sinon un cours vide.
    (function init() {
        const keys = Object.keys(oldCourses || {});

        if (!keys.length) {
            addCourse();
            return;
        }

        // Conserve les index d'origine pour que old('courses.N.*') reste cohérent.
        keys.forEach(function (key) {
            courseIndex = parseInt(key, 10);
            if (isNaN(courseIndex)) courseIndex = container.children.length;
            addCourse(oldCourses[key]);
        });
    })();

    // Langue mémorisée (partagée avec la page de la liste des formations)
    let savedLang = 'fr';
    try { savedLang = localStorage.getItem('etudeenligne_lang') || 'fr'; } catch (e) {}
    setLang(savedLang, false);

    refreshIcons();

    // Libère les URL temporaires quand la page est quittée.
    window.addEventListener('beforeunload', function () {
        document.querySelectorAll('[data-video-preview]').forEach(function (preview) {
            if (preview.dataset.objectUrl) {
                URL.revokeObjectURL(preview.dataset.objectUrl);
            }
        });
    });
</script>
</body>
</html>