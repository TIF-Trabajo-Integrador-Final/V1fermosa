<div>

    {{-- FUENTE INSTITUCIONAL --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- ============================= -->
    <!--   CONTENEDOR PRINCIPAL        -->
    <!-- ============================= -->
    <div class="relative pt-20 overflow-hidden convenios-bg font-montserrat">

        <!-- CAPA BASE — FONDO BLANCO INSTITUCIONAL -->
       <div class="bg-premium-cross">
    
    <div class="relative pt-20 bg-[#7CB4EF] overflow-hidden convenios-bg">
        <!-- lo demás queda igual -->

</div>

        <!-- CAPA GLASSMORPHISM COMO EN INICIO -->
        <div class="absolute inset-0 z-0 bg-white/5 backdrop-blur-2xl border-t border-b border-white/30"
             style="box-shadow: inset 0 0 500px 500px rgba(255, 255, 255, 0.06);">
        </div>

        <!-- CAPA PREMIUM — PATRONES DECORATIVOS -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-45"
            style="
                background-image:
                    repeating-linear-gradient(0deg, rgba(255,255,255,0.10) 0, rgba(255,255,255,0.10) 1px, transparent 1px, transparent 50px),
                    repeating-linear-gradient(45deg, rgba(255,255,255,0.08) 0, rgba(255,255,255,0.08) 1px, transparent 1px, transparent 30px),
                    radial-gradient(circle at 60% 40%, rgba(255,255,255,0.12) 0%, transparent 70%),
                    radial-gradient(circle at 20% 80%, rgba(255,255,255,0.10) 0%, transparent 70%);
                background-size: 80px 80px, 40px 40px, 100% 100%, 100% 100%;
            ">
        </div>

        <!-- OLAS ANIMADAS -->
        <style>
            .convenios-bg::before,
            .convenios-bg::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 200%;
                height: 250px;
                background: rgba(255, 255, 255, 0.12);
                border-radius: 100%;
                animation: waveMove 10s linear infinite;
            }

            .convenios-bg::after {
                background: rgba(255, 255, 255, 0.06);
                animation-duration: 16s;
                transform: translateY(-25%);
            }

            @keyframes waveMove {
                0%   { transform: translateX(-20%) translateY(-50%); }
                50%  { transform: translateX(0) translateY(-55%); }
                100% { transform: translateX(-20%) translateY(-50%); }
            }
        </style>

        <!-- ============================= -->
        <!--        CONTENIDO             -->
        <!-- ============================= -->
        <div class="max-w-5xl mx-auto p-6 relative space-y-10 z-10">

            <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight" data-aos="fade-down">
                Convenios Institucionales
            </h1>

            @forelse ($convenios as $convenio)

                <!-- TARJETA PREMIUM -->
                <!-- TARJETA PREMIUM -->
<section class="card-premium rounded-2xl p-8 border border-white/40 overflow-hidden relative">

    <div class="flex flex-col md:flex-row gap-8 items-center md:items-center">

   <div class="w-full md:w-1/3 flex justify-center">
    <div class="h-72 w-full max-w-sm bg-white rounded-xl p-4 shadow-md 
                overflow-hidden border border-gray-200 group relative">

        <img src="{{ storage_url($convenio->logo) }}"
     alt="Logo {{ $convenio->universidad }}"
     class="w-full h-full object-cover rounded-lg transform transition duration-700 ease-out group-hover:scale-105">


    </div>
</div>


        <!-- TEXTO CENTRADO VERTICALMENTE -->
        <div class="w-full md:w-2/3 text-[#1c2a8a] flex flex-col justify-center">

            <h2 class="text-3xl font-extrabold mb-3 text-[#1c2a8a] flex items-center">
                <i class="fas fa-university text-[#1c2a8a] mr-3 text-2xl"></i>
                <span class="leading-tight">
                    {{ $convenio['universidad'] }}
                </span>
            </h2>

            <!-- MAPA GOOGLE -->
            <!-- MAPA (correctamente encapsulado) -->
         <div class="w-full mt-6">
    <iframe 
        src="{{ $convenio->url_mapa }}"
        class="w-full h-40 rounded-lg shadow-lg border border-gray-300"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

            <!-- DESCRIPCIÓN (si más adelante agregás texto) -->
            @if(isset($convenio['descripcion']))
            <p class="text-lg text-gray-700 leading-relaxed mt-2">
                {{ $convenio['descripcion'] }}
            </p>
            @endif

        </div>

    </div>

</section>


            @empty

                <!-- SIN CONVENIOS -->
                <div class="bg-[#cbd2e6] shadow-2xl rounded-lg p-6 border border-white/40 flex flex-col items-center text-center">
                    <i class="fas fa-info-circle text-4xl text-[#1c2a8a] mb-4"></i>
                    <h3 class="text-2xl font-bold text-[#1c2a8a] mb-3">No hay convenios</h3>
                    <p class="text-gray-700 leading-relaxed text-md">
                        No hay convenios cargados por el momento.
                    </p>
                </div>

            @endforelse

        </div>

        <!-- ============================= -->
        <!--      ESTILOS PREMIUM          -->
        <!-- ============================= -->
        <style>
            .card-premium {
                background-color: #cbd2e6;
                box-shadow: 0 8px 25px rgba(0,0,0,0.15),
                            inset 0 0 25px rgba(255,255,255,0.25);
                transition: .3s ease-in-out;
            }

            .card-premium:hover {
                background-color: #dce2f0;
                transform: scale(1.01);
                box-shadow: 0 12px 35px rgba(0,0,0,0.30),
                            inset 0 0 35px rgba(255,255,255,0.4);
            }
        </style>

    </div>

</div>
