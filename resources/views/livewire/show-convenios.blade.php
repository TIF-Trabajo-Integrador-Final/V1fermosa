<div>

    <!-- 1. Contenedor Principal Oscuro -->
    <div class="relative min-h-screen pt-20 bg-[#101014] bg-fixed overflow-x-hidden overflow-visible">

        <!-- 2. Efecto de Fondo -->
        <div
            class="absolute inset-0 z-0 pointer-events-none"
            style="
                background-image: 
                    repeating-linear-gradient(0deg, rgba(255,255,255,0.04) 0, rgba(255,255,255,0.04) 1px, transparent 1px, transparent 40px),
                    repeating-linear-gradient(45deg, rgba(0,255,128,0.09) 0, rgba(0,255,128,0.09) 1px, transparent 1px, transparent 20px),
                    repeating-linear-gradient(-45deg, rgba(255,0,128,0.10) 0, rgba(255,0,128,0.10) 1px, transparent 1px, transparent 30px),
                    repeating-linear-gradient(90deg, rgba(255,255,255,0.03) 0, rgba(255,255,255,0.03) 1px, transparent 1px, transparent 80px),
                    radial-gradient(circle at 60% 40%, rgba(0,255,128,0.05) 0, transparent 60%);
                background-size: 80px 80px, 40px 40px, 60px 60px, 80px 80px, 100% 100%;
                background-position: 0 0, 0 0, 0 0, 40px 40px, center;
            "
        ></div>

        <!-- 3. Contenedor de Contenido -->
        <div class="max-w-5xl mx-auto p-6 relative overflow-visible space-y-10">

            <!-- Título Principal -->
            <h1 class="text-5xl font-extrabold text-white mb-10 text-center leading-tight" data-aos="fade-down">
                Convenios Institucionales
            </h1>

            <!-- 4. Loop de Convenios -->
            @forelse ($convenios as $convenio)
                <section 
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 border-t-4 border-[#131567] overflow-hidden" 
                    data-aos="fade-up"
                >
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        
                        <!-- Columna del Logo -->
                        <div class="w-full md:w-1/3 flex-shrink-0" data-aos="fade-right" data-aos-delay="100">
                            <div class="h-48 bg-white rounded-lg flex items-center justify-center p-4 shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
                               <img src="{{ asset('images/' . $convenio['logo']) }}" 
                                alt="Logo {{ $convenio['universidad'] }}" 
                                class="max-h-full max-w-full object-contain">
                            </div>
                        </div>

                        <!-- Columna de Texto -->
                        <div class="w-full md:w-2/3" data-aos="fade-left" data-aos-delay="200">
                            <h2 class="text-3xl font-bold text-[#131567] mb-3 flex items-start">
                                <i class="fas fa-university text-[#131567] mr-3 mt-1 text-2xl"></i>
                                <span>{{ $convenio['universidad'] }}</span>
                            </h2>
                            
                            <p class="text-lg font-semibold text-gray-800 mb-4">
                                {{ $convenio['titulo'] }}
                            </p>
                            
                            <div class="space-y-3 text-gray-800 text-base leading-relaxed">
                                <div class="flex items-start">
                                    <i class="fas fa-file-alt text-gray-700 mt-1 mr-2 w-5 text-center"></i>
                                    <span><strong>Resolución:</strong> {{ $convenio['resolucion'] }}</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-info-circle text-gray-700 mt-1 mr-2 w-5 text-center"></i>
                                    <span><strong>Info Carrera:</strong> {{ $convenio['info_carrera'] }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            @empty
                <!-- Mensaje de "Vacío" -->
                <div 
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up"
                >
                    <i class="fas fa-info-circle text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">
                        No hay convenios
                    </h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        No hay convenios cargados por el momento.
                    </p>
                </div>
            @endforelse

        </div> <!-- Fin Contenedor de Contenido -->

    </div> <!-- Fin Contenedor Principal Oscuro -->

    <!-- 🔧 Estilos para eliminar scrolls duplicados -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: auto !important;
            overflow-x: hidden !important;
            overflow-y: auto !important;
        }

        /* Evita scroll interno en contenedores */
        #app, main, .max-w-5xl, .relative, .overflow-x-hidden, .space-y-10 {
            overflow: visible !important;
            height: auto !important;
            max-height: none !important;
        }

        /* Elimina el error tipográfico de tu código anterior ("h html") */
        h html {
            all: unset;
        }

        /* Corrige Swiper */
        .swiper {
            overflow: hidden !important;
            width: 100% !important;
        }

        .swiper-wrapper {
            overflow: visible !important;
        }

        .swiper-slide {
            max-width: 90vw !important;
        }

        /* Evita que clases con h-screen generen doble scroll */
        [class*="h-screen"] {
            height: auto !important;
            min-height: 0 !important;
        }
    </style>

</div>
