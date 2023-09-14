<div class="container py-20 grid">

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-rifleGreen text-platinum shadow">
            <div class="bg-slate-900/30 pt-4 pb-2 px-6 border-b border-deer">
                <p class="mb-3 text-lg text-platinum font-bold font-saol">Summary</p>
            </div>

            <div class="pt-4 px-6 pb-6">
                <ul>
                    @forelse (Cart::content() as $item)
                        <li class="flex p-2 border-b border-gray-200">
                            <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">

                            <article class="flex-1">
                                <h1 class="font-bold font-saol">{{ $item->name }}</h1>

                                <div class="flex text-goldenrod">
                                    <p>Cant: {{ $item->qty }}</p>
                                </div>

                                <p>${{ $item->price }} USD</p>
                            </article>
                        </li>
                    @empty
                        <li class="py-6 px-4">
                            <p class="text-center text-platinum">
                                There's nothing in your cart...
                            </p>
                        </li>
                    @endforelse
                </ul>

                <hr class="mt-4 mb-3">

                <div class="text-platinum">
                    <p class="flex justify-between items-center font-semibold text-goldenrod">
                        <span class="text-lg">Total</span>
                        ${{ Cart::subtotal() }} USD
                    </p>
                </div>
                <div>
                    <x-button wire:loading.attr="disabled" wire:target="create_order"
                        class="mt-6 mb-4 btn rounded-none border-none focus:ring-deer focus:border-deer"
                        wire:click="create_order">
                        Check Out
                    </x-button>
        
                    <hr class="border-deer border-[1.5px]">
        
                    <p class="text-sm mt-2">By purchasing you agree to the eventfly <a target="_blank"
                            href="{{ route('terms.show') }}" class="font-semibold text-goldenrod">Terms of Service</a> and <a
                            target="_blank" href="{{ route('policy.show') }}" class="font-semibold text-goldenrod">Privacy
                            Policy</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
