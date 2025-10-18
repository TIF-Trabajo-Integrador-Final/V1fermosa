@extends('layouts.app')

@section('title', 'Sedes')

@section('content')
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 border-b-2 pb-2 text-center">Nuestras Sedes</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
       @forelse ($sedes as $sede)
    <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">{{ $sede->nombre }}</h2>
        <p class="text-gray-600 mb-4">{{ $sede->direccion }}</p>
        <p class="text-sm text-gray-500">Teléfono: {{ $sede->telefono ?? 'N/A' }}</p>

       @if ($sede->mapa_url)
    <div class="mt-4 rounded-lg overflow-hidden border border-gray-200 shadow-md">
        <iframe 
            src="{{ $sede->mapa_url }}" 
            width="100%" 
            height="250" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="block">
        </iframe>
    </div>
@endif
    </div>
@empty
    @endforelse
    </div>
@endsection