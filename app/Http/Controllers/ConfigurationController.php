<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests\StoreConfigurationRequest;
use App\Http\Resources\Configuration as ConfigurationResource;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::paginate(15);
        return ConfigurationResource::collection($configurations);
    }

    public function show($id)
    {
        $configuration = Configuration::findOrfail($id);
        return new ConfigurationResource($configuration);
    }

    public function destroy($id)
    {
        $configuration = Configuration::findOrfail($id);

        if ($configuration->delete()) {
            return new ConfigurationResource($configuration);
        }

    }

    public function store(StoreConfigurationRequest $request)
    {
        $configuration = $request->isMethod('put') ? Configuration::findOrFail($request->id) : new Configuration;
        $configuration->categorie = $request->get('categorie');
        $configuration->champ = $request->get('champ');
        $configuration->libelle = $request->get('libelle');

        if ($configuration->save()) {
            return new ConfigurationResource($configuration);
        }
    }
}
