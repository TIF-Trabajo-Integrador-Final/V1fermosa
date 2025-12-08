<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordCodeController;
use App\Http\Controllers\DebugController;

// 🔧 RUTA PARA EJECUTAR EL SEEDER DE CONVENIOS
Route::get('/seed-convenios', function () {
    try {
        \Artisan::call('db:seed', [
            '--class' => 'ConveniosSeeder',
            '--force' => true
        ]);

        return "<pre>" . \Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "<pre>❌ ERROR: " . $e->getMessage() . "</pre>";
    }
});

// DEBUG ROUTES
Route::get('/debug/convenios', [DebugController::class, 'convenios']);
Route::get('/debug/health', [DebugController::class, 'health']);
Route::get('/debug/seed-convenios', [DebugController::class, 'seedConvenios']);

Route::get('/seed-user', function () {
    \Artisan::call('db:seed', ['--class' => 'UserSeeder', '--force' => true]);
    return "<pre>" . \Artisan::output() . "</pre>";
});

Route::get('/seed-niveles', function () {
    \Artisan::call('db:seed', ['--class' => 'NivelesSeeder', '--force' => true]);
    return "<pre>" . \Artisan::output() . "</pre>";
});

Route::get('/seed-requisitos', function () {
    \Artisan::call('db:seed', ['--class' => 'RequisitosSeeder', '--force' => true]);
    return "<pre>" . \Artisan::output() . "</pre>";
});

Route::get('/seed-carreras', function () {
    \Artisan::call('db:seed', ['--class' => 'CarrerasSeeder', '--force' => true]);
    return "<pre>" . \Artisan::output() . "</pre>";
});

Route::get('/seed-carreras-requisitos', function () {
    \Artisan::call('db:seed', ['--class' => 'CarrerasRequisitoSeeder', '--force' => true]);
    return "<pre>" . \Artisan::output() . "</pre>";
});


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
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', Inicio::class)->name('inicio');
Route::get('/carreras', Carreras::class)->name('carreras');
Route::get('/carrera/{id}', CarreraShow::class)->name('carrera.show');
Route::get('/requisitos', Requisitos::class)->name('requisitos');
Route::get('/convenios', ShowConvenios::class)->name('convenios');
Route::get('/resenas', Resenas::class)->name('resenas');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (solo usuarios autenticados)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/carreras', CarrerasIndex::class)->name('carreras.index');
        Route::get('/requisitos', RequisitosIndex::class)->name('requisitos.index');
        Route::get('/convenios', ConveniosIndex::class)->name('convenios.index');
        Route::get('/resenas', ResenasIndex::class)->name('resenas.index');

    });

    // Laravel Breeze Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| SERVIR IMÁGENES DESDE /public/images SIN TOCAR SESSION NI AUTH
|--------------------------------------------------------------------------
|
| Esta ruta permite que Railway entregue correctamente:
|   /images/carreras/archivo.jpg
|   /images/convenios/archivo.jpg
|
| SIN interferencias de session, cookie, ni middleware.
| SOLUCIONA el problema de 404/401 al cargar imágenes.
|
*/

Route::get('/images/{folder}/{filename}', function ($folder, $filename) {

    $path = public_path("images/$folder/$filename");

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);

})->where(['folder' => '.*', 'filename' => '.*'])
  ->name('images.public');


/*
|--------------------------------------------------------------------------
| Rutas de autenticación de Breeze
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
