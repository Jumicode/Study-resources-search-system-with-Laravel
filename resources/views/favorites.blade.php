@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100 py-12">
  <div class="container mx-auto px-6">

      <!-- Mensaje de éxito (opcional) -->
      @if(session('success'))
      <div class="mb-4 p-4 rounded-md bg-green-600 text-white">
          {{ session('success') }}
      </div>
  @endif
  
    <h1 class="text-4xl font-bold text-center mb-8">Tus Favoritos</h1>
    <style>
        /* Para navegadores basados en WebKit (Chrome, Safari) */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: #1f2937; /* Gris oscuro */
      border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
      background: #ef4444; /* Rojo vibrante */
      border-radius: 4px;
      border: 2px solid #1f2937; /* Para darle un efecto de separación */
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: #dc2626; /* Rojo un poco más oscuro al pasar el mouse */
    }
    
    /* Para Firefox */
    html {
      scrollbar-width: thin;
      scrollbar-color: #ef4444 #1f2937;
    }
    
      </style>
    @if($favorites->count() > 0)
      @php
        // Agrupar los favoritos por su tipo: video, course, book, research
        $groupedFavorites = $favorites->groupBy('type');
      @endphp

      @foreach($groupedFavorites as $type => $favoritesGroup)
        <h2 class="text-2xl font-semibold mb-4">{{ ucfirst($type) }}</h2>
        <div class="flex space-x-6 overflow-x-auto pb-6">
          @foreach($favoritesGroup as $favorite)
            <div class="min-w-[300px] bg-gray-900/50 rounded-2xl border border-gray-800 hover:border-red-500/30 transition-all">
              @if($type !== 'research' && $favorite->cover)
                <img src="{{ $favorite->cover }}" alt="{{ $favorite->title }} Cover" class="w-full h-48 object-cover rounded-t-2xl">
              @endif
              <div class="p-4">
                <h5 class="text-xl font-semibold mb-3">{{ $favorite->title }}</h5>
                <a href="{{ $favorite->url }}" target="_blank" class="px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 text-white font-medium rounded-md hover:opacity-90 transition">
                  Ver
                </a>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    @else
      <p class="text-center text-gray-400">No tienes favoritos aún.</p>
    @endif
  </div>
</div>
@endsection
