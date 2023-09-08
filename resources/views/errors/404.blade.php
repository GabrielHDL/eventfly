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
    <div class="h-screen bg-wall">
        <div class="container h-full">
            <div class="grid sm:grid-cols-2 h-full">
                <div class="order-2 sm:order-1 flex justify-start sm:justify-center items-start flex-col text-white text-7xl sm:text-9xl">
                    <span class="font-novaBold">404</span>
                    <span class="font-novaSemiBold text-base sm:text-lg">{{__('Probably you are looking for something amazing in eventfly, dont worry! come home with us')}}</span>
                    <a class="bg-white text-faluRed text-lg px-6 py-3 rounded-md shadow-md hover:bg-white/70 transition-all ease-linear mt-6" href="{{route('home')}}">{{__('Go home')}}</a>
                </div>
                <div class="mt-10 sm:mt-0 order-1 sm:order-2 flex justify-end items-center">
                    <figure class="h-full w-auto rounded-2xl overflow-hidden">
                        <img class="object-center object-cover h-full w-full"
                            src="{{ asset('assets/img/man_404.png') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    {{-- Ends Hero --}}
</x-guest-layout>