
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formations | ÉtudeEnLigne</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green: #059669;
            --green-dark: #047857;
            --green-light: #ecfdf5;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --background: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        .formations-page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 28px 22px 55px;
        }

        /* TOPBAR */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 34px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--green);
            font-size: 21px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            color: white;
            background: var(--green);
            border-radius: 12px;
            font-size: 19px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: white;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: .2s;
        }

        .back-btn:hover {
            border-color: #a7f3d0;
            color: var(--green-dark);
            background: var(--green-light);
        }

        /* HEADER */

        .formations-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 22px;
            margin-bottom: 27px;
        }

        .formations-title {
            font-size: 29px;
            line-height: 1.3;
            font-weight: 800;
            letter-spacing: -.6px;
            color: var(--text);
        }

        .formations-title-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            margin-top: 5px;
            font-size: 20px;
            font-weight: 700;
            color: var(--green);
        }

        .formations-subtitle {
            margin-top: 10px;
            font-size: 13px;
            line-height: 1.8;
            color: var(--muted);
        }

        .formations-subtitle-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
            margin-top: 3px;
            font-size: 12px;
            color: var(--muted);
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            margin-bottom: 12px;
            border: 1px solid #d1fae5;
            border-radius: 999px;
            background: var(--green-light);
            color: var(--green-dark);
            font-size: 11px;
            font-weight: 800;
        }

        /* BUTTONS */

        .add-formation-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 17px;
            border: none;
            border-radius: 10px;
            background: var(--green);
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            transition: .2s;
        }

        .add-formation-btn:hover {
            background: var(--green-dark);
            transform: translateY(-1px);
        }

        /* ALERTS */

        .formation-alert {
            margin-bottom: 20px;
            padding: 14px 17px;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.8;
        }

        .formation-success {
            background: var(--green-light);
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .formation-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        /* STATISTICS */

        .formation-stat {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px;
            margin-bottom: 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .025);
        }

        .formation-stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 46px;
            height: 46px;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
        }

        .formation-stat-number {
            font-size: 23px;
            font-weight: 800;
            color: var(--text);
        }

        .formation-stat-text {
            margin-top: 3px;
            font-size: 12px;
            color: var(--muted);
        }

        /* GRID */

        .formations-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .formation-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            padding: 21px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .025);
            transition: border-color .2s, box-shadow .2s, transform .2s;
        }

        .formation-card:hover {
            border-color: #a7f3d0;
            box-shadow: 0 10px 25px rgba(15, 23, 42, .055);
            transform: translateY(-2px);
        }

        .formation-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 17px;
        }

        .formation-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
        }

        .formation-number {
            color: #cbd5e1;
            font-size: 12px;
            font-weight: 800;
        }

        .formation-category {
            display: inline-block;
            width: fit-content;
            max-width: 100%;
            padding: 6px 9px;
            margin-bottom: 11px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            background: #f8fafc;
            color: #475569;
            font-size: 10px;
            line-height: 1.5;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .formation-name {
            font-size: 17px;
            line-height: 1.5;
            font-weight: 800;
            color: var(--text);
            overflow-wrap: anywhere;
        }

        .formation-description {
            flex: 1;
            margin-top: 9px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .no-description {
            color: #94a3b8;
            font-style: italic;
        }

        .formation-video-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
            margin-top: 13px;
            padding: 6px 9px;
            border-radius: 8px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 10px;
            font-weight: 700;
        }

        /* FOOTER */

        .formation-footer {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
        }

        .formation-date {
            font-size: 10px;
            color: #94a3b8;
            line-height: 1.8;
        }

        .formation-date-ar {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: left;
        }

        .formation-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 11px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .formation-edit {
            background: #eff6ff;
            border-color: #dbeafe;
            color: #1d4ed8;
        }

        .formation-edit:hover {
            background: #dbeafe;
        }

        .formation-delete {
            background: #fef2f2;
            border-color: #fee2e2;
            color: #dc2626;
        }

        .formation-delete:hover {
            background: #fee2e2;
        }

        .formation-actions form {
            margin: 0;
        }

        /* EMPTY STATE */

        .formation-empty {
            padding: 55px 22px;
            text-align: center;
            background: white;
            border: 1px dashed #cbd5e1;
            border-radius: 17px;
        }

        .formation-empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 17px;
            border-radius: 16px;
            background: var(--green-light);
            color: var(--green);
        }

        .formation-empty h2 {
            font-size: 19px;
            font-weight: 800;
            color: var(--text);
        }

        .formation-empty-ar {
            font-family: 'Cairo', sans-serif;
            margin-top: 8px;
            color: var(--green);
            font-size: 16px;
            font-weight: 700;
        }

        .formation-empty p {
            margin-top: 9px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .empty-add-btn {
            margin-top: 20px;
        }

        /* RESPONSIVE */

        @media (max-width: 950px) {
            .formations-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .formations-page {
                padding: 20px 13px 35px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 28px;
            }

            .back-btn {
                width: 100%;
            }

            .formations-header {
                flex-direction: column;
                gap: 18px;
            }

            .formations-title {
                font-size: 25px;
            }

            .add-formation-btn {
                width: 100%;
                white-space: normal;
                text-align: center;
            }

            .formations-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .formation-card {
                padding: 18px;
            }

            .formation-actions {
                width: 100%;
            }

            .action-btn {
                flex: 1;
            }

            .formation-actions form {
                display: flex;
                flex: 1;
            }

            .formation-actions form button {
                width: 100%;
            }
        }
    </style>

</head>

<body>

<div class="formations-page">

    <!-- TOPBAR -->
    <div class="topbar">

        <a href="{{ route('admin.dashboard') }}" class="brand">
            <span class="brand-icon">E</span>
            <span>ÉtudeEnLigne</span>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <span style="font-size:18px;color:#059669;">←</span>
            Retour au tableau de bord / العودة إلى لوحة التحكم
        </a>

    </div>

    <!-- HEADER -->
    <div class="formations-header">

        <div>
            <span class="header-badge">
                FORMATIONS · التكوينات
            </span>

            <h1 class="formations-title">
                Gestion des formations
            </h1>

            <div class="formations-title-ar" dir="rtl">
                إدارة التكوينات
            </div>

            <p class="formations-subtitle">
                Gérez les formations disponibles sur votre plateforme.
            </p>

            <p class="formations-subtitle-ar" dir="rtl">
                قم بإدارة التكوينات المتوفرة على المنصة.
            </p>
        </div>

        <a href="{{ route('admin.formations.create') }}" class="add-formation-btn">
            <span style="font-size:19px;">+</span>
            Ajouter une formation / إضافة تكوين
        </a>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))
        <div class="formation-alert formation-success">
            <strong>✓ Opération réussie :</strong>
            {{ session('success') }}
        </div>
    @endif

    <!-- ERROR -->
    @if(session('error'))
        <div class="formation-alert formation-error">
            <strong>Attention :</strong>
            {{ session('error') }}
        </div>
    @endif

    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="formation-alert formation-error">
            <strong>Veuillez vérifier les informations :</strong>
            <ul style="padding-left:20px;margin-top:8px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- STATISTICS -->
    <div class="formation-stat">

        <div class="formation-stat-icon">
            <svg width="23" height="23" fill="none" stroke="currentColor"
                 stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
            </svg>
        </div>

        <div>
            <div class="formation-stat-number">
                {{ $formations->count() }}
            </div>

            <div class="formation-stat-text">
                Formation(s) enregistrée(s) / عدد التكوينات
            </div>
        </div>

    </div>

    <!-- FORMATIONS -->
    @if($formations->count() > 0)

        <div class="formations-grid">

            @foreach($formations as $formation)

                <article class="formation-card">

                    <div class="formation-card-top">

                        <div class="formation-icon">
                            <svg width="23" height="23" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 6.253v13"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.5 4.5A2.5 2.5 0 017 2h10a2.5 2.5 0 012.5 2.5V21l-7.5-3-7.5 3V4.5z"/>
                            </svg>
                        </div>

                        <span class="formation-number">
                            #{{ $loop->iteration }}
                        </span>

                    </div>

                    <!-- CATEGORY -->
                    <div class="formation-category">
                        {{ $formation->category ?: 'Sans catégorie' }}
                    </div>

                    <!-- NAME -->
                    <h2 class="formation-name">
                        {{ $formation->name }}
                    </h2>

                    <!-- DESCRIPTION -->
                    <div class="formation-description">
                        @if($formation->description)
                            {{ \Illuminate\Support\Str::limit($formation->description, 120) }}
                        @else
                            <span class="no-description">
                                Aucune description / لا يوجد وصف
                            </span>
                        @endif
                    </div>

                    <!-- VIDEO STATUS -->
                    @if($formation->video_path ?? false)
                        <div class="formation-video-badge">
                            <span>▶</span>
                            Vidéo disponible / فيديو متوفر
                        </div>
                    @endif

                    <!-- FOOTER -->
                    <div class="formation-footer">

                        <div class="formation-date">
                            Ajoutée le
                            {{ $formation->created_at ? $formation->created_at->format('d/m/Y') : '—' }}

                            <div class="formation-date-ar" dir="rtl">
                                تاريخ الإضافة
                            </div>
                        </div>

                        <div class="formation-actions">

                            <a
                                href="{{ route('admin.formations.edit', $formation) }}"
                                class="action-btn formation-edit"
                            >
                                ✎ Modifier / تعديل
                            </a>

                            <form
                                action="{{ route('admin.formations.destroy', $formation) }}"
                                method="POST"
                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette formation ?\nهل تريد فعلاً حذف هذا التكوين؟');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="action-btn formation-delete">
                                    × Supprimer / حذف
                                </button>
                            </form>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <!-- EMPTY STATE -->
        <div class="formation-empty">

            <div class="formation-empty-icon">
                <svg width="28" height="28" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6.253v13"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4.5 4.5A2.5 2.5 0 017 2h10a2.5 2.5 0 012.5 2.5V21l-7.5-3-7.5 3V4.5z"/>
                </svg>
            </div>

            <h2>Aucune formation pour le moment</h2>

            <div class="formation-empty-ar" dir="rtl">
                لا توجد تكوينات حالياً
            </div>

            <p>
                Commencez par ajouter votre première formation à la plateforme.
            </p>

            <a href="{{ route('admin.formations.create') }}"
               class="add-formation-btn empty-add-btn">
                + Ajouter une formation / إضافة تكوين
            </a>

        </div>

    @endif

</div>

</body>
</html>
