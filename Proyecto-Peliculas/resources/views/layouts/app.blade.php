<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css\Styles.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="row-container">
            <div class="columns">
                <img class="element-row poster" src="{{ asset('assets/images/poster2.jpg') }}" alt="poster1">
                <img class="element-row poster" src="{{ asset('assets/images/poster6.jpg') }}" alt="poster3">
            </div>
                              
            <!-- Page Content -->
            <main class="column2">
                {{ $slot }}
            </main>

            <div class="columns">
                <img class=" element-row poster" src="{{ asset('assets/images/poster4.jpg') }}" alt="poster2">
                <img class="element-row poster" src="{{ asset('assets/images/poster1.jpg') }}" alt="poster4">
            </div>
            </div>
        </div>
        <footer style="color: white; background-color: black;">
                Movies-Project JAGA 2024. Programación Para Internet D-12 Proyecto 2
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
