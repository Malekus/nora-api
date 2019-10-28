<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            ConfigurationsTableSeeder::class,
            CategoriesTableSeeder::class,
            PhrasesTableSeeder::class,
        ]);
    }
}
