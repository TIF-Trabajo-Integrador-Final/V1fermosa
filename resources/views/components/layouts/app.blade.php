<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <title>{{ $title ?? 'Instituto Superior Fermosa' }}</title>

    {{-- Fuentes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Header forzado a azul oscuro */
        header#main-header {
            background: linear-gradient(90deg, #1b254b 0%, #24397d 100%) !important;
            color: #ffffff !important;
        }

        header#main-header a {
            color: #ffffff !important;
        }

        header#main-header a:hover {
            color: #c7d7ff !important;
        }

        /* Efecto vidrio esmerilado */
        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        }

        /* Ítems del menú desplegable */
        .menu-item {
            color: #f1f1f1;
            transition: all 0.2s ease-in-out;
        }

        .menu-item:hover {
            background-color: rgba(99, 102, 241, 0.25);
            color: #ffffff;
            transform: translateX(2px);
        }

        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 32px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 999;
            transition: transform .2s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.12);
        }

        html,
        body {
            height: auto !important;
            min-height: 0 !important;
            overflow-x: hidden !important;
            overflow-y: auto !important;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col overflow-x-hidden">


    <!-- HEADER -->
    <header id="main-header" class="shadow-lg sticky top-0 z-10 transition-all duration-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <!-- Logo-->
            <a href="{{ route('inicio') }}"
                class="flex items-center text-xl font-extrabold hover:text-indigo-200 transition tracking-wider">
                <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo Instituto Superior Fermosa"
                    class="h-8 mr-3 rounded-md shadow-sm border border-indigo-200">
                Instituto Superior Fermosa
            </a>

            <div class="flex space-x-6 items-center">
                {{-- INICIO --}}
                <a href="{{ route('inicio') }}" class="font-medium flex items-center">
                    <i class="fas fa-home mr-1 text-blue-300"></i>
                    Inicio
                </a>

                {{-- CARRERAS (Desplegable con blur y sombra) --}}
                <div x-data="{ open:false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-1 font-medium focus:outline-none hover:drop-shadow-[0_0_8px_rgba(99,102,241,0.8)]">
                        <i class="fas fa-graduation-cap text-blue-300"></i>
                        Carreras
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="{ 'rotate-180' : open }" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    {{-- Dropdown premium con efecto blur --}}
                    <div x-show="open" @click.away="open=false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute left-0 mt-3 w-64 rounded-2xl shadow-2xl border border-indigo-200 z-50 overflow-hidden"
                        style="background: linear-gradient(180deg, rgba(28,37,82,0.95) 0%, rgba(35,54,115,0.93) 100%);
                        backdrop-filter: blur(8px);
                        -webkit-backdrop-filter: blur(8px);
                        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);">

                        <ul class="py-2 max-h-64 overflow-y-auto">
                            @forelse($menuCarreras ?? [] as $c)
                            <li>
                                <a href="{{ route('carreras.show', $c->id) }}"
                                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-100 hover:bg-indigo-500/30 hover:text-white transition-all duration-200">
                                    <i class="fas fa-book text-indigo-300"></i>
                                    {{ $c->nombre }}
                                </a>
                            </li>
                            @empty
                            <li class="px-4 py-2 text-sm text-gray-200 text-center">No hay carreras disponibles</li>
                            @endforelse
                        </ul>
                    </div>

                </div>

                {{-- PANEL ADMIN --}}
                <a href="{{ route('login') }}"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium px-3 py-1 rounded-md transition duration-200 shadow flex items-center">
                    <i class="fas fa-user-circle mr-2"></i>
                    Panel Admin
                </a>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow">

        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-auto border-t border-gray-700">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl">
            <div>
                <h3 class="text-white text-xl font-semibold mb-3">Instituto Superior Fermosa</h3>
                <p class="text-sm leading-relaxed">
                    Formación académica con estándares de excelencia,
                    compromiso institucional y enfoque en la
                    transformación profesional de nuestros estudiantes.
                </p>
                <div class="flex space-x-3 mt-5">
                    <a href="https://www.facebook.com/ISFermosa/?locale=es_LA" target="_blank" title="Facebook"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/institutosuperiorfermosa?igsh=NTc4MTIwNjQ2YQ==" target="_blank"
                        title="Instagram"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" target="_blank" title="LinkedIn"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-white text-xl font-semibold mb-3">Contacto</h3>
                <ul class="text-sm space-y-2">
                    <li><i class="fas fa-map-marker-alt text-indigo-400 mr-2"></i> Maipú 850, P3600 Formosa</li>
                    <li><i class="fas fa-phone-alt text-indigo-400 mr-2"></i> 3704 69-9344</li>
                    <li><i class="fas fa-envelope text-indigo-400 mr-2"></i> secretarios.fermosa.2022@gmail.com</li>
                </ul>
            </div>

            <div>
                <h3 class="text-white text-xl font-semibold mb-3">Ubicación</h3>
                <div class="rounded-lg overflow-hidden shadow-lg h-[220px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.6366037286466!2d-58.17519632420485!3d-26.16668386348483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945be11b2238382d%3A0xc02e4d2938c0f585!2sMaip%C3%BA%20850%2C%20P3600BMB%2C%20Formosa!5e0!3m2!1ses-419!2sar!4v1699042500000!5m2!1ses-419!2sar"
                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="text-center text-sm text-gray-500 mt-8 border-t border-gray-700 pt-4">
            © {{ date('Y') }} Instituto Superior Fermosa. Todos los derechos reservados.
        </div>
    </footer>

    <!-- WhatsApp -->
    <a href="https://wa.me/549370699344?text=Hola,%20quisiera%20recibir%20información" class="whatsapp-float"
        target="_blank" aria-label="Chat por WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @livewireScripts
</body>

</html>