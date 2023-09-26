<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">


        <div class="bg-white shadow px-12 py-8 mb-6 flex flex-col items-center justify-center text-platinum">

            @if ($order->status == 3)
                <div class="bg-red-700 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fa-regular fa-circle-xmark text-xl text-white"></i>
                </div>
                <p class="mt-2">Canceled</p>
            @elseif($order->status == 1)
                <div class="bg-gray-400 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fa-solid fa-clock text-white"></i>
                </div>
                <p class="mt-2">Pending</p>
            @elseif($order->status == 2)
                <div class="bg-paradisePink rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="mt-2">Paid</p>
            @endif

        </div>




        <div class="bg-white shadow px-6 py-4 mb-6 flex items-center">
            <p class="text-platinum"><span class="font-bold font-saol">Order Number:</span>
                Order-{{ $order->id }}</p>

            @if ($order->status == 1)
                <a class="ml-auto inline-flex items-center px-4 py-2 bg-faluRed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-paradisePink focus:bg-paradisePink active:bg-faluRed focus:outline-none focus:ring-2 focus:ring-paradisePink focus:ring-offset-2 transition ease-in-out duration-150"
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

        @if ($tickets->count())
        <div class="bg-white shadow p-6 text-platinum mb-6">
            <p class="text-xl font-bold font-saol mb-4">Tickets</p>
            <div class="grid sm:grid-cols-2 md:grid-cols-3">
                @foreach ($tickets as $ticket)
                <div class="flex flex-col">
                    <div class="bg-faluRed relative rounded-3xl p-4 m-2 overflow-hidden">
                        <div class="flex-none sm:flex">
                            <div class="flex-auto justify-evenly">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center  my-1">
                                        <span class="mr-3 rounded-full h-10 w-auto">
                                            <x-logo size="h-9" link="{{route('tickets.show', $ticket)}}" />
                                        </span>
                                    </div>
                                    <div class="ml-auto text-white font-novaSemiBold uppercase">{{substr($ticket->id, -6)}}</div>
                                </div>
                                <div class="border-dashed border-paradisePink border-b-2 my-5"></div>
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <div class="w-full flex-none text-lg text-white font-bold mb-2 leading-none">
                                            {{$ticket->event_name}}
                                        </div>
                                        <div class="text-xs text-white">{{$ticket->event_date}}</div>

                                    </div>
                                </div>
                                <div class="border-dashed border-paradisePink border-b-2 my-5 pt-5">
                                    <div class="absolute rounded-full w-5 h-5 bg-white -mt-2 -left-2"></div>
                                    <div class="absolute rounded-full w-5 h-5 bg-white -mt-2 -right-2"></div>
                                </div>
                                <div class="flex flex-col justify-center p-5 text-sm">
                                    <div class="flex flex-col mb-2">
                                        <div class="w-full flex-none text-lg text-white font-bold mb-2 leading-none">
                                            {{$ticket->event_name}}
                                        </div>
                                        <div class="text-xs text-white">{{$ticket->event_date}}</div>

                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm text-white">{{Str::limit($ticket->event_description, 70)}}</span>
                                        <div class="font-novaBold mt-4 text-center text-paradisePink text-lg">${{$ticket->event_price}}</div>
                                    </div>
                                </div>
                                <div class="flex flex-col pb-5 justify-center text-sm ">
                                    <h6 class="font-bold text-center text-white">Ticket Code</h6>
                                    <a href="{{route('tickets.show', $ticket)}}" class="flex justify-center items-center mt-2">
                                        {!! QrCode::color(255, 255, 255)->backgroundCOlor(127,33,33)->size(100)->generate($ticket->id) !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    </div>

</x-app-layout>
