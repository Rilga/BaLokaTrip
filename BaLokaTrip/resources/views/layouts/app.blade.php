<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        .min-h-screen {
            margin: 0;
            padding: 0;
        }
        header {
            margin: 0;
            padding: 0;
            height: 0; /* If no content in header */
        }

        body {
            filter: invert(95%) hue-rotate(180deg);
        }

        img, video, iframe {
            filter: none !important;
        }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <script type="module" src="/nightowl.js"></script>
            <script type="module" src="https://cdn.jsdelivr.net/npm/@bufferhead/nightowl@0.0.14/dist/nightowl.js"></script>
            <script type="module">
                import { createNightowl } from '@bufferhead/nightowl'
            
                createNightowl({
                    defaultMode: 'dark',
                    toggleButtonMode: 'newState'
                })
            </script>
            
        </div>
        @include('layouts.footer')
    </body>
</html>
