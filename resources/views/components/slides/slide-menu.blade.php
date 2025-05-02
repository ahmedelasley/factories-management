
@props(['value' => null])

@php
    $value = $value ?? 'Slide';
@endphp

<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="javascript:void(0);">
        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
        <span class="side-menu__label">{{ $value }}</span>
        <i class="angle fe fe-chevron-down"></i>
    </a>
    <ul class="slide-menu">
        {{ $slot }}
    </ul>
</li>
