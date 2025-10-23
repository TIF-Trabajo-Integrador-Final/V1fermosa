<div class="max-w-xl mx-auto">
<h2 class="text-xl font-bold mb-4">{{ $carrera_id ? 'Editar Carrera' : 'Nueva Carrera' }}</h2>


<form wire:submit.prevent="save">
<div class="mb-3">
<label>Nombre</label>
<input type="text" wire:model="nombre" class="border p-2 w-full">
</div>


<div class="mb-3">
<label>Nivel</label>
<input type="text" wire:model="nivel" class="border p-2 w-full">
</div>


<div class="mb-3">
<label>Arancel Matrícula</label>
<input type="text" wire:model="arancel_matricula" class="border p-2 w-full">
</div>


<div class="mb-3">
<label>Arancel Mensual</label>
<input type="text" wire:model="arancel_mensual" class="border p-2 w-full">
</div>


<div class="mb-3">
<label>Descripción</label>
<textarea wire:model="descripcion" class="border p-2 w-full"></textarea>
</div>


<button class="bg-blue-500 text-white px-4 py-2">Guardar</button>
</form>
</div>
