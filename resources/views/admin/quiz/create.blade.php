<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un Quiz / إضافة اختبار | CAD ACADEMY</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            -webkit-font-smoothing: antialiased;
        }

        .ar { font-family: 'Cairo', sans-serif; }

        /* ---------- Barre rouge ---------- */
        .topbar { background: var(--red); position: relative; }
        .topbar::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0; height: 4px; background: var(--red-700); }

        .topbar-inner {
            max-width: 720px; margin: 0 auto; padding: 16px 16px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;
        }

        .brand { display: flex; align-items: center; gap: 12px; color: #fff; text-decoration: none; }
        .brand-icon { width: 42px; height: 42px; border-radius: 10px; background: #fff; color: var(--red); display: grid; place-items: center; font-size: 18px; }
        .brand-name { font-size: 22px; font-weight: 800; letter-spacing: .5px; line-height: 1; }

        .back-btn {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 10px;
            background: #fff; color: var(--red); font-size: 13px; font-weight: 700; text-decoration: none; transition: background .15s;
        }
        .back-btn:hover { background: var(--red-50); }
        .back-btn i { font-size: 11px; }
        .back-btn .sep { opacity: .5; }

        .back-btn:focus-visible, .btn:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        /* ---------- Contenu ---------- */
        .wrap { max-width: 720px; margin: 0 auto; padding: 26px 16px 48px; }

        .card { background: #fff; border: 1px solid var(--border); border-top: 3px solid var(--red); border-radius: 16px; padding: 28px; }

        .head { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 26px; padding-bottom: 22px; border-bottom: 1px solid var(--border); }
        .head-icon { width: 48px; height: 48px; flex-shrink: 0; border-radius: 12px; background: var(--red-50); color: var(--red); display: grid; place-items: center; font-size: 20px; }

        h1 { font-size: 24px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; line-height: 1.3; }
        h1 .ar { display: block; margin-top: 4px; font-size: 19px; font-weight: 700; color: var(--red); letter-spacing: 0; }

        .subtitle { margin-top: 10px; color: var(--muted); font-size: 13px; line-height: 1.7; }
        .subtitle .ar { display: block; margin-top: 2px; color: #9A9A9A; }

        .field { margin-bottom: 20px; }
        .field.last { margin-bottom: 26px; }

        .label { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; margin-bottom: 8px; }
        .label .fr { font-size: 13px; font-weight: 800; color: var(--ink); }
        .label .ar { font-size: 13px; font-weight: 700; color: var(--red); }

        .input, select.input, textarea.input {
            width: 100%; border: 1px solid #D9D9D9; border-radius: 12px; padding: 12px 14px; background: #fff;
            font-family: inherit; font-size: 13.5px; color: var(--text); outline: none; transition: border-color .2s, box-shadow .2s;
        }
        .input::placeholder { color: #A3A3A3; }
        .input:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .13); }
        textarea.input { min-height: 96px; line-height: 1.7; resize: vertical; }

        .error-text { color: var(--red-700); font-size: 12px; margin-top: 6px; font-weight: 600; }

        .actions { display: flex; align-items: center; justify-content: flex-end; flex-wrap: wrap; gap: 11px; padding-top: 20px; border-top: 1px solid var(--border); }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 46px;
            padding: 12px 20px; border-radius: 12px; border: 1px solid transparent; font-family: inherit;
            font-size: 13px; font-weight: 800; text-decoration: none; cursor: pointer; transition: background .2s;
        }
        .btn .sep { opacity: .55; font-weight: 600; }
        .btn-cancel { background: #fff; color: #555; border-color: #D9D9D9; }
        .btn-cancel:hover { background: var(--soft); }
        .btn-save { background: var(--red); color: #fff; }
        .btn-save:hover { background: var(--red-700); }
        .btn-save i { font-size: 11px; }

        .copyright { text-align: center; font-size: 12px; color: #9A9A9A; margin-top: 20px; }
        .copyright strong { color: var(--ink); letter-spacing: .5px; }

        @media (max-width: 600px) {
            .topbar-inner { padding: 14px 12px 18px; }
            .wrap { padding: 18px 10px 36px; }
            .card { padding: 20px 16px; }
            h1 { font-size: 21px; }
            .actions { flex-direction: column-reverse; align-items: stretch; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

    {{-- BARRE DU HAUT --}}
    <header class="topbar">
        <div class="topbar-inner">

            <a href="{{ route('admin.dashboard') }}" class="brand">
                <span class="brand-icon"><i class="fa-solid fa-graduation-cap"></i></span>
                <span class="brand-name">CAD ACADEMY</span>
            </a>

            {{-- RETOUR DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Retour <span class="sep">/</span> <span class="ar">رجوع</span></span>
            </a>

        </div>
    </header>

    <div class="wrap">

        {{-- CARD --}}
        <div class="card">

            {{-- TITRE --}}
            <div class="head">

                <div class="head-icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>

                <div>
                    <h1>
                        Ajouter un Quiz
                        <span class="ar" dir="rtl">إضافة اختبار</span>
                    </h1>

                    <p class="subtitle">
                        Créez un nouveau quiz pour une formation.
                        <span class="ar" dir="rtl">أنشئ اختبارًا جديدًا خاصًا بأحد التكوينات.</span>
                    </p>
                </div>

            </div>


            {{-- FORM --}}
            <form action="{{ route('admin.quiz.store') }}" method="POST">

                @csrf


                {{-- FORMATION --}}
                <div class="field">

                    <label class="label" for="formation_id">
                        <span class="fr">Formation</span>
                        <span class="ar">التكوين</span>
                    </label>

                    <select id="formation_id" name="formation_id" class="input">

                        <option value="">
                            -- Choisir une formation / اختر التكوين --
                        </option>

                        @foreach($formations as $formation)

                            <option value="{{ $formation->id }}"
                                {{ old('formation_id') == $formation->id ? 'selected' : '' }}>

                                {{ $formation->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('formation_id')
                        <p class="error-text">{{ $message }}</p>
                    @enderror

                </div>


                {{-- TITRE --}}
                <div class="field">

                    <label class="label" for="title">
                        <span class="fr">Titre du Quiz</span>
                        <span class="ar">عنوان الاختبار</span>
                    </label>

                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Exemple : Quiz HTML débutant / مثال: اختبار HTML للمبتدئين"
                           class="input">

                    @error('title')
                        <p class="error-text">{{ $message }}</p>
                    @enderror

                </div>


                {{-- DESCRIPTION --}}
                <div class="field last">

                    <label class="label" for="description">
                        <span class="fr">Description</span>
                        <span class="ar">الوصف</span>
                    </label>

                    <textarea id="description"
                              name="description"
                              rows="3"
                              placeholder="Description du quiz / اكتب وصف الاختبار..."
                              class="input">{{ old('description') }}</textarea>

                </div>


                {{-- BOUTONS --}}
                <div class="actions">

                    <a href="{{ route('admin.quiz.index') }}" class="btn btn-cancel">
                        Annuler <span class="sep">/</span> <span class="ar">إلغاء</span>
                    </a>

                    <button type="submit" class="btn btn-save">
                        <i class="fa-solid fa-plus"></i>
                        Créer le Quiz <span class="sep">/</span> <span class="ar">إنشاء الاختبار</span>
                    </button>

                </div>

            </form>

        </div>

        <p class="copyright">
            <strong>CAD ACADEMY</strong> © {{ date('Y') }}
        </p>

    </div>

</body>
</html>