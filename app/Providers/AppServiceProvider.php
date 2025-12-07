<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Macro para obtener URL de storage con soporte para producción
        if (!function_exists('storage_url')) {
            function storage_url($path) {
                if (config('app.env') === 'production') {
                    return \Illuminate\Support\Facades\Storage::url($path);
                }
                return asset('storage/' . $path);
            }
        }
    }
}
