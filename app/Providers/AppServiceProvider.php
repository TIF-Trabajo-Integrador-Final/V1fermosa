<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Aquí podés registrar bindings, singletons, etc. si hiciera falta.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Fuerza HTTPS en producción para evitar Mixed Content
         * cuando la app corre detrás de un proxy (Railway).
         *
         * Requiere en .env (producción):
         *  - APP_ENV=production
         *  - APP_URL=https://v1fermosa-production-d8f8.up.railway.app
         *  - TRUSTED_PROXIES=0.0.0.0/0  (o configurar TrustProxies con '*' )
         *  - SESSION_SECURE_COOKIE=true
         *  - FILESYSTEM_DISK=public
         *  - ASSET_URL=https://v1fermosa-production-d8f8.up.railway.app (opcional)
         */
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Nota: Evitamos registrar helpers globales aquí.
        // Usar directamente \Illuminate\Support\Facades\Storage::url($path) en las vistas.
    }
}
