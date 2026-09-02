<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <p>John Cedric P. Taopo | 2023-70351</p>
    <title>Featured Character</title>
</head>
<body>
    <h1>Featured Character</h1>

    <h2>{{ $character['name'] }}</h2>

    <p><strong>ID:</strong> {{ $character['id'] }}</p>
    <p><strong>Character Name:</strong> {{ $character['name'] }}</p>
    <p><strong>Element:</strong> {{ $character['element'] }}</p>
    <p><strong>Weapon:</strong> {{ $character['weapon'] }}</p>
    <p><strong>Rarity:</strong> {{ $character['rarity'] }}-Star</p>


    <a href="{{ route('characters.show', $character['id']) }}">
        View full detail
    </a>

    <a href="{{ route('characters.index') }}">
        Back to the list
    </a>
</body>
</html>


