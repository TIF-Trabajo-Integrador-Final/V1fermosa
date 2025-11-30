<div>

    {{-- ========================================================= --}}
    {{-- FONDO AZUL EMPRESARIAL + EFECTO DE CAPAS PREMIUM --}}
    {{-- ========================================================= --}}
    {{-- APLICAMOS MONTSERRAT A TODO EL CONTENEDOR PRINCIPAL --}}
    <div class="relative min-h-screen bg-[#C1D6EC] pt-32 pb-16 font-montserrat">

        {{-- Fondo decorativo con líneas premium --}}
        <div class="absolute inset-0 opacity-60 pointer-events-none"
            style="
                background-image:
                    repeating-linear-gradient(0deg, rgba(255,255,255,0.06) 0, rgba(255,255,255,0.06) 1px, transparent 1px, transparent 40px),
                    repeating-linear-gradient(45deg, rgba(255,255,255,0.05) 0, rgba(255,255,255,0.05) 1px, transparent 1px, transparent 25px),
                    radial-gradient(circle at 60% 40%, rgba(255,255,255,0.07) 0, transparent 55%);
                background-size: 80px 80px, 60px 60px, 100% 100%;
            ">
        </div>

        {{-- ========================================================= --}}
        {{-- CONTENEDOR PRINCIPAL GLASS --}}
        {{-- ========================================================= --}}
        <div class="relative z-10 max-w-5xl mx-auto px-6">

            <div class="glass-card p-8 shadow-2xl rounded-2xl">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                    {{-- ============================ --}}
                    {{-- IMAGEN CON ZOOM GLASS --}}
                    {{-- ============================ --}}
                    <div class="relative overflow-hidden rounded-xl shadow-lg 
                                w-full h-64 bg-white/40 backdrop-blur-md group">

                        <img src="{{ asset('storage/' . $carrera->imagen) }}"
                            alt="{{ $carrera->nombre }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                    </div>

                    {{-- ============================ --}}
                    {{-- INFORMACIÓN DE LA CARRERA --}}
                    {{-- ============================ --}}
                    <div class="md:col-span-2 space-y-5"> {{-- Aumentado el espacio para mejor lectura --}}

                        {{-- TÍTULO PRINCIPAL: Color azul institucional --}}
                        <h1 class="text-4xl font-extrabold text-[#131567] tracking-wide">
                            {{ $carrera->nombre }}
                        </h1>

                        {{-- Datos de Nivel y Duración: Color texto oscuro --}}
                        <p class="text-[#131567] font-semibold">
                            Nivel académico:<span class="font-normal">{{ $carrera->nivel->nombre }}</span>
                        </p>

                        <p class="text-[#131567] font-semibold">
                            Duración: <span class="font-normal">{{ $carrera->duracion_meses }} meses</span>
                        </p>

                        {{-- DESCRIPCIÓN --}}
                        <div>
                            {{-- SUBTÍTULO: Color azul institucional --}}
                            <h3 class="text-xl font-bold text-[#131567] mb-1">Descripción:</h3>
                            {{-- TEXTO JUSTIFICADO --}}
                            <p class="text-gray-700 text-justify">{{ $carrera->descripcion }}</p>
                        </div>

                        {{-- PERFIL PROFESIONAL --}}
                        <div>
                            {{-- SUBTÍTULO: Color azul institucional --}}
                            <h3 class="text-xl font-bold text-[#131567] mb-1">Perfil Profesional:</h3>
                            {{-- TEXTO JUSTIFICADO --}}
                            <p class="text-gray-700 text-justify">{{ $carrera->perfil_profesional }}</p>
                        </div>

                        {{-- ============================ --}}
                        {{-- LISTA DE REQUISITOS --}}
                        {{-- ============================ --}}
                        <div>
                            {{-- SUBTÍTULO: Color azul institucional --}}
                            <h3 class="text-xl font-bold text-[#131567] mb-2">Requisitos:</h3>
                            {{-- TEXTO LISTA: Color texto oscuro --}}
                            <ul class="list-disc pl-6 text-gray-700 space-y-1">
                                @foreach ($carrera->requisitos as $req)
                                    <li>{{ $req->descripcion }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- BOTÓN VOLVER --}}
                        <div class="w-full flex justify-start mt-8"> {{-- Se cambió a justify-start para que el botón se alinee con el texto --}}
                            <a href="{{ route('carreras') }}"
                                class="px-6 py-3 bg-[#131567] text-white font-semibold rounded-lg shadow-md
                                    hover:bg-white hover:text-[#131567] border border-[#131567]
                                    transition-all duration-300 backdrop-blur-sm">
                                Volver
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ========================================================= --}}
    {{-- ESTILOS GLOBALES GLASS (MISMO DE INICIO / CARRERAS) --}}
    {{-- ========================================================= --}}
    <style>
        /* Aquí no se toca el CSS para mantener la lógica Glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.28);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25),
                        inset 0 0 25px rgba(255,255,255,0.25);
            transition: .3s ease-in-out;
        }

        .glass-card:hover {
            background: rgba(255,255,255,0.40);
            transform: scale(1.01);
            box-shadow: 0 12px 35px rgba(0,0,0,0.30),
                        inset 0 0 35px rgba(255,255,255,0.4);
        }
    </style>

</div>