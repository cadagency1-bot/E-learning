<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours | CAD ACADEMY</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --red:#D90429;
            --red-700:#9B0320;
            --red-50:#FFF1F3;
            --red-100:#FFE0E5;
            --red-200:#FFC2CC;
            --ink:#1A1A1A;
            --text:#1F1F1F;
            --muted:#6E6E6E;
            --border:#EDEDED;
            --soft:#FAFAFA;
        }

        * { box-sizing:border-box; }

        body { margin:0; font-family:'Plus Jakarta Sans',sans-serif; background:var(--soft); color:var(--text); }
        html[dir="rtl"] body { font-family:'Cairo',sans-serif; }
        button,input,select,textarea { font:inherit; }

        /* ---------- Barre rouge ---------- */
        .topbar { background:var(--red); position:relative; }
        .topbar::after { content:""; position:absolute; inset-inline:0; bottom:0; height:4px; background:var(--red-700); }

        .topbar-inner {
            max-width:1200px; margin:auto; padding:16px 24px 20px;
            display:flex; align-items:center; justify-content:space-between; gap:18px; flex-wrap:wrap;
        }

        .brand { display:flex; align-items:center; gap:12px; text-decoration:none; color:#fff; }
        .brand-icon { width:44px; height:44px; background:#fff; color:var(--red); border-radius:11px; display:grid; place-items:center; }
        .brand-name { font-size:22px; font-weight:800; letter-spacing:.5px; line-height:1; }
        .brand-subtitle { color:#FFD3DA; font-size:10px; margin-top:4px; letter-spacing:1px; font-weight:700; }

        .top-actions { display:flex; align-items:center; flex-wrap:wrap; gap:9px; }

        .top-btn {
            min-height:42px; padding:10px 14px; border-radius:10px;
            display:inline-flex; align-items:center; justify-content:center; gap:8px;
            font-size:13px; font-weight:700; text-decoration:none; cursor:pointer;
            border:1px solid rgba(255,255,255,.6); color:#fff; background:transparent; transition:background .15s;
        }
        .top-btn:hover { background:rgba(0,0,0,.18); }
        .top-btn.primary { background:#fff; color:var(--red); border-color:#fff; }
        .top-btn.primary:hover { background:var(--red-50); }
        .top-btn:focus-visible, .action-btn:focus-visible, .choose-file:focus-within { outline:3px solid rgba(217,4,41,.35); outline-offset:2px; }

        .page { max-width:1080px; margin:0 auto; padding:30px 22px 65px; }

        .breadcrumb { display:flex; align-items:center; gap:9px; color:#9A9A9A; font-size:12px; margin-bottom:22px; flex-wrap:wrap; }
        .breadcrumb a { color:var(--red); text-decoration:none; font-weight:700; }

        /* ---------- Titre ---------- */
        .hero {
            background:#fff; border:1px solid var(--border); border-top:4px solid var(--red);
            border-radius:16px; padding:26px 28px; display:flex; align-items:center;
            justify-content:space-between; gap:24px; margin-bottom:24px;
        }
        .hero-tag { display:inline-flex; align-items:center; gap:7px; color:var(--red); font-size:12px; font-weight:800; margin-bottom:8px; }
        .hero h1 { font-size:clamp(23px,4vw,30px); font-weight:800; line-height:1.3; margin:0; letter-spacing:-.6px; color:var(--ink); }
        .hero p { color:var(--muted); font-size:13px; line-height:1.8; margin:8px 0 0; max-width:550px; }
        .hero-icon { width:76px; height:76px; flex-shrink:0; display:grid; place-items:center; border-radius:18px; background:var(--red-50); color:var(--red); }

        .layout { display:grid; grid-template-columns:minmax(0,1fr) 275px; gap:23px; align-items:start; }

        .form-card, .side-card { background:#fff; border:1px solid var(--border); border-radius:16px; }
        .form-card { padding:28px; }

        .section-heading { display:flex; align-items:center; gap:12px; padding-bottom:21px; border-bottom:1px solid var(--border); margin-bottom:24px; }
        .section-icon { width:43px; height:43px; flex-shrink:0; display:grid; place-items:center; border-radius:12px; background:var(--red-50); color:var(--red); }
        .section-heading h2 { font-size:16px; font-weight:800; margin:0; color:var(--ink); }
        .section-heading p { color:var(--muted); font-size:12px; margin:5px 0 0; }

        .field { margin-bottom:23px; }
        .field:last-child { margin-bottom:0; }
        .field label { display:block; color:var(--ink); font-size:13px; font-weight:800; margin-bottom:9px; }
        .field-hint { font-size:12px; color:#9A9A9A; margin:-3px 0 9px; }

        .control {
            display:block; width:100%; min-height:49px; padding:13px 15px; background:#fff; color:var(--text);
            border:1px solid #D9D9D9; border-radius:12px; outline:none; font-size:13px; transition:border-color .2s, box-shadow .2s;
        }
        .control:focus { border-color:var(--red); box-shadow:0 0 0 4px rgba(217,4,41,.12); }
        textarea.control { min-height:115px; line-height:1.8; resize:vertical; }
        #content { min-height:190px; }

        .upload-box { padding:25px 20px; border:1.5px dashed var(--red-200); background:#fff; border-radius:14px; text-align:center; transition:background .2s, border-color .2s; }
        .upload-box:hover { border-color:var(--red); background:var(--red-50); }

        .upload-icon { width:56px; height:56px; margin:0 auto 13px; display:grid; place-items:center; border-radius:15px; background:var(--ink); color:#fff; }
        .upload-title { font-size:13px; font-weight:800; color:var(--ink); margin:0; }
        .upload-description { font-size:11px; color:#9A9A9A; margin:8px 0 0; line-height:1.8; }

        .choose-file {
            display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:11px 17px;
            background:var(--red); color:#fff; border-radius:10px; margin-top:17px; cursor:pointer;
            font-size:12px; font-weight:800; transition:background .2s;
        }
        .choose-file:hover { background:var(--red-700); }
        .file-name { overflow-wrap:anywhere; color:#6E6E6E; font-size:12px; margin-top:13px; }

        .pdf-icon { background:var(--red-100); color:var(--red-700); }

        .info-note {
            display:flex; gap:12px; padding:15px; background:var(--red-50); border:1px solid var(--red-100);
            border-inline-start:4px solid var(--red); border-radius:12px; color:var(--ink); font-size:12px; line-height:1.8;
        }

        .form-actions { display:flex; align-items:center; gap:12px; padding-top:22px; border-top:1px solid var(--border); margin-top:27px; }

        .action-btn {
            min-height:49px; display:inline-flex; align-items:center; justify-content:center; gap:9px;
            padding:12px 19px; border-radius:12px; text-decoration:none; font-size:13px; font-weight:800;
            cursor:pointer; transition:background .2s; border:1px solid transparent;
        }
        .action-cancel { background:#fff; color:#555; border-color:#D9D9D9; }
        .action-cancel:hover { background:var(--soft); }
        .action-save { flex:1; color:#fff; background:var(--red); }
        .action-save:hover { background:var(--red-700); }

        .side-card { padding:22px; margin-bottom:18px; }
        .side-card h3 { font-size:14px; font-weight:800; margin:0 0 17px; color:var(--ink); }

        .step { display:flex; align-items:flex-start; gap:11px; margin-bottom:18px; }
        .step:last-child { margin-bottom:0; }
        .step-number { width:29px; height:29px; display:grid; place-items:center; flex-shrink:0; background:var(--ink); color:#fff; border-radius:9px; font-size:12px; font-weight:800; }
        .step strong { display:block; font-size:12px; margin-bottom:4px; }
        .step p { font-size:11px; line-height:1.7; color:var(--muted); margin:0; }

        .tip-card { background:#fff; border:1px solid var(--border); border-top:3px solid var(--red); border-radius:16px; padding:20px; }
        .tip-title { display:flex; align-items:center; gap:9px; font-weight:800; font-size:13px; margin-bottom:10px; color:var(--ink); }
        .tip-card p { color:var(--muted); font-size:12px; line-height:1.9; margin:0; }

        .footer { text-align:center; padding:24px 16px; color:#9A9A9A; font-size:11px; border-top:1px solid var(--border); background:#fff; }
        .footer .name { color:var(--ink); font-weight:800; font-size:15px; letter-spacing:.5px; margin-bottom:4px; }

        .error-box {
            padding:15px; margin-bottom:22px; background:var(--red-50); border:1px solid var(--red-200);
            border-inline-start:4px solid var(--red); border-radius:12px; color:var(--red-700); font-size:12px;
        }

        .video-list { display:grid; gap:16px; }
        .video-item { padding:18px; background:var(--soft); border:1px solid var(--border); border-radius:14px; }
        .video-item-header { display:flex; justify-content:space-between; align-items:center; gap:12px; margin-bottom:14px; }
        .video-item-title { font-size:13px; font-weight:800; color:var(--ink); }

        .remove-video {
            display:inline-flex; align-items:center; gap:6px; padding:8px 10px; border:1px solid var(--red-200);
            background:#fff; color:var(--red); border-radius:9px; cursor:pointer; font-size:11px; font-weight:700;
        }
        .remove-video:hover { background:var(--red-50); }

        .add-video-btn {
            display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:12px 16px;
            border:1.5px dashed var(--red-200); border-radius:10px; color:var(--red-700); background:var(--red-50);
            font-weight:800; font-size:12px; cursor:pointer;
        }
        .add-video-btn:hover { background:var(--red-100); }

        .video-preview { width:100%; max-height:300px; margin-top:14px; border-radius:12px; background:var(--ink); }

        @media(max-width:850px) {
            .layout { grid-template-columns:1fr; }
            .side-column { display:grid; grid-template-columns:1fr 1fr; gap:15px; }
        }

        @media(max-width:600px) {
            .topbar-inner { padding:13px 16px 18px; }
            .top-actions { width:100%; }
            .top-btn { flex:1; padding:10px 9px; font-size:11px; }
            .page { padding:20px 14px 40px; }
            .hero { padding:20px; }
            .hero-icon { width:56px; height:56px; border-radius:14px; }
            .hero-icon svg { width:28px; }
            .form-card { padding:20px 16px; }
            .side-column { grid-template-columns:1fr; }
            .form-actions { flex-direction:column-reverse; }
            .action-btn { width:100%; }
            .video-item { padding:13px; }
        }
    </style>
</head>

<body>
<header class="topbar">
    <div class="topbar-inner">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-icon"><i data-lucide="graduation-cap" width="24"></i></div>
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

            <a href="{{ route('admin.cours.index') }}" class="top-btn">
                <i data-lucide="arrow-left" class="back-icon" width="16"></i>
                <span data-i18n="back">Retour aux cours</span>
            </a>

            <button type="button" class="top-btn" id="language-button-toggle">
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

    <section class="hero">
        <div class="hero-content">
            <div class="hero-tag">
                <i data-lucide="shield-check" width="14"></i>
                <span data-i18n="heroTag">Espace administrateur</span>
            </div>
            <h1 data-i18n="pageTitle">Ajouter un nouveau cours</h1>
            <p data-i18n="subtitle">Préparez un contenu pédagogique complet avec texte, vidéo et document PDF.</p>
        </div>
        <div class="hero-icon"><i data-lucide="book-open" width="38"></i></div>
    </section>

    <div class="layout">
        <section class="form-card">
            <div class="section-heading">
                <div class="section-icon"><i data-lucide="file-pen-line" width="22"></i></div>
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

            <form method="POST" action="{{ route('admin.cours.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label for="formation_id" data-i18n="formation">Formation *</label>
                    <p class="field-hint" data-i18n="formationHint">Sélectionnez la formation concernée par ce cours.</p>

                    <select name="formation_id" id="formation_id" required class="control">
                        <option value="" data-i18n="chooseFormation">-- Choisir une formation --</option>
                        @foreach ($formations as $formation)
                            <option value="{{ $formation->id }}" {{ old('formation_id') == $formation->id ? 'selected' : '' }}>
                                {{ $formation->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('formation_id') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="title" data-i18n="courseTitle">Titre du cours *</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" required class="control"
                           data-i18n-placeholder="titlePlaceholder" placeholder="Exemple : Introduction au HTML">
                    @error('title') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="description" data-i18n="description">Description</label>
                    <textarea id="description" name="description" rows="4" class="control"
                              data-i18n-placeholder="descriptionPlaceholder"
                              placeholder="Présentez brièvement le cours...">{{ old('description') }}</textarea>
                    @error('description') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="content" data-i18n="content">Contenu pédagogique</label>
                    <textarea id="content" name="content" rows="7" class="control"
                              data-i18n-placeholder="contentPlaceholder"
                              placeholder="Écrivez ici le contenu du cours...">{{ old('content') }}</textarea>
                    @error('content') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <!-- VIDÉOS -->
                <div class="field">
                    <label data-i18n="videosHeading">Vidéos du cours</label>
                    <p class="field-hint" data-i18n="videosHint">Ajoutez une ou plusieurs vidéos. Chaque vidéo dispose de son propre aperçu.</p>

                    <div id="video-list" class="video-list">
                        <div class="video-item">
                            <div class="video-item-header">
                                <span class="video-item-title" data-i18n="videoOne">Vidéo 1</span>
                            </div>
                            <div class="upload-box">
                                <div class="upload-icon"><i data-lucide="video" width="27"></i></div>
                                <p class="upload-title" data-i18n="uploadVideo">Importer une vidéo depuis mon ordinateur</p>
                                <p class="upload-description" data-i18n="videoFormats">Formats acceptés : MP4, WebM, MOV, M4V</p>
                                <p class="upload-description" data-i18n="videoLimit">Limite indicative : 100 MB</p>
                                <label class="choose-file">
                                    <i data-lucide="folder-open" width="17"></i>
                                    <span data-i18n="chooseVideo">Choisir une vidéo</span>
                                    <input type="file" name="video" accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime" hidden>
                                </label>
                                <p class="file-name" data-i18n="noVideo">Aucune vidéo sélectionnée</p>
                            </div>
                            <video class="video-preview hidden" controls playsinline></video>
                            @error('video') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                        </div>

                        <div class="video-item">
                            <div class="video-item-header">
                                <span class="video-item-title" data-i18n="videoTwo">Vidéo 2 (facultative)</span>
                                <button type="button" class="remove-video" data-remove-video>
                                    <i data-lucide="trash-2" width="14"></i>
                                    <span data-i18n="removeVideo">Supprimer</span>
                                </button>
                            </div>
                            <div class="upload-box">
                                <div class="upload-icon"><i data-lucide="video" width="27"></i></div>
                                <p class="upload-title" data-i18n="uploadVideo">Importer une vidéo depuis mon ordinateur</p>
                                <p class="upload-description" data-i18n="videoFormats">Formats acceptés : MP4, WebM, MOV, M4V</p>
                                <p class="upload-description" data-i18n="videoLimit">Limite indicative : 100 MB</p>
                                <label class="choose-file">
                                    <i data-lucide="folder-open" width="17"></i>
                                    <span data-i18n="chooseVideo">Choisir une vidéo</span>
                                    <input type="file" name="video2" accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime" hidden>
                                </label>
                                <p class="file-name" data-i18n="noVideo">Aucune vidéo sélectionnée</p>
                            </div>
                            <video class="video-preview hidden" controls playsinline></video>
                            @error('video2') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <button type="button" id="add-video-btn" class="add-video-btn mt-4">
                        <i data-lucide="plus-circle" width="17"></i>
                        <span data-i18n="addAnotherVideo">Ajouter une autre vidéo</span>
                    </button>
                    <p class="upload-description mt-3" data-i18n="backendNote">
                        Les vidéos supplémentaires nécessitent leur prise en charge dans Laravel.
                    </p>
                </div>

                <!-- PDF -->
                <div class="field">
                    <label for="file" data-i18n="pdfTitle">Document PDF</label>
                    <div class="upload-box">
                        <div class="upload-icon pdf-icon"><i data-lucide="file-text" width="27"></i></div>
                        <p class="upload-title" data-i18n="addPdf">Ajouter un document PDF</p>
                        <p class="upload-description" data-i18n="pdfLimit">PDF uniquement — maximum 10 MB</p>
                        <input id="file" type="file" name="file" accept=".pdf,application/pdf" class="mt-4 block mx-auto text-xs max-w-full">
                    </div>
                    @error('file') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="order" data-i18n="orderTitle">Ordre du cours</label>
                    <input id="order" type="number" name="order" min="0" value="{{ old('order', 0) }}" class="control">
                    <p class="field-hint mt-2" data-i18n="orderHint">Un nombre plus petit permet d'afficher le cours plus tôt.</p>
                    @error('order') <p class="text-sm mt-2" style="color:var(--red-700)">{{ $message }}</p> @enderror
                </div>

                <div class="info-note">
                    <i data-lucide="info" width="19" class="shrink-0 mt-1"></i>
                    <div>
                        <strong data-i18n="infoTitle">À retenir</strong>
                        <div data-i18n="infoText">Le cours sera associé à la formation sélectionnée.</div>
                    </div>
                </div>

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

        <aside class="side-column">
            <div class="side-card">
                <h3 data-i18n="stepsTitle">Comment procéder ?</h3>
                <div class="step"><div class="step-number">1</div><div><strong data-i18n="step1Title">Choisir la formation</strong><p data-i18n="step1Text">Sélectionnez la formation concernée par ce cours.</p></div></div>
                <div class="step"><div class="step-number">2</div><div><strong data-i18n="step2Title">Ajouter le contenu</strong><p data-i18n="step2Text">Saisissez le titre, la description et le contenu pédagogique.</p></div></div>
                <div class="step"><div class="step-number">3</div><div><strong data-i18n="step3Title">Importer les fichiers</strong><p data-i18n="step3Text">Ajoutez plusieurs vidéos et un PDF si nécessaire.</p></div></div>
                <div class="step"><div class="step-number">4</div><div><strong data-i18n="step4Title">Enregistrer</strong><p data-i18n="step4Text">Cliquez sur le bouton pour enregistrer votre cours.</p></div></div>
            </div>

            <div class="tip-card">
                <div class="tip-title"><i data-lucide="lightbulb" width="19" style="color:var(--red)"></i><span data-i18n="tipTitle">Conseil pédagogique</span></div>
                <p data-i18n="tipText">Utilisez un titre clair, une description courte et un contenu bien organisé pour faciliter l'apprentissage.</p>
                <p dir="rtl" class="mt-3">استعملي عنواناً واضحاً ومحتوى منظماً لتسهيل التعلم.</p>
            </div>
        </aside>
    </div>
</main>

<footer class="footer">
    <div class="name">CAD ACADEMY</div>
    <span data-i18n="footer">Plateforme de formation en ligne · Espace administration</span>
</footer>

<script>
const translations = {
    fr: {
        admin:"ADMINISTRATION",
        dashboard:"Tableau de bord",
        back:"Retour aux cours",
        courses:"Cours",
        newCourse:"Nouveau cours",
        heroTag:"Espace administrateur",
        pageTitle:"Ajouter un nouveau cours",
        subtitle:"Préparez un contenu pédagogique complet avec texte, vidéo et document PDF.",
        formHeading:"Informations du cours",
        formSubtitle:"Complétez les informations ci-dessous",
        errorsTitle:"Veuillez corriger les erreurs suivantes :",
        formation:"Formation *",
        formationHint:"Sélectionnez la formation concernée par ce cours.",
        chooseFormation:"-- Choisir une formation --",
        courseTitle:"Titre du cours *",
        titlePlaceholder:"Exemple : Introduction au HTML",
        description:"Description",
        descriptionPlaceholder:"Présentez brièvement le cours...",
        content:"Contenu pédagogique",
        contentPlaceholder:"Écrivez ici le contenu du cours...",
        videosHeading:"Vidéos du cours",
        videosHint:"Ajoutez une ou plusieurs vidéos. Chaque vidéo dispose de son propre aperçu.",
        videoOne:"Vidéo 1",
        videoTwo:"Vidéo 2 (facultative)",
        uploadVideo:"Importer une vidéo depuis mon ordinateur",
        videoFormats:"Formats acceptés : MP4, WebM, MOV, M4V",
        videoLimit:"Limite indicative : 100 MB",
        chooseVideo:"Choisir une vidéo",
        noVideo:"Aucune vidéo sélectionnée",
        removeVideo:"Supprimer",
        addAnotherVideo:"Ajouter une autre vidéo",
        backendNote:"Les vidéos supplémentaires nécessitent leur prise en charge dans Laravel.",
        pdfTitle:"Document PDF",
        addPdf:"Ajouter un document PDF",
        pdfLimit:"PDF uniquement — maximum 10 MB",
        orderTitle:"Ordre du cours",
        orderHint:"Un nombre plus petit permet d'afficher le cours plus tôt.",
        infoTitle:"À retenir",
        infoText:"Le cours sera associé à la formation sélectionnée.",
        cancel:"Annuler",
        save:"Enregistrer le cours",
        stepsTitle:"Comment procéder ?",
        step1Title:"Choisir la formation",
        step1Text:"Sélectionnez la formation concernée par ce cours.",
        step2Title:"Ajouter le contenu",
        step2Text:"Saisissez le titre, la description et le contenu pédagogique.",
        step3Title:"Importer les fichiers",
        step3Text:"Ajoutez plusieurs vidéos et un PDF si nécessaire.",
        step4Title:"Enregistrer",
        step4Text:"Cliquez sur le bouton pour enregistrer votre cours.",
        tipTitle:"Conseil pédagogique",
        tipText:"Utilisez un titre clair, une description courte et un contenu bien organisé pour faciliter l'apprentissage.",
        footer:"Plateforme de formation en ligne · Espace administration"
    },
    ar: {
        admin:"الإدارة",
        dashboard:"لوحة التحكم",
        back:"الرجوع إلى الدروس",
        courses:"الدروس",
        newCourse:"درس جديد",
        heroTag:"فضاء الإدارة",
        pageTitle:"إضافة درس جديد",
        subtitle:"حضّري محتوى تعليمياً متكاملاً يتضمن النص والفيديو وملف PDF.",
        formHeading:"معلومات الدرس",
        formSubtitle:"املئي المعلومات التالية",
        errorsTitle:"يرجى تصحيح الأخطاء التالية:",
        formation:"التكوين *",
        formationHint:"اختاري التكوين الذي سينتمي إليه الدرس.",
        chooseFormation:"-- اختاري التكوين --",
        courseTitle:"عنوان الدرس *",
        titlePlaceholder:"مثال: مقدمة في HTML",
        description:"وصف الدرس",
        descriptionPlaceholder:"قدمي وصفاً مختصراً للدرس...",
        content:"المحتوى التعليمي",
        contentPlaceholder:"اكتبي هنا المحتوى التعليمي للدرس...",
        videosHeading:"فيديوهات الدرس",
        videosHint:"يمكنك إضافة فيديو واحد أو عدة فيديوهات مع معاينة كل فيديو.",
        videoOne:"الفيديو الأول",
        videoTwo:"الفيديو الثاني (اختياري)",
        uploadVideo:"اختاري فيديو من الحاسوب",
        videoFormats:"الصيغ المقبولة: MP4 وWebM وMOV وM4V",
        videoLimit:"الحجم الإرشادي الأقصى: 100 ميغابايت",
        chooseVideo:"اختيار فيديو",
        noVideo:"لم يتم اختيار أي فيديو",
        removeVideo:"حذف",
        addAnotherVideo:"إضافة فيديو آخر",
        backendNote:"يجب تعديل Laravel حتى يتم حفظ الفيديوهات الإضافية.",
        pdfTitle:"ملف PDF",
        addPdf:"إضافة ملف PDF",
        pdfLimit:"ملف PDF فقط — الحد الأقصى 10 ميغابايت",
        orderTitle:"ترتيب الدرس",
        orderHint:"الرقم الأصغر يسمح بعرض الدرس في ترتيب أبكر.",
        infoTitle:"معلومة مهمة",
        infoText:"سيتم ربط الدرس بالتكوين الذي اخترته.",
        cancel:"إلغاء",
        save:"حفظ الدرس",
        stepsTitle:"كيفاش تضيفي الدرس؟",
        step1Title:"اختيار التكوين",
        step1Text:"اختاري التكوين المرتبط بهذا الدرس.",
        step2Title:"إضافة المحتوى",
        step2Text:"أدخلي العنوان والوصف والمحتوى التعليمي.",
        step3Title:"إضافة الملفات",
        step3Text:"أضيفي عدة فيديوهات وملف PDF عند الحاجة.",
        step4Title:"حفظ الدرس",
        step4Text:"اضغطي على الزر لحفظ الدرس.",
        tipTitle:"نصيحة تعليمية",
        tipText:"استعملي عنواناً واضحاً ووصفاً قصيراً ومحتوى منظماً لتسهيل التعلم.",
        footer:"منصة للتكوين عن بعد · فضاء الإدارة"
    }
};

function applyLanguage(lang) {
    const dict = translations[lang] || translations.fr;
    document.documentElement.lang = lang;
    document.documentElement.dir = lang === "ar" ? "rtl" : "ltr";
    document.title = (lang === "ar" ? "إضافة درس | " : "Ajouter un cours | ") + "CAD ACADEMY";

    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");
        if (Object.prototype.hasOwnProperty.call(dict, key)) el.textContent = dict[key];
    });

    document.querySelectorAll("[data-i18n-placeholder]").forEach(el => {
        const key = el.getAttribute("data-i18n-placeholder");
        if (Object.prototype.hasOwnProperty.call(dict, key)) el.placeholder = dict[key];
    });

    document.getElementById("language-button").textContent =
        lang === "ar" ? "Français" : "العربية";

    document.querySelectorAll(".back-icon").forEach(icon => {
        icon.style.transform = lang === "ar" ? "scaleX(-1)" : "scaleX(1)";
    });

    try {
        localStorage.setItem("cadacademy_admin_language", lang);
    } catch (error) {}

    updateVideoLabels();

    if (window.lucide) lucide.createIcons();
}

function toggleLanguage() {
    applyLanguage(document.documentElement.lang === "ar" ? "fr" : "ar");
}

document.getElementById("language-button-toggle").addEventListener("click", toggleLanguage);

const videoList = document.getElementById("video-list");
const addVideoButton = document.getElementById("add-video-btn");

function initializeVideoItem(item) {
    const input = item.querySelector('input[type="file"]');
    const name = item.querySelector(".file-name");
    const preview = item.querySelector(".video-preview");

    if (!input || !name || !preview) return;

    input.addEventListener("change", function () {
        const file = this.files && this.files[0];

        if (preview.dataset.objectUrl) {
            URL.revokeObjectURL(preview.dataset.objectUrl);
            delete preview.dataset.objectUrl;
        }

        preview.pause();
        preview.removeAttribute("src");
        preview.load();
        preview.classList.add("hidden");

        const dict = translations[document.documentElement.lang] || translations.fr;

        if (!file) {
            name.textContent = dict.noVideo;
            return;
        }

        const allowedExtensions = /\.(mp4|webm|mov|m4v)$/i;

        if (!allowedExtensions.test(file.name)) {
            this.value = "";
            name.textContent = document.documentElement.lang === "ar"
                ? "صيغة الفيديو غير مدعومة."
                : "Le format de la vidéo n'est pas accepté.";
            return;
        }

        if (file.size > 100 * 1024 * 1024) {
            this.value = "";
            name.textContent = document.documentElement.lang === "ar"
                ? "حجم الفيديو يتجاوز 100 ميغابايت."
                : "La vidéo dépasse la limite indicative de 100 MB.";
            return;
        }

        name.textContent = file.name + " (" + (file.size / (1024 * 1024)).toFixed(1) + " MB)";

        const objectUrl = URL.createObjectURL(file);
        preview.dataset.objectUrl = objectUrl;
        preview.src = objectUrl;
        preview.classList.remove("hidden");
        preview.load();
    });

    const removeButton = item.querySelector("[data-remove-video]");

    if (removeButton) {
        removeButton.addEventListener("click", function () {
            if (videoList.querySelectorAll(".video-item").length <= 1) return;

            if (preview.dataset.objectUrl) URL.revokeObjectURL(preview.dataset.objectUrl);

            item.remove();
            updateVideoLabels();
        });
    }
}

function updateVideoLabels() {
    const lang = document.documentElement.lang;
    const dict = translations[lang] || translations.fr;

    videoList.querySelectorAll(".video-item").forEach((item, index) => {
        const title = item.querySelector(".video-item-title");
        if (!title) return;

        if (index === 0) {
            title.textContent = dict.videoOne;
        } else if (index === 1 && item.querySelector('input[name="video2"]')) {
            title.textContent = dict.videoTwo;
        } else {
            title.textContent = (lang === "ar" ? "الفيديو " : "Vidéo ") + (index + 1);
        }
    });
}

videoList.querySelectorAll(".video-item").forEach(initializeVideoItem);

addVideoButton.addEventListener("click", function () {
    const item = document.createElement("div");
    item.className = "video-item";

    item.innerHTML = `
        <div class="video-item-header">
            <span class="video-item-title"></span>
            <button type="button" class="remove-video" data-remove-video>
                <i data-lucide="trash-2" width="14"></i>
                <span></span>
            </button>
        </div>
        <div class="upload-box">
            <div class="upload-icon"><i data-lucide="video" width="27"></i></div>
            <p class="upload-title"></p>
            <p class="upload-description"></p>
            <label class="choose-file">
                <i data-lucide="folder-open" width="17"></i>
                <span></span>
                <input type="file" name="videos[]" accept=".mp4,.webm,.mov,.m4v,video/mp4,video/webm,video/quicktime" hidden>
            </label>
            <p class="file-name"></p>
        </div>
        <video class="video-preview hidden" controls playsinline></video>
    `;

    const dict = translations[document.documentElement.lang] || translations.fr;

    item.querySelector(".remove-video span").textContent = dict.removeVideo;
    item.querySelector(".upload-title").textContent = dict.uploadVideo;
    item.querySelector(".upload-description").textContent = dict.videoFormats;
    item.querySelector(".choose-file span").textContent = dict.chooseVideo;
    item.querySelector(".file-name").textContent = dict.noVideo;

    videoList.appendChild(item);
    initializeVideoItem(item);
    updateVideoLabels();

    if (window.lucide) lucide.createIcons();
});

let savedLanguage = "fr";
try {
    savedLanguage = localStorage.getItem("cadacademy_admin_language") || "fr";
} catch (error) {}

applyLanguage(savedLanguage);

window.addEventListener("beforeunload", function () {
    document.querySelectorAll(".video-preview").forEach(preview => {
        if (preview.dataset.objectUrl) URL.revokeObjectURL(preview.dataset.objectUrl);
    });
});
</script>
</body>
</html>