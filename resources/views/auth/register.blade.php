<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - CAD Academy</title>
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

        .aside-title-ar {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            font-weight: 500;
            color: #fecaca;
            letter-spacing: 0;
        }

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

        .feature-icon .num { font-size: 15px; font-weight: 800; }

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

        .topbar { height: 72px; display: flex; align-items: center; justify-content: flex-end; }
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
           FORMULAIRE
        ========================= */
        .form-group { margin-bottom: 18px; }

        .label-row { display: flex; align-items: baseline; justify-content: space-between; gap: 12px; margin-bottom: 6px; }
        .label { font-size: 13.5px; font-weight: 700; }
        .label-ar { font-size: 12.5px; font-weight: 500; color: var(--text-muted); }

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
            padding: 0 14px 0 44px;
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

        select.input {
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            padding-right: 42px;
            text-overflow: ellipsis;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23b91c1c'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2.2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 16px;
        }

        .input-error { margin-top: 6px; font-size: 12.5px; font-weight: 600; color: var(--danger); line-height: 1.45; }

        .helper { margin-top: 6px; font-size: 12px; color: var(--text-muted); line-height: 1.5; }
        .helper .ar { display: block; font-size: 12px; }

        /* ---------- Pièces jointes ---------- */
        .section-title {
            margin: 26px 0 14px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            font-size: 14px;
            font-weight: 800;
            color: var(--red-900);
        }

        .section-title .ar { font-weight: 500; font-size: 13px; color: var(--text-muted); margin-inline-start: 8px; }

        .upload-input {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            overflow: hidden;
        }

        .upload {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border: 1.5px dashed var(--line-strong);
            border-radius: 12px;
            background: #fafafa;
            cursor: pointer;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .upload:hover { border-color: var(--accent); background: var(--accent-soft); }
        .upload:focus-within { border-color: var(--accent); box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.14); }
        .upload.has-file { border-style: solid; border-color: var(--accent); background: var(--accent-soft); }
        .upload.is-invalid { border-color: #f04438; }

        .upload-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--accent-soft);
            border: 1px solid var(--accent-border);
            color: var(--red-700);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
        }

        .upload-icon svg { width: 20px; height: 20px; }
        .upload-icon img { width: 100%; height: 100%; object-fit: cover; }

        .upload-text { min-width: 0; }
        .upload-main { font-size: 13.5px; font-weight: 700; color: var(--text); }
        .upload-main .ar { font-weight: 500; font-size: 12.5px; color: var(--text-muted); margin-inline-start: 6px; }
        .upload-name { font-size: 12px; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .upload.has-file .upload-name { color: var(--red-800); font-weight: 600; }

        /* ---------- Encadré d'information ---------- */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 24px 0 22px;
            padding: 14px 16px;
            background: var(--accent-soft);
            border: 1px solid var(--accent-border);
            border-radius: 12px;
        }

        .info-icon { width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px; color: var(--red-700); }
        .info-title { font-size: 13.5px; font-weight: 700; color: var(--red-900); margin-bottom: 3px; }
        .info-title .ar { font-weight: 500; font-size: 12.5px; margin-inline-start: 6px; opacity: 0.85; }
        .info-text { font-size: 12.5px; line-height: 1.6; color: var(--red-800); }
        .info-text .ar { display: block; margin-top: 4px; font-size: 12.5px; }

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

        .login-prompt {
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid var(--line);
            text-align: center;
            font-size: 13.5px;
            color: var(--text-soft);
        }

        .login-link {
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

        .login-link .ar { font-size: 12.5px; font-weight: 500; }
        .login-link:hover { background: var(--accent-soft); text-decoration: underline; text-underline-offset: 3px; }

        .footer { padding: 0 0 24px; text-align: center; font-size: 12px; color: var(--text-muted); }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 960px) {
            .layout { grid-template-columns: 1fr; }
            .aside { display: none; }

            .topbar {
                height: 60px;
                justify-content: space-between;
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

<body>

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
                    Rejoignez la plateforme en 3 étapes.
                    <span class="aside-title-ar ar" dir="rtl" lang="ar">انضم إلى المنصة في 3 خطوات</span>
                </h2>

                <ul class="features">
                    <li>
                        <span class="feature-icon" aria-hidden="true"><span class="num">1</span></span>
                        <span>
                            Remplissez le formulaire
                            <span class="ar" dir="rtl" lang="ar">املأ استمارة التسجيل</span>
                        </span>
                    </li>
                    <li>
                        <span class="feature-icon" aria-hidden="true"><span class="num">2</span></span>
                        <span>
                            L'administration examine votre demande
                            <span class="ar" dir="rtl" lang="ar">الإدارة تراجع طلبك</span>
                        </span>
                    </li>
                    <li>
                        <span class="feature-icon" aria-hidden="true"><span class="num">3</span></span>
                        <span>
                            Recevez votre code par WhatsApp
                            <span class="ar" dir="rtl" lang="ar">توصل بكود التأكيد عبر واتساب</span>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="aside-foot">Votre espace de formation en ligne</div>
        </aside>

        <!-- ZONE D'INSCRIPTION -->
        <div class="main">

            <nav class="topbar" aria-label="Navigation principale">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo-centre.png') }}" alt="CAD Academy" class="logo-img">
                    CAD Academy
                </a>

                <a href="{{ route('home') }}" class="home-link">
                    Accueil
                    <span class="ar" dir="rtl" lang="ar">الرئيسية</span>
                </a>
            </nav>

            <main class="content">

                <header class="head">
                    <h1 class="title">Créer un compte Cad Academy</h1>
                    <p class="subtitle">
                        Inscrivez-vous pour commencer votre parcours de formation
                        <span class="subtitle-ar ar" dir="rtl" lang="ar">أنشئ حسابك وابدأ رحلتك التعليمية</span>
                    </p>
                </header>

                <!-- enctype obligatoire pour envoyer des fichiers -->
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
    <div style="background:#fef2f2; border:1px solid #fecaca; color:#991b1b; padding:14px; border-radius:12px; margin-bottom:20px;">
        <strong>Veuillez corriger les erreurs suivantes :</strong>

        <ul style="margin:10px 0 0 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div style="background:#ecfdf5; border:1px solid #a7f3d0; color:#065f46; padding:14px; border-radius:12px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

                    <!-- NOM COMPLET -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="name" class="label">Nom complet</label>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">الاسم الكامل</span>
                        </div>
                        <div class="field">
                            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8" />
                            </svg>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="input @if ($errors->get('name')) is-invalid @endif"
                                placeholder="Votre nom complet"
                                required
                                autofocus
                                autocomplete="name"
                                @if ($errors->get('name')) aria-invalid="true" aria-describedby="name-error" @endif
                            >
                        </div>
                        @if ($errors->get('name'))
                            <div class="input-error" id="name-error" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- WHATSAPP -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="whatsapp_phone" class="label">WhatsApp</label>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">رقم واتساب</span>
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
                                inputmode="tel"
                                autocomplete="tel"
                                aria-describedby="whatsapp-help @if ($errors->get('whatsapp_phone')) whatsapp-error @endif"
                                @if ($errors->get('whatsapp_phone')) aria-invalid="true" @endif
                            >
                        </div>
                        <p class="helper" id="whatsapp-help">
                            Ce numéro sera utilisé pour vous contacter et pour vous connecter.
                            <span class="ar" dir="rtl" lang="ar">سيتم استعمال هذا الرقم للتواصل معك ولتسجيل الدخول.</span>
                        </p>
                        @if ($errors->get('whatsapp_phone'))
                            <div class="input-error" id="whatsapp-error" role="alert">{{ $errors->first('whatsapp_phone') }}</div>
                        @endif
                    </div>

                    <!-- FORMATION -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="formation_id" class="label">Formation souhaitée</label>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">التكوين الذي أريده</span>
                        </div>
                        <div class="field">
                            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15H6.5A2.5 2.5 0 0 0 4 20.5v-15z" />
                                <path d="M4 20.5A2.5 2.5 0 0 0 6.5 23H20v-5" />
                            </svg>
                            <select
                                id="formation_id"
                                name="formation_id"
                                class="input @if ($errors->get('formation_id')) is-invalid @endif"
                                required
                                aria-describedby="formation-help @if ($errors->get('formation_id')) formation-error @endif"
                                @if ($errors->get('formation_id')) aria-invalid="true" @endif
                            >
                                <option value="">
                                    Choisissez une formation | اختر التكوين
                                </option>
                                @foreach ($formations as $formation)
                                    <option
                                        value="{{ $formation->id }}"
                                        {{ old('formation_id') == $formation->id ? 'selected' : '' }}
                                    >
                                        {{ $formation->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <p class="helper" id="formation-help">
                            Choisissez la formation que vous souhaitez suivre.
                            <span class="ar" dir="rtl" lang="ar">اختر التكوين الذي ترغب في متابعته.</span>
                        </p>
                        @if ($errors->get('formation_id'))
                            <div class="input-error" id="formation-error" role="alert">{{ $errors->first('formation_id') }}</div>
                        @endif
                    </div>

                    <!-- MOT DE PASSE -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="password" class="label">Mot de passe</label>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">كلمة المرور</span>
                        </div>
                        <div class="field">
                            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
                                autocomplete="new-password"
                                @if ($errors->get('password')) aria-invalid="true" aria-describedby="password-error" @endif
                            >
                        </div>
                        @if ($errors->get('password'))
                            <div class="input-error" id="password-error" role="alert">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- CONFIRMATION DU MOT DE PASSE -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="password_confirmation" class="label">Confirmer le mot de passe</label>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">تأكيد كلمة المرور</span>
                        </div>
                        <div class="field">
                            <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 3 4.5 6v5.5c0 4.5 3.1 8.2 7.5 9.5 4.4-1.3 7.5-5 7.5-9.5V6L12 3z" />
                                <path d="m9 12 2.2 2.2L15.5 10" />
                            </svg>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="input @if ($errors->get('password_confirmation')) is-invalid @endif"
                                placeholder="Confirmez votre mot de passe"
                                required
                                autocomplete="new-password"
                                @if ($errors->get('password_confirmation')) aria-invalid="true" aria-describedby="password-confirmation-error" @endif
                            >
                        </div>
                        @if ($errors->get('password_confirmation'))
                            <div class="input-error" id="password-confirmation-error" role="alert">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <!-- PIÈCES JOINTES -->
                    <h2 class="section-title">
                        Pièces jointes
                        <span class="ar" dir="rtl" lang="ar">المرفقات</span>
                    </h2>

                    <!-- PHOTO -->
                    <div class="form-group">
                        <div class="label-row">
                            <span class="label">Photo d'identité</span>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">صورة شخصية</span>
                        </div>
                        <label class="upload @if ($errors->get('photo')) is-invalid @endif" for="photo" data-upload>
                            <input class="upload-input" id="photo" type="file" name="photo" accept="image/png,image/jpeg,image/webp" required>
                            <span class="upload-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 8a2 2 0 0 1 2-2h1.5l1.2-1.6A1 1 0 0 1 9.5 4h5a1 1 0 0 1 .8.4L16.5 6H18a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                                    <circle cx="12" cy="12.5" r="3.5" />
                                </svg>
                            </span>
                            <span class="upload-text">
                                <span class="upload-main">Choisir une photo <span class="ar" dir="rtl" lang="ar">اختر صورة</span></span>
                                <span class="upload-name">JPG, PNG ou WEBP — 2 Mo max</span>
                            </span>
                        </label>
                        @if ($errors->get('photo'))
                            <div class="input-error" role="alert">{{ $errors->first('photo') }}</div>
                        @endif
                    </div>

                    <!-- CIN RECTO -->
                    <div class="form-group">
                        <div class="label-row">
                            <span class="label">CIN — recto</span>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">البطاقة الوطنية — الوجه</span>
                        </div>
                        <label class="upload @if ($errors->get('cin_recto')) is-invalid @endif" for="cin_recto" data-upload>
                            <input class="upload-input" id="cin_recto" type="file" name="cin_recto" accept="image/png,image/jpeg,image/webp,application/pdf" required>
                            <span class="upload-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2.5" />
                                    <circle cx="9" cy="11" r="2" />
                                    <path d="M6 16c.6-1.4 1.7-2 3-2s2.4.6 3 2M15 10h3M15 13h3" />
                                </svg>
                            </span>
                            <span class="upload-text">
                                <span class="upload-main">Choisir un fichier <span class="ar" dir="rtl" lang="ar">اختر ملفاً</span></span>
                                <span class="upload-name">Image ou PDF — 4 Mo max</span>
                            </span>
                        </label>
                        @if ($errors->get('cin_recto'))
                            <div class="input-error" role="alert">{{ $errors->first('cin_recto') }}</div>
                        @endif
                    </div>

                    <!-- CIN VERSO -->
                    <div class="form-group">
                        <div class="label-row">
                            <span class="label">CIN — verso</span>
                            <span class="label-ar ar" dir="rtl" lang="ar" aria-hidden="true">البطاقة الوطنية — الظهر</span>
                        </div>
                        <label class="upload @if ($errors->get('cin_verso')) is-invalid @endif" for="cin_verso" data-upload>
                            <input class="upload-input" id="cin_verso" type="file" name="cin_verso" accept="image/png,image/jpeg,image/webp,application/pdf" required>
                            <span class="upload-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="14" rx="2.5" />
                                    <path d="M6 10h12M6 14h7" />
                                </svg>
                            </span>
                            <span class="upload-text">
                                <span class="upload-main">Choisir un fichier <span class="ar" dir="rtl" lang="ar">اختر ملفاً</span></span>
                                <span class="upload-name">Image ou PDF — 4 Mo max</span>
                            </span>
                        </label>
                        @if ($errors->get('cin_verso'))
                            <div class="input-error" role="alert">{{ $errors->first('cin_verso') }}</div>
                        @endif
                    </div>

                    <!-- INFORMATION IMPORTANTE -->
                    <div class="info-box">
                        <svg class="info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 11v5" />
                            <path d="M12 8h.01" />
                        </svg>
                        <div>
                            <div class="info-title">
                                Important
                                <span class="ar" dir="rtl" lang="ar">مهم</span>
                            </div>
                            <div class="info-text">
                                Après votre inscription, votre demande sera examinée par l'administration.
                                <span class="ar" dir="rtl" lang="ar">بعد التسجيل، سيتم إرسال طلبك إلى الإدارة للمراجعة.</span>
                                <span class="ar" dir="rtl" lang="ar">إذا تمت الموافقة، ستتوصل بكود التأكيد عبر WhatsApp.</span>
                            </div>
                        </div>
                    </div>

                    <!-- BOUTON D'INSCRIPTION -->
                    <button type="submit" class="submit-button">
                        S'inscrire
                        <span class="ar" dir="rtl" lang="ar">إنشاء الحساب</span>
                    </button>

                </form>

                <!-- LIEN VERS LA CONNEXION -->
                <div class="login-prompt">
                    Déjà inscrit ?
                    <br>
                    <a href="{{ route('login') }}" class="login-link">
                        Se connecter
                        <span class="ar" dir="rtl" lang="ar">لدي حساب بالفعل</span>
                    </a>
                </div>

            </main>

            <footer class="footer">
                © {{ date('Y') }} Cad Academy — Tous droits réservés
            </footer>

        </div>
    </div>

    <script>
        // Affiche le nom du fichier choisi (et un aperçu pour les images)
        document.querySelectorAll('[data-upload]').forEach(function (box) {
            var input = box.querySelector('input[type="file"]');
            var name = box.querySelector('.upload-name');
            var icon = box.querySelector('.upload-icon');
            var original = icon.innerHTML;

            input.addEventListener('change', function () {
                var file = input.files && input.files[0];
                if (!file) {
                    box.classList.remove('has-file');
                    icon.innerHTML = original;
                    return;
                }
                box.classList.add('has-file');
                name.textContent = file.name;
                if (file.type.indexOf('image/') === 0) {
                    var img = document.createElement('img');
                    img.alt = '';
                    img.src = URL.createObjectURL(file);
                    icon.innerHTML = '';
                    icon.appendChild(img);
                } else {
                    icon.innerHTML = original;
                }
            });
        });
    </script>

</body>

</html>