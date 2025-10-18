@extends('layouts.app')

@section('title', 'Oferta Educativa')

@section('content')
    <h1 class="text-4xl font-extrabold text-blue-700 mb-8 border-b-4 border-blue-500 pb-2">
        Nuestra Oferta Educativa
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($carreras as $carrera)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $carrera->nombre }}</h2>
                <p class="text-sm text-gray-500 mb-4">Duración: {{ $carrera->duracion }}</p>
                <p class="text-gray-600 mb-4">{{ $carrera->descripcion_corta }}</p>
                
                <a href="{{ route('carreras.show', $carrera) }}" 
                   class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-700">
                    Ver Plan de Estudios
                </a>
            </div>
        @empty
            <p class="text-gray-500 col-span-3">No hay carreras disponibles actualmente.</p>
        @endforelse
    </div>
@endsection