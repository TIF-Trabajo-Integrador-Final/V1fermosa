<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Aquí defines qué disco usará Laravel por defecto. No lo cambiaremos.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Aquí definimos todos los discos disponibles para la aplicación.
    | Agregamos el nuevo disco "public_path" para guardar imágenes en /public.
    |
    */

    'disks' => [

        // Disco local estándar (NO público)
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'visibility' => 'private',
            'throw' => false,
        ],

        // Disco público tradicional de Laravel (usado por storage:link)
        // En Railway NO se usa para imágenes porque el folder se borra.
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        // 🔥 NUEVO DISCO QUE USAREMOS PARA CARRERAS Y CONVENIOS
        // Guarda directamente dentro de /public (NO se borra en Railway)
        'public_path' => [
            'driver' => 'local',
            'root' => public_path(), // /public
            'visibility' => 'public',
            'throw' => false,
        ],

        // Amazon S3 (sin cambios)
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Esto permite que /public/storage apunte a storage/app/public
    | (Solo si usás storage:link)
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
