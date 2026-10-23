<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions | ÉtudeEnLigne</title>

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

        .page { max-width: 1400px; margin: 0 auto; padding: 22px 16px 48px; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }

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

        /* ---------- Boutons ---------- */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 7px;
            padding: 9px 13px; border-radius: 9px; font-family: inherit; font-size: 12.5px; font-weight: 700;
            text-decoration: none; cursor: pointer; border: 1px solid transparent; white-space: nowrap; transition: all .15s ease;
        }
        .btn svg { width: 15px; height: 15px; }
        .btn-light { background: #fff; color: var(--emerald-700); border-color: var(--border); }
        .btn-light:hover { background: var(--emerald-50); border-color: var(--emerald-100); }
        .btn-logout { background: #FEF2F2; color: #DC2626; }
        .btn-logout:hover { background: #FEE2E2; }
        .btn-accept { background: var(--emerald-100); color: var(--emerald-700); }
        .btn-accept:hover { background: #A7F3D0; }
        .btn-reject { background: #FEE2E2; color: #B91C1C; }
        .btn-reject:hover { background: #FECACA; }
        .btn-activate { background: var(--emerald-600); color: #fff; }
        .btn-activate:hover { background: var(--dark); }
        .btn-whatsapp { background: #DCFCE7; color: #15803D; }
        .btn-whatsapp:hover { background: #BBF7D0; }
        .btn-delete { background: #F1F5F9; color: #475569; }
        .btn-delete:hover { background: #E2E8F0; }
        .btn-done { background: var(--emerald-50); color: var(--emerald-700); cursor: default; }
        .btn-warn { background: #FFFBEB; color: #92400E; border-color: #FDE68A; cursor: default; white-space: normal; }

        /* ---------- En-tête ---------- */
        .header { margin-bottom: 18px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 999px; background: var(--emerald-50); border: 1px solid var(--emerald-100); color: var(--emerald-700); font-size: 11px; font-weight: 800; letter-spacing: .3px; }
        .header h1 { margin-top: 10px; font-size: 24px; font-weight: 800; color: var(--dark); letter-spacing: -.3px; }
        .header p { margin-top: 4px; color: var(--muted); font-size: 13px; line-height: 1.6; }

        /* ---------- Alertes ---------- */
        .alert { display: flex; gap: 12px; padding: 12px 15px; border-radius: 12px; margin-bottom: 14px; line-height: 1.55; font-size: 13px; font-weight: 600; }
        .alert svg { margin-top: 2px; }
        .alert-success { background: var(--emerald-50); border: 1px solid #A7F3D0; color: #065F46; }
        .alert-error { background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; }

        /* ---------- Statistiques ---------- */
        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; margin-bottom: 18px; }
        .stat-card { display: flex; align-items: center; gap: 12px; background: #fff; border: 1px solid var(--border); border-radius: var(--radius); padding: 14px 16px; box-shadow: 0 2px 10px rgba(15, 23, 42, .04); }
        .stat-icon { width: 40px; height: 40px; border-radius: 11px; display: grid; place-items: center; flex-shrink: 0; }
        .stat-icon svg { width: 20px; height: 20px; }
        .ic-blue { background: #EFF6FF; color: #2563EB; }
        .ic-amber { background: #FFFBEB; color: #D97706; }
        .ic-green { background: var(--emerald-50); color: var(--emerald-600); }
        .ic-purple { background: #F5F3FF; color: #7C3AED; }
        .stat-number { font-size: 22px; font-weight: 800; line-height: 1.1; }
        .stat-text { font-size: 12px; color: var(--muted); margin-top: 2px; }

        /* ---------- Tableau ---------- */
        .panel { background: #fff; border: 1px solid var(--border); border-radius: var(--radius); box-shadow: 0 2px 10px rgba(15, 23, 42, .04); overflow: hidden; }
        .panel-head { display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; padding: 16px 18px; border-bottom: 1px solid #F1F5F9; }
        .panel-head h2 { font-size: 16px; font-weight: 800; color: var(--dark); }
        .panel-head p { font-size: 12.5px; color: var(--muted); margin-top: 3px; }

        .search { position: relative; width: 100%; max-width: 360px; }
        .search svg { position: absolute; inset-inline-start: 12px; top: 50%; transform: translateY(-50%); color: #94A3B8; width: 16px; height: 16px; }
        .search input {
            width: 100%; padding: 10px 12px; padding-inline-start: 36px;
            border: 1px solid #D1D5DB; border-radius: 10px; background: #fff;
            font-size: 13.5px; font-family: inherit; color: var(--text); transition: border-color .15s, box-shadow .15s;
        }
        .search input:focus { outline: none; border-color: var(--emerald); box-shadow: 0 0 0 3px rgba(16, 185, 129, .14); }

        .table-scroll { overflow-x: auto; }
        table { width: 100%; min-width: 900px; border-collapse: collapse; text-align: start; }
        thead { background: #F8FAFC; }
        th { padding: 12px 16px; font-size: 12px; font-weight: 700; color: var(--muted); text-align: start; white-space: nowrap; }
        td { padding: 14px 16px; vertical-align: middle; border-top: 1px solid #F1F5F9; text-align: start; }
        tbody tr:hover { background: #FAFCFB; }

        .student-cell { display: flex; align-items: center; gap: 11px; min-width: 220px; }
        .student-avatar {
            width: 44px; height: 44px; flex: 0 0 44px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; overflow: hidden;
            background: var(--emerald-100); color: var(--emerald-700);
            font-size: 15px; font-weight: 800; border: 2px solid #fff;
            box-shadow: 0 0 0 1px var(--border);
        }
        .student-avatar img { width: 100%; height: 100%; display: block; object-fit: cover; }
        .student-info { min-width: 0; }
        .student-name { font-weight: 800; color: var(--dark); }
        .student-meta { font-size: 12px; color: var(--muted); margin-top: 3px; overflow-wrap: anywhere; }
        .formation-name { font-weight: 700; color: #334155; }
        .muted { color: #94A3B8; }

        .badge { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 700; white-space: nowrap; }
        .b-amber { background: #FEF3C7; color: #B45309; }
        .b-blue { background: #DBEAFE; color: #1D4ED8; }
        .b-green { background: var(--emerald-100); color: var(--emerald-700); }
        .b-red { background: #FEE2E2; color: #B91C1C; }
        .b-gray { background: #F1F5F9; color: #64748B; }

        .row-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; min-width: 260px; }
        .row-actions form { margin: 0; display: inline-flex; }

        .empty { padding: 48px 16px; text-align: center; color: #475569; }
        .empty svg { width: 40px; height: 40px; color: #CBD5E1; margin: 0 auto 10px; display: block; }
        .empty p { font-weight: 700; }

        .panel-foot { padding: 12px 18px; border-top: 1px solid #F1F5F9; font-size: 12px; color: var(--muted); }

        /* ---------- Responsive ---------- */
        @media (max-width: 900px) { .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 640px) {
            .page { padding: 14px 10px 36px; }
            .topbar-actions { width: 100%; }
            .header h1 { font-size: 20px; }
            .search { max-width: none; }
        }
    </style>
</head>

<body>
<div class="page">

    @php
        $adminName = auth()->user()->name ?? 'Admin';

        // Récupère la photo de profil déjà enregistrée pour chaque étudiant.
        $studentPhotoUrl = function ($student) {
            $attributes = $student->getAttributes();
            $photo = null;

            foreach ([
                'profile_photo_path',
                'profile_photo',
                'profile_image',
                'avatar',
                'photo',
                'image',
                'picture',
            ] as $field) {
                if (!empty($attributes[$field]) && is_string($attributes[$field])) {
                    $photo = trim($attributes[$field]);
                    break;
                }
            }

            if (!$photo) {
                return null;
            }

            if (preg_match('/^https?:\\/\\//i', $photo)) {
                return $photo;
            }

            if (str_starts_with($photo, '/')) {
                return $photo;
            }

            if (str_starts_with($photo, 'storage/')) {
                return asset($photo);
            }

            if (str_starts_with($photo, 'images/') || str_starts_with($photo, 'uploads/')) {
                return asset($photo);
            }

            return \Illuminate\Support\Facades\Storage::url($photo);
        };

        // Lien WhatsApp : si l'inscription est acceptée, le message contient le code de confirmation
        $waLink = function ($student) {
            $phone = preg_replace('/\D+/', '', $student->whatsapp_phone ?? '');

            // Numéros marocains : 0612345678 ou 00212612345678 -> 212612345678
            if (str_starts_with($phone, '00')) {
                $phone = substr($phone, 2);
            } elseif (strlen($phone) === 10 && str_starts_with($phone, '0')) {
                $phone = '212' . substr($phone, 1);
            }

            $text = '';

            if ($student->status === 'accepted' && $student->confirmation_code) {
                $text = "Bonjour {$student->name},\n\n"
                    . "Votre inscription sur ÉtudeEnLigne a été acceptée ✅\n\n"
                    . "Votre code de confirmation : {$student->confirmation_code}\n\n"
                    . "Confirmez votre inscription ici : " . route('confirmation.show') . "\n\n"
                    . "مرحبا {$student->name}، تم قبول تسجيلك في ÉtudeEnLigne ✅\n"
                    . "رمز التأكيد الخاص بك : {$student->confirmation_code}";
            }

            return 'https://wa.me/' . $phone . ($text !== '' ? '?text=' . rawurlencode($text) : '');
        };

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
            'pending' => 'b-amber',
            'accepted' => 'b-blue',
            'confirmed' => 'b-green',
            'rejected' => 'b-red',
        ];
    @endphp

    <!-- ===== BARRE DU HAUT ===== -->
    <div class="topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
            <span>ÉtudeEnLigne</span>
        </a>

        <div class="topbar-actions">
            <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                <button type="button" data-lang-btn="fr" class="active">FR</button>
                <button type="button" data-lang-btn="ar">العربية</button>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
                <i data-lucide="layout-dashboard"></i>
                <span data-i18n="dashboard">Tableau de bord</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i data-lucide="log-out"></i>
                    <span data-i18n="logout">Déconnexion</span>
                </button>
            </form>
        </div>
    </div>

    <!-- ===== EN-TÊTE ===== -->
    <div class="header">
        <span class="eyebrow">
            <i data-lucide="shield-check" style="width:13px;height:13px;"></i>
            <span data-i18n="admin_label">ESPACE ADMINISTRATEUR</span>
        </span>
        <h1 data-i18n="page_title">Inscriptions et formations</h1>
        <p data-i18n="page_subtitle">Gérez les inscriptions et activez les formations directement depuis la ligne de chaque étudiant.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i data-lucide="check-circle-2"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i data-lucide="alert-triangle"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    {{-- Après « Accepter » : ouvre WhatsApp avec le code de confirmation --}}
    @if(session('whatsapp_url'))
        <div class="alert alert-success" style="align-items:center; flex-wrap:wrap;">
            <i data-lucide="message-circle"></i>
            <div style="flex:1; min-width:200px;" data-i18n="send_code_text">
                Le code de confirmation est prêt. Envoyez-le à l'étudiant sur WhatsApp.
            </div>
            <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener" class="btn btn-whatsapp" id="waAutoLink">
                <i data-lucide="send"></i>
                <span data-i18n="send_code_btn">Envoyer le code sur WhatsApp</span>
            </a>
        </div>

        <script>
            // Ouvre WhatsApp automatiquement (si le navigateur bloque, utilisez le bouton vert)
            window.addEventListener('load', function () {
                window.open(@json(session('whatsapp_url')), '_blank');
            });
        </script>
    @endif

    <!-- ===== STATISTIQUES ===== -->
    <div class="stats">
        <div class="stat-card">
            <div class="stat-icon ic-blue"><i data-lucide="users"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->count() }}</div>
                <div class="stat-text" data-i18n="total_students">Total étudiants</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon ic-amber"><i data-lucide="clock"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->where('status', 'pending')->count() }}</div>
                <div class="stat-text" data-i18n="pending">En attente</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon ic-green"><i data-lucide="check-circle"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->whereIn('status', ['accepted', 'confirmed'])->count() }}</div>
                <div class="stat-text" data-i18n="accepted">Acceptés</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon ic-purple"><i data-lucide="book-open"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->sum(fn($student) => $student->formations->where('pivot.status', 'active')->count()) }}</div>
                <div class="stat-text" data-i18n="activated_formations">Formations activées</div>
            </div>
        </div>
    </div>

    <!-- ===== TABLEAU DES ÉTUDIANTS ===== -->
    <section class="panel">

        <div class="panel-head">
            <div>
                <h2 data-i18n="students_list">Liste des étudiants</h2>
                <p data-i18n="table_subtitle">Gérez les inscriptions et les formations sur une seule ligne.</p>
            </div>

            <div class="search">
                <i data-lucide="search"></i>
                <input
                    id="searchInput"
                    type="text"
                    placeholder="Rechercher un étudiant ou une formation..."
                    data-i18n-placeholder="search_placeholder"
                >
            </div>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th data-i18n="student">Étudiant</th>
                        <th data-i18n="registration">Inscription</th>
                        <th data-i18n="requested_formation">Formation demandée</th>
                        <th data-i18n="formation_status">Statut formation</th>
                        <th data-i18n="actions">Actions</th>
                    </tr>
                </thead>

                <tbody id="studentsTable">

                    @forelse($registrations as $student)

                        @if($student->formations->isEmpty())

                            <tr class="student-row"
                                data-search="{{ strtolower($student->name . ' ' . $student->email) }}">

                                <td>
                                    <div class="student-cell">
                                        <div class="student-avatar">
                                            @if($studentPhotoUrl($student))
                                                <img src="{{ $studentPhotoUrl($student) }}"
                                                     alt="Photo de {{ $student->name }}"
                                                     loading="lazy"
                                                     onerror="this.style.display='none';this.parentElement.textContent='{{ mb_strtoupper(mb_substr($student->name ?? 'É', 0, 1)) }}';">
                                            @else
                                                {{ mb_strtoupper(mb_substr($student->name ?? 'É', 0, 1)) }}
                                            @endif
                                        </div>
                                        <div class="student-info">
                                            <div class="student-name">{{ $student->name }}</div>
                                            <div class="student-meta">{{ $student->email }}</div>
                                            @if($student->whatsapp_phone)
                                                <div class="student-meta"><bdi>{{ $student->whatsapp_phone }}</bdi></div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="badge {{ $statusClasses[$student->status] ?? 'b-gray' }}"
                                          data-i18n="{{ $statusKeys[$student->status] ?? 'status_pending' }}">
                                        {{ $statusLabels[$student->status] ?? $student->status }}
                                    </span>
                                </td>

                                <td class="muted" data-i18n="no_formation">Aucune formation demandée</td>

                                <td>
                                    <span class="badge b-gray" data-i18n="not_available">Non disponible</span>
                                </td>

                                <td>
                                    <div class="row-actions">

                                        @if($student->status === 'pending')
                                            <form action="{{ route('admin.registrations.accept', $student->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-accept">
                                                    <i data-lucide="check"></i>
                                                    <span data-i18n="accept">Accepter</span>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.registrations.reject', $student->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد رفض التسجيل؟' : 'Refuser cette inscription ?')">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-reject">
                                                    <i data-lucide="x"></i>
                                                    <span data-i18n="reject">Refuser</span>
                                                </button>
                                            </form>
                                        @endif

                                        @if($student->whatsapp_phone)
                                            <a href="{{ $waLink($student) }}"
                                               target="_blank"
                                               rel="noopener"
                                               class="btn btn-whatsapp">
                                                <i data-lucide="message-circle"></i>
                                                WhatsApp
                                            </a>
                                        @endif

                                        <form action="{{ route('admin.registrations.destroy', $student->id) }}"
                                              method="POST"
                                              onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد حذف هذا الطالب؟' : 'Supprimer cet étudiant ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-delete">
                                                <i data-lucide="trash-2"></i>
                                                <span data-i18n="delete">Supprimer</span>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @else

                            @foreach($student->formations as $formation)

                                @php
                                    // Identifiant de la ligne pivot : lu depuis le modèle si disponible,
                                    // sinon retrouvé automatiquement dans la table user_formations
                                    $pivotId = $formation->pivot->id
                                        ?? \Illuminate\Support\Facades\DB::table('user_formations')
                                            ->where('user_id', $student->id)
                                            ->where('formation_id', $formation->id)
                                            ->value('id');
                                @endphp

                                <tr class="student-row"
                                    data-search="{{ strtolower($student->name . ' ' . $student->email . ' ' . $formation->name) }}">

                                    <td>
                                        <div class="student-cell">
                                            <div class="student-avatar">
                                                @if($studentPhotoUrl($student))
                                                    <img src="{{ $studentPhotoUrl($student) }}"
                                                         alt="Photo de {{ $student->name }}"
                                                         loading="lazy"
                                                         onerror="this.style.display='none';this.parentElement.textContent='{{ mb_strtoupper(mb_substr($student->name ?? 'É', 0, 1)) }}';">
                                                @else
                                                    {{ mb_strtoupper(mb_substr($student->name ?? 'É', 0, 1)) }}
                                                @endif
                                            </div>
                                            <div class="student-info">
                                                <div class="student-name">{{ $student->name }}</div>
                                                <div class="student-meta">{{ $student->email }}</div>
                                                @if($student->whatsapp_phone)
                                                    <div class="student-meta"><bdi>{{ $student->whatsapp_phone }}</bdi></div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge {{ $statusClasses[$student->status] ?? 'b-gray' }}"
                                              data-i18n="{{ $statusKeys[$student->status] ?? 'status_pending' }}">
                                            {{ $statusLabels[$student->status] ?? $student->status }}
                                        </span>
                                    </td>

                                    <td style="min-width:200px;">
                                        <div class="formation-name">{{ $formation->name }}</div>
                                    </td>

                                    <td>
                                        @if($formation->pivot->status === 'active')
                                            <span class="badge b-green" data-i18n="activated">Activée</span>
                                        @elseif($formation->pivot->status === 'rejected')
                                            <span class="badge b-red" data-i18n="formation_rejected">Refusée</span>
                                        @else
                                            <span class="badge b-amber" data-i18n="formation_pending">En attente</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="row-actions">

                                            @if($student->status === 'pending')

                                                <form action="{{ route('admin.registrations.accept', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-accept">
                                                        <i data-lucide="check"></i>
                                                        <span data-i18n="accept">Accepter</span>
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.registrations.reject', $student->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد رفض التسجيل؟' : 'Refuser cette inscription ?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-reject">
                                                        <i data-lucide="x"></i>
                                                        <span data-i18n="reject">Refuser</span>
                                                    </button>
                                                </form>

                                            @elseif($student->status !== 'rejected')

                                                @if($formation->pivot->status !== 'active')

                                                    @if($pivotId)

                                                        <form action="{{ route('admin.formation-requests.activate', $pivotId) }}"
                                                              method="POST"
                                                              onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد تفعيل هذا التكوين؟' : 'Activer cette formation ?')">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-activate">
                                                                <i data-lucide="check"></i>
                                                                <span data-i18n="activate_formation">Activer formation</span>
                                                            </button>
                                                        </form>

                                                    @else

                                                        <span class="btn btn-warn">
                                                            <i data-lucide="alert-triangle"></i>
                                                            <span data-i18n="missing_pivot_id">Identifiant introuvable : ajoutez withPivot('id') au modèle</span>
                                                        </span>

                                                    @endif

                                                @else

                                                    <span class="btn btn-done">
                                                        <i data-lucide="check-circle"></i>
                                                        <span data-i18n="already_activated">Déjà activée</span>
                                                    </span>

                                                @endif

                                            @endif

                                            @if($student->whatsapp_phone)
                                                <a href="{{ $waLink($student) }}"
                                                   target="_blank"
                                                   rel="noopener"
                                                   class="btn btn-whatsapp">
                                                    <i data-lucide="message-circle"></i>
                                                    WhatsApp
                                                </a>
                                            @endif

                                            <form action="{{ route('admin.registrations.destroy', $student->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm(window.currentLanguage === 'ar' ? 'هل تريد حذف هذا الطالب؟' : 'Supprimer cet étudiant ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-delete">
                                                    <i data-lucide="trash-2"></i>
                                                    <span data-i18n="delete">Supprimer</span>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                        @endif

                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty">
                                    <i data-lucide="users"></i>
                                    <p data-i18n="no_students">Aucun étudiant trouvé</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="panel-foot" data-i18n="table_footer">
            Les actions et les formations sont regroupées sur une seule ligne.
        </div>

    </section>

</div>

<script>
    window.currentLanguage = 'fr';

    const translations = {
        fr: {
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
            missing_pivot_id: "Identifiant introuvable : ajoutez withPivot('id') au modèle",
            no_students: "Aucun étudiant trouvé",
            send_code_text: "Le code de confirmation est prêt. Envoyez-le à l'étudiant sur WhatsApp.",
            send_code_btn: "Envoyer le code sur WhatsApp",
            table_footer: "Les actions et les formations sont regroupées sur une seule ligne."
        },

        ar: {
            dashboard: "لوحة التحكم",
            logout: "تسجيل الخروج",
            admin_label: "فضاء الإدارة",
            page_title: "التسجيلات والتكوينات",
            page_subtitle: "دبّر تسجيلات الطلبة وفعّل التكوينات مباشرة من نفس السطر.",
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
            missing_pivot_id: "المعرّف غير متوفر : أضف withPivot('id') إلى النموذج",
            no_students: "لا يوجد طلبة",
            send_code_text: "رمز التأكيد جاهز. أرسله إلى الطالب عبر واتساب.",
            send_code_btn: "إرسال الرمز عبر واتساب",
            table_footer: "معلومات الطلبة والتكوينات والإجراءات موجودة في نفس السطر."
        }
    };

    function applyLanguage(language, persist) {
        window.currentLanguage = language;

        const dictionary = translations[language];

        document.documentElement.lang = language;
        document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';
        document.title = language === 'ar'
            ? 'التسجيلات | ÉtudeEnLigne'
            : 'Inscriptions | ÉtudeEnLigne';

        document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
            btn.classList.toggle('active', btn.dataset.langBtn === language);
        });

        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            const key = el.dataset.i18n;

            if (dictionary[key] !== undefined) {
                el.textContent = dictionary[key];
            }
        });

        document.querySelectorAll('[data-i18n-placeholder]').forEach(function (el) {
            const key = el.dataset.i18nPlaceholder;

            if (dictionary[key] !== undefined) {
                el.placeholder = dictionary[key];
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

    // Recherche instantanée
    document.getElementById('searchInput').addEventListener('input', function () {
        const search = this.value.toLowerCase().trim();

        document.querySelectorAll('.student-row').forEach(function (row) {
            const content = (row.dataset.search || '').toLowerCase();
            row.style.display = content.includes(search) ? '' : 'none';
        });
    });

    let savedLanguage = 'fr';
    try { savedLanguage = localStorage.getItem('etudierenligne_admin_language') || 'fr'; } catch (e) {}
    if (!translations[savedLanguage]) savedLanguage = 'fr';

    applyLanguage(savedLanguage, false);

    if (window.lucide) {
        lucide.createIcons();
    }
</script>
</body>
</html>