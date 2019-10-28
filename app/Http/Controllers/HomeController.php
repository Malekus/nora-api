<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Resources\Categorie as CategorieResource;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('home.index', array('categories' => CategorieResource::collection($categories)));
    }
}
