<x-layouts.app title="Restablecer Contraseña">
    @php if (!isset($request)) $request = request(); @endphp
    <div class="min-h-screen flex items-center justify-center px-4 font-montserrat relative">

        <div class="relative w-full max-w-md px-6 py-8 bg-[#cbd2e6]/70 backdrop-blur-xl
                    border border-white/50 shadow-2xl rounded-2xl z-10">

            <h2 class="text-3xl font-extrabold text-[#131567] text-center mb-6">
                <i class="fas fa-lock mr-2 icon-blue"></i>
                Crear Nueva Contraseña
            </h2>

            <p class="text-sm text-[#131567] text-center mb-6">
                Ingresá tu nueva contraseña para continuar.
            </p>

            {{-- FORMULARIO --}}
            <form method="POST" action="{{ route('password.reset.save') }}">
                @csrf

                {{-- Email oculto --}}
                <input type="hidden" name="email" value="{{ $email }}">

                {{-- NUEVA CONTRASEÑA --}}
                <div class="mb-4">
                    <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-key icon-blue"></i>
                        Nueva Contraseña
                    </label>

                    <div class="relative">
                        <x-text-input id="password"
                            class="block mt-1 w-full bg-white/70 border border-gray-300
                                   text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-3 pr-10"
                            type="password" name="password" required
                            oninput="checkStrength(this.value)" />

                        {{-- OJITO --}}
                        <span onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-[#131567]/70 hover:text-[#131567]">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    {{-- Indicador de fuerza --}}
                    <div class="mt-2">
                        <div id="strength-bar" class="h-2 w-full rounded bg-gray-300 overflow-hidden">
                            <div id="strength-progress" class="h-full w-0 bg-red-500 transition-all"></div>
                        </div>
                        <p id="strength-text" class="text-xs mt-2 text-[#131567] font-semibold"></p>
                    </div>
                </div>

                {{-- CONFIRMAR CONTRASEÑA --}}
                <div class="mb-4">
                    <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                        <i class="fas fa-check-circle icon-blue"></i>
                        Confirmar Contraseña
                    </label>

                    <div class="relative">
                        <x-text-input id="password_confirmation"
                            class="block mt-1 w-full bg-white/70 border border-gray-300
                                   text-[#131567] placeholder-[#131567]/50 rounded-xl px-3 py-3 pr-10"
                            type="password" name="password_confirmation" required />

                        {{-- OJITO --}}
                        <span onclick="togglePassword('password_confirmation', this)"
                            class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-[#131567]/70 hover:text-[#131567]">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                {{-- Errores --}}
                <x-input-error :messages="$errors->get('password')" class="mb-2 text-red-600" />

                {{-- Botón --}}
                <button class="mt-6 w-full px-6 py-3 rounded-xl text-white
                        bg-gradient-to-r from-[#3C5CCF] to-[#131567] hover:opacity-90 transition">
                    Guardar nueva contraseña
                </button>

            </form>
        </div>
    </div>

    {{-- ESTILOS --}}
    <style>
        .icon-blue { color: #131567; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
    </style>

    {{-- SCRIPT: Mostrar/ocultar contraseña --}}
    <script>
        function togglePassword(fieldId, iconElement) {
            const input = document.getElementById(fieldId);

            if (input.type === "password") {
                input.type = "text";
                iconElement.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = "password";
                iconElement.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>

    {{-- SCRIPT: indicador de fuerza --}}
    <script>
        function checkStrength(password) {
            const progress = document.getElementById("strength-progress");
            const text = document.getElementById("strength-text");

            let strength = 0;

            if (password.length >= 6) strength += 20;
            if (password.match(/[A-Z]/)) strength += 20;
            if (password.match(/[a-z]/)) strength += 20;
            if (password.match(/[0-9]/)) strength += 20;
            if (password.match(/[\W]/)) strength += 20;

            progress.style.width = strength + "%";

            if (strength <= 20) {
                progress.className = "h-full bg-red-500 transition-all";
                text.textContent = "Muy débil";
            } else if (strength <= 40) {
                progress.className = "h-full bg-orange-500 transition-all";
                text.textContent = "Débil";
            } else if (strength <= 60) {
                progress.className = "h-full bg-yellow-500 transition-all";
                text.textContent = "Aceptable";
            } else if (strength <= 80) {
                progress.className = "h-full bg-blue-500 transition-all";
                text.textContent = "Fuerte";
            } else {
                progress.className = "h-full bg-green-600 transition-all";
                text.textContent = "Muy fuerte";
            }
        }
    </script>

</x-layouts.app>
