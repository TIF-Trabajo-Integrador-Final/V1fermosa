<?php

use Illuminate\Support\Facades\Route;

// Importaciones de Livewire
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Carreras\Index as CarrerasIndex;
use App\Livewire\Carreras\Form as CarrerasForm;
use App\Livewire\Planes\Index as PlanesIndex;
use App\Livewire\Planes\Form as PlanesForm;
use App\Livewire\Sedes\Index as SedesIndex;
use App\Livewire\Ofertas\Index as OfertasIndex;
use App\Livewire\Requisitos\Index as RequisitosIndex;

// HOME PAGE (Público)
Route::get('/', HomeIndex::class)->name('home');

// Rutas Públicas de la Aplicación
// Carreras
Route::prefix('carreras')->group(function () {
    Route::get('/', CarrerasIndex::class)->name('carreras.index');
    // Las rutas 'crear' y 'editar' generalmente deberían ser protegidas
    Route::get('/crear', CarrerasForm::class)->name('carreras.create'); 
    Route::get('/{id}/editar', CarrerasForm::class)->name('carreras.edit');
});

// Planes
Route::prefix('planes')->group(function () {
    Route::get('/', PlanesIndex::class)->name('planes.index');
    Route::get('/crear', PlanesForm::class)->name('planes.create');
    Route::get('/{id}/editar', PlanesForm::class)->name('planes.edit');
});

// Sedes
Route::prefix('sedes')->group(function () {
    Route::get('/', SedesIndex::class)->name('sedes.index');
});

// Ofertas educativas
Route::prefix('ofertas')->group(function () {
    Route::get('/', OfertasIndex::class)->name('ofertas.index');
});

// Requisitos de inscripción
Route::prefix('requisitos')->group(function () {
    Route::get('/', RequisitosIndex::class)->name('requisitos.index');
});


// =========================================================
// RUTAS DE AUTENTICACIÓN (LOGIN, REGISTER, LOGOUT, etc.)
// =========================================================

// Esta línea carga el archivo de rutas que fue generado por Laravel Breeze/Jetstream
require __DIR__.'/auth.php';


// =========================================================
// RUTA PROTEGIDA (DASHBOARD)
// =========================================================

// Después de iniciar sesión, el sistema intentará redirigir aquí.
// Usamos un Livewire Component de prueba para que funcione.

use App\Livewire\Dashboard; 

Route::middleware(['auth'])->group(function () {
    // Definición de la ruta 'dashboard'
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    
    // Aquí puedes agregar más rutas protegidas (admin, crud, etc.)
});