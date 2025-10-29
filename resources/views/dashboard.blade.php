<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Inicio Panel de Administrador') }}
        </h2>
    </x-slot>

    <!-- Estilos CSS personalizados para el efecto de tarjeta giratoria -->
    <style>
        /* El contenedor principal de la tarjeta */
        .flip-card {
            background-color: transparent;
            width: 100%;
            height: 280px; /* Altura de la tarjeta */
            perspective: 1000px; /* Efecto 3D */
            font-family: 'Inter', sans-serif;
        }

        /* Contenedor interno que gira */
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.7s;
            transform-style: preserve-3d;
            border-radius: 0.75rem; /* rounded-xl */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        }

        /* Efecto al pasar el mouse (o tocar en móvil) */
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        /* Posicionamiento de la cara frontal y trasera */
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden; /* Safari */
            backface-visibility: hidden;
            border-radius: 0.75rem; /* rounded-xl */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem; /* p-6 */
        }

        /* Cara trasera (oculta al inicio) */
        .flip-card-back {
            transform: rotateY(180deg);
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de bienvenida original -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 text-center">
                    <h1> "Aquí podra Editar, Eliminar o Agregar lo que se vera en la Página de Incio" </h1>
                </div>
            </div>

            <!-- Contenedor de las tarjetas -->
            <!-- Es un grid que muestra 1 columna en móvil y 3 en escritorio, centrado -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- ===== TARJETA 1: SEDES ===== -->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Cara Frontal -->
                        <div class="flip-card-front bg-gray-900 text-white">
                            <!-- Icono de Sede (Heroicons) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m4-8h1m-1 4h1m-1 4h1m-1 4h1m0-8h1m-1 4h1m0 4h1" />
                            </svg>
                            <h3 class="text-3xl font-bold">SEDES</h3>
                            <p class="mt-2 text-blue-100">Gira para ver opciones</p>
                        </div>
                        <!-- Cara Trasera -->
                        <div class="flip-card-back bg-grey-600 text-black">
                            <h4 class="text-2xl font-semibold mb-4">Gestionar Sedes</h4>
                            <p class="mb-6 text-gray-600 text-sm">Administra las ubicaciones y campus.</p>
                            
                            <!-- Botón de Acción (Solo Index) -->
                            <div class="w-full max-w-xs">
                                <a href="{{ route('admin.sedes.index') }}" class="w-full bg-blue-900 hover:bg-blue-600 text-blue font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:blue">
                                    Gestionar Sedes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== TARJETA 2: CARRERAS ===== -->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Cara Frontal -->
                        <div class="flip-card-front bg-gray-900 text-white">
                            <!-- Icono de Carreras (Heroicons) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-3xl font-bold">CARRERAS</h3>
                            <p class="mt-2 text-indigo-100">Gira para ver opciones</p>
                        </div>
                        <!-- Cara Trasera -->
                        <div class="flip-card-back bg-gray-500 text-white">
                            <h4 class="text-2xl font-semibold mb-4">Gestionar Carreras</h4>
                            <p class="mb-6 text-gray-300 text-sm">Administra la oferta académica.</p>
                            
                            <!-- Botón de Acción (Solo Index) -->
                            <div class="w-full max-w-xs">
                                <a href="{{ route('admin.carreras.index') }}" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                                    Gestionar Carreras
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== TARJETA 3: REQUISITOS ===== -->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <!-- Cara Frontal -->
                        <div class="flip-card-front bg-gray-900 text-white">
                            <!-- Icono de Requisitos (Heroicons) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-3xl font-bold">REQUISITOS</h3>
                            <p class="mt-2 text-teal-100">Gira para ver opciones</p>
                        </div>
                        <!-- Cara Trasera -->
                        <div class="flip-card-back bg-gray-500 text-white">
                            <h4 class="text-2xl font-semibold mb-4">Gestionar Requisitos</h4>
                            <p class="mb-6 text-gray-300 text-sm">Define los requisitos de ingreso.</p>
                            
                            <!-- Botón de Acción (Solo Index) -->
                            <div class="w-full max-w-xs">
                                <a href="{{ route('admin.requisitos.index') }}" class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                                    Gestionar Requisitos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</x-app-layout>
