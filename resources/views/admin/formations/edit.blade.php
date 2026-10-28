
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier la formation | cad Acadmey</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #059669;
            --green-dark: #047857;
            --green-light: #ecfdf5;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --background: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        .page {
            max-width: 1050px;
            margin: auto;
            padding: 28px 22px 55px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 32px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--green);
            font-size: 21px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            color: white;
            background: var(--green);
            border-radius: 12px;
            font-size: 19px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: white;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s;
        }

        .back-btn:hover {
            border-color: #a7f3d0;
            color: var(--green-dark);
            background: var(--green-light);
        }

        .header {
            margin-bottom: 25px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            background: var(--green-light);
            color: var(--green-dark);
            border: 1px solid #d1fae5;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 13px;
        }

        h1 {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -.7px;
            margin-bottom: 5px;
        }

        .arabic-title {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            color: var(--green);
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .subtitle-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 28px rgba(15, 23, 42, .04);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 18px;
            margin-bottom: 25px;
            border-bottom: 1px solid #f1f5f9;
        }

        .section-icon {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--green-light);
            font-size: 20px;
        }

        .section-heading h2 {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .label-fr {
            display: block;
            margin-bottom: 6px;
            color: #334155;
            font-size: 13px;
            font-weight: 800;
        }

        .label-ar {
            display: block;
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            margin-bottom: 10px;
            color: var(--green);
            font-size: 13px;
            font-weight: 700;
        }

        .required {
            color: #dc2626;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #dbe3ed;
            border-radius: 10px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            color: var(--text);
            background: white;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input,
        select {
            min-height: 46px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .11);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.8;
        }

        .help-text {
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .help-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
        }

        .error-box {
            margin-bottom: 22px;
            padding: 15px 18px;
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            font-size: 13px;
            line-height: 1.8;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 7px;
        }

        .info-box {
            padding: 15px 17px;
            margin-top: 7px;
            margin-bottom: 24px;
            color: #065f46;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.9;
        }

        .info-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            margin-top: 5px;
        }

        .video-upload {
            padding: 18px;
            background: #f8fafc;
            border: 1px dashed #a7f3d0;
            border-radius: 13px;
        }

        .video-upload input {
            background: white;
        }

        .video-preview {
            margin-top: 16px;
        }

        .video-preview video {
            display: block;
            width: 100%;
            max-width: 520px;
            max-height: 290px;
            background: #0f172a;
            border-radius: 12px;
        }

        .video-current-title {
            margin-bottom: 10px;
            color: #334155;
            font-size: 12px;
            font-weight: 800;
        }

        .no-video {
            padding: 18px;
            color: var(--muted);
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 12px;
            line-height: 1.8;
        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 11px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 12px 19px;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-save {
            color: white;
            background: var(--green);
            box-shadow: 0 5px 12px rgba(5, 150, 105, .15);
        }

        .btn-save:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        @media (max-width: 650px) {
            .page {
                padding: 20px 13px 35px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 27px;
            }

            .back-btn {
                width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 19px 15px;
                border-radius: 14px;
            }

            .section-heading h2 {
                font-size: 14px;
            }

            .buttons {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- TOPBAR -->
    <div class="topbar">

        <a href="{{ route('admin.formations.index') }}" class="brand">
            <span class="brand-icon">E</span>
            <span>ÉtudeEnLigne</span>
        </a>

        <a href="{{ route('admin.formations.index') }}" class="back-btn">
            ← Retour / العودة
        </a>

    </div>

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
