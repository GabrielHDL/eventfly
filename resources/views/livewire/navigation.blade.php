<nav class="bg-white fixed top-0 w-full shadow z-[999]" x-data="{ open: false, mobileOpen: false }">
    <div class="container">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button x-on:click="mobileOpen = ! mobileOpen" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-paradisePink hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg :class="mobileOpen ? 'hidden' : 'block h-6 w-6'" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="mobileOpen ? 'block h-6 w-6' : 'hidden'" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <a href="/"><img class="h-8 w-auto" src="{{ asset('assets/logos/logo_color.svg') }}"
                            alt="Eventfly"></a>
                </div>
                {{-- Desktop Nav --}}
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                      @foreach ($navigation as $item)
                        <a href="{{ $item['url'] }}" class="{{ $item['active'] ? 'bg-faluRed text-coolGray rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-600 hover:bg-paradisePink hover:text-white rounded-md px-3 py-2 text-sm font-medium' }}">{{ __($item['title']) }}</a>
                      @endforeach
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                
                @livewire('dropdown-cart')

                <div class="relative ml-3">
                    <div>
                            @auth
                            <button x-on:click="open = ! open" @click.away="open = false" @close.stop="open = false" type="button"
                            class="relative flex rounded-full bg-faluRed text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-faluRed"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full object-cover object-center" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </button>
                            @else
                            <button x-on:click="open = ! open" @click.away="open = false" @close.stop="open = false" type="button"
                            class="relative flex rounded-full bg-faluRed h-8 w-8 justify-center items-center text-gray-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-faluRed"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa-solid fa-user-astronaut"></i>
                            </button>
                            @endauth
                    </div>
                    {{-- Profile Menu --}}
                    <div :class="{ 'hidden': !open }"
                        class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        x-show="open" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        @auth
                            @role('admin')
                                <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-paradisePink {{ request()->routeIs('admin.home') ? 'bg-gray-100' : '' }}" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Admin Dashboard')}}</a>
                            @endrole
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-paradisePink {{ request()->routeIs('profile.show') ? 'bg-gray-100' : '' }}" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Your Profile')}}</a>
                            <a href="{{ route('billings.index') }}" class="block px-4 py-2 text-sm text-paradisePink {{ request()->routeIs('billings.index') ? 'bg-gray-100' : '' }}" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Billing')}}</a>
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-paradisePink {{ request()->routeIs('orders.index') ? 'bg-gray-100' : '' }}" role="menuitem" tabindex="-1" id="user-menu-item-0">{{__('Orders')}}</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-paradisePink" role="menuitem" tabindex="-1" id="user-menu-item-2">{{__('Sign out')}}</a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-paradisePink"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">{{ __('Login') }}</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-paradisePink"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">{{ __('Register') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile Nav --}}
    <div class="hidden sm:hidden" :class="{ 'hidden': !mobileOpen }" @click.away="mobileOpen = false" @close.stop="mobileOpen = false" id="mobile-menu" x-show="mobileOpen">
        <div class="space-y-1 px-2 pb-3 pt-2">
          @foreach ($navigation as $item)
            <a href="{{$item['url']}}" class="{{$item['active'] ? 'bg-faluRed text-white block rounded-md px-3 py-2 text-base font-medium' : 'text-gray-600 hover:bg-paradisePink hover:text-white block rounded-md px-3 py-2 text-base font-medium'}}" aria-current="page">{{__($item['title'])}}</a>
          @endforeach
        </div>
    </div>
</nav>
