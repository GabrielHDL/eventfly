<footer class="bg-paradisePink h-96">
    <div class="container h-full">
        <div class="grid sm:grid-cols-3 h-full">
            <div class="flex justify-center sm:justify-start items-center">
                <x-logo color="text-white hover:text-white/80 transition-all ease" size="h-[8rem]" />
            </div>
            <div class="flex flex-col justify-center items-center text-center text-white font-novaSemiBold">
                <a href="#">{{__('Home')}}</a>
                <a href="#">{{__('Contact')}}</a>
            </div>
            <div class="flex justify-center sm:justify-end items-center gap-4 text-3xl text-white">
                <a target="_blank" href="#"><i class="hover:text-white/80 transition-all ease-linear hover:-translate-y-1 fa-brands fa-facebook"></i></a>
                <a target="_blank" href="#"><i class="hover:text-white/80 transition-all ease-linear hover:-translate-y-1 fa-brands fa-instagram"></i></a>
                <a target="_blank" href="#"><i class="hover:text-white/80 transition-all ease-linear hover:-translate-y-1 fa-brands fa-x-twitter"></i></a>
                <a target="_blank" href="#"><i class="hover:text-white/80 transition-all ease-linear hover:-translate-y-1 fa-brands fa-tiktok"></i></a>
            </div>
        </div>
        <div class="flex justify-center items-center text-center text-faluRed font-novaSemiBold h-16 bg-white">
            <p>eventfly® ©{{date('Y')}} | {{__('All rights reserved')}} | {{__('made with ❤️ by')}} <a class="text-paradisePink hover:underline" href="https://houdle.com" target="_blank">Houdle®</a></p>
        </div>
    </div>
</footer>