<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=sora:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center px-6 py-12">
            <div class="mb-6">
                <a href="/" class="nav-brand">
                    <x-application-logo class="w-12 h-12 fill-current text-slate-700" />
                    <span class="nav-title">{{ config('app.name', 'Gym Tracker') }}</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md card p-8 fade-up">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
