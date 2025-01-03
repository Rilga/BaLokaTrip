<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- meta for seo --}}
    @yield('meta')

    {{-- title --}}
    @yield('title')

    {{-- style --}}
    @yield('style')
    <link href="images/logo.png" rel="shortcut icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            filter: invert(95%) hue-rotate(180deg);
        }
        img, video, iframe {
            filter: none !important;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    
    {{-- nav --}}
    @include('layouts.nav')

    {{-- content --}}
    @yield('content')

    {{-- script --}}
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/nightowl.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@bufferhead/nightowl@0.0.14/dist/nightowl.js"></script>
    <script type="module">
        import { createNightowl } from '@bufferhead/nightowl'
    
        createNightowl({
            defaultMode: 'dark',
            toggleButtonMode: 'newState'
        })
    </script>
    @include('layouts.footer')
</body>
</html>