<?php

namespace Tests\Feature;

use App\Configuration;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get('/api/configurations');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $model = Configuration::all()->random();
        $response = $this->get('/api/configuration/' . $model->id);
        $response->assertStatus(200);
    }

    public function test_store_post()
    {
        $response = $this->post('/api/configuration', ['categorie' => 'TestCategorie', 'champ' => 'TestChamp', 'libelle' => 'TestLibelle']);
        $response->assertStatus(201);
        $this->assertEquals($response->json()["data"]["categorie"], "TestCategorie");
        $this->assertEquals($response->json()["data"]["champ"], "TestChamp");
        $this->assertEquals($response->json()["data"]["libelle"], "TestLibelle");

    }

    public function test_store_put()
    {
        $model = Configuration::all()->last();
        $response = $this->put('/api/configuration/' . $model->id, ['categorie' => 'TestCategoriefdcd', 'champ' => 'TestChampdedede', 'libelle' => 'TestLibelledededed']);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["categorie"], "TestCategoriefdcd");
        $this->assertEquals($response->json()["data"]["champ"], "TestChampdedede");
        $this->assertEquals($response->json()["data"]["libelle"], "TestLibelledededed");
    }

    public function test_destroy()
    {
        $model = Configuration::all()->last();
        $response = $this->delete('/api/configuration/' . $model->id);
        $response->assertStatus(200);
        $response = $this->get('/api/configuration/' . $model->id);
        $response->assertStatus(404);
    }

}
