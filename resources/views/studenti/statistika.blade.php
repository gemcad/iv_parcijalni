<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Statistika studenata</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            background: #64748b;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Statistika studenata</h1>

    <p>
        <a href="{{ route('studenti.index') }}" class="button">
            Povratak na popis
        </a>
    </p>

    @if ($statistika->isEmpty())
        <p>Nema podataka za prikaz statistike.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Broj studenata</th>
                    <th>Prosječni prosjek</th>
                    <th>Ukupne stipendije</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($statistika as $red)
                    <tr>
                        <td>{{ ucfirst($red->status) }}</td>

                        <td>{{ $red->broj_studenata }}</td>

                        <td>
                            {{ number_format((float) $red->prosjecni_prosjek, 2, ',', '.') }}
                        </td>

                        <td>
                            {{ number_format((float) $red->ukupne_stipendije, 2, ',', '.') }} €
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>