import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '', // ✔ Railway sirve desde raíz del dominio

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: false, // ❗ evita que intente modo HMR en producción
        }),
    ],

    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
    },
});

