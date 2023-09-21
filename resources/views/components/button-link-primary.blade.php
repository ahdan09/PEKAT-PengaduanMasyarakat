<a href="{{ $href }}" {{ $attributes->merge(['type' => 'button', 'class' => 'text-white bg-cyan-500 hover:bg-cyan-700 focus:ring-1 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:cyan-500 dark:hover:bg-cyan-600 focus:outline-none dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</a>
