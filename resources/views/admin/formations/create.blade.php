
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une formation | ÉtudeEnLigne</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 16px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        .container {
            max-width: 1050px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 28px;
            color: #064e3b;
        }

        .header p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .back-link {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 10px;
            background: white;
            color: #047857;
            text-decoration: none;
            border: 1px solid #d1fae5;
            font-weight: bold;
        }

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
        }

        .panel h2 {
            margin: 0 0 20px;
            color: #065f46;
            font-size: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
            color: #374151;
        }

        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            background: #fff;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        textarea {
            min-height: 105px;
            resize: vertical;
        }

        .help {
            color: #6b7280;
            font-size: 12px;
            line-height: 1.6;
            margin: 7px 0 0;
        }

        .course-card {
            border: 1px solid #d1fae5;
            background: #fbfffd;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 18px;
        }

        .course-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .course-header h3 {
            margin: 0;
            color: #047857;
            font-size: 17px;
        }

        .btn {
            border: none;
            border-radius: 10px;
            padding: 12px 17px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-add {
            color: #047857;
            background: #d1fae5;
            border: 1px solid #a7f3d0;
        }

        .btn-remove {
            color: #b91c1c;
            background: #fee2e2;
            padding: 8px 11px;
            font-size: 12px;
        }

        .btn-submit {
            color: white;
            background: #059669;
            padding: 14px 22px;
        }

        .btn-submit:hover {
            background: #047857;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .video-preview {
            display: none;
            width: 100%;
            max-height: 320px;
            margin-top: 12px;
            border-radius: 12px;
            background: #111827;
        }

        .pdf-name,
        .video-name {
            font-size: 12px;
            color: #047857;
            margin-top: 7px;
            overflow-wrap: anywhere;
        }

        @media (max-width: 600px) {
            body {
                padding: 18px 10px;
            }

            .panel {
                padding: 17px;
            }

            .header h1 {
                font-size: 23px;
            }

            .actions {
                align-items: stretch;
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Ajouter une formation</h1>
            <p>Créez une formation et ajoutez ses cours, documents PDF et vidéos.</p>
        </div>

        <a href="{{ route('admin.formations.index') }}" class="back-link">
            ← Retour aux formations
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Veuillez corriger les erreurs suivantes :</strong>
            <ul style="margin-bottom:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.formations.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <!-- INFORMATIONS DE LA FORMATION -->
        <div class="panel">
            <h2>Informations de la formation</h2>

            <div class="field">
                <label for="name">Nom de la formation *</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Exemple : Développement Web"
                    required
                >
            </div>

            <div class="field">
                <label for="category">Catégorie *</label>
                <select id="category" name="category" required>
                    <option value="">-- Choisir une catégorie --</option>

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
                    @endphp

                    @foreach($categories as $category)
                        <option
                            value="{{ $category }}"
                            {{ old('category') === $category ? 'selected' : '' }}
                        >
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field" style="margin-bottom:0;">
                <label for="description">Description de la formation</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Présentez cette formation..."
                >{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- COURS -->
        <div class="panel">
            <h2>Contenu des cours</h2>

            <p class="help" style="margin-top:-10px; margin-bottom:20px;">
                Ajoutez un ou plusieurs cours. Chaque cours peut contenir
                du texte, un document PDF et une vidéo depuis votre ordinateur.
            </p>

            <div id="courses-container">
                <div class="course-card" data-course-card>
                    <div class="course-header">
                        <h3 class="course-title">Cours 1</h3>
                    </div>

                    <div class="field">
                        <label>Titre du cours *</label>
                        <input
                            type="text"
                            name="courses[0][title]"
                            value="{{ old('courses.0.title') }}"
                            placeholder="Exemple : Introduction au cours"
                            required
                        >
                    </div>

                    <div class="field">
                        <label>Description du cours</label>
                        <textarea
                            name="courses[0][description]"
                            placeholder="Courte description du cours..."
                        >{{ old('courses.0.description') }}</textarea>
                    </div>

                    <div class="field">
                        <label>Contenu textuel du cours</label>
                        <textarea
                            name="courses[0][content]"
                            placeholder="Écrivez ici le contenu du cours..."
                        >{{ old('courses.0.content') }}</textarea>
                    </div>

                    <div class="field">
                        <label>Document PDF / ملف PDF</label>
                        <input
                            type="file"
                            name="courses[0][pdf]"
                            accept=".pdf,application/pdf"
                            data-pdf-input
                        >
                        <p class="help">PDF uniquement — maximum 10 Mo.</p>
                        <div class="pdf-name" data-pdf-name></div>
                    </div>

                    <div class="field" style="margin-bottom:0;">
                        <label>Vidéo du cours / فيديو الدرس</label>
                        <input
                            type="file"
                            name="courses[0][video]"
                            accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
                            data-video-input
                        >
                        <p class="help">
                            Choisissez une vidéo depuis votre ordinateur.
                            Formats acceptés : MP4, WebM, MOV, M4V.
                            Maximum prévu : 100 Mo.
                        </p>
                        <div class="video-name" data-video-name></div>
                        <video
                            class="video-preview"
                            controls
                            playsinline
                            data-video-preview
                        ></video>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-add" id="add-course">
                + Ajouter un autre cours
            </button>
        </div>

        <!-- BOUTONS -->
        <div class="panel">
            <div class="actions">
                <a
                    href="{{ route('admin.formations.index') }}"
                    class="back-link"
                >
                    Annuler
                </a>

                <button type="submit" class="btn btn-submit">
                    Enregistrer la formation
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    let courseIndex = 1;

    const container = document.getElementById('courses-container');
    const addCourseButton = document.getElementById('add-course');

    function updateCourseTitles() {
        const cards = container.querySelectorAll('[data-course-card]');

        cards.forEach((card, index) => {
            const title = card.querySelector('.course-title');

            if (title) {
                title.textContent = 'Cours ' + (index + 1);
            }

            const removeButton = card.querySelector('.btn-remove');

            if (removeButton) {
                removeButton.style.display =
                    cards.length > 1 ? 'inline-flex' : 'none';
            }
        });
    }

    function attachFileListeners(card) {
        const pdfInput = card.querySelector('[data-pdf-input]');
        const pdfName = card.querySelector('[data-pdf-name]');

        if (pdfInput && pdfName) {
            pdfInput.addEventListener('change', function () {
                pdfName.textContent = this.files.length
                    ? 'Fichier sélectionné : ' + this.files[0].name
                    : '';
            });
        }

        const videoInput = card.querySelector('[data-video-input]');
        const videoName = card.querySelector('[data-video-name]');
        const videoPreview = card.querySelector('[data-video-preview]');

        if (videoInput && videoName && videoPreview) {
            videoInput.addEventListener('change', function () {
                const file = this.files[0];

                if (videoPreview.dataset.objectUrl) {
                    URL.revokeObjectURL(videoPreview.dataset.objectUrl);
                    delete videoPreview.dataset.objectUrl;
                }

                if (!file) {
                    videoName.textContent = '';
                    videoPreview.removeAttribute('src');
                    videoPreview.load();
                    videoPreview.style.display = 'none';
                    return;
                }

                videoName.textContent = 'Vidéo sélectionnée : ' + file.name;

                const videoUrl = URL.createObjectURL(file);

                videoPreview.src = videoUrl;
                videoPreview.dataset.objectUrl = videoUrl;
                videoPreview.style.display = 'block';
                videoPreview.load();
            });
        }
    }

    addCourseButton.addEventListener('click', function () {
        const card = document.createElement('div');

        card.className = 'course-card';
        card.setAttribute('data-course-card', '');

        card.innerHTML = `
            <div class="course-header">
                <h3 class="course-title">Cours</h3>

                <button type="button" class="btn btn-remove">
                    Supprimer ce cours
                </button>
            </div>

            <div class="field">
                <label>Titre du cours *</label>
                <input
                    type="text"
                    name="courses[${courseIndex}][title]"
                    placeholder="Titre du cours"
                    required
                >
            </div>

            <div class="field">
                <label>Description du cours</label>
                <textarea
                    name="courses[${courseIndex}][description]"
                    placeholder="Courte description du cours..."
                ></textarea>
            </div>

            <div class="field">
                <label>Contenu textuel du cours</label>
                <textarea
                    name="courses[${courseIndex}][content]"
                    placeholder="Écrivez ici le contenu du cours..."
                ></textarea>
            </div>

            <div class="field">
                <label>Document PDF / ملف PDF</label>
                <input
                    type="file"
                    name="courses[${courseIndex}][pdf]"
                    accept=".pdf,application/pdf"
                    data-pdf-input
                >
                <p class="help">PDF uniquement — maximum 10 Mo.</p>
                <div class="pdf-name" data-pdf-name></div>
            </div>

            <div class="field" style="margin-bottom:0;">
                <label>Vidéo du cours / فيديو الدرس</label>
                <input
                    type="file"
                    name="courses[${courseIndex}][video]"
                    accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime"
                    data-video-input
                >
                <p class="help">
                    Formats acceptés : MP4, WebM, MOV, M4V.
                    Maximum prévu : 100 Mo.
                </p>
                <div class="video-name" data-video-name></div>
                <video
                    class="video-preview"
                    controls
                    playsinline
                    data-video-preview
                ></video>
            </div>
        `;

        container.appendChild(card);

        const removeButton = card.querySelector('.btn-remove');

        removeButton.addEventListener('click', function () {
            const preview = card.querySelector('[data-video-preview]');

            if (preview && preview.dataset.objectUrl) {
                URL.revokeObjectURL(preview.dataset.objectUrl);
            }

            card.remove();
            updateCourseTitles();
        });

        attachFileListeners(card);
        courseIndex++;
        updateCourseTitles();
    });

    // Prévisualisation du PDF et de la vidéo du premier cours.
    document.querySelectorAll('[data-course-card]').forEach(function (card) {
        attachFileListeners(card);
    });

    updateCourseTitles();
</script>
</body>
</html>
