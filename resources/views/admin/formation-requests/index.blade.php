<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Demandes de formations - ÉtudeEnLigne</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 7%;
        }

        .logo {
            color: #10b981;
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
        }

        .back {
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .back:hover {
            color: #10b981;
        }

        .page {
            padding: 45px 7%;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .requests {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.05);
        }

        .student {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #ecfdf5;
            color: #059669;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;
            font-size: 18px;
        }

        .student h3 {
            font-size: 15px;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .student p {
            font-size: 12px;
            color: #64748b;
        }

        .formation-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            padding: 16px;
            margin-bottom: 18px;
        }

        .formation-label {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .formation-name {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
        }

        .phone {
            margin-top: 7px;
            font-size: 12px;
            color: #64748b;
        }

        .status {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .status-pending {
            background: #fff7ed;
            color: #c2410c;
        }

        .status-active {
            background: #ecfdf5;
            color: #047857;
        }

        .status-rejected {
            background: #fef2f2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions form {
            flex: 1;
        }

        .button {
            width: 100%;
            height: 43px;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .activate {
            background: #10b981;
            color: white;
        }

        .activate:hover {
            background: #059669;
        }

        .reject {
            background: #fee2e2;
            color: #b91c1c;
        }

        .reject:hover {
            background: #fecaca;
        }

        .empty {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 50px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 12px;
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 20px;
            }

            .page {
                padding: 30px 20px;
            }

            .requests {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

    <nav class="navbar">

        <a href="{{ route('admin.dashboard') }}" class="logo">
            ÉtudeEnLigne
        </a>

        <a href="{{ route('admin.dashboard') }}" class="back">
            ← Retour à l'administration
        </a>

    </nav>


    <main class="page">

        <div class="header">

            <h1>
                Demandes de formations
            </h1>

            <p>
                Consultez les demandes des étudiants et gérez leur accès aux formations.
            </p>

        </div>


        @if (session('success'))

            <div class="alert success">
                {{ session('success') }}
            </div>

        @endif


        @if (session('error'))

            <div class="alert error">
                {{ session('error') }}
            </div>

        @endif


        @if ($requests->count())

            <div class="requests">

                @foreach ($requests as $request)

                    <div class="card">

                        <div class="student">

                            <div class="avatar">
                                {{ strtoupper(substr($request->user_name, 0, 1)) }}
                            </div>

                            <div>

                                <h3>
                                    {{ $request->user_name }}
                                </h3>

                                <p>
                                    {{ $request->user_email }}
                                </p>

                            </div>

                        </div>


                        <div class="formation-box">

                            <div class="formation-label">
                                FORMATION DEMANDÉE
                            </div>

                            <div class="formation-name">
                                🎓 {{ $request->formation_name }}
                            </div>

                            @if ($request->whatsapp_phone)

                                <div class="phone">
                                    WhatsApp : {{ $request->whatsapp_phone }}
                                </div>

                            @endif

                        </div>


                        @if ($request->status === 'pending')

                            <div class="status status-pending">
                                ⏳ En attente
                            </div>

                        @elseif ($request->status === 'active')

                            <div class="status status-active">
                                ✓ Accès actif
                            </div>

                        @else

                            <div class="status status-rejected">
                                ✕ Refusée
                            </div>

                        @endif


                        @if ($request->status === 'pending')

                            <div class="actions">

                                <form
                                    method="POST"
                                    action="{{ route('admin.formation-requests.activate', $request->id) }}"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="button activate"
                                    >
                                        ✓ Activer l'accès
                                    </button>

                                </form>


                                <form
                                    method="POST"
                                    action="{{ route('admin.formation-requests.reject', $request->id) }}"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="button reject"
                                    >
                                        ✕ Refuser
                                    </button>

                                </form>

                            </div>

                        @endif

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    📚
                </div>

                <p>
                    Aucune demande de formation pour le moment.
                </p>

            </div>

        @endif

    </main>

</body>

</html>