@extends('layouts.app')

@section('title', $element ? $element . ' Characters' : 'All Elements')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            @if ($element)
                <h2>Characters with the {{ $element }} element</h2>
                <p class="text-muted">
                    The archive is filtered to records matching your selected element.
                </p>
            @else
                <h2>Characters from all elements</h2>
                <p class="text-muted">
                    No element was selected, so every character is displayed.
                </p>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Character Name</th>
                            <th>Element</th>
                            <th>Weapon</th>
                            <th>Rarity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($characters as $character)
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
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No characters match “{{ $element }}”. Try another element.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <a class="btn btn-success" href="{{ route('characters.filter') }}">
                Show all elements
            </a>

            <a class="btn btn-outline-primary" href="{{ route('characters.index') }}">
                Back to archive
            </a>
        </div>
    </div>
@endsection