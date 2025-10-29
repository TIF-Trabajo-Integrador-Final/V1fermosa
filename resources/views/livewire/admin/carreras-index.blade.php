<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Carreras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session()->has('message'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif
                
                <x-primary-button wire:click="crear" class="mb-4">
                    + Crear Nueva Carrera
                </x-primary-button>

                @if ($mostrarFormulario)
                    <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                        <h3 class="text-lg font-medium mb-4">{{ $carreraId ? 'Editar Carrera' : 'Crear Nueva Carrera' }}</h3>
                        
                        <form wire:submit.prevent="guardar">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="nombre" :value="__('Nombre de la Carrera')" />
                                    <x-text-input wire:model.live="nombre" id="nombre" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="nivel" :value="__('Nivel (Terciario, Posgrado)')" />
                                    <x-text-input wire:model.live="nivel" id="nivel" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('nivel')" class="mt-2" />
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea wire:model.live="descripcion" id="descripcion" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <x-input-label for="matricula" :value="__('Arancel Matrícula ($)')" />
                                    <x-text-input wire:model.live="arancel_matricula" id="matricula" class="block mt-1 w-full" type="number" step="0.01" required />
                                    <x-input-error :messages="$errors->get('arancel_matricula')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="mensual" :value="__('Arancel Mensual ($)')" />
                                    <x-text-input wire:model.live="arancel_mensual" id="mensual" class="block mt-1 w-full" type="number" step="0.01" required />
                                    <x-input-error :messages="$errors->get('arancel_mensual')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-secondary-button wire:click="$set('mostrarFormulario', false)" class="mr-2">Cancelar</x-secondary-button>
                                <x-primary-button type="submit">
                                    {{ $carreraId ? 'Actualizar Carrera' : 'Guardar Carrera' }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                @endif
                
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Arancel</th>
                                <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($carreras as $carrera)
                                <tr>
                                    <td class="px-6 py-4">{{ $carrera->nombre }}</td>
                                    <td class="px-6 py-4">{{ $carrera->nivel }}</td>
                                    <td class="px-6 py-4">M: ${{ number_format($carrera->arancel_matricula) }} / S: ${{ number_format($carrera->arancel_mensual) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button wire:click="editar({{ $carrera->id }})" class="text-indigo-600 hover:text-indigo-900 mx-1">Editar</button>
                                        <button wire:click="eliminar({{ $carrera->id }})" wire:confirm="¿Estás seguro de eliminar esta carrera?" class="text-red-600 hover:text-red-900 mx-1">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay carreras cargadas en el sistema.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>