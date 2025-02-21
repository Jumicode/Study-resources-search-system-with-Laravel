@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100">
    <!-- Imagen de fondo con baja opacidad -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80')] 
                opacity-5 bg-cover bg-center">
    </div>

    <!-- Encabezado -->
    <header class="relative w-full p-6 flex items-center backdrop-blur-sm bg-black/20">
        <!-- Botón "Volver al Dashboard" -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors">
            <!-- Icono de flecha izquierda (lucide "arrow-left") -->
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                class="w-5 h-5" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor" 
                stroke-width="2"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Volver al Dashboard</span>
        </a>
    </header>

    <!-- Contenido Principal -->
    <main class="relative container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto">
            <!-- Título y Descripción -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
                        Buscar Recursos
                    </span>
                </h1>
                <p class="text-gray-400 text-lg">
                    Encuentra los mejores recursos para tu aprendizaje
                </p>
            </div>

            <!-- Mensaje de éxito (opcional) -->
            @if(session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-600 text-white">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulario de Búsqueda -->
            <form action="{{ route('resources.search') }}" method="POST" class="mb-12 relative">
                @csrf
                <!-- Input de búsqueda con icono -->
                <div class="relative">
                    <!-- Icono de búsqueda (lucide "search") -->
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor" 
                        stroke-width="2"
                    >
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>

                    <!-- Campo de texto -->
                    <input
                        type="text"
                        id="keywords"
                        name="keywords"
                        placeholder="Escribe un tema o palabras clave..."
                        class="w-full pl-14 pr-24 py-4 bg-gray-900/50 backdrop-blur-sm border border-gray-800 
                               rounded-2xl focus:border-red-500/50 focus:outline-none focus:ring-2 
                               focus:ring-red-500/20 transition-all text-white placeholder:text-gray-500"
                        required
                    />
                    
                    <!-- Botón "Buscar" flotante -->
                    <button
                        type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 px-4 py-2 
                               bg-gradient-to-r from-red-500 to-orange-500 rounded-xl text-sm font-medium 
                               hover:opacity-90 transition-opacity"
                    >
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
