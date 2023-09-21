<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-black bg-white hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-white dark:hover:bg-slate-200 dark:focus:ring-slate-300']) }}>
    {{ $slot }}
</button>
