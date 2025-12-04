<x-layouts.app title="Recuperar Contraseña">

    <div class="min-h-screen flex items-center justify-center px-4 font-montserrat relative">

        {{-- Fondo --}}
        <div class="absolute inset-0 z-0 bg-premium-cross bg-white">
            <div class="absolute inset-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
                 style="box-shadow: inset 0 0 500px 500px rgba(255,255,255,0.05);"></div>

            <div class="absolute inset-0 opacity-45 pointer-events-none"
                style="background-image:
                        repeating-linear-gradient(0deg, rgba(0,0,0,0.04) 0, rgba(0,0,0,0.04) 1px, transparent 1px, transparent 60px),
                        repeating-linear-gradient(45deg, rgba(0,0,0,0.05) 0, rgba(0,0,0,0.05) 1px, transparent 1px, transparent 40px);
                       background-size: 70px 70px, 40px 40px;">
            </div>
        </div>

        {{-- Formulario --}}
        <div class="relative w-full max-w-md px-6 py-8 bg-[#cbd2e6]/70 backdrop-blur-xl
                    border border-white/50 shadow-2xl rounded-2xl z-10">

            <h2 class="text-3xl font-extrabold text-[#131567] mb-6 text-center">
                <i class="fas fa-key mr-2 icon-blue"></i>
                Recuperar Contraseña
            </h2>

            <p class="text-sm text-[#131567] text-center mb-6">
                Ingresá tu correo y te enviaremos un enlace para recuperar tu cuenta.
            </p>

            {{-- Mensaje de éxito --}}
            @if (session('status'))
                <div class="mb-4 p-3 text-green-800 bg-green-200 border border-green-300 rounded-xl text-center">
                    {{ session('status') }}
                </div>
            @endif

           <form method="POST" action="{{ route('password.code.send') }}">
            
                @csrf

                <div class="mb-4">
                    <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-envelope icon-blue"></i>
                        Correo Electrónico
                    </label>

                    <x-text-input id="email"
                        class="block mt-1 w-full bg-white/70 border border-gray-300
                               text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-3"
                        type="email" name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <div class="mt-6 text-center">
                    <button type="submit"
                        class="w-full px-6 py-3 rounded-xl shadow-md font-semibold text-white
                               bg-gradient-to-r from-[#3C5CCF] to-[#131567] hover:opacity-90 transition">
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
