<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{

    public function searchview()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
    
       // echo($keywords);
     
    }
    
}
