@extends('layouts.app')

@section('title', 'All Characters')

@section('content')
    <table class="table table-striped table-primary" border="1" cellpadding="8">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Element</th>
            <th>Weapon</th>
            <th>Rarity</th>
        </tr>

        @forelse ($characters as $character)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    <a href="{{ route('characters.show', $character['id']) }}">
                        {{ $character['name'] }}
                    </a>
                </td>

                <td>{{ $character['element'] }}</td>
                <td>{{ $character['weapon'] }}</td>

                <td>
                    @if ($character['rarity'] >= 5)
                        <p class="text-warning fw-bold">5-Star Character</p>
                    @else
                        <p class="text-secondary">{{ $character['rarity'] }}-Star Character</p>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    <b>No Character Found</b>
                </td>
            </tr>
        @endforelse
    </table>
@endsection
