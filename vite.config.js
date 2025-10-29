import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Se eliminó el comodín "resources/views/**/*.blade.php" de aquí, 
            // ya que no es un entry point válido para Rollup/Vite.
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // Usamos el 'refresh' para asegurarnos de que Vite escanee las clases
            // de Tailwind de los archivos Blade, lo cual soluciona el problema de estilos.
            refresh: [
                'app/Livewire/**',
                'resources/views/**'
            ],
        }),
    ],
});
