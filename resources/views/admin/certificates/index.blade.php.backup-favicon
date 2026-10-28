<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificats | ÉtudeEnLigne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html[dir=rtl] body{font-family:'IBM Plex Sans Arabic',system-ui,sans-serif}
        html[dir=rtl] .flip{display:inline-block;transform:scaleX(-1)}
        .lb{padding:6px 16px;border-radius:999px;font-size:12.5px;font-weight:700;color:#475569;transition:.2s}
        .lb.on{background:#047857;color:#fff}
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    {{-- En-tête --}}
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <div class="mb-3 flex flex-wrap items-center gap-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center gap-2 text-sm text-emerald-700 hover:underline">
                    <span class="flip">←</span> <span data-i18n="back">Retour au tableau de bord</span>
                </a>

                {{-- Sélecteur de langue --}}
                <div class="flex rounded-full bg-slate-200 p-1">
                    <button type="button" id="lang-fr" class="lb" aria-label="Français">FR</button>
                    <button type="button" id="lang-ar" class="lb" aria-label="العربية">عربي</button>
                </div>
            </div>

            <h1 class="text-2xl font-bold sm:text-3xl" data-i18n="title">
                Gestion des certificats
            </h1>

            <p class="mt-2 text-sm text-slate-500" data-i18n="subtitle">
                Importez le certificat PDF de l'étudiant, puis activez-le pour le rendre disponible.
            </p>
        </div>

        <div class="rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">
            <p class="text-sm text-amber-800" data-i18n="pending_count">Demandes en attente</p>
            <p class="mt-1 text-2xl font-bold text-amber-900">
                {{ $pendingCount }}
            </p>
        </div>
    </div>

    {{-- Messages --}}
    @if (session('success'))
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('info'))
        <div class="mb-5 rounded-xl border border-sky-200 bg-sky-50 p-4 text-sky-800">
            {{ session('info') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Tableau --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1200px] text-start text-sm">

                <thead class="bg-slate-100 text-slate-600">
                    <tr>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_student">Étudiant</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_name">Nom sur le certificat</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_formation">Formation</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_number">N° du certificat</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_status">Statut</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_date">Date</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_pdf">Certificat PDF</th>
                        <th class="px-5 py-4 text-start font-semibold" data-i18n="th_actions">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($certificates as $certificate)

                        <tr class="align-top hover:bg-slate-50">

                            {{-- Étudiant --}}
                            <td class="px-5 py-4">
                                <div class="font-semibold text-slate-800">
                                    @if ($certificate->user)
                                        {{ $certificate->user->name }}
                                    @else
                                        <span data-i18n="deleted_student">Étudiant supprimé</span>
                                    @endif
                                </div>

                                <div class="mt-1 text-xs text-slate-500" dir="ltr" style="unicode-bidi:plaintext">
                                    {{ $certificate->user->email ?? '' }}
                                </div>
                            </td>

                            {{-- Nom du certificat --}}
                            <td class="px-5 py-4 font-medium">
                                {{ $certificate->name_on_certificate }}
                            </td>

                            {{-- Formation --}}
                            <td class="px-5 py-4">
                                @if ($certificate->formation)
                                    {{ $certificate->formation->name }}
                                @else
                                    <span data-i18n="deleted_formation">Formation supprimée</span>
                                @endif
                            </td>

                            {{-- Numéro --}}
                            <td class="px-5 py-4 font-mono text-xs" dir="ltr" style="unicode-bidi:plaintext">
                                {{ $certificate->certificate_number }}
                            </td>

                            {{-- Statut --}}
                            <td class="px-5 py-4">
                                @if ($certificate->status === 'active')
                                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700" data-i18n="status_active">
                                        Activé
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800" data-i18n="status_pending">
                                        En attente
                                    </span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-4 text-slate-500" dir="ltr" style="unicode-bidi:plaintext">
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
                                        class="block w-full rounded-lg border border-slate-300 bg-white p-2 text-xs"
                                    >

                                    <button
                                        type="submit"
                                        class="rounded-xl bg-blue-600 px-3 py-2 font-semibold text-white transition hover:bg-blue-700"
                                        data-i18n="upload_pdf"
                                    >
                                        Importer le PDF
                                    </button>
                                </form>

                                @if ($certificate->file_path)
                                    <a
                                        href="{{ route('admin.certificates.download', $certificate) }}"
                                        target="_blank"
                                        class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:underline"
                                    >
                                        ↓ <span data-i18n="view_pdf">Voir / Télécharger PDF</span>
                                    </a>
                                @else
                                    <p class="mt-3 text-xs text-slate-500" data-i18n="no_pdf">
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
                                                class="rounded-xl bg-emerald-600 px-4 py-2 font-semibold text-white transition hover:bg-emerald-700"
                                                data-i18n="activate"
                                            >
                                                Activer
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-block max-w-[150px] text-xs text-amber-700" data-i18n="import_first">
                                            Importez le PDF avant l'activation.
                                        </span>
                                    @endif

                                @else

                                    <div class="text-xs font-semibold text-emerald-700">
                                        <span data-i18n="activated_on">Activé le</span>
                                        <span dir="ltr" style="unicode-bidi:plaintext">{{ $certificate->activated_at?->format('d/m/Y') ?? '—' }}</span>
                                    </div>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center">
                                <p class="font-semibold text-slate-700" data-i18n="empty_title">
                                    Aucune demande de certificat
                                </p>

                                <p class="mt-2 text-sm text-slate-500" data-i18n="empty_text">
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
            <div class="border-t border-slate-100 px-5 py-4">
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

let lang = 'fr';
try { lang = localStorage.getItem('admin-lang') === 'ar' ? 'ar' : 'fr'; } catch (e) {}

window.T = function (key) { return (I18N[lang] && I18N[lang][key]) || I18N.fr[key] || key; };

function setLang(l) {
    lang = l;
    try { localStorage.setItem('admin-lang', l); } catch (e) {}
    document.documentElement.lang = l;
    document.documentElement.dir = l === 'ar' ? 'rtl' : 'ltr';
    document.querySelectorAll('[data-i18n]').forEach(function (el) {
        var v = I18N[l][el.dataset.i18n];
        if (v) el.textContent = v;
    });
    document.getElementById('lang-fr').classList.toggle('on', l === 'fr');
    document.getElementById('lang-ar').classList.toggle('on', l === 'ar');
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('lang-fr').addEventListener('click', function () { setLang('fr'); });
    document.getElementById('lang-ar').addEventListener('click', function () { setLang('ar'); });
    setLang(lang);
});
</script>

</body>
</html>