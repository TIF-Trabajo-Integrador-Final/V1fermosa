<div 
    class="relative min-h-screen bg-cover bg-center bg-fixed" 
    style="background-image: url('{{ asset('images/logo.jpeg') }}')" 
>
    <div class="absolute inset-0 bg-white opacity-75"></div> 

    <div class="container mx-auto p-6 max-w-4xl relative min-h-screen bg-gray-100 pt-20">
        {{-- 2. Título principal cambiado al azul oscuro --}}
        <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight">
            Bienvenido al Instituto Superior Fermosa
        </h1>

        {{-- 3. Sección "Sobre Nosotros" actualizada --}}
        <section 
            id="sobre-nosotros" 
            {{-- Fondo de tarjeta cambiado a #ced0dd y borde de acento a #131567 --}}
            class="bg-[#ced0dd] shadow-xl rounded-lg p-8 mb-10 border-t-4 border-[#131567] transition-transform transform hover:scale-[1.01] hover:shadow-2xl duration-300"
        >

            <h2 class="text-3xl font-bold text-[#131567] mb-4 flex items-center">
                <svg class="w-8 h-8 text-[#131567] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Sobre Nosotros
            </h2>
    
            <p class="text-gray-800 leading-relaxed text-lg">
                El Instituto Superior Fermosa es una institución comprometida con la excelencia académica y la formación integral de profesionales.
                Ofrecemos programas educativos de vanguardia, impulsando el desarrollo personal y profesional de nuestros estudiantes para
                que sean líderes en sus respectivos campos. Nuestra infraestructura moderna y un equipo docente altamente calificado
                garantizan una experiencia educativa de primer nivel.
            </p>
        </section>

        <section 
            id="galeria" 
            {{-- Fondo de tarjeta cambiado a #ced0dd --}}
            class="bg-[#ced0dd] shadow-xl rounded-lg p-8 mb-10"
            data-aos="fade-up" 
            data-aos-delay="100"
        >
            {{-- Título cambiado a #131567 --}}
            <h2 class="text-3xl font-bold text-[#131567] mb-6 text-center">Nuestra Institución en Imágenes</h2>
            
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
                </div>
                <div class="swiper-pagination"></div>
                {{-- Flechas del carrusel cambiadas a #131567 --}}
                <div class="swiper-button-next text-[#131567]"></div>
                <div class="swiper-button-prev text-[#131567]"></div>
            </div>
        </section>

        <section 
            id="directora" 
            {{-- Fondo cambiado a #ced0dd y borde (antes púrpura) a #131567 --}}
            class="bg-[#ced0dd] shadow-xl rounded-lg p-8 mb-10 border-l-4 border-[#131567] transition-transform transform hover:scale-[1.01] hover:shadow-2xl duration-300">
            {{-- Título y SVG (antes púrpura) cambiados a #131567 --}}
            <h2 class="text-3xl font-bold text-[#131567] mb-4 flex items-center">
                <svg class="w-8 h-8 text-[#131567] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Mensaje de la Dirección
            </h2>
            {{-- Texto de párrafo oscurecido (gray-800) --}}
            <p class="text-gray-800 leading-relaxed text-lg italic">
                <strong class="font-semibold">Doctora Elida Virginia Palavecino:</strong> "En el Instituto Superior Fermosa, creemos firmemente en el poder transformador de la educación.
                Nuestro compromiso es ofrecer un ambiente de aprendizaje innovador y de apoyo, donde cada estudiante pueda alcanzar
                su máximo potencial y contribuir de manera significativa a la sociedad. Los invito a formar parte de nuestra comunidad educativa."
            </p>
        </section>

        {{-- 6. Sección CTA (Llamada a la Acción) actualizada --}}
        {{-- Para variar (como en la imagen de ref.), esta la dejamos con fondo blanco --}}
        <section class="text-center p-8 bg-white rounded-lg shadow-inner">
            {{-- Título cambiado a #131567 --}}
            <h3 class="text-2xl font-semibold text-[#131567] mb-4">¿Listo para dar el siguiente paso?</h3>
            {{-- Texto de párrafo oscurecido (gray-800) --}}
            <p class="text-gray-800 mb-6">Explora nuestra oferta académica y transforma tu futuro.</p>
            {{-- Botón cambiado a fondo #131567 --}}
            <a 
                href="{{ route('carreras') }}" 
                class="bg-[#131567] hover:bg-[#10125a] {{-- Se añadió un tono más oscuro para el hover --}}
                text-white font-bold py-3 px-8 rounded-full shadow-lg text-xl 
                transition duration-300 ease-in-out transform hover:scale-105">
                Ver Carreras
            </a>
        </section>
    </div>
</div>