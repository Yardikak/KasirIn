<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>KasirIn</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            
            <div class="flex justify-center mt-8">
                <a href="/" wire:navigate>
                    {{-- <img src="{{ asset('../public\assets\logo.png') }}" alt="Logo" class="h-16"> --}}
                </a>
            </div>
            

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <footer class="py-8 text-center text-sm text-white dark:text-black">
                <p>All Rights Reserved.</p>
                ©
                {{-- <script>
                    document.write(new Date().getFullYear());
                </script> --}}
                2024
                , made with ❤️ KasirIn by
                <a href="https://" target="_blank" class="footer-link fw-bolder">Brilliant Boy.</a>
            </footer>
        </div>
    </body>
</html>
