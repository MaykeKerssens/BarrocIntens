<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellow border border-transparent font-semibold text-xs text-gray-800 tracking-widest hover:bg-yellow-light focus:bg-yellow-light active:bg-yellow-dark transition ease-in-out duration-150 drop-shadow-md']) }}>
    {{ $slot }}
</button>
