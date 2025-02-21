<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SearchBite - Encuentra los Mejores Recursos de Estudio</title>

    <!-- Tailwind CSS (usando Vite o CDN) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      <style>
        /* Aquí puedes incluir Tailwind o tus estilos personalizados */
      </style>
    @endif
  </head>
  <body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100">
    <!-- Header -->
    <header class="w-full p-6 flex justify-between items-center backdrop-blur-sm bg-black/20 fixed top-0 z-50">
      <div class="text-2xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
        SearchBite
      </div>
      <nav>
        <div class="space-x-4">
          @if (Route::has('login'))
            @auth
              <a 
                href="{{ url('/dashboard') }}" 
                class="text-sm font-medium hover:text-red-500 transition-colors"
              >
                Dashboard
              </a>
            @else
              <a 
                href="{{ route('login') }}" 
                class="text-sm font-medium hover:text-red-500 transition-colors"
              >
                Iniciar Sesión
              </a>
              @if (Route::has('register'))
                <a 
                  href="{{ route('register') }}" 
                  class="text-sm font-medium px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 rounded-full hover:opacity-90 transition-opacity"
                >
                  Registrarse
                </a>
              @endif
            @endauth
          @endif
        </div>
      </nav>
    </header>

    <!-- Hero Section -->
    <main class="w-full flex-1 flex flex-col items-center justify-center px-6 pt-32 pb-20 text-center relative">
      <!-- Imagen de fondo con baja opacidad -->
      <div 
        class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80')] opacity-10 bg-cover bg-center"
      ></div>
      <div class="relative">
        <h1 
          class="text-4xl md:text-6xl font-extrabold mb-6 bg-gradient-to-r from-white via-red-500 to-orange-500 bg-clip-text text-transparent"
        >
          Encuentra los Mejores Recursos de Estudio
        </h1>
        <p class="text-ct md:text-2xl max-w-2x2 mb-8 text-gray-300">
          Con SearchBite accede a videos, cursos, libros e investigaciones académicas de manera rápida y sencilla.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
          <a 
            href="{{ route('login') }}" 
            class="px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-full shadow-lg shadow-red-500/20 hover:shadow-red-500/40 transition-all"
          >
            Inicia Sesión
          </a>
          <a 
            href="{{ route('register') }}" 
            class="px-8 py-4 bg-gray-900 border border-red-500/30 text-white font-semibold rounded-full hover:bg-gray-800 transition-all"
          >
            Regístrate
          </a>
        </div>
      </div>
    </main>

    <!-- Beneficios -->
    <section class="w-full max-w-6xl mx-auto px-6 py-20">
      <div class="grid gap-8 md:grid-cols-2">
        <!-- Búsqueda Inteligente -->
        <div class="group bg-gray-900/50 p-8 rounded-2xl border border-gray-800 hover:border-red-500/30 transition-all backdrop-blur-sm">
          <div class="flex items-center mb-4">
            <!-- Icono Search (lucide) -->
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              class="w-8 h-8 text-red-500 mr-3" 
              viewBox="0 0 24 24" 
              stroke-width="2" 
              stroke="currentColor" 
              fill="none" 
              stroke-linecap="round" 
              stroke-linejoin="round"
            >
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
            <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">
              Búsqueda Inteligente
            </h2>
          </div>
          <p class="text-gray-400 group-hover:text-gray-300 transition-colors">
            Encuentra recursos educativos de alta calidad en segundos, gracias a nuestro avanzado motor de búsqueda.
          </p>
        </div>

        <!-- Organización y Favoritos -->
        <div class="group bg-gray-900/50 p-8 rounded-2xl border border-gray-800 hover:border-red-500/30 transition-all backdrop-blur-sm">
          <div class="flex items-center mb-4">
            <!-- Icono Star (lucide) -->
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              class="w-8 h-8 text-red-500 mr-3" 
              viewBox="0 0 24 24" 
              stroke-width="2" 
              stroke="currentColor" 
              fill="none" 
              stroke-linecap="round" 
              stroke-linejoin="round"
            >
              <polygon points="12 17.09 15.09 19 14.18 15.62 17 13.47 13.64 13.24 12 10 10.36 13.24 7 13.47 9.82 15.62 8.91 19 12 17.09"/>
            </svg>
            <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">
              Organización y Favoritos
            </h2>
          </div>
          <p class="text-gray-400 group-hover:text-gray-300 transition-colors">
            Guarda tus recursos favoritos y accede a ellos fácilmente desde tu dashboard.
          </p>
        </div>

        <!-- Integración Completa -->
        <div class="group bg-gray-900/50 p-8 rounded-2xl border border-gray-800 hover:border-red-500/30 transition-all backdrop-blur-sm">
          <div class="flex items-center mb-4">
            <!-- Icono BookOpen (lucide) -->
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              class="w-8 h-8 text-red-500 mr-3" 
              viewBox="0 0 24 24" 
              stroke-width="2" 
              stroke="currentColor" 
              fill="none" 
              stroke-linecap="round" 
              stroke-linejoin="round"
            >
              <path d="M2 3h6a2 2 0 0 1 2 2v14a2 2 0 0 0-2-2H2z"/>
              <path d="M22 3h-6a2 2 0 0 0-2 2v14a2 2 0 0 1 2-2h6z"/>
            </svg>
            <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">
              Integración Completa
            </h2>
          </div>
          <p class="text-gray-400 group-hover:text-gray-300 transition-colors">
            Conecta con las mejores plataformas educativas como Udemy, Semantic Scholar y Google Books.
          </p>
        </div>

        <!-- Experiencia Personalizada -->
        <div class="group bg-gray-900/50 p-8 rounded-2xl border border-gray-800 hover:border-red-500/30 transition-all backdrop-blur-sm">
          <div class="flex items-center mb-4">
            <!-- Icono Settings (lucide) -->
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              class="w-8 h-8 text-red-500 mr-3" 
              viewBox="0 0 24 24" 
              stroke-width="2" 
              stroke="currentColor" 
              fill="none" 
              stroke-linecap="round" 
              stroke-linejoin="round"
            >
              <circle cx="12" cy="12" r="3"/>
              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2h0a2 2 0 0 1-2-2v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 5 15.4a1.65 1.65 0 0 0-1.51-1H3.91a2 2 0 0 1-2-2h0a2 2 0 0 1 2-2h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 8.6 5a1.65 1.65 0 0 0 1-.94V3.91a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19 8.6a1.65 1.65 0 0 0 .94 1h.09a2 2 0 0 1 2 2h0a2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
            <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">
              Experiencia Personalizada
            </h2>
          </div>
          <p class="text-gray-400 group-hover:text-gray-300 transition-colors">
            Disfruta de una interfaz limpia e intuitiva que se adapta a tus necesidades.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-sm text-gray-500">
      © {{ date('Y') }} SearchBite. Todos los derechos reservados.
    </footer>
  </body>
</html>
