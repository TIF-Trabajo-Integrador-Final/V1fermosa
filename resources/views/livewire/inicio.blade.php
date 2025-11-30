<div>
    
{{-- FUENTES --}}
{{-- Se asegura que Montserrat sea la fuente principal --}}
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

{{-- HERO --}}
{{-- HERO AJUSTADO PARA MOSTRAR LA PARTE INFERIOR DE LA IMAGEN --}}
<div class="relative w-full h-[70vh] md:h-[85vh] overflow-hidden z-40 bg-[#f4f5f7]">

    <img src="{{ asset('images/fermosa.png') }}"
         class="absolute inset-0 w-full h-full object-cover 
                object-bottom md:object-[center_105%] 
                animate-slow-zoom"
         alt="Hero Image">

    {{-- Fade inferior --}}
    <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-b
                from-transparent to-[#f4f5f7] pointer-events-none"></div>

</div>


{{-- CONTENEDOR PRINCIPAL - FONDO VIDRIO MÁS SUTIL --}}
<div class="relative bg-premium-cross -mt-[1px] pt-14 pb-20">


    {{-- Fondo de VIIDRIO ESMERILADO (Glassmorphism) MÁS TRANSPARENTE --}}
    <div class="absolute inset-0 z-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
         style="
             /* Degradado de luz suave desde la esquina */
             box-shadow: inset 0 0 500px 500px rgba(255, 255, 255, 0.05);
         ">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6">

        {{-- ====================================================== --}}
        {{-- 1. SECCIÓN DE BIENVENIDA --}}
        {{-- ====================================================== --}}
        <div class="text-center mb-16 mt-8" data-aos="fade-down">

            <h4 class="font-montserrat tracking-[0.25em] text-base uppercase font-bold mb-4 text-bg-gradient-to-r 
                             from-[#3C5CCF] 
                             via-[#131567] 
                             to-[#3C5CCF]">
                Educación de Excelencia
            </h4>

            {{-- CAMBIADO: Fuente de h1 a Montserrat y tamaño --}}
            <h1 class="text-5xl md:text-7xl font-montserrat font-extrabold text-[#131567] leading-tight drop-shadow-lg">
                Bienvenido al <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r 
                             from-[#3C5CCF] 
                             via-[#131567] 
                             to-[#3C5CCF]">
                    Instituto Superior Fermosa
                </span>
            </h1>

            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-[#131567] to-transparent mx-auto mt-6"></div>
        </div>


{{-- 2. SOBRE NOSOTROS (COMPLETO + ACORDEÓN + IMÁGENES) --}}
{{-- ====================================================== --}}
<section id="sobre-nosotros"
    class="max-w-6xl mx-auto bg-white/80 backdrop-blur-lg shadow-xl rounded-xl p-10 mb-20
           border-t-[4px] border-[#131567] transition-all hover:bg-white/95 font-montserrat"
    data-aos="fade-up">

    {{-- ============================================= --}}
    {{-- CONTENEDOR PRINCIPAL: TEXTO + SLIDER DERECHO  --}}
    {{-- ============================================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        {{-- TEXTO IZQUIERDA --}}
        <div data-aos="fade-right">
            <h2 class="text-4xl font-extrabold text-[#131567] mb-6 pb-3 border-b border-gray-300">
                <i class="fas fa-university mr-3"></i>
                Sobre Nosotros
            </h2>

            <p class="text-gray-700 leading-relaxed text-lg mb-8 text-justify">
                El <strong class="text-[#131567]">Instituto Superior Fermosa</strong> es una institución comprometida con la
                Excelencia Académica. Brindamos programas educativos modernos, orientados a la innovación
                y el desarrollo profesional.
            </p>
        </div>

        {{-- ================================================== --}}
        {{-- SLIDER DERECHA - ZOOM + FADE + 2 IMÁGENES          --}}
        {{-- ================================================== --}}
        <div class="w-full flex justify-center" data-aos="fade-left">

            <div  x-data="{
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

                {{-- SLIDES --}}
                <template x-for="(slide, i) in slides" :key="i">
                    <div
                        x-show="active === i"
                        x-transition.opacity.duration.800ms
                        class="absolute inset-0 w-full h-full">
                        
                        <img :src="slide"
                             alt="Instituto Superior Fermosa"
                             class="w-full h-full object-cover object-center
                                    grayscale-[10%] group-hover:grayscale-0
                                    animate-slow-zoom">
                    </div>
                </template>

                {{-- GRADIENTE INFERIOR SUAVE --}}
                <div class="absolute bottom-0 left-0 w-full h-20 bg-gradient-to-b
                            from-transparent to-white/90 pointer-events-none"></div>

            </div>
        </div>

    </div>

    {{-- ===================================================== --}}
    {{-- ACORDEÓN (SIN CAMBIOS – RESPETA TU LÓGICA ORIGINAL)   --}}
    {{-- ===================================================== --}}
    <div x-data="{ open:false }" class="mt-10 w-full">

        {{-- BOTÓN CENTRADO --}}
        <div class="w-full flex justify-center">
            <button @click="open=!open"
                    class="btn-gradiente flex items-center gap-2 text-center px-8 py-3">
                <span class="block w-full text-center">CONOCER NUESTRA HISTORIA</span>

                <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"
                   class="fas text-sm transition-transform"></i>
            </button>
        </div>

        {{-- CONTENIDO DESPLEGABLE --}}
        <div x-show="open" x-transition.duration.400ms
             class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            {{-- TEXTO IZQUIERDA --}}
            <div data-aos="fade-right"
                 class="text-left text-gray-700 text-lg leading-relaxed text-justify font-montserrat">

                <p>
                    Desde nuestro inicio en 2010, hemos crecido hasta convertirnos en una de las instituciones
                    líderes de la región. Nuestro enfoque siempre ha sido la excelencia académica y el impacto
                    positivo en la comunidad.
                </p>

                <p class="mt-4">
                    A lo largo de los años hemos formado profesionales que hoy son referentes en sus áreas,
                    contribuyendo al desarrollo social y económico. Nos enorgullece mantenernos como un lugar
                    de formación moderna e innovadora.
                </p>
            </div>

            {{-- IMAGEN DERECHA ACORDEÓN (SIN CAMBIOS) --}}
            <div data-aos="fade-left" class="flex justify-center md:justify-end">
                <div class="relative overflow-hidden rounded-xl shadow-lg w-full max-w-sm group h-[330px]">
                    <img
                        src="{{ asset('images/1.jpeg') }}"
                        alt="Instituto Superior Fermosa - Historia"
                        class="w-full h-full object-cover object-center
                               grayscale-[10%] group-hover:grayscale-0
                               transform transition-transform duration-[1.3s] ease-in-out group-hover:scale-110">
                </div>
            </div>

        </div>

    </div>

</section>

{{-- ANIMACIÓN SLOW ZOOM --}}
<style>
@keyframes slowZoom {
    0%   { transform: scale(1.05); }
    100% { transform: scale(1.20); }
}
.animate-slow-zoom {
    animation: slowZoom 15s ease-in-out infinite alternate;
}
</style>


        {{-- ====================================================== --}}
        {{-- 3. CARDS INSTITUCIONALES --}}
        {{-- ====================================================== --}}
       <section id="institucional" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20 items-start">

    @php
        $cards = [
            [
                'icon' => 'fa-bullseye',
                'title' => 'Nuestra Misión',
                'text'  => 'Formar profesionales éticos, capaces y responsables.',
                'full'  => 'Nuestra misión es proporcionar una educación integral que fomente el crecimiento académico, personal y profesional de nuestros estudiantes. Queremos preparar a los futuros líderes para que enfrenten los desafíos globales, promoviendo la innovación y el desarrollo sostenible.'
            ],
            [
                'icon' => 'fa-eye',
                'title' => 'Nuestra Visión',
                'text'  => 'Ser una institución líder en innovación y excelencia.',
                'full'  => 'Queremos ser una Institución reconocida a nivel internacional por nuestra calidad académica, nuestra innovación en el ámbito de la educación superior y por nuestra contribución a la sociedad. Aspiramos a que nuestros egresados sean agentes de cambio en el mundo, capaces de transformar su entorno con compromiso y profesionalismo.'
            ],
            [
                'icon' => 'fa-tasks',
                'title' => 'Objetivos',
                'text'  => 'Impulsar la investigación, actualización docente y tecnología.',
                'full'  => 'Nuestro objetivo es consolidar una formación académica moderna que promueva la investigación, el pensamiento crítico y la actualización permanente. Buscamos integrar tecnología, innovación educativa y un enfoque humanista para formar profesionales preparados para los retos actuales y futuros.'
            ],
        ];
    @endphp

    @foreach($cards as $i => $c)
    <div 
        x-data="{ open:false }"

        {{-- ANIMACIÓN AOS (APARECER AL BAJAR, DESAPARECER AL SUBIR) --}}
        data-aos="fade-up"
        data-aos-duration="900"
        data-aos-delay="{{ 150 * $i }}"
        data-aos-once="false"

        {{-- CARD ESTILIZADA --}}
        class="bg-white/50 backdrop-blur-lg p-6 rounded-xl shadow-xl border-l-4 border-[#131567]
               hover:scale-[1.02] transition duration-300 flex flex-col hover:bg-white/70
               min-h-[360px]"
    >
    <div class="w-16 h-16 bg-[#7CB4EF]/40 rounded-full flex items-center justify-center mx-auto mb-5">
        <i class="fas {{ $c['icon'] }} text-3xl text-[#131567]"></i>
    </div>

    <!-- TÍTULO MÁS GRANDE -->
    <h3 class="text-2xl font-montserrat font-extrabold text-[#131567] mb-4 text-center">
        {{ $c['title'] }}
    </h3>

    <!-- TEXTO DESCRIPTIVO MÁS GRANDE -->
    <p class="text-gray-700 text-[1.15rem] font-montserrat leading-relaxed text-justify">
        {{ $c['text'] }}
    </p>

    <button 
        @click="open = !open"
        class="mx-auto mt-4 px-6 py-2 rounded-lg text-sm font-montserrat font-semibold 
               bg-gradient-to-r from-[#3C5CCF] to-[#131567] text-white shadow-md 
               hover:opacity-90 transition"
    >
        <span x-show="!open">Ver más</span>
        <span x-show="open">Leer menos</span>
    </button>

    <div 
        x-show="open"
        x-transition.duration.300ms
        class="mt-3 text-gray-700 text-[1.15rem] font-montserrat leading-relaxed text-justify"
    >
        {{ $c['full'] }}
    </div>

</div>

    @endforeach

</section>

<section id="galeria" class="relative w-full py-0 mb-20 font-montserrat">
    <div class="max-w-6xl mx-auto px-6">

        <div class="swiper premiumSwiper rounded-xl overflow-hidden shadow-2xl border-4 border-white/20">

            <div class="swiper-wrapper">

                @foreach (['images/22.png','images/20.jpeg','images/2.png'] as $img)
                <div class="swiper-slide relative">

                    <img src="{{ asset($img) }}" 
                        class="w-full 
                               h-[360px] sm:h-[420px] md:h-[480px] lg:h-[540px]
                               object-cover object-center transition duration-700"
                        alt="Galería Instituto Superior Fermosa">

                    {{-- SE ELIMINA OVERLAY OPACIDAD --}}
                    {{-- <div class="absolute inset-0 bg-gradient-to-b from-[#00000055] via-[#00000040] to-transparent"></div> --}}

                    {{-- TEXTO — MOVIDO MÁS ABAJO --}}
                    <div class="absolute bottom-10 left-10 z-20 text-white drop-shadow-lg">
                        <h2 class="premium-title font-extrabold text-4xl md:text-5xl tracking-wide">
                            Instituto Superior Fermosa
                        </h2>
                        <p class="premium-subtitle text-lg md:text-xl opacity-95">
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




        {{-- ====================================================== --}}
        {{-- 5. MENSAJE DE LA DIRECCIÓN --}}
        {{-- ====================================================== --}}
    
      <!-- IMAGEN — SE EXPANDE SEGÚN ESTADO DE LOS DESPLEGABLES -->
       <section id="directora" class="relative z-10 max-w-6xl mx-auto px-6 mb-16" data-aos="fade-up">
        <div class="bg-white/85 shadow-xl rounded-xl p-8 md:p-12 border-l-4 border-[#131567] backdrop-blur-sm transition-all hover:bg-white/95">


    <h2 class="text-3xl md:text-5xl font-montserrat font-bold text-[#131567] mb-10 flex items-center gap-4">
        <i class="fas fa-user-tie"></i>
        Mensaje de la Dirección
    </h2>

   <div 
        x-data="{ openAcademic: false, openWork: false }"
        class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start"
    >

        <!-- IMAGEN CON 3 NIVELES DE ALTURA -->
        <div 
            class="overflow-hidden rounded-xl shadow-lg w-full max-w-sm mx-auto transition-all duration-700 ease-out"
            :class="{
                'max-h-[420px]': !openAcademic && !openWork,          /* ninguno abierto */
                'max-h-[600px]': (openAcademic && !openWork) || (!openAcademic && openWork), /* uno abierto */
                'max-h-[1000px]': openAcademic && openWork             /* ambos abiertos */
            }"
        >
            <img src="{{ asset('images/8.jpeg') }}"
                 class="w-full h-full object-cover object-top transition-all duration-700 ease-out"
                 alt="Directora">
        </div>

        <!-- COLUMNA DERECHA (TEXTO + ACORDEONES) -->
        <div class="space-y-8">

            <!-- TEXTO PRINCIPAL -->
            <p class="italic text-gray-700 leading-relaxed font-montserrat text-lg md:text-xl border-l-4 border-blue-200 pl-6 py-4 bg-white/60 rounded-r-xl shadow-sm backdrop-blur-sm">
                “Nuestro compromiso es brindar una educación que transforme vidas y construya un futuro mejor para nuestra comunidad. 
                Los invitamos a ser parte de este proyecto académico enriquecedor y de excelencia.”
            </p>

            <!-- ACORDEÓN 1 -->
            <div class="border border-gray-200 rounded-xl shadow-md bg-white">

                <button 
                    @click="openAcademic = !openAcademic"
                    class="w-full text-left px-6 py-4 
                           bg-gradient-to-r from-[#3C5CCF] to-[#131567] 
                           text-white font-montserrat font-semibold 
                           flex justify-between items-center rounded-t-xl"
                >
                    Antecedentes Académicos
                    <i class="fas fa-chevron-down transition-transform duration-300"
                       :class="{ 'rotate-180': openAcademic }"></i>
                </button>

                <div 
                    x-show="openAcademic"
                    x-transition
                    class="px-6 py-5 text-gray-700 font-montserrat text-lg space-y-3"
                >
                    <ul class="space-y-3">
                        <li><i class="fas fa-check text-[#131567] mr-2"></i> Lic. en Gestión Educativa – UNF.</li>
                        <li><i class="fas fa-check text-[#131567] mr-2"></i> Especialista en Gestión Tutorial – UNNE.</li>
                        <li><i class="fas fa-check text-[#131567] mr-2"></i> Profesora para la Enseñanza Primaria.</li>
                        <li><i class="fas fa-check text-[#131567] mr-2"></i> Pos título en Tecnología – UNF.</li>
                        <li><i class="fas fa-check text-[#131567] mr-2"></i> Doctoranda en Educación – UNAH.</li>
                    </ul>
                </div>
            </div>

                {{-- ACORDEÓN 2 --}}
                <div class="border border-gray-200 rounded-xl shadow-md bg-white">

                <button 
                    @click="openWork = !openWork"
                    class="w-full text-left px-6 py-4 
                           bg-gradient-to-r from-[#3C5CCF] to-[#131567] 
                           text-white font-montserrat font-semibold 
                           flex justify-between items-center rounded-t-xl"
                >
                    Experiencia Laboral Empresarial
                    <i class="fas fa-chevron-down transition-transform duration-300"
                       :class="{ 'rotate-180': openWork }"></i>
                </button>

                <div 
                    x-show="openWork"
                    x-transition
                    class="px-6 py-5 text-gray-700 font-montserrat text-lg space-y-3"
                >
                    <ul class="space-y-3">
                        <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Directora del Instituto Superior Fermosa.</li>
                        <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Responsable de la Incubadora del ISF.</li>
                        <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Coord. Programas — Ministerio de Trabajo.</li>
                        <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Presidenta Mujeres Empresarias.</li>
                        <li><i class="fas fa-briefcase text-[#131567] mr-2"></i> Presidenta Fundación FOPROC.</li>
                    </ul>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>

    </div>


    {{-- ESTILOS --}}
    <style>
        
    html, body { overflow-x: hidden !important;}

    /* Definición de la fuente Montserrat */
    .font-montserrat { font-family: 'Montserrat', sans-serif; }

    /* JUSTIFICAR TODOS LOS PÁRRAFOS DE INFORMACIÓN */
    p {
        text-align: justify;
        text-justify: inter-word;
    }

    .premiumSwiper { height: 430px; }
    .premium-slide-img { position: absolute; inset: 0; background-size: cover; background-position: center; transition: 2.5s ease; }
    .premium-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.4)); }
    .premium-text { position: absolute; bottom: 70px; left: 60px; color:white; opacity:0; transform:translateY(20px); transition:.9s; }
    .swiper-slide-active .premium-text { opacity:1; transform:translateY(0); }

    .premium-arrow { color:white !important; scale:1.3; transition:.3s; }
    .premium-arrow:hover { scale:1.5; color:#c6d7ff !important; }

    @keyframes slowZoom { 0%{transform:scale(1);} 100%{transform:scale(1.1);} }
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }

    /* ===================================================== */
/* GRADIENTE INSTITUCIONAL FIJO PARA BOTONES             */
/* ===================================================== */

.btn-gradiente {
    background: linear-gradient(90deg, #3C5CCF, #131567);
    color: white !important;
    border: none;
    padding: 10px 26px;
    border-radius: 10px;
    font-weight: 700;
    font-family: 'Montserrat', sans-serif;
    transition: 0.25s ease;
}

.btn-gradiente:hover {
    opacity: 0.85;
}

/* REVEAL VERTICAL DESDE ARRIBA (HEAD FIRST) */
[data-aos="clip-up"] {
    clip-path: inset(0 0 100% 0);
    transition-property: clip-path;
}

[data-aos="clip-up"].aos-animate {
    clip-path: inset(0 0 0 0);
}

/* Altura más grande del swiper */
.premiumSwiper {
    height: auto !important;
}

/* Flechas */
.premium-arrow {
    color: white !important;
    text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

/* Paginación */
.premium-pagination .swiper-pagination-bullet {
    background: #ffffffcc;
    opacity: .7;
}

.premium-pagination .swiper-pagination-bullet-active {
    background: #ffffff;
    opacity: 1;
}

</style>


</div>

