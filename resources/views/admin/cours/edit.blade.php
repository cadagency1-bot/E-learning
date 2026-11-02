<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un cours | CAD ACADEMY</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--soft);
            color: var(--text);
            min-height: 100vh;
            font-size: 14px;
        }

        html[dir="rtl"] body { font-family: 'Cairo', Arial, sans-serif; }

        .hidden { display: none !important; }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); position: relative; }
        .topbar::after { content: ""; position: absolute; inset-inline: 0; bottom: 0; height: 4px; background: var(--red-700); }

        .topbar-inner {
            max-width: 780px; margin: 0 auto; padding: 16px 16px 20px;
            display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px;
        }

        .brand { display: flex; align-items: center; gap: 12px; color: #fff; text-decoration: none; }
        .brand-icon { width: 42px; height: 42px; border-radius: 10px; background: #fff; color: var(--red); display: grid; place-items: center; font-size: 20px; font-weight: 800; }
        .brand-name { font-size: 22px; font-weight: 800; letter-spacing: .5px; line-height: 1; }

        .top-actions { display: flex; flex-wrap: wrap; gap: 9px; }

        .top-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 14px; border-radius: 10px; font-family: inherit; font-size: 13px; font-weight: 700;
            text-decoration: none; cursor: pointer; border: 1px solid rgba(255, 255, 255, .6);
            background: transparent; color: #fff; transition: background .15s;
        }
        .top-btn:hover { background: rgba(0, 0, 0, .18); }
        .top-btn.light { background: #fff; color: var(--red); border-color: #fff; }
        .top-btn.light:hover { background: var(--red-50); }

        .top-btn:focus-visible, .action-btn:focus-visible, .choose-btn:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        /* ---------- Contenu ---------- */
        .wrap { max-width: 780px; margin: 0 auto; padding: 26px 16px 40px; }

        .card { background: #fff; border: 1px solid var(--border); border-top: 3px solid var(--red); border-radius: 16px; padding: 28px; }

        .title-icon { width: 48px; height: 48px; border-radius: 12px; background: var(--red-50); color: var(--red); display: grid; place-items: center; font-size: 22px; margin-bottom: 16px; }
        h1 { font-size: 26px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; margin-bottom: 6px; }
        .subtitle { color: var(--muted); line-height: 1.7; }
        .head { margin-bottom: 24px; }

        .alert { padding: 14px 16px; border-radius: 12px; margin-bottom: 22px; line-height: 1.6; }
        .alert-success { background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); color: var(--ink); }
        .alert-error { background: var(--red-50); border: 1px solid var(--red-200); color: var(--red-700); }
        .alert ul { margin-top: 6px; padding-inline-start: 20px; }
        .alert strong { display: block; }

        form.main { display: flex; flex-direction: column; gap: 24px; }

        .field-label { display: block; font-weight: 700; color: var(--ink); margin-bottom: 8px; }

        .input, select.input, textarea.input {
            width: 100%; border: 1px solid #D9D9D9; border-radius: 12px; padding: 12px 14px; background: #fff;
            font-family: inherit; font-size: 14px; color: var(--text); outline: none; transition: border-color .2s, box-shadow .2s;
        }
        .input:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .13); }
        textarea.input { line-height: 1.7; resize: vertical; }
        html[dir="rtl"] .input { text-align: right; }

        .hint { font-size: 13px; color: var(--muted); margin-top: 8px; }
        .error-text { font-size: 13px; color: var(--red-700); margin-top: 8px; }
        .selected-name { font-size: 13px; color: var(--red-700); margin-top: 8px; }

        /* ---------- Fichiers actuels ---------- */
        .media-box { background: var(--red-50); border: 1px solid var(--red-100); border-radius: 12px; padding: 16px; margin-bottom: 12px; }
        .media-box.white { background: #fff; border-color: var(--red-100); }
        .media-head { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 12px; }
        .media-head.tight { margin-bottom: 0; }
        .media-title { font-weight: 700; color: var(--red-700); }
        .media-link { display: inline-block; margin-top: 12px; color: var(--red); font-weight: 600; text-decoration: underline; }
        video { display: block; width: 100%; max-height: 320px; border-radius: 12px; background: var(--ink); }

        .delete-file-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 5px; padding: 6px 10px;
            border: 1px solid var(--red-200); border-radius: 8px; background: #fff; color: var(--red);
            font-family: inherit; font-size: 12px; font-weight: 700; cursor: pointer; white-space: nowrap;
        }
        .delete-file-btn:hover { background: var(--red-50); }

        /* ---------- Deuxième vidéo ---------- */
        .upload-box { border: 2px dashed var(--red-200); background: #fff; border-radius: 16px; padding: 20px; }
        .upload-head { text-align: center; margin-bottom: 16px; }
        .upload-emoji { font-size: 34px; margin-bottom: 10px; }
        .upload-head .t { font-weight: 800; color: var(--ink); }
        .upload-head .s { font-size: 13px; color: var(--muted); margin-top: 6px; }
        .center { text-align: center; }

        .choose-btn {
            display: inline-block; cursor: pointer; background: var(--red); color: #fff;
            font-weight: 700; padding: 12px 20px; border-radius: 12px; transition: background .2s;
        }
        .choose-btn:hover { background: var(--red-700); }

        .preview-box { margin-top: 16px; }
        .preview-box .p { font-weight: 700; font-size: 13px; margin-bottom: 8px; }

        /* ---------- Actions ---------- */
        .actions { display: flex; flex-wrap: wrap; gap: 12px; padding-top: 18px; border-top: 1px solid var(--border); }

        .action-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 20px;
            border-radius: 12px; border: none; font-family: inherit; font-size: 14px; font-weight: 700;
            text-decoration: none; cursor: pointer; transition: background .2s;
        }
        .action-save { background: var(--red); color: #fff; }
        .action-save:hover { background: var(--red-700); }
        .action-cancel { background: #F1F1F1; color: #555; }
        .action-cancel:hover { background: #E5E5E5; }

        .copyright { text-align: center; font-size: 13px; color: #9A9A9A; margin-top: 20px; }
        .copyright strong { color: var(--ink); letter-spacing: .5px; }

        @media (max-width: 600px) {
            .topbar-inner { padding: 14px 12px 18px; }
            .top-actions { width: 100%; }
            .top-btn { flex: 1; font-size: 12px; padding: 10px 8px; }
            .wrap { padding: 18px 10px 32px; }
            .card { padding: 20px 16px; }
            h1 { font-size: 22px; }
            .actions .action-btn { width: 100%; }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="topbar-inner">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon">C</span>
            <span class="brand-name">CAD ACADEMY</span>
        </a>

        <div class="top-actions">
            <a href="{{ route('admin.dashboard') }}" class="top-btn light">
                ← <span data-i18n="dashboard">Retour au tableau de bord</span>
            </a>

            <button type="button" onclick="toggleLanguage()" class="top-btn">
                🌐 <span id="language-button">العربية</span>
            </button>
        </div>
    </div>
</header>

<div class="wrap">

    <div class="card">

        <!-- TITRE -->
        <div class="head">
            <div class="title-icon">✏️</div>

            <h1 data-i18n="title">Modifier un cours</h1>

            <p class="subtitle" data-i18n="subtitle">
                Modifiez le contenu, le PDF ou les vidéos de ce cours.
            </p>
        </div>

        <!-- MESSAGES -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <strong data-i18n="errorTitle">Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORMULAIRE DE MODIFICATION -->
        <form id="edit-course-form"
              class="main"
              action="{{ route('admin.cours.update', $cours->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- FORMATION -->
            <div>
                <label class="field-label" for="formation_id" data-i18n="formation">
                    Formation
                </label>

                <select id="formation_id" name="formation_id" class="input" required>
                    @foreach($formations as $formation)
                        <option value="{{ $formation->id }}"
                            {{ old('formation_id', $cours->formation_id) == $formation->id ? 'selected' : '' }}>
                            {{ $formation->name }}
                        </option>
                    @endforeach
                </select>

                @error('formation_id')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- TITRE -->
            <div>
                <label class="field-label" for="title" data-i18n="courseTitle">
                    Titre du cours
                </label>

                <input id="title" type="text" name="title" class="input"
                       value="{{ old('title', $cours->title) }}" required>

                @error('title')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="field-label" for="description" data-i18n="description">
                    Description
                </label>

                <textarea id="description" name="description" rows="3"
                          class="input">{{ old('description', $cours->description) }}</textarea>

                @error('description')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONTENU -->
            <div>
                <label class="field-label" for="content" data-i18n="content">
                    Contenu du cours
                </label>

                <textarea id="content" name="content" rows="6"
                          class="input">{{ old('content', $cours->content) }}</textarea>

                @error('content')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- PDF -->
            <div>
                <label class="field-label" for="file" data-i18n="pdf">
                    Document PDF
                </label>

                @if($cours->file_path)
                    <div class="media-box" id="current-pdf">

                        <div class="media-head tight">
                            <p class="media-title" data-i18n="currentPdf">PDF actuel</p>

                            <button type="button"
                                    class="delete-file-btn"
                                    data-delete-url="{{ route('admin.cours.media.destroy', [$cours->id, 'pdf']) }}"
                                    onclick="deleteMedia(this)">
                                🗑️ <span data-i18n="deleteFile">Supprimer</span>
                            </button>
                        </div>

                        <a href="{{ asset('storage/' . $cours->file_path) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="media-link"
                           data-i18n="openPdf">
                            Ouvrir le PDF
                        </a>
                    </div>
                @else
                    <p class="hint" style="margin:0 0 12px;" data-i18n="noPdf">
                        Aucun PDF enregistré.
                    </p>
                @endif

                <input id="file" type="file" name="file" class="input"
                       accept=".pdf,application/pdf">

                <p class="hint" data-i18n="keepPdf">
                    Laissez vide pour conserver le PDF actuel.
                </p>

                @error('file')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- VIDEO 1 -->
            <div>
                <label class="field-label" for="video" data-i18n="video1">
                    Première vidéo du cours
                </label>

                @if($cours->video_path)
                    <div id="current-video1" class="media-box">

                        <div class="media-head">
                            <p class="media-title" data-i18n="currentVideo1">Première vidéo actuelle</p>

                            <button type="button"
                                    class="delete-file-btn"
                                    data-delete-url="{{ route('admin.cours.media.destroy', [$cours->id, 'video1']) }}"
                                    onclick="deleteMedia(this)">
                                🗑️ <span data-i18n="deleteFile">Supprimer</span>
                            </button>
                        </div>

                        <video controls playsinline preload="metadata">
                            <source src="{{ asset('storage/' . $cours->video_path) }}">
                            Votre navigateur ne prend pas en charge la vidéo.
                        </video>
                    </div>
                @else
                    <p class="hint" style="margin:0 0 12px;" data-i18n="noVideo1">
                        Aucune première vidéo enregistrée.
                    </p>
                @endif

                <input id="video" type="file" name="video" class="input"
                       accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime">

                <p class="hint" data-i18n="keepVideo1">
                    Laissez vide pour conserver la première vidéo actuelle.
                </p>

                @error('video')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <p id="video1-name" class="selected-name"></p>

                <div id="video1-preview-container" class="preview-box hidden">
                    <p class="p" data-i18n="preview1">Aperçu de la nouvelle vidéo</p>
                    <video id="video1-preview" controls playsinline></video>
                </div>
            </div>

            <!-- VIDEO 2 -->
            <div>
                <label class="field-label" for="video2" data-i18n="video2">
                    Deuxième vidéo du cours
                </label>

                <div class="upload-box">

                    <div class="upload-head">
                        <div class="upload-emoji">🎬</div>
                        <p class="t" data-i18n="uploadTitle">Ajouter une deuxième vidéo</p>
                        <p class="s" data-i18n="formats">Formats acceptés : MP4, WebM, MOV, M4V</p>
                        <p class="s" data-i18n="maxSize">Taille maximale : 100 MB</p>
                    </div>

                    @if($cours->video2_path)
                        <div id="current-video2" class="media-box white">

                            <div class="media-head">
                                <p class="media-title" data-i18n="currentVideo2">Deuxième vidéo actuelle</p>

                                <button type="button"
                                        class="delete-file-btn"
                                        data-delete-url="{{ route('admin.cours.media.destroy', [$cours->id, 'video2']) }}"
                                        onclick="deleteMedia(this)">
                                    🗑️ <span data-i18n="deleteFile">Supprimer</span>
                                </button>
                            </div>

                            <video controls playsinline preload="metadata">
                                <source src="{{ asset('storage/' . $cours->video2_path) }}">
                                Votre navigateur ne prend pas en charge la vidéo.
                            </video>
                        </div>
                    @else
                        <p class="hint center" style="margin:0 0 16px;" data-i18n="noVideo2">
                            Aucune deuxième vidéo enregistrée.
                        </p>
                    @endif

                    <div class="center">
                        <label for="video2" class="choose-btn">
                            <span data-i18n="chooseVideo">Choisir une deuxième vidéo</span>
                        </label>
                    </div>

                    <input id="video2" type="file" name="video2" class="hidden"
                           accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime">

                    <p id="video2-name" class="hint center" data-i18n="noNewVideo">
                        Aucune nouvelle vidéo sélectionnée
                    </p>
                </div>

                <p class="hint" data-i18n="keepVideo2">
                    Laissez vide pour conserver la deuxième vidéo actuelle.
                </p>

                @error('video2')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <div id="video2-preview-container" class="preview-box hidden">
                    <p class="p" data-i18n="preview2">Aperçu de la nouvelle deuxième vidéo</p>
                    <video id="video2-preview" controls playsinline></video>
                </div>
            </div>

            <!-- LIEN VIDEO EXTERNE -->
            <div>
                <label class="field-label" for="video_url" data-i18n="videoUrl">
                    Lien vidéo externe (facultatif)
                </label>

                <input id="video_url" type="url" name="video_url" class="input"
                       value="{{ old('video_url', $cours->video_url) }}"
                       placeholder="https://...">

                @error('video_url')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- ORDRE -->
            <div>
                <label class="field-label" for="order" data-i18n="order">
                    Ordre du cours
                </label>

                <input id="order" type="number" name="order" min="0" class="input"
                       value="{{ old('order', $cours->order ?? 0) }}">

                @error('order')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <!-- ACTIONS : PAS DE BOUTON SUPPRIMER LE COURS -->
            <div class="actions">

                <button type="submit" class="action-btn action-save">
                    <span data-i18n="save">Enregistrer les modifications</span>
                </button>

                <a href="{{ route('admin.cours.index') }}" class="action-btn action-cancel">
                    <span data-i18n="cancel">Annuler</span>
                </a>

            </div>

        </form>

        <!-- FORMULAIRE SEPARE POUR SUPPRIMER UN FICHIER -->
        <form id="delete-media-form" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

    </div>

    <p class="copyright">
        <strong>CAD ACADEMY</strong> © {{ date('Y') }}
    </p>

</div>

<script>
    const translations = {
        fr: {
            dashboard: 'Retour au tableau de bord',
            title: 'Modifier un cours',
            subtitle: 'Modifiez le contenu, le PDF ou les vidéos de ce cours.',
            errorTitle: 'Veuillez corriger les erreurs suivantes :',
            formation: 'Formation',
            courseTitle: 'Titre du cours',
            description: 'Description',
            content: 'Contenu du cours',
            pdf: 'Document PDF',
            currentPdf: 'PDF actuel',
            openPdf: 'Ouvrir le PDF',
            noPdf: 'Aucun PDF enregistré.',
            keepPdf: 'Laissez vide pour conserver le PDF actuel.',
            video1: 'Première vidéo du cours',
            currentVideo1: 'Première vidéo actuelle',
            noVideo1: 'Aucune première vidéo enregistrée.',
            keepVideo1: 'Laissez vide pour conserver la première vidéo actuelle.',
            preview1: 'Aperçu de la nouvelle vidéo',
            video2: 'Deuxième vidéo du cours',
            uploadTitle: 'Ajouter une deuxième vidéo',
            formats: 'Formats acceptés : MP4, WebM, MOV, M4V',
            maxSize: 'Taille maximale : 100 MB',
            currentVideo2: 'Deuxième vidéo actuelle',
            noVideo2: 'Aucune deuxième vidéo enregistrée.',
            chooseVideo: 'Choisir une deuxième vidéo',
            noNewVideo: 'Aucune nouvelle vidéo sélectionnée',
            keepVideo2: 'Laissez vide pour conserver la deuxième vidéo actuelle.',
            preview2: 'Aperçu de la nouvelle deuxième vidéo',
            videoUrl: 'Lien vidéo externe (facultatif)',
            order: 'Ordre du cours',
            save: 'Enregistrer les modifications',
            cancel: 'Annuler',
            deleteFile: 'Supprimer',
            language: 'العربية',
            selected: 'Fichier sélectionné : ',
            invalidVideo: 'Veuillez sélectionner un fichier vidéo valide.',
            invalidPdf: 'Veuillez sélectionner un fichier PDF valide.'
        },

        ar: {
            dashboard: 'العودة إلى لوحة التحكم',
            title: 'تعديل الدرس',
            subtitle: 'عدّلي محتوى الدرس أو ملف PDF أو الفيديوهات.',
            errorTitle: 'يرجى تصحيح الأخطاء التالية:',
            formation: 'التكوين',
            courseTitle: 'عنوان الدرس',
            description: 'الوصف',
            content: 'محتوى الدرس',
            pdf: 'ملف PDF',
            currentPdf: 'ملف PDF الحالي',
            openPdf: 'فتح ملف PDF',
            noPdf: 'لا يوجد ملف PDF محفوظ.',
            keepPdf: 'اتركي الخانة فارغة للاحتفاظ بملف PDF الحالي.',
            video1: 'الفيديو الأول للدرس',
            currentVideo1: 'الفيديو الأول الحالي',
            noVideo1: 'لا يوجد فيديو أول محفوظ.',
            keepVideo1: 'اتركي الخانة فارغة للاحتفاظ بالفيديو الأول الحالي.',
            preview1: 'معاينة الفيديو الجديد',
            video2: 'الفيديو الثاني للدرس',
            uploadTitle: 'إضافة فيديو ثانٍ',
            formats: 'الصيغ المقبولة: MP4 وWebM وMOV وM4V',
            maxSize: 'الحجم الأقصى: 100 ميغابايت',
            currentVideo2: 'الفيديو الثاني الحالي',
            noVideo2: 'لا يوجد فيديو ثانٍ محفوظ.',
            chooseVideo: 'اختيار فيديو ثانٍ',
            noNewVideo: 'لم يتم اختيار فيديو جديد',
            keepVideo2: 'اتركي الخانة فارغة للاحتفاظ بالفيديو الثاني الحالي.',
            preview2: 'معاينة الفيديو الثاني الجديد',
            videoUrl: 'رابط فيديو خارجي (اختياري)',
            order: 'ترتيب الدرس',
            save: 'حفظ التعديلات',
            cancel: 'إلغاء',
            deleteFile: 'حذف',
            language: 'Français',
            selected: 'الملف المختار: ',
            invalidVideo: 'يرجى اختيار ملف فيديو صالح.',
            invalidPdf: 'يرجى اختيار ملف PDF صالح.'
        }
    };

    let currentLanguage = 'fr';

    try {
        const stored = localStorage.getItem('cadacademy_admin_language');
        if (stored === 'ar' || stored === 'fr') currentLanguage = stored;
    } catch (e) {}

    function toggleLanguage() {
        currentLanguage = currentLanguage === 'fr' ? 'ar' : 'fr';

        try { localStorage.setItem('cadacademy_admin_language', currentLanguage); } catch (e) {}

        applyLanguage();
    }

    function applyLanguage() {
        const t = translations[currentLanguage];

        document.documentElement.lang = currentLanguage;
        document.documentElement.dir = currentLanguage === 'ar' ? 'rtl' : 'ltr';

        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.dataset.i18n;

            if (Object.prototype.hasOwnProperty.call(t, key)) {
                element.textContent = t[key];
            }
        });

        document.getElementById('language-button').textContent = t.language;
        document.title = t.title + ' | CAD ACADEMY';
    }

    function deleteMedia(button) {
        const message = currentLanguage === 'ar'
            ? 'واش متأكدة بغيتي تحذفي هاد الملف فقط؟ الدرس غادي يبقى موجود.'
            : 'Voulez-vous vraiment supprimer uniquement ce fichier ? Le cours sera conservé.';

        if (!confirm(message)) {
            return;
        }

        const form = document.getElementById('delete-media-form');
        form.action = button.dataset.deleteUrl;
        form.requestSubmit();
    }

    function setupVideoPreview(inputId, previewId, containerId, nameId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const container = document.getElementById(containerId);
        const name = document.getElementById(nameId);

        let currentUrl = null;

        input.addEventListener('change', function () {
            if (currentUrl) {
                URL.revokeObjectURL(currentUrl);
                currentUrl = null;
            }

            if (!this.files || !this.files.length) {
                container.classList.add('hidden');
                name.textContent = '';

                if (inputId === 'video2') {
                    name.textContent = translations[currentLanguage].noNewVideo;
                }

                preview.removeAttribute('src');
                preview.load();
                return;
            }

            const file = this.files[0];

            if (!file.type.startsWith('video/')) {
                this.value = '';
                container.classList.add('hidden');
                name.textContent = translations[currentLanguage].invalidVideo;
                return;
            }

            name.textContent = translations[currentLanguage].selected + file.name;
            currentUrl = URL.createObjectURL(file);
            preview.src = currentUrl;
            container.classList.remove('hidden');
        });
    }

    setupVideoPreview(
        'video',
        'video1-preview',
        'video1-preview-container',
        'video1-name'
    );

    setupVideoPreview(
        'video2',
        'video2-preview',
        'video2-preview-container',
        'video2-name'
    );

    document.getElementById('file').addEventListener('change', function () {
        if (this.files.length) {
            const file = this.files[0];
            const validPdf = file.type === 'application/pdf' ||
                             file.name.toLowerCase().endsWith('.pdf');

            if (!validPdf) {
                this.value = '';
                alert(translations[currentLanguage].invalidPdf);
            }
        }
    });

    applyLanguage();
</script>

</body>
</html>