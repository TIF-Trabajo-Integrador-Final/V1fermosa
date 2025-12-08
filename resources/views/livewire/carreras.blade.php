<div class="w-full font-montserrat">

    {{-- ======================= LISTADO DE CARRERAS ======================= --}}
    <div class="container mx-auto px-6 max-w-7xl mb-16">
        <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight">
            Nuestras Carreras
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($carreras as $carrera)
                <article
                    class="bg-[#ced0dd]/95 shadow-xl rounded-xl p-6 border-t-4 border-[#131567] 
                           overflow-hidden transition-transform duration-300 hover:scale-[1.03]"
                >
                    <div class="flex flex-col items-center text-center space-y-4">

                        {{-- ========================= --}}
                        {{-- IMAGEN DE LA CARRERA      --}}
                        {{-- ========================= --}}
                        @php
                            $img = $carrera->imagen 
                                    ? asset($carrera->imagen) 
                                    : asset('images/placeholder-carrera.jpg');
                        @endphp

                        <div class="relative overflow-hidden rounded-xl shadow-lg 
                                    w-full h-64 bg-white/40 backdrop-blur-md group">
                            <img src="{{ $img }}"
                                 alt="{{ $carrera->nombre }}"
                                 class="w-full h-full object-cover object-top transition-transform 
                                        duration-700 ease-out group-hover:scale-110"
                                 loading="lazy">
                        </div>

                        {{-- ========================= --}}
                        {{-- TÍTULO                    --}}
                        {{-- ========================= --}}
                        <h3 class="text-2xl font-bold text-[#131567]">
                            {{ $carrera->nombre }}
                        </h3>

                        {{-- ========================= --}}
                        {{-- DESCRIPCIÓN               --}}
                        {{-- ========================= --}}
                        <p class="text-gray-800 text-sm leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($carrera->descripcion, 120) }}
                        </p>

                        {{-- ========================= --}}
                        {{-- BOTÓN A DETALLE           --}}
                        {{-- ========================= --}}
                        <a href="{{ route('carrera.show', $carrera->id) }}"
                           class="inline-block px-4 py-2 border border-[#131567] text-[#131567] 
                                  font-semibold rounded-lg hover:bg-[#131567] hover:text-white 
                                  transition-colors">
                            Conocer más
                        </a>

                    </div>
                </article>
            @endforeach
        </div>
    </div>

    {{-- ========================= --}}
    {{-- ESTILOS DEL COMPONENTE   --}}
    {{-- ========================= --}}
    <style>
        .card-container { perspective: 1200px; }
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
            box-shadow: 0 20px 40px rgba(0,0,0,0.18);
        }
        .card-face { 
            position: absolute; inset: 0; 
            backface-visibility: hidden; 
            -webkit-backface-visibility: hidden; 
            border-radius: 12px; overflow: hidden; 
        }
        .card-front { background: #ced0dd; }
        .card-img {
            width: 100%; height: 100%; object-fit: contain;
            display: block; background-color: #ced0dd;
        }
        .card-front-overlay {
            position: absolute; inset: 0;
            display: flex; align-items: flex-end; padding: 18px;
            background: linear-gradient(180deg, rgba(0,0,0,0) 30%, rgba(0,0,0,0.45) 100%);
        }
        .card-title { color: #fff; font-size: 1.125rem; font-weight: 700; }

        @keyframes slowZoom { 
            0% { transform: scale(1);} 
            100% { transform: scale(1.1);} 
        }
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }

        @media (max-width: 640px) { 
            .card-inner { height: 280px; } 
        }

        html, body { overflow-x: hidden !important; }
    </style>
</div>
