<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    
    <style>
        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 24px !important;
            font-weight: bold;
        }
    </style>
    <title>{{ $title ?? 'Instituto Superior Fermosa' }}</title>
    
    {{-- Fuente Poppins (Cargada) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- NUEVA FUENTE PARA TÍTULOS GRANDES (Playfair Display) --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    {{-- Font Awesome (para íconos sociales y WhatsApp) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" xintegrity="sha512-uH6R2q0ilCfx1oWlH4mjt0eRGZwOhuFzbgnd9K5rmZw/nMkRu7BLT/gR59Do9bIS6qA+khQujqgX8XEi5EMT0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        /* Estilos personalizados del Layout */
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Clase de utilidad para usar la fuente serif en títulos */
        .font-serif {
            font-family: 'Playfair Display', serif !important;
        }

        /* Estilo del botón flotante de WhatsApp */
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
            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            z-index: 999;
            transition: transform .2s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.12);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex flex-col">
    <!-- HEADER -->
    <header 
        id="main-header" 
        class="bg-gray-700 transition transition-transform duration-300 ease-in-out {{-- <-- CLASE CORREGIDA --}}
            shadow-lg sticky top-0 z-10"
            >
    
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
    <a href="{{ route('inicio') }}" class="flex items-center text-xl font-extrabold text-white hover:text-indigo-200 transition tracking-wider">
        <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo Instituto Superior Fermosa" class="h-8 mr-3"> 
        Instituto Superior Fermosa
    </a>
    
    <div class="flex space-x-6">
        {{-- 2. Enlaces con iconos actualizados a celeste --}}
        <a href="{{ route('inicio') }}" class="text-white hover:text-indigo-200 transition font-medium flex items-center">
            <i class="fas fa-home mr-1 text-blue-400"></i> 
            Inicio
        </a>
        
        <a href="{{ route('carreras') }}" class="text-white hover:text-indigo-200 transition font-medium flex items-center">
            {{-- Añadimos 'text-blue-400' al icono --}}
            <i class="fas fa-graduation-cap mr-1 text-blue-400"></i> 
            Carreras
        </a>
        <a href="{{ route('requisitos') }}" class="text-white hover:text-indigo-200 transition font-medium flex items-center">
            <i class="fas fa-file-alt mr-1 text-blue-400"></i> 
            Requisitos Inscripción
        </a>
        <a href="{{ route('login') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium px-3 py-1 rounded-md transition duration-200 shadow flex items-center">
            <i class="fas fa-user-circle mr-2"></i>
            Panel Admin
        </a>
    </div>
</nav>
</header>
    
    <!-- MAIN CONTENT -->
    <main class="flex-grow py-12">
        {{ $slot }}
    </main>
<footer 
    x-data="{ isVisible: false }"
    x-init="
        let observer = new IntersectionObserver(entries => {
            // entries[0].isIntersecting es 'true' si el footer está visible
            // y 'false' si no lo está.
            isVisible = entries[0].isIntersecting;
        }, { threshold: 0.1 }); // Se activa cuando el 10% es visible
        observer.observe($el);
    "
    class="bg-gray-900 text-gray-300 py-12 mt-auto border-t border-gray-700 
           transition-all duration-1000 ease-in-out" 
    :class="{
        'opacity-0 translate-y-10': !isVisible,
        'opacity-100 translate-y-0': isVisible
    }"
>
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl">

        {{-- Columna 1: Información y Redes Sociales --}}
        <div>
            <h3 class="text-white text-xl font-semibold mb-3">Instituto Superior Fermosa</h3>
            <p class="text-sm leading-relaxed">
                Formación académica con estándares de excelencia,
                compromiso institucional y enfoque en la
                transformación profesional de nuestros estudiantes.
            </p>

            <div class="flex space-x-3 mt-5">
                {{-- ÍCONO DE FACEBOOK --}}
                <a href="https://www.facebook.com/ISFermosa/?locale=es_LA" target="_blank" title="Facebook"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                {{-- ÍCONO DE INSTAGRAM --}}
                <a href="https://www.instagram.com/institutosuperiorfermosa?igsh=NTc4MTIwNjQ2YQ==" target="_blank" title="Instagram"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                    <i class="fab fa-instagram"></i>
                </a>
                {{-- ÍCONO DE LINKEDIN --}}
                <a href="#" target="_blank" title="LinkedIn"
                   class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-indigo-500 hover:text-indigo-400 transition">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>

        {{-- Columna 2: Contacto --}}
        <div>
            <h3 class="text-white text-xl font-semibold mb-3">Contacto</h3>
            <ul class="text-sm space-y-2">
                <li><i class="fas fa-map-marker-alt text-indigo-400 mr-2"></i> Maipú 850, P3600 Formosa</li>
                <li><i class="fas fa-phone-alt text-indigo-400 mr-2"></i> 3704 69-9344 </li>
                <li><i class="fas fa-envelope text-indigo-400 mr-2"></i> secretarios.fermosa.2022@gmail.com</li>
            </ul>
        </div>

        {{-- Columna 3: Ubicación (MAPA) --}}
        <div>
            <h3 class="text-white text-xl font-semibold mb-3">Ubicación</h3>
            <div class="rounded-lg overflow-hidden shadow-lg h-[220px]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.6366037286466!2d-58.17519632420485!3d-26.16668386348483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945be11b2238382d%3A0xc02e4d2938c0f585!2sMaip%C3%BA%20850%2C%20P3600BMB%2C%20Formosa!5e0!3m2!1ses-419!2sar!4v1699042500000!5m2!1ses-419!2sar"
                    class="w-full h-full"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
    <div class="text-center text-sm text-gray-500 mt-8 border-t border-gray-700 pt-4">
        © {{ date('Y') }} Instituto Superior Fermosa. Todos los derechos reservados.
    </div>
</footer>
    {{-- Botón WhatsApp flotante --}}
    <a href="https://wa.me/549370699344 ?text=Hola,%20quisiera%20recibir%20informaci%C3%B3n"
    class="whatsapp-float"
    target="_blank"
    aria-label="Chat por WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @livewireScripts
    @stack('scripts')

    <script>
        // Seleccionamos el header que acabamos de identificar
        const header = document.querySelector('#main-header');
        
        // Guardamos la última posición de scroll para comparar
        let lastScrollY = window.scrollY;

        // Escuchamos el evento 'scroll' de la ventana
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;

            // Si el scroll actual es MAYOR al anterior Y estamos a más de 100px del topo
            if (currentScrollY > lastScrollY && currentScrollY > 100) {
                // --- SCROLL HACIA ABAJO ---
                header.classList.add('-translate-y-full');
            } else {
                // --- SCROLL HACIA ARRIBA ---
                header.classList.remove('-translate-y-full');
            }

            // Actualizamos la última posición del scroll
            lastScrollY = currentScrollY;
        });
    </script>

      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        // Inicializa las animaciones AOS
        AOS.init({
            duration: 800,
            once: true // La animación ocurre solo una vez
        });

        // Inicializa el carrusel Swiper
        var swiper = new Swiper(".mySwiper", {
            loop: true, // Para que sea infinito
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000, // Cambia de foto cada 5 segundos
                disableOnInteraction: false,
            },
        });
    </script>
    
</body>
</html>