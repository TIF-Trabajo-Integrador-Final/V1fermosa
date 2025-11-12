<div class="flex flex-col items-center justify-center py-10 px-4">
    <h2 class="text-3xl font-semibold text-center text-[#0b1b3f] mb-6">
        🎓 Requisitos de Inscripción
    </h2>

    <div class="bg-white border border-[#0b1b3f]/20 shadow-lg rounded-2xl p-6 max-w-2xl w-full">
        @if(count($requisitos) > 0)
        <ul class="list-disc list-inside text-gray-800 text-lg leading-relaxed space-y-2">
            @foreach($requisitos as $req)
            <li>{{ $req->descripcion }}</li>
            @endforeach
        </ul>
        @else
        <p class="text-center text-gray-500 text-base">
            No hay requisitos disponibles en este momento.
        </p>
        @endif
    </div>
</div>