<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Superior Fermosa</title>

    {{-- Fuente Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- ✅ Font Awesome: Simplificado para evitar problemas de CSP/Integridad --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
    @livewireStyles


    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            display:flex;
            justify-content:center;
            align-items:center;
            box-shadow:2px 2px 10px rgba(0,0,0,0.3);
            z-index: 999;
            transition: transform .2s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.12);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    <div class="min-h-screen bg-gray-100 flex flex-col">
        {{-- ✅ Navegación --}}
        <x-layouts.navigation />

        <main class="pt-4 flex-grow">
            {{ $slot }}
        </main>

        {{-- ✅ Footer (INCLUIDO AQUÍ) --}}
        <footer class="bg-gray-900 text-gray-300 py-12 mt-10 border-t border-gray-700">
            <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

                {{-- Columna 1 --}}
                <div>
                    <h3 class="text-white text-xl font-semibold mb-3">Instituto Superior Fermosa</h3>
                    <p class="text-sm leading-relaxed">
                        Formación académica con estándares de excelencia,
                        compromiso institucional y enfoque en la
                        transformación profesional de nuestros estudiantes.
                    </p>

                    {{-- Asegurar que el color del icono es visible --}}
                    <div class="flex space-x-3 mt-5 text-gray-400">
                        <a href="https://www.facebook.com" target="_blank"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-blue-500 hover:text-blue-500 transition">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-pink-500 hover:text-pink-500 transition">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com" target="_blank"
                        class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-500 hover:border-blue-800 hover:text-blue-800 transition">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                {{-- Columna 2 --}}
                <div>
                    <h3 class="text-white text-xl font-semibold mb-3">Contacto</h3>
                    <ul class="text-sm space-y-2">
                        <li>📍 <span class="ml-1">Maipú 850, P3600 Formosa</span></li>
                        <li>📞 <span class="ml-1">(370) 442-XXXX</span></li>
                        <li>✉️ <span class="ml-1">contacto@instituto.com</span></li>
                    </ul>
                </div>

                {{-- Columna 3 (MAPA) --}}
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
        </footer>

        {{-- ✅ Botón WhatsApp flotante --}}
        <a href="https://wa.me/5493704616323?text=Hola,%20quisiera%20recibir%20informaci%C3%B3n"
        class="whatsapp-float"
        target="_blank"
        aria-label="Chat por WhatsApp">
            {{-- Aseguramos que el color del icono sea visible, aunque ya lo es por el CSS .whatsapp-float --}}
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    @livewireScripts
</body>
</html>
