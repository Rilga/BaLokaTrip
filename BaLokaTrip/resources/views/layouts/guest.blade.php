<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="images/logo.png" rel="shortcut icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            body {
                filter: invert(95%) hue-rotate(180deg);
            }
            img, video, iframe {
                filter: none !important;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- nav --}}
        @include('layouts.nav')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/" class="nightowl-daylight">
                    <img src="{{ asset('images/logo.svg') }}" class="w-20 h-20 fill-current" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <script type="module" src="/nightowl.js"></script>
        <script type="module" src="https://cdn.jsdelivr.net/npm/@bufferhead/nightowl@0.0.14/dist/nightowl.js"></script>
        <script type="module">
            import { createNightowl } from '@bufferhead/nightowl'
        
            createNightowl({
                defaultMode: 'dark',
                toggleButtonMode: 'newState'
            })
        </script>
    </body>
</html>
