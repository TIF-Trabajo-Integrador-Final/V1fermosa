<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Fermosa | @yield('title')</title>
        @vite('resources/css/app.css')
        @yield('styles')
        </head>
        <body> 

    <header class="bg-pink-200 shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
    <a href="{{ route('home') }}" class="text-3xl font-bold text-blue tracking-wider">FERMOSA</a>
        <div class="space-x-6 text-lg">
        <a href="{{ route('institucion') }}" class="text-blue hover:text-white-200">Institución</a>
        <a href="{{ route('carreras.index') }}" class="text-blue hover:text-white-200">Oferta Educativa</a>
        <a href="{{ route('inscripcion') }}" class="bg-pink-500 text-white-800 font-semibold py-2 px-4 rounded-lg">Inscribite</a>
        <a href="https://institutofermosa.online/moodle/" class="text-blue hover:text-white-200">Aula Virtual</a>
    </div>
   </nav>
 </header>

   <main class="min-h-screen"> 
     @yield('content') 
   </main>

<footer class="bg-pink-200 text-black p-8 ext-center">
    <div class="container mx-auto px-4 ext-center">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-6 border-b border-black-700">
            
            {{-- Columna 1: Información de Contacto --}}
            <div class="text-left md:col-span-1 t">
                <p class="mb-4 text-lg font-bold text-black">Información de Contacto</p>
                
                {{-- Dirección --}}
                <div class="flex items-start mb-2 text-sm text-black-300">
                    <i class="fas fa-map-marker-alt text-lg mr-3 mt-1 text-black-400"></i>
                    <span> Maipu 850 - Formosa</span>
                </div>
    
                {{-- Email --}}
                <div class="flex items-center text-sm text-black-300">
                    <i class="fas fa-envelope text-lg mr-3 text-black-400"></i>
                    <a href="mailto:info@institutofermosa.edu.ar" class="hover:text-yellow-400 transition duration-200">
                        info@institutofermosa.edu.ar
                    </a>
                </div>
            </div>
            
            {{-- Columna 2: Navegación Rápida (Opcional, Puedes añadir tus links aquí) --}}
            <div class="text-left md:col-span-1">
                 <p class="mb-4 text-lg font-bold text-black">Navegación Rápida</p>
                 <ul class="space-y-2 text-sm">
                     <li><a href="{{ route('home') }}" class="text-black-300 hover:text-orange-400 transition duration-200">Inicio</a></li>
                     <li><a href="{{ route('institucion') }}" class="text-black-300 hover:text-orange-400 transition duration-200">Quiénes Somos</a></li>
                     <li><a href="{{ route('carreras.index') }}" class="text-black-300 hover:text-orange-400 transition duration-200">Oferta Educativa</a></li>
                     <li><a href="https://institutofermosa.online/moodle/" class="text-black-300 hover:text-orange-400 transition duration-200">Aula Virtual</a></li>
                 </ul>
            </div>

            {{-- Columna 3: Redes Sociales (Mantenemos tu estilo y lo centramos en el MD) --}}
            <div class="text-center md:col-span-1 md:text-right">
                <p class="mb-4 text-lg font-bold text-black">Síguenos</p>
                <div class="flex space-x-6 justify-center md:justify-end">
                    {{-- Facebook --}}
                    <a href="https://facebook.com/InstitutoSuperiorFermosa" target="_blank" 
                        title="Facebook" 
                        class="text-3xl text-blue-500 hover:text-blue-400 transition duration-200">
                        <i class="fab fa-facebook-square"></i> 
                    </a>
                    {{-- Instagram --}}
                    <a href="https://instagram.com/InstitutoSuperiorFermosa" target="_blank" 
                        title="Instagram"
                        class="text-3xl text-pink-600 hover:text-pink-400 transition duration-200">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            
        </div> 
        
        {{-- Sección de Copyright --}}
        <div class="mt-4 pt-4 text-center text-sm text-black-600">
            <p>
                &copy; {{ date('Y') }} FERMOSA. Todos los derechos reservados.
            </p>
            <p class="mt-1 text-xs text-black-900">
                Desarrollado por el Equipo de Desarrollo BEYAVA.
            </p>
        </div>
        
    </div>
</footer>
<a href="https://wa.me/5493704699344" 
    target="_blank" 
    title="Chatear por WhatsApp"
    class="
        fixed bottom-8 right-8 
        bg-[#25d366] text-white 
        w-16 h-16 rounded-full 
        flex items-center justify-center 
        text-3xl shadow-xl z-50 
        transition duration-300 transform hover:scale-110 hover:bg-[#20b358]
    ">
    <i class="fab fa-whatsapp"></i>
</a>

<button onclick="scrollToTop()" id="btnTop" title="Ir arriba"
    class="
        hidden fixed bottom-[100px] right-8 
        bg-blue-600 text-white 
        p-3 rounded-full 
        text-xl z-40 
        shadow-lg border-none outline-none
        transition duration-300 transform hover:scale-110 hover:bg-blue-700
    ">
    <i class="fas fa-arrow-up"></i>
</button>
    @stack('scripts')

   <script>

   window.onscroll = function() { scrollFunction(); };

   function scrollFunction() {
     const btn = document.getElementById("btnTop");
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    btn.style.display = "block";} else 
{
 btn.style.display = "none";
}
}

function scrollToTop() {
window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
@vite('resources/js/app.js')
</body>
</html>