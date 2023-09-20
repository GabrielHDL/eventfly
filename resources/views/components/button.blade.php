<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-faluRed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-paradisePink focus:bg-paradisePink active:bg-faluRed focus:outline-none focus:ring-2 focus:ring-paradisePink focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
