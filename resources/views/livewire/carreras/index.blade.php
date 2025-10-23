<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Carreras Disponibles</h1>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Nivel</th>
                <th class="p-2 border">Arancel Matrícula</th>
                <th class="p-2 border">Arancel Mensual</th>
                <th class="p-2 border">Descripción</th>
            </tr>
        </thead>
        <tbody>
            {{-- Asegúrate de que $carreras esté definido en tu componente Livewire --}}
            @foreach ($carreras as $carrera)
                <tr class="border-b">
                    <td class="p-2 border">{{ $carrera->nombre }}</td>
                    <td class="p-2 border">{{ $carrera->nivel }}</td>
                    <td class="p-2 border">${{ number_format($carrera->arancel_matricula, 2, ',', '.') }}</td>
                    <td class="p-2 border">${{ number_format($carrera->arancel_mensual, 2, ',', '.') }}</td>
                    <td class="p-2 border">{{ $carrera->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>