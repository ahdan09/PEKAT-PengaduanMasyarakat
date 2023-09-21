@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-cyan-600 dark:border-white text-md font-semibold leading-5 text-gray-900 dark:text-white focus:outline-none focus:border-cyan-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-semibold leading-5 text-gray-100 dark:text-gray-100 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-100 dark:hover:border-gray-100 focus:outline-none focus:text-gray-700 dark:focus:text-gray-200 focus:border-gray-300 dark:focus:border-gray-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
