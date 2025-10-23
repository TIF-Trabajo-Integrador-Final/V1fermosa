<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700 flex items-center">
                        <!-- IMAGEN DEL LOGO AGREGADA AQUÍ -->
                        <!-- Usamos la ruta proporcionada por el usuario (ajustar si es necesario) -->
                        <img src="/images/logo.jpeg" 
                             alt="Logo Instituto Superior Fermosa" 
                             class="w-8 h-8 rounded-full mr-3 border border-blue-100 shadow-sm"
                             onerror="this.onerror=null; this.src='https://placehold.co/32x32/1d4ed8/ffffff?text=Logo'"
                        >
                        INSTITUTO SUPERIOR FERMOSA
                    </a>
                </div>

                <!-- Navigation Links -->
                {{-- Usamos 'gap-4' en el div contenedor para asegurar la separación entre botones --}}
                <div class="hidden gap-4 sm:-my-px sm:ms-10 sm:flex">
                    
                    {{-- Inicio (Botón Principal 1) --}}
                    {{-- **Corregido:** Icono de casa y margen a la derecha (mr-1) --}}
                    <a href="{{ route('home') }}" 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-house-chimney mr-1"></i>
                        Inicio
                    </a>

                    {{-- Carreras --}}
                    {{-- **Corregido:** Icono de graduación y margen a la derecha (mr-1) --}}
                    <a href="{{ route('carreras.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-graduation-cap mr-1"></i>
                        Carreras
                    </a>

                    {{-- Planes --}}
                    {{-- **Corregido:** Icono de libro y margen a la derecha (mr-1) --}}
                    <a href="{{ route('planes.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-book-open-reader mr-1"></i>
                        Planes de Estudio
                    </a>

                    {{-- Ofertas --}}
                    {{-- **Corregido:** Icono de documento y margen a la derecha (mr-1) --}}
                    <a href="{{ route('ofertas.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-file-lines mr-1"></i>
                        Ofertas Educativas
                    </a>
                    
                    {{-- Sedes --}}
                    {{-- **Corregido:** Icono de marcador y margen a la derecha (mr-1) --}}
                    <a href="{{ route('sedes.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border-blue-600 text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-location-dot mr-1"></i>
                        Sedes
                    </a>
                    
                    {{-- Inscripción (Botón Destacado) --}}
                    {{-- **Corregido:** Icono de lápiz/registro y margen a la derecha (mr-1) --}}
                    <a href="{{ route('requisitos.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border border-blue-600 text-sm leading-4 font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition duration-150 ease-in-out shadow-sm">
                        <i class="fa-solid fa-file-signature mr-1"></i>
                        Requisitos de Inscripción
                    </a>
                </div>
            </div>
            

            <!-- Hamburger (para mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Menú para móviles) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Enlaces para móvil también con iconos --}}
            <a href="{{ route('home') }}" class="flex items-center px-3 py-2 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-house-chimney mr-2"></i>
                Inicio
            </a>
            <a href="{{ route('carreras.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-blue-700 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-graduation-cap mr-2"></i>
                Carreras
            </a>
            <a href="{{ route('planes.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-blue-700 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-book-open-reader mr-2"></i>
                Planes
            </a>
            <a href="{{ route('ofertas.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-blue-700 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-file-lines mr-2"></i>
                Ofertas
            </a>
            <a href="{{ route('sedes.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-blue-700 bg-gray-100 hover:bg-gray-200 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-location-dot mr-2"></i>
                Sedes
            </a>
            <a href="{{ route('requisitos.index') }}" class="flex items-center px-3 py-2 text-base font-medium text-white bg-green-600 hover:bg-green-700 rounded-md transition duration-150 ease-in-out">
                <i class="fa-solid fa-file-signature mr-2"></i>
                Inscripción
            </a>
        </div>
    </div>
</nav>