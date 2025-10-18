<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\InscripcionController;

/*
|--------------------------------------------------------------------------
| Rutas Web del Portal Fermosa
|--------------------------------------------------------------------------
|
| Estas rutas se cargan con el RouteServiceProvider y están asignadas 
| al grupo de middleware 'web'.
|
*/

// ==============================================
// 1. RUTAS DE HOME Y PÁGINAS ESTÁTICAS (WebController)
// ==============================================

// Página de Inicio
Route::get('/', [WebController::class, 'index'])->name('home');

// Información de la Institución (Misión, Visión, Historia)
Route::get('/institucion', [WebController::class, 'institucion'])->name('institucion');

// GET: Muestra la página de Inscripción y Requisitos
Route::get('/inscripcion', [InscripcionController::class, 'index'])->name('inscripcion');

// POST: Procesa y guarda los datos enviados por el formulario
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');


// RUTA 3: Listado de Convenios (ConvenioController)
Route::get('/convenios', [ConvenioController::class, 'index'])->name('convenios.index');


// ==============================================
// 2. RUTAS DE CONTENIDO DINÁMICO
// ==============================================

// Listado de Sedes (SedeController)
Route::get('/sedes', [SedeController::class, 'index'])->name('sedes.index');


// Oferta Educativa (CarreraController)
Route::prefix('oferta-educativa')->group(function () {
    
    // Listado general de todas las carreras
    Route::get('/', [CarreraController::class, 'index'])->name('carreras.index');
    
    // Detalle de una carrera específica
    Route::get('/{carrera}', [CarreraController::class, 'show'])->name('carreras.show');

    // Mantenemos la ruta resource solo para las acciones que no sean index (ej: /oferta-educativa/convenios/{convenio})
    // Si no usas las rutas CRUD para convenios, puedes eliminar la siguiente línea.
    Route::resource('convenios', ConvenioController::class)->only(['show', 'create', 'store', 'edit', 'update', 'destroy']);
    
    // Opcional: Elimina la línea resource si solo quieres la página de listado.
});

// ==============================================
// 3. RUTAS PARA EL FUTURO PANEL DE ADMINISTRACIÓN (Opcional)
//    (Estas rutas estarán protegidas por autenticación y roles)
// ==============================================
// Si utilizas Laravel Breeze/Jetstream, las rutas de autenticación
// (login, register, logout) se definen automáticamente en otro archivo
// o se cargan a través de un Service Provider.