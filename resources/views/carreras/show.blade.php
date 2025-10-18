@extends('layouts.app')

@section('title', $carrera->nombre)

@section('content')
    <article class="bg-white p-8 rounded-xl shadow-2xl">
        <h1 class="text-5xl font-extrabold text-blue-700 mb-4">{{ $carrera->nombre }}</h1>
        <p class="text-lg text-gray-600 mb-6 border-b pb-4">
            **Título Otorgado:** {{ $carrera->titulo_otorgado }} | 
            **Duración:** {{ $carrera->duracion }}
        </p>

        <section class="mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Descripción General</h2>
            <p class="text-gray-700 leading-relaxed">{{ $carrera->descripcion_larga }}</p>
        </section>

        <section class="mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Plan de Estudios</h2>
            
            @php
                $planAgrupado = $carrera->planesDeEstudio->sortBy('semestre')->groupBy('semestre');
            @endphp

            @foreach ($planAgrupado as $semestre => $materias)
                <div class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <h3 class="bg-blue-100 text-blue-800 text-xl font-semibold p-4">{{ $semestre }}</h3>
                    <ul class="divide-y divide-gray-200">
                        @foreach ($materias as $materia)
                            <li class="flex justify-between py-3 px-4 text-gray-700 hover:bg-gray-50">
                                <span>{{ $materia->materia }}</span>
                                <span class="text-sm font-medium text-gray-500">{{ $materia->horas_semanales }} hs/sem</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </section>

        <section>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Requisitos de Ingreso</h2>
            @foreach ($carrera->ofertas as $oferta)
                <div class="bg-green-50 p-4 rounded-lg shadow-md border-l-4 border-green-500 mb-4">
                    <p class="text-lg font-semibold text-green-700">Modalidad: {{ $oferta->tipo }}</p>
                    <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $oferta->requisitos }}</p>
                </div>
            @endforeach
        </section>
    </article>
@endsection