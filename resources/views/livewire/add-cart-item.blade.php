<div x-data>
    <p>
        <span class="font-semibold text-lg">Tickets available:</span> {{$quantity}}
    </p>
    <div class="flex items-center pb-5 border-b-2 border-paradisePink mb-5">
    </div>
    <div class="flex flex-col justify-center">
        <div class="flex items-center mb-2">
            <div class="mr-2 flex items-center">
                <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                    wire:target="decrement" wire:click="decrement">
                    -
                </x-secondary-button>
                <span class="mx-2">{{ $qty }}</span>
                <x-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                    wire:target="increment" wire:click="increment" wire:click="increment">
                    +
                </x-secondary-button>
            </div>
            <button x-bind:disabled="$wire.qty > $wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                wire:target="addItem"
                class="disabled:bg-opacity-50 disabled:text-white/70 inline-flex bg-faluRed transition-all ease-linear w-full py-3 px-4 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70">Add
                to Cart
            </button>
        </div>
        <div>
            @auth
                <button wire:click="buyNow"
                        x-bind:disabled="$wire.qty > $wire.quantity"
                        wire:loading.attr="disabled"
                        wire:target="buyNow"
                        class="disabled:bg-opacity-50 disabled:text-white/70 mb-2 inline-flex bg-paradisePink transition-all ease-linear w-full py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-paradisePink/70">Buy Now
                </button>
                @if (auth()->user()->hasDefaultPaymentMethod())
                <button wire:click="oneClickPay"
                        x-bind:disabled="$wire.qty > $wire.quantity"
                        wire:loading.attr="disabled"
                        wire:target="oneClickPay"
                        class="disabled: relative w-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden font-novaSemiBold text-paradisePink rounded-md group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <span class="relative w-full py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                        One Click Pay®
                    </span>
                </button>
                <span class="text-faluRed {{$qty > $quantity ? 'hidden' : ''}}">Total for One Click Pay®: <span class="font-novaSemiBold text-paradisePink">${{$qty * $event->price}} USD</span></span>
                @endif
            @endauth
        </div>
    </div>
</div>
