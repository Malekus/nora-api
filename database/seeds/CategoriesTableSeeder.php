<?php

use App\Configuration;
use App\Categorie;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $configurations = Configuration::where(['categorie' => 'Catégorie', 'champ' => 'Nom'])->get();
        foreach ($configurations as $configuration) {
            Categorie::create(['nom_id' => $configuration->id]);
        }
    }
}
