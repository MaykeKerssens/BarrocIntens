@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border-b-2 border-yellow text-gray-900 focus:outline-none focus:border-yellow-dark transition duration-150 ease-in-out'
            : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
