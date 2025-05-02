@props(['value' => null, 'route' => null, 'path' => null])

@php
    $route = $route ?? 'javascript:void(0);';
    // $path = $path ?? 'javascript:void(0);';
    $value = $value ?? 'Slide';
@endphp

<!-- slide -->
<li class="slide">
    <a class="side-menu__item" href="{{ $route }}">
        @if ($path)
        <img class="side-menu__icon" viewBox="0 0 24 24" src="{{ $path }}" alt="{{ $value }}" >
        @endif
        <span class="side-menu__label"> {{ $value }}</span>
        {{-- <span class="badge badge-success side-badge">1</span> --}}
    </a>
</li>
<!-- /slide -->
