<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <title>{{ $quiz->title }} | CAD ACADEMY</title>

    <script>
        try {
            if (localStorage.getItem('etudierenligne_language') === 'ar') {
                document.documentElement.lang = 'ar';
                document.documentElement.dir = 'rtl';
            }
        } catch (e) {}
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --r: #d71920;
            --rd: #a80f15;
            --soft: #fff1f1;
            --soft2: #ffe3e4;
            --line: #f3d6d8;
            --ink: #3a2a2c;
            --head: #1f1415;
            --muted: #7a6a6c;
            --bg: #fbf7f7;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--bg);
            color: var(--ink);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Tajawal', 'Plus Jakarta Sans', Arial, sans-serif; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }
        [dir="rtl"] .flip svg { transform: scaleX(-1); }
        :focus-visible { outline: 3px solid var(--r); outline-offset: 2px; border-radius: 10px; }

        .wrap { max-width: 1120px; margin: 0 auto; padding: 0 20px; }

        /* ================= BARRE BLANCHE + LOGO ================= */
        .navbar { background: rgba(255, 255, 255, .96); backdrop-filter: blur(10px); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 30; }
        .nav { height: 68px; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        .brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand img { width: 34px; height: 34px; object-fit: contain; }
        .brand span { font-weight: 800; font-size: 17px; letter-spacing: .14em; color: var(--r); text-transform: uppercase; white-space: nowrap; }
        .nav-actions { display: flex; align-items: center; gap: 8px; }

        .lang-switch { display: inline-flex; gap: 2px; background: var(--soft); border: 1px solid var(--line); border-radius: 999px; padding: 3px; }
        .lang-switch button { border: none; background: transparent; color: var(--muted); padding: 6px 13px; border-radius: 999px; font-family: inherit; font-size: 12.5px; font-weight: 800; cursor: pointer; transition: all .15s; }
        .lang-switch button.active { background: var(--r); color: #fff; }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 18px; border-radius: 12px; font-family: inherit; font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer; border: 1.5px solid transparent; transition: all .15s ease; }
        .btn-ghost { background: #fff; color: var(--r); border-color: var(--r); }
        .btn-ghost:hover { background: var(--soft); }
        .btn-primary { background: var(--r); color: #fff; border-color: var(--r); box-shadow: 0 10px 20px -10px rgba(215, 25, 32, .8); }
        .btn-primary:hover { background: var(--rd); border-color: var(--rd); }
        .btn-light { background: #fff; color: var(--r); border-color: var(--r); }
        .btn-light:hover { background: var(--soft); }
        .btn-block { width: 100%; padding: 14px; font-size: 14px; }

        /* ================= BANDEAU ROUGE ================= */
        .topband {
            position: relative; overflow: hidden; color: #fff;
            background:
                radial-gradient(520px 220px at 88% -10%, rgba(255, 255, 255, .16), transparent 70%),
                linear-gradient(135deg, var(--r) 0%, var(--rd) 100%);
            border-radius: 0 0 36px 36px;
        }
        .topband::after { content: ""; position: absolute; inset-inline-start: -70px; bottom: -90px; width: 240px; height: 240px; border-radius: 50%; background: rgba(255, 255, 255, .07); }

        .hero { position: relative; z-index: 1; padding: 30px 0 84px; }
        .hero-eyebrow { display: inline-flex; align-items: center; gap: 7px; padding: 5px 13px; border-radius: 999px; background: rgba(255, 255, 255, .16); border: 1px solid rgba(255, 255, 255, .28); color: #fff; font-size: 12px; font-weight: 700; }
        .hero h1 { margin-top: 14px; font-size: clamp(1.6rem, 3.6vw, 2.4rem); font-weight: 800; line-height: 1.2; letter-spacing: -.5px; overflow-wrap: anywhere; }
        .hero-desc { margin-top: 10px; max-width: 640px; color: #ffe3e4; line-height: 1.7; font-size: 14.5px; }
        .hero-meta { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 18px; }
        .meta { display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 12px; background: rgba(255, 255, 255, .14); border: 1px solid rgba(255, 255, 255, .22); font-size: 12.5px; font-weight: 600; color: #fff; }

        /* ================= CORPS ================= */
        .layout { display: grid; grid-template-columns: minmax(0, 1fr) 310px; gap: 22px; margin-top: -48px; padding-bottom: 44px; align-items: start; position: relative; z-index: 2; }

        /* ---------- Questions ---------- */
        .q-card { background: #fff; border: 1px solid var(--line); border-radius: 22px; margin-bottom: 16px; box-shadow: 0 18px 40px -28px rgba(168, 15, 21, .4); overflow: hidden; scroll-margin-top: 90px; transition: border-color .2s, box-shadow .2s; }
        .q-card.answered { border-color: var(--r); box-shadow: 0 18px 40px -22px rgba(215, 25, 32, .45); }
        .q-top { display: flex; align-items: flex-start; gap: 14px; padding: 20px 22px 6px; }
        .q-num { min-width: 44px; height: 44px; padding: 0 8px; border-radius: 14px; background: var(--soft); color: var(--r); border: 1px solid var(--line); display: grid; place-items: center; font-weight: 800; font-size: 16px; flex-shrink: 0; transition: all .2s; }
        .q-card.answered .q-num { background: var(--r); border-color: var(--r); color: #fff; box-shadow: 0 10px 18px -10px rgba(215, 25, 32, .9); }
        .q-label { font-size: 11px; font-weight: 800; letter-spacing: .4px; text-transform: uppercase; color: var(--r); }
        .q-text { margin-top: 3px; font-size: 17px; font-weight: 800; color: var(--head); line-height: 1.45; overflow-wrap: anywhere; }

        .options { display: grid; gap: 10px; padding: 16px 22px 22px; }
        .option { display: block; cursor: pointer; }
        .option input { position: absolute; width: 1px; height: 1px; opacity: 0; pointer-events: none; }
        .option-content { display: flex; align-items: center; gap: 13px; padding: 13px 15px; border: 1.5px solid var(--line); border-radius: 14px; background: #fff; transition: all .15s; }
        .option:hover .option-content { border-color: var(--r); background: var(--soft); transform: translateY(-1px); }
        .radio { width: 20px; height: 20px; border-radius: 50%; border: 2px solid #e2c9cb; flex-shrink: 0; display: grid; place-items: center; transition: all .15s; }
        .radio::after { content: ""; width: 8px; height: 8px; border-radius: 50%; background: #fff; transform: scale(0); transition: transform .15s; }
        .letter { width: 30px; height: 30px; border-radius: 9px; background: var(--soft); color: var(--rd); display: grid; place-items: center; font-weight: 800; font-size: 12.5px; flex-shrink: 0; transition: all .15s; }
        .option-text { flex: 1; font-size: 14px; font-weight: 600; color: var(--head); overflow-wrap: anywhere; line-height: 1.5; }

        .option input:checked + .option-content { border-color: var(--r); background: var(--soft); box-shadow: 0 0 0 4px rgba(215, 25, 32, .12); }
        .option input:checked + .option-content .radio { border-color: var(--r); background: var(--r); }
        .option input:checked + .option-content .radio::after { transform: scale(1); }
        .option input:checked + .option-content .letter { background: var(--r); color: #fff; }
        .option input:focus-visible + .option-content { outline: 3px solid var(--r); outline-offset: 2px; }

        /* ---------- Panneau latéral ---------- */
        .side { position: sticky; top: 90px; display: grid; gap: 14px; }
        .side-card { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 20px; box-shadow: 0 18px 40px -28px rgba(168, 15, 21, .4); }
        .side-title { font-size: 12px; font-weight: 800; letter-spacing: .4px; text-transform: uppercase; color: var(--r); margin-bottom: 14px; }

        .prog { display: flex; align-items: center; gap: 16px; }
        .prog-ring { position: relative; width: 88px; height: 88px; flex-shrink: 0; }
        .prog-ring svg { width: 100%; height: 100%; transform: rotate(-90deg); }
        .prog-ring circle.fill { transition: stroke-dashoffset .4s ease; }
        [dir="rtl"] .prog-ring svg { transform: rotate(-90deg); }
        .prog-pct { position: absolute; inset: 0; display: grid; place-items: center; font-size: 18px; font-weight: 800; color: var(--head); direction: ltr; }
        .prog-text strong { display: block; font-size: 24px; font-weight: 800; color: var(--r); direction: ltr; text-align: start; }
        .prog-text span { font-size: 12.5px; color: var(--muted); }

        .dots { display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; }
        .dot { height: 38px; border-radius: 11px; border: 1.5px solid var(--line); background: #fff; color: var(--muted); font-family: inherit; font-size: 13px; font-weight: 800; cursor: pointer; transition: all .15s; }
        .dot:hover { border-color: var(--r); color: var(--r); }
        .dot.done { background: var(--r); border-color: var(--r); color: #fff; }

        .legend { display: flex; gap: 14px; margin-top: 14px; font-size: 11.5px; color: var(--muted); }
        .legend span { display: inline-flex; align-items: center; gap: 6px; }
        .legend i { width: 11px; height: 11px; border-radius: 4px; display: inline-block; }
        .lg-done { background: var(--r); }
        .lg-todo { background: #fff; border: 1.5px solid var(--line); }

        .side-note { margin-top: 10px; font-size: 12px; color: var(--muted); text-align: center; line-height: 1.5; }

        /* ---------- Barre mobile ---------- */
        .mobile-bar { display: none; }

        .empty { background: #fff; border: 1.5px dashed var(--r); border-radius: 22px; padding: 48px 18px; text-align: center; }
        .empty-icon { width: 58px; height: 58px; margin: 0 auto 14px; border-radius: 16px; background: var(--soft); color: var(--r); display: grid; place-items: center; }
        .empty-icon svg { width: 27px; height: 27px; }
        .empty h2 { font-size: 17px; font-weight: 800; color: var(--head); }
        .empty p { margin: 6px 0 18px; color: var(--muted); font-size: 13px; }

        .footer { padding: 0 0 26px; text-align: center; font-size: 12px; color: var(--muted); }
        .footer b { color: var(--r); letter-spacing: .1em; }

        @media (max-width: 900px) {
            .layout { grid-template-columns: 1fr; }
            .side { display: none; }
            .mobile-bar {
                display: flex; align-items: center; gap: 12px;
                position: fixed; inset-inline: 0; bottom: 0; z-index: 40;
                padding: 10px 14px calc(10px + env(safe-area-inset-bottom));
                background: rgba(255, 255, 255, .97); backdrop-filter: blur(8px);
                border-top: 1px solid var(--line); box-shadow: 0 -8px 24px rgba(168, 15, 21, .1);
            }
            .mobile-info { flex: 1; min-width: 0; }
            .mobile-info strong { font-size: 13px; color: var(--head); direction: ltr; display: block; text-align: start; }
            .mobile-track { height: 6px; background: var(--soft2); border-radius: 99px; margin-top: 6px; overflow: hidden; }
            .mobile-track div { height: 100%; width: 0; background: var(--r); border-radius: 99px; transition: width .3s; }
            .footer { padding-bottom: 90px; }
        }
        @media (max-width: 640px) {
            .wrap { padding: 0 12px; }
            .btn-back span { display: none; }
            .brand span { font-size: 15px; }
            .hero { padding-bottom: 74px; }
            .q-top { padding: 16px 16px 4px; }
            .options { padding: 12px 16px 18px; }
            .q-text { font-size: 15.5px; }
        }
        @media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
    </style>
</head>

<body>

    <!-- ================= BARRE + LOGO ================= -->
    <div class="navbar">
        <div class="wrap nav">
            <a href="{{ route('dashboard') }}" class="brand">
                <img src="{{ asset('images/logo-centre.png') }}" alt="" onerror="this.style.display='none'">
                <span>CAD ACADEMY</span>
            </a>

            <div class="nav-actions">
                <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                    <button type="button" data-lang-btn="fr" class="active">FR</button>
                    <button type="button" data-lang-btn="ar">العربية</button>
                </div>

                <a href="{{ route('dashboard') }}" class="btn btn-ghost btn-back flip">
                    <i data-lucide="arrow-left"></i>
                    <span data-i18n="back">Retour</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ================= BANDEAU ================= -->
    <header class="topband">
        <div class="wrap">
            <div class="hero">
                <span class="hero-eyebrow">
                    <i data-lucide="clipboard-check" style="width:14px;height:14px;"></i>
                    <span data-i18n="quiz">Quiz</span>
                </span>

                <h1>{{ $quiz->title }}</h1>

                @if($quiz->description)
                    <p class="hero-desc">{{ $quiz->description }}</p>
                @endif

                <div class="hero-meta">
                    @if($quiz->formation)
                        <span class="meta">
                            <i data-lucide="book-open"></i>
                            <span><span data-i18n="formation">Formation</span> : {{ $quiz->formation->name }}</span>
                        </span>
                    @endif

                    <span class="meta">
                        <i data-lucide="list-checks"></i>
                        <span><bdi>{{ $quiz->questions->count() }}</bdi> <span data-i18n="questions">questions</span></span>
                    </span>

                    <span class="meta">
                        <i data-lucide="target"></i>
                        <span data-i18n="pass_rule">80 % minimum pour réussir</span>
                    </span>
                </div>
            </div>
        </div>
    </header>


    <main class="wrap">

        <form action="{{ route('quiz.submit', $quiz) }}" method="POST" id="quiz-form">

            @csrf

            @if($quiz->questions->count() > 0)

                <div class="layout">

                    <!-- ============ QUESTIONS ============ -->
                    <section>

                        @foreach($quiz->questions as $index => $question)

                            <article class="q-card" id="q-{{ $question->id }}" data-question>

                                <div class="q-top">
                                    <div class="q-num">{{ $index + 1 }}</div>
                                    <div style="min-width:0;">
                                        <div class="q-label">
                                            <span data-i18n="question">Question</span> {{ $index + 1 }}
                                            <span data-i18n="of">sur</span> {{ $quiz->questions->count() }}
                                        </div>
                                        <h2 class="q-text">{{ $question->question }}</h2>
                                    </div>
                                </div>

                                <div class="options">

                                    @foreach($question->options as $option)

                                        <label class="option">

                                            <input
                                                type="radio"
                                                name="answers[{{ $question->id }}]"
                                                value="{{ $option->id }}"
                                            >

                                            <div class="option-content">
                                                <span class="radio"></span>
                                                <span class="letter">{{ chr(65 + $loop->index) }}</span>
                                                <span class="option-text">{{ $option->option }}</span>
                                            </div>

                                        </label>

                                    @endforeach

                                </div>

                            </article>

                        @endforeach

                    </section>


                    <!-- ============ PANNEAU LATÉRAL ============ -->
                    <aside class="side">

                        <div class="side-card">
                            <div class="side-title" data-i18n="progress">Progression</div>

                            <div class="prog">
                                <div class="prog-ring">
                                    <svg viewBox="0 0 80 80">
                                        <circle cx="40" cy="40" r="34" fill="none" stroke="#ffe3e4" stroke-width="8"></circle>
                                        <circle id="ring" class="fill" cx="40" cy="40" r="34" fill="none"
                                                stroke="#d71920" stroke-width="8" stroke-linecap="round"
                                                stroke-dasharray="213.63" stroke-dashoffset="213.63"></circle>
                                    </svg>
                                    <div class="prog-pct"><span id="pct">0</span>%</div>
                                </div>

                                <div class="prog-text">
                                    <strong><span id="answered-count">0</span> / {{ $quiz->questions->count() }}</strong>
                                    <span data-i18n="answers">réponses</span>
                                </div>
                            </div>
                        </div>

                        <div class="side-card">
                            <div class="side-title" data-i18n="navigator">Navigation</div>

                            <div class="dots">
                                @foreach($quiz->questions as $index => $question)
                                    <button type="button" class="dot" data-target="q-{{ $question->id }}" data-qid="{{ $question->id }}">
                                        {{ $index + 1 }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="legend">
                                <span><i class="lg-done"></i> <span data-i18n="answered">Répondu</span></span>
                                <span><i class="lg-todo"></i> <span data-i18n="todo">À faire</span></span>
                            </div>
                        </div>

                        <div class="side-card">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i data-lucide="check"></i>
                                <span data-i18n="finish">Terminer le quiz</span>
                            </button>
                            <p class="side-note" data-i18n="check_answers">Vérifiez vos réponses avant de terminer.</p>
                        </div>

                    </aside>

                </div>

                <!-- Barre fixe (mobile / tablette) -->
                <div class="mobile-bar">
                    <div class="mobile-info">
                        <strong><span id="answered-count-m">0</span> / {{ $quiz->questions->count() }}</strong>
                        <div class="mobile-track"><div id="bar-m"></div></div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i data-lucide="check"></i>
                        <span data-i18n="finish_short">Terminer</span>
                    </button>
                </div>

            @else

                <div style="margin-top:-48px;padding-bottom:40px;position:relative;z-index:2;">
                    <div class="empty">
                        <div class="empty-icon"><i data-lucide="circle-alert"></i></div>
                        <h2 data-i18n="no_questions">Aucune question</h2>
                        <p data-i18n="no_questions_text">Ce quiz ne contient pas encore de questions.</p>

                        <a href="{{ route('dashboard') }}" class="btn btn-primary flip">
                            <i data-lucide="arrow-left"></i>
                            <span data-i18n="back">Retour</span>
                        </a>
                    </div>
                </div>

            @endif

        </form>

        <div class="footer">
            © {{ date('Y') }} <b>CAD ACADEMY</b> · <span data-i18n="rights">Tous droits réservés</span>
        </div>

    </main>


    <script>
        const translations = {
            fr: {
                back: "Retour",
                quiz: "Quiz",
                formation: "Formation",
                questions: "questions",
                question: "Question",
                of: "sur",
                pass_rule: "80 % minimum pour réussir",
                progress: "Progression",
                answers: "réponses",
                navigator: "Navigation",
                answered: "Répondu",
                todo: "À faire",
                finish: "Terminer le quiz",
                finish_short: "Terminer",
                check_answers: "Vérifiez vos réponses avant de terminer.",
                no_questions: "Aucune question",
                no_questions_text: "Ce quiz ne contient pas encore de questions.",
                rights: "Tous droits réservés"
            },
            ar: {
                back: "رجوع",
                quiz: "اختبار",
                formation: "التكوين",
                questions: "سؤال",
                question: "السؤال",
                of: "من",
                pass_rule: "80% على الأقل للنجاح",
                progress: "التقدم",
                answers: "إجابات",
                navigator: "التنقل بين الأسئلة",
                answered: "تمت الإجابة",
                todo: "لم يُجب بعد",
                finish: "إنهاء الاختبار",
                finish_short: "إنهاء",
                check_answers: "تأكد من إجاباتك قبل إنهاء الاختبار.",
                no_questions: "لا توجد أسئلة",
                no_questions_text: "هذا الاختبار لا يحتوي على أسئلة بعد.",
                rights: "جميع الحقوق محفوظة"
            }
        };

        function applyLanguage(language, persist) {
            const dictionary = translations[language];

            document.documentElement.lang = language;
            document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';

            document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
                btn.classList.toggle('active', btn.dataset.langBtn === language);
            });

            document.querySelectorAll('[data-i18n]').forEach(function (el) {
                const key = el.dataset.i18n;

                if (dictionary[key] !== undefined) {
                    el.textContent = dictionary[key];
                }
            });

            if (persist) {
                try { localStorage.setItem('etudierenligne_language', language); } catch (e) {}
            }
        }

        document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                applyLanguage(this.dataset.langBtn, true);
            });
        });

        let savedLanguage = 'fr';
        try { savedLanguage = localStorage.getItem('etudierenligne_language') || 'fr'; } catch (e) {}
        if (!translations[savedLanguage]) savedLanguage = 'fr';

        applyLanguage(savedLanguage, false);

        if (window.lucide) {
            lucide.createIcons();
        }
    </script>

    @if($quiz->questions->count() > 0)
        <script>
            (function () {
                var total = {{ $quiz->questions->count() }};
                var C = 213.63;
                var form = document.getElementById('quiz-form');
                var ring = document.getElementById('ring');
                var pctEl = document.getElementById('pct');
                var counter = document.getElementById('answered-count');
                var counterM = document.getElementById('answered-count-m');
                var barM = document.getElementById('bar-m');

                function update() {
                    var done = {};

                    form.querySelectorAll('input[type="radio"]:checked').forEach(function (r) {
                        done[r.name] = true;
                    });

                    var answered = Object.keys(done).length;
                    var pct = Math.round(answered / total * 100);

                    counter.textContent = answered;
                    counterM.textContent = answered;
                    pctEl.textContent = pct;
                    ring.style.strokeDashoffset = C * (1 - answered / total);
                    barM.style.width = pct + '%';

                    document.querySelectorAll('[data-question]').forEach(function (card) {
                        card.classList.toggle('answered', !!card.querySelector('input:checked'));
                    });

                    document.querySelectorAll('.dot').forEach(function (dot) {
                        var card = document.getElementById(dot.dataset.target);
                        dot.classList.toggle('done', !!(card && card.querySelector('input:checked')));
                    });
                }

                document.querySelectorAll('.dot').forEach(function (dot) {
                    dot.addEventListener('click', function () {
                        var target = document.getElementById(this.dataset.target);

                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    });
                });

                form.addEventListener('change', update);
                update();
            })();
        </script>
    @endif

</body>
</html>