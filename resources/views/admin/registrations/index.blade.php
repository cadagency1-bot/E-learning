<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions | CAD ACADEMY</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">

    <script>
        try {
            if (localStorage.getItem('cadacademy_admin_language') === 'ar') {
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
            --red: #D90429;
            --red-600: #BF0426;
            --red-700: #9B0320;
            --red-50: #FFF1F3;
            --red-100: #FFE0E5;
            --red-200: #FFC2CC;
            --ink: #1A1A1A;
            --bg: #FFFFFF;
            --soft: #FAFAFA;
            --border: #EDEDED;
            --text: #1F1F1F;
            --muted: #6E6E6E;
            --radius: 12px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--soft);
            color: var(--text);
            font-size: 14px;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        html[lang="ar"] body { font-family: 'Tajawal', 'Plus Jakarta Sans', Arial, sans-serif; }

        svg.lucide, i[data-lucide] { width: 16px; height: 16px; flex-shrink: 0; }

        /* ---------- Barre rouge (marque) ---------- */
        .topbar {
            background: var(--red);
            color: #fff;
            position: relative;
        }

        .topbar::after {
            content: "";
            position: absolute;
            inset-inline: 0;
            bottom: 0;
            height: 4px;
            background: var(--red-700);
        }

        .topbar-inner {
            max-width: 1500px;
            margin: 0 auto;
            padding: 16px 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #fff;
            color: var(--red);
            display: grid;
            place-items: center;
        }

        .brand-icon svg { width: 22px; height: 22px; }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: .5px;
            line-height: 1;
        }

        .topbar-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

        .lang-switch {
            display: inline-flex;
            gap: 2px;
            background: rgba(0, 0, 0, .18);
            border-radius: 10px;
            padding: 3px;
        }

        .lang-switch button {
            border: none;
            background: transparent;
            color: #fff;
            padding: 7px 13px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
        }

        .lang-switch button.active { background: #fff; color: var(--red); }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 13px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            white-space: nowrap;
            transition: background .15s, border-color .15s;
        }

        .btn svg { width: 15px; height: 15px; }
        .btn:focus-visible, .lang-switch button:focus-visible, .search input:focus-visible { outline: 3px solid rgba(217, 4, 41, .35); outline-offset: 2px; }

        .btn-top { background: #fff; color: var(--red); }
        .btn-top:hover { background: var(--red-50); }

        .btn-logout { background: transparent; color: #fff; border-color: rgba(255, 255, 255, .6); }
        .btn-logout:hover { background: rgba(0, 0, 0, .18); }

        .btn-accept { background: var(--red); color: #fff; }
        .btn-accept:hover { background: var(--red-700); }

        .btn-reject { background: #fff; color: var(--red); border-color: var(--red-200); }
        .btn-reject:hover { background: var(--red-50); }

        .btn-activate { background: var(--ink); color: #fff; }
        .btn-activate:hover { background: var(--red); }

        .btn-whatsapp { background: #fff; color: var(--ink); border-color: var(--border); }
        .btn-whatsapp:hover { background: var(--soft); border-color: #D4D4D4; }

        .btn-delete { background: var(--soft); color: #555; border-color: var(--border); }
        .btn-delete:hover { background: var(--red-50); color: var(--red); border-color: var(--red-100); }

        .btn-done { background: var(--red-50); color: var(--red-700); cursor: default; }
        .btn-warn { background: #fff; color: var(--red-700); border-color: var(--red-200); cursor: default; white-space: normal; }

        /* ---------- Contenu ---------- */
        .page { max-width: 1500px; margin: 0 auto; padding: 26px 16px 48px; }

        .header { margin-bottom: 20px; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--red);
            font-size: 12px;
            font-weight: 800;
        }

        .header h1 {
            margin-top: 6px;
            font-size: 28px;
            font-weight: 800;
            color: var(--ink);
            letter-spacing: -.4px;
        }

        .header p { margin-top: 4px; color: var(--muted); font-size: 13px; line-height: 1.6; }

        .alert {
            display: flex;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 14px;
            line-height: 1.55;
            font-size: 13px;
            font-weight: 600;
        }

        .alert svg { margin-top: 2px; }
        .alert-success { background: #fff; border: 1px solid var(--border); border-inline-start: 4px solid var(--red); color: var(--ink); }
        .alert-error { background: var(--red-50); border: 1px solid var(--red-200); color: var(--red-700); }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 20px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 14px 16px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: var(--red-50);
            color: var(--red);
        }

        .stat-icon svg { width: 20px; height: 20px; }
        .stat-number { font-size: 24px; font-weight: 800; line-height: 1.1; color: var(--ink); }
        .stat-text { font-size: 12px; color: var(--muted); margin-top: 2px; }

        .panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
        }

        .panel-head h2 { font-size: 16px; font-weight: 800; color: var(--ink); }
        .panel-head p { font-size: 12.5px; color: var(--muted); margin-top: 3px; }

        .search { position: relative; width: 100%; max-width: 360px; }

        .search svg {
            position: absolute;
            inset-inline-start: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            width: 16px;
            height: 16px;
        }

        .search input {
            width: 100%;
            padding: 10px 12px;
            padding-inline-start: 36px;
            border: 1px solid #D9D9D9;
            border-radius: 10px;
            background: #fff;
            font-size: 13.5px;
            font-family: inherit;
            color: var(--text);
        }

        .search input:focus { outline: none; border-color: var(--red); box-shadow: 0 0 0 3px rgba(217, 4, 41, .14); }

        .table-scroll { overflow-x: auto; }

        table { width: 100%; min-width: 1150px; border-collapse: collapse; text-align: start; }

        thead { background: var(--ink); }

        th {
            padding: 12px 14px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            text-align: start;
            white-space: nowrap;
        }

        td { padding: 14px; vertical-align: middle; border-top: 1px solid var(--border); text-align: start; }
        tbody tr:hover { background: #FFFAFA; }

        .student-cell { display: flex; align-items: center; gap: 11px; min-width: 220px; }

        .student-avatar {
            width: 44px;
            height: 44px;
            flex: 0 0 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--red-100);
            color: var(--red-700);
            font-size: 15px;
            font-weight: 800;
            border: 2px solid #fff;
            box-shadow: 0 0 0 1px var(--red-200);
        }

        .student-avatar img { width: 100%; height: 100%; display: block; object-fit: cover; }
        .student-info { min-width: 0; }
        .student-name { font-weight: 800; color: var(--ink); }
        .student-meta { font-size: 12px; color: var(--muted); margin-top: 3px; overflow-wrap: anywhere; }
        .formation-name { font-weight: 700; color: var(--ink); }
        .muted { color: #9A9A9A; }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .b-pending { background: #F1F1F1; color: #555; }
        .b-soft { background: var(--red-100); color: var(--red-700); }
        .b-solid { background: var(--red); color: #fff; }
        .b-dark { background: var(--ink); color: #fff; }

        .row-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; min-width: 260px; }
        .row-actions form { margin: 0; display: inline-flex; }

        .dossier-cell { min-width: 190px; }
        .dossier-links { display: flex; flex-direction: column; gap: 7px; }

        .doc-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: fit-content;
            padding: 6px 9px;
            border-radius: 8px;
            background: var(--red-50);
            color: var(--red-700);
            border: 1px solid var(--red-100);
            text-decoration: none;
            font-size: 11.5px;
            font-weight: 700;
        }

        .doc-link:hover { background: var(--red-100); }
        .doc-link svg { width: 14px; height: 14px; }

        .doc-missing {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #9A9A9A;
            font-size: 11.5px;
            font-weight: 600;
        }

        .doc-missing svg { width: 13px; height: 13px; }

        .empty { padding: 48px 16px; text-align: center; color: #555; }
        .empty svg { width: 40px; height: 40px; color: var(--red-200); margin: 0 auto 10px; display: block; }
        .empty p { font-weight: 700; }

        .panel-foot { padding: 12px 18px; border-top: 1px solid var(--border); font-size: 12px; color: var(--muted); }

        @media (max-width: 900px) { .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

        @media (max-width: 640px) {
            .page { padding: 18px 10px 36px; }
            .topbar-inner { padding: 14px 10px 18px; }
            .topbar-actions { width: 100%; }
            .header h1 { font-size: 22px; }
            .search { max-width: none; }
        }

        @media (prefers-reduced-motion: reduce) { * { transition: none !important; } }
    </style>
</head>

<body>

    @php
        $adminName = auth()->user()->name ?? 'Admin';

        /* Les documents sont stockés dans storage/app/private (disque local). */
        $studentPhotoUrl = function ($student) {
            $photo = $student->photo ?? null;

            if (!is_string($photo) || trim($photo) === '') {
                return null;
            }

            if (!\Illuminate\Support\Facades\Storage::disk('local')->exists($photo)) {
                return null;
            }

            return route('admin.registrations.document', [$student->id, 'photo']);
        };

        $hasDocument = function ($student, $field, $disk = 'local') {
            $path = $student->{$field} ?? null;

            if (!is_string($path) || trim($path) === '') {
                return false;
            }

            return \Illuminate\Support\Facades\Storage::disk($disk)->exists($path);
        };

        $waLink = function ($student) {
            $phone = preg_replace('/\D+/', '', $student->whatsapp_phone ?? '');

            if (str_starts_with($phone, '00')) {
                $phone = substr($phone, 2);
            } elseif (strlen($phone) === 10 && str_starts_with($phone, '0')) {
                $phone = '212' . substr($phone, 1);
            }

            $text = '';

            if ($student->status === 'accepted' && $student->confirmation_code) {
                $text = "Bonjour {$student->name},\n\n"
                    . "Votre inscription sur CAD ACADEMY a été acceptée ✅\n\n"
                    . "Votre code de confirmation : {$student->confirmation_code}\n\n"
                    . "Confirmez votre inscription ici : " . route('confirmation.show') . "\n\n"
                    . "مرحبا {$student->name}، تم قبول تسجيلك في CAD ACADEMY ✅\n"
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
            'pending' => 'b-pending',
            'accepted' => 'b-soft',
            'confirmed' => 'b-solid',
            'rejected' => 'b-dark',
        ];
    @endphp

    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <span class="brand-icon"><i data-lucide="graduation-cap"></i></span>
                <span class="brand-name">CAD ACADEMY</span>
            </a>

            <div class="topbar-actions">
                <div class="lang-switch" role="group" aria-label="Langue / اللغة">
                    <button type="button" data-lang-btn="fr" class="active">FR</button>
                    <button type="button" data-lang-btn="ar">العربية</button>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="btn btn-top">
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
    </header>

<div class="page">

    <div class="header">
        <span class="eyebrow">
            <i data-lucide="shield-check" style="width:14px;height:14px;"></i>
            <span data-i18n="admin_label">Espace administrateur</span>
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

    @if(session('whatsapp_url'))
        <div class="alert alert-success" style="align-items:center; flex-wrap:wrap;">
            <i data-lucide="message-circle"></i>
            <div style="flex:1; min-width:200px;" data-i18n="send_code_text">
                Le code de confirmation est prêt. Envoyez-le à l'étudiant sur WhatsApp.
            </div>
            <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener" class="btn btn-accept" id="waAutoLink">
                <i data-lucide="send"></i>
                <span data-i18n="send_code_btn">Envoyer le code sur WhatsApp</span>
            </a>
        </div>

        <script>
            window.addEventListener('load', function () {
                window.open(@json(session('whatsapp_url')), '_blank');
            });
        </script>
    @endif

    <div class="stats">
        <div class="stat-card">
            <div class="stat-icon"><i data-lucide="users"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->count() }}</div>
                <div class="stat-text" data-i18n="total_students">Total étudiants</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i data-lucide="clock"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->where('status', 'pending')->count() }}</div>
                <div class="stat-text" data-i18n="pending">En attente</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i data-lucide="check-circle"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->whereIn('status', ['accepted', 'confirmed'])->count() }}</div>
                <div class="stat-text" data-i18n="accepted">Acceptés</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i data-lucide="book-open"></i></div>
            <div>
                <div class="stat-number">{{ $registrations->sum(fn($student) => $student->formations->where('pivot.status', 'active')->count()) }}</div>
                <div class="stat-text" data-i18n="activated_formations">Formations activées</div>
            </div>
        </div>
    </div>

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
                        <th data-i18n="student_dossier">Dossier étudiant</th>
                        <th data-i18n="requested_formation">Formation demandée</th>
                        <th data-i18n="formation_status">Statut formation</th>
                        <th data-i18n="actions">Actions</th>
                    </tr>
                </thead>

                <tbody id="studentsTable">

                    @forelse($registrations as $student)

                        @php
                            // Un étudiant sans formation = une seule ligne ; sinon une ligne par formation.
                            $rowFormations = $student->formations->isEmpty() ? [null] : $student->formations->all();
                            $initial = mb_strtoupper(mb_substr($student->name ?? 'C', 0, 1));
                        @endphp

                        @foreach($rowFormations as $formation)

                            @php
                                $pivotId = null;

                                if ($formation) {
                                    $pivotId = $formation->pivot->id
                                        ?? \Illuminate\Support\Facades\DB::table('user_formations')
                                            ->where('user_id', $student->id)
                                            ->where('formation_id', $formation->id)
                                            ->value('id');
                                }
                            @endphp

                            <tr class="student-row"
                                data-search="{{ strtolower($student->name . ' ' . $student->email . ($formation ? ' ' . $formation->name : '')) }}">

                                {{-- Étudiant --}}
                                <td>
                                    <div class="student-cell">
                                        <div class="student-avatar">
                                            @if($studentPhotoUrl($student))
                                                <img src="{{ $studentPhotoUrl($student) }}"
                                                     alt="Photo de {{ $student->name }}"
                                                     loading="lazy"
                                                     onerror="this.style.display='none';this.parentElement.textContent='{{ $initial }}';">
                                            @else
                                                {{ $initial }}
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

                                {{-- Statut inscription --}}
                                <td>
                                    <span class="badge {{ $statusClasses[$student->status] ?? 'b-pending' }}"
                                          data-i18n="{{ $statusKeys[$student->status] ?? 'status_pending' }}">
                                        {{ $statusLabels[$student->status] ?? $student->status }}
                                    </span>
                                </td>

                                {{-- Dossier --}}
                                <td class="dossier-cell">
                                    <div class="dossier-links">

                                        @if($hasDocument($student, 'photo'))
                                            <a class="doc-link"
                                               href="{{ route('admin.registrations.document', [$student->id, 'photo']) }}"
                                               target="_blank" rel="noopener">
                                                <i data-lucide="image"></i>
                                                <span data-i18n="doc_photo">Voir la photo</span>
                                            </a>
                                        @else
                                            <span class="doc-missing"><i data-lucide="minus-circle"></i><span data-i18n="doc_photo_missing">Photo non fournie</span></span>
                                        @endif

                                        @if($hasDocument($student, 'cin_recto'))
                                            <a class="doc-link"
                                               href="{{ route('admin.registrations.document', [$student->id, 'cin_recto']) }}"
                                               target="_blank" rel="noopener">
                                                <i data-lucide="file-image"></i>
                                                <span data-i18n="doc_cin_front">CIN Recto</span>
                                            </a>
                                        @else
                                            <span class="doc-missing"><i data-lucide="minus-circle"></i><span data-i18n="doc_cin_front_missing">CIN Recto non fourni</span></span>
                                        @endif

                                        @if($hasDocument($student, 'cin_verso'))
                                            <a class="doc-link"
                                               href="{{ route('admin.registrations.document', [$student->id, 'cin_verso']) }}"
                                               target="_blank" rel="noopener">
                                                <i data-lucide="file-image"></i>
                                                <span data-i18n="doc_cin_back">CIN Verso</span>
                                            </a>
                                        @else
                                            <span class="doc-missing"><i data-lucide="minus-circle"></i><span data-i18n="doc_cin_back_missing">CIN Verso non fourni</span></span>
                                        @endif

                                        @if($hasDocument($student, 'cv_path'))
                                            <a class="doc-link" href="{{ route('admin.registrations.cv', $student->id) }}">
                                                <i data-lucide="file-text"></i>
                                                <span data-i18n="doc_cv">Télécharger CV</span>
                                            </a>
                                        @else
                                            <span class="doc-missing"><i data-lucide="minus-circle"></i><span data-i18n="doc_cv_missing">CV non fourni</span></span>
                                        @endif

                                    </div>
                                </td>

                                {{-- Formation demandée --}}
                                @if($formation)
                                    <td style="min-width:200px;">
                                        <div class="formation-name">{{ $formation->name }}</div>
                                    </td>

                                    <td>
                                        @if($formation->pivot->status === 'active')
                                            <span class="badge b-solid" data-i18n="activated">Activée</span>
                                        @elseif($formation->pivot->status === 'rejected')
                                            <span class="badge b-dark" data-i18n="formation_rejected">Refusée</span>
                                        @else
                                            <span class="badge b-pending" data-i18n="formation_pending">En attente</span>
                                        @endif
                                    </td>
                                @else
                                    <td class="muted" data-i18n="no_formation">Aucune formation demandée</td>

                                    <td>
                                        <span class="badge b-pending" data-i18n="not_available">Non disponible</span>
                                    </td>
                                @endif

                                {{-- Actions --}}
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

                                        @elseif($formation && $student->status !== 'rejected')

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
                                            <a href="{{ $waLink($student) }}" target="_blank" rel="noopener" class="btn btn-whatsapp">
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

                    @empty
                        <tr>
                            <td colspan="6">
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
            admin_label: "Espace administrateur",
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
            student_dossier: "Dossier étudiant",
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
            table_footer: "Les actions et les formations sont regroupées sur une seule ligne.",
            doc_photo: "Voir la photo",
            doc_photo_missing: "Photo non fournie",
            doc_cin_front: "CIN Recto",
            doc_cin_front_missing: "CIN Recto non fourni",
            doc_cin_back: "CIN Verso",
            doc_cin_back_missing: "CIN Verso non fourni",
            doc_cv: "Télécharger CV",
            doc_cv_missing: "CV non fourni"
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
            student_dossier: "ملف الطالب",
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
            table_footer: "معلومات الطلبة والتكوينات والإجراءات موجودة في نفس السطر.",
            doc_photo: "عرض الصورة",
            doc_photo_missing: "الصورة غير مرفقة",
            doc_cin_front: "البطاقة الوطنية - الوجه الأمامي",
            doc_cin_front_missing: "الوجه الأمامي غير مرفق",
            doc_cin_back: "البطاقة الوطنية - الوجه الخلفي",
            doc_cin_back_missing: "الوجه الخلفي غير مرفق",
            doc_cv: "تحميل السيرة الذاتية",
            doc_cv_missing: "السيرة الذاتية غير مرفقة"
        }
    };

    function applyLanguage(language, persist) {
        window.currentLanguage = language;

        const dictionary = translations[language];

        document.documentElement.lang = language;
        document.documentElement.dir = language === 'ar' ? 'rtl' : 'ltr';

        document.title = language === 'ar'
            ? 'التسجيلات | CAD ACADEMY'
            : 'Inscriptions | CAD ACADEMY';

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
            try {
                localStorage.setItem('cadacademy_admin_language', language);
            } catch (e) {}
        }
    }

    document.querySelectorAll('[data-lang-btn]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            applyLanguage(this.dataset.langBtn, true);
        });
    });

    document.getElementById('searchInput').addEventListener('input', function () {
        const search = this.value.toLowerCase().trim();

        document.querySelectorAll('.student-row').forEach(function (row) {
            const content = (row.dataset.search || '').toLowerCase();
            row.style.display = content.includes(search) ? '' : 'none';
        });
    });

    let savedLanguage = 'fr';

    try {
        savedLanguage = localStorage.getItem('cadacademy_admin_language') || 'fr';
    } catch (e) {}

    if (!translations[savedLanguage]) savedLanguage = 'fr';

    applyLanguage(savedLanguage, false);

    if (window.lucide) {
        lucide.createIcons();
    }
</script>
</body>
</html>