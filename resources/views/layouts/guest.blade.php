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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <header class="border-b bg-white">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    <a href="{{ route('home') }}" class="font-semibold">MySite</a>
    <nav class="flex items-center gap-4">
      <a href="{{ route('home') }}" class="text-sm">Home</a>
      @auth
        @if(auth()->user()->role === 'superadmin')
          <a href="{{ route('superadmin.admins.index') }}" class="text-sm">Manage Admins</a>
        @endif
        <a href="{{ route('admin.contents.index') }}" class="text-sm">Manage Contents</a>
      @else
        <a href="{{ route('login') }}" class="text-sm">Login</a>
      @endauth
    </nav>
  </div>
</header>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
