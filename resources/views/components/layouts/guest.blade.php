<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Superior Fermosa</title>

    {{-- Fuente Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind / Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    {{-- Estilos generales --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 antialiased min-h-screen flex flex-col">

    {{-- ✅ Navbar corporativo --}}
    <x-layouts.navigation />

    {{-- ✅ Contenido LOGIN centrado --}}
    <main class="flex-grow flex items-center justify-center py-10">
        <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg border">
            {{ $slot }}
        </div>
    </main>

    {{-- ✅ Footer corporativo --}}
    @include('components.layouts.partials.footer')

    @livewireScripts
</body>
</html>

