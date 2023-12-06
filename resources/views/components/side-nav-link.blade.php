@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-2 pt-2 text-md font-md leading-5 text-white-500 focus:outline-none transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-medium leading-5 text-gray-400 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>