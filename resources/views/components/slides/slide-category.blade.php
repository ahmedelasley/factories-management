@props(['value' => null])

@php
    $value = $value ?? 'Slide';
@endphp

<!-- slide -->
<li class="side-item side-item-category">{{ $value }}</li>
<!-- /slide -->
