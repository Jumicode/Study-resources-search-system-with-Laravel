<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Recursos de Estudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search Study Resources</h1>

        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        
        <p class="text-center">Enter a topic or keywords to find related resources.</p>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <form action="{{ route('resources.search') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="keywords" class="form-label">Topic or Keywords</label>
                <input 
                    type="text" 
                    id="keywords" 
                    name="keywords" 
                    class="form-control" 
                    placeholder="Write here your topic of interest..." 
                    required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
