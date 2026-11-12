<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CAD Academy</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --accent: #dc2626;
            --accent-soft: #fef2f2;
            --accent-border: #fecaca;
            --red-700: #b91c1c;
            --red-800: #991b1b;
            --red-900: #7f1d1d;

            --bg: #ffffff;
            --surface: #ffffff;
            --line: #ececec;
            --line-strong: #d4d4d8;
            --text: #1c1917;
            --text-soft: #52525b;
            --text-muted: #71717a;
            --danger: #b42318;
            --danger-bg: #fef3f2;
            --danger-border: #fecdca;

            --font: 'Plus Jakarta Sans', 'Noto Sans Arabic', system-ui, -apple-system, 'Segoe UI', sans-serif;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { -webkit-text-size-adjust: 100%; }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .ar { font-family: 'Noto Sans Arabic', var(--font); line-height: 1.7; }
        .fr { display: inline; }
        body.lang-fr .ar { display: none !important; }
        body.lang-ar .fr { display: none !important; }
        body.lang-ar .ar { display: inline !important; }
        body.lang-ar .aside-title-ar,
        body.lang-ar .features .ar,
        body.lang-ar .subtitle-ar,
        body.lang-ar .confirmation-title .ar,
        body.lang-ar .confirmation-text .ar,
        body.lang-ar .register-ar { display: block !important; }
        body.lang-ar { font-family: 'Noto Sans Arabic', var(--font); }
        body.lang-ar .main, body.lang-ar .aside { direction: rtl; }
        body.lang-ar .title { letter-spacing: 0; }

        .language-toggle {
            display: inline-flex; align-items: center; justify-content: center;
            min-height: 40px; padding: 8px 14px; border: 1px solid var(--accent-border);
            border-radius: 10px; background: var(--surface); color: var(--red-800);
            font: 700 13px/1.2 var(--font); cursor: pointer;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease;
            white-space: nowrap;
        }
        .language-toggle:hover { background: var(--accent-soft); border-color: var(--accent); }
        body.lang-ar .language-toggle { font-family: 'Noto Sans Arabic', var(--font); }

        :focus-visible { outline: 3px solid rgba(220, 38, 38, 0.4); outline-offset: 2px; }

        /* =========================
           LAYOUT
        ========================= */
        .layout {
            display: grid;
            grid-template-columns: minmax(360px, 5fr) 7fr;
            min-height: 100vh;
            min-height: 100dvh;
        }

        .aside {
            position: sticky;
            top: 0;
            height: 100vh;
            height: 100dvh;
            background: var(--red-800);
            color: #fff;
            padding: 40px 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .aside::before,
        .aside::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.16);
            pointer-events: none;
        }

        .aside::before { width: 560px; height: 560px; right: -240px; bottom: -220px; }
        .aside::after  { width: 360px; height: 360px; right: -140px; bottom: -120px; border-color: rgba(255, 255, 255, 0.26); }

        .aside > * { position: relative; z-index: 1; }

        /* ---------- Logo ---------- */
        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -0.3px;
            color: inherit;
            border-radius: 10px;
        }

        .logo-img {
            width: 46px;
            height: 46px;
            padding: 5px;
            border-radius: 12px;
            background: #fff;
            object-fit: contain;
            flex-shrink: 0;
            box-shadow: 0 6px 16px -8px rgba(0, 0, 0, 0.5);
        }

        .aside-title {
            font-size: clamp(28px, 2.6vw, 38px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
            max-width: 420px;
        }

        .aside-title-ar { display: block; margin-top: 10px; font-size: 16px; font-weight: 500; color: #fecaca; letter-spacing: 0; }

        .features { list-style: none; margin-top: 36px; display: grid; gap: 14px; }
        .features li { display: flex; align-items: center; gap: 14px; font-size: 14.5px; font-weight: 600; }
        .features .ar { display: block; font-size: 12.5px; font-weight: 400; color: #fecaca; }

        .feature-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.35);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-icon svg { width: 18px; height: 18px; }

        .aside-foot { font-size: 12.5px; color: rgba(255, 255, 255, 0.7); }

        /* =========================
           DÉCOR
        ========================= */
        .aside > .decor { position: absolute; inset: 0; z-index: 0; pointer-events: none; }

        .decor::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 10%, rgba(255, 255, 255, 0.16), transparent 45%),
                radial-gradient(circle at 10% 100%, rgba(0, 0, 0, 0.22), transparent 50%);
        }

        .decor::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.20) 1px, transparent 1.6px);
            background-size: 22px 22px;
            -webkit-mask-image: linear-gradient(to bottom left, #000 0%, transparent 70%);
            mask-image: linear-gradient(to bottom left, #000 0%, transparent 70%);
        }

        .tile {
            position: absolute;
            z-index: 1;
            width: 54px;
            height: 54px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.32);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 24px -10px rgba(0, 0, 0, 0.45);
            animation: float 7s ease-in-out infinite;
        }

        .tile svg { width: 24px; height: 24px; }

        .t1 { top: 9%;     right: 10%; --r: -6deg; animation-duration: 7s; }
        .t2 { top: 31%;    right: 6%;  --r: 5deg;  animation-duration: 8.5s; animation-delay: -2s; width: 62px; height: 62px; }
        .t3 { top: 52%;    right: 21%; --r: -4deg; animation-duration: 6.5s; animation-delay: -4s; }
        .t4 { bottom: 20%; right: 8%;  --r: 7deg;  animation-duration: 9s;   animation-delay: -1s; }
        .t5 { bottom: 7%;  right: 33%; --r: -5deg; animation-duration: 7.5s; animation-delay: -3s; }
        .t6 { top: 7%;     right: 38%; --r: 4deg;  animation-duration: 8s;   animation-delay: -5s; }
        .t7 { top: 19%;    right: 27%; --r: -3deg; animation-duration: 6s;   animation-delay: -2.5s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(var(--r, 0deg)); }
            50%      { transform: translateY(-12px) rotate(calc(var(--r, 0deg) * -1)); }
        }

        @media (max-width: 1280px) { .t5, .t6, .t7 { display: none; } }
        @media (prefers-reduced-motion: reduce) { .tile { animation: none; transform: rotate(var(--r, 0deg)); } }

        /* ---------- Zone formulaire ---------- */
        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-height: 100dvh;
            padding: 0 max(24px, 5%);
            background-image:
                radial-gradient(circle at 100% 0%, rgba(220, 38, 38, 0.07), transparent 40%),
                radial-gradient(circle at 0% 100%, rgba(220, 38, 38, 0.05), transparent 40%);
            background-repeat: no-repeat;
        }

        .topbar { height: 72px; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        .topbar .logo { display: none; color: var(--red-900); }

        .home-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--text-soft);
            font-size: 14px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 10px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .home-link .ar { font-size: 13px; font-weight: 500; color: var(--text-muted); }
        .home-link:hover { background: var(--accent-soft); color: var(--red-700); }

        .content {
            flex: 1;
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 16px 0 32px;
        }

        .title { font-size: 28px; font-weight: 800; letter-spacing: -0.8px; line-height: 1.2; margin-bottom: 8px; }
        .subtitle { font-size: 14.5px; color: var(--text-soft); line-height: 1.55; }
        .subtitle-ar { display: block; margin-top: 2px; font-size: 13.5px; color: var(--text-muted); }
        .head { margin-bottom: 28px; }

        /* =========================
           MESSAGES
        ========================= */
        .message {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13.5px;
            line-height: 1.5;
            border: 1px solid transparent;
        }

        .message-icon { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }
        .message-title { font-weight: 700; margin-bottom: 1px; }
        .message-body { word-break: break-word; }

        .message.success { background: var(--accent-soft); border-color: var(--accent-border); color: var(--red-900); }
        .message.error { background: var(--danger-bg); border-color: var(--danger-border); color: var(--danger); }

        /* =========================
           FORMULAIRE
        ========================= */
        .form-group { margin-bottom: 18px; }

        .label-row { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; margin-bottom: 6px; }
        .label { font-size: 13.5px; font-weight: 700; }

        .field { position: relative; }

        .field-icon {
            position: absolute;
            inset-inline-start: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #a1a1aa;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .field:focus-within .field-icon { color: var(--red-700); }

        .input {
            width: 100%;
            height: 50px;
            padding-inline: 44px 14px;
            border: 1px solid var(--line-strong);
            border-radius: 12px;
            background: var(--surface);
            color: var(--text);
            font-family: inherit;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .input::placeholder { color: #a1a1aa; }
        .input:hover { border-color: #a1a1aa; }
        .input:focus { border-color: var(--accent); box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.14); }
        .input.is-invalid { border-color: #f04438; background: #fffbfa; }

        /* Champ code : chiffres bien espacés */
        .input.code { letter-spacing: 0.25em; font-weight: 700; }
        .input.code::placeholder { letter-spacing: normal; font-weight: 400; }

        .input-error { margin-top: 6px; font-size: 12.5px; font-weight: 600; color: var(--danger); line-height: 1.45; }

        .helper { margin-top: 6px; font-size: 12px; color: var(--text-muted); line-height: 1.5; }

        .forgot-password {
            display: flex;
            justify-content: flex-end;
            margin: -8px 0 18px;
        }

        .forgot-password a {
            color: var(--red-700);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: color .2s ease, text-decoration-color .2s ease;
        }

        .forgot-password a:hover {
            color: var(--red-900);
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        body.lang-ar .forgot-password { justify-content: flex-start; }
        body.lang-ar .forgot-password a { font-family: 'Noto Sans Arabic', var(--font); }

        .remember { display: flex; align-items: center; gap: 10px; margin: 4px 0 22px; }
        .remember input { width: 18px; height: 18px; accent-color: var(--accent); cursor: pointer; flex-shrink: 0; }
        .remember label { font-size: 13.5px; font-weight: 500; color: var(--text-soft); cursor: pointer; }

        .submit-button {
            width: 100%;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            border-radius: 12px;
            background: var(--accent);
            color: #fff;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
        }

        .submit-button .ar {
            font-size: 13.5px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.85);
            padding-inline-start: 10px;
            border-inline-start: 1px solid rgba(255, 255, 255, 0.35);
        }

        .submit-button:hover { background: var(--red-700); box-shadow: 0 8px 18px -8px rgba(153, 27, 27, 0.7); transform: translateY(-1px); }
        .submit-button:active { transform: translateY(0); box-shadow: none; }

        /* =========================
           CONFIRMATION D'INSCRIPTION
        ========================= */
        .confirmation-box {
            margin-top: 24px;
            padding: 16px;
            background: var(--accent-soft);
            border: 1px solid var(--accent-border);
            border-radius: 12px;
            text-align: center;
        }

        .confirmation-title { font-size: 14px; font-weight: 700; color: var(--red-900); line-height: 1.4; }
        .confirmation-text { margin: 6px 0 14px; font-size: 12.5px; line-height: 1.55; color: var(--red-800); }

        .confirmation-title .ar,
        .confirmation-text .ar { display: block; margin-top: 2px; font-weight: 500; opacity: 0.85; }

       
        .confirmation-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    width: 100%;
    min-height: 58px;
    padding: 15px 24px;
    margin-top: 18px;
    background: var(--red-700);
    border: 2px solid var(--red-700);
    border-radius: 14px;
    color: #fff;
    font-size: 17px;
    font-weight: 800;
    text-decoration: none;
    text-align: center;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}

.confirmation-button .ar {
    font-weight: 700;
    font-size: 16px;
}

.confirmation-button:hover {
    background: var(--surface);
    color: var(--red-700);
    transform: translateY(-2px);
}

.confirmation-button:active {
    transform: scale(0.98);
}
        /* =========================
           INSCRIPTION
        ========================= */
        .register {
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid var(--line);
            text-align: center;
            font-size: 13.5px;
            color: var(--text-soft);
        }

        .register-ar { display: block; font-size: 12.5px; color: var(--text-muted); }

        .register-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 10px;
            padding: 6px 10px;
            border-radius: 10px;
            color: var(--red-700);
            font-weight: 700;
            text-decoration: none;
        }

        .register-link .ar { font-size: 12.5px; font-weight: 500; }
        .register-link:hover { background: var(--accent-soft); text-decoration: underline; text-underline-offset: 3px; }

        .footer { padding: 0 0 24px; text-align: center; font-size: 12px; color: var(--text-muted); }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 960px) {
            .layout { grid-template-columns: 1fr; }
            .aside { display: none; }

            .topbar {
                height: 60px;
                margin: 0 calc(-1 * max(24px, 5%));
                padding: 0 max(24px, 5%);
                background: var(--surface);
                border-bottom: 1px solid var(--line);
            }

            .topbar .logo { display: inline-flex; }
            .topbar .logo-img { width: 38px; height: 38px; padding: 0; background: transparent; box-shadow: none; }
            .content { padding-top: 32px; }
        }

        @media (max-width: 640px) {
            .main { padding: 0 20px; }
            .topbar { margin: 0 -20px; padding: 0 20px; }
            .title { font-size: 25px; }
            .input { font-size: 16px; }
        }

        @media (max-width: 380px) {
            .home-link .ar, .submit-button .ar { display: none; }
        }

        @media (prefers-reduced-motion: reduce) {
            * { transition: none !important; }
            .submit-button:hover { transform: none; }
        }
    </style>
</head>

<body class="lang-fr">

    <div class="layout">

        <!-- PANNEAU DE PRÉSENTATION -->
        <aside class="aside">
            <div class="decor" aria-hidden="true">
                <span class="tile t1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M2 5.5A2.5 2.5 0 0 1 4.5 3H11v16H4.5A2.5 2.5 0 0 0 2 21.5z"/><path d="M22 5.5A2.5 2.5 0 0 0 19.5 3H13v16h6.5a2.5 2.5 0 0 1 2.5 2.5z"/></svg></span>
                <span class="tile t2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1.2 2.7 3 6 3s6-1.8 6-3v-5"/><path d="M22 10v6"/></svg></span>
                <span class="tile t3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20l1-4L16.5 4.5a2.1 2.1 0 0 1 3 3L8 19z"/><path d="M14.5 6.5l3 3"/></svg></span>
                <span class="tile t4"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"/><path d="M10 21h4"/><path d="M12 3a6 6 0 0 0-3.5 10.9c.7.6 1 1.3 1 2.1h5c0-.8.3-1.5 1-2.1A6 6 0 0 0 12 3z"/></svg></span>
                <span class="tile t5"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1.6"/><ellipse cx="12" cy="12" rx="10" ry="4"/><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(120 12 12)"/></svg></span>
                <span class="tile t6"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m10 9.5 5 2.5-5 2.5z"/></svg></span>
                <span class="tile t7"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="m8.5 8 1.5 1.5L13 6.5"/><path d="M8.5 14l1.5 1.5L13 12.5"/><path d="M15 9h1M15 15h1"/></svg></span>
            </div>

            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy" class="logo-img">
                <span>CAD Academy</span>
            </a>

            <div>
                <h2 class="aside-title">
                    <span class="fr">Apprenez à votre rythme, où que vous soyez.</span>
                    <span class="aside-title-ar ar" dir="rtl" lang="ar">تعلّم بالوتيرة التي تناسبك، من أي مكان</span>
                </h2>

                <ul class="features">
                    <li>
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="5" width="18" height="14" rx="2.5" />
                                <path d="m10 9.5 5 2.5-5 2.5z" />
                            </svg>
                        </span>
                        <span>
                            <span class="fr">Cours en vidéo</span>
                            <span class="ar" dir="rtl" lang="ar">دروس بالفيديو</span>
                        </span>
                    </li>
                    <li>
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z" />
                                <path d="M14 3v5h5" />
                                <path d="M9 13h6M9 17h4" />
                            </svg>
                        </span>
                        <span>
                            <span class="fr">Supports PDF</span>
                            <span class="ar" dir="rtl" lang="ar">ملفات PDF</span>
                        </span>
                    </li>
                    <li>
                        <span class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9" />
                                <path d="m8.5 12.5 2.5 2.5 4.5-5" />
                            </svg>
                        </span>
                        <span>
                            <span class="fr">Quiz pour tester vos acquis</span>
                            <span class="ar" dir="rtl" lang="ar">اختبارات لتقييم مستواك</span>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="aside-foot"><span class="fr">Votre espace de formation en ligne</span><span class="ar" dir="rtl" lang="ar">فضاؤك للتكوين عبر الإنترنت</span></div>
        </aside>

        <!-- ZONE DE CONNEXION -->
        <div class="main">

            <nav class="topbar" aria-label="Navigation principale">
                <button type="button" class="language-toggle" id="language-toggle" aria-label="Changer de langue">العربية</button>
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy" class="logo-img">
                    CAD Academy
                </a>

                <a href="{{ route('home') }}" class="home-link">
                    <span class="fr">Accueil</span>
                    <span class="ar" dir="rtl" lang="ar">الرئيسية</span>
                </a>
            </nav>

            <main class="content">

                <header class="head">
                    <h1 class="title"><span class="fr">Bienvenue sur Cad Academy</span><span class="ar" dir="rtl" lang="ar">مرحباً بك في كاد أكاديمي</span></h1>
                    <p class="subtitle">
                        <span class="fr">Connectez-vous avec votre numéro WhatsApp et votre mot de passe</span>
                        <span class="subtitle-ar ar" dir="rtl" lang="ar">سجّل الدخول برقم واتساب والكود الخاص بك</span>
                    </p>
                </header>

                <!-- MESSAGE DE SUCCÈS -->
                @if (session('success'))
                    <div class="message success" role="status">
                        <svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path d="m8.5 12.5 2.5 2.5 4.5-5" />
                        </svg>
                        <div>
                            <div class="message-title"><span class="fr">Inscription envoyée avec succès</span><span class="ar" dir="rtl" lang="ar">تم إرسال طلب التسجيل بنجاح</span></div>
                            <div class="message-body"><span class="fr">{{ session('success') }}</span><span class="ar" dir="rtl" lang="ar">تمت العملية بنجاح.</span></div>
                        </div>
                    </div>
                @endif

                <!-- MESSAGE D'ERREUR -->
                @if (session('error'))
                    <div class="message error" role="alert">
                        <svg class="message-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 8v4.5" />
                            <path d="M12 16h.01" />
                        </svg>
                        <div>
                            <div class="message-title">
                                <span class="fr">Attention</span>
                                <span class="ar" dir="rtl" lang="ar">تنبيه</span>
                            </div>
                            <div class="message-body"><span class="fr">{{ session('error') }}</span><span class="ar" dir="rtl" lang="ar">وقع خطأ. المرجو المحاولة مرة أخرى.</span></div>
                        </div>
                    </div>
                @endif

                <!-- FORMULAIRE DE CONNEXION : WhatsApp + code -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- NUMÉRO WHATSAPP -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="whatsapp_phone" class="label"><span class="fr">Numéro WhatsApp</span><span class="ar" dir="rtl" lang="ar">رقم واتساب</span></label>
                        </div>
                        <div class="field">
                            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="7" y="2.5" width="10" height="19" rx="2.5" />
                                <path d="M11 18.5h2" />
                            </svg>
                            <input
                                id="whatsapp_phone"
                                type="text"
                                name="whatsapp_phone"
                                value="{{ old('whatsapp_phone') }}"
                                class="input @if ($errors->get('whatsapp_phone')) is-invalid @endif"
                                placeholder="+212 6 XX XX XX XX"
                                required
                                autofocus
                                inputmode="tel"
                                autocomplete="tel"
                                @if ($errors->get('whatsapp_phone')) aria-invalid="true" aria-describedby="phone-error" @endif
                            >
                        </div>
                        @if ($errors->get('whatsapp_phone'))
                            <div class="input-error" id="phone-error" role="alert"><span class="fr">{{ $errors->first('whatsapp_phone') }}</span><span class="ar" dir="rtl" lang="ar">يرجى التحقق من رقم واتساب.</span></div>
                        @endif
                    </div>

                   <!-- MOT DE PASSE -->
<div class="form-group">
    <div class="label-row">
        <label for="password" class="label">
            <span class="fr">Mot de passe</span>
            <span class="ar" dir="rtl" lang="ar">كلمة المرور</span>
        </label>
    </div>

    <div class="field">
        <svg class="field-icon" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.8"
             stroke-linecap="round" stroke-linejoin="round"
             aria-hidden="true">
            <rect x="4" y="11" width="16" height="10" rx="2" />
            <path d="M8 11V8a4 4 0 0 1 8 0v3" />
        </svg>

        <input
            id="password"
            type="password"
            name="password"
            class="input @if ($errors->get('password')) is-invalid @endif"
            placeholder="Votre mot de passe"
            required
            autocomplete="current-password"
            @if ($errors->get('password'))
                aria-invalid="true"
                aria-describedby="password-error"
            @endif
        >
    </div>

    @if ($errors->get('password'))
        <div class="input-error" id="password-error" role="alert">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>

                    <!-- MOT DE PASSE OUBLIÉ -->
                    <div class="forgot-password">
                        <a href="{{ url('/mot-de-passe-oublie') }}">
                            <span class="fr">Mot de passe oublié ?</span>
                            <span class="ar" dir="rtl" lang="ar">نسيت كلمة المرور؟</span>
                        </a>
                    </div>

                    <!-- SE SOUVENIR DE MOI -->
                    <div class="remember">
                        <input id="remember" type="checkbox" name="remember">
                        <label for="remember">
                            <span class="fr">Se souvenir de moi</span>
                            <span class="ar" dir="rtl" lang="ar">تذكرني</span>
                        </label>
                    </div>

                    <!-- BOUTON -->
                    <button type="submit" class="submit-button">
                        <span class="fr">Se connecter</span>
                        <span class="ar" dir="rtl" lang="ar">تسجيل الدخول</span>
                    </button>

                </form>

                <!-- CONFIRMATION D'INSCRIPTION -->
                
                    <div class="confirmation-box">
                        <div class="confirmation-title">
                            <span class="fr">Vous avez reçu votre code par WhatsApp ?</span>
                            <span class="ar" dir="rtl" lang="ar">توصلت بكود التأكيد عبر واتساب؟</span>
                        </div>

                        <div class="confirmation-text">
                            <span class="fr">Si votre inscription a été acceptée, utilisez le code reçu pour confirmer votre compte.</span>
                            <span class="ar" dir="rtl" lang="ar">إذا تمت الموافقة على تسجيلك، أدخل الكود الذي توصلت به لتأكيد حسابك.</span>
                        </div>

                        <a href="{{ route('confirmation.show') }}" class="confirmation-button">
                            <span class="fr">Confirmer mon inscription</span>
                            <span class="ar" dir="rtl" lang="ar">تأكيد التسجيل</span>
                        </a>
                    </div>
                

                <!-- LIEN D'INSCRIPTION -->
                <div class="register">
                    <span class="fr">Vous n'avez pas encore de compte ?</span>
                    <span class="register-ar ar" dir="rtl" lang="ar">مازال ما عندكش حساب؟</span>

                    <a href="{{ route('register') }}" class="register-link">
                        <span class="fr">Créer un compte</span>
                        <span class="ar" dir="rtl" lang="ar">إنشاء حساب</span>
                    </a>
                </div>

            </main>

            <footer class="footer">
                <span class="fr">© {{ date('Y') }} Cad Academy — Tous droits réservés</span>
                <span class="ar" dir="rtl" lang="ar">© {{ date('Y') }} كاد أكاديمي — جميع الحقوق محفوظة</span>
            </footer>

        </div>
    </div>

    <script>
        (() => {
            const html = document.documentElement;
            const body = document.body;
            const button = document.getElementById('language-toggle');
           
            const title = document.querySelector('title');

            function setLanguage(language) {
                const arabic = language === 'ar';
                html.lang = arabic ? 'ar' : 'fr';
                html.dir = arabic ? 'rtl' : 'ltr';
                body.classList.toggle('lang-ar', arabic);
                body.classList.toggle('lang-fr', !arabic);
                button.textContent = arabic ? 'Français' : 'العربية';
                button.setAttribute('aria-label', arabic ? 'Passer en français' : 'التبديل إلى العربية');
               
                if (title) title.textContent = arabic ? 'تسجيل الدخول - CAD Academy' : 'Connexion - CAD Academy';
                try { localStorage.setItem('cad-academy-language', language); } catch (e) {}
            }

            let initialLanguage = 'fr';
            try { initialLanguage = localStorage.getItem('cad-academy-language') || 'fr'; } catch (e) {}
            setLanguage(initialLanguage === 'ar' ? 'ar' : 'fr');
            button.addEventListener('click', () => {
                setLanguage(body.classList.contains('lang-ar') ? 'fr' : 'ar');
            });
        })();
    </script>

</body>

</html>
