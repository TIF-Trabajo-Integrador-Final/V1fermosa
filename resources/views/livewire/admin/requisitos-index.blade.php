<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Requisitos de Inscripción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session()->has('message'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('message') }}</div>
                @endif
                
                <x-primary-button wire:click="crear" class="mb-4">+ Crear Nuevo Requisito</x-primary-button>

                @if ($mostrarFormulario)
                    <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                        <h3 class="text-lg font-medium mb-4">{{ $requisitoId ? 'Editar Requisito' : 'Crear Nuevo Requisito' }}</h3>
                        <form wire:submit.prevent="guardar">
                            <div><x-input-label for="titulo" :value="__('Título del Requisito')" /><x-text-input wire:model.live="titulo" id="titulo" class="mt-1 w-full" type="text" required /></div>
                            
                            <div class="mt-4">
                                <x-input-label for="detalle" :value="__('Detalle/Descripción del Requisito')" />
                                <textarea wire:model.live="detalle" id="detalle" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-secondary-button wire:click="$set('mostrarFormulario', false)" class="mr-2">Cancelar</x-secondary-button>
                                <x-primary-button type="submit">{{ $requisitoId ? 'Actualizar Requisito' : 'Guardar Requisito' }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                @endif
                
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">Título</th>
                                <th class="px-6 py-3 bg-gray-50 text-left">Detalle</th>
                                <th class="px-6 py-3 bg-gray-50 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($requisitos as $req)
                                <tr>
                                    <td class="px-6 py-4">{{ $req->titulo }}</td>
                                    <td class="px-6 py-4">{{ Str::limit($req->detalle, 70) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button wire:click="editar({{ $req->id }})" class="text-indigo-600 hover:text-indigo-900 mx-1">Editar</button>
                                        <button wire:click="eliminar({{ $req->id }})" wire:confirm="¿Seguro?" class="text-red-600 hover:text-red-900 mx-1">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay requisitos cargados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>