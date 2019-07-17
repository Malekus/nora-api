<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Resources\Type as TypeResource;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $models = Type::paginate(15);
        return TypeResource::collection($models);
    }

    public function show($id)
    {
        $model = Type::findOrfail($id);
        return new TypeResource($model);
    }

    public function destroy($id)
    {
        $model = Type::findOrfail($id);

        if ($model->delete()) {
            return new TypeResource($model);
        }
    }

    public function store(StoreTypeRequest $request)
    {
        $model = $request->isMethod('put') ? Type::findOrFail($request->id) : new Type;
        $model->categorie()->associate(Categorie::find($request->get('categorie')));
        $model->nom()->associate($request->get('nom'));

        if ($model->save()) {
            return new TypeResource($model);
        }
    }
}
