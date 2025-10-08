<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col">
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center">
                            <a href="{{ route('home') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                            <a href="{{ route('home') }}" class="ml-3 text-xl font-semibold text-gray-800">
                                {{ config('app.name', 'MySite') }}
                            </a>
                        </div>

                        <nav class="flex items-center space-x-6">
                            <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 font-medium">Home</a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 font-medium">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg text-sm">
                                    Login Admin
                                </a>
                            @endauth
                        </nav>
                    </div>
                </div>
            </header>

            <main class="flex-grow">
                <div class="w-full sm:max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            <footer class="bg-white border-t mt-auto">
                <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'MySite') }}. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>