
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تأكيد التسجيل - Confirmation d'inscription | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, Tahoma, sans-serif;
        }

        .arabic {
            font-family: Tahoma, Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- ================= NAVBAR ================= -->

    <nav class="bg-white shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <!-- Logo -->

                <a href="{{ route('home') }}"
                   class="text-2xl font-bold text-green-600"
                   dir="ltr">

                    Étude<span class="text-gray-800">EnLigne</span>

                </a>


                <!-- Connexion -->

                <a href="{{ route('login') }}"
                   class="text-gray-600 hover:text-green-600 transition">

                    تسجيل الدخول
                    <span class="text-gray-300 mx-1">|</span>
                    Connexion

                </a>

            </div>

        </div>

    </nav>


    <!-- ================= CONTENU ================= -->

    <main class="min-h-[calc(100vh-73px)] flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-md">


            <!-- ================= CARD ================= -->

            <div class="bg-white rounded-2xl shadow-lg p-8">


                <!-- Icon -->

                <div class="flex justify-center mb-5">

                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">

                        <span class="text-3xl">
                            📱
                        </span>

                    </div>

                </div>


                <!-- ================= TITRE ================= -->

                <div class="text-center mb-8">

                    <h1 class="text-2xl font-bold text-gray-800 mb-3">

                        تأكيد التسجيل

                    </h1>

                    <h2 class="text-xl font-semibold text-gray-700 mb-4">

                        Confirmer votre inscription

                    </h2>


                    <p class="text-gray-500 text-sm leading-7">

                        لقد توصلت برمز تأكيد عبر واتساب بعد قبول طلب التسجيل الخاص بك.

                        <br>

                        Vous avez reçu un code de confirmation par WhatsApp
                        après l'acceptation de votre inscription.

                    </p>

                </div>


                <!-- ================= SUCCESS ================= -->

                @if (session('success'))

                    <div class="mb-5 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">

                        {{ session('success') }}

                    </div>

                @endif


                <!-- ================= ERRORS ================= -->

                @if ($errors->any())

                    <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">

                        <ul class="list-disc list-inside space-y-1">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- ================= FORM ================= -->

                <form method="POST" action="{{ route('confirmation.confirm') }}">

                    @csrf


                    <!-- EMAIL -->

                    <div class="mb-5">

                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            البريد الإلكتروني
                            <span class="text-gray-400">|</span>
                            Adresse email

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="exemple@gmail.com"
                            required
                            autocomplete="email"
                            dir="ltr"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-green-500
                                   focus:border-green-500 transition"
                        >

                    </div>


                    <!-- CODE -->

                    <div class="mb-6">

                        <label
                            for="confirmation_code"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            رمز التأكيد
                            <span class="text-gray-400">|</span>
                            Code de confirmation

                        </label>


                        <input
                            type="text"
                            id="confirmation_code"
                            name="confirmation_code"
                            value="{{ old('confirmation_code') }}"
                            placeholder="مثال : A7K9P2"
                            maxlength="6"
                            minlength="6"
                            required
                            autocomplete="one-time-code"
                            dir="ltr"
                            style="text-transform: uppercase;"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl
                                   text-center text-xl font-bold tracking-[0.4em]
                                   focus:outline-none focus:ring-2 focus:ring-green-500
                                   focus:border-green-500 transition"
                        >


                        <p class="text-xs text-gray-500 mt-2 text-center leading-6">

                            أدخل رمز التأكيد المكون من 6 أحرف الذي توصلت به عبر واتساب.

                            <br>

                            Entrez le code de confirmation à 6 caractères
                            reçu par WhatsApp.

                        </p>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="w-full bg-green-600 hover:bg-green-700
                               text-white font-semibold py-3 px-4
                               rounded-xl transition duration-200
                               shadow-sm">

                        ✓ تأكيد التسجيل
                        <span class="mx-1">|</span>
                        Confirmer mon inscription

                    </button>

                </form>


                <!-- ================= SEPARATOR ================= -->

                <div class="flex items-center my-7">

                    <div class="flex-1 border-t border-gray-200"></div>

                    <span class="px-4 text-xs text-gray-400">

                        أو | OU

                    </span>

                    <div class="flex-1 border-t border-gray-200"></div>

                </div>


                <!-- ================= LOGIN ================= -->

                <div class="text-center">

                    <p class="text-sm text-gray-500 mb-2">

                        هل سبق لك تأكيد التسجيل؟

                        <br>

                        Vous avez déjà confirmé votre inscription ?

                    </p>


                    <a
                        href="{{ route('login') }}"
                        class="text-green-600 font-semibold hover:text-green-700">

                        تسجيل الدخول
                        <span class="text-gray-300 mx-1">|</span>
                        Se connecter

                    </a>

                </div>

            </div>


            <!-- ================= HOME ================= -->

            <div class="text-center mt-6">

                <a
                    href="{{ route('home') }}"
                    class="text-sm text-gray-500 hover:text-green-600 transition">

                    ← العودة إلى الصفحة الرئيسية
                    <span class="mx-1">|</span>
                    Retour à l'accueil

                </a>

            </div>

        </div>

    </main>

</body>

</html>

