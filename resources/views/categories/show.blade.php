<x-app-layout>
    <div class="container pt-24">
        <div class="mb-10 relative h-[30rem] w-full rounded-xl overflow-hidden shadow-lg">
            <figure class="h-[30rem] w-full rounded-xl overflow-hidden relative z-[2]">
                <img class="h-full w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="{{$category->name}}">
            </figure>
            <div class="bg-faluRed/40 absolute h-full w-full top-0 right-0 z-10 flex justify-center items-center">
                <h1 class="text-white font-novaBold text-7xl">{{$category->name}}</h1>
            </div>
        </div>
        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>