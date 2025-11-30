<x-layouts.app title="Iniciar Sesión Admin">

    {{-- CONTENEDOR PRINCIPAL (FONDO INSTITUCIONAL + GLASS) --}}
    <div class="min-h-screen flex items-center justify-center px-4 relative">

        {{-- Capa de fondo premium institucional --}}
        <div class="absolute inset-0 z-0 bg-premium-cross bg-white">

            {{-- Glassmorphism institucional --}}
            <div class="absolute inset-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
                 style="box-shadow: inset 0 0 500px 500px rgba(255,255,255,0.05);">
            </div>

            {{-- Patrón premium --}}
            <div class="absolute inset-0 z-0 pointer-events-none opacity-45"
                style="
                    background-image:
                        repeating-linear-gradient(0deg, rgba(0,0,0,0.04) 0, rgba(0,0,0,0.04) 1px, transparent 1px, transparent 60px),
                        repeating-linear-gradient(45deg, rgba(0,0,0,0.05) 0, rgba(0,0,0,0.05) 1px, transparent 1px, transparent 40px);
                    background-size: 70px 70px, 40px 40px;
                ">
            </div>

        </div>


        {{-- TARJETA DE LOGIN — MISMO ESTILO QUE EL FORMULARIO DE RESEÑAS --}}
        <div class="relative w-full sm:max-w-lg px-10 py-12 
                    bg-[#cbd2e6]/70 backdrop-blur-xl border border-white/50 
                    shadow-2xl rounded-2xl z-10 shadow-[0_20px_40px_rgba(0,0,0,0.18)]">

            <h2 class="text-3xl font-extrabold text-[#131567] mb-8 text-center">
                <i class="fas fa-user-shield mr-2 icon-blue"></i>
                Acceso al Panel de Administración
            </h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf


                {{-- Email --}}
                <div class="mb-4">
                    <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-envelope icon-blue"></i>
                        Correo Electrónico
                    </label>

                    <x-text-input id="email"
                        class="block mt-1 w-full bg-white/70 border border-gray-300
                               text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-3
                               focus:ring-[#3C5CCF] focus:outline-none"
                        type="email" name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>


                {{-- Contraseña --}}
                <div class="mb-4">
                    <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-lock icon-blue"></i>
                        Contraseña
                    </label>

                    <x-text-input id="password"
                        class="block mt-1 w-full bg-white/70 border border-gray-300
                               text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-3
                               focus:ring-[#3C5CCF] focus:outline-none"
                        type="password" name="password" required />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>


                {{-- Recordarme --}}
                <div class="flex items-center mt-4 gap-2">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-400 text-[#3C5CCF] shadow-sm bg-white/70 focus:ring-[#3C5CCF]"
                        name="remember">

                    <label for="remember_me" class="text-sm text-[#131567]">
                        Recordarme
                    </label>
                </div>


                {{-- Botones --}}
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-[#131567] hover:text-[#0f195f]"
                           href="{{ route('password.request') }}">
                            Olvidaste tu contraseña?
                        </a>
                    @endif

                    <button type="submit"
                        class="px-6 py-3 rounded-xl shadow-md font-semibold text-white
                               bg-gradient-to-r from-[#3C5CCF] to-[#131567]
                               hover:opacity-90 transition">
                        <i class="fas fa-sign-in-alt mr-1"></i> Ingresar
                    </button>

                </div>

            </form>
        </div>
    </div>


    {{-- ICONOS COLOR --}}
    <style>
        .icon-blue { color: #131567; }
    </style>

</x-layouts.app>
