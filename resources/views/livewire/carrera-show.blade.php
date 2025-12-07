
<div class="relative pt-20 overflow-hidden carreras-bg font-montserrat">

    {{-- Fuente institucional --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

    <div class="bg-premium-cross">
        <div class="relative pt-20 bg-[#7CB4EF] overflow-hidden carreras-bg">

            <div class="absolute inset-0 z-0 bg-white/5 backdrop-blur-2xl border-t border-b border-white/30"
                 style="box-shadow: inset 0 0 500px 500px rgba(255, 255, 255, 0.06);"></div>

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

            <style>
                .carreras-bg::before,
                .carreras-bg::after {
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
                .carreras-bg::after {
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

            <div class="max-w-5xl mx-auto p-6 relative space-y-10 z-10">

                <h1 class="text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight">
                    Oferta Académica
                </h1>

                @php
                    use Illuminate\Support\Facades\Storage;
                @endphp

                @forelse ($carreras as $carrera)

                    <section class="card-premium rounded-2xl p-8 border border-white/40 overflow-hidden relative">
                        <div class="flex flex-col md:flex-row gap-8 items-center md:items-center">

                            {{-- Portada/imagen de la carrera --}}
                            <div class="w-full md:w-1/3 flex justify-center">
                                <div class="h-72 w-full max-w-sm bg-white rounded-xl p-4 shadow-md 
                                            overflow-hidden border border-gray-200 group relative">
                                    @php
                                        // Ajustá el nombre del campo: 'imagen', 'portada', 'logo', etc.
        $portadaUrl = !empty($carrera->imagen) ? Storage::url($carrera->imagen) : null;
                                    @endphp

                                    @if($portadaUrl)
                                        <img src="{{ $portadaUrl }}"
                                             alt="Portada {{ $carrera->nombre ?? $carrera->titulo ?? 'Carrera' }}"
                                             class="w-full h-full object-cover rounded-lg transform transition duration-700 ease-out group-hover:scale-105">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-500 rounded-lg">
                                            Sin imagen disponible
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Texto y datos de la carrera --}}
                            <div class="w-full md:w-2/3 text-[#1c2a8a] flex flex-col justify-center">
                                <h2 class="text-3xl font-extrabold mb-3 text-[#1c2a8a] flex items-center">
                                    <i class="fas fa-graduation-cap text-[#1c2a8a] mr-3 text-2xl"></i>
                                    <span class="leading-tight">
                                        {{ $carrera->nombre ?? $carrera->titulo }}
                                    </span>
                                </h2>

                                {{-- Ejemplos de campos opcionales: modalidad, duración, sede --}}
                                <div class="text-gray-700 space-y-1">
                                    @if(!empty($carrera->modalidad))
                                        <p><strong>Modalidad:</strong> {{ $carrera->modalidad }}</p>
                                    @endif
                                    @if(!empty($carrera->duracion))
                                        <p><strong>Duración:</strong> {{ $carrera->duracion }}</p>
                                    @endif
                                    @if(!empty($carrera->sede))
                                        <p><strong>Sede:</strong> {{ $carrera->sede }}</p>
                                    @endif
                                </div>

                                {{-- Mapa (si la carrera tiene campus/sede con mapa) --}}
                                @if(!empty($carrera->url_mapa))
                                    <div class="w-full mt-6">
                                        <iframe
                                            src="{{ $carrera->url_mapa }}"
                                            class="w-full h-40 rounded-lg shadow-lg border border-gray-300"
                                            allowfullscreen=""
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                @endif

                                {{-- Descripción de la carrera --}}
                                @if(!empty($carrera->descripcion))
                                    <p class="text-lg text-gray-700 leading-relaxed mt-2">
                                        {{ $carrera->descripcion }}
                                    </p>
                                @endif

                                {{-- Plan de estudios / Resolución en PDF (si aplica) --}}
                                <div class="mt-4 flex gap-4 flex-wrap">
                                    @if(!empty($carrera->plan_pdf))
                                        @php $planUrl = Storage::url($carrera->plan_pdf); @endphp
                                        <a href="{{ $planUrl }}" target="_blank"
                                           class="px-4 py-2 bg-[#1c2a8a] text-white rounded-lg hover:bg-[#16206b]">
                                            Ver Plan de Estudios (PDF)
                                        </a>
                                    @endif

                                    @if(!empty($carrera->resolucion_pdf))
                                        @php $resUrl = Storage::url($carrera->resolucion_pdf); @endphp
                                        <a href="{{ $resUrl }}" target="_blank"
                                           class="px-4 py-2 bg-[#1c2a8a] text-white rounded-lg hover:bg-[#16206b]">
                                            Ver Resolución (PDF)
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </section>

                @empty
                    <div class="bg-[#cbd2e6] shadow-2xl rounded-lg p-6 border border-white/40 flex flex-col items-center text-center">
                        <i class="fas fa-info-circle text-4xl text-[#1c2a8a] mb-4"></i>
                        <h3 class="text-2xl font-bold text-[#1c2a8a] mb-3">No hay carreras</h3>
                        <p class="text-gray-700 leading-relaxed text-md">
                            No hay carreras cargadas por el momento.
                        </p>
                    </div>
                @endforelse

            </div>

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
</div>
