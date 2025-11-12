<x-layouts.app>
  <div class="container mx-auto px-4 md:px-8 max-w-7xl py-12">
    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-200 flex flex-col md:flex-row items-stretch">

      {{-- Imagen completa a la izquierda --}}
      <div class="md:w-[45%] bg-gray-100 flex items-center justify-center p-4">
        @if($carrera->imagen)
        <img src="{{ Storage::url($carrera->imagen) }}"
          alt="{{ $carrera->nombre }}"
          class="object-contain w-full h-auto max-h-[550px] rounded-lg shadow-md">
        @else
        <img src="{{ asset('images/default_carrera.jpg') }}"
          alt="Carrera sin imagen"
          class="object-contain w-full h-auto max-h-[550px] rounded-lg shadow-md">
        @endif
      </div>

      {{-- Contenido derecho --}}
      <div class="md:w-[55%] p-10 text-gray-800 flex flex-col justify-between bg-white">
        <div>
          <h1 class="text-3xl font-bold text-[#131567] mb-4">{{ $carrera->nombre }}</h1>

          <p class="text-sm mb-2"><strong>Nivel académico:</strong> {{ $carrera->nivel->nombre ?? '—' }}</p>
          <p class="text-sm mb-2"><strong>Duración:</strong> {{ $carrera->duracion_meses }} meses</p>

          @if($carrera->descripcion)
          <p class="text-sm mb-4"><strong>Descripción:</strong> {{ $carrera->descripcion }}</p>
          @endif

          @if($carrera->perfil_profesional)
          <p class="text-sm mb-4"><strong>Perfil Profesional:</strong> {{ $carrera->perfil_profesional }}</p>
          @endif

          {{-- Convenios --}}
          <div class="mt-6">
            <h3 class="text-lg font-semibold text-[#131567] mb-2">📄 Convenios</h3>
            @php $pdfs = $carrera->convenio ? json_decode($carrera->convenio, true) : []; @endphp
            @if(!empty($pdfs))
            <ul class="list-disc list-inside text-sm space-y-1">
              @foreach($pdfs as $path)
              <li>
                <a href="{{ Storage::url($path) }}" target="_blank" class="text-blue-600 hover:underline">
                  📘 Ver PDF
                </a>
              </li>
              @endforeach
            </ul>
            @else
            <p class="text-sm text-gray-600">No hay convenios disponibles.</p>
            @endif
          </div>

          {{-- Requisitos --}}
          <div class="mt-6">
            <h3 class="text-lg font-semibold text-[#131567] mb-2">🧾 Requisitos</h3>
            @if($carrera->requisitos->count() > 0)
            <ul class="list-disc list-inside text-sm space-y-1">
              @foreach($carrera->requisitos as $requisito)
              <li>{{ $requisito->descripcion }}</li>
              @endforeach
            </ul>
            @else
            <p class="text-sm text-gray-600">No se han asignado requisitos para esta carrera.</p>
            @endif
          </div>
        </div>

        {{-- Botón volver --}}
        <div class="mt-8 text-right">
          <a href="{{ route('carreras.index') }}"
            class="inline-block px-6 py-2 bg-[#131567] text-white rounded-lg hover:bg-[#0b1050] transition">
            ⬅️ Volver
          </a>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>