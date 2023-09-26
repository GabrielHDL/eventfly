<x-app-layout>
    <div class="container flex justify-center items-center">
        <div class="pt-20 max-w-md w-full">
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
                                <div class="absolute rounded-full w-5 h-5 bg-coolGray -mt-2 -left-2"></div>
                                <div class="absolute rounded-full w-5 h-5 bg-coolGray -mt-2 -right-2"></div>
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
                                <div class="flex justify-center items-center mt-2">
                                    {!! QrCode::color(255, 255, 255)->backgroundCOlor(127,33,33)->size(100)->generate($ticket->id) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>