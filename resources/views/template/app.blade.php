<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Meta -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Agregamos un icono a la aplicación web --}}
        <link rel="icon" href="{{ asset('favicons/favicon.png')}}">
        <!-- Title -->
        <title>
            {{ config('app.name', 'Laravel') }} | @yield('title_postfix')
        </title>

        {{-- Compilado --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        {{-- Css --}}
        @yield('css')

        <!-- Livewire -->
        @livewireStyles

    </head>

    {{-- Cuerpo || Body --}}
    <body>
        
        {{-- Navbar || Navegador --}}
        @include('template.navbar')

        {{-- Main || Menu --}}
        <main>

            @yield('content')
            
        </main>

        {{-- Compilado --}}
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>

        {{-- Toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- js --}}
        @yield('js')

        {{-- Livewire --}}
        @livewireScripts

    </body>
</html>
