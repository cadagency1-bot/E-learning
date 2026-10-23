
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4 landscape;
            margin: 15mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1e293b;
            text-align: center;
        }

        .certificate {
            border: 6px double #059669;
            padding: 35px;
            min-height: 400px;
        }

        .brand {
            font-size: 28px;
            font-weight: bold;
            color: #059669;
        }

        .subtitle {
            margin-top: 30px;
            font-size: 16px;
            letter-spacing: 3px;
        }

        h1 {
            color: #047857;
            font-size: 34px;
        }

        .student {
            margin: 25px 0;
            font-size: 29px;
            font-weight: bold;
        }

        .formation {
            margin: 20px 0;
            font-size: 23px;
            font-weight: bold;
        }

        .number {
            margin-top: 30px;
            font-size: 11px;
            color: #64748b;
        }

        .pending {
            margin-top: 20px;
            color: #b45309;
            font-weight: bold;
        }

        .active {
            margin-top: 20px;
            color: #047857;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="brand">ÉtudeEnLigne</div>

        <p class="subtitle">ATTESTATION DE RÉUSSITE</p>

        <h1>Certificat de formation</h1>

        <p>Ce certificat est destiné à :</p>

        <div class="student">
            {{ $certificate->name_on_certificate }}
        </div>

        <p>Pour avoir terminé la formation :</p>

        <div class="formation">
            {{ $certificate->formation->name ?? 'Formation' }}
        </div>

        <p>
            Date :
            {{ $certificate->issued_at?->format('d/m/Y') ?? $certificate->created_at?->format('d/m/Y') }}
        </p>

        <p class="number">
            Numéro : {{ $certificate->certificate_number }}
        </p>

        @if ($certificate->status === 'active')
            <p class="active">CERTIFICAT ACTIVÉ</p>
        @else
            <p class="pending">
                APERÇU — EN ATTENTE DE VALIDATION
            </p>
        @endif
    </div>
</body>
</html>
