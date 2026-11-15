
<x-guest-layout>

    <div class="text-center mb-8">

        <div class="mx-auto mb-5 w-16 h-16 rounded-2xl flex items-center justify-center"
             style="background:#fff0f0;">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="30" height="30" viewBox="0 0 24 24"
                 fill="none" stroke="#d71920" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round">

                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                <path d="M12 15v3"/>

            </svg>

        </div>

        <h1 class="text-2xl font-extrabold text-gray-900">
            Mot de passe oublié ?
        </h1>

        <p class="text-sm text-gray-500 mt-3 leading-6">
            Pas de panique ! Entrez votre adresse e-mail
            et nous vous enverrons un lien pour réinitialiser
            votre mot de passe.
        </p>

    </div>


    <!-- Session Status -->

    @if (session('status'))
        <div class="mb-5 rounded-xl p-4 text-sm text-green-700 bg-green-50 border border-green-100">
            {{ session('status') }}
        </div>
    @endif


    <!-- Errors -->

    @if ($errors->any())
        <div class="mb-5 rounded-xl p-4 text-sm text-red-700 bg-red-50 border border-red-100">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <!-- Form -->

    <form method="POST" action="{{ route('password.email') }}">

        @csrf

        <div class="mb-6">

            <label for="email"
                   class="block text-sm font-semibold text-gray-700 mb-2">
                Adresse e-mail
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="email"
                placeholder="exemple@email.com"

                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3.5 text-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100"
            >

        </div>


        <button
            type="submit"
            class="w-full flex items-center justify-center gap-2 rounded-xl py-4 text-white font-bold text-sm transition hover:opacity-90 active:scale-[0.98]"
            style="background:#d71920;"
        >

            Envoyer le lien de réinitialisation

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="18" height="18"
                 viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">

                <path d="M5 12h14"/>
                <path d="m12 5 7 7-7 7"/>

            </svg>

        </button>

    </form>


    <div class="mt-7 text-center">

        <a href="{{ route('login') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold transition hover:underline"
           style="color:#d71920;">

            <span>←</span>
            Retour à la connexion

        </a>

    </div>

</x-guest-layout>
