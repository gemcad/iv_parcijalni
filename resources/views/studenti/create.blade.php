<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dodaj studenta</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .field-error {
            color: #dc2626;
            margin-top: 5px;
            font-size: 14px;
        }

        button,
        a {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
        }

        button {
            border: 0;
            background: #2563eb;
            color: white;
            cursor: pointer;
        }

        a {
            background: #64748b;
            color: white;
            margin-left: 8px;
        }
    </style>
</head>

<body>
    <h1>Dodaj novog studenta</h1>

    @if ($errors->any())
        <div class="error-box">
            <strong>Ispravite sljedeće greške:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('studenti.store') }}">
        @csrf

        <div class="form-group">
            <label for="ime">Ime</label>

            <input
                type="text"
                id="ime"
                name="ime"
                value="{{ old('ime') }}"
                required
            >

            @error('ime')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prezime">Prezime</label>

            <input
                type="text"
                id="prezime"
                name="prezime"
                value="{{ old('prezime') }}"
                required
            >

            @error('prezime')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="">Odaberite status</option>

                <option
                    value="redovni"
                    @selected(old('status') === 'redovni')
                >
                    Redovni
                </option>

                <option
                    value="izvanredni"
                    @selected(old('status') === 'izvanredni')
                >
                    Izvanredni
                </option>
            </select>

            @error('status')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="godiste">Godište</label>

            <input
                type="number"
                id="godiste"
                name="godiste"
                min="1980"
                max="{{ date('Y') }}"
                value="{{ old('godiste') }}"
                required
            >

            @error('godiste')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prosjek">Prosjek</label>

            <input
                type="number"
                id="prosjek"
                name="prosjek"
                min="1"
                max="5"
                step="0.01"
                value="{{ old('prosjek') }}"
                required
            >

            @error('prosjek')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stipendija">Stipendija (€)</label>

            <input
                type="number"
                id="stipendija"
                name="stipendija"
                min="0"
                step="0.01"
                value="{{ old('stipendija', 0) }}"
                required
            >

            @error('stipendija')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Spremi studenta</button>

        <a href="{{ route('studenti.index') }}">
            Odustani
        </a>
    </form>
</body>
</html>