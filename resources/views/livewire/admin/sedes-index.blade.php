<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Sedes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session()->has('message'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('message') }}</div>
                @endif
                
                <x-primary-button wire:click="crear" class="mb-4">+ Crear Nueva Sede</x-primary-button>

                @if ($mostrarFormulario)
                    <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                        <h3 class="text-lg font-medium mb-4">{{ $sedeId ? 'Editar Sede' : 'Crear Nueva Sede' }}</h3>
                        <form wire:submit.prevent="guardar">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><x-input-label for="nombre" :value="__('Nombre de la Sede')" /><x-text-input wire:model.live="nombre" id="nombre" class="mt-1 w-full" type="text" required /></div>
                                <div><x-input-label for="ubicacion" :value="__('Ubicación (Ciudad/País)')" /><x-text-input wire:model.live="ubicacion" id="ubicacion" class="mt-1 w-full" type="text" required /></div>
                            </div>
                            <div class="mt-4"><x-input-label for="direccion" :value="__('Dirección Completa')" /><x-text-input wire:model.live="direccion" id="direccion" class="mt-1 w-full" type="text" required /></div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div><x-input-label for="latitud" :value="__('Latitud (Opcional)')" /><x-text-input wire:model.live="latitud" id="latitud" class="mt-1 w-full" type="number" step="0.00000001" /></div>
                                <div><x-input-label for="longitud" :value="__('Longitud (Opcional)')" /><x-text-input wire:model.live="longitud" id="longitud" class="mt-1 w-full" type="number" step="0.00000001" /></div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-secondary-button wire:click="$set('mostrarFormulario', false)" class="mr-2">Cancelar</x-secondary-button>
                                <x-primary-button type="submit">{{ $sedeId ? 'Actualizar Sede' : 'Guardar Sede' }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                @endif
                
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">Nombre</th>
                                <th class="px-6 py-3 bg-gray-50 text-left">Ubicación</th>
                                <th class="px-6 py-3 bg-gray-50 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($sedes as $sede)
                                <tr>
                                    <td class="px-6 py-4">{{ $sede->nombre }}</td>
                                    <td class="px-6 py-4">{{ $sede->ubicacion }} ({{ $sede->direccion }})</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button wire:click="editar({{ $sede->id }})" class="text-indigo-600 hover:text-indigo-900 mx-1">Editar</button>
                                        <button wire:click="eliminar({{ $sede->id }})" wire:confirm="¿Seguro?" class="text-red-600 hover:text-red-900 mx-1">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay sedes cargadas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>