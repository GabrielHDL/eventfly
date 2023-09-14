<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">


        <div class="bg-white shadow px-12 py-8 mb-6 flex flex-col items-center justify-center text-platinum">

            @if ($order->status == 3)
                <div class="bg-red-700 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fa-regular fa-circle-xmark text-xl text-white"></i>
                </div>
                <p class="mt-2">Canceled</p>
            @else
                <div
                    class="{{ $order->status >= 2 && $order->status != 3 ? 'bg-paradisePink' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="mt-2">Paid</p>
            @endif

        </div>




        <div class="bg-white shadow px-6 py-4 mb-6 flex items-center">
            <p class="text-platinum"><span class="font-bold font-saol">Order Number:</span>
                Order-{{ $order->id }}</p>

            @if ($order->status == 1)
                <a class="ml-auto text-white bg-goldenrod hover:bg-deer px-4 py-1 btn rounded-none border-none"
                    href="{{ route('orders.payment', $order) }}">
                    Go to pay
                </a>
            @endif
        </div>

        <div class="bg-white shadow p-6 text-platinum mb-6">
            <p class="text-xl font-bold font-saol mb-4">Summary</p>

            <table class="table-auto w-full">
                <thead>
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

</x-app-layout>
