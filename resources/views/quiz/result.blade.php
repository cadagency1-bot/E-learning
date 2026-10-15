<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>نتيجة الاختبار | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mint: {
                            50: '#f3fbf5',
                            100: '#e6f6ea',
                            200: '#cfeed8',
                            300: '#a8e0b8',
                            400: '#6fcb8d',
                            500: '#3fb868',
                            600: '#2a9a52',
                            700: '#217a43',
                            800: '#1c5f38',
                            900: '#16432b',
                        },
                    },
                    fontFamily: {
                        tajawal: ['Tajawal', 'Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            font-family: 'Tajawal', 'Plus Jakarta Sans', sans-serif;
            background-color: #eaf7ee;
            background-image:
                radial-gradient(900px 400px at 10% -5%, #d6f1de 0%, transparent 60%),
                radial-gradient(700px 400px at 100% 0%, #dff5e5 0%, transparent 55%);
            background-attachment: fixed;
            color: #16432b;
        }

        /* ---------- Anneau de score ---------- */
        .ring-fill {
            transition: stroke-dashoffset 1.4s cubic-bezier(.2, .8, .2, 1);
        }

        /* ---------- Ballons (plus petits) ---------- */
        #balloons {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 40;
            direction: ltr;
        }

        .balloon {
            position: absolute;
            bottom: -100px;
            pointer-events: auto;
            cursor: pointer;
            animation: rise var(--dur) ease-in var(--delay) forwards;
            -webkit-tap-highlight-color: transparent;
        }

        .balloon-body {
            position: relative;
            width: var(--size);
            height: calc(var(--size) * 1.22);
            border-radius: 50% 50% 50% 50% / 45% 45% 55% 55%;
            background:
                radial-gradient(circle at 32% 28%, rgba(255, 255, 255, .75) 0 10%, transparent 28%),
                var(--color);
            box-shadow: inset -4px -5px 10px rgba(0, 0, 0, .12);
            animation: sway var(--sway) ease-in-out infinite alternate;
            transform-origin: 50% 120%;
        }

        .balloon-body::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -5px;
            width: 8px;
            height: 7px;
            background: var(--color);
            transform: translateX(-50%);
            clip-path: polygon(50% 0, 0 100%, 100% 100%);
        }

        .balloon-body::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            width: 1px;
            height: 30px;
            background: rgba(22, 67, 43, .35);
            transform: translateX(-50%);
        }

        @keyframes rise {
            from { transform: translateY(0); }
            to   { transform: translateY(calc(-100vh - 160px)); }
        }

        @keyframes sway {
            from { transform: rotate(-5deg) translateX(-5px); }
            to   { transform: rotate(5deg) translateX(5px); }
        }

        .pop-bit {
            position: fixed;
            border-radius: 9999px;
            pointer-events: none;
            z-index: 60;
        }

        #confetti {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 50;
        }

        @media (prefers-reduced-motion: reduce) {
            #balloons, #confetti { display: none; }
            .ring-fill { transition: none; }
        }
    </style>
</head>

<body class="min-h-screen">

    @php
        $percentage = $total > 0
            ? round(($score / $total) * 100)
            : 0;
    @endphp

    <div id="balloons" aria-hidden="true"></div>
    <canvas id="confetti" aria-hidden="true"></canvas>

    <!-- NAVBAR -->
    <nav class="bg-white/80 backdrop-blur border-b border-mint-200">

        <div class="max-w-5xl mx-auto px-4 sm:px-6">

            <div class="h-14 flex items-center justify-between">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2">

                    <div class="w-8 h-8 rounded-xl bg-mint-500
                                flex items-center justify-center text-white shadow-sm">

                        <i class="fa-solid fa-graduation-cap text-sm"></i>

                    </div>

                    <div>

                        <div class="font-extrabold text-mint-900 text-sm" dir="ltr">
                            Étude<span class="text-mint-500">EnLigne</span>
                        </div>

                        <div class="text-[10px] text-mint-700/60">
                            منصة التعلم
                        </div>

                    </div>

                </a>

                <!-- RETOUR -->
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center gap-2 px-3.5 py-1.5
                          rounded-full border border-mint-200
                          bg-white text-mint-800
                          hover:bg-mint-100
                          hover:border-mint-300
                          transition text-sm font-medium">

                    <span>رجوع</span>

                    <i class="fa-solid fa-arrow-right text-xs"></i>

                </a>

            </div>

        </div>

    </nav>


    <!-- MAIN -->
    <main class="max-w-2xl mx-auto px-4 sm:px-6 py-8">

        <!-- RESULT CARD -->
        <div class="bg-white rounded-3xl border border-mint-200
                    shadow-sm overflow-hidden">

            <!-- TOP -->
            <div class="bg-gradient-to-br from-mint-700 to-mint-500
                        px-6 py-7 text-center text-white">

                <div class="w-12 h-12 mx-auto rounded-full
                            bg-white/20 flex items-center
                            justify-center mb-3">

                    <i class="fa-solid fa-trophy text-xl"></i>

                </div>

                <p class="text-sm font-semibold text-mint-100">
                    نتيجة الاختبار
                </p>

                <h1 class="text-xl sm:text-2xl font-extrabold mt-1.5">

                    {{ $quiz->title }}

                </h1>

            </div>


            <!-- SCORE -->
            <div class="p-5 sm:p-8">

                <div class="text-center">

                    <p class="text-sm text-mint-800/70 mb-3">
                        نتيجتك
                    </p>

                    <!-- Anneau -->
                    <div class="relative w-36 h-36 sm:w-40 sm:h-40 mx-auto">

                        <svg viewBox="0 0 120 120" class="w-full h-full -rotate-90">
                            <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="#e6f6ea" stroke-width="10"></circle>
                            <circle id="ring" class="ring-fill" cx="60" cy="60" r="54"
                                    fill="none" stroke="#3fb868" stroke-width="10"
                                    stroke-linecap="round"
                                    stroke-dasharray="339.292"
                                    stroke-dashoffset="339.292"></circle>
                        </svg>

                        <div class="absolute inset-0 flex flex-col
                                    items-center justify-center">

                            <div class="text-3xl sm:text-4xl font-extrabold text-mint-600" dir="ltr">
                                <span id="score-num">0</span><span class="text-mint-300 text-xl sm:text-2xl"> / {{ $total }}</span>
                            </div>

                            <p class="text-base font-bold text-mint-800 mt-0.5" dir="ltr">
                                <span id="pct-num">0</span>%
                            </p>

                        </div>

                    </div>

                    <noscript>
                        <p class="text-2xl font-extrabold text-mint-600 mt-4" dir="ltr">
                            {{ $score }} / {{ $total }} ({{ $percentage }}%)
                        </p>
                    </noscript>

                </div>


                <!-- MESSAGE -->
                <div class="mt-6">

                    @if($percentage >= 80)

                        <div class="rounded-2xl bg-mint-50
                                    border border-mint-200
                                    p-4 text-center">

                            <div class="text-mint-500 text-xl mb-1.5">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>

                            <h2 class="font-bold text-mint-800">
                                عمل ممتاز!
                            </h2>

                            <p class="text-sm text-mint-700 mt-1.5">
                                لقد نجحت بشكل ممتاز في هذا الاختبار.
                            </p>

                        </div>

                    @elseif($percentage >= 50)

                        <div class="rounded-2xl bg-teal-50
                                    border border-teal-100
                                    p-4 text-center">

                            <div class="text-teal-500 text-xl mb-1.5">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>

                            <h2 class="font-bold text-teal-800">
                                عمل جيد!
                            </h2>

                            <p class="text-sm text-teal-700 mt-1.5">
                                استمر في التعلم لتحسين نتيجتك.
                            </p>

                        </div>

                    @else

                        <div class="rounded-2xl bg-amber-50
                                    border border-amber-100
                                    p-4 text-center">

                            <div class="text-amber-500 text-xl mb-1.5">
                                <i class="fa-solid fa-book-open"></i>
                            </div>

                            <h2 class="font-bold text-amber-800">
                                واصل مجهودك!
                            </h2>

                            <p class="text-sm text-amber-700 mt-1.5">
                                راجع الدرس وحاول مرة أخرى.
                            </p>

                        </div>

                    @endif

                </div>


                <!-- STATISTICS -->
                <div class="grid grid-cols-2 gap-3 mt-6">

                    <div class="rounded-2xl bg-mint-50
                                border border-mint-200 p-4 text-center">

                        <div class="text-xl font-extrabold text-mint-800">
                            {{ $score }}
                        </div>

                        <p class="text-xs text-mint-700/70 mt-1">
                            إجابات صحيحة
                        </p>

                    </div>


                    <div class="rounded-2xl bg-mint-50
                                border border-mint-200 p-4 text-center">

                        <div class="text-xl font-extrabold text-mint-800">
                            {{ $total }}
                        </div>

                        <p class="text-xs text-mint-700/70 mt-1">
                            الأسئلة
                        </p>

                    </div>

                </div>


                <!-- REVIEW DES RÉPONSES -->
                @php $answers = $answers ?? []; @endphp

                @if($quiz->questions->count() > 0)
                    <div class="mt-8">

                        <h3 class="font-extrabold text-mint-900 mb-3
                                   flex items-center gap-2">
                            <i class="fa-solid fa-clipboard-check text-mint-500"></i>
                            مراجعة الإجابات
                        </h3>

                        <div class="space-y-3">

                            @foreach($quiz->questions as $index => $question)

                                @php
                                    $correct    = $question->options->firstWhere('is_correct', true);
                                    $selectedId = $answers[$question->id] ?? null;
                                    $selected   = $selectedId
                                        ? $question->options->firstWhere('id', (int) $selectedId)
                                        : null;
                                    $isRight    = $selected && $correct && $selected->id == $correct->id;
                                @endphp

                                <div class="rounded-2xl border p-4
                                    {{ $isRight
                                        ? 'border-mint-200 bg-mint-50'
                                        : ($selected ? 'border-red-200 bg-red-50' : 'border-amber-200 bg-amber-50') }}">

                                    <!-- Question -->
                                    <div class="flex items-start gap-3">

                                        <div class="w-7 h-7 rounded-full shrink-0
                                                    flex items-center justify-center
                                                    text-xs font-bold text-white
                                            {{ $isRight ? 'bg-mint-500' : ($selected ? 'bg-red-500' : 'bg-amber-500') }}">
                                            {{ $index + 1 }}
                                        </div>

                                        <p class="font-bold text-sm text-mint-900 leading-6">
                                            {{ $question->question }}
                                        </p>

                                    </div>

                                    <div class="mt-3 space-y-2 text-sm">

                                        @if($isRight)

                                            <div class="flex items-center gap-2 text-mint-800
                                                        bg-white/70 rounded-xl px-3 py-2">
                                                <i class="fa-solid fa-circle-check text-mint-500"></i>
                                                <span class="font-semibold">إجابتك صحيحة:</span>
                                                <span>{{ $selected->option }}</span>
                                            </div>

                                        @else

                                            @if($selected)
                                                <div class="flex items-center gap-2 text-red-700
                                                            bg-white/70 rounded-xl px-3 py-2">
                                                    <i class="fa-solid fa-circle-xmark text-red-500"></i>
                                                    <span class="font-semibold">إجابتك:</span>
                                                    <span>{{ $selected->option }}</span>
                                                </div>
                                            @else
                                                <div class="flex items-center gap-2 text-amber-700
                                                            bg-white/70 rounded-xl px-3 py-2">
                                                    <i class="fa-solid fa-circle-minus text-amber-500"></i>
                                                    <span class="font-semibold">لم تجب عن هذا السؤال</span>
                                                </div>
                                            @endif

                                            @if($correct)
                                                <div class="flex items-center gap-2 text-mint-800
                                                            bg-white/70 rounded-xl px-3 py-2
                                                            border border-mint-200">
                                                    <i class="fa-solid fa-circle-check text-mint-500"></i>
                                                    <span class="font-semibold">الإجابة الصحيحة:</span>
                                                    <span>{{ $correct->option }}</span>
                                                </div>
                                            @endif

                                        @endif

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>
                @endif


                <!-- ACTIONS -->
                <div class="flex flex-col sm:flex-row
                            justify-center gap-2.5 mt-6">

                    @if($percentage >= 50)
                        <button type="button" id="celebrate-btn"
                                class="inline-flex items-center justify-center
                                       gap-2 px-4 py-2.5 rounded-full
                                       border border-mint-200
                                       bg-white text-mint-800
                                       hover:bg-mint-100
                                       transition font-semibold text-sm">

                            <i class="fa-solid fa-champagne-glasses"></i>

                            احتفل

                        </button>
                    @endif

                    <a href="{{ route('quiz.show', $quiz) }}"
                       class="inline-flex items-center justify-center
                              gap-2 px-4 py-2.5 rounded-full
                              border border-mint-200
                              bg-white text-mint-800
                              hover:bg-mint-100
                              transition font-semibold text-sm">

                        <i class="fa-solid fa-rotate-right"></i>

                        إعادة الاختبار

                    </a>


                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center justify-center
                              gap-2 px-4 py-2.5 rounded-full
                              bg-mint-500 text-white
                              hover:bg-mint-600 shadow-sm
                              transition font-semibold text-sm">

                        <i class="fa-solid fa-house"></i>

                        العودة للتكوينات

                    </a>

                </div>

            </div>

        </div>

    </main>


    <!-- FOOTER -->
    <footer class="border-t border-mint-200 bg-white/70 mt-6">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-5">

            <div class="text-center text-xs text-mint-700/70">

                <span dir="ltr">© {{ date('Y') }} ÉtudeEnLigne</span>

                <span class="mx-1">•</span>

                جميع الحقوق محفوظة

            </div>

        </div>

    </footer>


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

            /* ---------- Ballons ---------- */
            var colors = ['#3fb868', '#6fcb8d', '#a8e0b8', '#f7c948', '#ff8fab', '#ffffff', '#59c9d6'];
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
                var cols = ['#3fb868', '#a8e0b8', '#f7c948', '#ff8fab', '#59c9d6', '#ffffff'];
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
                if (!running) { running = true; requestAnimationFrame(tick); }
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