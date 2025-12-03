<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-3xl font-semibold mb-6 text-center">Reseñas</h1>

    <!-- Mensaje de éxito cuando una reseña es eliminada -->
    @if (session('ok'))
        <div class="bg-green-200 text-green-900 p-3 mb-4 rounded shadow">
            {{ session('ok') }}
        </div>
    @endif

    <!-- Tabla de reseñas -->
    <div class="overflow-x-auto max-w-full">
    <table class="min-w-full table-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-blue-700 text-white">
            <tr>
                <th class="py-3 px-6 text-center">Nombre</th>
                <th class="py-3 px-6 text-center">Email</th>
                <th class="py-3 px-6 text-center">Mensaje</th>
                <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resenas as $resena)
                <tr class="border-b bg-gray-100">
                    <td class="py-4 px-6 text-black text-center">{{ $resena->nombre }}</td>
                    <td class="py-4 px-6 text-black  text-center">{{ $resena->email }}</td>
                    <td class="py-4 px-6 text-black  text-center">{{ $resena->mensaje }}</td>
                    <td class="py-4 px-6 text-center">
                        <button wire:click="eliminar({{ $resena->id }})"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



