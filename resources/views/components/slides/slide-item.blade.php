@props(['value' => null, 'route' => null])

@php
    $route = $route ?? 'javascript:void(0);';
    $value = $value ?? 'Slide';
@endphp

<!-- slide -->
<li>
    <a class="slide-item" href="{{ $route }}">{{ $value }}</a>
</li>
<!-- /slide -->
