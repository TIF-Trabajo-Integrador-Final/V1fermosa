<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100 py-10 px-6">
    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        {{-- ENCABEZADO --}}
        <h1 class="text-3xl font-bold text-[#0b1b3f] mb-6 flex items-center gap-2">
            🎓 Gestión de Carreras
        </h1>

        {{-- MENSAJES --}}
        @if (session()->has('success'))
        <div class="p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg">
            ✅ {{ session('success') }}
        </div>
        @elseif (session()->has('error'))
        <div class="p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg">
            ⚠️ {{ session('error') }}
        </div>
        @endif

        {{-- BUSCAR Y CREAR --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div class="flex items-center gap-3 w-full md:w-1/2 relative">
                <input type="text" wire:model.live="search" placeholder="Buscar por nombre o nivel..."
                    class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0b1b3f]">
                <svg class="absolute right-3 top-2.5 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
                </svg>
            </div>
            <div class="flex items-center justify-end gap-3">
                <button wire:click="crear"
                    class="bg-[#0b1b3f] hover:bg-[#112f73] text-white px-4 py-2 rounded-lg shadow-md transition-all duration-300">
                    ➕ Nueva Carrera
                </button>
            </div>
        </div>

        {{-- FORMULARIO --}}
        @if ($isFormVisible)
        <div class="mb-8 p-6 border border-[#0b1b3f]/10 rounded-xl bg-blue-50 shadow-inner">
            <h3 class="text-2xl font-bold mb-4 text-[#0b1b3f]">
                {{ $carreraId ? '✏️ Editar Carrera: ' . $nombre : '🆕 Crear Nueva Carrera' }}
            </h3>

            <form wire:submit.prevent="guardar" class="space-y-6">

                {{-- NOMBRE, NIVEL Y DURACION --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <x-input-label for="nombre" :value="__('Nombre de la Carrera')" />
                        <x-text-input wire:model.live="nombre" id="nombre"
                            class="block mt-1 w-full border-[#0b1b3f]/20 focus:border-[#0b1b3f]" type="text" required />
                        @error('nombre') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <x-input-label for="nivel_id" :value="__('Nivel Académico')" />
                        <select wire:model="nivel_id" id="nivel_id"
                            class="block mt-1 w-full border-[#0b1b3f]/20 focus:border-[#0b1b3f] rounded-lg">
                            <option value="">Seleccione un nivel...</option>
                            @foreach ($niveles as $nivel)
                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                        @error('nivel_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <x-input-label for="duracion_meses" :value="__('Duración (meses)')" />
                        <x-text-input wire:model.live="duracion_meses" id="duracion_meses"
                            class="block mt-1 w-full border-[#0b1b3f]/20 focus:border-[#0b1b3f]" type="number" min="1" required />
                        @error('duracion_meses') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- REQUISITOS --}}
                <div>
                    <x-input-label for="requisitosSeleccionados" :value="__('Requisitos de Ingreso')" />
                    <select multiple wire:model.defer="requisitosSeleccionados" id="requisitosSeleccionados"
                        class="w-full mt-1 border-[#0b1b3f]/20 focus:border-[#0b1b3f] rounded-lg min-h-[8rem]">
                        @foreach ($todosRequisitos as $req)
                        <option value="{{ (string) $req->id }}">{{ $req->descripcion ?? $req->titulo }}</option>
                        @endforeach
                    </select>
                    @error('requisitosSeleccionados') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- CONVENIOS (PDFs) --}}
                <div>
                    <x-input-label for="convenios" :value="__('Convenios (PDFs)')" />
                    <input wire:model="convenios" id="convenios" type="file" accept="application/pdf" multiple
                        class="mt-1 block w-full text-sm border border-[#0b1b3f]/30 rounded-lg cursor-pointer bg-white focus:ring-[#0b1b3f] focus:border-[#0b1b3f]" />
                    @error('convenios.*') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    @if (!empty($oldConvenios))
                    <div class="mt-3 space-y-1">
                        <p class="text-sm text-gray-700 font-semibold">Archivos existentes:</p>
                        @foreach ($oldConvenios as $index => $pdf)
                        <div class="flex items-center justify-between text-sm bg-gray-50 border rounded-md p-2">
                            <a href="{{ Storage::url($pdf) }}" target="_blank"
                                class="text-blue-600 hover:underline">
                                📄 {{ basename($pdf) }}
                            </a>
                            <button type="button" wire:click="eliminarPdf({{ $index }})"
                                class="text-red-600 hover:text-red-800 font-semibold text-xs">
                                Eliminar
                            </button>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- IMAGEN --}}
                <div>
                    <x-input-label for="imagen" :value="__('Imagen de la carrera')" />
                    <input wire:model="imagen" id="imagen"
                        class="mt-1 block w-full text-sm border border-[#0b1b3f]/30 rounded-lg cursor-pointer bg-white focus:ring-[#0b1b3f] focus:border-[#0b1b3f]"
                        type="file" accept="image/*">
                    @error('imagen') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    @if ($imagen)
                    <div class="mt-4">
                        <p class="text-sm text-gray-700 mb-1">Vista previa:</p>
                        <img src="{{ $imagen->temporaryUrl() }}"
                            class="w-48 h-32 object-cover rounded-lg border border-gray-300 shadow">
                    </div>
                    @elseif ($oldImagen)
                    <div class="mt-4">
                        <p class="text-sm text-gray-700 mb-1">Imagen actual:</p>
                        <img src="{{ Storage::url($oldImagen) }}"
                            class="w-48 h-32 object-cover rounded-lg border border-gray-300 shadow">
                    </div>
                    @endif
                </div>

                {{-- DESCRIPCIÓN Y PERFIL --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="descripcion" :value="__('Descripción de la Carrera')" />
                        <textarea wire:model.live="descripcion" id="descripcion" rows="5"
                            class="block mt-1 w-full border-[#0b1b3f]/20 focus:border-[#0b1b3f] rounded-lg"></textarea>
                        @error('descripcion') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <x-input-label for="perfilProfesional" :value="__('Perfil Profesional')" />
                        <textarea wire:model.live="perfilProfesional" id="perfilProfesional" rows="5"
                            class="block mt-1 w-full border-[#0b1b3f]/20 focus:border-[#0b1b3f] rounded-lg"></textarea>
                    </div>
                </div>

                {{-- BOTONES --}}
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" wire:click="cerrarFormulario"
                        class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow transition-all duration-300">
                        ❌ Cancelar
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-[#0b1b3f] hover:bg-[#132b6b] text-white rounded-lg shadow transition-all duration-300">
                        💾 Guardar
                    </button>
                </div>
            </form>
        </div>
        @endif

        {{-- LISTADO DE CARRERAS --}}
        <div class="overflow-x-auto mt-6 rounded-xl shadow-md">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-[#0b1b3f] text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nivel</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Duración</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase">Imagen</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase">Convenios</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($carreras as $carrera)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 font-semibold text-[#0b1b3f]">{{ $carrera->nombre }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $carrera->nivel->nombre ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $carrera->duracion_meses ?? '—' }} meses</td>
                        <td class="px-6 py-4 text-center">
                            @if ($carrera->imagen)
                            <img src="{{ Storage::url($carrera->imagen) }}" class="w-20 h-14 object-cover mx-auto rounded border">
                            @else
                            <span class="text-gray-400 text-sm">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @php $pdfs = $carrera->convenio ? json_decode($carrera->convenio, true) : []; @endphp
                            @if (!empty($pdfs))
                            <div class="flex flex-col items-center gap-1">
                                @foreach ($pdfs as $path)
                                <a href="{{ Storage::url($path) }}" target="_blank"
                                    class="text-blue-600 hover:underline text-sm">📄 Ver PDF</a>
                                @endforeach
                            </div>
                            @else
                            <span class="text-gray-400 text-sm">Sin convenio</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button wire:click="editar({{ $carrera->id }})"
                                    class="px-3 py-1 bg-[#0b1b3f] text-white text-xs rounded-md hover:bg-[#132b6b] font-semibold">
                                    Editar
                                </button>
                                <button wire:click="eliminar({{ $carrera->id }})"
                                    wire:confirm="¿Eliminar la carrera '{{ $carrera->nombre }}'?"
                                    class="px-3 py-1 bg-red-500 text-white text-xs rounded-md hover:bg-red-600 font-semibold">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                            No se encontraron carreras registradas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>