@extends('layouts.app')

@section('title', 'Inscripción y Requisitos')

@section('content')

<h1 class="text-5xl font-extrabold text-blue-700 text-center mb-10 border-b pb-4">
    Proceso de Inscripción y Requisitos
</h1>

{{-- Mensajes de Sesión (Éxito o Error) --}}
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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    
    {{-- Columna 1 & 2: Requisitos e Información --}}
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white p-8 rounded-xl shadow-xl border-l-4 border-yellow-500">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-file-alt text-yellow-500 mr-3"></i> Documentación Requerida
            </h2>
            <p class="text-gray-600 mb-4">Para formalizar tu inscripción, debes presentar la siguiente documentación en la Sede Principal o enviarla digitalmente al email de contacto.</p>
            
            <ul class="list-none space-y-3 pl-0 text-gray-700">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Fotocopia autenticada del Título Secundario (o Certificado de Título en Trámite).
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Fotocopia del DNI (ambos lados).
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Partida de Nacimiento original y fotocopia.
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Dos (2) fotos carnet 4x4 actualizadas.
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Certificado Médico de aptitud psicofísica.
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i> Llenar y firmar el Formulario de Solicitud de Vacante.
                </li>
            </ul>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-xl border-l-4 border-blue-500">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-calendar-alt text-blue-500 mr-3"></i> Fechas Importantes
            </h2>
            <p class="text-gray-600">
                El proceso de inscripción para el ciclo lectivo **2026** se encuentra abierto. Te recomendamos reservar tu cupo con anticipación.
            </p>
            <ul class="list-disc ml-6 mt-4 space-y-2 text-gray-700">
                <li>**Inicio de Inscripciones:** 1 de Octubre del 2025.</li>
                <li>**Cierre de Cupos:** Sujeto a disponibilidad de la carrera.</li>
                <li>**Inicio de Cursado:** Marzo 2026.</li>
            </ul>
        </div>
    </div>

    {{-- Columna 3: Formulario de Solicitud de Contacto/Inscripción --}}
    <div class="lg:col-span-1">
        <div class="bg-blue-800 text-white p-8 rounded-xl shadow-2xl">
            <h2 class="text-3xl font-bold mb-6 text-center">
                Solicitud de Vacante
            </h2>
            <p class="mb-6 text-center text-blue-200">
                Completa este formulario y un asesor se comunicará contigo para guiarte en el proceso de inscripción.
            </p>

            <form action="{{ route('inscripcion.store') }}" method="POST" class="space-y-4">
                @csrf
                
                {{-- Nombre Completo --}}
                <div>
                    <label for="nombre_completo" class="block text-sm font-medium mb-1">Nombre Completo <span class="text-red-400">*</span></label>
                    <input type="text" id="nombre_completo" name="nombre_completo" 
                           value="{{ old('nombre_completo') }}" 
                           required 
                           class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 border-none focus:ring-yellow-400 focus:border-yellow-400 @error('nombre_completo') border-red-500 @enderror">
                    @error('nombre_completo')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Correo Electrónico <span class="text-red-400">*</span></label>
                    <input type="email" id="email" name="email" 
                           value="{{ old('email') }}" 
                           required 
                           class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 border-none focus:ring-yellow-400 focus:border-yellow-400 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Teléfono --}}
                <div>
                    <label for="telefono" class="block text-sm font-medium mb-1">Teléfono (WhatsApp)</label>
                    <input type="tel" id="telefono" name="telefono" 
                           value="{{ old('telefono') }}" 
                           class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 border-none focus:ring-yellow-400 focus:border-yellow-400 @error('telefono') border-red-500 @enderror">
                    @error('telefono')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Carrera de Interés (Dropdown) --}}
                <div>
                    <label for="carrera_interes" class="block text-sm font-medium mb-1">Carrera de Interés <span class="text-red-400">*</span></label>
                    <select id="carrera_interes" name="carrera_interes" required
                            class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 border-none focus:ring-yellow-400 focus:border-yellow-400 @error('carrera_interes') border-red-500 @enderror">
                        <option value="">-- Seleccione una Carrera --</option>
                        
                        {{-- Opciones dinámicas usando $carreras (si se cargaron) --}}
                        @if(isset($carreras) && $carreras->count() > 0)
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->nombre }}" {{ old('carrera_interes') == $carrera->nombre ? 'selected' : '' }}>
                                    {{ $carrera->nombre }}
                                </option>
                            @endforeach
                        @else
                            {{-- Fallback: Opciones estáticas --}}
                            <option value="Tecnicatura Superior en Administración, Facturación y Salud" {{ old('carrera_interes') == 'Licenciatura en Sistemas' ? 'selected' : '' }}>Tecnicatura Superior en Administración, Facturación y Salud </option>
                            <option value="Tecnicatura Superior en Desarrollo de Software" {{ old('carrera_interes') == 'Tecnicatura en Marketing Digital' ? 'selected' : '' }}>Tecnicatura Superior en Desarrollo de Software</option>
                            <option value="Tecnicatura Superior en Comercio Exterior" {{ old('carrera_interes') == 'Otra / Consulta General' ? 'selected' : '' }}>Tecnicatura Superior en Comercio Exterior</option>
                        @endif
                    </select>
                    @error('carrera_interes')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Mensaje --}}
                <div>
                    <label for="mensaje" class="block text-sm font-medium mb-1">Mensaje o Consulta Adicional</label>
                    <textarea id="mensaje" name="mensaje" rows="3" 
                              class="w-full px-4 py-2 rounded-lg bg-white text-gray-800 border-none focus:ring-yellow-400 focus:border-yellow-400 @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botón de Enviar --}}
                <button type="submit" class="w-full bg-yellow-400 text-blue-800 font-extrabold py-3 rounded-lg shadow-md hover:bg-yellow-500 transition duration-200 transform hover:scale-[1.01]">
                    Enviar Solicitud
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
