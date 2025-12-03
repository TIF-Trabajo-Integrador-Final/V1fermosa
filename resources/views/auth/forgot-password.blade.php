<x-layouts.app title="Recuperar Contraseña">

    <div class="min-h-screen flex items-center justify-center px-4 relative font-montserrat">

        {{-- Capa de fondo --}}
        <div class="absolute inset-0 z-0 bg-premium-cross bg-white">

            <div class="absolute inset-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
                 style="box-shadow: inset 0 0 500px 500px rgba(255,255,255,0.05);"></div>

            <div class="absolute inset-0 z-0 pointer-events-none opacity-45"
                style="
                    background-image:
                        repeating-linear-gradient(0deg, rgba(0,0,0,0.04) 0, rgba(0,0,0,0.04) 1px, transparent 1px, transparent 60px),
                        repeating-linear-gradient(45deg, rgba(0,0,0,0.05) 0, rgba(0,0,0,0.05) 1px, transparent 1px, transparent 40px);
                    background-size: 70px 70px, 40px 40px;
                ">
            </div>

        </div>

        {{-- CARD FORMULARIO --}}
        <div class="relative w-full max-w-md sm:max-w-lg px-6 py-8 sm:px-10 sm:py-10 
                    bg-[#cbd2e6]/70 backdrop-blur-xl border border-white/50 
                    shadow-2xl rounded-2xl z-10 shadow-[0_20px_40px_rgba(0,0,0,0.18)]">

            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#131567] mb-6 sm:mb-8 text-center leading-tight">
                <i class="fas fa-key mr-2 icon-blue"></i>
                Recuperar Contraseña
            </h2>

            <p class="text-sm text-[#131567] text-center mb-6 leading-relaxed">
                ¿Olvidaste tu contraseña?  
                No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace
                para restablecerla.
            </p>

            {{-- Mensaje de estado --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- FORMULARIO --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="text-xs sm:text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-envelope icon-blue"></i>
                        Correo Electrónico
                    </label>

                    <x-text-input id="email"
                        class="block mt-1 w-full bg-white/70 border border-gray-300
                               text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-2 sm:py-3
                               text-sm sm:text-base focus:ring-[#3C5CCF] focus:outline-none"
                        type="email" name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-1 sm:mt-2 text-red-600 text-sm" />
                </div>

                {{-- Botón --}}
                <div class="mt-6 text-center">
                    <button type="submit"
                        class="px-6 py-3 rounded-xl shadow-md font-semibold text-white
                               bg-gradient-to-r from-[#3C5CCF] to-[#131567]
                               hover:opacity-90 transition text-sm sm:text-base">
                        <i class="fas fa-paper-plane mr-1"></i>
                        Enviar Enlace de Recuperación
                    </button>
                </div>

            </form>

        </div>

    </div>

    <style>
        .icon-blue { color: #131567; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
    </style>

</x-layouts.app>
