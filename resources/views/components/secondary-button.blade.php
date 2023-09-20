<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-faluRed rounded-md font-semibold text-xs text-paradisePink hover:text-white uppercase tracking-widest shadow-sm hover:bg-faluRed focus:outline-none focus:ring-2 focus:ring-faluRed focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
