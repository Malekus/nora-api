<?php

namespace App\Http\Controllers;

use App\Phrase;
use App\Categorie;
use App\Http\Requests\StorePhraseRequest;
use App\Http\Resources\Phrase as PhraseResource;
use App\Http\Resources\Categorie as CategorieResource;

class PhraseController extends Controller
{
    public function index()
    {
        $models = Phrase::all();
        $categories = Categorie::all();
        return array(CategorieResource::collection($categories), PhraseResource::collection($models));
    }

    public function show($id)
    {
        $model = Phrase::findOrfail($id);
        return new PhraseResource($model);
    }

    public function destroy($id)
    {
        $model = Phrase::findOrfail($id);

        if ($model->delete()) {
            return new PhraseResource($model);
        }

    }

    public function store(StorePhraseRequest $request)
    {
        $model = $request->isMethod('put') ? Phrase::findOrFail($request->id) : new Phrase;
        $model->categorie()->associate($request->get('categorie'));
        $model->texte = $request->get('texte');

        if ($model->save()) {
            return new PhraseResource($model);
        }
    }
}
