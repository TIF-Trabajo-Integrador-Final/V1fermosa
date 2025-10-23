    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Planes de Estudio</h1>

        @if($carreras->isEmpty())
    <p class="text-lg text-gray-600 mt-4 p-4 bg-white rounded-lg shadow">No se encontraron carreras disponibles en este momento.</p>
@else
    {{-- Itera sobre la colección de carreras --}}
    @foreach($carreras as $carrera)
        <div class="mb-8 border-b pb-4 bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-2 text-blue-700">{{ $carrera->nombre }} ({{ $carrera->nivel }})</h2>

            @if($carrera->planes->count() > 0)
                <ul class="list-disc ml-6 space-y-2">
                    @foreach($carrera->planes as $plan)
                        <li class="text-gray-700">
                            <strong>{{ $plan->nombre }}</strong> - duración: {{ $plan->duracion }}
                            <br>
                            <span class="text-sm text-gray-500">{{ $plan->descripcion }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 italic text-sm mt-2">No hay plan de estudios cargado aún para esta carrera.</p>
            @endif
        </div>
    @endforeach
@endif
    </div>

