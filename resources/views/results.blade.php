<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function filterResults(filter) {
            // Obtener todas las secciones
            const videoSection = document.getElementById('video-section');
            const bookSection = document.getElementById('book-section');

            // Mostrar/Ocultar secciones según el filtro seleccionado
            if (filter === 'videos') {
                videoSection.style.display = 'block';
                bookSection.style.display = 'none';
            } else if (filter === 'books') {
                videoSection.style.display = 'none';
                bookSection.style.display = 'block';
            } else {
                videoSection.style.display = 'block';
                bookSection.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search Results for "{{ $keywords }}"</h1>

        <div class="mt-4">
            <label for="filter" class="form-label">Filter Results</label>
            <select id="filter" class="form-select" onchange="filterResults(this.value)">
                <option value="both" selected>Videos and Books</option>
                <option value="videos">Videos Only</option>
                <option value="books">Books Only</option>
                <option value="books">Books Only</option>
            </select>
        </div>

        <!-- Videos Section -->
        <section id="video-section" class="mt-5">
            <h2>Videos</h2>
            @if(isset($videos['items']) && count($videos['items']) > 0)
                <div class="row">
                    @foreach($videos['items'] as $video)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img 
                                    src="{{ $video['snippet']['thumbnails']['medium']['url'] }}" 
                                    class="card-img-top" 
                                    alt="Video Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $video['snippet']['title'] }}</h5>
                                    <p class="card-text">{{ $video['snippet']['description'] }}</p>
                                    <a 
                                        href="https://www.youtube.com/watch?v={{ $video['id']['videoId'] }}" 
                                        target="_blank" 
                                        class="btn btn-primary">Watch Video</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No videos found for "{{ $keywords }}".</p>
            @endif
        </section>

          <!-- Courses Section -->
  <section id="course-section" class="mt-5">
    <h2>Courses</h2>
    @if(isset($courses['results']) && count($courses['results']) > 0)
        <div class="row">
            @foreach($courses['results'] as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course['title'] }}</h5>
                            <a href="{{ $course['url'] }}" target="_blank" class="btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No courses found for "{{ $keywords }}".</p>
    @endif
</section>

        <!-- Books Section -->
        <section id="book-section" class="mt-5">
            <h2>Books and PDFs</h2>
            @if(isset($books['items']) && count($books['items']) > 0)
                <div class="row">
                    @foreach($books['items'] as $book)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if(isset($book['volumeInfo']['imageLinks']['thumbnail']))
                                    <img 
                                        src="{{ $book['volumeInfo']['imageLinks']['thumbnail'] }}" 
                                        class="card-img-top" 
                                        alt="Book Thumbnail">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book['volumeInfo']['title'] }}</h5>
                                    <p class="card-text">
                                        {{ isset($book['volumeInfo']['authors']) ? implode(', ', $book['volumeInfo']['authors']) : 'Unknown Author' }}
                                    </p>
                                    <p class="card-text">
                                        {{ $book['volumeInfo']['description'] ?? 'No description available.' }}
                                    </p>
                                    <a 
                                        href="{{ $book['volumeInfo']['infoLink'] }}" 
                                        target="_blank" 
                                        class="btn btn-primary">View Book</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No books found for "{{ $keywords }}".</p>
            @endif
        </section>

        <!-- Sección de Investigaciones Académicas -->
<section id="research-section" class="mt-5">
    <h2>Investigaciones Académicas</h2>
    @if(isset($researchPapers['results']) && count($researchPapers['results']) > 0)
        <div class="row">
            @foreach($researchPapers['results'] as $paper)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paper['title'] }}</h5>
                            <p class="card-text">
                                {{ isset($paper['authors']) ? implode(', ', array_column($paper['authors'], 'display_name')) : 'Autor desconocido' }}
                            </p>
                            <p class="card-text">
                                {{ $paper['abstract'] ?? 'No hay resumen disponible.' }}
                            </p>
                            <a 
                                href="{{ $paper['doi'] ? 'https://doi.org/' . $paper['doi'] : '#' }}" 
                                target="_blank" 
                                class="btn btn-primary">Leer Investigación</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron investigaciones académicas para "{{ $keywords }}".</p>
    @endif
</section>





    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
