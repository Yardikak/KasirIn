<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kasirin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Favicon-->
        <link rel="stylesheet" href="{{ asset('assets/theme/vendor/fonts/boxicons.css') }}" />
        <link rel="icon" type="" href="{{ asset('assets/theme/img/favicon/logo-kasirin-pendek.ico') }}" />

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
            <section class="background-radial-gradient overflow-hidden">
                <style>
                    .background-radial-gradient {
                        background-color: hsl(218, 41%, 15%);
                        background-image: radial-gradient(650px circle at 0% 0%,
                            hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, 
                            hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, 
                            transparent 100%),
                        radial-gradient(1250px circle at 100% 100%, 
                            hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, 
                            hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, 
                            transparent 100%);
                    }
                    #radius-shape-1 {
                        height: 220px;
                        width: 220px;
                        top: -60px;
                        left: -130px;
                        background: radial-gradient(#44006b, #ad1fff);
                        overflow: hidden;
                    }
                    #radius-shape-2 {
                        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                        bottom: -60px;
                        right: -110px;
                        width: 300px;
                        height: 300px;
                        background: radial-gradient(#44006b, #ad1fff);
                        overflow: hidden;
                    }
                    .bg-glass {
                        background-color: hsla(0, 0%, 100%, 0.9) !important;
                        backdrop-filter: saturate(200%) blur(25px);
                    }
                    /* Full screen for the content */
                    .container {
                        height: 100%;
                        padding: 0;
                    }
                    /* Media Query untuk layar kecil (smartphone portrait) */
                    @media (max-width: 767px) {
                        .container {
                            padding: 1rem;
                        }
    
                        .display-5 {
                            font-size: 1.5rem; /* Ukuran font untuk judul */
                        }
    
                        .card {
                            margin-top: 2rem;
                        }
    
                        #radius-shape-1,
                        #radius-shape-2 {
                            display: none; /* Menyembunyikan bentuk dekoratif untuk layar kecil */
                        }
    
                        .bg-glass {
                            padding: 1rem; /* Mengurangi padding agar lebih pas pada layar kecil */
                        }
    
                        .form-group {
                            margin-bottom: 1rem;
                        }
    
                        .btn-block {
                            width: 100%;
                        }
    
                        .text-center {
                            text-align: center;
                        }
    
                        .d-flex {
                            flex-direction: column; /* Mengatur tombol menjadi vertikal */
                        }
    
                        .btn-outline-danger {
                            width: 100%;
                        }
    
                        /* Memperbaiki posisi footer */
                        footer {
                            padding: 1rem;
                            font-size: 0.875rem;
                        }
                    }
                </style>
                <div class="flex justify-center mt-8">
                    @if (Route::has('login'))
                        <a class="flex justify-center brand nav-link" href="https://x.com/Dikakpedia" wire:navigate>
                            <img style="max-height: 120px;"  src="{{ asset('assets/theme/img/logo-kasirin-panjang-putih.png') }}" alt="logo" />
                        </a>
                    @endif
                </div>
            
                {{ $slot }}

                <!-- Footer -->
                <footer class="py-4 text-center text-sm text-white dark:text-white/70">
                    <p>All Rights Reserved.</p>
                    © 2024, made with ❤️ KasirIn by
                    <a href="https://github.com/Yardikak/KasirIn" target="_blank" class="footer-link fw-bolder">Brilliant Boy.</a>
                </footer>
            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    </body>
</html>
