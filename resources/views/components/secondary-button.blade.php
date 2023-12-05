<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-300 font-semibold text-xs text-gray-800 tracking-widest shadow-sm hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-400 transition ease-in-out duration-150 drop-shadow-md']) }}>
    {{ $slot }}
</button>
