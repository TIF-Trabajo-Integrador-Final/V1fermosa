<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Proxies confiables
    |--------------------------------------------------------------------------
    |
    | Railway actúa detrás de un proxy HTTPS. Para que Livewire no falle con 401
    | al subir archivos, debe confiar en esos proxies.
    |
    */

    'proxies' => '*',  // Confiar en todos los proxies (Railway incluido)

    /*
    |--------------------------------------------------------------------------
    | Encabezados a tomar en cuenta
    |--------------------------------------------------------------------------
    */

    'headers' => 
          Illuminate\Http\Request::HEADER_X_FORWARDED_FOR
        | Illuminate\Http\Request::HEADER_X_FORWARDED_HOST
        | Illuminate\Http\Request::HEADER_X_FORWARDED_PORT
        | Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO
        | Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB,
];
