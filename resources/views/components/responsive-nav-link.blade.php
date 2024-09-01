@props(['active'])

@php
$classes = ($active ?? false)
            ? 'menu-link px-5'
            : 'menu-link px-5';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
