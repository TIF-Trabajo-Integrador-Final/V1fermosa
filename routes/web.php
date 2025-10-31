<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Importar todos los componentes Livewire del Frontend
use App\Livewire\Inicio;
use App\Livewire\Carreras;
use App\Livewire\Requisitos;


// Importar todos los componentes Livewire del Admin
use App\Livewire\Admin\CarrerasIndex;
use App\Livewire\Admin\RequisitosIndex;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (FRONTEND)
|--------------------------------------------------------------------------
*/
// La ruta raíz ahora carga el componente Livewire de Inicio
Route::get('/', Inicio::class)->name('inicio'); 
Route::get('/carreras', Carreras::class)->name('carreras');
Route::get('/requisitos-inscripcion', Requisitos::class)->name('requisitos');


// ...



/*
|--------------------------------------------------------------------------
| RUTAS DE ADMINISTRACIÓN (PROTEGIDAS - CRUD)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard predeterminado
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    // Rutas de Gestión del Instituto
    Route::get('admin/carreras', CarrerasIndex::class)->name('admin.carreras.index');
    Route::get('admin/requisitos', RequisitosIndex::class)->name('admin.requisitos.index');

    // Rutas de Perfil (Generadas por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
