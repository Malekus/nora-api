<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Phrase;
use Illuminate\Http\Request;
use App\Http\Resources\Categorie as CategorieResource;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('home.index', array('categories' => CategorieResource::collection($categories)));
    }

    public function getPhrase(Request $request, $id) {
        $phrases = Phrase::where(["categorie_id" => $id])->get();
        return view('ajax.phrase', compact('phrases'));
    }
}
