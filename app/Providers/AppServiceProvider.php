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
        // Register storage_url helper with Blade
        $this->registerStorageUrlHelper();
    }

    /**
     * Register the storage_url helper function
     */
    private function registerStorageUrlHelper(): void
    {
        if (!function_exists('storage_url')) {
            function storage_url($path)
            {
                return \App\Helpers\StorageHelper::url($path);
            }
        }
    }
}
