<?php

use App\Categorie;
use App\Configuration;
use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    public function run()
    {
        $categories = Categorie::all();
        $configurations = Configuration::where(['categorie' => 'Type', 'champ' => 'Nom'])->get();
        foreach ($configurations as $configuration) {
            foreach ($categories as $categorie) {
                Type::create(['categorie_id' => $categorie->id, 'nom_id' => $configuration->id]);
            }
        }
    }
}
