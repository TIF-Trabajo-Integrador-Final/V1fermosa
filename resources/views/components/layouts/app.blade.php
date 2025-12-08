<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Instituto Superior Fermosa' }}</title>

    {{-- ========================================================= --}}
    {{--  FUENTE PRINCIPAL INSTITUCIONAL: MONTSERRAT               --}}
    {{-- ========================================================= --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    {{-- Montserrat para TODO el sitio --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- AOS y Swiper --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />

    {{-- Vite y Livewire --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* ============================= */
        /*   TIPOGRAFÍA GLOBAL           */
        /* ============================= */
        html, body {
            font-family: 'Montserrat', sans-serif !important;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f3f4f6;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif !important;
        }

        html { scroll-behavior: smooth; }

        .icon-blue { color: #60a5fa; }

        /* ============================= */
        /*   GRADIENTE ANIMADO NAV/FOOTER */
        /* ============================= */
        .gradiente-animado {
            background: linear-gradient(90deg, #3C5CCF, #131567, #3C5CCF);
            background-size: 300% 300%;
            animation: gradiente 8s ease infinite;
        }

        @keyframes gradiente {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position:  0% 50%; }
        }
    </style>
</head>

<body>

    {{-- ========================= --}}
    {{--       HEADER              --}}
    {{-- ========================= --}}
    <header id="main-header"
        class="gradiente-animado fixed top-0 left-0 w-full z-50 shadow-lg transition-opacity duration-500 ease-out">

        <nav class="container mx-auto px-6 md:px-12 lg:px-16 py-4 flex items-center justify-between font-montserrat">

            <a href="{{ route('inicio') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo2.jpeg') }}" 
                    alt="Logo Instituto Superior Fermosa" 
                    class="h-14 w-14 object-cover rounded-full ring-2 ring-white/40 shadow-lg 
                      transition-transform duration-300 group-hover:scale-110">

                <span class="text-xl font-extrabold text-white group-hover:text-blue-200 transition tracking-wider hidden md:block">
                    Instituto Superior Fermosa
                </span>
            </a>

            <div class="flex items-center space-x-6">

                <a href="{{ route('inicio') }}" class="text-white hover:text-blue-200 transition font-medium flex items-center">
                    <i class="fas fa-home mr-1 icon-blue"></i> <span class="hidden md:inline">Inicio</span>
                </a>

                <a href="{{ url('/carreras') }}" class="text-white hover:text-blue-200 transition font-medium flex items-center">
                    <i class="fas fa-book mr-1 icon-blue"></i> <span class="hidden md:inline">Carreras</span>
                </a>

                {{-- DESPLEGABLE SOLO EN CARRERAS --}}
                        @if(request()->routeIs('carreras'))
                            <div x-data="{ open: false }" class="relative">
                                <button @mouseenter="open = true" @mouseleave="open = false"
                                        class="text-white hover:text-blue-200 transition flex items-center p-2">
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>

                                <div x-show="open" 
                                    @mouseenter="open = true" 
                                    @mouseleave="open = false" 
                                    x-transition
                                    class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-72 bg-white shadow-xl 
                                            rounded-lg border border-blue-900/30 z-50 overflow-hidden">

                                    @php
                                        $niveles = \App\Models\Nivel::with('carreras')->orderBy('id')->get();
                                    @endphp

                                    @foreach($niveles as $nivel)
                                        @if($nivel->carreras->count())
                                            <div class="px-4 py-2 bg-blue-50 border-b border-blue-200">
                                                <p class="text-sm font-semibold text-[#131567] uppercase tracking-wide">
                                                    {{ $nivel->nombre }}
                                                </p>
                                            </div>

                                            @foreach($nivel->carreras as $carrera)
                                                <a href="{{ route('carrera.show', $carrera->id) }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 hover:text-blue-900 transition">
                                                    {{ $carrera->nombre }}
                                                </a>
                                            @endforeach

                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endif


                <a href="{{ route('convenios') }}" class="text-white hover:text-blue-200 transition font-medium flex items-center">
                    <i class="fas fa-university mr-1 icon-blue"></i> <span class="hidden md:inline">Convenios</span>
                </a>

                <a href="{{ route('resenas') }}" class="text-white hover:text-blue-200 transition font-medium flex items-center">
                    <i class="fas fa-star mr-1 icon-blue"></i> <span class="hidden md:inline">Reseñas</span>
                </a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md transition shadow flex items-center text-sm">
                            <i class="fas fa-user-circle mr-2"></i> Admin
                        </a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>


    {{-- ========================= --}}
    {{--   CONTENIDO DINÁMICO      --}}
    {{-- ========================= --}}
    <main class="pt-0 font-montserrat">
        {{ $slot }}
    </main>


    {{-- ========================= --}}
    {{--          FOOTER           --}}
    {{-- ========================= --}}
 <footer id="main-footer"
    class="gradiente-animado opacity-1 transition-opacity duration-500 ease-out text-gray-200 
           py-8 border-t border-blue-900/40">

    <!-- CONTENEDOR MÁS BAJO -->
    <div class="container mx-auto px-6 md:px-12 lg:px-16 
                grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- COLUMNA 1 -->
        <div>
            <h3 class="text-white text-xl font-semibold mb-2 tracking-wide font-montserrat">
                Instituto Superior Fermosa
            </h3>

            <p class="text-sm leading-relaxed text-gray-300 font-montserrat">
                Formación académica de excelencia, compromiso institucional y desarrollo profesional.
            </p>

            <div class="flex space-x-3 mt-4">
                <a href="https://www.facebook.com/ISFermosa/?locale=es_LA" target="_blank"
                   class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-800/60 hover:bg-blue-700 transition">
                    <i class="fab fa-facebook-f text-white text-sm"></i>
                </a>

                <a href="https://www.instagram.com/institutosuperiorfermosa" target="_blank"
                   class="w-9 h-9 flex items-center justify-center rounded-full bg-pink-700/60 hover:bg-pink-600 transition">
                    <i class="fab fa-instagram text-white text-sm"></i>
                </a>
            </div>
        </div>

        <!-- COLUMNA 2 -->
        <div>
            <h3 class="text-white text-xl font-semibold mb-2 tracking-wide font-montserrat">Contacto</h3>

            <ul class="text-sm space-y-2 font-montserrat">
                <li class="flex items-center">
                    <i class="fas fa-map-marker-alt text-blue-300 mr-2 text-sm"></i>
                    Maipú 850, Formosa, Argentina
                </li>

                <li class="flex items-center">
                    <i class="fas fa-phone-alt text-blue-300 mr-2 text-sm"></i>
                    3704 69-9344
                </li>

                <li class="flex items-center">
                    <i class="fas fa-envelope text-blue-300 mr-2 text-sm"></i>
                    secretarios.fermosa.2022@gmail.com
                </li>
            </ul>
        </div>

        <!-- COLUMNA 3 -->
        <div>
            <h3 class="text-white text-xl font-semibold mb-2 tracking-wide font-montserrat">Ubicación</h3>

            <div class="rounded-xl overflow-hidden shadow-xl border border-blue-900/30 h-36">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.6366037286466!2d-58.17519632420485!3d-26.16668386348483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945be11b2238382d%3A0xc02e4d2938c0f585!2sMaip%C3%BA%20850%2C%20P3600BMB%2C%20Formosa!5e0!3m2!1ses-419!2sar!4v1699042500000!5m2!1ses-419!2sar"
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- COPY CENTRADO -->
    <div class="mt-6 text-center text-xs text-gray-300 border-t border-blue-800/40 pt-3 font-montserrat">
        © {{ date('Y') }} Instituto Superior Fermosa — Todos los derechos reservados. Desarrollado por el equipo BEYAVA.
    </div>

</footer>



    {{-- CHATBOT --}}
    @if (!request()->routeIs('dashboard') && !request()->is('admin*'))
        @include('partials.chatbot')
    @endif


    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script> AOS.init(); </script>

</body>
</html>
