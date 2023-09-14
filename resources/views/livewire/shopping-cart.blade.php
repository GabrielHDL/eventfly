<div>
    <div class="min-h-screen pt-20">
        <h1 class="mb-10 text-center text-2xl font-novaBold text-faluRed">Cart Items</h1>
        @if (Cart::count())
            <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="md:w-2/3">
                    @foreach (Cart::content() as $item)
                        <div class="justify-between mb-6 bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="{{ $item->options->image }}" alt="product-image"
                                class="w-full sm:w-40 object-cover object-center" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-paradisePink font-saol">{{ $item->name }}</h2>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">

                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))

                                    <div class="flex items-center space-x-4 text-paradisePink">
                                        <p class="text-sm text-faluRed">${{ $item->price * $item->qty }}</p>
                                        <svg wire:click="delete('{{ $item->rowId }}')"
                                            wire:loading.class="text-red-600 opacity-25"
                                            wire:target="delete('{{ $item->rowId }}')"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Total -->
                <div class="mt-6 h-full border bg-white p-6 shadow-md md:mt-0 md:w-1/3 text-goldenrod">
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div>
                            <p class="mb-1 text-lg font-bold">${{ Cart::subtotal() }} USD</p>
                            <p class="text-sm text-paradisePink">including VAT</p>
                        </div>
                    </div>
                    <button wire:click="createOrder"
                            wire:loading.attr="disabled"
                            wire:target="createOrder"
                            class="mt-6 inline-flex disabled:bg-faluRed/50 bg-faluRed transition-all ease-linear w-full py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70">Create
                        Order</button>
                </div>
            </div>
        @else
            <div class="container flex justify-center items-center min-h-[50vh] flex-col">
                <span class="text-3xl font-novaSemiBold text-paradisePink font-bold">There's nothing in your
                    cart...</span>
                <a class="mt-8 inline-flex bg-faluRed transition-all ease-linear px-6 py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70"
                    href="{{ route('home') }}">Add items</a>
            </div>
        @endif
    </div>
</div>
