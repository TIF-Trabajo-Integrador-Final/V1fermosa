<div>
    {{-- SLIDER SUPERIOR --}}
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
                next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
            }"
            x-init="autoplay()"
            class="relative h-[450px] shadow-2xl mb-12 rounded-b-lg overflow-hidden">

            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index"
                    x-transition:opacity.duration.2000ms
                    class="absolute inset-0 bg-cover bg-center"
                    :style="'background-image: url(\'' + slide + '\'); background-repeat: no-repeat; background-size: cover; background-position: center;'"></div>
            </template>

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

            {{-- BOTONES SLIDER --}}
            <div class="absolute inset-0 flex items-center justify-between z-30">
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

            {{-- PUNTOS DE PAGINACIÓN --}}
            <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2 z-30">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                        class="w-3 h-3 rounded-full focus:outline-none"
                        :class="{ 'bg-[#131567]': activeSlide === index, 'bg-[#ced0dd]/70 hover:bg-[#ced0dd]': activeSlide !== index }"
                        :aria-label="'Ir a la imagen ' + (index + 1)"></button>
                </template>
            </div>
        </div>
    </div>

    {{-- SECCIÓN DE CARRERAS --}}
    <div class="container mx-auto px-6 max-w-7xl mb-16">
        <h2 class="text-4xl font-extrabold text-[#131567] text-center mb-10">Nuestras Carreras Destacadas</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($carreras as $carrera)
            <div class="card-container" title="Pasa el puntero o toca para girar">
                <div class="card-inner group">

                    {{-- LADO FRONTAL --}}
                    <div class="card-face card-front">
                        @if($carrera->imagen)
                        <img src="{{ asset('storage/' . $carrera->imagen) }}" alt="{{ $carrera->nombre }}" class="card-img">
                        @else
                        <img src="{{ asset('images/default_carrera.jpg') }}" alt="Carrera sin imagen" class="card-img">
                        @endif
                    </div>

                    {{-- LADO POSTERIOR --}}
                    <div class="card-face card-back bg-[#131567]">
                        <div class="card-back-content">
                            <h4 class="text-2xl font-bold mb-2">{{ $carrera->nombre }}</h4>
                            <p class="text-sm mb-2"><strong>Nivel:</strong> {{ $carrera->nivel->nombre ?? '—' }}</p>
                            <p class="mb-2 text-sm">{{ Str::limit($carrera->descripcion, 120) }}</p>
                            <p class="text-gray-200 text-sm mb-2">{{ Str::limit($carrera->perfilProfesional, 100) }}</p>


                            <a href="{{ route('carreras.show', $carrera->id) }}"
                                class="inline-block px-4 py-2 border border-white rounded text-sm font-medium hover:bg-white hover:text-[#131567] transition">
                                Conoce más
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ESTILOS DE LAS CARDS --}}
    <style>
        .card-container {
            perspective: 1200px;
        }

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

        @media (max-width: 640px) {
            .card-inner {
                height: 280px;
            }
        }
    </style>

    {{-- SCRIPT PARA GIRAR CARDS EN MOBILE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cards = document.querySelectorAll('.card-container');
            cards.forEach(function(card) {
                card.addEventListener('click', function(e) {
                    if (e.target.closest('a')) return;
                    card.classList.toggle('is-flipped');
                });
                document.addEventListener('click', function(ev) {
                    if (!card.contains(ev.target)) {
                        card.classList.remove('is-flipped');
                    }
                });
            });
        });
    </script>
</div>