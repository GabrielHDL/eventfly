<div>
    @php
        use Carbon\Carbon;
    @endphp
    {{-- Menu --}}
    <div class="font-novaSemiBold text-gray-600">
        <ul class="flex gap-6 mb-6">
            <li class="py-2 text-sm">
                <a class="cursor-pointer hover:text-goldenrod capitalize {{ $categorySlug === 'all' ? 'text-faluRed font-novaBold underline-offset-[10px] decoration-4 underline decoration-paradisePink' : 'hover:text-paradisePink' }}"
                    wire:click="$set('categorySlug', 'all')">{{ __('All') }}
                </a>
            </li>
            @foreach ($categories as $category)
                <li class="py-2 text-sm">
                    <a class="cursor-pointer hover:text-goldenrod capitalize {{ $categorySlug === $category->slug ? 'text-faluRed font-novaBold underline-offset-[10px] decoration-4 underline decoration-paradisePink' : 'hover:text-paradisePink' }}"
                        wire:click="$set('categorySlug', '{{ $category->slug }}')">{{ $category->name }}
                    </a>
                </li>
            @endforeach
            <li class="py-2 text-sm">
                <a class="cursor-pointer hover:text-goldenrod capitalize {{ $categorySlug === 'hoy' ? 'text-faluRed font-novaBold underline-offset-[10px] decoration-4 underline decoration-paradisePink' : 'hover:text-paradisePink' }}"
                    wire:click="$set('categorySlug', 'hoy')">{{ __('Hoy') }}
                </a>
            </li>
        </ul>
    </div>
    {{-- Ends Menu --}}
    {{-- Events Grid --}}
    <div class="min-h-screen">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Events Cards --}}
            @foreach ($events as $event)
                <article class="bg-white shadow-lg rounded-lg">
                    {{-- Card Image --}}
                    <figure class="h-40 w-auto rounded-t-lg overflow-hidden mb-4">
                        <a href="{{ route('events.show', $event) }}">
                            <img class="object-cover object-center h-full w-full"
                                src="{{ Storage::url($event->images->first()->url) }}" alt="{{ $event->name }}">
                        </a>
                    </figure>
                    {{-- Ends Card Image --}}
                    {{-- Card Info --}}
                    <div class="flex flex-col pb-4 px-4">
                        <a href="{{ route('events.show', $event) }}"
                            class="text-gray-600 font-novaSemiBold text-2xl">{{ $event->name }}</a>
                        <span class="text-paradisePink font-novaSemiBold">{{Carbon::parse($event->date)->diffForHumans()}}</span>
                        <span class="text-gray-600 mb-2">{{ $event->location }}</span>
                        <span class="text-faluRed">{{ $event->speaker }}</span>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <div class="flex items-center gap-2">
                                <svg class="fill-gray-500 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path
                                        d="M96,128A128,128,0,1,1,224,256,128,128,0,0,1,96,128ZM0,482.3A178.26,178.26,0,0,1,178.3,304h91.4A178.26,178.26,0,0,1,448,482.3,29.7,29.7,0,0,1,418.3,512H29.7A29.7,29.7,0,0,1,0,482.3ZM609.3,512H471.4a64,64,0,0,0,8.6-32v-8a199.54,199.54,0,0,0-69.8-151.8c2.4-.1,4.7-.2,7.1-.2h61.4A161.28,161.28,0,0,1,640,481.3,30.71,30.71,0,0,1,609.3,512ZM432,256a111.77,111.77,0,0,1-79.3-32.9,160.06,160.06,0,0,0,13-169.4A112,112,0,1,1,432,256Z" />
                                </svg>

                                <span class="text-gray-500">{{ $event->attendees }} {{ __('attendees') }}</span>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="text-paradisePink font-novaSemiBold">${{ $event->price }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- Ends Card Info --}}
                </article>
            @endforeach
            {{-- Ends Events Cards --}}
        </div>
        <div class="py-6">
            {{ $events->links() }}
        </div>
    </div>
</div>
