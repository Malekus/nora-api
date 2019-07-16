<?php

use App\Configuration;
use Faker\Generator as Faker;

$factory->define(Configuration::class, function (Faker $faker) {
    return [
        'categorie' => $faker->word,
        'champ' => $faker->word,
        'libelle' => $faker->word,
    ];
});
