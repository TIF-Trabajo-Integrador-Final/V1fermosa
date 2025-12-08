<div>

{{-- ================================= --}}
{{--  FUENTES                          --}}
{{-- ================================= --}}
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

{{-- ================================= --}}
{{--  HERO RESPONSIVE CORREGIDO        --}}
{{-- ================================= --}}
<div class="relative w-full 
            h-[55vh]               /* móvil */
            sm:h-[65vh]            /* tablets pequeñas */
            md:h-[75vh]            /* tablets medianas */
            lg:h-[85vh]            /* desktop */
            overflow-hidden z-40 bg-[#f4f5f7]">

    <img src="{{ asset('images/fermosa.png') }}"
         class="absolute inset-0 w-full h-full object-cover
                object-center        /* móvil: centrado */
                md:object-bottom     /* desktop: parte inferior */
                animate-slow-zoom"
         alt="Hero Image">

    <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-b
                from-transparent to-[#f4f5f7] pointer-events-none"></div>
</div>


{{-- ================================= --}}
{{--  CONTENEDOR PRINCIPAL GLASS       --}}
{{-- ================================= --}}
<div class="relative bg-premium-cross -mt-[1px] pt-14 pb-20">

    <div class="absolute inset-0 z-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
         style="box-shadow: inset 0 0 500px 500px rgba(255, 255, 255, 0.05);">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6">


        {{-- ================================= --}}
        {{--  1. SECCIÓN DE BIENVENIDA          --}}
        {{-- ================================= --}}
        <div class="text-center mb-16 mt-8" data-aos="fade-down">

            <h4 class="font-montserrat tracking-[0.25em] text-base uppercase font-bold mb-4 
                       text-bg-gradient-to-r from-[#3C5CCF] via-[#131567] to-[#3C5CCF]">
                Educación de Excelencia
            </h4>

            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl 
                       font-montserrat font-extrabold text-[#131567] leading-tight drop-shadow-lg">
                Bienvenido al <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r 
                             from-[#3C5CCF] via-[#131567] to-[#3C5CCF]">
                    Instituto Superior Fermosa
                </span>
            </h1>

            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-[#131567] to-transparent mx-auto mt-6"></div>
        </div>


        {{-- ================================= --}}
        {{--  2. SOBRE NOSOTROS + SLIDER        --}}
        {{-- ================================= --}}
        <section id="sobre-nosotros"
            class="max-w-3xl mx-auto bg-white/80 backdrop-blur-lg shadow-xl rounded-xl p-10 mb-20
                   border-t-[4px] border-[#131567] hover:bg-white/95 font-montserrat"
            data-aos="fade-up">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                {{-- TEXTO --}}
                <div data-aos="fade-right">
                    <h2 class="text-2xl font-extrabold text-[#131567] mb-6 pb-3 border-b border-gray-300">
                        <i class="fas fa-university mr-3"></i>
                        Sobre Nosotros
                    </h2>

                    <p class="text-gray-700 leading-relaxed text-lg mb-8 text-justify">
                        El <strong class="text-[#131567]">Instituto Superior Fermosa</strong> es una institución comprometida con la
                        excelencia académica. Brindamos programas educativos modernos, orientados a la innovación
                        y el desarrollo profesional.
                    </p>
                </div>

                {{-- SLIDER DERECHA --}}
                <div class="w-full flex justify-center" data-aos="fade-left">
                    <div x-data="{
                                active: 0,
                                slides: [
                                    '{{ asset('images/directora2.jpeg') }}',
                                    '{{ asset('images/6.jpeg') }}'
                                ],
                                next() { this.active = (this.active + 1) % this.slides.length },
                                play() { setInterval(() => this.next(), 6000) }
                            }"
                         x-init="play()"
                         class="relative overflow-hidden shadow-lg w-full max-w-sm rounded-xl group h-[330px]">

                        <template x-for="(slide, i) in slides" :key="i">
                            <div x-show="active === i"
                                 x-transition.opacity.duration.800ms
                                 class="absolute inset-0 w-full h-full">
                                <img :src="slide"
                                     class="w-full h-full object-cover object-center
                                            grayscale-[10%] group-hover:grayscale-0 animate-slow-zoom">
                            </div>
                        </template>

                        <div class="absolute bottom-0 left-0 w-full h-20 bg-gradient-to-b
                                    from-transparent to-white/90 pointer-events-none"></div>
                    </div>
                </div>

            </div>


            {{-- ACORDEÓN --}}

            <div x-data="{ open:false }" class="mt-10 w-full">

                <div class="w-full flex justify-center">
                    <button @click="open=!open"
                            class="btn-gradiente flex items-center gap-2 text-center px-8 py-3">
                        <span>CONOCER NUESTRA HISTORIA</span>
                        <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"
                           class="fas text-sm transition-transform"></i>
                    </button>
                </div>

                <div x-show="open" x-transition.duration.400ms
                     class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-10">

                    <div data-aos="fade-right"
                         class="text-gray-700 text-lg leading-relaxed text-justify">
                        <p>
                            Desde nuestro inicio en 2010, hemos crecido hasta convertirnos en una institución
                            líder de la región.
                        </p>
                        <p class="mt-4">
                            A lo largo de los años hemos formado profesionales que hoy son referentes en sus áreas.
                        </p>
                    </div>

                    <div data-aos="fade-left" class="flex justify-center md:justify-end">
                        <div class="relative overflow-hidden rounded-xl shadow-lg w-full max-w-sm group h-[330px]">
                            <img src="{{ asset('images/1.jpeg') }}"
                                 class="w-full h-full object-cover object-center group-hover:scale-110 transition">
                        </div>
                    </div>

                </div>

            </div>
        </section>


        {{-- ================================= --}}
        {{--  3. CARDS INSTITUCIONALES           --}}
        {{-- ================================= --}}
        <section id="institucional" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">

            @php
                $cards = [
                    [
                        'icon' => 'fa-bullseye',
                        'title' => 'Nuestra Misión',
                        'text'  => 'Formar profesionales éticos, capaces y responsables.',
                        'full'  => 'Nuestra misión es proporcionar una educación integral que fomente el desarrollo.'
                    ],
                    [
                        'icon' => 'fa-eye',
                        'title' => 'Nuestra Visión',
                        'text'  => 'Ser una institución líder en innovación y excelencia.',
                        'full'  => 'Aspiramos a ser referentes académicos a nivel nacional e internacional.'
                    ],
                    [
                        'icon' => 'fa-tasks',
                        'title' => 'Objetivos',
                        'text'  => 'Impulsar la investigación y la tecnología educativa.',
                        'full'  => 'Buscamos integrar innovación, pensamiento crítico y excelencia académica.'
                    ],
                ];
            @endphp

            @foreach($cards as $i => $c)
                <div x-data="{ open:false }"
                     class="bg-white/50 p-6 rounded-xl shadow-xl border-l-4 border-[#131567]
                            hover:scale-[1.02] transition">

                    <div class="w-16 h-16 bg-[#7CB4EF]/40 rounded-full flex items-center justify-center mx-auto mb-5">
                        <i class="fas {{ $c['icon'] }} text-3xl text-[#131567]"></i>
                    </div>

                    <h3 class="text-xl font-extrabold text-[#131567] mb-4 text-center">
                        {{ $c['title'] }}
                    </h3>

                    <p class="text-gray-700 text-[1.15rem] leading-relaxed text-justify">
                        {{ $c['text'] }}
                    </p>

                    <button @click="open = !open"
                            class="mx-auto mt-4 px-6 py-2 rounded-lg text-sm font-semibold 
                                   bg-gradient-to-r from-[#3C5CCF] to-[#131567] text-white shadow-md">
                        <span x-show="!open">Ver más</span>
                        <span x-show="open">Leer menos</span>
                    </button>

                    <div x-show="open" x-transition.duration.300ms
                         class="mt-3 text-gray-700 leading-relaxed text-justify">
                        {{ $c['full'] }}
                    </div>
                </div>
            @endforeach
        </section>


        {{-- ================================= --}}
        {{--  4. GALERÍA PREMIUM SWIPER          --}}
        {{-- ================================= --}}
        <section id="galeria" class="relative w-full py-0 mb-20 font-montserrat">
            <div class="max-w-6xl mx-auto px-6">

                <div class="swiper premiumSwiper rounded-xl overflow-hidden shadow-2xl border-4 border-white/20">

                    <div class="swiper-wrapper">

                        @foreach (['images/22.png','images/20.jpeg','images/2.png'] as $img)
                            <div class="swiper-slide relative">

                                <img src="{{ asset($img) }}" 
                                     class="w-full 
                                            h-[360px] sm:h-[420px] md:h-[480px] lg:h-[540px]
                                            object-cover object-center transition duration-700">

                                <div class="absolute bottom-10 left-10 z-20 text-white drop-shadow-lg">
                                    <h2 class="font-extrabold text-4xl md:text-5xl tracking-wide">
                                        Instituto Superior Fermosa
                                    </h2>
                                    <p class="text-lg md:text-xl opacity-95">
                                        Excelencia Académica y Profesional
                                    </p>
                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="swiper-button-next premium-arrow"></div>
                    <div class="swiper-button-prev premium-arrow"></div>
                    <div class="swiper-pagination premium-pagination"></div>

                </div>
            </div>
        </section>


        {{-- ================================= --}}
        {{--  5. MENSAJE DE LA DIRECCIÓN         --}}
        {{-- ================================= --}}
        <section id="directora" class="relative z-10 max-w-5xl mx-auto px-4 mb-12" data-aos="fade-up">

            <div class="bg-white/85 shadow-xl rounded-xl p-6 md:p-8 border-l-4 border-[#131567]">

                <h2 class="text-2xl font-bold text-[#131567] mb-6">
                    <i class="fas fa-user-tie"></i>
                    Mensaje de la Dirección
                </h2>

                <div x-data="{ openAcademic: false, openWork: false }"
                     class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">

                    <div class="overflow-hidden rounded-xl shadow-md w-full max-w-xs mx-auto transition-all"
                         :class="{
                            'max-h-[280px]': !openAcademic && !openWork,
                            'max-h-[380px]': (openAcademic && !openWork) || (!openAcademic && openWork),
                            'max-h-[520px]': openAcademic && openWork
                         }">

                        <img src="{{ asset('images/8.jpeg') }}"
                             class="w-full h-full object-cover object-top">
                    </div>

                    <div class="space-y-6">

                        <p class="italic text-gray-700 leading-relaxed text-base border-l-4 border-blue-200 pl-4 py-3 bg-white/60 rounded-r-xl shadow-sm">
                            “Nuestro compromiso es brindar una educación que transforme vidas.”
                        </p>

                        {{-- ACADÉMICO --}}
                        <div class="border border-gray-200 rounded-xl shadow-md bg-white text-sm">

                            <button @click="openAcademic = !openAcademic"
                                    class="w-full text-left px-4 py-3 
                                           bg-gradient-to-r from-[#3C5CCF] to-[#131567] 
                                           text-white font-semibold flex justify-between items-center rounded-t-xl">
                                Antecedentes Académicos
                                <i class="fas fa-chevron-down" :class="{ 'rotate-180': openAcademic }"></i>
                            </button>

                            <div x-show="openAcademic" x-transition
                                 class="px-4 py-3 text-gray-700 space-y-2">
                                <ul class="space-y-2">
                                    <li><i class="fas fa-check text-[#131567] mr-2"></i> Lic. en Gestión Educativa – UNF.</li>
                                    <li><i class="fas fa-check text-[#131567] mr-2"></i> Especialista en Gestión Tutorial – UNNE.</li>
                                    <li><i class="fas fa-check text-[#131567] mr-2"></i> Profesora de Educación Primaria.</li>
                                </ul>
                            </div>
                        </div>

                        {{-- LABORAL --}}
                        <div class="border border-gray-200 rounded-xl shadow-md bg-white text-sm">

                            <button @click="openWork = !openWork"
                                    class="w-full text-left px-4 py-3 
                                           bg-gradient-to-r from-[#3C5CCF] to-[#131567] 
                                           text-white font-semibold flex justify-between items-center rounded-t-xl">
                                Experiencia Laboral
                                <i class="fas fa-chevron-down" :class="{ 'rotate-180': openWork }"></i>
                            </button>

                            <div x-show="openWork" x-transition
                                 class="px-4 py-3 text-gray-700 space-y-2">
                                <ul class="space-y-2">
                                    <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Directora del ISF.</li>
                                    <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Coordinadora de Programas.</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

    {{-- ================================= --}}
    {{--  ESTILOS ADICIONALES              --}}
    {{-- ================================= --}}
    <style>

    html, body { overflow-x: hidden !important; }

    p { text-align: justify; text-justify: inter-word; }

    .btn-gradiente {
        background: linear-gradient(90deg, #3C5CCF, #131567);
        color: white !important;
        border-radius: 10px;
        padding: 10px 26px;
        font-weight: 700;
    }

    @keyframes slowZoom {
        0%   { transform: scale(1.05); }
        100% { transform: scale(1.20); }
    }
    .animate-slow-zoom {
        animation: slowZoom 15s ease-in-out infinite alternate;
    }

    .premium-pagination .swiper-pagination-bullet {
        background: #ffffffcc;
    }
    
    .premium-pagination .swiper-pagination-bullet-active {
        background: #ffffff;
    }

    </style>
</div>
