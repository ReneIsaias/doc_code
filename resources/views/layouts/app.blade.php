<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Agregamos un icono a la aplicación web --}}
    <link rel="icon" href="{{ asset('favicons/favicon-16x16.png')}}">
    <!-- Title -->
    <title>
        {{ config('app.name', 'Codeway') }} | @yield('title_postfix')
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
    {{-- Esta clase permite que el sidebar se oculte casi por completo, solo quedan los iconos  --}}
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            {{-- Navbar || Navegador --}}
            @include('layouts.navbar')

            {{-- Sidebar || Aside --}}
            @include('layouts.aside')

            {{-- Main || Menu --}}
            <main role="main">
                <section class="content-wrapper">

                    {{-- Content Header --}}
                    <div {{-- class="content" --}}>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @yield('content_header')
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- content --}}
                    <div {{-- class="content" --}}>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </main>

            {{-- Otro Aside --}}
            <aside class="control-sidebar control-sidebar-dark d-none">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </aside>

            {{-- Footer || Pie de Página --}}
            {{-- @include('layouts.footer') --}}

        </div>

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
