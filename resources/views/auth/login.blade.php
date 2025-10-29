<x-layouts.app title="Iniciar Sesión Admin">
    <div 
        class="relative min-h-screen bg-fixed bg-cover bg-center flex items-center justify-center px-4" 
        style="background-image: url('{{ asset('images/logo.jpeg') }}');"
        {{-- CAMBIO: Añadimos 'flex items-center justify-center px-4' al div principal para centrar su contenido --}}
    >
        {{-- CAMBIO: Aumentamos la opacidad para que el formulario resalte más --}}
        <div class="absolute inset-0 bg-gray-900 opacity-60"></div> 
        
        {{-- 
            CAMBIO: 
            - Eliminamos el 'div' intermedio que tenías (el 'flex flex-col...').
            - Hacemos la tarjeta 'relative' para que se ponga sobre la capa de opacidad.
            - La hacemos más ancha: 'sm:max-w-lg' (antes 'sm:max-w-md').
            - Aumentamos el padding: 'px-8 py-10' (antes 'px-6 py-8').
            - Damos un fondo semitransparente: 'bg-white/95' (antes 'bg-white').
        --}}
        <div class="relative w-full sm:max-w-lg px-8 py-10 bg-white/95 shadow-2xl rounded-lg border-t-4 border-indigo-600">

            {{-- CAMBIO: Título más grande 'text-3xl' (antes 'text-2xl') --}}
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Acceso al Panel de Administración</h2>
            
            <!-- Session Status (Sin cambios) -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address (Sin cambios) -->
                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password (Sin cambios) -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me / Forgot Password / Log in (Sin cambios) -->
                <div class="flex flex-col items-start mt-6"> {{-- (Ajustado un poco el margen) --}}
                    <label for="remember_me" class="inline-flex items-center mb-4">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>
                    
                    <div class="flex items-center justify-between w-full">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-lg px-6 py-2.5"> {{-- (Botón un poco más grande) --}}
                            {{ __('Ingresar') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>