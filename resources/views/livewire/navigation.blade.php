<header class="fixed top-0 left-0 w-full"> 
    <nav class="container h-20 grid grid-cols-3">

        <div class="flex justify-start items-center">
            <x-logo />
        </div>

        <div class="flex justify-center items-center">
            <ul class="flex gap-4 text-white font-semibold text-sm sm:text-base">
                <li><a href="{{route('home')}}">Inicio</a></li>
                <li><a href="{{route('events')}}">Eventos</a></li>
                <li>Tickets</li>
            </ul>
        </div>

        <div class="flex justify-end items-center">
            <a href="#" class="bg-white text-faluRed py-1 px-2 sm:px-4 rounded-md font-semibold hover:bg-gradient-to-r hover:from-faluRed hover:to-paradisePink hover:text-white transition-all ease-linear">
                Descarga la app
            </a>
        </div>

    </nav>
</header>
