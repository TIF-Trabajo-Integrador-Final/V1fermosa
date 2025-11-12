<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Instituto Superior Fermosa' }}</title>

    {{-- Fuentes y estilos --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-[Poppins] antialiased bg-gray-50 text-gray-800">
    {{-- ✅ Navbar dinámica (única para todo el sitio) --}}
    @include('components.layouts.navigation')

    {{-- ✅ Contenido dinámico --}}
    <main class="min-h-screen pt-20 px-4 sm:px-8 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto py-10">
            {{ $slot ?? '' }}
            @yield('content')
        </div>
    </main>

    @livewireScripts
</body>

</html>