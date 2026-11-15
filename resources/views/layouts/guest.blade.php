
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAD Academy | {{ config('app.name', 'Formation') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #fafafa;
        }

        .auth-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(215,25,32,.07), transparent 30%),
                #fafafa;
        }

        .auth-card {
            box-shadow: 0 20px 70px rgba(0,0,0,.07);
        }

        .brand-red {
            background: #d71920;
        }

        .brand-text {
            color: #d71920;
        }
    </style>
</head>

<body class="antialiased text-gray-900">

    <main class="auth-bg min-h-screen flex flex-col items-center justify-center px-5 py-10">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex flex-col items-center">
                    <img
                        src="{{ asset('images/logo-centre.png') }}"
                        alt="CAD Academy"
                        class="h-24 w-24 object-contain"
                    >

                    <span class="text-xl font-extrabold tracking-tight mt-2">
                        CAD <span class="brand-text">ACADEMY</span>
                    </span>

                    <span class="text-xs text-gray-500 mt-1">
                        Votre avenir commence ici
                    </span>
                </a>
            </div>

            <!-- Authentication Card -->
            <div class="auth-card bg-white rounded-3xl border border-gray-100 p-7 sm:p-9">

                <div class="h-1.5 w-16 brand-red rounded-full mb-7"></div>

                {{ $slot }}

            </div>

            <!-- Footer -->
            <div class="text-center mt-7">
                <p class="text-xs text-gray-400">
                    © {{ date('Y') }} CAD Academy.
                    Tous droits réservés.
                </p>
            </div>

        </div>

    </main>

</body>
</html>
