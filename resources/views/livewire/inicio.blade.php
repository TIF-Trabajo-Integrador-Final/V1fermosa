<div 
    class="relative min-h-screen bg-fixed bg-cover bg-center" 
    style="background-image: url('{{ asset('images/logo.jpeg') }}');"
>
    {{-- Capa de opacidad --}}
    <div class="absolute inset-0 bg-gray-900 opacity-30"></div> 
    
    <div class="container mx-auto p-6 max-w-4xl relative z-10 py-12"> {{-- Añadido py-12 para padding superior/inferior --}}
        <h1 class="text-5xl font-extrabold text-indigo-200 mb-10 text-center leading-tight"> {{-- Color de texto ajustado para contraste --}}
            Bienvenido al Instituto Superior Fermosa
        </h1>

       <section id="sobre-nosotros" class="bg-white shadow-xl rounded-lg p-8 mb-10 border-t-4 border-indigo-600 transition-transform transform hover:scale-[1.01] hover:shadow-2xl duration-300">
       
       <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
            <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Sobre Nosotros
        </h2>
        <p class="text-gray-700 leading-relaxed text-lg">
            El Instituto Superior Fermosa es una institución comprometida con la excelencia académica y la formación integral de profesionales.
            Ofrecemos programas educativos de vanguardia, impulsando el desarrollo personal y profesional de nuestros estudiantes para
            que sean líderes en sus respectivos campos. Nuestra infraestructura moderna y un equipo docente altamente calificado
            garantizan una experiencia educativa de primer nivel.
        </p>
    </section>

    <section 
            id="galeria" 
            class="bg-white shadow-xl rounded-lg p-8 mb-10"
            data-aos="fade-up" {{-- <-- ANIMACIÓN DE ENTRADA --}}
            data-aos-delay="100"
        >
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Nuestra Institución en Imágenes</h2>
            
            {{-- ESTRUCTURA DEL CARRUSEL (SWIPER) --}}
            <div class="swiper mySwiper rounded-lg">
                <div class="swiper-wrapper">
                    {{-- FOTO 1 --}}
                    <div class="swiper-slide">
                        <img src="https://placehold.co/800x450/e2e8f0/4a5568?text=Foto+Institucional+1" class="w-full h-64 object-cover" alt="Foto 1">
                    </div>
                    {{-- FOTO 2 --}}
                    <div class="swiper-slide">
                        <img src="https://placehold.co/800x450/cbd5e0/4a5568?text=Foto+Institucional+2" class="w-full h-64 object-cover" alt="Foto 2">
                    </div>
                    {{-- FOTO 3 --}}
                    <div class="swiper-slide">
                        <img src="https://placehold.co/800x450/a0aec0/4a5568?text=Foto+Institucional+3" class="w-full h-64 object-cover" alt="Foto 3">
                    </div>
                    {{-- (Agrega más <div class="swiper-slide">...</div> aquí) --}}
                </div>
                {{-- Botones de paginación (opcional) --}}
                <div class="swiper-pagination"></div>
                {{-- Botones de flechas (opcional) --}}
                <div class="swiper-button-next text-indigo-600"></div>
                <div class="swiper-button-prev text-indigo-600"></div>
            </div>
        </section>

    <section id="directora" class="bg-white shadow-xl rounded-lg p-8 mb-10 border-l-4 border-purple-600 transition-transform transform hover:scale-[1.01] hover:shadow-2xl duration-300">
        <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
            <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            Mensaje de la Dirección
        </h2 >
        <p class="text-gray-700 leading-relaxed text-lg italic">
            <strong class="font-semibold">Lic. [Nombre de la Directora]:</strong> "En el Instituto Superior Fermosa, creemos firmemente en el poder transformador de la educación.
            Nuestro compromiso es ofrecer un ambiente de aprendizaje innovador y de apoyo, donde cada estudiante pueda alcanzar
            su máximo potencial y contribuir de manera significativa a la sociedad. Los invito a formar parte de nuestra comunidad educativa."
        </p>
    </section>

        <section class="text-center p-8 bg-indigo-100/90 rounded-lg shadow-inner"> {{-- bg-indigo-100/90 para un poco de transparencia --}}
            <h3 class="text-2xl font-semibold text-indigo-700 mb-4">¿Listo para dar el siguiente paso?</h3>
            <p class="text-gray-700 mb-6">Explora nuestra oferta académica y transforma tu futuro.</p>
            <a href="{{ route('carreras') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full shadow-lg text-xl transition duration-300 ease-in-out transform hover:scale-105">
                Ver Carreras
            </a>
        </section>
    </div>
</div>