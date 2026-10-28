<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }} | ÉtudeEnLigne</title>

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
            --emerald: #10B981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --emerald-50: #ECFDF5;
            --emerald-100: #D1FAE5;
            --dark: #064E3B;
            --darker: #053D2F;
            --bg: #F2F6F4;
            --border: #E3E9E6;
            --text: #1F2937;
            --muted: #6B7280;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Tajawal', 'Plus Jakarta Sans', Arial, sans-serif; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }
        [dir="rtl"] .flip svg { transform: scaleX(-1); }

        /* ================= BANDEAU SOMBRE ================= */
        .topband {
            background:
                radial-gradient(600px 240px at 90% -20%, rgba(16, 185, 129, .35), transparent 70%),
                linear-gradient(135deg, var(--darker), var(--dark));
            color: #fff;
        }
        .wrap { max-width: 1120px; margin: 0 auto; padding: 0 20px; }

        .nav { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 14px 0; }
        .brand { display: flex; align-items: center; gap: 10px; color: #fff; text-decoration: none; font-size: 17px; font-weight: 800; }
        .brand-icon { width: 36px; height: 36px; border-radius: 10px; background: var(--emerald); display: grid; place-items: center; box-shadow: 0 6px 16px rgba(16, 185, 129, .4); }
        .brand-icon svg { width: 19px; height: 19px; }
        .nav-actions { display: flex; align-items: center; gap: 8px; }

        .lang-switch { display: inline-flex; gap: 2px; background: rgba(255, 255, 255, .1); border: 1px solid rgba(255, 255, 255, .15); border-radius: 10px; padding: 3px; }
        .lang-switch button { border: none; background: transparent; color: #A7F3D0; padding: 6px 12px; border-radius: 7px; font-family: inherit; font-size: 12.5px; font-weight: 700; cursor: pointer; transition: all .15s; }
        .lang-switch button.active { background: #fff; color: var(--dark); }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 16px; border-radius: 10px; font-family: inherit; font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer; border: 1px solid transparent; transition: all .15s ease; }
        .btn-ghost { background: rgba(255, 255, 255, .1); color: #fff; border-color: rgba(255, 255, 255, .18); }
        .btn-ghost:hover { background: rgba(255, 255, 255, .18); }
        .btn-primary { background: var(--emerald-600); color: #fff; box-shadow: 0 6px 16px rgba(5, 150, 105, .3); }
        .btn-primary:hover { background: var(--dark); }
        .btn-light { background: #fff; color: var(--emerald-700); border-color: var(--border); }
        .btn-light:hover { background: var(--emerald-50); }
        .btn-block { width: 100%; padding: 13px; font-size: 14px; }

        .hero { padding: 18px 0 70px; }
        .hero-eyebrow { display: inline-flex; align-items: center; gap: 7px; padding: 5px 12px; border-radius: 999px; background: rgba(255, 255, 255, .1); border: 1px solid rgba(255, 255, 255, .16); color: #A7F3D0; font-size: 12px; font-weight: 700; }
        .hero h1 { margin-top: 12px; font-size: clamp(1.5rem, 3.4vw, 2.2rem); font-weight: 800; line-height: 1.2; letter-spacing: -.5px; overflow-wrap: anywhere; }
        .hero-desc { margin-top: 10px; max-width: 640px; color: #BFE9D6; line-height: 1.7; font-size: 14px; }
        .hero-meta { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 16px; }
        .meta { display: inline-flex; align-items: center; gap: 8px; padding: 7px 13px; border-radius: 10px; background: rgba(255, 255, 255, .08); border: 1px solid rgba(255, 255, 255, .12); font-size: 12.5px; font-weight: 600; color: #E7FFF4; }
        .meta svg { color: #6EE7B7; }

        /* ================= CORPS ================= */
        .layout { display: grid; grid-template-columns: minmax(0, 1fr) 300px; gap: 20px; margin-top: -44px; padding-bottom: 40px; align-items: start; }

        /* ---------- Questions ---------- */
        .q-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; margin-bottom: 14px; box-shadow: 0 4px 18px rgba(15, 59, 45, .05); overflow: hidden; scroll-margin-top: 16px; transition: border-color .2s; }
        .q-card.answered { border-color: #A7F3D0; }
        .q-top { display: flex; align-items: flex-start; gap: 14px; padding: 18px 20px 6px; }
        .q-num { min-width: 40px; height: 40px; padding: 0 8px; border-radius: 12px; background: var(--emerald-50); color: var(--emerald-700); border: 1px solid var(--emerald-100); display: grid; place-items: center; font-weight: 800; font-size: 15px; flex-shrink: 0; transition: all .2s; }
        .q-card.answered .q-num { background: var(--emerald-600); border-color: var(--emerald-600); color: #fff; }
        .q-label { font-size: 11px; font-weight: 800; letter-spacing: .4px; text-transform: uppercase; color: var(--muted); }
        .q-text { margin-top: 3px; font-size: 16.5px; font-weight: 800; color: var(--darker); line-height: 1.45; overflow-wrap: anywhere; }

        .options { display: grid; gap: 9px; padding: 14px 20px 20px; }
        .option { display: block; cursor: pointer; }
        .option input { position: absolute; width: 1px; height: 1px; opacity: 0; pointer-events: none; }
        .option-content { display: flex; align-items: center; gap: 13px; padding: 12px 14px; border: 1.5px solid var(--border); border-radius: 12px; background: #fff; transition: all .15s; }
        .option:hover .option-content { border-color: #6EE7B7; background: #FAFFFD; transform: translateY(-1px); }
        .radio { width: 20px; height: 20px; border-radius: 50%; border: 2px solid #CBD5D1; flex-shrink: 0; display: grid; place-items: center; transition: all .15s; }
        .radio::after { content: ""; width: 8px; height: 8px; border-radius: 50%; background: #fff; transform: scale(0); transition: transform .15s; }
        .letter { width: 28px; height: 28px; border-radius: 8px; background: #F1F5F4; color: #475569; display: grid; place-items: center; font-weight: 800; font-size: 12.5px; flex-shrink: 0; transition: all .15s; }
        .option-text { flex: 1; font-size: 14px; font-weight: 600; color: #1F2937; overflow-wrap: anywhere; line-height: 1.5; }

        .option input:checked + .option-content { border-color: var(--emerald); background: var(--emerald-50); box-shadow: 0 0 0 3px rgba(16, 185, 129, .14); }
        .option input:checked + .option-content .radio { border-color: var(--emerald-600); background: var(--emerald-600); }
        .option input:checked + .option-content .radio::after { transform: scale(1); }
        .option input:checked + .option-content .letter { background: var(--emerald-600); color: #fff; }
        .option input:focus-visible + .option-content { outline: 3px solid var(--emerald-700); outline-offset: 2px; }

        /* ---------- Panneau latéral ---------- */
        .side { position: sticky; top: 16px; display: grid; gap: 14px; }
        .side-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 18px; box-shadow: 0 4px 18px rgba(15, 59, 45, .05); }
        .side-title { font-size: 12px; font-weight: 800; letter-spacing: .4px; text-transform: uppercase; color: var(--muted); margin-bottom: 14px; }

        .prog { display: flex; align-items: center; gap: 16px; }
        .prog-ring { position: relative; width: 84px; height: 84px; flex-shrink: 0; }
        .prog-ring svg { width: 100%; height: 100%; transform: rotate(-90deg); }
        .prog-ring circle.fill { transition: stroke-dashoffset .4s ease; }
        [dir="rtl"] .prog-ring svg { transform: rotate(-90deg); }
        .prog-pct { position: absolute; inset: 0; display: grid; place-items: center; font-size: 17px; font-weight: 800; color: var(--darker); direction: ltr; }
        .prog-text strong { display: block; font-size: 22px; font-weight: 800; color: var(--darker); direction: ltr; text-align: start; }
        .prog-text span { font-size: 12.5px; color: var(--muted); }

        .dots { display: grid; grid-template-columns: repeat(5, 1fr); gap: 7px; }
        .dot { height: 36px; border-radius: 9px; border: 1.5px solid var(--border); background: #fff; color: #64748B; font-family: inherit; font-size: 13px; font-weight: 800; cursor: pointer; transition: all .15s; }
        .dot:hover { border-color: var(--emerald); color: var(--emerald-700); }
        .dot.done { background: var(--emerald-600); border-color: var(--emerald-600); color: #fff; }

        .legend { display: flex; gap: 14px; margin-top: 12px; font-size: 11.5px; color: var(--muted); }
        .legend span { display: inline-flex; align-items: center; gap: 6px; }
        .legend i { width: 10px; height: 10px; border-radius: 3px; display: inline-block; }
        .lg-done { background: var(--emerald-600); }
        .lg-todo { background: #fff; border: 1.5px solid var(--border); }

        .side-note { margin-top: 10px; font-size: 12px; color: var(--muted); text-align: center; line-height: 1.5; }

        /* ---------- Barre mobile ---------- */
        .mobile-bar { display: none; }

        .empty { background: #fff; border: 1.5px dashed #CBD5E1; border-radius: 16px; padding: 48px 18px; text-align: center; }
        .empty-icon { width: 56px; height: 56px; margin: 0 auto 14px; border-radius: 15px; background: #FFFBEB; color: #D97706; display: grid; place-items: center; }
        .empty-icon svg { width: 26px; height: 26px; }
        .empty h2 { font-size: 17px; font-weight: 800; color: var(--darker); }
        .empty p { margin: 6px 0 18px; color: var(--muted); font-size: 13px; }

        .footer { padding: 0 0 26px; text-align: center; font-size: 12px; color: #94A3B8; }

        @media (max-width: 900px) {
            .layout { grid-template-columns: 1fr; }
            .side { display: none; }
            .mobile-bar {
                display: flex; align-items: center; gap: 12px;
                position: fixed; inset-inline: 0; bottom: 0; z-index: 40;
                padding: 10px 14px calc(10px + env(safe-area-inset-bottom));
                background: rgba(255, 255, 255, .96); backdrop-filter: blur(8px);
                border-top: 1px solid var(--border); box-shadow: 0 -6px 20px rgba(15, 59, 45, .08);
            }
            .mobile-info { flex: 1; min-width: 0; }
            .mobile-info strong { font-size: 13px; color: var(--darker); direction: ltr; display: block; text-align: start; }
            .mobile-track { height: 5px; background: var(--emerald-100); border-radius: 99px; margin-top: 6px; overflow: hidden; }
            .mobile-track div { height: 100%; width: 0; background: var(--emerald-600); border-radius: 99px; transition: width .3s; }
            .footer { padding-bottom: 90px; }
        }
        @media (max-width: 640px) {
            .wrap { padding: 0 12px; }
            .btn-back span { display: none; }
            .hero { padding-bottom: 60px; }
            .q-top { padding: 15px 15px 4px; }
            .options { padding: 12px 15px 16px; }
            .q-text { font-size: 15px; }
        }
        @media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
    </style>
</head>

<body>

    <!-- ================= BANDEAU ================= -->
    <header class="topband">
        <div class="wrap">

            <div class="nav">
                <a href="{{ route('dashboard') }}" class="brand">
                    <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
                    <span>ÉtudeEnLigne</span>
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
                                        <circle cx="40" cy="40" r="34" fill="none" stroke="#E6F6EA" stroke-width="8"></circle>
                                        <circle id="ring" class="fill" cx="40" cy="40" r="34" fill="none"
                                                stroke="#059669" stroke-width="8" stroke-linecap="round"
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

                <div style="margin-top:-44px;padding-bottom:40px;">
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
            © {{ date('Y') }} ÉtudeEnLigne · <span data-i18n="rights">Tous droits réservés</span>
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