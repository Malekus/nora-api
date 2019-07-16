<?php

namespace Tests\Feature;

use App\Categorie;
use App\Configuration;
use Tests\TestCase;

class CategorieTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $model = Categorie::all()->random();
        $response = $this->get('/api/categorie/' . $model->id);
        $response->assertStatus(200);
    }

    public function test_store_post()
    {
        $response = $this->post('/api/categorie', ['nom' => Configuration::where(['categorie' => 'Catégorie','champ' => 'Nom'])->first()->id]);
        $response->assertStatus(201);
    }


    public function test_store_put()
    {
        $model = Categorie::all()->last();
        $response = $this->put('/api/categorie/' . $model->id, ['nom' => $model->id + 1]);
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $model = Categorie::all()->last();
        $response = $this->delete('/api/categorie/' . $model->id);
        $response->assertStatus(200);
        $response = $this->get('/api/categorie/' . $model->id);
        $response->assertStatus(404);
    }


}
