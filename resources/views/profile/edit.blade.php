
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon profil | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f6f8f7;
            color: #182b24;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .profile-card {
            background: #fff;
            border: 1px solid #e8eee9;
            border-radius: 22px;
            box-shadow: 0 5px 24px rgba(15, 40, 27, .035);
        }

        .profile-content label {
            display: block;
            margin-bottom: 8px;
            color: #26372f !important;
            font-size: 14px !important;
            font-weight: 700 !important;
        }

        .profile-content input:not([type="checkbox"]):not([type="radio"]),
        .profile-content textarea,
        .profile-content select {
            width: 100%;
            min-height: 48px;
            padding: 12px 14px !important;
            border: 1px solid #dfe7e1 !important;
            border-radius: 12px !important;
            background: #fff;
            font-size: 14px !important;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .profile-content input:focus,
        .profile-content textarea:focus,
        .profile-content select:focus {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .12);
        }

        .profile-content p {
            margin-top: 8px;
            color: #6b7280;
            font-size: 13px !important;
            line-height: 1.8 !important;
        }

        .profile-content h2 {
            margin-bottom: 10px;
            color: #182b24;
            font-size: 19px !important;
            font-weight: 800;
        }

        .profile-content button {
            min-height: 43px;
            border-radius: 11px;
            font-size: 13px !important;
            font-weight: 700;
        }

        .profile-content a {
            font-size: 13px !important;
        }

        .avatar-ring {
            box-shadow: 0 0 0 5px #ecfdf5, 0 0 0 6px #a7f3d0;
        }

        .photo-button {
            transition: .2s ease;
        }

        .photo-button:hover {
            transform: translateY(-1px);
        }

        @media (max-width: 640px) {
            .profile-card { border-radius: 17px; }
        }
    </style>
</head>

<body>

@php
    $user = Auth::user();
    $photoUrl = $user->profile_photo_path
        ? asset('storage/' . $user->profile_photo_path)
        : null;

    $initial = strtoupper(substr($user->name ?? 'E', 0, 1));
@endphp

<!-- NAVBAR -->
<nav class="sticky top-0 z-40 border-b border-gray-100 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-[76px] max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-500 text-white shadow-sm">
                <i data-lucide="graduation-cap" class="h-6 w-6"></i>
            </div>

            <div class="min-w-0">
                <h1 class="truncate text-lg font-extrabold tracking-tight text-gray-900">
                    Étude<span class="text-emerald-500">EnLigne</span>
                </h1>
                <p class="hidden text-[10px] font-medium tracking-wide text-gray-400 sm:block">
                    APPRENDRE · PROGRESSER · RÉUSSIR
                </p>
            </div>
        </a>

        <div class="hidden items-center gap-7 md:flex">
            <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-500 transition hover:text-emerald-600">
                Accueil
            </a>
            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-500 transition hover:text-emerald-600">
                Formations
            </a>
            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-500 transition hover:text-emerald-600">
                Mon espace
            </a>
        </div>

        <a href="{{ route('profile.edit') }}" class="flex shrink-0 items-center gap-3 rounded-full border border-gray-100 bg-gray-50 p-1.5 pr-3 transition hover:bg-emerald-50">
            @if($photoUrl)
                <img src="{{ $photoUrl }}" alt="Photo de profil" class="h-9 w-9 rounded-full object-cover">
            @else
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-sm font-extrabold text-emerald-700">
                    {{ $initial }}
                </span>
            @endif

            <span class="hidden max-w-[130px] truncate text-xs font-bold text-gray-700 sm:block">
                {{ $user->name }}
            </span>
            <i data-lucide="chevron-down" class="hidden h-4 w-4 text-gray-400 sm:block"></i>
        </a>

    </div>
</nav>

<main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">

    <!-- BREADCRUMB -->
    <div class="mb-7 flex flex-wrap items-center gap-2 text-sm">
        <a href="{{ route('dashboard') }}" class="font-semibold text-gray-400 transition hover:text-emerald-600">
            Tableau de bord
        </a>
        <i data-lucide="chevron-right" class="h-4 w-4 text-gray-300"></i>
        <span class="font-bold text-gray-700">Mon profil</span>
    </div>

    <!-- PAGE HEADER -->
    <section class="mb-8 overflow-hidden rounded-3xl bg-[#083f30] text-white">
        <div class="relative px-6 py-8 sm:px-9 sm:py-10">
            <div class="absolute -right-12 -top-24 h-64 w-64 rounded-full border-[38px] border-white/[0.04]"></div>
            <div class="absolute -bottom-24 right-36 h-52 w-52 rounded-full bg-emerald-400/10 blur-3xl"></div>

            <div class="relative flex flex-col justify-between gap-6 sm:flex-row sm:items-center">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-3 py-1.5 text-xs font-semibold text-emerald-100">
                        <i data-lucide="user-round" class="h-4 w-4"></i>
                        Espace personnel
                    </div>

                    <h2 class="text-2xl font-extrabold tracking-tight sm:text-3xl">
                        Mon profil
                        <span class="mt-1 block text-base font-medium text-emerald-100/75 sm:inline sm:pl-2">
                            / ملفي الشخصي
                        </span>
                    </h2>

                    <p class="mt-3 max-w-xl text-sm leading-7 text-emerald-50/75">
                        Gérez vos informations personnelles, votre photo et la sécurité de votre compte.
                    </p>
                </div>

                <a href="{{ route('dashboard') }}"
                   class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-4 py-3 text-sm font-bold transition hover:bg-white/15">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Retour au tableau de bord
                </a>
            </div>
        </div>
    </section>

    <!-- SUCCESS MESSAGE -->
    @if(session('status'))
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100">
                <i data-lucide="check-circle-2" class="h-5 w-5"></i>
            </div>
            <div>
                <p class="font-bold">Opération réussie</p>
                <p class="mt-1 text-sm">{{ session('status') }}</p>
            </div>
        </div>
    @endif

    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <div class="mb-2 flex items-center gap-2 font-bold">
                <i data-lucide="alert-circle" class="h-5 w-5"></i>
                Vérifiez les informations saisies
            </div>
            <ul class="list-inside list-disc space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-[300px_minmax(0,1fr)]">

        <!-- LEFT: PROFILE CARD -->
        <aside class="space-y-6">

            <section class="profile-card overflow-hidden">
                <div class="h-20 bg-gradient-to-r from-emerald-700 via-emerald-500 to-green-300"></div>

                <div class="px-5 pb-6">
                    <div class="-mt-12 mb-4 flex items-end justify-between">
                        <div class="avatar-ring flex h-24 w-24 items-center justify-center overflow-hidden rounded-full bg-emerald-100">
                            <img id="profilePhotoPreview"
                                 src="{{ $photoUrl ?? '' }}"
                                 alt="Photo de profil"
                                 class="{{ $photoUrl ? 'block' : 'hidden' }} h-full w-full object-cover">

                            <span id="profilePhotoInitial"
                                  class="{{ $photoUrl ? 'hidden' : 'flex' }} h-full w-full items-center justify-center text-3xl font-extrabold text-emerald-700">
                                {{ $initial }}
                            </span>
                        </div>

                        <span class="mb-1 inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1.5 text-[10px] font-extrabold uppercase tracking-wide text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Compte actif
                        </span>
                    </div>

                    <h3 class="break-words text-xl font-extrabold text-gray-900">
                        {{ $user->name }}
                    </h3>

                    <p class="mt-1 break-all text-sm text-gray-500">
                        {{ $user->email }}
                    </p>

                    <div class="my-5 h-px bg-gray-100"></div>

                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50">
                            <i data-lucide="shield-check" class="h-4 w-4 text-emerald-700"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Compte personnel</p>
                            <p class="mt-1 text-xs leading-5 text-gray-400">
                                Gardez vos informations et votre mot de passe à jour.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- PHOTO UPLOAD -->
            <section class="profile-card p-5 sm:p-6">
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50">
                        <i data-lucide="camera" class="h-5 w-5 text-emerald-700"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-900">Photo de profil</h3>
                        <p class="mt-1 text-xs text-gray-400">Personnalisez votre espace</p>
                    </div>
                </div>

                <form action="{{ route('profile.photo.update') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      id="photoUploadForm">
                    @csrf

                    <label for="profile_photo"
                           class="photo-button flex cursor-pointer flex-col items-center rounded-2xl border-2 border-dashed border-emerald-200 bg-emerald-50/60 px-4 py-6 text-center hover:border-emerald-400 hover:bg-emerald-50">
                        <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-2xl bg-white shadow-sm">
                            <i data-lucide="image-plus" class="h-6 w-6 text-emerald-600"></i>
                        </div>

                        <span class="text-sm font-extrabold text-gray-800">Choisir une image</span>
                        <span class="mt-2 text-xs text-gray-500">JPG, PNG ou WEBP · 2 Mo maximum</span>

                        <input id="profile_photo"
                               name="profile_photo"
                               type="file"
                               accept="image/jpeg,image/png,image/webp"
                               class="hidden"
                               required>
                    </label>

                    <p id="selectedPhotoName" class="mt-3 hidden break-all text-xs font-semibold text-emerald-700"></p>

                    @error('profile_photo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                            class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-emerald-700">
                        <i data-lucide="upload" class="h-4 w-4"></i>
                        Enregistrer la photo
                    </button>
                </form>

                @if($photoUrl)
                    <form action="{{ route('profile.photo.destroy') }}" method="POST" class="mt-3"
                          onsubmit="return confirm('Voulez-vous vraiment supprimer votre photo de profil ?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-red-100 bg-white px-4 py-3 text-sm font-bold text-red-600 transition hover:bg-red-50">
                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                            Supprimer la photo
                        </button>
                    </form>
                @endif

                <p class="mt-4 text-xs leading-6 text-gray-400">
                    Votre photo sera affichée sur votre espace personnel après son enregistrement.
                </p>
            </section>

        </aside>

        <!-- RIGHT: PROFILE SETTINGS -->
        <div class="min-w-0 space-y-6">

            <!-- PERSONAL INFORMATION -->
            <section class="profile-card overflow-hidden">
                <div class="flex items-center gap-4 border-b border-gray-100 px-5 py-5 sm:px-7">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-50">
                        <i data-lucide="user-round" class="h-6 w-6 text-emerald-700"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-extrabold text-gray-900">Informations personnelles</h3>
                        <p class="mt-1 text-sm text-gray-500">Modifiez votre nom et vos coordonnées.</p>
                    </div>
                </div>

                <div class="profile-content p-5 sm:p-7">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            <!-- PASSWORD -->
            <section class="profile-card overflow-hidden">
                <div class="flex items-center gap-4 border-b border-gray-100 px-5 py-5 sm:px-7">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-50">
                        <i data-lucide="lock-keyhole" class="h-6 w-6 text-blue-700"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-extrabold text-gray-900">Sécurité du compte</h3>
                        <p class="mt-1 text-sm text-gray-500">Modifiez votre mot de passe.</p>
                    </div>
                </div>

                <div class="profile-content p-5 sm:p-7">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            <!-- DELETE ACCOUNT -->
            <section class="overflow-hidden rounded-[22px] border border-red-100 bg-white shadow-sm">
                <div class="flex items-center gap-4 border-b border-red-100 bg-red-50/60 px-5 py-5 sm:px-7">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-red-100">
                        <i data-lucide="shield-alert" class="h-6 w-6 text-red-600"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-extrabold text-gray-900">Supprimer le compte</h3>
                        <p class="mt-1 text-sm text-gray-500">Cette action peut être définitive.</p>
                    </div>
                </div>

                <div class="profile-content p-5 sm:p-7">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="mt-10 flex flex-col items-center justify-between gap-3 border-t border-gray-200 py-6 text-xs text-gray-400 sm:flex-row">
        <a href="{{ route('home') }}" class="font-extrabold text-gray-700">
            Étude<span class="text-emerald-600">EnLigne</span>
        </a>
        <p>© {{ date('Y') }} ÉtudeEnLigne. Tous droits réservés.</p>
        <p dir="rtl">منصة للتعلم والتكوين</p>
    </footer>

</main>

<script>
    lucide.createIcons();

    const photoInput = document.getElementById('profile_photo');
    const photoPreview = document.getElementById('profilePhotoPreview');
    const photoInitial = document.getElementById('profilePhotoInitial');
    const photoName = document.getElementById('selectedPhotoName');
    const photoForm = document.getElementById('photoUploadForm');

    let previewUrl = null;

    photoInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        const maxSize = 2 * 1024 * 1024;

        if (!allowedTypes.includes(file.type)) {
            alert('Choisissez une image JPG, PNG ou WEBP.');
            this.value = '';
            return;
        }

        if (file.size > maxSize) {
            alert('La taille de l’image ne doit pas dépasser 2 Mo.');
            this.value = '';
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        photoPreview.src = previewUrl;
        photoPreview.classList.remove('hidden');
        photoPreview.classList.add('block');
        photoInitial.classList.add('hidden');
        photoName.textContent = file.name;
        photoName.classList.remove('hidden');
    });

    photoForm.addEventListener('submit', function (event) {
        if (!photoInput.files.length) {
            event.preventDefault();
            alert('Veuillez choisir une photo avant de continuer.');
        }
    });
</script>

</body>
</html>
