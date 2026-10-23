<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une formation | ÉtudeEnLigne</title>

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
            --card: #FFFFFF;
            --border: #E5E9E8;
            --text: #1F2937;
            --muted: #6B7280;
            --danger: #B91C1C;
            --danger-bg: #FEF2F2;
            --radius: 14px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 24px 16px 48px;
            font-family: 'Plus Jakarta Sans', Inter, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Cairo', 'Plus Jakarta Sans', Arial, sans-serif; }

        .container { max-width: 1000px; margin: 0 auto; }

        i[data-lucide], svg.lucide { width: 18px; height: 18px; flex-shrink: 0; }
        [dir="rtl"] .flip svg, [dir="rtl"] .flip i { transform: scaleX(-1); }

        /* ---------- En-tête ---------- */
        .header {
            display: flex; align-items: center; justify-content: space-between;
            gap: 14px; flex-wrap: wrap; margin-bottom: 20px;
        }
        .header-title { display: flex; align-items: center; gap: 14px; }
        .header-icon {
            width: 46px; height: 46px; border-radius: 12px;
            background: linear-gradient(135deg, var(--emerald), var(--dark));
            color: #fff; display: grid; place-items: center;
            box-shadow: 0 6px 16px rgba(16, 185, 129, .3);
        }
        .header-icon svg { width: 22px; height: 22px; }
        .header h1 { margin: 0; font-size: 22px; font-weight: 800; color: var(--dark); letter-spacing: -.3px; }
        .header p { margin: 3px 0 0; color: var(--muted); font-size: 13px; }
        .header-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

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
            padding: 10px 16px; border-radius: 10px;
            font-family: inherit; font-size: 13.5px; font-weight: 700;
            text-decoration: none; cursor: pointer;
            border: 1px solid transparent; transition: all .15s ease;
        }
        .btn svg { width: 16px; height: 16px; }
        .btn-light { background: #fff; color: var(--emerald-700); border-color: var(--border); }
        .btn-light:hover { background: var(--emerald-50); border-color: var(--emerald-100); }
        .btn-primary { background: var(--emerald-600); color: #fff; padding: 12px 22px; box-shadow: 0 4px 12px rgba(5, 150, 105, .25); }
        .btn-primary:hover { background: var(--dark); }
        .btn-add { background: var(--emerald-50); color: var(--emerald-700); border: 1.5px dashed #6EE7B7; width: 100%; padding: 13px; }
        .btn-add:hover { background: var(--emerald-100); }
        .btn-remove { background: var(--danger-bg); color: var(--danger); padding: 7px 11px; font-size: 12px; }
        .btn-remove:hover { background: #FEE2E2; }

        /* ---------- Cartes ---------- */
        .panel {
            background: var(--card); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 20px; margin-bottom: 16px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
        }
        .panel-title {
            display: flex; align-items: center; gap: 10px;
            margin: 0 0 16px; font-size: 16px; font-weight: 800; color: var(--dark);
        }
        .panel-title .ico {
            width: 32px; height: 32px; border-radius: 9px;
            background: var(--emerald-50); color: var(--emerald-600);
            display: grid; place-items: center;
        }
        .panel-title .ico svg { width: 17px; height: 17px; }
        .panel-sub { margin: -8px 0 16px; color: var(--muted); font-size: 12.5px; line-height: 1.6; }

        /* ---------- Champs ---------- */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 16px; }
        .field { margin-bottom: 14px; }
        .grid-2 .field { margin-bottom: 0; }
        .grid-2 + .field { margin-top: 14px; }
        .field:last-child { margin-bottom: 0; }

        label.lbl { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 6px; }
        label.lbl .req { color: var(--emerald-600); }

        input[type="text"], select, textarea {
            width: 100%; padding: 10px 12px;
            border: 1px solid #D1D5DB; border-radius: 10px; background: #fff;
            font-size: 13.5px; font-family: inherit; color: var(--text);
            transition: border-color .15s, box-shadow .15s;
        }
        input[type="text"]::placeholder, textarea::placeholder { color: #9CA3AF; }
        input:focus, select:focus, textarea:focus {
            outline: none; border-color: var(--emerald);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .14);
        }
        textarea { min-height: 80px; resize: vertical; line-height: 1.5; }

        /* ---------- Alertes ---------- */
        .alert { display: flex; gap: 12px; padding: 13px 15px; border-radius: 12px; margin-bottom: 16px; line-height: 1.55; font-size: 13.5px; }
        .alert svg { margin-top: 2px; }
        .alert ul { margin: 6px 0 0; padding-inline-start: 18px; }
        .alert-error { background: var(--danger-bg); border: 1px solid #FECACA; color: #991B1B; }
        .alert-success { background: var(--emerald-50); border: 1px solid #A7F3D0; color: #065F46; }

        /* ---------- Cartes de cours ---------- */
        .course-card {
            border: 1px solid var(--border);
            border-inline-start: 4px solid var(--emerald);
            background: #FCFEFD; border-radius: 12px; padding: 16px; margin-bottom: 14px;
        }
        .course-header { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 14px; }
        .course-badge { display: flex; align-items: center; gap: 10px; min-width: 0; }
        .course-num {
            width: 30px; height: 30px; border-radius: 9px;
            background: var(--dark); color: #fff;
            display: grid; place-items: center; font-weight: 800; font-size: 13px; flex-shrink: 0;
        }
        .course-title { margin: 0; font-size: 15px; font-weight: 800; color: var(--dark); }
        .files-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px 16px; margin-top: 14px; }

        /* ---------- Zones de fichiers ---------- */
        .dropzone {
            position: relative; display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 6px; text-align: center; padding: 16px 12px;
            border: 1.5px dashed #CBD5D1; border-radius: 12px; background: #fff;
            cursor: pointer; transition: all .15s;
        }
        .dropzone:hover, .dropzone.dragover { border-color: var(--emerald); background: var(--emerald-50); }
        .dropzone input[type="file"] {
            position: absolute; inset: 0; width: 100%; height: 100%;
            opacity: 0; cursor: pointer; font-size: 0;
        }
        .dz-icon { width: 38px; height: 38px; border-radius: 10px; display: grid; place-items: center; }
        .dz-icon svg { width: 19px; height: 19px; }
        .dz-pdf .dz-icon { background: #FEF3C7; color: #B45309; }
        .dz-video .dz-icon { background: #DBEAFE; color: #1D4ED8; }
        .dz-main { font-weight: 700; font-size: 13px; color: var(--text); }
        .dz-main .link { color: var(--emerald-600); text-decoration: underline; }
        .dz-hint { font-size: 11.5px; color: var(--muted); line-height: 1.5; }

        .file-info {
            display: none; align-items: center; gap: 8px; margin-top: 8px;
            padding: 8px 10px; border-radius: 9px;
            background: var(--emerald-50); border: 1px solid var(--emerald-100);
            color: var(--emerald-700); font-size: 12px; font-weight: 600;
        }
        .file-info.show { display: flex; }
        .file-info svg { width: 15px; height: 15px; }
        .file-label { overflow-wrap: anywhere; flex: 1; min-width: 0; }
        .file-clear {
            border: none; background: transparent; color: var(--danger);
            cursor: pointer; padding: 2px; display: grid; place-items: center; border-radius: 6px;
        }
        .file-clear:hover { background: #FEE2E2; }
        .file-clear svg { width: 15px; height: 15px; }

        .video-preview { display: none; width: 100%; max-height: 260px; margin-top: 10px; border-radius: 10px; background: #111827; }

        /* ---------- Actions ---------- */
        .actions { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
        .panel.actions-panel { padding: 14px 20px; margin-bottom: 0; }

        /* ---------- Responsive ---------- */
        @media (max-width: 820px) {
            .files-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 640px) {
            body { padding: 14px 10px 36px; }
            .panel { padding: 15px; }
            .grid-2 { grid-template-columns: 1fr; }
            .header h1 { font-size: 19px; }
            .header-actions { width: 100%; justify-content: space-between; }
            .header-actions .btn-light { flex: 1; }
            .actions { flex-direction: column-reverse; align-items: stretch; }
            .actions .btn { width: 100%; }
        }
    </style>
</head>

<body>
<div class="container">

    <!-- ===== A. EN-TÊTE ===== -->
    <div class="header">
        <div class="header-title">
            <div class="header-icon"><i data-lucide="graduation-cap"></i></div>
            <div>
                <h1 data-i18n="title">Ajouter une formation</h1>
                <p data-i18n="subtitle">Créez une formation et ajoutez ses cours, documents PDF et vidéos.</p>
            </div>
        </div>

        <div class="header-actions">
            <!-- Option de langue : Français / العربية -->
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" data-lang-btn="fr" class="active">FR</button>
                <button type="button" data-lang-btn="ar">العربية</button>
            </div>

            <a href="{{ route('admin.formations.index') }}" class="btn btn-light flip">
                <i data-lucide="arrow-left"></i> <span data-i18n="back">Retour aux formations</span>
            </a>
        </div>
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
                un document PDF et une vidéo depuis votre ordinateur.
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
            ? 'إضافة تكوين | ÉtudeEnLigne'
            : 'Ajouter une formation | ÉtudeEnLigne';

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