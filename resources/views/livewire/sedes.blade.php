{{-- 
  PASO 1: PEGA ESTE CARRUSEL AL INICIO DE TU VISTA 'sedes.blade.php'
--}}
<div class="w-full">
    <div x-data="{
            activeSlide: 0,
            slides: [
                '{{ asset('images/carreras.jpg') }}',  {{-- CAMBIA ESTA IMAGEN --}}
                '{{ asset('images/logo.jpeg') }}',     {{-- CAMBIA ESTA IMAGEN --}}
                '{{ asset('images/carreras.jpg') }}'   {{-- CAMBIA ESTA IMAGEN --}}
            ],
            autoplay() {
                setInterval(() => {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length
                }, 7000) // Cambia cada 7 segundos
            },
            next() {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length
            },
            prev() {
                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length
            }
        }"
         x-init="autoplay()"
         class="relative h-[450px] shadow-2xl mb-12 rounded-b-lg overflow-hidden">
        
        {{-- Slides --}}
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                 x-transition:opacity.duration.2000ms
                 class="absolute inset-0 bg-cover bg-center"
                 :style="'background-image: url(\'' + slide + '\'); background-repeat: no-repeat; background-size: cover; background-position: center;'"></div>
        </template>

        {{-- Overlay Oscuro --}}
        <div class="absolute inset-0 bg-indigo-900 opacity-30"></div>

        {{-- Texto Modificado para 'Sedes' --}}
        <div class="relative flex flex-col items-start justify-center h-full p-8 md:p-12 lg:p-16 z-20 max-w-7xl mx-auto">
            <h1 class="text-4xl font-extrabold text-white tracking-wider leading-tight sm:text-5xl md:text-6xl lg:text-7xl"
                style="font-family: 'Playfair Display', serif;">
                CONOCÉ
            </h1>
            <h1 class="text-4xl font-extrabold text-white tracking-wider leading-tight sm:text-5xl md:text-6xl lg:text-7xl mt-2"
                style="font-family: 'Playfair Display', serif;">
                NUESTRAS SEDES
            </h1>
            <p class="font-sans text-2xl text-white font-medium mt-6 sm:text-3xl md:text-4xl">
                PRESENCIALES
            </p>
        </div>

        {{-- Botones de Navegación --}}
        <div class="absolute inset-0 flex items-center justify-between z-30">
            <button @click="prev()"
                    class="ml-4 p-2 bg-white/30 rounded-full text-white hover:bg-white/50 focus:outline-none transition-colors"
                    aria-label="Anterior">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button @click="next()"
                    class="mr-4 p-2 bg-white/30 rounded-full text-white hover:bg-white/50 focus:outline-none transition-colors"
                    aria-label="Siguiente">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        {{-- Puntos (Dots) de Navegación --}}
        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2 z-30">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="activeSlide = index"
                        class="w-3 h-3 rounded-full focus:outline-none"
                        :class="{ 'bg-white': activeSlide === index, 'bg-white/50 hover:bg-white/80': activeSlide !== index }"
                        :aria-label="'Ir a la imagen ' + (index + 1)"></button>
            </template>
        </div>

    </div>

<div>
    {{-- 
      PASO 1: El CSS para la animación
      Lo ponemos aquí mismo para que solo se cargue en esta vista.
    --}}
    <style>
        /* El contenedor principal que da el efecto 3D */
        .card-perspective {
            perspective: 1000px;
        }

        /* El contenedor que realmente gira */
        .card-flipper {
            position: relative;
            width: 100%;
            transition: transform 0.7s;
            transform-style: preserve-3d;
        }

        /* El 'hover' que activa la rotación */
        .card-perspective:hover .card-flipper {
            transform: rotateY(180deg);
        }

        /* Ambas caras: deben ocultarse al dar la vuelta */
        .card-front,
        .card-back {
            width: 100%;
            /* 'relative' en el front permite que el contenedor tenga altura */
            position: relative; 
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }

        /* La cara trasera: posicionada detrás y rotada por defecto */
        .card-back {
            position: absolute; /* 'absolute' para superponerse */
            top: 0;
            left: 0;
            height: 100%; /* Ocupa el 100% del alto de la cara frontal */
            transform: rotateY(180deg);
        }
    </style>

    {{-- 
      PASO 2: Tu HTML, ahora usando esas clases CSS
    --}}
    <section class="container mx-auto px-4 py-12 mb-16">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-12 border-b-2 pb-2 text-center">Nuestras Sedes</h1>

        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                
                @forelse ($sedes as $sede)
                    
                    {{-- 1. CONTENEDOR PRINCIPAL --}}
                    {{-- Usamos la clase CSS 'card-perspective' que creamos arriba --}}
                    <div class="bg-white rounded-xl shadow-lg border-t-4 border-blue-500 hover:shadow-xl card-perspective">
                        
                        {{-- 2. CONTENEDOR QUE GIRA --}}
                        {{-- Usamos la clase CSS 'card-flipper' --}}
                        <div class="card-flipper">
                            
                            {{-- 3. CARA FRONTAL --}}
                            {{-- Usamos 'card-front' y le ponemos el padding 'p-6' --}}
                            <div class="card-front p-6">
                                
                                {{-- Info de la Sede (SIN EL TAG) --}}
                                <div class="flex justify-between items-start mb-2">
                                    <h2 class="text-2xl font-bold text-blue-700 w-3/4">{{ $sede->nombre }}</h2>
                                </div>

                                <p class="text-gray-600 mb-4 flex items-center">
                                    <i class="fas fa-map-marker-alt text-blue-400 mr-2"></i> {{ $sede->direccion }}
                                </p>
                                
                                {{-- Mapa --}}
                                @if ($sede->mapa_url)
                                    <div class="mt-4">
                                        <h3 class="text-gray-800 text-xl font-semibold mb-3">Ubicación</h3>
                                        <div class="rounded-lg overflow-hidden shadow-lg h-[250px]">
                                            <iframe 
                                                src="{{ $sede->mapa_url }}"
                                                class="w-full h-full"
                                                style="border:0;"
                                                allowfullscreen=""
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-4 rounded-lg bg-gray-100 flex items-center justify-center" style="height: 250px; width: 100%;">
                                        <p class="text-gray-500">Mapa no disponible.</p>
                                    </div>
                                @endif
                            </div>

                            {{-- 4. CARA TRASERA --}}
                            {{-- Usamos 'card-back', padding 'p-6' y le damos fondo blanco --}}
                            <div class="card-back p-6 bg-white rounded-xl">
                                
                                {{-- Título y TAG MOVIDO --}}
                                <div class="flex justify-between items-start mb-4">
                                    <h2 class="text-2xl font-bold text-blue-700">Contacto</h2>
                                    @if ($sede->ubicacion)
                                        <span class="text-xs font-semibold text-white bg-blue-500 px-3 py-1 rounded-full uppercase tracking-wider">{{ $sede->ubicacion }}</span>
                                    @endif
                                </div>
                                {{-- Información de Contacto con colores dinámicos --}}
@if($loop->first)
    {{-- COLORES PARA LA TARJETA 1 (Fondo Azul) --}}
    <div class="flex flex-col space-y-4 mt-8">
        <p class="text-blue-900 font-medium flex items-center">
            <i class="fas fa-map-marker-alt text-blue-700 mr-3 w-5 text-center"></i>
            <span>{{ $sede->direccion }}</span>
        </p>
        <p class="text-blue-900 font-medium flex items-center">
            <i class="fas fa-phone-alt text-blue-700 mr-3 w-5 text-center"></i>
            <span>(370) 442-1234</span> {{-- Reemplaza --}}
        </p>
        <p class="text-blue-900 font-medium flex items-center">
            <i class="fas fa-envelope text-blue-700 mr-3 w-5 text-center"></i>
            <span>info@instituto.com</span> {{-- Reemplaza --}}
        </p>
    </div>
            @else
                {{-- COLORES PARA LA TARJETA 2 (Fondo Verde) --}}
                <div class="flex flex-col space-y-4 mt-8">
                    <p class="text-green-900 font-medium flex items-center">
                        <i class="fas fa-map-marker-alt text-green-700 mr-3 w-5 text-center"></i>
                        <span>{{ $sede->direccion }}</span>
                    </p>
                    <p class="text-green-900 font-medium flex items-center">
                        <i class="fas fa-phone-alt text-green-700 mr-3 w-5 text-center"></i>
                        <span>(370) 442-1234</span> {{-- Reemplaza --}}
                    </p>
                    <p class="text-green-900 font-medium flex items-center">
                        <i class="fas fa-envelope text-green-700 mr-3 w-5 text-center"></i>
                        <span>info@instituto.com</span> {{-- Reemplaza --}}
                    </p>
                </div>
            @endif

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="md:col-span-2 text-center p-12 bg-gray-50 rounded-xl shadow-inner">
                        <p class="text-xl text-gray-600 font-medium">No hay sedes para mostrar en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>