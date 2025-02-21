<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results for "{{ $keywords }}" | SearchBite</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-gray-100">
  <div class="container mx-auto px-6 py-12 space-y-12">
    <h1 class="text-2xl font-bold text-center mb-8">
      Search Results for "{{ $keywords }}"
    </h1>

    <!-- Filtro -->
    <div class="flex items-center justify-between mb-8">
      <h2 class="text-xl font-semibold">Resultados de búsqueda</h2>
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
        </svg>
        <select id="filter" class="bg-gray-900/50 border border-gray-800 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-red-500/50" onchange="filterResults(this.value)">
          <option value="all" selected>Todos los recursos</option>
          <option value="videos">Solo videos</option>
          <option value="books">Solo libros</option>
          <option value="courses">Solo cursos</option>
          <option value="research">Solo investigaciones</option>
        </select>
      </div>
    </div>

    <!-- Sección de Videos -->
    <div id="video-section">
      <h3 class="text-lg font-semibold mb-4">Videos</h3>
      <div class="relative">
        <div id="video-container" class="flex space-x-6 overflow-x-auto pb-4 scroll-smooth">
          @if(isset($videos['items']) && count($videos['items']) > 0)
            @foreach($videos['items'] as $video)
              <div class="min-w-[300px] bg-gray-900/50 rounded-2xl overflow-hidden border border-gray-800 hover:border-red-500/30 transition-all group">
                <div class="relative h-48 overflow-hidden">
                  <img src="{{ $video['snippet']['thumbnails']['medium']['url'] }}" alt="Video Thumbnail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                </div>
                <div class="p-4">
                  <h4 class="font-semibold mb-2">{{ $video['snippet']['title'] }}</h4>
                  <p class="text-sm text-gray-400 mb-4">{{ Str::limit($video['snippet']['description'], 80) }}</p>
                  <div class="flex items-center justify-between">
                    <a href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" target="_blank" class="text-red-500 hover:text-red-400 transition-colors text-sm font-medium">
                      Ver recurso
                    </a>
                    <form action="{{ route('favorites.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="title" value="{{ $video['snippet']['title'] }}">
                      <input type="hidden" name="url" value="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}">
                      <input type="hidden" name="type" value="video">
                      <input type="hidden" name="cover" value="{{ $video['snippet']['thumbnails']['medium']['url'] }}">
                      <button type="submit" class="px-3 py-1.5 text-sm font-medium bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20 transition-colors">
                        Guardar
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p class="text-gray-400">No se encontraron videos.</p>
          @endif
        </div>
        <!-- Botón Izquierdo -->
        <button onclick="scrollLeft('video-container')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <!-- Botón Derecho -->
        <button onclick="scrollRight('video-container')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Sección de Cursos -->
    <div id="course-section">
      <h3 class="text-lg font-semibold mb-4">Cursos</h3>
      <div class="relative">
        <div id="course-container" class="flex space-x-6 overflow-x-auto pb-4 scroll-smooth">
          @if(isset($courses['results']) && count($courses['results']) > 0)
            @foreach($courses['results'] as $course)
              <div class="min-w-[300px] group bg-gray-900/50 rounded-2xl overflow-hidden border border-gray-800 hover:border-red-500/30 transition-all">
                <div class="relative h-48 overflow-hidden">
                  @if(isset($course['image_480x270']))
                    <img src="{{ $course['image_480x270'] }}" alt="Course Thumbnail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                  @endif
                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                </div>
                <div class="p-4">
                  <h4 class="font-semibold mb-2">{{ $course['title'] }}</h4>
                  <div class="flex items-center justify-between">
                    <a href="{{ $course['url'] }}" target="_blank" class="text-red-500 hover:text-red-400 transition-colors text-sm font-medium">
                      Ver recurso
                    </a>
                    <form action="{{ route('favorites.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="title" value="{{ $course['title'] }}">
                      <input type="hidden" name="url" value="{{ $course['url'] }}">
                      <input type="hidden" name="type" value="course">
                      @if(isset($course['image_480x270']))
                        <input type="hidden" name="cover" value="{{ $course['image_480x270'] }}">
                      @endif
                      <button type="submit" class="px-3 py-1.5 text-sm font-medium bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20 transition-colors">
                        Guardar
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p class="text-gray-400">No se encontraron cursos.</p>
          @endif
        </div>
        <!-- Botón Izquierdo -->
        <button onclick="scrollLeft('course-container')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <!-- Botón Derecho -->
        <button onclick="scrollRight('course-container')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Sección de Libros y PDFs -->
    <div id="book-section">
      <h3 class="text-lg font-semibold mb-4">Libros y PDFs</h3>
      <div class="relative">
        <div id="book-container" class="flex space-x-6 overflow-x-auto pb-4 scroll-smooth">
          @if(isset($books['items']) && count($books['items']) > 0)
            @foreach($books['items'] as $book)
              <div class="min-w-[300px] group bg-gray-900/50 rounded-2xl overflow-hidden border border-gray-800 hover:border-red-500/30 transition-all">
                <div class="relative h-48 overflow-hidden">
                  @if(isset($book['volumeInfo']['imageLinks']['thumbnail']))
                    <img src="{{ $book['volumeInfo']['imageLinks']['thumbnail'] }}" alt="Book Thumbnail" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                  @endif
                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                </div>
                <div class="p-4">
                  <h4 class="font-semibold mb-2">{{ $book['volumeInfo']['title'] }}</h4>
                  <p class="text-sm text-gray-400 mb-2">
                    {{ isset($book['volumeInfo']['authors']) ? implode(', ', $book['volumeInfo']['authors']) : 'Autor desconocido' }}
                  </p>
                  <p class="text-sm text-gray-400 mb-4">
                    {{ Str::limit($book['volumeInfo']['description'] ?? 'No hay descripción.', 80) }}
                  </p>
                  <div class="flex items-center justify-between">
                    <a href="{{ $book['volumeInfo']['infoLink'] }}" target="_blank" class="text-red-500 hover:text-red-400 transition-colors text-sm font-medium">
                      Ver recurso
                    </a>
                    <form action="{{ route('favorites.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="title" value="{{ $book['volumeInfo']['title'] }}">
                      <input type="hidden" name="url" value="{{ $book['volumeInfo']['infoLink'] }}">
                      <input type="hidden" name="type" value="book">
                      @if(isset($book['volumeInfo']['imageLinks']['thumbnail']))
                        <input type="hidden" name="cover" value="{{ $book['volumeInfo']['imageLinks']['thumbnail'] }}">
                      @endif
                      <button type="submit" class="px-3 py-1.5 text-sm font-medium bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20 transition-colors">
                        Guardar
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p class="text-gray-400">No se encontraron libros o PDFs.</p>
          @endif
        </div>
        <!-- Botón Izquierdo -->
        <button onclick="scrollLeft('book-container')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <!-- Botón Derecho -->
        <button onclick="scrollRight('book-container')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Sección de Investigaciones Académicas -->
    <div id="research-section">
      <h3 class="text-lg font-semibold mb-4">Investigaciones Académicas</h3>
      <div class="relative">
        <div id="research-container" class="flex space-x-6 overflow-x-auto pb-4 scroll-smooth">
          @if(isset($researchPapers['results']) && count($researchPapers['results']) > 0)
            @foreach($researchPapers['results'] as $paper)
              <div class="min-w-[300px] group bg-gray-900/50 rounded-2xl overflow-hidden border border-gray-800 hover:border-red-500/30 transition-all">
                <div class="p-4">
                  <h4 class="font-semibold mb-2">{{ $paper['title'] }}</h4>
                  <p class="text-sm text-gray-400 mb-2">
                    {{ isset($paper['authors']) ? implode(', ', array_column($paper['authors'], 'display_name')) : 'Autor desconocido' }}
                  </p>
                  <p class="text-sm text-gray-400 mb-4">
                    {{ Str::limit($paper['abstract'] ?? 'No hay resumen disponible.', 80) }}
                  </p>
                  <div class="flex items-center justify-between">
                    <a href="{{ $paper['doi'] ? 'https://doi.org/' . $paper['doi'] : '#' }}" target="_blank" class="text-red-500 hover:text-red-400 transition-colors text-sm font-medium">
                      Leer Investigación
                    </a>
                    <form action="{{ route('favorites.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="title" value="{{ $paper['title'] }}">
                      <input type="hidden" name="url" value="{{ $paper['doi'] ? 'https://doi.org/' . $paper['doi'] : '#' }}">
                      <input type="hidden" name="type" value="research">
                      <button type="submit" class="px-3 py-1.5 text-sm font-medium bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500/20 transition-colors">
                        Guardar
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <p class="text-gray-400">No se encontraron investigaciones académicas.</p>
          @endif
        </div>
        <!-- Botón Izquierdo -->
        <button onclick="scrollLeft('research-container')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <!-- Botón Derecho -->
        <button onclick="scrollRight('research-container')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/50 p-2 rounded-full hover:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <script>
    function scrollLeft(containerId) {
      const container = document.getElementById(containerId);
      container.scrollBy({ left: -300, behavior: 'smooth' });
    }
    function scrollRight(containerId) {
      const container = document.getElementById(containerId);
      container.scrollBy({ left: 300, behavior: 'smooth' });
    }
    function filterResults(filter) {
      const sections = {
        videos: document.getElementById('video-section'),
        books: document.getElementById('book-section'),
        courses: document.getElementById('course-section'),
        research: document.getElementById('research-section')
      };

      if(filter === 'all'){
        Object.values(sections).forEach(section => section.style.display = 'block');
      } else {
        Object.entries(sections).forEach(([key, section]) => {
          section.style.display = (key === filter) ? 'block' : 'none';
        });
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

