<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Panel Administrativo - Instituto Superior Fermosa' }}</title>

  {{-- Estilos principales --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles

  {{-- Font Awesome y fuentes (para mantener coherencia) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8fafc;
    }

    header#admin-header {
      background: linear-gradient(90deg, #1b254b 0%, #24397d 100%) !important;
      color: #ffffff !important;
      transition: transform 0.3s ease-in-out;
    }

    .nav-hidden {
      transform: translateY(-100%);
    }

    .nav-link {
      color: #e0e7ff;
      transition: all 0.2s ease-in-out;
    }

    .nav-link:hover {
      color: #ffffff;
      text-shadow: 0 0 6px rgba(255, 255, 255, 0.4);
    }

    .logout-btn {
      background-color: #ef4444;
      color: white;
      padding: 0.4rem 0.8rem;
      border-radius: 0.375rem;
      transition: background 0.2s;
    }

    .logout-btn:hover {
      background-color: #dc2626;
    }
  </style>
</head>

<body class="min-h-screen flex flex-col">

  <!-- HEADER ADMIN -->
  <header id="admin-header" class="sticky top-0 z-30 shadow-md">
    <nav class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
      <!-- Logo e identidad -->
      <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo Instituto Superior Fermosa"
          class="h-8 w-8 rounded-md border border-indigo-300 shadow-sm">
        <span class="text-lg font-semibold tracking-wide">Panel Administrativo</span>
      </div>

      <!-- Navegación -->
      <div class="flex items-center space-x-6">
        <a href="{{ route('dashboard') }}" class="nav-link flex items-center">
          <i class="fas fa-chart-line mr-2"></i> Dashboard
        </a>

        <a href="{{ route('admin.carreras.index') }}" class="nav-link flex items-center">
          <i class="fas fa-graduation-cap mr-2"></i> Carreras
        </a>

        <a href="{{ route('admin.requisitos.index') }}" class="nav-link flex items-center">
          <i class="fas fa-file-alt mr-2"></i> Requisitos
        </a>

        <!-- Botón Logout -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="logout-btn flex items-center">
            <i class="fas fa-sign-out-alt mr-2"></i> Salir
          </button>
        </form>
      </div>
    </nav>
  </header>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="flex-grow p-8">
    {{ $slot }}
  </main>

  <!-- FOOTER ADMIN -->
  <footer class="bg-gray-900 text-gray-400 text-center py-4 text-sm mt-auto">
    © {{ date('Y') }} Instituto Superior Fermosa — Panel Administrativo
  </footer>

  @livewireScripts

  <script>
    // Ocultar barra al hacer scroll hacia abajo
    let lastScroll = 0;
    const nav = document.getElementById('admin-header');

    window.addEventListener('scroll', () => {
      const current = window.pageYOffset;
      if (current > lastScroll && current > 60) {
        nav.classList.add('nav-hidden');
      } else {
        nav.classList.remove('nav-hidden');
      }
      lastScroll = current;
    });
  </script>
</body>

</html>