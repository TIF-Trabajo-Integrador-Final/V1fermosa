<div class="max-w-7xl mx-auto p-6 relative space-y-10 z-10 font-montserrat">

    <!-- Título principal -->
    <h1 class="text-3xl font-bold mb-6 text-white text-center">Convenios Institucionales</h1>

    <!-- MENSAJES -->
    @if (session('ok'))
        <div class="p-3 mb-4 bg-green-200 text-green-900 rounded shadow">
            {{ session('ok') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-3 mb-4 bg-red-200 text-red-900 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <!-- BOTÓN CREAR -->
    <div class="mb-4">
        <button wire:click="mostrarFormulario()"
            class="bg-white text-blue-800 hover:bg-gray-100 px-4 py-2 rounded shadow border border-white/20">
            + Crear Convenio
        </button>
    </div>

    <!-- ============================= -->
    <!--       TABLA ESCRITORIO        -->
    <!-- ============================= -->
    <div class="mt-6 bg-white shadow-xl rounded-xl overflow-x-auto border border-gray-200">

        <!-- CABECERA SOLO ESCRITORIO -->
        <div class="hidden md:grid bg-blue-900 text-white text-sm font-semibold py-3 px-4 gap-2 w-full"
            style="grid-template-columns:1.5fr 1fr 1.5fr 1fr;">
            <div class="flex items-center justify-center">Universidad</div>
            <div class="flex items-center justify-center">Logo</div>
            <div class="flex items-center justify-center">Mapa</div>
            <div class="flex items-center justify-center">Acciones</div>
        </div>

        <!-- FILAS ESCRITORIO -->
        <div class="hidden md:block divide-y divide-gray-200">
            @forelse ($convenios as $convenio)
                <div class="grid p-4 gap-2 items-start text-gray-700 w-full"
                    style="grid-template-columns:1.5fr 1fr 1.5fr 1fr;">

                    <!-- UNIVERSIDAD -->
                    <div class="font-semibold text-sm">{{ Str::limit($convenio->universidad, 80) }}</div>

                    <!-- LOGO -->
                    <div class="flex justify-center items-center">
                        @if ($convenio->logo)
                            <img src="{{ storage_url($convenio->logo) }}"
                                class="h-14 w-14 rounded object-cover shadow"
                                alt="{{ $convenio->universidad }}"
                                onerror="this.style.display='none'" />
                        @else
                            <span class="text-gray-400 italic text-xs">Sin logo</span>
                        @endif
                    </div>

                    <!-- MAPA -->
                    <div class="text-xs break-all">
                        <a href="{{ $convenio->url_mapa }}" target="_blank" class="text-blue-600 underline">
                            {{ Str::limit($convenio->url_mapa, 30) }}
                        </a>
                    </div>

                    <!-- ACCIONES -->
                    <div class="flex gap-1 justify-center">
                        <button wire:click="mostrarFormulario({{ $convenio->id }})"
                            class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                            Editar
                        </button>

                        <button wire:click="eliminar({{ $convenio->id }})"
                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs"
                            onclick="return confirm('¿Estás seguro?')">
                            Eliminar
                        </button>
                    </div>

                </div>
            @empty
                <div class="p-4 text-center text-gray-500">No hay convenios registrados.</div>
            @endforelse
        </div>

        <!-- ============================= -->
        <!--        VISTA RESPONSIVA        -->
        <!-- ============================= -->
        <div class="md:hidden divide-y divide-gray-300">

            @foreach ($convenios as $convenio)
                <div class="p-4">

                    <!-- Título -->
                    <h3 class="text-lg font-bold text-blue-900 mb-2">
                        {{ $convenio->universidad }}
                    </h3>

                    <!-- Logo -->
                    @if ($convenio->logo)
                        <img src="{{ storage_url($convenio->logo) }}"
                            class="w-full max-w-[200px] mx-auto h-32 object-cover rounded shadow mb-3">
                    @endif

                    <!-- Mapa -->
                    <p class="text-sm mb-2"><strong>Mapa:</strong></p>
                    <a href="{{ $convenio->url_mapa }}" target="_blank"
                        class="text-blue-700 underline text-sm break-all block">
                        {{ $convenio->url_mapa }}
                    </a>

                    <!-- Acciones -->
                    <div class="flex gap-3 mt-4">
                        <button wire:click="mostrarFormulario({{ $convenio->id }})"
                            class="px-4 py-2 bg-blue-600 text-white rounded text-sm shadow">
                            Editar
                        </button>

                        <button wire:click="eliminar({{ $convenio->id }})"
                            onclick="return confirm('¿Estás seguro?')"
                            class="px-4 py-2 bg-red-600 text-white rounded text-sm shadow">
                            Eliminar
                        </button>
                    </div>

                </div>
            @endforeach

        </div>

    </div>

    <!-- ============================= -->
    <!--   FORMULARIO MODAL (INTACTO) -->
    <!-- ============================= -->
    @if ($isFormVisible)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

            <div class="bg-white w-full max-w-4xl rounded-xl shadow-2xl relative text-gray-900 flex flex-col max-h-[90vh] overflow-y-auto">

                <!-- BOTÓN CERRAR -->
                <button wire:click="resetFormulario"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">✕</button>

                <div class="p-6 border-b">
                    <h2 class="text-2xl font-bold">
                        {{ $convenio_id ? 'Editar Convenio' : 'Nuevo Convenio' }}
                    </h2>
                </div>

                <div class="p-6 space-y-6">

                    <form wire:submit.prevent="guardar" class="space-y-6">

                        <!-- Universidad -->
                        <div>
                            <label class="font-semibold text-sm">Universidad</label>
                            <input type="text" wire:model="universidad"
                                class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                            @error('universidad') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <!-- Logo -->
                        <div class="md:col-span-2">
                            <label class="font-semibold text-sm block mb-2">Logo (máx. 5mb)</label>

                            <div class="flex gap-6 items-center flex-wrap">

                                <div class="flex flex-col items-center">
                                    @if ($imagen)
                                        <img src="{{ $imagen->temporaryUrl() }}"
                                            class="h-32 w-32 rounded object-cover border-2 border-green-600">
                                        <p class="text-xs text-green-600 mt-2">Previsualización</p>
                                    @elseif ($oldImagen)
                                        <img src="{{ storage_url($oldImagen) }}"
                                            class="h-32 w-32 rounded object-cover border-2 border-blue-600">
                                        <p class="text-xs text-blue-600 mt-2">Imagen actual</p>
                                    @else
                                        <div class="h-32 w-32 rounded bg-gray-200 border-2 border-dashed border-gray-400 flex items-center justify-center">
                                            <span class="text-xs text-gray-500">Sin imagen</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <label class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded border border-blue-300 cursor-pointer">
                                        <input type="file" class="hidden" wire:model="imagen">
                                        Seleccionar imagen
                                    </label>
                                    @error('imagen') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                                </div>

                            </div>
                        </div>

                        <!-- URL del mapa -->
                        <div>
                            <label class="font-semibold text-sm">URL del Mapa</label>
                            <input type="text" wire:model="url_mapa"
                                class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                            @error('url_mapa') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end gap-4 border-t pt-4">
                            <button type="button" wire:click="resetFormulario"
                                class="px-5 py-2 bg-gray-300 hover:bg-gray-400 rounded">
                                Cancelar
                            </button>

                            <button type="submit"
                                class="px-5 py-2 bg-green-700 hover:bg-green-800 text-white rounded">
                                Guardar
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    @endif

</div>
