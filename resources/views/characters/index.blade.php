@extends('layouts.app')

@section('title', 'All Characters')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1">Genshin Impact collection</p>
                    <h2 class="mb-1">Character Archive</h2>
                    <p class="text-muted mb-0">Select a character name to open its individual detail page.</p>
                </div>
                <a class="btn btn-primary" href="{{ route('characters.featured') }}">View featured</a>
            </div>

            <div class="alert alert-info">
                <strong>Active filters:</strong>
                Element: {{ $element === 'all' ? 'All elements' : $element }} |
                Rarity: {{ $rarity === 'all' ? 'All rarities' : $rarity . '-Star' }}
            </div>

            <div class="mb-4">
                <h5>Filter by element</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-secondary btn-sm"
                       href="{{ route('characters.index', ['rarity' => $rarity !== 'all' ? $rarity : null]) }}">
                        All elements
                    </a>

                    @foreach (['Anemo', 'Cryo', 'Electro', 'Pyro', 'Dendro', 'Hydro'] as $elementOption)
                        <a class="btn {{ $element === $elementOption ? 'btn-primary' : 'btn-outline-primary' }} btn-sm"
                           href="{{ route('characters.index', [
                               'element' => $elementOption,
                               'rarity' => $rarity !== 'all' ? $rarity : null,
                           ]) }}">
                            {{ $elementOption }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <h5>Filter by rarity</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-secondary btn-sm"
                       href="{{ route('characters.index', ['element' => $element !== 'all' ? $element : null]) }}">
                        All rarities
                    </a>

                    @foreach ([4, 5] as $rarityOption)
                        <a class="btn {{ (string) $rarity === (string) $rarityOption ? 'btn-warning' : 'btn-outline-warning' }} btn-sm"
                           href="{{ route('characters.index', [
                               'element' => $element !== 'all' ? $element : null,
                               'rarity' => $rarityOption,
                           ]) }}">
                            {{ $rarityOption }}-Star
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <a class="btn btn-success btn-sm" href="{{ route('characters.index') }}">
                    Clear both filters
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Character Name</th>
                            <th scope="col">Element</th>
                            <th scope="col">Weapon</th>
                            <th scope="col">Rarity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($characters as $character)
                            <tr class="{{ $character['rarity'] >= 5 ? 'table-warning' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $character['id'] }}</td>
                                <td>
                                    <a href="{{ route('characters.show', $character['id']) }}">
                                        {{ $character['name'] }}
                                    </a>
                                </td>
                                <td>{{ $character['element'] }}</td>
                                <td>{{ $character['weapon'] }}</td>
                                <td>
                                    @if ($character['rarity'] >= 5)
                                        <span class="badge text-bg-warning">5-Star Featured</span>
                                    @else
                                        <span class="badge text-bg-secondary">{{ $character['rarity'] }}-Star</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No characters match the selected filters.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection