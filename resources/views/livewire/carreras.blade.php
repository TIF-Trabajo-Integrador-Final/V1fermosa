<div>
{{-- FUENTES - Se asegura que Montserrat sea la fuente principal --}}
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    * {
        /* Esto asegura Montserrat para todo si no se especifica otra fuente */
        font-family: 'Montserrat', sans-serif !important;
    }
    /* Clase personalizada si es necesaria, aunque el * anterior ya cubre mucho */
    .font-montserrat { font-family: 'Montserrat', sans-serif; }
</style>

{{-- APLICAMOS LA CLASE FONT-MONTSERRAT AL CONTENEDOR PRINCIPAL --}}
<div class="w-full font-montserrat">
<div
    x-data="{
        active: 0,
        slides: [
            '{{ asset('images/alumnos.png') }}',
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
            class="w-full h-full object-cover object-top
                   animate-slow-zoom transform scale-100 md:scale-100"
        >
    </div>
</template>

{{-- Fade inferior sutil --}}
<div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-b
            from-transparent to-[#E0EFFF] pointer-events-none"></div>


    {{-- OVERLAY Premium --}}
    {{-- TEXTO ABAJO DEL HERO --}}
<div class="absolute inset-x-0 bottom-10 flex flex-col items-center 
            text-center px-6 md:px-10 z-20 font-montserrat">

    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white drop-shadow-lg leading-tight">
        CONOCÉ NUESTRAS OFERTAS
    </h1>

    <p class="mt-2 text-4xl md:text-5xl lg:text-6xl text-white font-semibold drop-shadow-lg">
        ACADÉMICAS
    </p>
</div>

</div>


    {{-- ======================= LISTADO DE CARRERAS ======================= --}}
 <div class="container mx-auto px-6 max-w-7xl mb-16">

       <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight" data-aos="fade-down">
                Nuestras Carreras
            </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach($carreras as $carrera)
            <div
                class="bg-[#ced0dd]/95 shadow-xl rounded-xl p-6 border-t-4 border-[#131567] overflow-hidden transition-transform duration-300 hover:scale-[1.03]"
                data-aos="fade-up">

                <div class="flex flex-col items-center text-center space-y-4">

                    {{-- Imagen unificada tipo “Glass Zoom” --}}
                   <div class="relative overflow-hidden rounded-xl shadow-lg 
                                w-full h-64 bg-white/40 backdrop-blur-md group">

                        <img src="{{ asset('storage/' . $carrera->imagen) }}"
                            alt="{{ $carrera->nombre }}"
                            class="w-full h-64 object-cover object-top transition-transform duration-700 ease-out group-hover:scale-110"
>
                    </div>


                    {{-- Título --}}
                    <h3 class="text-2xl font-bold text-[#131567]">
                        {{ $carrera->nombre }}
                    </h3>

                    {{-- Descripción --}}
                    <p class="text-gray-800 text-sm leading-relaxed">
                        {{ Str::limit($carrera->descripcion, 120) }}
                    </p>

                    {{-- Botón --}}
                    <a href="{{ route('carrera.show', $carrera->id) }}"
                        class="inline-block px-4 py-2 border border-[#131567] text-[#131567] font-semibold rounded-lg hover:bg-[#131567] hover:text-white transition-colors">
                        Conocer más
                    </a>

                </div>

            </div>
            @endforeach
        </div>


</div>

{{-- ESTILOS --}}
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
    html, body { overflow-x: hidden !important;}

    /* Definición de la fuente Montserrat */
    /* El * en la sección <style> superior ya hace mucho del trabajo */
    .font-montserrat { font-family: 'Montserrat', sans-serif; }

    .premiumSwiper { height: 430px; }
    .premium-slide-img { position: absolute; inset: 0; background-size: cover; background-position: center; transition: 2.5s ease; }
    .premium-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.4)); }
    .premium-text { position: absolute; bottom: 70px; left: 60px; color:white; opacity:0; transform:translateY(20px); transition:.9s; }
    .swiper-slide-active .premium-text { opacity:1; transform:translateY(0); }

    .premium-arrow { color:white !important; scale:1.3; transition:.3s; }
    .premium-arrow:hover { scale:1.5; color:#c6d7ff !important; }

    @keyframes slowZoom { 0%{transform:scale(1);} 100%{transform:scale(1.1);} }
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }
</style>