@extends('layouts.app')

@section('title', 'Institución - Quiénes Somos')

@section('content')

<section class="mb-12">
    <h2 class="text-4xl font-bold text-gray-800 text-center mb-8">Nuestros Pilares</h2>
    
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="p-6 text-center border-t-4 border-yellow-500 rounded-lg shadow-md hover:shadow-xl transition duration-300">
            <i class="fas fa-map-marker-alt text-4xl text-yellow-500 mb-3"></i>
            <h3 class="text-2xl font-semibold mb-2">Sedes Modernas</h3>
            <p class="text-gray-600">Instalaciones equipadas para garantizar el mejor aprendizaje en la región.</p>
            <a href="{{ route('sedes.index') }}" class="mt-3 inline-block text-blue-600 hover:underline">Ver Sedes</a>
        </div>
        
        <div class="p-6 text-center border-t-4 border-green-500 rounded-lg shadow-md hover:shadow-xl transition duration-300">
            <i class="fas fa-handshake text-4xl text-green-500 mb-3"></i>
            <h3 class="text-2xl font-semibold mb-2">Convenios Universitarios</h3>
            <p class="text-gray-600">Alianzas con prestigiosas universidades nacionales para potenciar tu título.</p>
            <a href="{{ route('convenios.index') }}" class="mt-3 inline-block text-blue-600 hover:underline">Ver Detalles</a>
        </div>
    </div>
</section>

@endsection