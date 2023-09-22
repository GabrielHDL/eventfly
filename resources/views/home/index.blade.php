<x-app-layout>
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
                <div class="order-2 sm:order-1 flex justify-start sm:justify-center items-start flex-col text-white text-5xl sm:text-7xl">
                    <span class="font-novaBold">Eventos</span>
                    <div>
                        <span class="typed-text"></span><span class="cursor-type">&nbsp;</span>
                    </div>
                </div>
                <div class="mt-10 sm:mt-0 order-1 sm:order-2 flex justify-end items-center">
                    <figure class="h-80 sm:h-96 w-auto rounded-2xl overflow-hidden">
                        <img class="object-center object-cover h-full w-full"
                            src="{{ asset('assets/img/hero_img.jpg') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    {{-- Ends Hero --}}
    <div class="container">
        <div class="bg-white rounded-xl p-8 shadow-lg grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3 relative -top-10 sm:-top-16">
            @foreach ($categories as $category)
            <a href="{{route('categories.show', $category)}}" class="bg-faluRed h-40 rounded-xl text-center flex justify-center items-center relative overflow-hidden">
                <div class="h-full w-full">
                    <img class="h-full w-full object-center object-cover" src="{{Storage::url($category->image)}}" alt="">
                </div>
                <div class="absolute top-0 left-0 h-full w-full bg-black/30 flex justify-center items-center">
                    <span class="text-white text-lg font-novaBold">{{$category->name}}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="container">
        @livewire('events-grid')
    </div>
    @push('script')
        <script>
            const typedTextSpan = document.querySelector(".typed-text");
            const cursorSpan = document.querySelector(".cursor-type");

            const textArray = ["de tecnología.", "de salud.", "de desarrollo personal.", "increibles.", "en tu ciudad."];
            const typingDelay = 70;
            const erasingDelay = 50;
            const newTextDelay = 1500;
            let textArrayIndex = 0;
            let charIndex = 0;

            function type() {
                if (charIndex < textArray[textArrayIndex].length) {
                    if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                    typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                    charIndex++;
                    setTimeout(type, typingDelay);
                } else {
                    cursorSpan.classList.remove("typing");
                    setTimeout(erase, newTextDelay);
                }
            }

            function erase() {
                if (charIndex > 0) {
                    if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                    typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
                    charIndex--;
                    setTimeout(erase, erasingDelay);
                } else {
                    cursorSpan.classList.remove("typing");
                    textArrayIndex++;
                    if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                    setTimeout(type, typingDelay + 1100);
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                if (textArray.length) setTimeout(type, newTextDelay + 200);
            });
        </script>
    @endpush
</x-app-layout>
