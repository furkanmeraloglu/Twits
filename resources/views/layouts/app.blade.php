<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="https://kit.fontawesome.com/dcd8b6ca00.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
    </head>
    <body class="bg-grey-light font-sans">
        <div class="bg-white">
            <div class="container mx-auto flex flex-col lg:flex-row items-center py-4">
            @include('layouts.navigation')
        </div>
            
            <!-- Page Content -->
            <main>
               
                {{ $slot }}

            </main>

    </body>
</html>
