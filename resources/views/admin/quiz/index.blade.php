<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz - Administration | CAD ACADEMY</title>

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
            max-width: 1200px; margin: 0 auto; padding: 16px 24px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap;
        }

        .brand { display: flex; align-items: center; gap: 12px; color: #fff; text-decoration: none; }
        .brand-icon { width: 42px; height: 42px; border-radius: 10px; background: #fff; color: var(--red); display: grid; place-items: center; font-size: 18px; }
        .brand-name { font-size: 22px; font-weight: 800; letter-spacing: .5px; line-height: 1; }

        .top-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

        .top-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 15px;
            border-radius: 10px; font-size: 13px; font-weight: 700; text-decoration: none; transition: background .15s;
            border: 1px solid rgba(255, 255, 255, .6); color: #fff; background: transparent;
        }
        .top-btn:hover { background: rgba(0, 0, 0, .18); }
        .top-btn.primary { background: #fff; color: var(--red); border-color: #fff; }
        .top-btn.primary:hover { background: var(--red-50); }
        .top-btn i { font-size: 11px; }
        .top-btn:focus-visible, .add-btn:focus-visible, .card-link:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        /* ---------- Contenu ---------- */
        .page { max-width: 1200px; margin: 0 auto; padding: 28px 24px 56px; }

        .title-block { margin-bottom: 24px; }
        .title-block h1 { font-size: 27px; font-weight: 800; color: var(--ink); letter-spacing: -.4px; line-height: 1.3; }
        .title-block h1 .ar { display: block; margin-top: 4px; font-size: 20px; font-weight: 700; color: var(--red); letter-spacing: 0; }
        .title-block p { margin-top: 8px; color: var(--muted); font-size: 13px; }

        .alert { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 22px; padding: 14px 16px; border-radius: 12px; background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); color: var(--ink); font-size: 13px; line-height: 1.6; }
        .alert i { color: var(--red); margin-top: 3px; }

        /* ---------- Grille ---------- */
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }

        .card {
            display: flex; flex-direction: column; min-width: 0; background: #fff; border: 1px solid var(--border);
            border-top: 3px solid var(--red); border-radius: 14px; padding: 22px; transition: border-color .2s, box-shadow .2s;
        }
        .card:hover { border-color: var(--red-200); border-top-color: var(--red); box-shadow: 0 8px 22px rgba(217, 4, 41, .08); }

        .card-icon { width: 46px; height: 46px; border-radius: 12px; background: var(--red-50); color: var(--red); display: grid; place-items: center; font-size: 19px; margin-bottom: 16px; }

        .card h2 { font-size: 18px; font-weight: 800; color: var(--ink); line-height: 1.4; overflow-wrap: anywhere; }

        .formation { margin-top: 8px; font-size: 13px; font-weight: 700; color: var(--red-700); overflow-wrap: anywhere; }

        .description {
            flex: 1; margin-top: 10px; color: var(--muted); font-size: 13px; line-height: 1.7; overflow-wrap: anywhere;
            display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
        }

        .card-footer {
            margin-top: 18px; padding-top: 14px; border-top: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;
        }

        .count { display: inline-flex; align-items: center; gap: 6px; padding: 6px 10px; border-radius: 999px; background: var(--ink); color: #fff; font-size: 12px; font-weight: 700; }
        .count .sep { opacity: .6; }

        .card-link { color: var(--red); font-size: 13px; font-weight: 800; text-decoration: none; }
        .card-link:hover { color: var(--red-700); text-decoration: underline; }
        .card-link i { font-size: 11px; margin-inline-start: 4px; }

        /* ---------- État vide ---------- */
        .empty { background: #fff; border: 1.5px dashed var(--red-200); border-radius: 16px; padding: 52px 20px; text-align: center; }
        .empty-icon { width: 68px; height: 68px; margin: 0 auto 18px; border-radius: 18px; background: var(--red-50); color: var(--red); display: grid; place-items: center; font-size: 28px; }
        .empty h2 { font-size: 20px; font-weight: 800; color: var(--ink); }
        .empty h2 .ar { display: block; margin-top: 4px; font-size: 17px; color: var(--red); }
        .empty p { margin-top: 10px; color: var(--muted); font-size: 13px; line-height: 1.7; }
        .empty p .ar { display: block; margin-top: 2px; }

        .add-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px; margin-top: 22px;
            padding: 12px 22px; border-radius: 12px; background: var(--red); color: #fff;
            font-size: 13px; font-weight: 800; text-decoration: none; transition: background .2s;
        }
        .add-btn:hover { background: var(--red-700); }

        @media (max-width: 1000px) { .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

        @media (max-width: 640px) {
            .topbar-inner { padding: 14px 14px 18px; }
            .top-actions { width: 100%; }
            .top-btn { flex: 1; }
            .page { padding: 20px 14px 40px; }
            .title-block h1 { font-size: 22px; }
            .grid { grid-template-columns: 1fr; gap: 14px; }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="topbar">
        <div class="topbar-inner">

            <a href="{{ route('admin.dashboard') }}" class="brand">
                <span class="brand-icon"><i class="fa-solid fa-graduation-cap"></i></span>
                <span class="brand-name">CAD ACADEMY</span>
            </a>

            <!-- ACTIONS -->
            <div class="top-actions">

                {{-- RETOUR DASHBOARD --}}
                <a href="{{ route('admin.dashboard') }}" class="top-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Retour <span class="sep">/</span> <span class="ar">رجوع</span></span>
                </a>

                {{-- AJOUTER QUIZ --}}
                <a href="{{ route('admin.quiz.create') }}" class="top-btn primary">
                    <i class="fa-solid fa-plus"></i>
                    <span>Ajouter un Quiz <span class="sep">/</span> <span class="ar">إضافة اختبار</span></span>
                </a>

            </div>

        </div>
    </header>


    <!-- CONTENT -->
    <main class="page">

        <div class="title-block">
            <h1>
                Gestion des Quiz
                <span class="ar" dir="rtl">إدارة الاختبارات</span>
            </h1>
            <p>CAD ACADEMY <span class="sep">•</span> <span class="ar">منصة CAD ACADEMY</span></p>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="alert">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
            </div>

        @endif


        {{-- QUIZZES --}}
        @if($quizzes->count() > 0)

            <div class="grid">

                @foreach($quizzes as $quiz)

                    <div class="card">

                        {{-- ICON --}}
                        <div class="card-icon">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>

                        {{-- TITLE --}}
                        <h2>{{ $quiz->title }}</h2>

                        {{-- FORMATION --}}
                        <p class="formation">
                            {{ $quiz->formation->name ?? 'Formation supprimée / التكوين محذوف' }}
                        </p>

                        {{-- DESCRIPTION --}}
                        @if($quiz->description)
                            <p class="description">{{ $quiz->description }}</p>
                        @else
                            <p class="description"></p>
                        @endif

                        {{-- FOOTER CARD --}}
                        <div class="card-footer">

                            <span class="count">
                                {{ $quiz->questions->count() }}
                                questions
                                <span class="sep">/</span>
                                <span class="ar">أسئلة</span>
                            </span>

                            <a href="{{ route('admin.quiz.question.create', $quiz) }}" class="card-link">
                                Ajouter question <span class="sep">/</span> <span class="ar">إضافة سؤال</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>


        @else


            {{-- EMPTY STATE --}}
            <div class="empty">

                <div class="empty-icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>

                <h2>
                    Aucun quiz pour le moment
                    <span class="ar" dir="rtl">لا توجد اختبارات حاليًا</span>
                </h2>

                <p>
                    Commencez par créer votre premier quiz.
                    <span class="ar" dir="rtl">ابدأ بإنشاء أول اختبار لك.</span>
                </p>

                <a href="{{ route('admin.quiz.create') }}" class="add-btn">
                    Créer un Quiz <span class="sep">/</span> <span class="ar">إنشاء اختبار</span>
                </a>

            </div>

        @endif

    </main>

</body>

</html>