<?php

use App\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    public function run()
    {
        Configuration::create(['categorie' => 'Catégorie', 'champ' => 'Nom', 'libelle' => 'Education']);
        Configuration::create(['categorie' => 'Catégorie', 'champ' => 'Nom', 'libelle' => 'Violence']);
        Configuration::create(['categorie' => 'Catégorie', 'champ' => 'Nom', 'libelle' => 'Administration']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Exclusion']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Paperasse']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Pénal']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Renseignement']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Orientation']);
        Configuration::create(['categorie' => 'Type', 'champ' => 'Nom', 'libelle' => 'Information']);
    }
}
