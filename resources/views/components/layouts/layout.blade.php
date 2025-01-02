<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    class="light-style layout-menu-fixed"
    dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
    >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KasirIn') }}</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('assets/theme/vendor/fonts/boxicons.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/theme/img/favicon/logo-kasirin-pendek.ico') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/theme/vendor/fonts/boxicons.css') }}" />
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/theme/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/theme/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Helpers -->
    <script src="{{ asset('assets/theme/vendor/js/helpers.js') }}"></script>
    

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>

    <!-- Theme config file -->
    <script src="{{ asset('assets/theme/js/config.js') }}"></script>
    
    <!-- Livewire -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="layout-wrapper layout-content flex min-h-screen bg-gray-100">        
        <div class="flex-1 flex flex-col">
            @if(Auth::check())
            <!-- Navbar -->
            <livewire:layout.navigation />
            
            <!-- Main Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

            <livewire:components.ui-footer />
            @endif
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Footer -->

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core JS -->
    <script src="{{ asset('assets/theme/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    
    <!-- Vendors JS -->
    {{-- <script src="{{ asset('assets/theme/vendor/libs/apex-charts/apexcharts.js') }}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('assets/theme/js/main.js') }}"></script>
    
    <!-- Page JS -->
    <script src="{{ asset('assets/theme/js/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('assets/theme/js/pages-account-settings-account.js') }}"></script>

    <!-- Livewire -->
    @livewireScripts
</body>
</html>
