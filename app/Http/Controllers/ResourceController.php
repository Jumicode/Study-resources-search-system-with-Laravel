<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResourceController extends Controller
{
    private $youtubeApiKey;
    private $googleBooksApiKey;

    public function __construct()
    {
        $this->youtubeApiKey = env('YOUTUBE_API_KEY'); // Agrega esta clave al archivo .env
        $this->googleBooksApiKey = env('GOOGLE_BOOKS_API_KEY'); // Agrega esta clave al archivo .env
    }

    public function searchview()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');

        // Buscar videos en YouTube
        $youtubeResponse = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $keywords,
            'type' => 'video',
            'maxResults' => 5,
            'key' => $this->youtubeApiKey,
        ]);

        $videos = $youtubeResponse->json();

        // Buscar libros en Google Books
        $booksResponse = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $keywords,
            'maxResults' => 5,
            'key' => $this->googleBooksApiKey,
        ]);

        $books = $booksResponse->json();

        // Pasar los resultados a la vista combinada
        return view('results', compact('videos', 'books', 'keywords'));
    }
}

