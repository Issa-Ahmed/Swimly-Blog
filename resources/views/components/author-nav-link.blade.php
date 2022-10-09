@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-4 py-2 mt-2 text-lg font-semibold text-white bg-teal-400 rounded-lg dark:bg-teal-400'
            : 'block px-4 py-2 mt-2 text-lg font-semibold text-white  rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
