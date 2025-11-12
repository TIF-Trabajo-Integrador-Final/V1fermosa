<div class="mt-4">
    <button wire:click="toggleRequisitos"
        class="bg-[#131567] text-white px-4 py-2 rounded-lg hover:bg-[#0b1b3f] transition">
        {{ $show ? 'Ocultar Requisitos' : 'Ver Requisitos' }}
    </button>

    @if($show && count($requisitos) > 0)
    <ul class="mt-4 list-disc list-inside text-gray-800 bg-blue-50 p-4 rounded-lg shadow-md">
        @foreach($requisitos as $req)
        <li>{{ $req->descripcion }}</li>
        @endforeach
    </ul>
    @elseif($show)
    <p class="mt-4 text-gray-600">No hay requisitos definidos para esta carrera.</p>
    @endif
</div>