<div class="relative bg-[#101014] pt-20 overflow-hidden">
    {{-- Fondo animado fijo sin crear scroll interno --}}
    <div
        class="fixed inset-0 -z-10 pointer-events-none"
        style="
            background-image: 
                repeating-linear-gradient(0deg, rgba(255,255,255,0.04) 0, rgba(255,255,255,0.04) 1px, transparent 1px, transparent 40px),
                repeating-linear-gradient(45deg, rgba(0,255,128,0.09) 0, rgba(0,255,128,0.09) 1px, transparent 1px, transparent 20px),
                repeating-linear-gradient(-45deg, rgba(255,0,128,0.10) 0, rgba(255,0,128,0.10) 1px, transparent 1px, transparent 30px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.03) 0, rgba(255,255,255,0.03) 1px, transparent 1px, transparent 80px),
                radial-gradient(circle at 60% 40%, rgba(0,255,128,0.05) 0, transparent 60%);
            background-size: 80px 80px, 40px 40px, 60px 60px, 80px 80px, 100% 100%;
            background-position: 0 0, 0 0, 0 0, 40px 40px, center;
        ">
    </div>

    <div class="max-w-5xl mx-auto p-6 relative z-10">
        {{-- Título principal --}}
        <h1 class="text-5xl font-extrabold text-white mb-10 text-center leading-tight" data-aos="fade-down">
            Bienvenido al Instituto Superior Fermosa
        </h1>

        {{-- Sección Hero --}}
        <div
            class="text-center py-20 mb-10 bg-gradient-to-r from-[#131567]/95 to-[#2a2d9a]/95 text-white rounded-lg shadow-2xl"
            data-aos="zoom-in"
            data-aos-duration="1000"
            data-aos-once="true">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4" data-aos="fade-up" data-aos-delay="300">
                ¡Tu Futuro Comienza Aquí!
            </h2>
            <p class="text-xl md:text-2xl mb-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                Formando líderes con excelencia académica y valores sólidos.
            </p>

            {{-- Botón carreras --}}
            <a href="{{ route('carreras.index') }}"
                class="inline-block px-6 py-3 bg-white text-[#131567] font-semibold rounded-md shadow hover:bg-[#131567] hover:text-white transition">
                Explora nuestras Carreras
            </a>

            {{-- Botón panel admin --}}
            @guest
            <a href="{{ route('login') }}"
                class="inline-block px-6 py-3 ml-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow transition">
                Panel Admin
            </a>
            @endguest

            @auth
            <a href="{{ route('dashboard') }}"
                class="inline-block px-6 py-3 ml-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow transition">
                Ir al Panel
            </a>
            @endauth
        </div>

        {{-- Sección "Sobre Nosotros" --}}
        <section id="sobre-nosotros"
            class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 mb-10 border-t-4 border-[#131567]"
            data-aos="fade-up">
            <h2 class="text-3xl font-bold text-[#131567] mb-6 flex items-center">
                <i class="fas fa-info-circle text-[#131567] mr-3"></i>
                Sobre Nosotros
            </h2>

            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="w-full md:w-1/2" data-aos="fade-right">
                    <p class="text-gray-800 leading-relaxed text-base">
                        El Instituto Superior Fermosa es una institución comprometida con la excelencia académica y la
                        formación integral de profesionales. Ofrecemos programas educativos de vanguardia que impulsan
                        el desarrollo personal y profesional de nuestros estudiantes, preparando líderes para el futuro.
                    </p>
                </div>
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left">
                    <img
                        src="https://placehold.co/800x600/a0aec0/4a5568?text=Imagen+Institucional"
                        class="w-full max-w-md h-auto rounded-lg shadow-lg object-cover"
                        alt="Imagen institucional">
                </div>
            </div>
        </section>

        {{-- Sección Institucional --}}
        <section id="institucional" class="mb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-bullseye text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">Nuestra Misión</h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Formar profesionales competentes y éticos que contribuyan activamente al desarrollo de la sociedad.
                    </p>
                </div>

                <div
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-eye text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">Nuestra Visión</h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Ser una institución líder en innovación educativa, reconocida por su excelencia y su impacto positivo.
                    </p>
                </div>

                <div
                    class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-6 border-t-4 border-[#131567] flex flex-col items-center text-center"
                    data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-tasks text-4xl text-[#131567] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#131567] mb-3">Objetivos</h3>
                    <p class="text-gray-800 leading-relaxed text-md">
                        Impulsar la investigación, la extensión universitaria y la vinculación tecnológica para una formación integral.
                    </p>
                </div>
            </div>
        </section>

        {{-- Sección Mensaje de la Dirección --}}
        <section id="directora"
            class="bg-[#ced0dd]/95 shadow-xl rounded-lg p-8 mb-10 border-l-4 border-[#131567]"
            data-aos="fade-up">
            <h2 class="text-3xl font-bold text-[#131567] mb-6 flex items-center">
                <i class="fas fa-user-tie text-[#131567] mr-3"></i>
                Mensaje de la Dirección
            </h2>

            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left">
                    <img
                        src="{{ asset('images/directora.jpg') }}"
                        class="w-full max-w-[150px] mx-auto rounded-full shadow-lg object-cover"
                        style="aspect-ratio: 1 / 1;"
                        alt="Foto Directora Elida Virginia Palavecino">
                </div>
                <div class="w-full md:w-1/2" data-aos="fade-right">
                    <p class="text-gray-800 leading-relaxed text-base italic">
                        <strong class="font-semibold">Doctora Elida Virginia Palavecino:</strong>
                        “En el Instituto Superior Fermosa creemos firmemente en el poder transformador de la educación.
                        Nuestro compromiso es ofrecer un ambiente de aprendizaje innovador y de apoyo, donde cada
                        estudiante pueda alcanzar su máximo potencial y contribuir significativamente a la sociedad.”
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>