<button wire:click="toggleRequisitos" class="bg-[#131567] text-white px-4 py-2 rounded-lg hover:bg-[#0b1b3f] transition">
    {{ $mostrarRequisitos ? 'Ocultar Requisitos' : 'Mostrar Requisitos' }}
</button>

@if($mostrarRequisitos)
<div class="mt-4 bg-blue-50 border border-[#0b1b3f]/20 rounded-xl shadow-md p-6">
    <h2 class="text-xl font-semibold text-[#131567] mb-4">Requisitos para esta carrera:</h2>
    @if($carrera->requisitos->isNotEmpty())
    <ul class="list-disc list-inside text-gray-700 space-y-2">
        @foreach($carrera->requisitos as $requisito)
        <li>{{ $requisito->descripcion }}</li>
        @endforeach
    </ul>
    @else
    <p class="text-gray-500">No hay requisitos registrados para esta carrera.</p>
    @endif
</div>
@endif