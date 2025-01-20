<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResourceController extends Controller
{
    private $youtubeApiKey;

    public function __construct()
    {
        $this->youtubeApiKey = env('YOUTUBE_API_KEY');
    }

    public function searchview()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');

        // Hacer una solicitud a la API de YouTube
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $keywords,
            'type' => 'video',
            'maxResults' => 20,
            'key' => $this->youtubeApiKey,
        ]);

        // Decodificar la respuesta JSON
        $videos = $response->json();

        // Pasar los resultados a una vista
        return view('results', compact('videos', 'keywords'));
    }
}
