@extends('layouts.app')

@section('title', $character['name'] . ' Details')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <p class="text-uppercase text-primary fw-semibold small mb-1">
                Character detail
            </p>

            <h2 class="card-title">{{ $character['name'] }}</h2>
            <p class="card-text text-muted">
                Complete information for character ID {{ $character['id'] }}.
            </p>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <small class="text-muted d-block">ID</small>
                        <strong>{{ $character['id'] }}</strong>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <small class="text-muted d-block">Element</small>
                        <strong>{{ $character['element'] }}</strong>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <small class="text-muted d-block">Weapon</small>
                        <strong>{{ $character['weapon'] }}</strong>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border rounded p-3 h-100">
                        <small class="text-muted d-block">Rarity</small>
                        <strong>{{ $character['rarity'] }}-Star</strong>
                    </div>
                </div>
            </div>

            <a class="btn btn-primary" href="{{ route('characters.index') }}">
                Back to all characters
            </a>

            <a class="btn btn-outline-secondary" href="{{ route('characters.featured') }}">
                Featured page
            </a>
        </div>
    </div>
@endsection