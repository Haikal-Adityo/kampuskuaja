<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block text-center items-center px-4 py-2 bg-[#2D4F8F] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#1A3A6B] hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#1A3A6B] focus:ring-opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
