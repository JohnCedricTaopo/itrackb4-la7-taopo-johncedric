@php
    $charactersSectionActive = request()->is('characters*');
@endphp

<nav class="nav nav-pills gap-2" aria-label="Main navigation">
    <a class="nav-link {{ $charactersSectionActive ? 'active bg-primary text-white' : 'bg-primary text-white' }}"
       href="{{ route('characters.index') }}">
        All Characters
    </a>

    <a class="nav-link {{ request()->is('characters/featured') ? 'active bg-secondary text-white' : 'bg-secondary text-white' }}"
       href="{{ route('characters.featured') }}">
        Featured Character
    </a>

    <a class="nav-link {{ request()->is('characters/filter*') ? 'active bg-success text-white' : 'bg-success text-white' }}"
       href="{{ route('characters.filter') }}">
        Old Filter Redirect
    </a>
</nav>