<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ÉtudeEnLigne</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 0%, #d1fae5 0%, #f0fdf4 35%, #f8fafc 100%);
            min-height: 100vh;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================
           NAVBAR
        ========================= */
        .navbar {
            height: 70px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: #10b981;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .home-link {
            text-decoration: none;
            color: #475569;
            font-size: 13.5px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.2s ease;
            background: rgba(241, 245, 249, 0.6);
        }

        .home-link:hover {
            color: #10b981;
            background: #ecfdf5;
        }

        /* =========================
           PAGE & CONTAINER
        ========================= */
        .page {
            min-height: calc(100vh - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-card {
            width: 100%;
            max-width: 480px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 40px 36px;
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.08),
                        0 0 0 1px rgba(255, 255, 255, 0.8) inset;
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.25);
            color: #fff;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 13.5px;
            line-height: 1.5;
            margin-bottom: 28px;
        }

        /* =========================
           MESSAGES
        ========================= */
        .message {
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .message-title {
            font-weight: 700;
            margin-bottom: 3px;
        }

        /* =========================
           FORM
        ========================= */
        .form-group {
            margin-bottom: 18px;
        }

        .label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 6px;
        }

        .input {
            width: 100%;
            height: 48px;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 0 16px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
            color: #0f172a;
        }

        .input:hover {
            border-color: #cbd5e1;
            background: #ffffff;
        }

        .input:focus {
            border-color: #10b981;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
        }

        .input::placeholder {
            color: #94a3b8;
        }

        .input-error {
            margin-top: 5px;
            font-size: 12px;
            font-weight: 600;
            color: #ef4444;
        }

        /* =========================
           REMEMBER
        ========================= */
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
        }

        .remember input {
            width: 16px;
            height: 16px;
            accent-color: #10b981;
            cursor: pointer;
        }

        .remember label {
            font-size: 13px;
            color: #64748b;
            cursor: pointer;
            font-weight: 500;
        }

        /* =========================
           BUTTON
        ========================= */
        .login-button {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px -4px rgba(16, 185, 129, 0.4);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -4px rgba(16, 185, 129, 0.5);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* =========================
           FORGOT PASSWORD
        ========================= */
        .forgot {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #64748b;
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .forgot:hover {
            color: #10b981;
        }

        /* =========================
           CONFIRMATION
        ========================= */
        .confirmation-box {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid rgba(226, 232, 240, 0.8);
            text-align: center;
        }

        .confirmation-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 6px;
        }

        .confirmation-text {
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .confirmation-button {
            display: inline-block;
            padding: 10px 18px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            border-radius: 12px;
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .confirmation-button:hover {
            background: #d1fae5;
        }

        /* =========================
           REGISTER
        ========================= */
        .register {
            text-align: center;
            margin-top: 22px;
            padding-top: 20px;
            border-top: 1px solid rgba(226, 232, 240, 0.8);
            font-size: 13px;
            color: #64748b;
        }

        .register a {
            color: #10b981;
            font-weight: 700;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        /* =========================
           FOOTER
        ========================= */
        .footer {
            text-align: center;
            margin-top: 24px;
            color: #94a3b8;
            font-size: 11.5px;
            font-weight: 500;
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 550px) {
            .navbar {
                padding: 0 20px;
            }

            .page {
                padding: 20px 14px;
            }

            .login-card {
                padding: 28px 20px;
                border-radius: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            ÉtudeEnLigne
        </a>
        <a href="{{ route('home') }}" class="home-link">
            الرئيسية | Accueil
        </a>
    </nav>

    <!-- PAGE -->
    <main class="page">
        <div class="login-card">

            <!-- ICON WRAPPER -->
            <div class="icon-wrapper">
                🎓
            </div>

            <!-- TITLE -->
            <h1 class="title">
                تسجيل الدخول
            </h1>

            <p class="subtitle">
                Connexion à votre espace étudiant
                <br>
                مرحباً بك في منصة ÉtudeEnLigne
            </p>

            <!-- SUCCESS MESSAGE -->
            @if (session('success'))
                <div class="message success">
                    <div class="message-title">
                        Inscription envoyée avec succès
                    </div>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- ERROR MESSAGE -->
            @if (session('error'))
                <div class="message error">
                    <div class="message-title">
                        Attention | تنبيه
                    </div>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- LOGIN FORM -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email" class="label">
                        البريد الإلكتروني | Adresse email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="input" 
                        placeholder="exemple@email.com" 
                        required 
                        autofocus 
                        autocomplete="username"
                    >
                    @if ($errors->get('email'))
                        <div class="input-error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- PASSWORD -->
                <div class="form-group">
                    <label for="password" class="label">
                        كلمة المرور | Mot de passe
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="input" 
                        placeholder="Votre mot de passe" 
                        required 
                        autocomplete="current-password"
                    >
                    @if ($errors->get('password'))
                        <div class="input-error">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- REMEMBER -->
                <div class="remember">
                    <input 
                        id="remember" 
                        type="checkbox" 
                        name="remember"
                    >
                    <label for="remember">
                        Se souvenir de moi | تذكرني
                    </label>
                </div>

                <!-- LOGIN BUTTON -->
                <button type="submit" class="login-button">
                    تسجيل الدخول | Se connecter
                </button>

            </form>

            <!-- FORGOT PASSWORD -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot">
                    Mot de passe oublié ? | هل نسيت كلمة المرور؟
                </a>
            @endif

            <!-- CONFIRMATION BOX -->
            @if (session('show_confirmation'))
                <div class="confirmation-box">
                    <div class="confirmation-title">
                        توصلت بكود التأكيد عبر واتساب؟
                        <br>
                        Vous avez reçu votre code par WhatsApp ?
                    </div>

                    <div class="confirmation-text">
                        إذا تمت الموافقة على تسجيلك، أدخل الكود الذي توصلت به لتأكيد حسابك.
                        <br>
                        Si votre inscription a été acceptée, utilisez le code reçu pour confirmer votre compte.
                    </div>

                    <a href="{{ route('confirmation.show') }}" class="confirmation-button">
                        ✓ تأكيد التسجيل <span style="margin: 0 5px;">|</span> Confirmer mon inscription
                    </a>
                </div>
            @endif

            <!-- REGISTER LINK -->
            <div class="register">
                مازال ما عندكش حساب؟
                <br>
                Vous n'avez pas encore de compte ?
                <br><br>
                <a href="{{ route('register') }}">
                    إنشاء حساب | S'inscrire
                </a>
            </div>

            <!-- FOOTER -->
            <div class="footer">
                © {{ date('Y') }} ÉtudeEnLigne — Tous droits réservés
            </div>

        </div>
    </main>

</body>

</html>