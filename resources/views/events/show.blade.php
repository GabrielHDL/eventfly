<x-app-layout>
    <div class="w-full h-80">
        <figure class="h-full w-full">
            <img class="object-center object-cover h-full w-full" src="{{Storage::url($event->images->first()->url)}}" alt="{{$event->name}}">
        </figure>
    </div>
    <div class="container py-8">
        <h1 class="text-faluRed text-3xl font-novaSemiBold">{{$event->name}}</h1>
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