<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Carrera;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Inyectar todas las carreras en todas las vistas (para el menú desplegable)
        View::composer('*', function ($view) {
            $view->with('menuCarreras', Carrera::orderBy('nombre')->get());
        });
    }
}
