<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Resources\Categorie as CategorieResource;

class CategorieController extends Controller
{
    public function index()
    {
        $models = Categorie::paginate(15);
        return CategorieResource::collection($models);
    }

    public function show($id)
    {
        $model = Categorie::findOrfail($id);
        return new CategorieResource($model);
    }

    public function destroy($id)
    {
        $model = Categorie::findOrfail($id);

        if ($model->delete()) {
            return new CategorieResource($model);
        }

    }

    public function store(StoreCategorieRequest $request)
    {
        $model = $request->isMethod('put') ? Categorie::findOrFail($request->id) : new Categorie;
        $model->nom()->associate($request->get('nom'));

        if ($model->save()) {
            return new CategorieResource($model);
        }
    }
}
