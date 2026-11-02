<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier la formation | CAD ACADEMY</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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
            --background: #FAFAFA;
        }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); position: relative; }
        .topbar::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0; height: 4px; background: var(--red-700); }
        .topbar-inner {
            max-width: 1050px; margin: auto; padding: 16px 22px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 15px;
        }

        .brand { display: flex; align-items: center; gap: 12px; color: #fff; font-size: 22px; font-weight: 800; letter-spacing: .5px; text-decoration: none; }
        .brand-icon {
            display: grid; place-items: center; width: 42px; height: 42px;
            color: var(--red); background: #fff; border-radius: 10px; font-size: 20px; font-weight: 800; letter-spacing: 0;
        }

        .back-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 11px 15px; border-radius: 10px; background: #fff; color: var(--red);
            font-size: 13px; font-weight: 700; text-decoration: none; transition: background .2s;
        }
        .back-btn:hover { background: var(--red-50); }

        .page { max-width: 1050px; margin: auto; padding: 28px 22px 55px; }

        .header { margin-bottom: 25px; }

        .badge {
            display: inline-flex; align-items: center; gap: 7px; padding: 6px 12px;
            background: var(--red-50); color: var(--red-700); border: 1px solid var(--red-100);
            border-radius: 999px; font-size: 11px; font-weight: 800; margin-bottom: 13px;
        }

        h1 { font-size: 29px; font-weight: 800; letter-spacing: -.7px; margin-bottom: 5px; color: var(--ink); }

        .arabic-title {
            font-family: 'Cairo', sans-serif; direction: rtl; text-align: left;
            color: var(--red); font-size: 20px; font-weight: 700; margin-bottom: 10px;
        }

        .subtitle { color: var(--muted); font-size: 13px; line-height: 1.8; }
        .subtitle-ar { font-family: 'Cairo', sans-serif; direction: rtl; text-align: left; color: var(--muted); font-size: 13px; line-height: 1.8; }

        .form-card {
            background: #fff; border: 1px solid var(--border); border-top: 3px solid var(--red);
            border-radius: 16px; padding: 30px;
        }

        .section-heading {
            display: flex; align-items: center; gap: 12px;
            padding-bottom: 18px; margin-bottom: 25px; border-bottom: 1px solid var(--border);
        }

        .section-icon {
            display: grid; place-items: center; flex-shrink: 0; width: 42px; height: 42px;
            border-radius: 12px; background: var(--red-50); font-size: 20px;
        }

        .section-heading h2 { font-size: 15px; font-weight: 800; margin-bottom: 4px; color: var(--ink); }
        .section-heading p { color: var(--muted); font-size: 12px; }

        .form-group { margin-bottom: 23px; }

        .label-fr { display: block; margin-bottom: 6px; color: var(--ink); font-size: 13px; font-weight: 800; }

        .label-ar {
            display: block; font-family: 'Cairo', sans-serif; direction: rtl; text-align: left;
            margin-bottom: 10px; color: var(--red); font-size: 13px; font-weight: 700;
        }

        .required { color: var(--red); }

        input, select, textarea {
            width: 100%; border: 1px solid #D9D9D9; border-radius: 10px; padding: 12px 14px;
            font-family: inherit; font-size: 13px; color: var(--text); background: #fff; outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input, select { min-height: 46px; }

        input:focus, select:focus, textarea:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .13); }

        textarea { min-height: 125px; resize: vertical; line-height: 1.8; }

        .help-text { margin-top: 8px; color: var(--muted); font-size: 11px; line-height: 1.8; }
        .help-ar { font-family: 'Cairo', sans-serif; direction: rtl; text-align: left; }

        .error-box {
            margin-bottom: 22px; padding: 15px 18px; color: var(--red-700);
            background: var(--red-50); border: 1px solid var(--red-200);
            border-radius: 12px; font-size: 13px; line-height: 1.8;
        }
        .error-box ul { padding-left: 20px; margin-top: 7px; }

        .info-box {
            padding: 15px 17px; margin-top: 7px; margin-bottom: 24px; color: var(--ink);
            background: var(--red-50); border: 1px solid var(--red-100); border-inline-start: 4px solid var(--red);
            border-radius: 12px; font-size: 12px; line-height: 1.9;
        }

        .info-ar { font-family: 'Cairo', sans-serif; direction: rtl; text-align: left; margin-top: 5px; }

        .video-upload { padding: 18px; background: var(--background); border: 1px dashed var(--red-200); border-radius: 13px; }
        .video-upload input { background: #fff; }

        .video-preview { margin-top: 16px; }
        .video-preview video { display: block; width: 100%; max-width: 520px; max-height: 290px; background: var(--ink); border-radius: 12px; }

        .video-current-title { margin-bottom: 10px; color: var(--ink); font-size: 12px; font-weight: 800; }

        .no-video { padding: 18px; color: var(--muted); background: #fff; border: 1px solid var(--border); border-radius: 10px; font-size: 12px; line-height: 1.8; }

        .buttons {
            display: flex; align-items: center; justify-content: flex-end; flex-wrap: wrap;
            gap: 11px; padding-top: 20px; border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            min-height: 44px; padding: 12px 19px; border: none; border-radius: 10px;
            font-family: inherit; font-size: 12px; font-weight: 800; text-decoration: none; cursor: pointer; transition: background .2s;
        }

        .btn:focus-visible, .back-btn:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        .btn-cancel { background: #F1F1F1; color: #555; }
        .btn-cancel:hover { background: #E5E5E5; }

        .btn-save { color: #fff; background: var(--red); }
        .btn-save:hover { background: var(--red-700); }

        @media (max-width: 650px) {
            .topbar-inner { padding: 14px 13px 18px; align-items: flex-start; flex-direction: column; }
            .page { padding: 20px 13px 35px; }
            .back-btn { width: 100%; }
            h1 { font-size: 24px; }
            .form-card { padding: 19px 15px; border-radius: 14px; }
            .section-heading h2 { font-size: 14px; }
            .buttons { flex-direction: column-reverse; align-items: stretch; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <header class="topbar">
        <div class="topbar-inner">

            <a href="{{ route('admin.formations.index') }}" class="brand">
                <span class="brand-icon">C</span>
                <span>CAD ACADEMY</span>
            </a>

            <a href="{{ route('admin.formations.index') }}" class="back-btn">
                ← Retour / العودة
            </a>

        </div>
    </header>

<div class="page">

    <!-- HEADER -->
    <header class="header">

        <span class="badge">FORMATION · التكوين</span>

        <h1>Modifier la formation</h1>

        <div class="arabic-title" dir="rtl">
            تعديل التكوين
        </div>

        <p class="subtitle">
            Modifiez les informations et les ressources de cette formation.
        </p>

        <p class="subtitle-ar" dir="rtl">
            قم بتعديل معلومات وموارد هذا التكوين.
        </p>

    </header>

    <!-- ERRORS -->
    @if ($errors->any())
        <div class="error-box">
            <strong>Erreur / خطأ</strong>

            <p>Veuillez vérifier les informations saisies.</p>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <div class="form-card">

        <div class="section-heading">
            <div class="section-icon">✏️</div>
            <div>
                <h2>Informations de la formation</h2>
                <p>معلومات التكوين</p>
            </div>
        </div>

        <form
            method="POST"
            action="{{ route('admin.formations.update', $formation) }}"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div class="form-group">

                <label class="label-fr" for="name">
                    Nom de la formation <span class="required">*</span>
                </label>

                <label class="label-ar" for="name">
                    اسم التكوين <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $formation->name) }}"
                    placeholder="Ex. : Développement Web Full Stack"
                    maxlength="255"
                    required
                >

            </div>

            <!-- CATEGORY -->
            <div class="form-group">

                <label class="label-fr" for="category">
                    Catégorie <span class="required">*</span>
                </label>

                <label class="label-ar" for="category">
                    الفئة <span class="required">*</span>
                </label>

                <select id="category" name="category" required>

                    <option value="">
                        Sélectionnez une catégorie / اختر فئة
                    </option>

                    <option value="Design & Programmation"
                        {{ old('category', $formation->category) == 'Design & Programmation' ? 'selected' : '' }}>
                        Design & Programmation / التصميم والبرمجة
                    </option>

                    <option value="Informatique bureautique"
                        {{ old('category', $formation->category) == 'Informatique bureautique' ? 'selected' : '' }}>
                        Informatique bureautique / الإعلاميات المكتبية
                    </option>

                    <option value="Aide médicale et administrative"
                        {{ old('category', $formation->category) == 'Aide médicale et administrative' ? 'selected' : '' }}>
                        Aide médicale et administrative / المساعدة الطبية والإدارية
                    </option>

                    <option value="Hôtellerie & restauration"
                        {{ old('category', $formation->category) == 'Hôtellerie & restauration' ? 'selected' : '' }}>
                        Hôtellerie & restauration / الفندقة والمطاعم
                    </option>

                    <option value="Secrétariat"
                        {{ old('category', $formation->category) == 'Secrétariat' ? 'selected' : '' }}>
                        Secrétariat / السكرتارية
                    </option>

                    <option value="Commerce"
                        {{ old('category', $formation->category) == 'Commerce' ? 'selected' : '' }}>
                        Commerce / التجارة
                    </option>

                    <option value="Métiers & artisanat"
                        {{ old('category', $formation->category) == 'Métiers & artisanat' ? 'selected' : '' }}>
                        Métiers & artisanat / الحرف والمهن
                    </option>

                    <option value="Programmes d'ingénierie"
                        {{ old('category', $formation->category) == "Programmes d'ingénierie" ? 'selected' : '' }}>
                        Programmes d'ingénierie / برامج الهندسة
                    </option>

                </select>

            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">

                <label class="label-fr" for="description">
                    Description
                </label>

                <label class="label-ar" for="description">
                    وصف التكوين
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Décrivez le contenu de cette formation..."
                >{{ old('description', $formation->description) }}</textarea>

            </div>

            <!-- VIDEO -->
            <div class="section-heading">
                <div class="section-icon">🎬</div>
                <div>
                    <h2>Vidéo de présentation</h2>
                    <p>فيديو تعريفي بالتكوين</p>
                </div>
            </div>

            <div class="form-group">

                <label class="label-fr" for="video">
                    Ajouter ou remplacer la vidéo
                </label>

                <label class="label-ar" for="video">
                    إضافة فيديو أو تغييره
                </label>

                <div class="video-upload">

                    <input
                        type="file"
                        id="video"
                        name="video"
                        accept="video/mp4,video/webm,video/ogg,.mp4,.webm,.ogg"
                    >

                    <p class="help-text">
                        Formats acceptés : MP4, WebM et OGG.
                        Choisissez un fichier uniquement si vous souhaitez ajouter
                        ou remplacer la vidéo actuelle.
                    </p>

                    <p class="help-text help-ar" dir="rtl">
                        الصيغ المقبولة: MP4 وWebM وOGG.
                        اختاري ملفاً جديداً فقط إذا أردت إضافة الفيديو أو تغييره.
                    </p>

                    <div class="video-preview" id="selected-video-preview" hidden>
                        <p class="video-current-title">
                            Aperçu de la nouvelle vidéo / معاينة الفيديو الجديد
                        </p>

                        <video id="selected-video" controls playsinline></video>
                    </div>

                </div>

            </div>

            <!-- CURRENT VIDEO -->
            <div class="form-group">

                <p class="video-current-title">
                    Vidéo actuellement enregistrée / الفيديو المسجل حالياً
                </p>

                @if ($formation->video_path)
                    <div class="video-preview">
                        <video controls playsinline preload="metadata">
                            <source
                                src="{{ asset('storage/' . $formation->video_path) }}"
                            >
                            Votre navigateur ne prend pas en charge la lecture vidéo.
                        </video>
                    </div>
                @else
                    <div class="no-video">
                        Aucune vidéo n'est enregistrée pour cette formation.
                        <div class="help-ar" dir="rtl">
                            لا يوجد فيديو مسجل لهذا التكوين حالياً.
                        </div>
                    </div>
                @endif

                <p class="help-text">
                    Si tu ne sélectionnes aucun nouveau fichier, la vidéo actuelle
                    doit rester inchangée.
                </p>

            </div>

            <!-- INFO -->
            <div class="info-box">

                <strong>Modification de la formation</strong>

                <p>
                    Vérifiez les informations avant d'enregistrer vos modifications.
                </p>

                <div class="info-ar" dir="rtl">
                    <strong>تعديل التكوين</strong>
                    <p>
                        تأكدي من المعلومات قبل الضغط على زر حفظ التعديلات.
                    </p>
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="buttons">

                <a
                    href="{{ route('admin.formations.index') }}"
                    class="btn btn-cancel"
                >
                    Annuler / إلغاء
                </a>

                <button type="submit" class="btn btn-save">
                    ✓ Enregistrer les modifications / حفظ التعديلات
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    const videoInput = document.getElementById('video');
    const previewContainer = document.getElementById('selected-video-preview');
    const previewVideo = document.getElementById('selected-video');

    videoInput.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            previewVideo.removeAttribute('src');
            previewContainer.hidden = true;
            return;
        }

        if (!file.type.startsWith('video/')) {
            alert('Veuillez sélectionner un fichier vidéo valide.');
            this.value = '';
            previewContainer.hidden = true;
            return;
        }

        if (previewVideo.dataset.objectUrl) {
            URL.revokeObjectURL(previewVideo.dataset.objectUrl);
        }

        const objectUrl = URL.createObjectURL(file);

        previewVideo.src = objectUrl;
        previewVideo.dataset.objectUrl = objectUrl;
        previewContainer.hidden = false;
        previewVideo.load();
    });
</script>

</body>
</html>