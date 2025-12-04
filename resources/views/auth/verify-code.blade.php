<x-layouts.app title="Verificar Código">

    <div class="min-h-screen flex items-center justify-center px-4 font-montserrat">

        <div class="w-full max-w-md px-6 py-8 bg-[#cbd2e6]/70 backdrop-blur-xl
                    border border-white/50 shadow-2xl rounded-2xl">

            <h2 class="text-3xl font-extrabold text-[#131567] text-center mb-6">
                <i class="fas fa-shield-alt mr-2 icon-blue"></i>
                Verificar Código
            </h2>

            <p class="text-sm text-[#131567] text-center mb-4">
                Hemos enviado un código al correo:<br>
                <b>{{ $email }}</b>
            </p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

         <form method="POST" action="{{ route('verify.code') }}">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">

                <label class="text-sm font-bold text-[#131567]">Código de Verificación</label>

                <x-text-input
                    name="code"
                    class="w-full mt-1 bg-white/70 border border-gray-300 text-[#131567]
                           placeholder-[#131567]/50 rounded-xl px-3 py-3"
                    placeholder="123456"
                    required
                />

                <x-input-error :messages="$errors->get('code')" class="mt-2 text-red-600" />

                <button class="mt-6 w-full px-6 py-3 rounded-xl text-white
                               bg-gradient-to-r from-[#3C5CCF] to-[#131567] hover:opacity-90 transition">
                    Validar Código
                </button>

            </form>
        </div>

    </div>

    <style>
        .icon-blue { color: #131567; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
    </style>

</x-layouts.app>
