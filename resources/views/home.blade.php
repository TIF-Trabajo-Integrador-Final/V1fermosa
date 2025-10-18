@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<section class="relative min-h-[450px] mb-16">
    
    <div id="image-carousel" class="relative h-[450px] overflow-hidden">
        
        <div class="carousel-item absolute w-full h-full transition-opacity duration-1000 ease-in-out" 
             style="opacity: 1; background-image: url('{{ asset('images/fermosa.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-blue-400 opacity-60"></div>
            <div class="container mx-auto px-4 text-center py-40 relative z-10 text-white">
                <h1 class="text-6xl font-black mb-4">El Futuro Comienza en Fermosa</h1>
                <p class="text-xl mb-8">Formando profesionales líderes en un entorno de excelencia académica.</p>
                <a href="{{ route('carreras.index') }}" 
                   class="bg-yellow-400 text-blue-800 font-bold text-lg py-3 px-8 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105 shadow-lg">
                    Explora Nuestra Oferta Educativa
                </a>
            </div>
        </div>

        <div class="carousel-item absolute w-full h-full transition-opacity duration-1000 ease-in-out" 
             style="opacity: 0; background-image: url('{{ asset('images/instituto2.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-blue-400 opacity-60"></div>
            <div class="container mx-auto px-4 text-center py-40 relative z-10 text-white">
                <h1 class="text-6xl font-black mb-4">Invertí en Tu Mañana</h1>
                <p class="text-xl mb-8">Elegí una carrera que impulse tu potencial.</p>
            </div>
        </div>

        <div class="carousel-item absolute w-full h-full transition-opacity duration-1000 ease-in-out" 
             style="opacity: 0; background-image: url('{{ asset('images/insituto3.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-blue-400 opacity-60"></div>
            <div class="container mx-auto px-4 text-center py-40 relative z-10 text-white">
                <h1 class="text-6xl font-black mb-4">Tu Éxito, Nuestra Misión</h1>
                <p class="text-xl mb-8">Un ambiente educativo pensado para vos.</p>
            </div>
        </div>
        
    </div>
</section>

<section class="container mx-auto px-4 mb-12">
    <h2 class="text-4xl font-bold text-black-800 text-center mb-8">Quiénes Somos</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="flip-card mision">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <h3 class="text-3xl font-bold text-black-700 mb-4">Nuestra Misión</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Es ser una institución privada comprometida para preparar a futuros profesionales para triunfar en un mundo en constante evolución.
                    </p>
                </div>
                <div class="flip-card-back bg-blue-50">
                    <h3 class="text-3xl font-bold text-black-700 mb-4">Enfoque</h3>
                    <p class="text-gray-800 leading-relaxed">
                        Es la dedicación a la excelencia académica y nuestra pasión por el aprendizaje son los pilares que sustentan todo lo que hacemos.
                    </p>
                </div>
            </div>
        </div>

        <div class="flip-card vision">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <h3 class="text-3xl font-bold text-yellow-700 mb-4">Nuestra Visión</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Ser la institución terciaria líder, reconocida a nivel nacional e internacional por la calidad de nuestros graduados.
                    </p>
                </div>
                <div class="flip-card-back bg-yellow-50">
                    <h3 class="text-3xl font-bold text-yellow-700 mb-4">Objetivo</h3>
                    <p class="text-gray-800 leading-relaxed">
                        Forjar alianzas estratégicas que potencien la experiencia educativa de nuestros estudiantes.
                    </p>
                </div>
            </div>
        </div>

        <div class="flip-card fin">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <h3 class="text-3xl font-bold text-green-700 mb-4">Nuestro Fin</h3>
                    <p class="text-gray-700 leading-relaxed">
                        El fin principal es enriquecer la experiencia educativa y preparar a nuestros estudiantes para enfrentar los desafíos del mundo laboral con confianza.
                    </p>
                </div>
                <div class="flip-card-back bg-green-50">
                    <h3 class="text-3xl font-bold text-green-700 mb-4">Resultado</h3>
                    <p class="text-gray-800 leading-relaxed">
                        Buscamos que cada egresado sea un líder y agente de cambio en la sociedad.
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</section>
    
<section class="mb-12 text-center">
    <h2 class="text-4xl font-bold text-gray-800 text-center mb-8">Ubicación de la Sede Principal</h2>
    
    <div class="container mx-auto px-4 max-w-4xl"> 
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-100">
            <iframe 
                src="{{ config('maps.home_iframe') }}" 
                width="100%" 
                height="450" style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="block">
            </iframe>
        </div>
    </div>
</section>

@endsection

{{-- Script del carrusel para ser inyectado en app.blade.php --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;
        const intervalTime = 5000; // 5 segundos

        // Inicializar el primer slide visible
        items.forEach((item, index) => {
            item.style.opacity = index === 0 ? '1' : '0';
        });

        function showNextSlide() {
            // Ocultar slide actual
            items[currentIndex].style.opacity = '0';
            
            // Calcular nuevo índice
            currentIndex = (currentIndex + 1) % items.length;
            
            // Mostrar slide siguiente
            items[currentIndex].style.opacity = '1';
        }

        // Iniciar la transición automática
        setInterval(showNextSlide, intervalTime);
    });
</script>
@endpush