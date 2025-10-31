<div> 

    <h1 class="text-5xl font-extrabold text-[#131567] text-center mb-10 border-b pb-4">
        Requisitos de Inscripción
    </h1>

    {{-- Mensajes de Sesión (Sin cambios, son funcionales) --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 shadow-md" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 shadow-md" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="lg:col-span-2 space-y-8 max-w-3xl mx-auto">
        
        <div class="bg-[#ced0dd] p-8 rounded-xl shadow-xl border-l-4 border-[#131567]">
            <h2 class="text-3xl font-bold text-[#131567] mb-4 flex items-center">
                <i class="fas fa-file-alt text-[#131567] mr-3"></i> Documentación Requerida
            </h2>
            <p class="text-gray-800 mb-4">Para formalizar tu inscripción, debes presentar la siguiente documentación en la Sede Principal o enviarla digitalmente al email de contacto.</p>
            
            <ul class="list-none space-y-3 pl-0 text-gray-800">
                @forelse($requisitos as $requisito)
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> {{-- Icono funcional sin cambios --}}
                        <span>{{ $requisito->descripcion }}</span> 
                    </li>
                @empty
                    <li class="flex items-start text-gray-500">
                        <i class="fas fa-info-circle text-gray-400 mt-1 mr-2"></i>
                        <span>No hay requisitos cargados por el momento.</span>
                    </li>
                @endforelse
            </ul>
        </div>

        <div class="bg-[#ced0dd] p-8 rounded-xl shadow-xl border-l-4 border-[#131567]">
            <h2 class="text-3xl font-bold text-[#131567] mb-4 flex items-center">
                <i class="fas fa-calendar-alt text-[#131567] mr-3"></i> Fechas Importantes
            </h2>
            <p class="text-gray-800">
                El proceso de inscripción para el ciclo lectivo **2026** se encuentra abierto. Te recomendamos reservar tu cupo con anticipación.
            </p>
            <ul class="list-disc ml-6 mt-4 space-y-2 text-gray-800">
                <li>**Inicio de Inscripciones:** 1 de Octubre del 2025.</li>
                <li>**Cierre de Cupos:** Sujeto a disponibilidad de la carrera.</li>
                <li>**Inicio de Cursado:** Marzo 2026.</li>
            </ul>
        </div>
    </div>

</div> 