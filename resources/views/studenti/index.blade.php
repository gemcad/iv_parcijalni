<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Popis studenata</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Popis studenata</h1>
    @if (session('success'))
        <p style="background: #dcfce7; color: #166534; padding: 12px;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ route('studenti.create') }}" >Dodaj studenta</a>
        <a href="{{ route('studenti.statistika') }}">Statistika</a>
    </p>
    @if ($studenti->isEmpty())
        <p>Trenutno nema unesenih studenata.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Status</th>
                    <th>Godište</th>
                    <th>Prosjek</th>
                    <th>Stipendija</th>
                    <th>Akcije</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($studenti as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->ime }}</td>
                        <td>{{ $student->prezime }}</td>
                        <td>{{ $student->status }}</td>
                        <td>{{ $student->godiste }}</td>
                        <td>{{ $student->prosjek }}</td>
                        <td>{{ $student->stipendija }} €</td>
                        <td>
                            <a href="{{ route('studenti.edit', $student) }}">Uredi</a>
                            <form method="POST" action="{{ route('studenti.destroy', $student) }}" style="display: inline;" onsubmit="return confirm('Želite li stvarno obrisati ovog studenta?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Obriši
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>