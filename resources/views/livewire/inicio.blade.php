<div 
    class="relative min-h-screen pt-20 bg-[#101014] bg-fixed overflow-x-hidden" 
>
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

    
    <div 
        class="max-w-5xl mx-auto p-6 relative overflow-x-hidden" 
    >
        
        <h1 class="text-5xl font-extrabold text-white mb-10 text-center leading-tight">
            Bienvenido al Instituto Superior Fermosa
        </h1>

        
{{-- 2. Bloque "Hero" --}}
        
<div 
            class="text-center py-20 mb-10 bg-gradient-to-r from-[#131567]/95 to-[#2a2d9a]/95 text-white rounded-lg shadow-2xl"
            data-aos="zoom-in"
            data-aos-duration="1000"
            data-aos-once="true"
        >
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4" data-aos="fade-up" data-aos-delay="300">
                ¡Tu Futuro Comienza Aquí!
            </h2>
            <p class="text-xl md:text-2xl mb-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                Formando líderes con excelencia académica y valores sólidos.
            </p>
            <a 
                href="{{ route('carreras') }}" 
                class="inline-block bg-white hover:bg-gray-100 text-[#131567] font-bold py-3 px-8 rounded-full shadow-lg text-lg 
                transition duration-300 ease-in-out transform hover:scale-105"
                data-aos="fade-up" data-aos-delay="700"
            >
                Explora Nuestras Carreras
            </a>
        </div>
        
        
{{-- 3. SECCIÓN "SOBRE NOSOTROS" --}}
        
<section 
            id="sobre-nosotros" 
            class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 mb-10 border-t-4 border-[#131567] overflow-hidden" 
        >
            <h2 class="text-3xl font-bold text-[#131567] mb-6 flex items-center">
                <svg class="w-8 h-8 text-[#131567] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Sobre Nosotros
            </h2>

            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="w-full md:w-1/2" data-aos="fade-right">
                    <p class="text-gray-800 leading-relaxed text-base">
                        El Instituto Superior Fermosa es una institución comprometida con la excelencia académica y la formación integral de profesionales.
                        Ofrecemos programas educativos de vanguardia, impulsando el desarrollo personal y profesional de nuestros estudiantes para
                        que sean líderes en sus respectivos campos. Nuestra infraestructura moderna y un equipo docente altamente calificado
                        garantizan una experiencia educativa de primer nivel.
                    </p>
                </div>
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left">
                    <img 
                        src="https://placehold.co/800x600/a0aec0/4a5568?text=Imagen+Institucional" 
                        class="w-full max-w-md h-auto rounded-lg shadow-lg object-cover"
                        alt="Imagen Sobre Nosotros"
                    >
                </div>
            </div>
        </section>

        
        <section 
            id="institucional" 
            class="mb-10"
        >
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div 
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <i class="fas fa-bullseye text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">
                        Nuestra Misión
                    </h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Proveer educación superior de calidad, formando profesionales competentes y éticos que contribuyan al desarrollo de la sociedad.
                    </p>
                </div>

                <div 
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <i class="fas fa-eye text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">
                        Nuestra Visión
                    </h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Ser una institución líder en innovación educativa, reconocida por su excelencia académica y su impacto positivo en la comunidad.
                    </p>
                </div>

                <div 
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up"
                    data-aos-delay="300"
                >
                    <i class="fas fa-tasks text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">
                        Objetivos
                    </h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Fomentar la investigación, la extensión universitaria y la vinculación tecnológica, garantizando una formación integral y actualizada.
                    </p>
                </div>

            </div>
        </section>

<div class="relative w-full mx-auto p-6 sm:p-8 md:p-10 lg:p-12 max-w-7xl">
    <!-- SECCIÓN GALERÍA -->
    <section id="galeria" 
        class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 mb-10 aos-init" 
        data-aos="fade-left"
    >
        <h2 class="text-3xl font-bold text-[#131567] mb-6 text-center">
            Nuestra Institución en Imágenes
        </h2>

        <div 
            x-data="{}" 
            x-init="
                new window.Swiper($el, {
                    modules: [
                        window.SwiperModules.EffectCoverflow, 
                        window.SwiperModules.Pagination, 
                        window.SwiperModules.Navigation, 
                        window.SwiperModules.Autoplay
                    ],
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    loop: true,
                    watchOverflow: true, // evita overflow si hay pocas slides
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: true,
                    },
                    coverflowEffect: {
                        rotate: 40,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                })
            " 
            class="swiper mySwiper rounded-lg h-[400px] pb-12"
        >
            <div class="swiper-wrapper">
                <div class="swiper-slide w-[300px] rounded-lg overflow-hidden">
                    <img src="https://placehold.co/600x800/e2e8f0/4a5568?text=Foto+1" 
                        class="w-full h-full object-cover" alt="Foto 1">
                </div>
                <div class="swiper-slide w-[300px] rounded-lg overflow-hidden">
                    <img src="https://placehold.co/600x800/cbd5e0/4a5568?text=Foto+2" 
                        class="w-full h-full object-cover" alt="Foto 2">
                </div>
                <div class="swiper-slide w-[300px] rounded-lg overflow-hidden">
                    <img src="https://placehold.co/600x800/a0aec0/4a5568?text=Foto+3" 
                        class="w-full h-full object-cover" alt="Foto 3">
                </div>
                <div class="swiper-slide w-[300px] rounded-lg overflow-hidden">
                    <img src="https://placehold.co/600x800/e2e8f0/4a5568?text=Foto+4" 
                        class="w-full h-full object-cover" alt="Foto 4">
                </div>
                <div class="swiper-slide w-[300px] rounded-lg overflow-hidden">
                    <img src="https://placehold.co/600x800/cbd5e0/4a5568?text=Foto+5" 
                        class="w-full h-full object-cover" alt="Foto 5">
                </div>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next text-[#131567]"></div>
            <div class="swiper-button-prev text-[#131567]"></div>
        </div>
    </section>

    <!-- SECCIÓN MENSAJE DE LA DIRECCIÓN -->
    <section 
        id="directora" 
        class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 mb-10 border-l-4 border-[#131567] overflow-visible"
        data-aos="fade-up"
    >
        <h2 class="text-3xl font-bold text-[#131567] mb-6 flex items-center">
            <svg class="w-8 h-8 text-[#131567] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Mensaje de la Dirección
        </h2>

        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left">
                <img 
                    src="{{ asset('images/directora.jpg') }}" 
                    class="w-full max-w-[150px] mx-auto rounded-full shadow-lg object-cover" 
                    style="aspect-ratio: 1 / 1;"
                    alt="Foto Directora Elida Virginia Palavecino"
                >
            </div>
            <div class="w-full md:w-1/2" data-aos="fade-right">
                <p class="text-gray-800 leading-relaxed text-base italic">
                    <strong class="font-semibold">Doctora Elida Virginia Palavecino:</strong>
                    "En el Instituto Superior Fermosa, creemos firmemente en el poder transformador de la educación.
                    Nuestro compromiso es ofrecer un ambiente de aprendizaje innovador y de apoyo, donde cada estudiante pueda alcanzar
                    su máximo potencial y contribuir de manera significativa a la sociedad. Los invito a formar parte de nuestra comunidad educativa."
                </p>
            </div>
        </div>
    </section>
</div>

<style>
    html, body {
        overflow-x: hidden !important;
        width: 100%;
    }

    .swiper {
        overflow: hidden !important;
        width: 100% !important;
    }

    .swiper-wrapper {
        overflow: visible !important; /* mantiene visible el efecto 3D */
    }

    .swiper-slide {
        max-width: 90vw !important; /* evita desbordes horizontales */
    }

    #directora {
        overflow: visible !important; /* asegura que se vea completa esta sección */
    }
</style>

