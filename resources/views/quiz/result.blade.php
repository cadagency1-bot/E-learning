<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <title>Résultat du quiz | CAD ACADEMY</title>

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
            --grey: #cdb8ba;
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

        .wrap { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

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

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 20px; border-radius: 12px; font-family: inherit; font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer; border: 1.5px solid transparent; transition: all .15s ease; }
        .btn:hover { transform: translateY(-1px); }
        .btn-ghost { background: #fff; color: var(--r); border-color: var(--r); }
        .btn-ghost:hover { background: var(--soft); }
        .btn-primary { background: var(--r); color: #fff; border-color: var(--r); box-shadow: 0 10px 20px -10px rgba(215, 25, 32, .8); }
        .btn-primary:hover { background: var(--rd); border-color: var(--rd); }
        .btn-light { background: #fff; color: var(--r); border-color: var(--r); }
        .btn-light:hover { background: var(--soft); }

        /* ================= BANDEAU ROUGE + SCORE ================= */
        .topband {
            position: relative; overflow: hidden; color: #fff;
            background:
                radial-gradient(560px 240px at 85% -10%, rgba(255, 255, 255, .18), transparent 70%),
                linear-gradient(135deg, var(--r) 0%, var(--rd) 100%);
            border-radius: 0 0 40px 40px;
        }
        .topband::after { content: ""; position: absolute; inset-inline-start: -80px; bottom: -100px; width: 260px; height: 260px; border-radius: 50%; background: rgba(255, 255, 255, .07); }

        .hero { position: relative; z-index: 1; display: grid; grid-template-columns: auto 1fr; gap: 34px; align-items: center; padding: 34px 0 96px; }

        .ring-wrap { position: relative; width: 188px; height: 188px; border-radius: 50%; background: rgba(255, 255, 255, .1); box-shadow: 0 0 0 10px rgba(255, 255, 255, .08); }
        .ring-wrap svg { width: 100%; height: 100%; transform: rotate(-90deg); }
        .ring-fill { transition: stroke-dashoffset 1.4s cubic-bezier(.2, .8, .2, 1); }
        .ring-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; direction: ltr; }
        .ring-pct { font-size: 42px; font-weight: 800; line-height: 1; }
        .ring-pct small { font-size: 20px; opacity: .8; }
        .ring-frac { margin-top: 6px; font-size: 13px; font-weight: 700; color: #ffe3e4; }

        .hero-eyebrow { display: inline-flex; align-items: center; gap: 7px; padding: 5px 13px; border-radius: 999px; background: rgba(255, 255, 255, .16); border: 1px solid rgba(255, 255, 255, .28); color: #fff; font-size: 12px; font-weight: 700; }
        .hero h1 { margin-top: 12px; font-size: clamp(1.4rem, 3.2vw, 2rem); font-weight: 800; line-height: 1.25; overflow-wrap: anywhere; }

        .verdict { display: flex; align-items: center; gap: 12px; margin-top: 16px; }
        .verdict-icon { width: 44px; height: 44px; border-radius: 14px; display: grid; place-items: center; background: #fff; color: var(--r); box-shadow: 0 10px 20px -10px rgba(0, 0, 0, .5); }
        .verdict-icon svg { width: 22px; height: 22px; }
        .verdict h2 { font-size: 17px; font-weight: 800; }
        .verdict p { font-size: 13px; color: #ffe3e4; margin-top: 2px; }

        .pass-pill { display: inline-flex; align-items: center; gap: 7px; margin-top: 16px; padding: 7px 15px; border-radius: 999px; font-size: 12.5px; font-weight: 800; }
        .pass-pill.is-pass { background: #fff; color: var(--r); }
        .pass-pill.is-fail { background: transparent; color: #fff; border: 1.5px dashed rgba(255, 255, 255, .8); }

        /* ================= CORPS ================= */
        .body { margin-top: -56px; padding-bottom: 40px; position: relative; z-index: 2; }

        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
        .stat { background: #fff; border: 1px solid var(--line); border-radius: 20px; padding: 16px 18px; display: flex; align-items: center; gap: 13px; box-shadow: 0 18px 40px -28px rgba(168, 15, 21, .45); transition: transform .2s, border-color .2s; }
        .stat:hover { transform: translateY(-3px); border-color: var(--r); }
        .stat-icon { width: 44px; height: 44px; border-radius: 14px; display: grid; place-items: center; flex-shrink: 0; }
        .stat-icon svg { width: 21px; height: 21px; }
        .ic-total { background: var(--soft); color: var(--r); }
        .ic-ok { background: var(--r); color: #fff; box-shadow: 0 10px 18px -10px rgba(215, 25, 32, .9); }
        .ic-ko { background: var(--head); color: #fff; }
        .ic-none { background: #f4eeee; color: var(--muted); }
        .stat strong { display: block; font-size: 24px; font-weight: 800; line-height: 1.1; color: var(--head); }
        .stat span { font-size: 12px; color: var(--muted); }

        /* ---------- Révision ---------- */
        .panel { margin-top: 20px; background: #fff; border: 1px solid var(--line); border-radius: 22px; box-shadow: 0 18px 40px -28px rgba(168, 15, 21, .4); overflow: hidden; }
        .panel-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; padding: 18px 22px; border-bottom: 1px solid var(--line); background: linear-gradient(135deg, #fff, var(--soft)); }
        .panel-head h3 { display: flex; align-items: center; gap: 10px; font-size: 16px; font-weight: 800; color: var(--head); }
        .panel-head h3 svg { color: var(--r); width: 19px; height: 19px; }

        .tabs { display: inline-flex; gap: 4px; background: var(--soft2); padding: 4px; border-radius: 13px; }
        .tab { border: none; background: transparent; padding: 8px 15px; border-radius: 10px; font-family: inherit; font-size: 12.5px; font-weight: 700; color: var(--rd); cursor: pointer; transition: all .15s; }
        .tab:hover { background: rgba(255, 255, 255, .6); }
        .tab.active { background: var(--r); color: #fff; box-shadow: 0 8px 14px -8px rgba(215, 25, 32, .9); }

        .review-list { display: grid; }
        .review { display: flex; gap: 14px; padding: 18px 22px; border-top: 1px solid var(--line); border-inline-start: 5px solid transparent; }
        .review:first-child { border-top: none; }
        .review-ok { border-inline-start-color: var(--r); }
        .review-ko { border-inline-start-color: var(--head); }
        .review-none { border-inline-start-color: var(--grey); }
        .review-num { width: 34px; height: 34px; border-radius: 11px; flex-shrink: 0; display: grid; place-items: center; font-size: 13px; font-weight: 800; color: #fff; }
        .num-ok { background: var(--r); }
        .num-ko { background: var(--head); }
        .num-none { background: var(--grey); }
        .review-main { flex: 1; min-width: 0; }
        .review-q { font-size: 14.5px; font-weight: 800; color: var(--head); line-height: 1.5; overflow-wrap: anywhere; }
        .review-answers { margin-top: 11px; display: grid; gap: 8px; }
        .answer-line { display: flex; align-items: flex-start; gap: 10px; padding: 10px 14px; border-radius: 12px; font-size: 13px; overflow-wrap: anywhere; line-height: 1.5; }
        .answer-line svg { width: 16px; height: 16px; margin-top: 2px; }
        .answer-line b { font-weight: 800; }
        .al-ok { background: var(--soft); color: var(--rd); }
        .al-ok svg { color: var(--r); }
        .al-ko { background: #f4eeee; color: var(--head); }
        .al-ko svg { color: var(--head); }
        .al-none { background: #f8f3f3; color: var(--muted); border: 1px dashed var(--grey); }
        .al-none svg { color: var(--muted); }
        .al-correct { background: #fff; color: var(--rd); border: 1.5px solid var(--r); }
        .al-correct svg { color: var(--r); }

        .actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-top: 26px; }

        .footer { padding: 6px 0 26px; text-align: center; font-size: 12px; color: var(--muted); }
        .footer b { color: var(--r); letter-spacing: .1em; }

        /* ---------- Ballons ---------- */
        #balloons { position: fixed; inset: 0; overflow: hidden; pointer-events: none; z-index: 40; direction: ltr; }
        .balloon { position: absolute; bottom: -100px; pointer-events: auto; cursor: pointer; animation: rise var(--dur) ease-in var(--delay) forwards; -webkit-tap-highlight-color: transparent; }
        .balloon-body {
            position: relative; width: var(--size); height: calc(var(--size) * 1.22);
            border-radius: 50% 50% 50% 50% / 45% 45% 55% 55%;
            background: radial-gradient(circle at 32% 28%, rgba(255, 255, 255, .75) 0 10%, transparent 28%), var(--color);
            box-shadow: inset -4px -5px 10px rgba(0, 0, 0, .12);
            animation: sway var(--sway) ease-in-out infinite alternate; transform-origin: 50% 120%;
        }
        .balloon-body::before { content: ""; position: absolute; left: 50%; bottom: -5px; width: 8px; height: 7px; background: var(--color); transform: translateX(-50%); clip-path: polygon(50% 0, 0 100%, 100% 100%); }
        .balloon-body::after { content: ""; position: absolute; left: 50%; top: 100%; width: 1px; height: 30px; background: rgba(120, 20, 25, .35); transform: translateX(-50%); }
        @keyframes rise { from { transform: translateY(0); } to { transform: translateY(calc(-100vh - 160px)); } }
        @keyframes sway { from { transform: rotate(-5deg) translateX(-5px); } to { transform: rotate(5deg) translateX(5px); } }
        .pop-bit { position: fixed; border-radius: 9999px; pointer-events: none; z-index: 60; }
        #confetti { position: fixed; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 50; }

        @media (max-width: 820px) {
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 640px) {
            .wrap { padding: 0 12px; }
            .btn-back span { display: none; }
            .brand span { font-size: 15px; }
            .hero { grid-template-columns: 1fr; justify-items: center; text-align: center; gap: 18px; padding-bottom: 84px; }
            .ring-wrap { width: 160px; height: 160px; }
            .verdict { justify-content: center; text-align: start; }
            .review { padding: 14px; }
            .actions .btn { flex: 1 1 100%; }
        }
        @media (prefers-reduced-motion: reduce) {
            #balloons, #confetti { display: none; }
            .ring-fill { transition: none; }
        }
    </style>
</head>

<body>

    @php
        $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
        $answers = $answers ?? [];

        $correctCount = 0;
        $wrongCount = 0;
        $blankCount = 0;

        foreach ($quiz->questions as $q) {
            $c = $q->options->firstWhere('is_correct', true);
            $sid = $answers[$q->id] ?? null;

            if (!$sid) {
                $blankCount++;
            } elseif ($c && (int) $sid === (int) $c->id) {
                $correctCount++;
            } else {
                $wrongCount++;
            }
        }

        if ($percentage >= 80) {
            $verdictKey = 'great'; $verdictIcon = 'party-popper';
        } elseif ($percentage >= 50) {
            $verdictKey = 'good'; $verdictIcon = 'thumbs-up';
        } else {
            $verdictKey = 'low'; $verdictIcon = 'book-open';
        }

        $isPassed = $percentage >= 80;
    @endphp

    <div id="balloons" aria-hidden="true"></div>
    <canvas id="confetti" aria-hidden="true"></canvas>

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

    <!-- ================= BANDEAU SCORE ================= -->
    <header class="topband">
        <div class="wrap">

            <div class="hero">

                <div class="ring-wrap">
                    <svg viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="54" fill="none" stroke="rgba(255,255,255,.22)" stroke-width="10"></circle>
                        <circle id="ring" class="ring-fill" cx="60" cy="60" r="54"
                                fill="none" stroke="#ffffff" stroke-width="10" stroke-linecap="round"
                                stroke-dasharray="339.292" stroke-dashoffset="339.292"></circle>
                    </svg>

                    <div class="ring-center">
                        <div class="ring-pct"><span id="pct-num">0</span><small>%</small></div>
                        <div class="ring-frac"><span id="score-num">0</span> / {{ $total }}</div>
                    </div>
                </div>

                <div>
                    <span class="hero-eyebrow">
                        <i data-lucide="trophy" style="width:14px;height:14px;"></i>
                        <span data-i18n="result_of">Résultat du quiz</span>
                    </span>

                    <h1>{{ $quiz->title }}</h1>

                    <div class="verdict">
                        <span class="verdict-icon"><i data-lucide="{{ $verdictIcon }}"></i></span>
                        <div>
                            <h2 data-i18n="{{ $verdictKey }}_title">Excellent travail !</h2>
                            <p data-i18n="{{ $verdictKey }}_text">Vous avez très bien réussi ce quiz.</p>
                        </div>
                    </div>

                    <span class="pass-pill {{ $isPassed ? 'is-pass' : 'is-fail' }}">
                        <i data-lucide="{{ $isPassed ? 'badge-check' : 'target' }}"></i>
                        <span data-i18n="{{ $isPassed ? 'passed' : 'not_passed' }}">{{ $isPassed ? 'Quiz réussi' : 'Il faut 80 % pour réussir' }}</span>
                    </span>
                </div>

            </div>

        </div>
    </header>


    <main class="wrap body">

        <noscript>
            <p style="text-align:center;font-weight:800;direction:ltr;margin-bottom:12px;">
                {{ $score }} / {{ $total }} ({{ $percentage }}%)
            </p>
        </noscript>

        <!-- ================= STATISTIQUES ================= -->
        <div class="stats">

            <div class="stat">
                <div class="stat-icon ic-total"><i data-lucide="list-checks"></i></div>
                <div>
                    <strong>{{ $total }}</strong>
                    <span data-i18n="questions">Questions</span>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon ic-ok"><i data-lucide="circle-check"></i></div>
                <div>
                    <strong>{{ $score }}</strong>
                    <span data-i18n="correct_answers">Réponses correctes</span>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon ic-ko"><i data-lucide="circle-x"></i></div>
                <div>
                    <strong>{{ $wrongCount }}</strong>
                    <span data-i18n="wrong_answers">Réponses fausses</span>
                </div>
            </div>

            <div class="stat">
                <div class="stat-icon ic-none"><i data-lucide="circle-minus"></i></div>
                <div>
                    <strong>{{ $blankCount }}</strong>
                    <span data-i18n="unanswered">Sans réponse</span>
                </div>
            </div>

        </div>


        <!-- ================= RÉVISION ================= -->
        @if($quiz->questions->count() > 0)

            <section class="panel">

                <div class="panel-head">
                    <h3>
                        <i data-lucide="clipboard-check"></i>
                        <span data-i18n="review">Révision des réponses</span>
                    </h3>

                    <div class="tabs" role="tablist">
                        <button type="button" class="tab active" data-filter="all" data-i18n="f_all">Toutes</button>
                        <button type="button" class="tab" data-filter="ok" data-i18n="f_ok">Correctes</button>
                        <button type="button" class="tab" data-filter="ko" data-i18n="f_ko">À revoir</button>
                    </div>
                </div>

                <div class="review-list">

                    @foreach($quiz->questions as $index => $question)

                        @php
                            $correct    = $question->options->firstWhere('is_correct', true);
                            $selectedId = $answers[$question->id] ?? null;
                            $selected   = $selectedId
                                ? $question->options->firstWhere('id', (int) $selectedId)
                                : null;
                            $isRight    = $selected && $correct && $selected->id == $correct->id;
                            $state      = $isRight ? 'ok' : ($selected ? 'ko' : 'none');
                        @endphp

                        <div class="review review-{{ $state }}" data-state="{{ $state }}">

                            <div class="review-num num-{{ $state }}">{{ $index + 1 }}</div>

                            <div class="review-main">

                                <p class="review-q">{{ $question->question }}</p>

                                <div class="review-answers">

                                    @if($isRight)

                                        <div class="answer-line al-ok">
                                            <i data-lucide="circle-check"></i>
                                            <span><b data-i18n="your_correct">Votre réponse est correcte :</b> {{ $selected->option }}</span>
                                        </div>

                                    @else

                                        @if($selected)
                                            <div class="answer-line al-ko">
                                                <i data-lucide="circle-x"></i>
                                                <span><b data-i18n="your_answer">Votre réponse :</b> {{ $selected->option }}</span>
                                            </div>
                                        @else
                                            <div class="answer-line al-none">
                                                <i data-lucide="circle-minus"></i>
                                                <span><b data-i18n="not_answered">Vous n'avez pas répondu à cette question</b></span>
                                            </div>
                                        @endif

                                        @if($correct)
                                            <div class="answer-line al-correct">
                                                <i data-lucide="circle-check"></i>
                                                <span><b data-i18n="correct_answer">Bonne réponse :</b> {{ $correct->option }}</span>
                                            </div>
                                        @endif

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif


        <!-- ================= ACTIONS ================= -->
        <div class="actions">

            @if($percentage >= 50)
                <button type="button" id="celebrate-btn" class="btn btn-light">
                    <i data-lucide="party-popper"></i>
                    <span data-i18n="celebrate">Célébrer</span>
                </button>
            @endif

            <a href="{{ route('quiz.show', $quiz) }}" class="btn btn-light">
                <i data-lucide="rotate-ccw"></i>
                <span data-i18n="retry">Refaire le quiz</span>
            </a>

            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i data-lucide="house"></i>
                <span data-i18n="home">Retour aux formations</span>
            </a>

        </div>

    </main>

    <div class="footer">
        <span dir="ltr">© {{ date('Y') }} <b>CAD ACADEMY</b></span> ·
        <span data-i18n="rights">Tous droits réservés</span>
    </div>


    <script>
        const translations = {
            fr: {
                back: "Retour",
                result_of: "Résultat du quiz",
                great_title: "Excellent travail !",
                great_text: "Vous avez très bien réussi ce quiz.",
                good_title: "Bon travail !",
                good_text: "Continuez à apprendre pour améliorer votre résultat.",
                low_title: "Continuez vos efforts !",
                low_text: "Révisez le cours et réessayez.",
                passed: "Quiz réussi",
                not_passed: "Il faut 80 % pour réussir",
                questions: "Questions",
                correct_answers: "Réponses correctes",
                wrong_answers: "Réponses fausses",
                unanswered: "Sans réponse",
                review: "Révision des réponses",
                f_all: "Toutes",
                f_ok: "Correctes",
                f_ko: "À revoir",
                your_correct: "Votre réponse est correcte :",
                your_answer: "Votre réponse :",
                not_answered: "Vous n'avez pas répondu à cette question",
                correct_answer: "Bonne réponse :",
                celebrate: "Célébrer",
                retry: "Refaire le quiz",
                home: "Retour aux formations",
                rights: "Tous droits réservés"
            },
            ar: {
                back: "رجوع",
                result_of: "نتيجة الاختبار",
                great_title: "عمل ممتاز!",
                great_text: "لقد نجحت بشكل ممتاز في هذا الاختبار.",
                good_title: "عمل جيد!",
                good_text: "استمر في التعلم لتحسين نتيجتك.",
                low_title: "واصل مجهودك!",
                low_text: "راجع الدرس وحاول مرة أخرى.",
                passed: "اختبار ناجح",
                not_passed: "يجب الحصول على 80% للنجاح",
                questions: "الأسئلة",
                correct_answers: "إجابات صحيحة",
                wrong_answers: "إجابات خاطئة",
                unanswered: "بدون إجابة",
                review: "مراجعة الإجابات",
                f_all: "الكل",
                f_ok: "الصحيحة",
                f_ko: "للمراجعة",
                your_correct: "إجابتك صحيحة :",
                your_answer: "إجابتك :",
                not_answered: "لم تجب عن هذا السؤال",
                correct_answer: "الإجابة الصحيحة :",
                celebrate: "احتفل",
                retry: "إعادة الاختبار",
                home: "العودة للتكوينات",
                rights: "جميع الحقوق محفوظة"
            }
        };

        function applyLanguage(language, persist) {
            const dictionary = translations[language];

            document.documentElement.lang = language;
            document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';
            document.title = (language === 'ar' ? 'نتيجة الاختبار' : 'Résultat du quiz') + ' | CAD ACADEMY';

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

        // Filtres de la révision
        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                const filter = this.dataset.filter;

                document.querySelectorAll('.tab').forEach(function (t) {
                    t.classList.toggle('active', t === tab);
                });

                document.querySelectorAll('.review').forEach(function (row) {
                    const state = row.dataset.state;
                    const show = filter === 'all'
                        || (filter === 'ok' && state === 'ok')
                        || (filter === 'ko' && state !== 'ok');

                    row.style.display = show ? '' : 'none';
                });
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

    <script>
        (function () {
            var score = {{ (int) $score }};
            var total = {{ (int) $total }};
            var pct = {{ (int) $percentage }};
            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            /* ---------- Anneau + compteur ---------- */
            var ring = document.getElementById('ring');
            var scoreNum = document.getElementById('score-num');
            var pctNum = document.getElementById('pct-num');
            var C = 339.292;

            function animateScore() {
                if (reduce) {
                    scoreNum.textContent = score;
                    pctNum.textContent = pct;
                    ring.style.strokeDashoffset = C * (1 - pct / 100);
                    return;
                }

                requestAnimationFrame(function () {
                    ring.style.strokeDashoffset = C * (1 - pct / 100);
                });

                var start = null, dur = 1400;

                function step(t) {
                    if (!start) start = t;
                    var p = Math.min((t - start) / dur, 1);
                    var e = 1 - Math.pow(1 - p, 3);
                    scoreNum.textContent = Math.round(score * e);
                    pctNum.textContent = Math.round(pct * e);
                    if (p < 1) requestAnimationFrame(step);
                }

                requestAnimationFrame(step);
            }

            /* ---------- Éclats quand un ballon éclate ---------- */
            function burst(x, y, color) {
                for (var i = 0; i < 12; i++) {
                    var bit = document.createElement('div');
                    var s = 4 + Math.random() * 5;

                    bit.className = 'pop-bit';
                    bit.style.width = s + 'px';
                    bit.style.height = s + 'px';
                    bit.style.left = x + 'px';
                    bit.style.top = y + 'px';
                    bit.style.background = color;
                    document.body.appendChild(bit);

                    var a = Math.random() * Math.PI * 2;
                    var d = 30 + Math.random() * 50;

                    bit.animate([
                        { transform: 'translate(0,0) scale(1)', opacity: 1 },
                        { transform: 'translate(' + Math.cos(a) * d + 'px,' + (Math.sin(a) * d + 24) + 'px) scale(.2)', opacity: 0 }
                    ], { duration: 500 + Math.random() * 300, easing: 'cubic-bezier(.2,.8,.3,1)' })
                    .onfinish = (function (el) { return function () { el.remove(); }; })(bit);
                }
            }

            function pop(balloon) {
                if (!balloon.isConnected) return;

                var body = balloon.querySelector('.balloon-body');
                var r = body.getBoundingClientRect();

                burst(r.left + r.width / 2, r.top + r.height / 2, balloon.dataset.color);
                balloon.remove();
            }

            /* ---------- Ballons (palette rouge / blanc) ---------- */
            var colors = ['#d71920', '#ff5a61', '#ffb3b6', '#a80f15', '#ffffff', '#f7c948'];

            function launchBalloons(n) {
                var wrap = document.getElementById('balloons');

                for (var i = 0; i < n; i++) {
                    var color = colors[Math.floor(Math.random() * colors.length)];
                    var b = document.createElement('div');

                    b.className = 'balloon';
                    b.dataset.color = color;
                    b.style.left = (4 + Math.random() * 90) + '%';
                    b.style.setProperty('--dur', (5 + Math.random() * 4) + 's');
                    b.style.setProperty('--delay', (Math.random() * 1.6) + 's');
                    b.style.setProperty('--sway', (1.4 + Math.random() * 1.2) + 's');
                    b.style.setProperty('--size', (26 + Math.random() * 14) + 'px');
                    b.style.setProperty('--color', color);
                    b.innerHTML = '<div class="balloon-body"></div>';

                    b.addEventListener('click', function () { pop(this); });
                    b.addEventListener('animationend', function (e) {
                        if (e.animationName === 'rise') pop(this);
                    });

                    wrap.appendChild(b);
                }
            }

            /* ---------- Confettis ---------- */
            var canvas = document.getElementById('confetti');
            var ctx = canvas.getContext('2d');
            var pieces = [];
            var running = false;

            function resize() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }

            window.addEventListener('resize', resize);
            resize();

            function confetti(count) {
                var cols = ['#d71920', '#ff5a61', '#ffb3b6', '#a80f15', '#f7c948', '#ffffff'];

                for (var i = 0; i < count; i++) {
                    var fromLeft = i % 2 === 0;

                    pieces.push({
                        x: fromLeft ? 0 : canvas.width,
                        y: canvas.height * 0.65,
                        vx: (fromLeft ? 1 : -1) * (4 + Math.random() * 9),
                        vy: -(8 + Math.random() * 12),
                        w: 5 + Math.random() * 5,
                        h: 3 + Math.random() * 4,
                        rot: Math.random() * 6,
                        vr: (Math.random() - .5) * .35,
                        color: cols[Math.floor(Math.random() * cols.length)],
                        life: 0
                    });
                }

                if (!running) {
                    running = true;
                    requestAnimationFrame(tick);
                }
            }

            function tick() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                pieces = pieces.filter(function (p) {
                    return p.y < canvas.height + 20 && p.life < 260;
                });

                pieces.forEach(function (p) {
                    p.life++;
                    p.vy += 0.28;
                    p.vx *= 0.992;
                    p.x += p.vx;
                    p.y += p.vy;
                    p.rot += p.vr;

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.rot);
                    ctx.fillStyle = p.color;
                    ctx.globalAlpha = Math.max(0, 1 - p.life / 260);
                    ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
                    ctx.restore();
                });

                if (pieces.length) {
                    requestAnimationFrame(tick);
                } else {
                    running = false;
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
            }

            /* ---------- Célébration ---------- */
            function celebrate() {
                if (reduce || pct < 50) return;

                launchBalloons(pct >= 80 ? 18 : 12);

                if (pct >= 80) {
                    confetti(110);
                    setTimeout(function () { confetti(80); }, 700);
                }
            }

            animateScore();
            setTimeout(celebrate, 900);

            var btn = document.getElementById('celebrate-btn');
            if (btn) btn.addEventListener('click', celebrate);
        })();
    </script>

</body>
</html>