<div class="w-full font-montserrat">

    {{-- ========================= --}}
    {{-- ===== HERO DINÁMICO ===== --}}
    {{-- ========================= --}}
    <div 
        wire:ignore
        x-data="{
            active: 0,
            slides: [
                '{{ asset('images/alumnos2.png') }}',
                '{{ asset('images/alumnos4.png') }}',
                '{{ asset('images/6.jpeg') }}',
            ],
            next() { this.active = (this.active + 1) % this.slides.length },
            play() { setInterval(() => this.next(), 6000) }
        }"
        x-init="play()"
        class="relative w-full h-[90vh] md:h-[85vh] overflow-hidden bg-[#131567]"
    >

        {{-- IMÁGENES — Slow Zoom + Fade --}}
        <template x-for="(slide, i) in slides" :key="i">
            <div 
                x-show="active === i"
                x-transition.opacity.duration.1200ms
                class="absolute inset-0 w-full h-full"
            >
                <img 
                    :src="slide"
                    class="w-full h-full object-cover object-top animate-slow-zoom"
                >
            </div>
        </template>

        {{-- Fade inferior --}}
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-b
                    from-transparent to-[#E0EFFF] pointer-events-none">
        </div>

        {{-- TEXTO DEL HERO --}}
        <div class="absolute inset-x-0 bottom-10 flex flex-col items-center 
                    text-center px-6 md:px-10 z-20 font-montserrat">

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold 
                       text-white drop-shadow-lg leading-tight">
                CONOCÉ NUESTRAS OFERTAS
            </h1>

            <p class="mt-2 text-4xl md:text-5xl lg:text-6xl text-white 
                      font-semibold drop-shadow-lg">
                ACADÉMICAS
            </p>
        </div>

    </div> {{-- CIERRE CORRECTO DEL wire:ignore SOLO PARA EL HERO --}}





    {{-- ===================================== --}}
    {{-- ======== LISTADO DE CARRERAS ========= --}}
    {{-- ===================================== --}}
    <div class="container mx-auto px-6 max-w-7xl mb-16">

        <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight"
            data-aos="fade-down">
            Nuestras Carreras
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach($carreras as $carrera)

                <div class="bg-[#ced0dd]/95 shadow-xl rounded-xl p-6 border-t-4 border-[#131567] 
                            overflow-hidden transition-transform duration-300 hover:scale-[1.03]"
                     data-aos="fade-up">

                    <div class="flex flex-col items-center text-center space-y-4">

                        @php
                            $img = $carrera->imagen 
                                ? asset($carrera->imagen)
                                : asset('images/placeholder-carrera.jpg');
                        @endphp

                        <div class="relative overflow-hidden rounded-xl shadow-lg 
                                    w-full h-64 bg-white/40 backdrop-blur-md group">

                            <img src="{{ $img }}"
                                 alt="{{ $carrera->nombre }}"
                                 class="w-full h-64 object-cover object-top 
                                        transition-transform duration-700 ease-out 
                                        group-hover:scale-110">
                        </div>

                        <h3 class="text-2xl font-bold text-[#131567]">
                            {{ $carrera->nombre }}
                        </h3>

                        <p class="text-gray-800 text-sm leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($carrera->descripcion, 120) }}
                        </p>

                        <a href="{{ route('carrera.show', $carrera->id) }}"
                           class="inline-block px-4 py-2 border border-[#131567] text-[#131567] 
                                  font-semibold rounded-lg hover:bg-[#131567] hover:text-white transition-colors">
                            Conocer más
                        </a>

                    </div>
                </div>

            @endforeach

        </div>

    </div>

    <style>
        @keyframes slowZoom {
            0%   { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .animate-slow-zoom {
            animation: slowZoom 20s infinite alternate linear;
        }

        html, body { overflow-x: hidden !important; }
    </style>

</div>
