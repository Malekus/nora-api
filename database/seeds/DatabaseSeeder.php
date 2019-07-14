<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            ConfigurationsTableSeeder::class,
            CategoriesTableSeeder::class,
            TypesTableSeeder::class,
            PhrasesTableSeeder::class,
        ]);
    }
}
