<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Characters</title>
</head>
<body>
    @if ($element )
        <p>John Cedric P. Taopo | 2023-70351</p>
        <h1>Characters with {{ $element }} element</h1>
        <p>Only characters matching this element are shown.</p>
    @else
        <p>John Cedric P. Taopo | 2023-70351</p>
        <h1>All Characters</h1>
        <p>No filter value was supplied, so all characters are shown.</p>
    @endif

    @if (count($characters) > 0)
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
                        <td>{{ $character['rarity']}}-Star</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No characters match the selected value.</p>
    @endif

</body>
</html>
