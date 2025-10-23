{{-- 
    Vista del Dashboard de Administración
    Muestra un saludo personalizado y enlaces rápidos a las secciones principales de gestión.
    
    Nota: Utiliza Auth::user()->name para mostrar el nombre del usuario logueado.
--}}

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            {{-- Sección de Bienvenida --}}
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">
                    ¡Bienvenido/a, {{ Auth::user()->name }}!
                </h1>
                <p class="text-lg text-gray-600">
                    Estás en el Panel de Administración del Instituto Fermosa. Aquí podrás gestionar todo el contenido público.
                </p>
            </div>

            {{-- Sección de Enlaces Rápidos / Tarjetas de Gestión --}}
            <div class="p-6 sm:px-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Tarjeta 1: Gestión de Carreras --}}
                <div class="bg-blue-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-2xl font-semibold text-blue-800 mb-3">Carreras</h2>
                    <p class="text-blue-700 mb-4">Administra los planes de estudio y sus descripciones.</p>
                    <a href="{{ route('carreras.index') }}" 
                       class="text-blue-600 font-medium hover:text-blue-900 border-b border-blue-400">
                        Ir a Carreras →
                    </a>
                </div>

                {{-- Tarjeta 2: Gestión de Planes --}}
                <div class="bg-green-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-2xl font-semibold text-green-800 mb-3">Planes de Estudio</h2>
                    <p class="text-green-700 mb-4">Crea, edita o elimina los detalles de los planes de estudio.</p>
                    <a href="{{ route('planes.index') }}" 
                       class="text-green-600 font-medium hover:text-green-900 border-b border-green-400">
                        Ir a Planes →
                    </a>
                </div>

                {{-- Tarjeta 3: Gestión de Ofertas --}}
                <div class="bg-yellow-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-2xl font-semibold text-yellow-800 mb-3">Ofertas Educativas</h2>
                    <p class="text-yellow-700 mb-4">Gestiona la información de las ofertas vigentes.</p>
                    <a href="{{ route('ofertas.index') }}" 
                       class="text-yellow-600 font-medium hover:text-yellow-900 border-b border-yellow-400">
                        Ir a Ofertas →
                    </a>
                </div>
                
                {{-- Tarjeta 4: Requisitos de Inscripción --}}
                <div class="bg-purple-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-2xl font-semibold text-purple-800 mb-3">Requisitos</h2>
                    <p class="text-purple-700 mb-4">Actualiza los documentos y pasos necesarios para la inscripción.</p>
                    <a href="{{ route('requisitos.index') }}" 
                       class="text-purple-600 font-medium hover:text-purple-900 border-b border-purple-400">
                        Ir a Requisitos →
                    </a>
                </div>
                
                {{-- Tarjeta 5: Sedes --}}
                <div class="bg-red-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-2xl font-semibold text-red-800 mb-3">Sedes</h2>
                    <p class="text-red-700 mb-4">Administra la información y ubicación de las sedes.</p>
                    <a href="{{ route('sedes.index') }}" 
                       class="text-red-600 font-medium hover:text-red-900 border-b border-red-400">
                        Ir a Sedes →
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</div>