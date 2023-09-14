<div x-data>
    <button x-bind:disabled="$wire.qty > $wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
        wire:target="addItem"
        class="disabled:bg-opacity-50 disabled:text-white/70 mb-2 inline-flex bg-faluRed transition-all ease-linear w-full py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70">Add
        to Cart</button>
</div>
