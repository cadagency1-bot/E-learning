<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - ÉtudeEnLigne</title>

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
            display: flex;
            align-items: center;
            gap: 8px;
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
           PAGE & CARD CONTAINER
        ========================= */
        .page {
            min-height: calc(100vh - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card {
            width: 100%;
            max-width: 480px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 40px 36px;
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.08),
                        0 0 0 1px rgba(255, 255, 255, 0.8) inset;
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
        }

        /* HEADER ICON */
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

        /* TYPOGRAPHY */
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
           FORM INPUTS
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

        /* SELECT CUSTOMIZATION */
        select.input {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%310b981'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
            padding-right: 42px;
        }

        .helper {
            margin-top: 6px;
            font-size: 11.5px;
            color: #64748b;
            line-height: 1.4;
        }

        /* INFO BOX MODERN */
        .info-box {
            margin-top: 24px;
            padding: 16px;
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%);
            border: 1px solid #a7f3d0;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
        }

        .info-title {
            font-size: 12.5px;
            font-weight: 800;
            color: #047857;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-text {
            font-size: 12px;
            line-height: 1.6;
            color: #065f46;
        }

        /* BUTTONS & LINKS */
        .buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 28px;
        }

        .login-link {
            color: #64748b;
            font-size: 12.5px;
            line-height: 1.5;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .login-link:hover {
            color: #10b981;
        }

        .register-button {
            height: 50px;
            padding: 0 26px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
            box-shadow: 0 8px 20px -4px rgba(16, 185, 129, 0.4);
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -4px rgba(16, 185, 129, 0.5);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 28px;
            color: #94a3b8;
            font-size: 11.5px;
            font-weight: 500;
        }

        /* RESPONSIVE MOBILE */
        @media (max-width: 550px) {
            .navbar {
                padding: 0 20px;
            }

            .page {
                padding: 20px 14px;
            }

            .register-card {
                padding: 28px 20px;
                border-radius: 22px;
            }

            .buttons {
                flex-direction: column;
                gap: 12px;
            }

            .login-link {
                text-align: center;
                order: 2;
            }

            .register-button {
                width: 100%;
                order: 1;
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

    <!-- PAGE MAIN -->
    <main class="page">
        <div class="register-card">

            <!-- ICON WRAPPER -->
            <div class="icon-wrapper">
                🎓
            </div>

            <!-- TITLE & SUBTITLE -->
            <h1 class="title">إنشاء حساب</h1>
            <p class="subtitle">
                Créer un compte ÉtudeEnLigne<br>
                أنشئ حسابك وابدأ رحلتك التعليمية
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- NOM COMPLET -->
                <div class="form-group">
                    <label for="name" class="label">
                        الاسم الكامل | Nom complet
                    </label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="input" 
                        placeholder="Votre nom complet" 
                        required 
                        autofocus 
                        autocomplete="name"
                    >
                    @if ($errors->get('name'))
                        <div class="input-error">{{ $errors->first('name') }}</div>
                    @endif
                </div>

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
                        autocomplete="username"
                    >
                    @if ($errors->get('email'))
                        <div class="input-error">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- WHATSAPP -->
                <div class="form-group">
                    <label for="whatsapp_phone" class="label">
                        رقم واتساب | WhatsApp
                    </label>
                    <input 
                        id="whatsapp_phone" 
                        type="text" 
                        name="whatsapp_phone" 
                        value="{{ old('whatsapp_phone') }}" 
                        class="input" 
                        placeholder="+212 6 XX XX XX XX" 
                        required 
                        autocomplete="tel"
                    >
                    <p class="helper">
                        Ce numéro sera utilisé par l'administration pour vous contacter.<br>
                        سيتم استعمال هذا الرقم من طرف الإدارة للتواصل معك.
                    </p>
                    @if ($errors->get('whatsapp_phone'))
                        <div class="input-error">{{ $errors->first('whatsapp_phone') }}</div>
                    @endif
                </div>

                <!-- FORMATION -->
                <div class="form-group">
                    <label for="formation_id" class="label">
                        التكوين الذي أريده | Formation souhaitée
                    </label>
                    <select id="formation_id" name="formation_id" class="input" required>
                        <option value="">
                            -- اختر التكوين | Choisissez une formation --
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
                    <p class="helper">
                        Choisissez la formation que vous souhaitez suivre.<br>
                        اختر التكوين الذي ترغب في متابعته.
                    </p>
                    @if ($errors->get('formation_id'))
                        <div class="input-error">{{ $errors->first('formation_id') }}</div>
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
                        autocomplete="new-password"
                    >
                    @if ($errors->get('password'))
                        <div class="input-error">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group">
                    <label for="password_confirmation" class="label">
                        تأكيد كلمة المرور | Confirmer le mot de passe
                    </label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="input" 
                        placeholder="Confirmez votre mot de passe" 
                        required 
                        autocomplete="new-password"
                    >
                    @if ($errors->get('password_confirmation'))
                        <div class="input-error">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <!-- INFO BOX -->
                <div class="info-box">
                    <div class="info-title">
                        <span>💡</span> Important | مهم
                    </div>
                    <div class="info-text">
                        Après votre inscription, votre demande sera examinée par l'administration.<br>
                        بعد التسجيل، سيتم إرسال طلبك إلى الإدارة للمراجعة.<br>
                        إذا تمت الموافقة، ستتوصل بكود التأكيد عبر WhatsApp.
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="buttons">
                    <a href="{{ route('login') }}" class="login-link">
                        Déjà inscrit ?<br>
                        لدي حساب بالفعل
                    </a>
                    <button type="submit" class="register-button">
                        إنشاء الحساب | S'inscrire
                    </button>
                </div>

            </form>

            <!-- FOOTER -->
            <div class="footer">
                © {{ date('Y') }} ÉtudeEnLigne — Tous droits réservés
            </div>

        </div>
    </main>

</body>

</html>