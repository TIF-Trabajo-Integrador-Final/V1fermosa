<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// FRONTEND - Componentes Livewire públicos
use App\Livewire\Inicio;
use App\Livewire\Carreras;
use App\Livewire\Requisitos;
use App\Livewire\ShowConvenios;
use App\Livewire\CarreraShow;
use App\Livewire\Resenas;


// ADMIN - Componentes Livewire internos
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\CarrerasIndex;
use App\Livewire\Admin\RequisitosIndex;
use App\Livewire\Admin\ConveniosIndex;
use App\Livewire\Admin\ResenasIndex;



/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS DEL FRONTEND
|--------------------------------------------------------------------------
|
| Aquí van las rutas que cualquier visitante puede acceder.
|
*/

Route::get('/', Inicio::class)->name('inicio');

// Ejemplo: si tuvieras rutas públicas para carreras:
Route::get('/carreras', Carreras::class)->name('carreras');
Route::get('/carrera/{id}', CarreraShow::class)->name('carrera.show');

// Ejemplo: requisitos públicos (si corresponde)
Route::get('/requisitos', Requisitos::class)->name('requisitos');

// Convenios
Route::get('/convenios', ShowConvenios::class)->name('convenios');


Route::get('/resenas', Resenas::class)->name('resenas');

// ===============================



/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (solo usuarios autenticados)
|--------------------------------------------------------------------------
|
| Se aplican los middlewares "auth" y "verified".
| CAMBIO: estructurado correctamente para garantizar seguridad.
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard general
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMINISTRACIÓN
    |--------------------------------------------------------------------------
    |
    | CAMBIO IMPORTANTE:
    | Se agrupa todo el panel administrativo bajo prefix "admin"
    | y se agrega name("admin.") para mejor organización.
    |
    */

   Route::prefix('admin')->name('admin.')->group(function () {

    // Carreras
    Route::get('/carreras', CarrerasIndex::class)->name('carreras.index');

    // Requisitos
    Route::get('/requisitos', RequisitosIndex::class)->name('requisitos.index');

    // Convenios
    Route::get('/convenios', ConveniosIndex::class)->name('convenios.index');

    // Reseñas
    Route::get('/resenas', ResenasIndex::class)->name('resenas.index');
});

        // Aquí podés agregar módulos futuros:
        // Route::get('/convenios', ConveniosIndex::class)->name('convenios.index');
        // Route::get('/usuarios', UsuariosIndex::class)->name('usuarios.index');
   


    /*
    |--------------------------------------------------------------------------
    | PERFIL (Laravel Breeze)
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
