<div>
    <div class="w-full">
        <div x-data="{
                activeSlide: 0,
                slides: [
                    '{{ asset('images/carreras.jpg') }}',
                    '{{ asset('images/logo.jpeg') }}',
                    '{{ asset('images/carreras.jpg') }}'
                ],
                autoplay() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide + 1) % this.slides.length
                    }, 7000)
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
            
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index"
                     x-transition:opacity.duration.2000ms
                     class="absolute inset-0 bg-cover bg-center"
                     :style="'background-image: url(\'' + slide + '\'); background-repeat: no-repeat; background-size: cover; background-position: center;'"></div>
            </template>

            {{-- COLOR CAMBIADO AQUÍ --}}
            <div class="absolute inset-0 bg-[#131567] opacity-30"></div>

            <div class="relative flex flex-col items-start justify-center h-full p-8 md:p-12 lg:p-16 z-20 max-w-7xl mx-auto">
                <h1 class="text-4xl font-extrabold text-white tracking-wider leading-tight sm:text-5xl md:text-6xl lg:text-7xl"
                    style="font-family: 'Playfair Display', serif;">
                    CONOCÉ
                </h1>
                <h1 class="text-4xl font-extrabold text-white tracking-wider leading-tight sm:text-5xl md:text-6xl lg:text-7xl mt-2"
                    style="font-family: 'Playfair Display', serif;">
                    NUESTRAS OFERTAS
                </h1>
                <p class="font-sans text-2xl text-white font-medium mt-6 sm:text-3xl md:text-4xl">
                    ACADÉMICAS
                </p>
            </div>

            <div class="absolute inset-0 flex items-center justify-between z-30">
                {{-- BOTONES DEL SLIDER ACTUALIZADOS --}}
                <button @click="prev()"
                        class="ml-4 p-2 bg-[#ced0dd]/70 rounded-full text-[#131567] hover:bg-[#ced0dd] focus:outline-none transition-colors"
                        aria-label="Anterior">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="next()"
                        class="mr-4 p-2 bg-[#ced0dd]/70 rounded-full text-[#131567] hover:bg-[#ced0dd] focus:outline-none transition-colors"
                        aria-label="Siguiente">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2 z-30">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                            class="w-3 h-3 rounded-full focus:outline-none"
                            {{-- PUNTOS DE PAGINACIÓN ACTUALIZADOS --}}
                            :class="{ 'bg-[#131567]': activeSlide === index, 'bg-[#ced0dd]/70 hover:bg-[#ced0dd]': activeSlide !== index }"
                            :aria-label="'Ir a la imagen ' + (index + 1)"></button>
                </template>
            </div>

        </div>
    </div>

    <div class="container mx-auto px-6 max-w-7xl mb-16">

        <h2 class="text-4xl font-extrabold text-[#131567] text-center mb-10">Nuestras Carreras Destacadas</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @php
            $ofertas_principales = [
            [
            'nombre' => '',
            'descripcion' => 'Aprende a gestionar la logística, el mercado y las normativas globales para expandir negocios a nivel mundial.',
            'imagen' => 'comercio internacional.jpeg',
            ],
            [
            'nombre' => '',
            'descripcion' => 'Conviértete en un desarrollador full-stack, creando aplicaciones web, móviles y sistemas innovadores.',
            'imagen' => 'desarrollo de software.jpeg',
            ],
            [
            'nombre' => '',
            'descripcion' => 'Domina los procesos administrativos y legales de facturación médica, esencial para cualquier institución de salud.',
            'imagen' => 'facturación en salud.jpeg',
            ],
            [
            'nombre' => '',
            'descripcion' => 'Adquiere las herramientas de gestión, finanzas y marketing para liderar y hacer crecer cualquier tipo de empresa.',
            'imagen' => 'negocios y empresas.jpeg',
            ],
            ];
            @endphp

            @foreach($ofertas_principales as $index => $oferta)
            <div class="card-container" title="Pasa el puntero o toca para girar" data-card="{{ $index }}">
                <div class="card-inner group">

                    <div class="card-face card-front">
                        <img src="{{ asset('images/' . $oferta['imagen']) }}" alt="{{ $oferta['nombre'] }}"
                             class="card-img">
                        <div class="card-front-overlay">
                            <h3 class="card-title">{{ $oferta['nombre'] }}</h3>
                        </div>
                    </div>

                    <div class="card-face card-back bg-[#131567]">
                        <div class="card-back-content">
                            <h4 class="text-2xl font-bold mb-2">{{ $oferta['nombre'] }}</h4>
                            <p class="mb-4 text-sm">{{ $oferta['descripcion'] }}</p>
                            <a href="{{ route('requisitos') }}"
                               {{-- HOVER DEL BOTÓN ACTUALIZADO --}}
                               class="inline-block px-4 py-2 border border-white rounded text-sm font-medium hover:bg-white hover:text-[#131567] transition">
                                Requisitos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <style>
        /* contenedor de carta */
        .card-container {
            perspective: 1200px;
        }

        /* inner que rota */
        .card-inner {
            width: 100%;
            height: 320px;
            position: relative;
            transition: transform 0.8s cubic-bezier(.2, .9, .2, 1);
            transform-style: preserve-3d;
            border-radius: 12px;
        }
        .card-container:hover .card-inner,
        .card-container.is-flipped .card-inner {
            transform: rotateY(180deg) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
        }

        .card-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            border-radius: 12px;
            overflow: hidden;
        }

        .card-front {
            background: #ced0dd;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            background-color: #ced0dd;
        }


        .card-front-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            padding: 18px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 30%, rgba(0, 0, 0, 0.45) 100%);
        }

        .card-title {
            color: #fff;
            font-size: 1.125rem;
            font-weight: 700;
        }

        .card-back {
            transform: rotateY(180deg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
            color: #fff;
        }

        .card-back .card-back-content {
            max-width: 90%;
        }

        /* responsive: adaptar alto en pantallas pequeñas */
        @media (max-width: 640px) {
            .card-inner {
                height: 280px;
            }
        }
    </style>

    <script>
        (function () {
            // Añade toggle 'is-flipped' al tocar la card (mobile)
            document.addEventListener('DOMContentLoaded', function () {
                var cards = document.querySelectorAll('.card-container');
                cards.forEach(function (card) {
                    // on touch devices, toggle on click
                    card.addEventListener('click', function (e) {
                        // If click on a link inside, let it navigate
                        if (e.target.closest('a')) return;
                        // Toggle flipped state
                        card.classList.toggle('is-flipped');
                    });

                    // Remove flip when clicking outside (optional)
                    document.addEventListener('click', function (ev) {
                        if (!card.contains(ev.target)) {
                            card.classList.remove('is-flipped');
                        }
                    });
                });
            });
        })();
    </script>
</div>