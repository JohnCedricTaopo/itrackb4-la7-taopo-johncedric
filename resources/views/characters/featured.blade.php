@extends('layouts.app')

@section('title', 'Featured Character')

@section('content')
    <div class="card border-warning shadow-sm">
        <div class="card-header bg-warning-subtle">
            Featured character
        </div>

        <div class="card-body">
            <h2 class="card-title">{{ $character['name'] }}</h2>
            <p class="card-text">
                This character was selected as the featured record for the archive.
            </p>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">
                    <strong>ID:</strong> {{ $character['id'] }}
                </li>
                <li class="list-group-item">
                    <strong>Element:</strong> {{ $character['element'] }}
                </li>
                <li class="list-group-item">
                    <strong>Weapon:</strong> {{ $character['weapon'] }}
                </li>
                <li class="list-group-item">
                    <strong>Rarity:</strong> {{ $character['rarity'] }}-Star
                </li>
            </ul>

            <a class="btn btn-warning" href="{{ route('characters.show', $character['id']) }}">
                Open full detail
            </a>

            <a class="btn btn-outline-secondary" href="{{ route('characters.index') }}">
                Back to archive
            </a>
        </div>
    </div>
@endsection