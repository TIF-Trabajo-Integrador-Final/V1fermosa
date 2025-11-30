<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-white text-center">Requisitos</h1>

    @if (session('ok'))
    <div class="bg-green-200 text-green-900 p-3 mb-4 rounded shadow">
        {{ session('ok') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-200 text-red-900 p-3 mb-4 rounded shadow">
        {{ session('error') }}
    </div>
    @endif

    <div class="mb-4">
        <button wire:click="mostrarFormulario()"
            class="bg-white text-blue-800 hover:bg-gray-100 px-4 py-2 rounded shadow border border-white/20">
            + Crear Requisito
        </button>
    </div>

    <div class="mt-6 bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">

        <div class="hidden md:grid grid-cols-2 bg-blue-800 text-white text-sm font-semibold py-3 px-4">
            <div class="text-center">Descripcion</div>
            <div class="text-center">Acciones</div>
        </div>

        <div class="divide-y divide-gray-200">

            @forelse ($requisitos as $req)
            <div class="grid md:grid-cols-2 p-4 gap-4 items-center text-gray-700">

                <div class="text-sm text-gray-600">{{ $req->descripcion }}</div>

                <div class="flex justify-end gap-2">
                    <button wire:click="mostrarFormulario({{ $req->id }})"
                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                        Editar
                    </button>

                    <button wire:click="eliminar({{ $req->id }})"
                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                        Eliminar
                    </button>
                </div>

            </div>
            @empty
            <div class="p-4 text-center text-gray-500">
                No hay requisitos registrados.
            </div>
            @endforelse

        </div>
    </div>

    <!-- MODAL -->
    @if ($isFormVisible)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 relative">

            <button wire:click="resetFormulario"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4">
                {{ $requisito_id ? 'Editar Requisito' : 'Nuevo Requisito' }}
            </h2>

            <form wire:submit.prevent="guardar" class="space-y-4">

                <div>
                    <label class="font-semibold text-sm text-gray-800">Descripción</label>
                    <textarea wire:model="descripcion"
                        class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2 text-gray-900 placeholder-gray-500"></textarea>
                    @error('descripcion')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex justify-end gap-4 mt-4">
                    <button type="button" wire:click="resetFormulario"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Cancelar
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800">
                        Guardar
                    </button>
                </div>

            </form>

        </div>

    </div>
    @endif

</div>