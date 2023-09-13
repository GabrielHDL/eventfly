<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">

        <div class="order-2 lg:order-1 xl:col-span-3">
            <div class="bg-white shadow-lg px-6 py-4 mb-6">
                <p class="text-platinum"><span class="font-saol font-bold">Order Number:</span>
                    Order-{{ $order->id }}</p>
            </div>

            <div class="bg-white shadow-lg p-6 text-platinum mb-6">
                <p class="text-xl mb-4 font-saol font-bold">Summary</p>

                <table class="table-auto w-full">
                    <thead class="font-proximaBold">
                        <tr>
                            <th></th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-deer">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                            alt="">
                                        <article>
                                            <h1 class="font-bold">{{ $item->name }}</h1>
                                            <div class="flex text-xs text-goldenrod">

                                                @isset($item->options->color)
                                                    Color: {{ __($item->options->color) }}
                                                @endisset

                                                @isset($item->options->size)
                                                    - {{ $item->options->size }}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center">
                                    ${{ $item->price }} USD
                                </td>

                                <td class="text-center">
                                    {{ $item->qty }}
                                </td>

                                <td class="text-center">
                                    ${{ $item->price * $item->qty }} USD
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>

        <div class="order-1 lg:order-2 xl:col-span-2">
            <div class="bg-white shadow-lg p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div class="text-platinum flex text-4xl sm:text-5xl gap-3 items-center">
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i>
                        <i class="fa-brands fa-cc-amex"></i>
                    </div>
                    <div class="text-platinum">
                        <p class="text-lg uppercase text-goldenrod font-proximaBold">
                            Total: ${{ $order->total }} USD
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg text-platinum relative">
                <div wire:loading.flex class="absolute bg-deer h-full w-full flex-col justify-center items-center z-50">
                    <span class="text-platinum loading loading-bars loading-lg"></span>
                    <span class="mt-6 text-platinum font-proximaBold">Processing, please wait...</span>
                </div>
                <div class="flex items-start justify-center flex-col w-full">
                    <div class="bg-slate-900/20 w-full h-full px-6 pt-6 pb-2 border-b border-deer">
                        <h1 class="font-saol font-bold text-xl mb-4">Payment Methods</h1>
                    </div>
                    <div class="px-6 flex flex-col w-full">
                        <div class="my-4">
                            <div wire:ignore>
                                <input id="card-holder-name" placeholder="Cardholder Name"
                                    class="mb-4 bg-gray-50 border border-deer text-faluRed text-sm focus:ring-deer focus:border-deer block w-full p-2.5">

                                <!-- Stripe Elements Placeholder -->
                                <div id="card-element"
                                    class="mb-2 bg-gray-50 border border-deer text-faluRed text-sm focus:ring-deer focus:border-deer block w-full p-2.5">
                                </div>
                                <span id="card-error-message" class="text-goldenrod text-sm"></span>
                            </div>
                            <button wire:target="addPaymentMethod" wire:loading.attr="disabled"
                                class="mt-3 btn w-full ml-auto bg-goldenrod hover:bg-deer text-white border-none rounded-none"
                                id="card-button" data-secret="{{ $intent->client_secret }}">
                                Add Payment Method
                            </button>
                        </div>
                        <ul class="w-full divide-y divide-deer">
                            @foreach ($paymentMethods as $paymentMethod)
                                <li class="flex gap-4 items-center h-full py-2 w-full">
                                    <label class="flex h-full w-full items-center gap-3" for="">
                                        <input wire:model="paymentMethodId"
                                            class="text-goldenrod focus:boder-deer focus:ring-deer" type="radio"
                                            name="paymentMethod" value="{{ $paymentMethod->id }}">
                                        <div class="flex w-full justify-between items-center">
                                            <div class="flex gap-2 items-center">
                                                @switch($paymentMethod->card->brand)
                                                    @case('visa')
                                                        <i class="fa-brands fa-cc-visa text-3xl"></i>
                                                    @break

                                                    @case('mastercard')
                                                        <i class="fa-brands fa-cc-mastercard text-3xl"></i>
                                                    @break

                                                    @case('amex')
                                                        <i class="fa-brands fa-cc-amex text-3xl"></i>
                                                    @break

                                                    @case('discover')
                                                        <i class="fa-brands fa-cc-discover text-3xl"></i>
                                                    @break

                                                    @case('diners')
                                                        <i class="fa-brands fa-cc-diners-club text-3xl"></i>
                                                    @break

                                                    @case('jcb')
                                                        <i class="fa-brands fa-cc-jcb text-3xl"></i>
                                                    @break

                                                    @default
                                                        <i class="fa-brands fa-cc-stripe text-3xl"></i>
                                                @endswitch
                                                {{ $paymentMethod->billing_details->name }}
                                            </div>
                                            <div class="flex items-center">
                                                @if ($this->defaultPaymentMethod->id == $paymentMethod->id)
                                                    <span
                                                        class="mr-3 bg-amber-500 uppercase text-sm px-4 py-0.5 text-amber-700">
                                                        default
                                                    </span>
                                                @endif
                                                (xxxx-{{ $paymentMethod->card->last4 }})
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if (count($paymentMethods))
                        <div class="bg-slate-900/20 h-full w-full flex px-6 py-4">
                            <button wire:click="purchase" wire:target="purchase" wire:loading.attr="disabled"
                                class="btn ml-auto bg-goldenrod hover:bg-deer text-white border-none rounded-none"
                                id="card-button">
                                Pay Order
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');
        </script>

        <script>
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');

            cardButton.addEventListener('click', async (e) => {

                cardButton.disabled = true;

                const clientSecret = cardButton.dataset.secret;

                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                );

                cardButton.disabled = false;

                if (error) {
                    let span = document.getElementById('card-error-message');
                    span.textContent = error.message;
                } else {
                    cardHolderName.value = '';
                    cardElement.clear();

                    @this.addPaymentMethod(setupIntent.payment_method);
                }
            });
        </script>
    @endpush
</div>
