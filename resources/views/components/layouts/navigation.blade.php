<nav class="bg-gradient-to-r from-[#0b1b3f] to-[#1c3faa] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- LOGO --}}
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-8 rounded">
                <span class="font-semibold text-lg">Instituto Superior Fermosa</span>
            </div>

            {{-- LINKS DE NAVEGACIÓN --}}
            <div class="hidden md:flex items-center space-x-6">

                {{-- Inicio --}}
                <a href="{{ route('inicio') }}"
                    class="flex items-center space-x-1 hover:text-gray-200 transition">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>

                {{-- Carreras (con dropdown si lo deseas más adelante) --}}
                <a href="{{ route('carreras.index') }}"
                    class="flex items-center space-x-1 hover:text-gray-200 transition">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Carreras</span>
                </a>

                {{-- PANEL ADMIN  🚀 --}}
                <a href="{{ route('admin.entry') }}"
                    class="flex items-center space-x-1 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition">
                    <i class="fas fa-user-shield"></i>
                    <span>Panel Admin</span>
                </a>
            </div>

            {{-- MENÚ MÓVIL --}}
            <div class="md:hidden flex items-center">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MENÚ RESPONSIVE --}}
    <div id="mobile-menu" class="hidden md:hidden bg-[#0b1b3f] border-t border-white/10">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ route('inicio') }}" class="block hover:text-gray-300">Inicio</a>
            <a href="{{ route('carreras.index') }}" class="block hover:text-gray-300">Carreras</a>
            <a href="{{ route('admin.entry') }}" class="block hover:text-gray-300 font-semibold">Panel Admin</a>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</nav>