@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100">
    <!-- Imagen de fondo tenue -->
    <div
        class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80')] 
               opacity-5 bg-cover bg-center">
    </div>

    <!-- Header -->
    <header class="relative w-full p-6 flex justify-between items-center backdrop-blur-sm bg-black/20">
        <!-- Logo / Marca -->
        <div class="text-2xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
            SearchBite
        </div>

        <!-- Opcional: Enlaces de usuario -->
        <div class="flex items-center gap-4">
            <span class="hidden sm:block font-medium text-gray-200">
                {{ auth()->user()->name }}
            </span>
            <!-- Botón para Cerrar Sesión (si lo deseas) -->
            <!--
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-white transition-colors">
                    Cerrar Sesión
                </button>
            </form>
            -->
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="relative container mx-auto px-6 py-8">
        <!-- Sección de Bienvenida -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-3">
                ¡Bienvenid@, 
                <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
                    {{ auth()->user()->name }}
                </span>! 👋
            </h1>
            <p class="text-gray-400 text-lg">
                ¿Qué te gustaría hacer hoy?
            </p>
        </div>

        <!-- Acciones Rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <!-- Tarjeta: Ir a Búsqueda -->
            <a 
                href="{{ route('resources.search') }}" 
                class="group bg-gray-900/50 p-6 rounded-2xl border border-gray-800 
                       hover:border-red-500/30 transition-all backdrop-blur-sm 
                       flex flex-col items-center text-center"
            >
                <div class="w-14 h-14 mb-4 rounded-full bg-gradient-to-br from-red-500 to-orange-500 
                            flex items-center justify-center">
                    <!-- Icono de búsqueda (lucide "search") -->
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="w-7 h-7 text-white" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor" 
                        stroke-width="2"
                    >
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Buscar Recursos</h3>
                <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors">
                    Encuentra contenido relevante para tu aprendizaje
                </p>
            </a>

            <!-- Tarjeta: Ver Favoritos -->
            <a 
                href="{{ route('favorites.list') }}" 
                class="group bg-gray-900/50 p-6 rounded-2xl border border-gray-800 
                       hover:border-red-500/30 transition-all backdrop-blur-sm 
                       flex flex-col items-center text-center"
            >
                <div class="w-14 h-14 mb-4 rounded-full bg-gradient-to-br from-red-500 to-orange-500 
                            flex items-center justify-center">
                    <!-- Icono de estrella (lucide "star") -->
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="w-7 h-7 text-white" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor" 
                        stroke-width="2"
                    >
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.56 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z" />
                    </svg>
                </div>
                <h3 class="font-semibold mb-2">Mis Favoritos</h3>
                <p class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors">
                    Accede a tu contenido guardado
                </p>
            </a>
        </div>
    </main>
</div>
@endsection
