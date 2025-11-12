<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarreraController;

// Livewire (Frontend)
use App\Livewire\Inicio;
use App\Livewire\Requisitos as RequisitosPublico;
use App\Livewire\Carreras as CarrerasPublico;

// Livewire (Admin)
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\CarrerasIndex;
use App\Livewire\Admin\RequisitosIndex;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (FRONTEND)
|--------------------------------------------------------------------------
*/

// Inicio
Route::get('/', Inicio::class)->name('inicio');

// Listado público de carreras
Route::get('/carreras', CarrerasPublico::class)->name('carreras.index');

// Detalle de una carrera (controller)
Route::get('/carreras/{carrera}', [CarreraController::class, 'show'])->name('carreras.show');

// Requisitos de inscripción (público)
Route::get('/requisitos-inscripcion', RequisitosPublico::class)->name('requisitos');

/*
|--------------------------------------------------------------------------
| PUERTA DE ENTRADA AL PANEL (usa esto en el botón "Panel Admin")
|--------------------------------------------------------------------------
| href="{{ route('admin.entry') }}"
| Invitado  -> /login
| Logueado -> /dashboard
*/
Route::get('/admin', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
})->name('admin.entry');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (ADMIN + PERFIL)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');


    // Gestión (Livewire)
    Route::get('admin/carreras', CarrerasIndex::class)->name('admin.carreras.index');
    Route::get('admin/requisitos', RequisitosIndex::class)->name('admin.requisitos.index');

    // Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
