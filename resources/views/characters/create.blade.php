@extends('layouts.app')

@section('title', 'Add Character')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-4">
                <p class="text-uppercase text-primary fw-semibold small mb-1">Character archive</p>
                <h2 class="mb-1">Add a New Character</h2>
                <p class="text-muted mb-0">Complete all fields to add a character to the archive.</p>
            </div>

            <form method="POST" action="{{ route('characters.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Character Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="element" class="form-label">Element</label>
                    <select class="form-select @error('element') is-invalid @enderror" name="element" id="element">
                        <option value="">Choose an element</option>
                        @foreach (['Anemo', 'Cryo', 'Electro', 'Pyro', 'Dendro', 'Hydro'] as $elementOption)
                            <option value="{{ $elementOption }}" @selected(old('element') === $elementOption)>
                                {{ $elementOption }}
                            </option>
                        @endforeach
                    </select>
                    @error('element')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="weapon" class="form-label">Weapon</label>
                    <select class="form-select @error('weapon') is-invalid @enderror" name="weapon" id="weapon">
                        <option value="">Choose a weapon</option>
                        @foreach (['Sword', 'Claymore', 'Polearm', 'Catalyst', 'Bow'] as $weaponOption)
                            <option value="{{ $weaponOption }}" @selected(old('weapon') === $weaponOption)>
                                {{ $weaponOption }}
                            </option>
                        @endforeach
                    </select>
                    @error('weapon')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="rarity" class="form-label">Rarity</label>
                    <select class="form-select @error('rarity') is-invalid @enderror" name="rarity" id="rarity">
                        <option value="">Choose a rarity</option>
                        @foreach ([4, 5] as $rarityOption)
                            <option value="{{ $rarityOption }}" @selected((string) old('rarity') === (string) $rarityOption)>
                                {{ $rarityOption }}-Star
                            </option>
                        @endforeach
                    </select>
                    @error('rarity')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Character</button>
                    <a class="btn btn-outline-secondary" href="{{ route('characters.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection