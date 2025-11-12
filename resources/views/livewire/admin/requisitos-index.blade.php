<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100 py-10 px-6">
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        {{-- TÍTULO --}}
        <h1 class="text-3xl font-bold text-[#0b1b3f] mb-6 flex items-center gap-2">
            🧾 Gestión de Requisitos de Inscripción
        </h1>

        {{-- MENSAJES DE SESIÓN --}}
        @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-800 rounded-lg text-sm">
            {{ session('error') }}
        </div>
        @endif

        {{-- BOTÓN CREAR --}}
        <div class="flex justify-end mb-4">
            <button wire:click="crear"
                class="bg-[#0b1b3f] hover:bg-[#132b6b] text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-all duration-300">
                ➕ Nuevo Requisito
            </button>
        </div>

        {{-- FORMULARIO DE CREACIÓN / EDICIÓN --}}
        @if ($mostrarFormulario)
        <div class="border border-[#0b1b3f]/20 bg-blue-50 p-6 rounded-xl shadow-inner mb-8 animate-fadeIn">
            <h2 class="text-2xl font-semibold text-[#0b1b3f] mb-4">
                {{ $requisitoId ? '✏️ Editar Requisito' : '🆕 Crear Requisito' }}
            </h2>

            <form wire:submit.prevent="guardar" class="space-y-6">
                <div>
                    <x-input-label for="titulo" :value="__('Título del requisito')" />
                    <x-text-input wire:model.defer="titulo" id="titulo" type="text"
                        class="block mt-1 w-full border-[#0b1b3f]/30 focus:border-[#0b1b3f]" />
                    @error('titulo')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-input-label for="detalle" :value="__('Detalle / Descripción')" />
                    <textarea wire:model.defer="detalle" id="detalle" rows="4"
                        class="block mt-1 w-full border-[#0b1b3f]/30 rounded-lg focus:border-[#0b1b3f]"></textarea>
                    @error('detalle')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4">
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

        {{-- TABLA DE REQUISITOS --}}
        <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-[#0b1b3f] text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Detalle</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($requisitos as $req)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 font-semibold text-[#0b1b3f]">{{ $req->titulo }}</td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ Str::limit($req->descripcion, 100, '...') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button wire:click="editar({{ $req->id }})"
                                    class="px-3 py-1 bg-[#0b1b3f] text-white text-xs rounded-md hover:bg-[#132b6b] font-semibold">
                                    ✏️ Editar
                                </button>
                                <button wire:click="eliminar({{ $req->id }})"
                                    onclick="confirm('¿Seguro que deseas eliminar este requisito?') || event.stopImmediatePropagation()"
                                    class="px-3 py-1 bg-red-500 text-white text-xs rounded-md hover:bg-red-600 font-semibold">
                                    🗑️ Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                            No se encontraron requisitos registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- Escucha el evento emitido desde el componente para refrescar --}}
<script>
    Livewire.on('requisitosActualizados', () => {
        Livewire.dispatch('refresh');
    });
</script>