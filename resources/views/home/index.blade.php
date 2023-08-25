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
                <div class="flex justify-center items-start flex-col text-white text-7xl">
                    <span class="font-novaBold">Eventos</span>
                    <div>
                        <span class="typed-text"></span><span class="cursor-type">&nbsp;</span>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <figure class="h-96 w-auto rounded-2xl overflow-hidden">
                        <img class="object-center object-cover h-full w-full"
                            src="{{ asset('assets/img/hero_img.jpg') }}" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    {{-- Ends Hero --}}
    <div class="container">
        <div class="bg-white rounded-xl p-8 shadow-lg grid grid-cols-6 gap-3 relative -top-16">
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Tecnología</span>
            </div>
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Salud</span>
            </div>
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Deportes</span>
            </div>
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Desarrollo Personal</span>
            </div>
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Aficiones</span>
            </div>
            <div class="bg-faluRed h-40 rounded-xl flex justify-center items-center">
                <span class="text-white font-novaBold">Negocios</span>
            </div>
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
