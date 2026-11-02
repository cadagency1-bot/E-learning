
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Certificats | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --red: #DC2626;
            --red-dark: #B91C1C;
            --red-light: #FEF2F2;
            --red-soft: #FEE2E2;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--white);
            color: var(--red-dark);
        }

        html[dir="rtl"] body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        html[dir="rtl"] .flip {
            display: inline-block;
            transform: scaleX(-1);
        }

        .lb {
            padding: 8px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            color: var(--red-dark);
            background: var(--white);
            transition: .2s;
            cursor: pointer;
        }

        .lb:hover,
        .lb.on {
            background: var(--red);
            color: var(--white);
        }

        .page-title {
            color: var(--red-dark);
        }

        .main-card {
            border: 1px solid var(--red-soft);
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(220, 38, 38, .07);
        }

        .table-head {
            background: var(--red);
            color: var(--white);
        }

        .table-row {
            border-bottom: 1px solid var(--red-soft);
            transition: background .2s;
        }

        .table-row:hover {
            background: var(--red-light);
        }

        .status-active {
            background: var(--red);
            color: var(--white);
        }

        .status-pending {
            background: var(--red-light);
            color: var(--red-dark);
            border: 1px solid var(--red-soft);
        }

        .btn-red {
            background: var(--red);
            color: var(--white);
            transition: .2s;
        }

        .btn-red:hover {
            background: var(--red-dark);
        }

        .btn-outline {
            border: 1px solid var(--red);
            color: var(--red);
            background: var(--white);
            transition: .2s;
        }

        .btn-outline:hover {
            background: var(--red-light);
        }

        .file-input {
            width: 100%;
            border: 1px solid var(--red-soft);
            background: var(--white);
            color: var(--red-dark);
            border-radius: 10px;
            padding: 9px;
            font-size: 12px;
        }

        .file-input::file-selector-button {
            background: var(--red-light);
            color: var(--red-dark);
            border: 1px solid var(--red-soft);
            border-radius: 7px;
            padding: 6px 10px;
            margin-inline-end: 8px;
            cursor: pointer;
        }

        .message {
            background: var(--red-light);
            color: var(--red-dark);
            border: 1px solid var(--red-soft);
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 18px;
        }

        .pagination-area nav {
            display: flex;
            justify-content: center;
        }

        .pagination-area nav div:first-child {
            color: var(--red-dark);
        }

        .pagination-area nav span,
        .pagination-area nav a {
            color: var(--red-dark) !important;
            border-color: var(--red-soft) !important;
        }

        .pagination-area nav a:hover {
            background: var(--red-light) !important;
        }

        .pagination-area nav span[aria-current="page"] span {
            background: var(--red) !important;
            color: var(--white) !important;
            border-color: var(--red) !important;
        }

        .pagination-area svg {
            fill: var(--red-dark);
        }

        input:focus {
            outline: 2px solid var(--red);
            outline-offset: 1px;
        }

        @media(max-width: 640px) {
            .page-header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body class="min-h-screen">

<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    {{-- En-tête --}}
    <div class="page-header mb-8 flex flex-wrap items-center justify-between gap-5">

        <div>
            <div class="mb-4 flex flex-wrap items-center gap-4">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold"
                   style="color:var(--red-dark)">
                    <span class="flip">←</span>
                    <span data-i18n="back">Retour au tableau de bord</span>
                </a>

                {{-- Sélecteur de langue --}}
                <div class="flex rounded-full border p-1"
                     style="background:var(--red-light);border-color:var(--red-soft)">
                    <button type="button" id="lang-fr" class="lb" aria-label="Français">FR</button>
                    <button type="button" id="lang-ar" class="lb" aria-label="العربية">عربي</button>
                </div>
            </div>

            <h1 class="page-title text-2xl font-bold sm:text-3xl" data-i18n="title">
                Gestion des certificats
            </h1>

            <p class="mt-2 text-sm font-medium" style="color:var(--red-dark)" data-i18n="subtitle">
                Importez le certificat PDF de l'étudiant, puis activez-le pour le rendre disponible.
            </p>
        </div>

        {{-- Compteur --}}
        <div class="rounded-2xl border px-6 py-4"
             style="background:var(--red-light);border-color:var(--red-soft)">
            <p class="text-sm font-semibold" style="color:var(--red-dark)" data-i18n="pending_count">
                Demandes en attente
            </p>

            <p class="mt-1 text-3xl font-bold" style="color:var(--red)">
                {{ $pendingCount }}
            </p>
        </div>

    </div>

    {{-- Messages --}}
    @if (session('success'))
        <div class="message">
            <span class="font-bold">✓ </span>{{ session('success') }}
        </div>
    @endif

    @if (session('info'))
        <div class="message">
            <span class="font-bold">ⓘ </span>{{ session('info') }}
        </div>
    @endif

    @if (session('error'))
        <div class="message">
            <span class="font-bold">! </span>{{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="message">
            <span class="font-bold">! </span>{{ $errors->first() }}
        </div>
    @endif

    {{-- Tableau --}}
    <div class="main-card">

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1200px] text-start text-sm">

                <thead class="table-head">
                    <tr>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_student">Étudiant</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_name">Nom sur le certificat</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_formation">Formation</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_number">N° du certificat</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_status">Statut</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_date">Date</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_pdf">Certificat PDF</th>
                        <th class="px-5 py-4 text-start font-bold" data-i18n="th_actions">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($certificates as $certificate)

                        <tr class="table-row align-top">

                            {{-- Étudiant --}}
                            <td class="px-5 py-4">
                                <div class="font-bold" style="color:var(--red-dark)">
                                    @if ($certificate->user)
                                        {{ $certificate->user->name }}
                                    @else
                                        <span data-i18n="deleted_student">Étudiant supprimé</span>
                                    @endif
                                </div>

                                <div class="mt-1 text-xs font-medium"
                                     style="color:var(--red)"
                                     dir="ltr"
                                     class="email-text">
                                    {{ $certificate->user->email ?? '' }}
                                </div>
                            </td>

                            {{-- Nom sur le certificat --}}
                            <td class="px-5 py-4 font-semibold" style="color:var(--red-dark)">
                                {{ $certificate->name_on_certificate }}
                            </td>

                            {{-- Formation --}}
                            <td class="px-5 py-4 font-medium" style="color:var(--red-dark)">
                                @if ($certificate->formation)
                                    {{ $certificate->formation->name }}
                                @else
                                    <span data-i18n="deleted_formation">Formation supprimée</span>
                                @endif
                            </td>

                            {{-- Numéro --}}
                            <td class="px-5 py-4 font-mono text-xs font-semibold"
                                style="color:var(--red-dark)"
                                dir="ltr">
                                {{ $certificate->certificate_number }}
                            </td>

                            {{-- Statut --}}
                            <td class="px-5 py-4">
                                @if ($certificate->status === 'active')
                                    <span class="status-active inline-flex rounded-full px-3 py-1 text-xs font-bold"
                                          data-i18n="status_active">
                                        Activé
                                    </span>
                                @else
                                    <span class="status-pending inline-flex rounded-full px-3 py-1 text-xs font-bold"
                                          data-i18n="status_pending">
                                        En attente
                                    </span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-4 text-xs font-semibold"
                                style="color:var(--red-dark)"
                                dir="ltr">
                                {{ $certificate->created_at?->format('d/m/Y H:i') ?? '—' }}
                            </td>

                            {{-- Upload / téléchargement PDF --}}
                            <td class="px-5 py-4">

                                <form
                                    action="{{ route('admin.certificates.upload', $certificate) }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="flex min-w-[220px] flex-col gap-3"
                                >
                                    @csrf

                                    <input
                                        type="file"
                                        name="certificate_file"
                                        accept=".pdf,application/pdf"
                                        required
                                        class="file-input"
                                    >

                                    <button
                                        type="submit"
                                        class="btn-red rounded-xl px-3 py-2 font-bold"
                                        data-i18n="upload_pdf"
                                    >
                                        Importer le PDF
                                    </button>
                                </form>

                                @if ($certificate->file_path)

                                    <a
                                        href="{{ route('admin.certificates.download', $certificate) }}"
                                        target="_blank"
                                        class="mt-3 inline-flex items-center gap-2 text-sm font-bold hover:underline"
                                        style="color:var(--red)"
                                    >
                                        ↓
                                        <span data-i18n="view_pdf">Voir / Télécharger PDF</span>
                                    </a>

                                @else

                                    <p class="mt-3 text-xs font-medium"
                                       style="color:var(--red-dark)"
                                       data-i18n="no_pdf">
                                        Aucun PDF importé
                                    </p>

                                @endif

                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-4">

                                @if ($certificate->status !== 'active')

                                    @if ($certificate->file_path)

                                        <form
                                            action="{{ route('admin.certificates.activate', $certificate) }}"
                                            method="POST"
                                            onsubmit="return confirm(window.T('confirm_activate'));"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn-red rounded-xl px-4 py-2 font-bold"
                                                data-i18n="activate"
                                            >
                                                Activer
                                            </button>
                                        </form>

                                    @else

                                        <span class="inline-block max-w-[150px] text-xs font-semibold"
                                              style="color:var(--red-dark)"
                                              data-i18n="import_first">
                                            Importez le PDF avant l'activation.
                                        </span>

                                    @endif

                                @else

                                    <div class="text-xs font-bold" style="color:var(--red)">
                                        <span data-i18n="activated_on">Activé le</span>

                                        <span dir="ltr">
                                            {{ $certificate->activated_at?->format('d/m/Y') ?? '—' }}
                                        </span>
                                    </div>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-5 py-14 text-center">

                                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full"
                                     style="background:var(--red-light);color:var(--red)">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="28" height="28"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8">
                                        <path d="M7 3h7l5 5v13H7z"/>
                                        <path d="M14 3v5h5"/>
                                        <path d="M10 13h6M10 17h6"/>
                                    </svg>
                                </div>

                                <p class="font-bold" style="color:var(--red-dark)" data-i18n="empty_title">
                                    Aucune demande de certificat
                                </p>

                                <p class="mt-2 text-sm font-medium"
                                   style="color:var(--red)"
                                   data-i18n="empty_text">
                                    Les demandes apparaîtront ici lorsque les étudiants rempliront les conditions.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($certificates->hasPages())
            <div class="pagination-area border-t px-5 py-4"
                 style="border-color:var(--red-soft)">
                {{ $certificates->links() }}
            </div>
        @endif

    </div>

</div>

<script>
const I18N = {
    fr: {
        back: 'Retour au tableau de bord',
        title: 'Gestion des certificats',
        subtitle: "Importez le certificat PDF de l'étudiant, puis activez-le pour le rendre disponible.",
        pending_count: 'Demandes en attente',
        th_student: 'Étudiant',
        th_name: 'Nom sur le certificat',
        th_formation: 'Formation',
        th_number: 'N° du certificat',
        th_status: 'Statut',
        th_date: 'Date',
        th_pdf: 'Certificat PDF',
        th_actions: 'Actions',
        deleted_student: 'Étudiant supprimé',
        deleted_formation: 'Formation supprimée',
        status_active: 'Activé',
        status_pending: 'En attente',
        upload_pdf: 'Importer le PDF',
        view_pdf: 'Voir / Télécharger PDF',
        no_pdf: 'Aucun PDF importé',
        activate: 'Activer',
        import_first: "Importez le PDF avant l'activation.",
        activated_on: 'Activé le',
        empty_title: 'Aucune demande de certificat',
        empty_text: 'Les demandes apparaîtront ici lorsque les étudiants rempliront les conditions.',
        confirm_activate: 'Voulez-vous activer ce certificat ?'
    },

    ar: {
        back: 'العودة إلى لوحة التحكم',
        title: 'تدبير الشهادات',
        subtitle: 'ارفع شهادة الطالب بصيغة PDF، ثم فعّلها لتصبح متاحة له.',
        pending_count: 'الطلبات قيد الانتظار',
        th_student: 'الطالب',
        th_name: 'الاسم على الشهادة',
        th_formation: 'التكوين',
        th_number: 'رقم الشهادة',
        th_status: 'الحالة',
        th_date: 'التاريخ',
        th_pdf: 'شهادة PDF',
        th_actions: 'الإجراءات',
        deleted_student: 'طالب محذوف',
        deleted_formation: 'تكوين محذوف',
        status_active: 'مفعّلة',
        status_pending: 'قيد الانتظار',
        upload_pdf: 'رفع ملف PDF',
        view_pdf: 'عرض / تحميل PDF',
        no_pdf: 'لم يتم رفع أي ملف PDF',
        activate: 'تفعيل',
        import_first: 'ارفع ملف PDF قبل التفعيل.',
        activated_on: 'تم التفعيل في',
        empty_title: 'لا توجد طلبات شهادات',
        empty_text: 'ستظهر الطلبات هنا عندما يستوفي الطلبة الشروط.',
        confirm_activate: 'هل تريد تفعيل هذه الشهادة؟'
    }
};

const LANGUAGE_KEY = 'etudierenligne_admin_language';

let lang = 'fr';

try {
    lang = localStorage.getItem(LANGUAGE_KEY) === 'ar' ? 'ar' : 'fr';
} catch (e) {
    lang = 'fr';
}

window.T = function (key) {
    return (I18N[lang] && I18N[lang][key]) || I18N.fr[key] || key;
};

function setLang(language) {
    lang = language;

    try {
        localStorage.setItem(LANGUAGE_KEY, language);
    } catch (e) {}

    document.documentElement.lang = language;
    document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';

    document.querySelectorAll('[data-i18n]').forEach(function (element) {
        const value = I18N[language][element.dataset.i18n];

        if (value) {
            element.textContent = value;
        }
    });

    document.getElementById('lang-fr').classList.toggle('on', language === 'fr');
    document.getElementById('lang-ar').classList.toggle('on', language === 'ar');
}

document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('lang-fr').addEventListener('click', function () {
        setLang('fr');
    });

    document.getElementById('lang-ar').addEventListener('click', function () {
        setLang('ar');
    });

    setLang(lang);
});
</script>

</body>
</html>
