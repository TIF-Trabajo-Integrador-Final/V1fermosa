<div class="max-w-7xl mx-auto">

    <!-- Título principal -->
    <h1 class="text-3xl font-bold mb-6 text-white text-center">Carreras</h1>

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
            + Crear Carrera
        </button>
    </div>

    <!-- TABLA -->
    <div class="mt-6 bg-white shadow-xl rounded-xl overflow-x-auto border border-gray-200">

        <!-- CABECERA SOLO ESCRITORIO -->
        <div class="hidden md:grid bg-blue-900 text-white text-sm font-semibold py-3 px-4 gap-2 w-full"
            style="grid-template-columns:80px 1.2fr 1fr 1fr 0.8fr 1fr 1.8fr 1fr 0.9fr;">

            <div class="flex items-center justify-center">Imagen</div>
            <div class="flex items-center justify-center">Nombre</div>
            <div class="flex items-center justify-center">Nivel</div>
            <div class="flex items-center justify-center">Modalidad</div>
            <div class="flex items-center justify-center">Duración</div>
            <div class="flex items-center justify-center">Perfil</div>
            <div class="flex items-center justify-center">Descripción</div>
            <div class="flex items-center justify-center">Requisitos</div>
            <div class="flex items-center justify-center">Acciones</div>
        </div>

        <!-- FILAS ESCRITORIO -->
        <div class="divide-y divide-gray-200 hidden md:block">
            @forelse ($carreras as $carrera)

                @php
                    $img = $carrera->imagen 
                            ? asset($carrera->imagen)
                            : asset('images/placeholder-carrera.jpg');
                @endphp

                <div class="grid p-4 gap-2 items-start text-gray-700 w-full"
                    style="grid-template-columns:80px 1.2fr 1fr 1fr 0.8fr 1fr 1.8fr 1fr 0.9fr;">

                    <!-- IMAGEN -->
                    <div class="flex justify-center items-center">
                        <img src="{{ $img }}"
                             class="h-14 w-14 rounded object-cover shadow"
                             alt="{{ $carrera->nombre }}">
                    </div>

                    <!-- NOMBRE -->
                    <div class="font-semibold text-sm min-w-0 truncate">
                        {{ Str::limit($carrera->nombre, 80) }}
                    </div>

                    <!-- NIVEL -->
                    <div class="text-sm min-w-0">{{ $carrera->nivel?->nombre }}</div>

                    <!-- MODALIDAD -->
                    <div class="text-sm min-w-0">{{ $carrera->modalidad }}</div>

                    <!-- DURACIÓN -->
                    <div class="text-sm min-w-0">{{ $carrera->duracion_meses }} meses</div>

                    <!-- PERFIL PROFESIONAL -->
                    <div class="text-sm min-w-0 break-words">
                        {{ Str::limit($carrera->perfil_profesional, 120) }}
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="text-sm min-w-0 break-words">
                        {{ Str::limit($carrera->descripcion, 140) }}
                    </div>

                    <!-- REQUISITOS -->
                    <div class="text-xs">
                        @forelse ($carrera->requisitos as $req)
                            <div class="mb-1">
                                <span class="inline-block max-w-[160px] bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold break-words">
                                    {{ Str::limit($req->descripcion, 30) }}
                                </span>
                            </div>
                        @empty
                            <span class="text-gray-200 italic text-xs">Sin requisitos</span>
                        @endforelse
                    </div>

                    <!-- ACCIONES -->
                    <div class="flex gap-1 justify-center">
                        <button wire:click="mostrarFormulario({{ $carrera->id }})"
                            class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs font-medium whitespace-nowrap">
                            Editar
                        </button>

                        <button x-data
                            @click="if(confirm('¿Deseas eliminar esta carrera?')) { $wire.eliminar({{ $carrera->id }}) }"
                            class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs font-medium whitespace-nowrap">
                            Eliminar
                        </button>
                    </div>

                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    No hay carreras registradas.
                </div>
            @endforelse
        </div>

        <!-- ============================================= -->
        <!--         VISTA RESPONSIVA PARA CELULAR         -->
        <!-- ============================================= -->
        <div class="md:hidden divide-y divide-gray-300">
            @foreach ($carreras as $carrera)

                @php
                    $img = $carrera->imagen 
                            ? asset($carrera->imagen)
                            : asset('images/placeholder-carrera.jpg');
                @endphp

                <div class="p-4">

                    <h3 class="text-lg font-bold text-blue-900 mb-2">{{ $carrera->nombre }}</h3>

                    <img src="{{ $img }}"
                         class="w-full h-40 object-cover rounded-lg shadow mb-3">

                    <p class="text-sm"><strong>Nivel:</strong> {{ $carrera->nivel?->nombre }}</p>
                    <p class="text-sm"><strong>Modalidad:</strong> {{ $carrera->modalidad }}</p>
                    <p class="text-sm"><strong>Duración:</strong> {{ $carrera->duracion_meses }} meses</p>

                    <p class="text-sm mt-2"><strong>Perfil Profesional:</strong><br>
                        {{ Str::limit($carrera->perfil_profesional, 150) }}
                    </p>

                    <p class="text-sm mt-2"><strong>Descripción:</strong><br>
                        {{ Str::limit($carrera->descripcion, 180) }}
                    </p>

                    <div class="mt-2">
                        <strong class="text-sm">Requisitos:</strong>
                        <div class="flex flex-wrap gap-2 mt-1">
                            @forelse ($carrera->requisitos as $req)
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs shadow">
                                    {{ $req->descripcion }}
                                </span>
                            @empty
                                <span class="text-xs text-gray-400 italic">Sin requisitos</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="flex gap-3 mt-4">
                        <button wire:click="mostrarFormulario({{ $carrera->id }})"
                            class="px-4 py-2 bg-blue-600 text-white rounded text-sm shadow">
                            Editar
                        </button>

                        <button x-data
                            @click="if(confirm('¿Deseas eliminar esta carrera?')) { $wire.eliminar({{ $carrera->id }}) }"
                            class="px-4 py-2 bg-red-600 text-white rounded text-sm shadow">
                            Eliminar
                        </button>
                    </div>

                </div>
            @endforeach
        </div>

    </div>



    <!-- ======================= -->
    <!--     MODAL DEL FORM      -->
    <!-- ======================= -->

    @if ($isFormVisible)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            
            <div class="bg-white w-full max-w-4xl rounded-xl shadow-2xl relative text-gray-900
                        flex flex-col max-h-[90vh] overflow-y-auto overflow-x-hidden">

                <!-- BOTÓN CERRAR -->
                <button wire:click="resetFormulario"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl z-20">
                    ✕
                </button>

                <!-- CABECERA -->
                <div class="p-6 border-b">
                    <h2 class="text-2xl font-bold">
                        {{ $carrera_id ? 'Editar Carrera' : 'Nueva Carrera' }}
                    </h2>
                </div>

                <!-- CONTENIDO DEL FORMULARIO -->
                <div class="p-6 space-y-6">

                   <form wire:submit.prevent="guardar" enctype="multipart/form-data" class="space-y-6">


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Nombre --}}
                            <div>
                                <label class="font-semibold text-sm">Nombre</label>
                                <input type="text" wire:model="nombre"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                                @error('nombre') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            {{-- Nivel --}}
                            <div>
                                <label class="font-semibold text-sm">Nivel</label>
                                <select wire:model="nivel_id"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                                    <option value="">Seleccionar nivel...</option>
                                    @foreach ($niveles as $nivel)
                                        <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('nivel_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            {{-- Modalidad --}}
                            <div>
                                <label class="font-semibold text-sm">Modalidad</label>
                                <input type="text" wire:model="modalidad"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                                @error('modalidad') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            {{-- Duración --}}
                            <div>
                                <label class="font-semibold text-sm">Duración (meses)</label>
                                <input type="number" wire:model="duracion_meses"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2">
                                @error('duracion_meses') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            {{-- Descripción --}}
                            <div class="md:col-span-2">
                                <label class="font-semibold text-sm">Descripción</label>
                                <textarea wire:model="descripcion"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2"></textarea>
                                @error('descripcion') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                            </div>

                            {{-- Imagen --}}
                            <div class="md:col-span-2">
                                <label class="font-semibold text-sm block mb-2">Imagen (máximo 5 MB)</label>

                                <div class="flex gap-6 items-center flex-wrap">

                                    {{-- Previsualización --}}
                                    <div class="flex flex-col items-center">

                                        @if ($imagen)
                                            {{-- Preview Livewire de nueva imagen --}}
                                            <img src="{{ $imagen->temporaryUrl() }}"
                                                 class="h-32 w-32 rounded object-cover border-2 border-green-600">
                                            <p class="text-xs text-green-600 mt-2">Previsualización</p>

                                        @elseif ($oldImagen)
                                            {{-- Imagen actual (corregida a asset) --}}
                                            <img src="{{ asset($oldImagen) }}"
                                                 class="h-32 w-32 rounded object-cover border-2 border-blue-600">
                                            <p class="text-xs text-blue-600 mt-2">Imagen actual</p>

                                        @else
                                            <div class="h-32 w-32 rounded bg-gray-200 flex items-center justify-center border-2 border-dashed border-gray-400">
                                                <span class="text-xs text-gray-500">Sin imagen</span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Input --}}
                                    <div class="flex-1">
                                        <label class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded border border-blue-300 cursor-pointer font-medium hover:bg-blue-200">
                                            <input type="file" class="hidden" wire:model="imagen">
                                            Seleccionar imagen
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">
                                            PNG, JPG, WEBP – Máximo 5MB
                                        </p>
                                        @error('imagen') 
                                            <p class="text-red-600 text-sm">{{ $message }}</p> 
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{-- Perfil profesional --}}
                            <div class="md:col-span-2">
                                <label class="font-semibold text-sm">Perfil Profesional</label>
                                <textarea wire:model="perfilProfesional"
                                    class="w-full bg-gray-100 border-gray-300 rounded px-3 py-2"></textarea>
                                @error('perfilProfesional') 
                                    <p class="text-red-600 text-sm">{{ $message }}</p> 
                                @enderror
                            </div>

                            {{-- Requisitos --}}
                            <div class="md:col-span-2">
                                <label class="font-semibold text-sm">Requisitos</label>

                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-1">
                                    @foreach ($requisitos as $req)
                                        <label class="flex items-center gap-2 text-sm">
                                            <input type="checkbox" wire:model="requisitosSeleccionados"
                                                value="{{ $req->id }}">
                                            {{ $req->descripcion }}
                                        </label>
                                    @endforeach
                                </div>

                                @error('requisitosSeleccionados')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- BOTONES --}}
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
