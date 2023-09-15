<div x-data="{ notification: false }">
    @if (Cart::count())
        <div class="bg-paradisePink text-white text-xs flex justify-center items-center rounded-full h-4 w-4 absolute z-10 top-2 right-10">
            {{ Cart::count() }}
        </div>
    @endif
    <button x-on:click="notification = ! notification" @click.away="notification = false"
        @close.stop="notification = false" type="button"
        class="relative rounded-full bg-faluRed p-1 h-8 w-8 text-gray-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-faluRed">
        <i class="text-sm fa-solid fa-cart-shopping"></i>
    </button>

    <div x-show="notification" :class="{ 'hidden': !notification }"
        class="hidden absolute right-12 top-12 z-10 mt-2 {{ Cart::count() ? 'pt-0 pb-3 px-3' : 'p-3' }} flex flex-col justify-center items-center origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

        @if (Cart::count())
            <ul>
                @foreach (Cart::content() as $item)
                    <li
                        class="border-b-paradisePink {{ $loop->last ? 'pt-3' : 'border-b-2 py-3' }} flex gap-3 items-center">
                        <img class="h-10 w-10 object-cover object-center" src="{{ $item->options->image }}"
                            alt="">
                        <p class="text-faluRed font-novaSemiBold">{{ $item->name }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="w-full">
                <a class="inline-flex bg-faluRed text-white py-2 w-full items-center justify-center rounded-md mt-6 hover:bg-paradisePink transition-all ease-linear"
                    href="{{ route('shopping-cart') }}">View Cart</a>
            </div>
        @else
            <p class="text-paradisePink">Nothing here...</p>
        @endif

    </div>
</div>
