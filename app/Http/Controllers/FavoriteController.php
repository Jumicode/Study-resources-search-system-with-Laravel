<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $request)
    {
        // Guardar en la base de datos con los campos adicionales
        Favorite::create([
            'user_id' => Auth::id(),
            'title'   => $request->input('title'),
            'url'     => $request->input('url'),
            'type'    => $request->input('type'),
            'cover'   => $request->input('cover'), // Puede ser nulo en caso de investigaciones
        ]);

        return redirect()->route('favorites.list')->with('success','Agregado a favoritos');
    }

    public function showFavorites()
    {
        $favorites = Favorite::where('user_id', Auth::id())->get();
        return view('favorites', compact('favorites'));
    }
}
