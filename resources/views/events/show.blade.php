<x-app-layout>
    <div class="pt-16">
        <div class="w-full h-80 relative flex justify-center items-center"
            style="background: center no-repeat url('{{ Storage::url($event->images->first()->url) }}'); background-size: cover">
            <div class="bg-paradisePink/20 h-full w-full absolute top-0 left-0 right-0 z-0"></div>
            <h1 class="text-white text-5xl font-novaSemiBold relative z-10">{{ $event->name }}</h1>
        </div>
        <div class="container py-8">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-4">
                    <p class="text-paradisePink">{{ $event->description }}</p>
                    <span class="text-faluRed font-novaSemiBold">{{ $event->speaker }}</span>
                    <div class="pt-8">
                        <p class="text-gray-600">{{ $event->content }}</p>
                        <figure class="h-[40rem] flex justify-center items-center pt-10">
                            <img class="h-full w-auto object-contain object-center"
                                src="{{ Storage::url($event->images->last()->url) }}" alt="{{ $event->name }}">
                        </figure>
                    </div>
                </div>
                <div>
                    <div class="bg-white rounded-md shadow-md p-4 flex flex-col">
                        <span class="text-gray-800 font-novaBold text-lg">{{$event->name}}</span>
                        <span class="text-paradisePink font-novaSemiBold">{{$event->date}}</span>
                        <span class="text-gray-500">Followers: <span class="font-novaSemiBold">{{$event->followers}}</span></span>
                        <div class="flex justify-end my-3">
                            <span class="text-paradisePink font-novaBold text-xl">${{$event->price}}</span>
                        </div>
                        <div class="flex flex-col">
                            <button class="mb-2 inline-flex bg-faluRed transition-all ease-linear w-full py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-faluRed/70">
                                Add to Cart
                            </button>
                            <button class="inline-flex bg-paradisePink transition-all ease-linear w-full py-3 rounded-md text-white justify-center items-center font-novaSemiBold hover:bg-paradisePink/70">
                                Buy now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
