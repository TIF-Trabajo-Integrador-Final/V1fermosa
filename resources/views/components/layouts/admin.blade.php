<!DOCTYPE html> 
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Panel Admin' }} - ISF</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Fondo animado */
        .animated-gradient {
            background: linear-gradient(120deg, #1e40af 0%, #2563eb 25%, #4f46e5 50%, #1e3a8a 75%);
            background-size: 400% 400%;
            animation: gradientShift 12s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Waves decorativas */
        .wave {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 200%;
            height: 120px;
            pointer-events: none;
        }

        .wave svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .wave1 { opacity: 0.12; animation: waveMove 16s linear infinite; }
        .wave2 { opacity: 0.08; animation: waveMoveReverse 20s linear infinite; }

        @keyframes waveMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-25%); }
        }

        @keyframes waveMoveReverse {
            0% { transform: translateX(0); }
            100% { transform: translateX(25%); }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">

<!-- CONTENEDOR GLOBAL -->
<div x-data="{ openSidebar: false, openApps: false }" class="min-h-screen flex flex-col">

    <!-- NAV SUPERIOR -->
    <nav class="bg-blue-900 text-white px-4 py-3 flex items-center justify-between shadow-md border-b border-white/5">

        <div class="flex items-center gap-3">

            <!-- Botón Grid de apps (SOLO ESCRITORIO) -->
            <button @click="openApps = !openApps" class="text-2xl hover:text-gray-300 hidden lg:block">
                ▦
            </button>

            <!-- Botón hamburguesa (solo móvil) -->
            <button @click="openSidebar = true" class="lg:hidden text-2xl focus:outline-none">
                ☰
            </button>

            <h1 class="font-bold text-lg ml-2">Administrador ISF</h1>
        </div>

        <div>
            <span class="text-sm">Bienvenido, <strong>{{ Auth::user()->name }}</strong></span>
        </div>

    </nav>

    <!-- MENÚ DESPLEGABLE DE APPS (solo escritorio) -->
    <div 
        x-show="openApps"
        @click.away="openApps = false"
        x-transition
        class="absolute left-4 top-16 w-80 bg-white shadow-xl rounded-xl border border-gray-200 p-4 z-50 hidden lg:block"
    >
        <h2 class="text-sm font-semibold text-gray-600 mb-3">Accesos rápidos</h2>

        <div class="flex flex-col gap-2">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">🏠</span>
                <div>
                    <div class="font-medium">Dashboard</div>
                    <p class="text-xs text-gray-500">Inicio</p>
                </div>
            </a>

            <a href="{{ route('admin.carreras.index') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">🎓</span>
                <div>
                    <div class="font-medium">Carreras</div>
                    <p class="text-xs text-gray-500">Administrar</p>
                </div>
            </a>

            <a href="{{ route('admin.requisitos.index') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">📄</span>
                <div>
                    <div class="font-medium">Requisitos</div>
                    <p class="text-xs text-gray-500">Gestionar</p>
                </div>
            </a>

            <a href="{{ route('admin.convenios.index') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">🏛️</span>
                <div>
                    <div class="font-medium">Convenios</div>
                    <p class="text-xs text-gray-500">Gestionar</p>
                </div>
            </a>

            <a href="{{ route('admin.resenas.index') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">📝</span>
                <div>
                    <div class="font-medium">Reseñas</div>
                    <p class="text-xs text-gray-500">Gestionar</p>
                </div>
            </a>

            <a href="{{ url('/') }}" class="flex items-center gap-3 p-3 rounded hover:bg-gray-100">
                <span class="text-2xl">🌐</span>
                <div>
                    <div class="font-medium">Sitio Web</div>
                    <p class="text-xs text-gray-500">Ver sitio</p>
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded mt-2">
                    Cerrar Sesión
                </button>
            </form>

        </div>
    </div>

    <!-- SIDEBAR MÓVIL -->
    <div
        class="fixed inset-y-0 left-0 z-40 w-64 bg-white text-gray-900 shadow-xl transform -translate-x-full 
               transition-transform duration-300 ease-in-out lg:hidden"
        :class="{ 'translate-x-0': openSidebar }"
    >
        <div class="p-5 border-b">
            <h2 class="text-lg font-bold">Menú</h2>
        </div>

        <nav class="flex flex-col p-4 space-y-3">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                🏠 <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.carreras.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                🎓 <span>Carreras</span>
            </a>

            <a href="{{ route('admin.requisitos.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                📄 <span>Requisitos</span>
            </a>

            <!-- NUEVO: CONVENIOS -->
            <a href="{{ route('admin.convenios.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                🏛️ <span>Convenios</span>
            </a>

            <!-- NUEVO: RESEÑAS -->
            <a href="{{ route('admin.resenas.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                📝 <span>Reseñas</span>
            </a>

            <a href="{{ url('/') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
                🌐 <span>Ver sitio</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="pt-4">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded">
                    Cerrar Sesión
                </button>
            </form>

        </nav>
    </div>

    <!-- OVERLAY OSCURECIDO PARA MOBILE -->
    <div 
        class="fixed inset-0 bg-black/50 z-30 lg:hidden"
        x-show="openSidebar"
        @click="openSidebar = false"
        x-transition.opacity>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-1 relative animated-gradient text-white p-6 overflow-hidden">
        
        {{ $slot }}

        <!-- Waves decorativas -->
        <div class="wave wave1">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C200,100 400,100 600,50 C800,0 1000,0 1200,50 L1200,120 L0,120 Z" fill="rgba(255,255,255,0.08)" />
            </svg>
        </div>

        <div class="wave wave2">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,20 C200,0 400,80 600,60 C800,40 1000,20 1200,40 L1200,120 L0,120 Z" fill="rgba(255,255,255,0.06)" />
            </svg>
        </div>

    </main>

</div>

@livewireScripts
</body>
</html>
