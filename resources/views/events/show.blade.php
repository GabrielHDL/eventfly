<x-app-layout>
    <div class="w-full h-80 relative flex justify-center items-center" style="background: center no-repeat url('{{Storage::url($event->images->first()->url)}}'); background-size: cover">
        <div class="bg-paradisePink/20 h-full w-full absolute top-0 left-0 right-0 z-0"></div>
        <h1 class="text-white text-5xl font-novaSemiBold relative z-10">{{$event->name}}</h1>
    </div>
    <div class="container py-8">
        <p class="text-paradisePink">{{$event->description}}</p>
        <span class="text-faluRed font-novaSemiBold">{{$event->speaker}}</span>
        <div class="pt-8">
            <p class="text-gray-600">{{$event->content}}</p>
            <figure class="h-[40rem] flex justify-center items-center pt-10">
                <img class="h-full w-auto object-contain object-center" src="{{Storage::url($event->images->last()->url)}}" alt="{{$event->name}}">
            </figure>
        </div>
    </div>
</x-app-layout>