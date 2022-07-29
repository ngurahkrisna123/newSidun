<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Sistem Informasi Dusun') }}</title> -->
        <title>SIDUN</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <div class="md:flex  md:inset-y-0 md:left-0 bg-white md:w-44">
            @include('layouts.sidebar')

            </div>

            <div class="flex-1 ">
                
                @include('layouts.navigation')

                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @stack('scripts')
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
                @include('layouts.footer')
            </div>
            
        </div>

    </body>
</html>
