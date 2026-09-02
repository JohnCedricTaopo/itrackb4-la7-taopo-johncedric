<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact Characters</title>
</head>
<body>
    <h1>Genshin Impact Characters</h1>

    <p>John Cedric P. Taopo | 2023-70351</p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Character Name</th>
                <th>Element</th>
                <th>Weapon</th>
                <th>Rarity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($characters as $character)
                <tr>
                    <td>{{ $character['id'] }}</td>
                    <td>
                        <a href="{{ route('characters.show', $character['id']) }}">
                            {{ $character['name'] }}
                        </a>
                    </td>
                    <td>{{ $character['element'] }}</td>
                    <td>{{ $character['weapon'] }}</td>
                    <td>{{ $character['rarity'] }}-Star</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
