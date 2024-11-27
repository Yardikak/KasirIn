<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KasirIn</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex items-center justify-center relative">
            <img id="background" class="absolute -left-20 top-0 max-w-[666px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <!-- Main Content -->
                <main class="flex flex-col items-center justify-center min-h-screen">
                    <div class="grid gap-6 place-items-center">
                        <x-primary-button>
                            @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
                        </x-primary-button>
                    </div>
                </main>

                <!-- Footer -->
                <footer class="py-4 text-center text-sm text-black dark:text-white/70">
                    <p>All Rights Reserved.</p>
                    © 2024
                    , made with ❤️ KasirIn by
                    <a href="https://" target="_blank" class="footer-link fw-bolder">Brilliant Boy.</a>
                </footer>
            </div>
        </div>
    </body>
</html>
