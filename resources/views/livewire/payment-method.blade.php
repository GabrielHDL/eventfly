<div>
    <section class="bg-white text-faluRed shadow mb-12">
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

        <footer class="px-8 py-6 w-full flex bg-slate-900/20 border-t border-faluRed">
            <button class="btn ml-auto bg-faluRed hover:bg-deer text-white border-none rounded-none" id="card-button"
                data-secret="{{ $intent->client_secret }}">
                Update Payment Method
            </button>
        </footer>
    </section>

    <div class="mb-12 justify-center" wire:target="addPaymentMethod" wire:loading.flex>
        <span class="loading loading-dots loading-lg"></span>
    </div>

    @if (count($paymentMethods))
        <section class="bg-white text-faluRed shadow">
            <header class="px-8 py-6 bg-slate-900/20 border-b border-faluRed">
                <h1 class="font-saol font-bold text-lg mb-4">Payment Methods</h1>
            </header>
            <div class="px-8 py-6">
                <ul class="divide-y divide-deer">
                    @foreach ($paymentMethods as $paymentMethod)
                        <li class="py-2 flex gap-4 items-center" wire:key="{{$paymentMethod->id}}">
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
