<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    @font-face {
        font-family: 'novabold';
        src: url('/assets/fonts/metropolis-bold-webfont.woff2') format('woff2'),
            url('/assets/fonts/metropolis-bold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }

    @font-face {
        font-family: 'novaregular';
        src: url('/assets/fonts/metropolis-regular-webfont.woff2') format('woff2'),
            url('/assets/fonts/metropolis-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }

    @font-face {
        font-family: 'novasemibold';
        src: url('/assets/fonts/metropolis-semibold-webfont.woff2') format('woff2'),
            url('/assets/fonts/metropolis-semibold-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }
</style>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-coolGray">
        @livewire('navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <x-footer />

    @stack('modals')

    @stack('script')

    @livewireScripts
</body>

</html>
