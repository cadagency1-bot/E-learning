<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de formations | cad acadmey</title>

    <!-- Applique la langue enregistrée avant l'affichage (même clé que le tableau de bord) -->
    <script>
        try {
            if (localStorage.getItem('etudierenligne_admin_language') === 'ar') {
                document.documentElement.lang = 'ar';
                document.documentElement.dir = 'rtl';
            }
        } catch (e) {}
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --emerald: #10B981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --emerald-50: #ECFDF5;
            --emerald-100: #D1FAE5;
            --dark: #064E3B;
            --bg: #F5F8F7;
            --border: #E5E9E8;
            --text: #1F2937;
            --muted: #6B7280;
            --radius: 14px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        html[lang="ar"] body { font-family: 'Tajawal', 'Plus Jakarta Sans', Arial, sans-serif; }

        .page { max-width: 1100px; margin: 0 auto; padding: 22px 16px 48px; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }
        [dir="rtl"] .flip svg, [dir="rtl"] .flip i { transform: scaleX(-1); }

        /* ---------- Barre du haut ---------- */
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 22px; }
        .topbar-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .brand { display: flex; align-items: center; gap: 10px; color: var(--dark); font-size: 18px; font-weight: 800; text-decoration: none; }
        .brand-icon {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--emerald), var(--dark));
            color: #fff; display: grid; place-items: center;
            box-shadow: 0 5px 14px rgba(16, 185, 129, .3);
        }
        .brand-icon svg { width: 19px; height: 19px; }

        .lang-switch { display: inline-flex; gap: 2px; background: #fff; border: 1px solid var(--border); border-radius: 10px; padding: 3px; }
        .lang-switch button {
            border: none; background: transparent; color: var(--muted);
            padding: 7px 13px; border-radius: 7px; font-family: inherit;
            font-size: 12.5px; font-weight: 700; cursor: pointer; transition: all .15s;
        }
        .lang-switch button.active { background: var(--emerald-600); color: #fff; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 15px; border-radius: 10px; font-family: inherit; font-size: 13px; font-weight: 700;
            text-decoration: none; cursor: pointer; border: 1px solid transparent; transition: all .15s ease;
        }
        .btn-light { background: #fff; color: var(--emerald-700); border-color: var(--border); }
        .btn-light:hover { background: var(--emerald-50); border-color: var(--emerald-100); }

        /* ---------- En-tête ---------- */
        .header { margin-bottom: 18px; }
        .header h1 { font-size: 22px; font-weight: 800; color: var(--dark); letter-spacing: -.3px; }
        .header p { margin-top: 4px; color: var(--muted); font-size: 13px; line-height: 1.6; }

        /* ---------- Alertes ---------- */
        .alert { display: flex; gap: 12px; padding: 12px 15px; border-radius: 12px; margin-bottom: 14px; line-height: 1.55; font-size: 13px; font-weight: 600; }
        .alert svg { margin-top: 2px; }
        .alert-success { background: var(--emerald-50); border: 1px solid #A7F3D0; color: #065F46; }
        .alert-error { background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; }

        /* ---------- Statistique ---------- */
        .stat {
            display: inline-flex; align-items: center; gap: 12px;
            background: #fff; border: 1px solid var(--border); border-radius: var(--radius);
            padding: 12px 18px; margin-bottom: 18px; box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
        }
        .stat-icon { width: 38px; height: 38px; border-radius: 10px; background: var(--emerald-50); color: var(--emerald-600); display: grid; place-items: center; }
        .stat-icon svg { width: 19px; height: 19px; }
        .stat-number { font-size: 20px; font-weight: 800; line-height: 1.1; }
        .stat-text { font-size: 12px; color: var(--muted); margin-top: 2px; }

        /* ---------- Cartes ---------- */
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        .card {
            display: flex; flex-direction: column; min-width: 0;
            background: #fff; border: 1px solid var(--border); border-radius: var(--radius);
            padding: 18px; box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
            transition: border-color .2s, box-shadow .2s, transform .2s;
        }
        .card:hover { border-color: #A7F3D0; box-shadow: 0 10px 24px rgba(15, 23, 42, .07); transform: translateY(-2px); }

        .student { display: flex; align-items: center; gap: 12px; margin-bottom: 14px; min-width: 0; }
        .avatar {
            width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
            background: var(--emerald-50); color: var(--emerald-600);
            display: grid; place-items: center; font-weight: 800; font-size: 17px;
        }
        .student div { min-width: 0; }
        .student h3 { font-size: 14.5px; font-weight: 800; color: var(--dark); overflow-wrap: anywhere; }
        .student p { font-size: 12px; color: var(--muted); overflow-wrap: anywhere; margin-top: 2px; }

        .formation-box { background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 12px 14px; margin-bottom: 14px; }
        .formation-label { font-size: 10.5px; font-weight: 700; letter-spacing: .3px; color: var(--muted); margin-bottom: 5px; }
        .formation-name { display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 800; color: var(--dark); overflow-wrap: anywhere; }
        .formation-name svg { color: var(--emerald-600); }
        .phone { display: flex; align-items: center; gap: 6px; margin-top: 7px; font-size: 12px; color: var(--muted); }
        .phone svg { width: 13px; height: 13px; }

        .status { display: inline-flex; align-items: center; gap: 6px; width: fit-content; padding: 5px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 700; margin-bottom: 14px; }
        .status svg { width: 13px; height: 13px; }
        .status-pending { background: #FFF7ED; color: #C2410C; }
        .status-active { background: var(--emerald-50); color: var(--emerald-700); }
        .status-rejected { background: #FEF2F2; color: #B91C1C; }

        .actions { display: flex; gap: 8px; margin-top: auto; }
        .actions form { flex: 1; display: flex; margin: 0; }
        .button {
            flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
            height: 40px; border: none; border-radius: 10px; font-family: inherit; font-size: 12.5px; font-weight: 700;
            cursor: pointer; transition: all .15s;
        }
        .button svg { width: 15px; height: 15px; }
        .activate { background: var(--emerald-600); color: #fff; }
        .activate:hover { background: var(--dark); }
        .reject { background: #FEE2E2; color: #B91C1C; }
        .reject:hover { background: #FECACA; }
        .missing-id { display: flex; gap: 8px; align-items: flex-start; margin-top: auto; padding: 10px 12px; border-radius: 10px; background: #FFFBEB; border: 1px solid #FDE68A; color: #92400E; font-size: 12px; line-height: 1.5; }

        /* ---------- État vide ---------- */
        .empty { padding: 48px 20px; text-align: center; background: #fff; border: 1.5px dashed #CBD5E1; border-radius: var(--radius); color: var(--muted); }
        .empty-icon { width: 56px; height: 56px; margin: 0 auto 14px; border-radius: 15px; background: var(--emerald-50); color: var(--emerald-600); display: grid; place-items: center; }
        .empty-icon svg { width: 26px; height: 26px; }

        @media (max-width: 950px) { .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 640px) {
            .page { padding: 14px 10px 36px; }
            .topbar-actions { width: 100%; justify-content: space-between; }
            .topbar-actions .btn { flex: 1; }
            .header h1 { font-size: 19px; }
            .grid { grid-template-columns: 1fr; gap: 12px; }
        }
    </style>
</head>

<body>
<div class="page">

    <!-- ===== BARRE DU HAUT ===== -->
    <div class="topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
            <span>CAd Acadmey</span>
        </a>

        <div class="topbar-actions">
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" data-lang-btn="fr" class="active">FR</button>
                <button type="button" data-lang-btn="ar">العربية</button>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-light flip">
                <i data-lucide="arrow-left"></i>
                <span data-i18n="back">Retour à l'administration</span>
            </a>
        </div>
    </div>

    <!-- ===== EN-TÊTE ===== -->
    <div class="header">
        <h1 data-i18n="title">Demandes de formations</h1>
        <p data-i18n="subtitle">Consultez les demandes des étudiants et gérez leur accès aux formations.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            <i data-lucide="alert-triangle"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    @if ($requests->count())

        <div class="stat">
            <div class="stat-icon"><i data-lucide="clipboard-list"></i></div>
            <div>
                <div class="stat-number">{{ $requests->count() }}</div>
                <div class="stat-text" data-i18n="statText">Demande(s) affichée(s)</div>
            </div>
        </div>

        <div class="grid">

            @foreach ($requests as $request)

                @php
                    // Protection : évite l'erreur « Missing required parameter [id] »
                    $requestId = $request->id ?? null;
                @endphp

                <div class="card">

                    <div class="student">
                        <div class="avatar">
                            {{ mb_strtoupper(mb_substr($request->user_name ?? '?', 0, 1)) }}
                        </div>
                        <div>
                            <h3>{{ $request->user_name }}</h3>
                            <p>{{ $request->user_email }}</p>
                        </div>
                    </div>

                    <div class="formation-box">
                        <div class="formation-label" data-i18n="requested">FORMATION DEMANDÉE</div>
                        <div class="formation-name">
                            <i data-lucide="graduation-cap"></i>
                            <span>{{ $request->formation_name }}</span>
                        </div>

                        @if ($request->whatsapp_phone)
                            <div class="phone">
                                <i data-lucide="phone"></i>
                                <span><span data-i18n="whatsapp">WhatsApp</span> : <bdi>{{ $request->whatsapp_phone }}</bdi></span>
                            </div>
                        @endif
                    </div>

                    @if ($request->status === 'pending')
                        <div class="status status-pending">
                            <i data-lucide="clock"></i>
                            <span data-i18n="pending">En attente</span>
                        </div>
                    @elseif ($request->status === 'active')
                        <div class="status status-active">
                            <i data-lucide="check-circle-2"></i>
                            <span data-i18n="active">Accès actif</span>
                        </div>
                    @else
                        <div class="status status-rejected">
                            <i data-lucide="x-circle"></i>
                            <span data-i18n="rejected">Refusée</span>
                        </div>
                    @endif

                    @if ($request->status === 'pending')

                        @if ($requestId)

                            <div class="actions">

                                <form
                                    method="POST"
                                    action="{{ route('admin.formation-requests.activate', $requestId) }}"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="button activate">
                                        <i data-lucide="check"></i>
                                        <span data-i18n="activate">Activer l'accès</span>
                                    </button>
                                </form>

                                <form
                                    method="POST"
                                    action="{{ route('admin.formation-requests.reject', $requestId) }}"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="button reject">
                                        <i data-lucide="x"></i>
                                        <span data-i18n="reject">Refuser</span>
                                    </button>
                                </form>

                            </div>

                        @else

                            <div class="missing-id">
                                <i data-lucide="alert-triangle"></i>
                                <span data-i18n="missingId">Identifiant de la demande introuvable : vérifiez que la requête du contrôleur sélectionne la colonne id de la demande.</span>
                            </div>

                        @endif

                    @endif

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">
            <div class="empty-icon"><i data-lucide="book-open"></i></div>
            <p data-i18n="empty">Aucune demande de formation pour le moment.</p>
        </div>

    @endif

</div>

<script>
    const translations = {
        fr: {
            back: "Retour à l'administration",
            title: 'Demandes de formations',
            subtitle: 'Consultez les demandes des étudiants et gérez leur accès aux formations.',
            statText: 'Demande(s) affichée(s)',
            requested: 'FORMATION DEMANDÉE',
            whatsapp: 'WhatsApp',
            pending: 'En attente',
            active: 'Accès actif',
            rejected: 'Refusée',
            activate: "Activer l'accès",
            reject: 'Refuser',
            missingId: "Identifiant de la demande introuvable : vérifiez que la requête du contrôleur sélectionne la colonne id de la demande.",
            empty: 'Aucune demande de formation pour le moment.'
        },
        ar: {
            back: 'العودة إلى الإدارة',
            title: 'طلبات التكوين',
            subtitle: 'اطلع على طلبات الطلبة وقم بتدبير ولوجهم إلى التكوينات.',
            statText: 'عدد الطلبات المعروضة',
            requested: 'التكوين المطلوب',
            whatsapp: 'واتساب',
            pending: 'قيد الانتظار',
            active: 'الولوج مفعّل',
            rejected: 'مرفوض',
            activate: 'تفعيل الولوج',
            reject: 'رفض',
            missingId: 'معرّف الطلب غير متوفر : تحقق من أن استعلام المتحكم يحدد عمود id الخاص بالطلب.',
            empty: 'لا توجد طلبات تكوين حالياً.'
        }
    };

    let currentLanguage = 'fr';
    try { currentLanguage = localStorage.getItem('etudierenligne_admin_language') || 'fr'; } catch (e) {}
    if (!translations[currentLanguage]) currentLanguage = 'fr';

    function applyLanguage(language, persist) {
        currentLanguage = language;
        const dictionary = translations[language];

        document.documentElement.lang = language;
        document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';
        document.title = language === 'ar'
            ? 'طلبات التكوين | ÉtudeEnLigne'
            : 'Demandes de formations | ÉtudeEnLigne';

        document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
            btn.classList.toggle('active', btn.dataset.langBtn === language);
        });

        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            const key = el.dataset.i18n;
            if (Object.prototype.hasOwnProperty.call(dictionary, key)) {
                el.textContent = dictionary[key];
            }
        });

        if (persist) {
            try { localStorage.setItem('etudierenligne_admin_language', language); } catch (e) {}
        }
    }

    document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            applyLanguage(this.dataset.langBtn, true);
        });
    });

    applyLanguage(currentLanguage, false);

    if (window.lucide) {
        lucide.createIcons();
    }
</script>
</body>
</html>