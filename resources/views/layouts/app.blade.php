<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
      />
        <!-- Favicon-->
        <link rel="stylesheet" href="{{ asset('assets/theme/vendor/fonts/boxicons.css') }}" />
        <link rel="icon" type="" href="{{ asset('assets/theme/img/favicon/logo-kasirin-pendek.ico') }}" />
        <!-- Helpers -->
        <script src="{{ asset('assets/theme/vendor/js/helpers.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>

        <!-- Theme config file -->
        <script src="{{ asset('assets/theme/js/config.js') }}"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="{{ asset('assets/theme/css/demo.css') }}" rel="stylesheet" />
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />
    </head>
        <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-gray-900 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <livewire:components.ui-footer />
        
        <!-- Core JS -->
        <script src="{{ asset('assets/theme/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/theme/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/theme/vendor/js/menu.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ asset('assets/theme/js/dashboard-analytics.js') }}"></script>
    </body>
</html>
