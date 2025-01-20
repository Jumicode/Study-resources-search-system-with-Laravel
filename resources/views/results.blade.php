<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search Results for "{{ $keywords }}"</h1>

        @if(isset($videos['items']) && count($videos['items']) > 0)
            <div class="row mt-4">
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
            <p class="text-center mt-4">No videos found for "{{ $keywords }}". Please try another search.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
