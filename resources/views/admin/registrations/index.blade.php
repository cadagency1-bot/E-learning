
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscriptions | ÉtudeEnLigne</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
        }

        .table-scroll {
            overflow-x: auto;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 12px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
            cursor: pointer;
        }

        .action-button:hover {
            opacity: .85;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        [dir="rtl"] body {
            font-family: Tahoma, Arial, sans-serif;
        }

        [dir="rtl"] .text-left {
            text-align: right;
        }

        [dir="rtl"] .search-icon {
            left: auto;
            right: 12px;
        }

        [dir="rtl"] .search-input {
            padding-left: 12px;
            padding-right: 38px;
        }
    </style>
</head>

<body class="text-slate-800">

<div class="min-h-screen">

    <!-- HEADER -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 py-4
                    flex flex-wrap items-center justify-between gap-4">

            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-emerald-100
                            text-emerald-700 flex items-center justify-center">
                    <i data-lucide="graduation-cap"></i>
                </div>

                <div>
                    <h1 class="text-lg sm:text-xl font-bold">ÉtudeEnLigne</h1>
                    <p class="text-xs text-slate-500" data-i18n="admin_area">
                        Espace administrateur
                    </p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2">

                <!-- LANGUAGE BUTTON -->
                <button type="button"
                        onclick="toggleLanguage()"
                        class="action-button border border-emerald-200
                               bg-emerald-50 text-emerald-700">
                    <i data-lucide="languages" class="w-4 h-4"></i>
                    <span id="languageButton">العربية</span>
                </button>

                <a href="{{ route('admin.dashboard') }}"
                   class="action-button bg-slate-100 text-slate-700">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span data-i18n="dashboard">Tableau de bord</span>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="action-button bg-red-50 text-red-600">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span data-i18n="logout">Déconnexion</span>
                    </button>
                </form>

            </div>
        </div>
    </header>

    <main class="max-w-[1600px] mx-auto px-4 sm:px-6 py-7">

        <!-- PAGE TITLE -->
        <div class="mb-7">
            <p class="text-sm text-emerald-700 font-semibold mb-2"
               data-i18n="admin_label">
                ESPACE ADMINISTRATEUR
            </p>

            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight"
                data-i18n="page_title">
                Inscriptions et formations
            </h2>

            <p class="text-sm text-slate-500 mt-2"
               data-i18n="page_subtitle">
                Gérez les inscriptions et activez les formations directement depuis la ligne de chaque étudiant.
            </p>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-5 rounded-xl border border-emerald-200
                        bg-emerald-50 p-4 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-5 rounded-xl border border-red-200
                        bg-red-50 p-4 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <!-- STATISTICS -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-7">

            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center justify-between gap-2">
                    <p class="text-sm text-slate-500" data-i18n="total_students">
                        Total étudiants
                    </p>
                    <i data-lucide="users" class="text-blue-600 w-5 h-5"></i>
                </div>
                <p class="text-3xl font-bold mt-3">
                    {{ $registrations->count() }}
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center justify-between gap-2">
                    <p class="text-sm text-slate-500" data-i18n="pending">
                        En attente
                    </p>
                    <i data-lucide="clock" class="text-amber-500 w-5 h-5"></i>
                </div>
                <p class="text-3xl font-bold mt-3">
                    {{ $registrations->where('status', 'pending')->count() }}
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center justify-between gap-2">
                    <p class="text-sm text-slate-500" data-i18n="accepted">
                        Acceptés
                    </p>
                    <i data-lucide="check-circle" class="text-emerald-600 w-5 h-5"></i>
                </div>
                <p class="text-3xl font-bold mt-3">
                    {{ $registrations->whereIn('status', ['accepted', 'confirmed'])->count() }}
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center justify-between gap-2">
                    <p class="text-sm text-slate-500" data-i18n="activated_formations">
                        Formations activées
                    </p>
                    <i data-lucide="book-open" class="text-purple-600 w-5 h-5"></i>
                </div>
                <p class="text-3xl font-bold mt-3">
                    {{ $registrations->sum(fn($student) => $student->formations->where('pivot.status', 'active')->count()) }}
                </p>
            </div>

        </div>

        <!-- STUDENTS TABLE -->
        <section class="bg-white rounded-2xl border border-slate-200 shadow-sm">

            <div class="p-5 sm:p-6 border-b border-slate-100
                        flex flex-col md:flex-row md:items-center
                        md:justify-between gap-4">

                <div>
                    <h3 class="font-bold text-lg" data-i18n="students_list">
                        Liste des étudiants
                    </h3>
                    <p class="text-sm text-slate-500 mt-1"
                       data-i18n="table_subtitle">
                        Gérez les inscriptions et les formations sur une seule ligne.
                    </p>
                </div>

                <div class="relative w-full md:w-96">
                    <i data-lucide="search"
                       class="search-icon w-4 h-4 absolute left-3 top-1/2
                              -translate-y-1/2 text-slate-400"></i>

                    <input id="searchInput"
                           type="text"
                           data-i18n-placeholder="search_placeholder"
                           placeholder="Rechercher un étudiant ou une formation..."
                           class="search-input w-full border border-slate-200
                                  rounded-xl pl-9 pr-4 py-3 text-sm outline-none
                                  focus:border-emerald-500">
                </div>
            </div>

            <div class="table-scroll">
                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-5 py-4 font-semibold" data-i18n="student">
                                Étudiant
                            </th>
                            <th class="px-5 py-4 font-semibold" data-i18n="registration">
                                Inscription
                            </th>
                            <th class="px-5 py-4 font-semibold" data-i18n="requested_formation">
                                Formation demandée
                            </th>
                            <th class="px-5 py-4 font-semibold" data-i18n="formation_status">
                                Statut formation
                            </th>
                            <th class="px-5 py-4 font-semibold" data-i18n="actions">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody id="studentsTable" class="divide-y divide-slate-100">

                        @php
                            $statusLabels = [
                                'pending' => 'En attente',
                                'accepted' => 'Acceptée',
                                'confirmed' => 'Confirmée',
                                'rejected' => 'Refusée',
                            ];

                            $statusKeys = [
                                'pending' => 'status_pending',
                                'accepted' => 'status_accepted',
                                'confirmed' => 'status_confirmed',
                                'rejected' => 'status_rejected',
                            ];

                            $statusClasses = [
                                'pending' => 'bg-amber-100 text-amber-700',
                                'accepted' => 'bg-blue-100 text-blue-700',
                                'confirmed' => 'bg-emerald-100 text-emerald-700',
                                'rejected' => 'bg-red-100 text-red-700',
                            ];
                        @endphp

                        @forelse($registrations as $student)

                            @if($student->formations->isEmpty())

                                <tr class="student-row hover:bg-slate-50"
                                    data-search="{{ strtolower($student->name . ' ' . $student->email) }}">

                                    <td class="px-5 py-5 min-w-[220px]">
                                        <div class="font-bold text-slate-800">
                                            {{ $student->name }}
                                        </div>
                                        <div class="text-xs text-slate-500 mt-1">
                                            {{ $student->email }}
                                        </div>
                                        @if($student->whatsapp_phone)
                                            <div class="text-xs text-slate-500 mt-1">
                                                {{ $student->whatsapp_phone }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-5 py-5">
                                        <span class="status-badge {{ $statusClasses[$student->status] ?? 'bg-slate-100 text-slate-600' }}"
                                              data-i18n="{{ $statusKeys[$student->status] ?? 'status_pending' }}">
                                            {{ $statusLabels[$student->status] ?? $student->status }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-5 text-slate-400"
                                        data-i18n="no_formation">
                                        Aucune formation demandée
                                    </td>

                                    <td class="px-5 py-5">
                                        <span class="status-badge bg-slate-100 text-slate-500"
                                              data-i18n="not_available">
                                            Non disponible
                                        </span>
                                    </td>

                                    <td class="px-5 py-5">
                                        <div class="flex flex-wrap items-center gap-2 min-w-[250px]">

                                            @if($student->status === 'pending')
                                                <form action="{{ route('admin.registrations.accept', $student->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    <button class="action-button bg-emerald-100 text-emerald-700"
                                                            data-i18n="accept">
                                                        Accepter
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.registrations.reject', $student->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد رفض التسجيل؟' : 'Refuser cette inscription ?')">
                                                    @csrf
                                                    <button class="action-button bg-red-100 text-red-700"
                                                            data-i18n="reject">
                                                        Refuser
                                                    </button>
                                                </form>
                                            @endif

                                            @if($student->whatsapp_phone)
                                                <a href="https://wa.me/{{ preg_replace('/\D+/', '', $student->whatsapp_phone) }}"
                                                   target="_blank"
                                                   rel="noopener"
                                                   class="action-button bg-green-100 text-green-700">
                                                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                                                    WhatsApp
                                                </a>
                                            @endif

                                            <form action="{{ route('admin.registrations.destroy', $student->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد حذف هذا الطالب؟' : 'Supprimer cet étudiant ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-button bg-slate-100 text-slate-600"
                                                        data-i18n="delete">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @else

                                @foreach($student->formations as $formation)

                                    <tr class="student-row hover:bg-slate-50"
                                        data-search="{{ strtolower($student->name . ' ' . $student->email . ' ' . $formation->name) }}">

                                        <td class="px-5 py-5 min-w-[220px]">
                                            <div class="font-bold text-slate-800">
                                                {{ $student->name }}
                                            </div>
                                            <div class="text-xs text-slate-500 mt-1">
                                                {{ $student->email }}
                                            </div>
                                            @if($student->whatsapp_phone)
                                                <div class="text-xs text-slate-500 mt-1">
                                                    {{ $student->whatsapp_phone }}
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-5 py-5">
                                            <span class="status-badge {{ $statusClasses[$student->status] ?? 'bg-slate-100 text-slate-600' }}"
                                                  data-i18n="{{ $statusKeys[$student->status] ?? 'status_pending' }}">
                                                {{ $statusLabels[$student->status] ?? $student->status }}
                                            </span>
                                        </td>

                                        <td class="px-5 py-5 min-w-[200px]">
                                            <div class="font-semibold text-slate-700">
                                                {{ $formation->name }}
                                            </div>
                                        </td>

                                        <td class="px-5 py-5">
                                            @if($formation->pivot->status === 'active')
                                                <span class="status-badge bg-emerald-100 text-emerald-700"
                                                      data-i18n="activated">
                                                    Activée
                                                </span>
                                            @elseif($formation->pivot->status === 'rejected')
                                                <span class="status-badge bg-red-100 text-red-700"
                                                      data-i18n="formation_rejected">
                                                    Refusée
                                                </span>
                                            @else
                                                <span class="status-badge bg-amber-100 text-amber-700"
                                                      data-i18n="formation_pending">
                                                    En attente
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-5 py-5">
                                            <div class="flex flex-wrap items-center gap-2 min-w-[260px]">

                                                @if($student->status === 'pending')

                                                    <form action="{{ route('admin.registrations.accept', $student->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        <button class="action-button bg-emerald-100 text-emerald-700"
                                                                data-i18n="accept">
                                                            Accepter
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('admin.registrations.reject', $student->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد رفض التسجيل؟' : 'Refuser cette inscription ?')">
                                                        @csrf
                                                        <button class="action-button bg-red-100 text-red-700"
                                                                data-i18n="reject">
                                                            Refuser
                                                        </button>
                                                    </form>

                                                @elseif($student->status !== 'rejected')

                                                    @if($formation->pivot->status !== 'active')

                                                        <form action="{{ route('admin.formation-requests.activate', $formation->pivot->id) }}"
                                                              method="POST"
                                                              onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد تفعيل هذا التكوين؟' : 'Activer cette formation ?')">
                                                            @csrf
                                                            <button class="action-button bg-emerald-600 text-white">
                                                                <i data-lucide="check" class="w-4 h-4"></i>
                                                                <span data-i18n="activate_formation">Activer formation</span>
                                                            </button>
                                                        </form>

                                                    @else

                                                        <span class="action-button bg-emerald-50 text-emerald-700">
                                                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                                                            <span data-i18n="already_activated">Déjà activée</span>
                                                        </span>

                                                    @endif

                                                @endif

                                                @if($student->whatsapp_phone)
                                                    <a href="https://wa.me/{{ preg_replace('/\D+/', '', $student->whatsapp_phone) }}"
                                                       target="_blank"
                                                       rel="noopener"
                                                       class="action-button bg-green-100 text-green-700">
                                                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                                                        WhatsApp
                                                    </a>
                                                @endif

                                                <form action="{{ route('admin.registrations.destroy', $student->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد حذف هذا الطالب؟' : 'Supprimer cet étudiant ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="action-button bg-slate-100 text-slate-600"
                                                            data-i18n="delete">
                                                        Supprimer
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                            @endif

                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">
                                    <i data-lucide="users"
                                       class="w-10 h-10 mx-auto text-slate-300 mb-3"></i>
                                    <p class="font-semibold text-slate-700"
                                       data-i18n="no_students">
                                        Aucun étudiant trouvé
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="px-5 py-4 border-t border-slate-100
                        text-xs text-slate-500"
                 data-i18n="table_footer">
                Les actions et les formations sont regroupées sur une seule ligne.
            </div>

        </section>

    </main>
</div>

<script>
    window.currentLanguage = 'fr';

    const translations = {
        fr: {
            admin_area: "Espace administrateur",
            dashboard: "Tableau de bord",
            logout: "Déconnexion",
            admin_label: "ESPACE ADMINISTRATEUR",
            page_title: "Inscriptions et formations",
            page_subtitle: "Gérez les inscriptions et activez les formations directement depuis la ligne de chaque étudiant.",
            total_students: "Total étudiants",
            pending: "En attente",
            accepted: "Acceptés",
            activated_formations: "Formations activées",
            students_list: "Liste des étudiants",
            table_subtitle: "Gérez les inscriptions et les formations sur une seule ligne.",
            search_placeholder: "Rechercher un étudiant ou une formation...",
            student: "Étudiant",
            registration: "Inscription",
            requested_formation: "Formation demandée",
            formation_status: "Statut formation",
            actions: "Actions",
            status_pending: "En attente",
            status_accepted: "Acceptée",
            status_confirmed: "Confirmée",
            status_rejected: "Refusée",
            no_formation: "Aucune formation demandée",
            not_available: "Non disponible",
            accept: "Accepter",
            reject: "Refuser",
            delete: "Supprimer",
            activated: "Activée",
            formation_rejected: "Refusée",
            formation_pending: "En attente",
            activate_formation: "Activer formation",
            already_activated: "Déjà activée",
            no_students: "Aucun étudiant trouvé",
            table_footer: "Les actions et les formations sont regroupées sur une seule ligne."
        },

        ar: {
            admin_area: "فضاء الإدارة",
            dashboard: "لوحة التحكم",
            logout: "تسجيل الخروج",
            admin_label: "فضاء الإدارة",
            page_title: "التسجيلات والتكوينات",
            page_subtitle: "دبّري تسجيلات الطلبة وفعّلي التكوينات مباشرة من نفس السطر.",
            total_students: "مجموع الطلبة",
            pending: "في الانتظار",
            accepted: "التسجيلات المقبولة",
            activated_formations: "التكوينات المفعّلة",
            students_list: "قائمة الطلبة",
            table_subtitle: "تدبير التسجيلات والتكوينات من نفس السطر.",
            search_placeholder: "البحث عن طالب أو تكوين...",
            student: "الطالب",
            registration: "حالة التسجيل",
            requested_formation: "التكوين المطلوب",
            formation_status: "حالة التكوين",
            actions: "الإجراءات",
            status_pending: "في الانتظار",
            status_accepted: "مقبول",
            status_confirmed: "مؤكد",
            status_rejected: "مرفوض",
            no_formation: "لا يوجد تكوين مطلوب",
            not_available: "غير متوفر",
            accept: "قبول",
            reject: "رفض",
            delete: "حذف",
            activated: "مفعّل",
            formation_rejected: "مرفوض",
            formation_pending: "في الانتظار",
            activate_formation: "تفعيل التكوين",
            already_activated: "تم التفعيل",
            no_students: "لا يوجد طلبة",
            table_footer: "معلومات الطلبة والتكوينات والإجراءات موجودة في نفس السطر."
        }
    };

    function applyLanguage(language) {
        window.currentLanguage = language;

        const isArabic = language === 'ar';
        const dictionary = translations[language];

        document.documentElement.lang = language;
        document.documentElement.dir = isArabic ? 'rtl' : 'ltr';

        document.getElementById('languageButton').textContent =
            isArabic ? 'Français' : 'العربية';

        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.dataset.i18n;

            if (dictionary[key] !== undefined) {
                element.textContent = dictionary[key];
            }
        });

        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = element.dataset.i18nPlaceholder;

            if (dictionary[key] !== undefined) {
                element.placeholder = dictionary[key];
            }
        });

        const table = document.querySelector('table');

        if (table) {
            table.classList.toggle('text-right', isArabic);
            table.classList.toggle('text-left', !isArabic);
        }

        localStorage.setItem('etudierenligne_language', language);

        lucide.createIcons();
    }

    function toggleLanguage() {
        const nextLanguage =
            window.currentLanguage === 'fr' ? 'ar' : 'fr';

        applyLanguage(nextLanguage);
    }

    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', function () {
        const search = this.value.toLowerCase().trim();

        document.querySelectorAll('.student-row').forEach(row => {
            const content = (row.dataset.search || '').toLowerCase();
            row.style.display = content.includes(search) ? '' : 'none';
        });
    });

    const savedLanguage =
        localStorage.getItem('etudierenligne_language') || 'fr';

    applyLanguage(savedLanguage);
</script>

</body>
</html>
