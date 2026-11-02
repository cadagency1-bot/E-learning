<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter une question / إضافة سؤال | CAD ACADEMY</title>

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
        .sep { opacity: .55; font-weight: 600; }

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

        .back-btn:focus-visible, .btn:focus-visible, .option input[type="radio"]:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        /* ---------- Contenu ---------- */
        .wrap { max-width: 720px; margin: 0 auto; padding: 26px 16px 48px; }

        .card { background: #fff; border: 1px solid var(--border); border-top: 3px solid var(--red); border-radius: 16px; padding: 28px; }

        .head { margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid var(--border); }

        .quiz-name { display: inline-flex; align-items: center; gap: 7px; padding: 5px 11px; border-radius: 999px; background: var(--red-50); border: 1px solid var(--red-100); color: var(--red-700); font-size: 12px; font-weight: 700; overflow-wrap: anywhere; }

        h1 { margin-top: 12px; font-size: 24px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; line-height: 1.3; }
        h1 .ar { display: block; margin-top: 4px; font-size: 19px; font-weight: 700; color: var(--red); letter-spacing: 0; }

        .field { margin-bottom: 24px; }

        .label { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; margin-bottom: 9px; }
        .label .fr { font-size: 13px; font-weight: 800; color: var(--ink); }
        .label .ar { font-size: 13px; font-weight: 700; color: var(--red); }

        .input, textarea.input {
            width: 100%; border: 1px solid #D9D9D9; border-radius: 12px; padding: 12px 14px; background: #fff;
            font-family: inherit; font-size: 13.5px; color: var(--text); outline: none; transition: border-color .2s, box-shadow .2s;
        }
        .input::placeholder { color: #A3A3A3; }
        .input:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .13); }
        textarea.input { min-height: 96px; line-height: 1.7; resize: vertical; }

        /* ---------- Réponses ---------- */
        .option { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }

        .option .letter {
            width: 32px; height: 32px; flex-shrink: 0; border-radius: 9px; background: var(--ink); color: #fff;
            display: grid; place-items: center; font-size: 12px; font-weight: 800;
        }

        .option input[type="radio"] { width: 20px; height: 20px; flex-shrink: 0; accent-color: var(--red); cursor: pointer; }
        .option .input { flex: 1; min-width: 0; padding: 11px 14px; }

        .help { margin-top: 10px; padding: 10px 12px; border-radius: 10px; background: var(--red-50); border-inline-start: 4px solid var(--red); color: var(--ink); font-size: 12px; line-height: 1.7; }
        .help .ar { color: var(--muted); }

        .error-text { color: var(--red-700); font-size: 12px; margin-top: 6px; font-weight: 600; }

        /* ---------- Boutons ---------- */
        .actions { display: flex; align-items: center; justify-content: flex-end; flex-wrap: wrap; gap: 11px; padding-top: 20px; border-top: 1px solid var(--border); }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 46px;
            padding: 12px 20px; border-radius: 12px; border: 1px solid transparent; font-family: inherit;
            font-size: 13px; font-weight: 800; text-decoration: none; cursor: pointer; transition: background .2s;
        }
        .btn-cancel { background: #fff; color: #555; border-color: #D9D9D9; }
        .btn-cancel:hover { background: var(--soft); }
        .btn-save { background: var(--red); color: #fff; }
        .btn-save:hover { background: var(--red-700); }

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

            <a href="{{ route('admin.quiz.index') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Retour <span class="sep">/</span> <span class="ar">رجوع</span></span>
            </a>

        </div>
    </header>

    <div class="wrap">

        <div class="card">

            {{-- QUIZ --}}
            <div class="head">

                <span class="quiz-name">
                    <i class="fa-solid fa-circle-question"></i>
                    {{ $quiz->title }}
                </span>

                <h1>
                    Ajouter une question
                    <span class="ar" dir="rtl">إضافة سؤال</span>
                </h1>

            </div>


            <form action="{{ route('admin.quiz.question.store', $quiz) }}" method="POST">

                @csrf


                {{-- QUESTION --}}
                <div class="field">

                    <label class="label" for="question">
                        <span class="fr">Question</span>
                        <span class="ar">السؤال</span>
                    </label>

                    <textarea
                        id="question"
                        name="question"
                        rows="3"
                        placeholder="Écrivez votre question / اكتب سؤالك..."
                        class="input">{{ old('question') }}</textarea>

                    @error('question')
                        <p class="error-text">{{ $message }}</p>
                    @enderror

                </div>


                {{-- OPTIONS --}}
                <div class="field">

                    <div class="label">
                        <span class="fr">Réponses</span>
                        <span class="ar">الاختيارات</span>
                    </div>


                    @for($i = 0; $i < 4; $i++)

                        <div class="option">

                            <span class="letter">{{ chr(65 + $i) }}</span>

                            {{-- RADIO --}}
                            <input
                                type="radio"
                                name="correct_option"
                                value="{{ $i }}"
                                aria-label="Réponse correcte {{ chr(65 + $i) }}"
                                {{ old('correct_option') !== null && (string) old('correct_option') === (string) $i ? 'checked' : '' }}>

                            {{-- OPTION --}}
                            <input
                                type="text"
                                name="options[]"
                                value="{{ old('options.' . $i) }}"
                                placeholder="Réponse {{ $i + 1 }} / الاختيار {{ $i + 1 }}"
                                class="input">

                        </div>

                    @endfor


                    <p class="help">
                        Sélectionnez la réponse correcte.
                        <span class="ar">/ اختر الإجابة الصحيحة.</span>
                    </p>


                    @error('correct_option')
                        <p class="error-text">{{ $message }}</p>
                    @enderror

                </div>


                {{-- BUTTONS --}}
                <div class="actions">

                    <a href="{{ route('admin.quiz.index') }}" class="btn btn-cancel">
                        Retour <span class="sep">/</span> <span class="ar">رجوع</span>
                    </a>

                    <button type="submit" class="btn btn-save">
                        Ajouter la question <span class="sep">/</span> <span class="ar">إضافة السؤال</span>
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