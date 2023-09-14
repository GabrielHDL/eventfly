<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-20">

        <div class="order-2 lg:order-1 xl:col-span-3">
            <div class="bg-white shadow-lg px-6 py-4 mb-6 rounded-md">
                <p class="text-faluRed"><span class="font-saol font-bold">Order Number:</span>
                    Order-{{ $order->id }}</p>
            </div>

            <div class="bg-white shadow-lg p-6 text-faluRed mb-6 rounded-md">
                <p class="text-xl mb-4 font-saol font-bold">Summary</p>

                <table class="table-auto w-full">
                    <thead class="font-novaBold">
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
            <div class="bg-white shadow-lg p-6 mb-6 rounded-md">
                <div class="flex justify-between items-center">
                    <div class="text-faluRed flex text-4xl sm:text-5xl gap-3 items-center">
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i>
                        <i class="fa-brands fa-cc-amex"></i>
                    </div>
                    <div class="text-paradisePink">
                        <p class="text-lg uppercase font-novaBold">
                            Total: ${{ $order->total }} USD
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg text-faluRed relative rounded-md">
                <div wire:loading.flex class="absolute bg-paradisePink h-full w-full flex-col justify-center items-center z-50">
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-600/50 animate-spin fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                    <span class="mt-6 text-white font-novaBold">Processing, please wait...</span>
                </div>
                <div class="flex items-start justify-center flex-col w-full">
                    <div class="bg-paradisePink w-full h-full px-6 pt-6 pb-2 border-b border-deer">
                        <h1 class="text-white font-novaBold text-xl mb-4">Payment Methods</h1>
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
                                class="mt-3 btn w-full ml-auto mb-2 inline-flex bg-faluRed transition-all ease-linear py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70"
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
                                                        class="mr-3 bg-paradisePink rounded-md uppercase text-sm px-4 py-0.5 text-white">
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
                        <div class="bg-faluRed h-full w-full flex px-6 py-4">
                            <button wire:click="purchase" wire:target="purchase" wire:loading.attr="disabled"
                                class="btn ml-auto inline-flex bg-paradisePink transition-all ease-linear py-3 px-6 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-paradisePink/70"
                                id="card-button">
                                Pay Order
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    @push('script')
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
