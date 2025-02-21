<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100">
        <!-- Contenedor principal -->
        <div class="flex items-center justify-center h-full p-6">
            <div class="w-full max-w-md bg-black/40 backdrop-blur-sm p-8 rounded-2xl border border-gray-800">
                <!-- Logo -->
                <div class="text-center mb-6">
                    {{ $logo ?? '' }}
                </div>

                <!-- Contenido -->
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

