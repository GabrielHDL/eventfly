<x-guest-layout>
    <style>
        .bg-wall {
            background: url('/assets/svg/wall_bck.svg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    {{-- Hero --}}
    <div class="h-screen bg-wall overflow-hidden">
        <div class="container h-full">
            <div class="grid sm:grid-cols-2 h-full">
                <div class="order-2 sm:order-1 flex justify-start sm:justify-center items-start flex-col text-white text-7xl sm:text-9xl">
                    <span class="font-novaBold">403</span>
                    <span class="font-novaSemiBold text-base sm:text-lg">{{__('Oops you better not be here... come home with us, NOW!')}}</span>
                    <a class="bg-white text-faluRed text-lg px-6 py-3 rounded-md shadow-md hover:bg-white/70 transition-all ease-linear mt-6" href="{{route('home')}}">{{__('Go home')}}</a>
                </div>
                <div class="mt-10 sm:mt-0 order-1 sm:order-2 flex justify-center sm:justify-end items-center">
                    <figure class="h-96 sm:h-full w-auto rounded-2xl overflow-hidden">
                        <img class="object-center object-cover h-full w-full"
                            src="{{ asset('assets/img/women_403.png') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    {{-- Ends Hero --}}
</x-guest-layout>