<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

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
         *  - TRUSTED_PROXIES=0.0.0.0/0
         *  - SESSION_SECURE_COOKIE=true
         *  - FILESYSTEM_DISK=public
         *  - ASSET_URL=https://v1fermosa-production-d8f8.up.railway.app (opcional)
         */
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        /**
         * ================================================================
         *  🔒 PREVENIR DUPLICACIÓN DE IMÁGENES EN LOCAL (Windows)
         * ================================================================
         *
         * Evita ejecutar `php artisan storage:link` cuando:
         *  - el enlace simbólico YA existe correctamente
         *  - o cuando existe una carpeta física generada por Git/Windows
         *
         * Con esto NO se vuelven a duplicar imágenes en:
         *   public/storage/carreras
         *   public/storage/convenios
         *
         * Railway (Linux) sigue funcionando perfecto.
         */
        
        $publicStorage = public_path('storage');

        // Si NO es un symlink, decidir si crearlo o no
        if (!is_link($publicStorage)) {
            
            // Si NO existe la carpeta → crear el symlink correctamente
            if (!File::exists($publicStorage)) {
                Artisan::call('storage:link');
            }

            // Si existe como carpeta física → NO hacer nada.
            // Esto evita la duplicación infinita de archivos en Windows.
        }

        // Fin de verificación de storage:link
    }
}
