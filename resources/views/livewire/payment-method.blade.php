<div>
    <section class="bg-white text-faluRed shadow mb-12 rounded-md overflow-hidden">
        <div class="px-8 py-6">
            <h1 class="font-saol font-bold text-lg mb-4">Add Payment Method</h1>
            <div class="flex" wire:ignore>
                <p class="mr-6 font-proximaBold">Card Information</p>
                <div class="flex-1">
                    <input id="card-holder-name" placeholder="Cardholder Name"
                        class="mb-4 bg-gray-50 border border-faluRed text-paradisePink text-sm focus:ring-deer focus:border-faluRed block w-full p-2.5">

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"
                        class="mb-2 bg-gray-50 border border-faluRed text-paradisePink text-sm focus:ring-deer focus:border-faluRed block w-full p-2.5">
                    </div>
                    <span id="card-error-message" class="text-goldenrod text-sm"></span>
                </div>
            </div>
        </div>

        <footer class="px-8 py-6 w-full flex bg-faluRed border-t border-faluRed">
            <button class="btn ml-auto inline-flex bg-paradisePink transition-all ease-linear py-3 px-6 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-paradisePink/70" id="card-button"
                data-secret="{{ $intent->client_secret }}">
                Update Payment Method
            </button>
        </footer>
    </section>

    <div class="mb-12 justify-center" wire:target="addPaymentMethod" wire:loading.flex>
        <svg aria-hidden="true" class="w-8 h-8 mr-2 text-faluRed/70 animate-spin fill-paradisePink" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>

    @if (count($paymentMethods))
        <section class="bg-white text-faluRed shadow ropunded-md">
            <header class="px-8 py-6 bg-paradisePink border-b border-faluRed">
                <h1 class="font-novaBold text-white text-lg mb-4">Payment Methods</h1>
            </header>
            <div class="px-8 py-6">
                <ul class="divide-y divide-deer">
                    @foreach ($paymentMethods as $paymentMethod)
                        <li class="py-2 flex gap-4 items-center" wire:key="{{ $paymentMethod->id }}">
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
                            <div class="flex w-full justify-between items-center">
                                <div>
                                    <p><span
                                            class="font-saol font-bold">{{ $paymentMethod->billing_details->name }}</span>
                                        xxxx-{{ $paymentMethod->card->last4 }}</p>
                                    <p>Expires:
                                        {{ $paymentMethod->card->exp_month }}/{{ $paymentMethod->card->exp_year }}
                                    </p>
                                </div>
                                <div class="flex space-x-4">
                                    @if ($this->defaultpaymentMethod->id != $paymentMethod->id)
                                    <button wire:click="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                        wire:target="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                        wire:loading.attr="disabled"
                                        class="bg-gray-500 uppercase text-sm px-4 py-0.5 text-gray-700 disabled:opacity-25 disabled:cursor-wait">
                                        default
                                    </button>
                                    <button
                                        class="cursor-pointer disabled:opacity-25 disabled:cursor-wait hover:text-red-500"
                                        wire:click="deletePaymentMethod('{{ $paymentMethod->id }}')"
                                        wire:target="deletePaymentMethod('{{ $paymentMethod->id }}')"
                                        wire:loading.attr="disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 duration-150">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    @else
                                    <button wire:click="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                        wire:target="defaultPaymentMethod('{{ $paymentMethod->id }}')"
                                        disabled
                                        class="cursor-default bg-amber-500 uppercase text-sm px-4 py-0.5 text-amber-700">
                                        default
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

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
