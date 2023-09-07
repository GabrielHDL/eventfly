<nav class="bg-white fixed top-0 w-full shadow z-[999]" x-data="{ open: false, mobileOpen: false, notification: false }">
    <div class="container">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button x-on:click="mobileOpen = ! mobileOpen" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-paradisePink hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg :class="mobileOpen ? 'hidden' : 'block h-6 w-6'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg :class="mobileOpen ? 'block h-6 w-6' : 'hidden'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <a href="/"><img class="h-8 w-auto" src="{{asset('assets/logos/logo_color.svg')}}" alt="Eventfly"></a>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-faluRed text-white", Default: "text-gray-600 hover:bg-paradisePink hover:text-white" -->
              <a href="/" class="{{ request()->routeIs('home') ? 'bg-faluRed text-coolGray rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-600 hover:bg-paradisePink hover:text-white rounded-md px-3 py-2 text-sm font-medium' }}">Home</a>
              <a href="{{route('events.index')}}" class="{{ request()->routeIs('events.index') ? 'bg-faluRed text-coolGray rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-600 hover:bg-paradisePink hover:text-white rounded-md px-3 py-2 text-sm font-medium' }}">Events</a>
              <a href="#" class="text-gray-600 hover:bg-paradisePink hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
              <a href="#" class="text-gray-600 hover:bg-paradisePink hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button x-on:click="notification = ! notification" type="button" class="relative rounded-full bg-faluRed p-1 text-gray-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-faluRed">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>

          <div x-show="notification" :class="{ 'hidden': ! notification }" class="hidden absolute right-12 top-12 z-10 mt-2 px-8 py-5 flex justify-center items-center origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <p class="text-paradisePink">You don't have notifications yet</p>
          </div>
  
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button x-on:click="open = ! open" type="button" class="relative flex rounded-full bg-faluRed text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-faluRed" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                @auth
                  <img class="h-8 w-8 rounded-full object-cover object-center" src="{{auth()->user()->profile_photo_url}}" alt="">
                @else
                  <img class="h-8 w-8 rounded-full object-cover object-center" src="{{asset('assets/img/profile_img.jpeg')}}" alt="">
                @endauth
              </button>
            </div>
  
            <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div :class="{ 'hidden': ! open }" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" x-show="open" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
            @auth
              <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-paradisePink {{ request()->routeIs('profile.show') ? 'bg-gray-100' : '' }}" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-paradisePink" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-paradisePink" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </form>
            @else
              <a href="{{route('login')}}" class="block px-4 py-2 text-sm text-paradisePink" role="menuitem" tabindex="-1" id="user-menu-item-1">{{__('Login')}}</a>
              <a href="{{route('register')}}" class="block px-4 py-2 text-sm text-paradisePink" role="menuitem" tabindex="-1" id="user-menu-item-1">{{__('Register')}}</a>
            @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden sm:hidden" :class="{ 'hidden': ! mobileOpen }" id="mobile-menu" x-show="mobileOpen">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-faluRed text-white", Default: "text-gray-600 hover:bg-paradisePink hover:text-white" -->
        <a href="#" class="bg-faluRed text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
        <a href="#" class="text-gray-600 hover:bg-paradisePink hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
        <a href="#" class="text-gray-600 hover:bg-paradisePink hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
        <a href="#" class="text-gray-600 hover:bg-paradisePink hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav>  
