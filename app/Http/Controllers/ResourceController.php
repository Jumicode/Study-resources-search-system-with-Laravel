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
        $videos = [];
        $books = [];
        $researchPapers = [];
        $courses = [];


        // Búsqueda de videos en YouTube
        $youtubeResponse = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $keywords,
            'type' => 'video',
            'maxResults' => 10,
            'key' => env('YOUTUBE_API_KEY'),
        ]);
        $videos = $youtubeResponse->json();

        // Búsqueda de libros en Google Books
        $booksResponse = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => $keywords,
            'maxResults' => 10,
            'key' => env('GOOGLE_BOOKS_API_KEY'),
        ]);
        $books = $booksResponse->json();

        // Búsqueda de investigaciones académicas en OpenAlex
        $openAlexResponse = Http::get('https://api.openalex.org/works', [
            'search' => $keywords,
            'per-page' => 10,
        ]);
        $researchPapers = $openAlexResponse->json();

        $udemyClientId = config('services.udemy.client_id');
        $udemyClientSecret = config('services.udemy.client_secret');
        $udemyBaseUrl = config('services.udemy.base_url');


        $coursesResponse = Http::withBasicAuth($udemyClientId, $udemyClientSecret)
        ->get("{$udemyBaseUrl}courses/", [
            'search' => $keywords,
            'page_size' => 10,
        ]);
    $coursesData = $coursesResponse->json();

    // Construir URLs completas
    if (isset($coursesData['results'])) {
        foreach ($coursesData['results'] as &$course) {
            $course['url'] = 'https://www.udemy.com' . $course['url'];
        }
    }

    $courses = $coursesData;
        return view('results', compact('videos', 'books', 'researchPapers', 'courses', 'keywords'));
    }
}

