<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Configuration;
use App\Phrase;
use Illuminate\Http\Request;
use App\Http\Resources\Categorie as CategorieResource;
use App\Http\Resources\Configuration as ConfigurationResource;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('home.index', array('categories' => CategorieResource::collection($categories)));
    }

    public function getPhrase(Request $request, $id)
    {
        $phrases = Phrase::where(["categorie_id" => $id])->get();
        return view('ajax.phrase', compact('phrases'));
    }

    public function addCategorie($categorie)
    {
        $config = Configuration::where(['categorie' => 'Catégorie', 'libelle' => $categorie])->get()->toArray();
        if (empty($config)) {
            $newConfig = Configuration::create(['categorie' => 'Catégorie', 'champ' => 'Nom', 'libelle' => $categorie]);
            $newCategorie = Categorie::create(['nom_id' => $newConfig->id]);
            return new CategorieResource($newCategorie);
        }

    }

    public function deleteCategorie($categorie)
    {
        $config = Configuration::where(['categorie' => 'Catégorie', 'libelle' => $categorie]);
        if ($config->delete()) {
            return "True";
        }
        return "False";

    }

    public function editCategorie($id, $categorie)
    {
        $config = Configuration::where(['id' => $id])->update(['libelle' => $categorie]);
        if ($config == 1) {
            return "True";
        }
        return "False";

    }

}
