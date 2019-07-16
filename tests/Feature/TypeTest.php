<?php

namespace Tests\Feature;

use App\Type;
use Tests\TestCase;

class TypeTest extends TestCase
{
    public function test_index()
    {
        $response = $this->get('/api/types');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $model = Type::all();
        $response = $this->delete('/api/type/' . $model[0]->id);
        $response->assertStatus(200);
        $response = $this->get('/api/type/99999');
        $response->assertStatus(404);
    }

    public function test_destroy()
    {
        $model = Type::all();
        $response = $this->get('/api/personne/' . $model->id);
        $response->assertStatus(200);
        $response = $this->get('/api/personne/99999');
        $response->assertStatus(404);
    }

    public function test_store_post()
    {
        // Creation d'une personne
        $response = $this->post('/api/personne', ['nom' => 'Test']);
        $response->assertStatus(201);
        // Creation d'une personne avec erreur de contrainte
        $response = $this->post('/api/personne', ['nom' => '']);
        $response->assertStatus(422);
    }

    public function test_store_put()
    {
        $model = factory(Personne::class)->create();
        // Update simple
        $response = $this->put('/api/personne/' . $model->id, ['nom' => "Tata"]);
        $response->assertStatus(200);
        $this->assertEquals($response->json()["data"]["nom"], "Tata");
        // Update avec erreur
        $response = $this->put('/api/personne/' . $model->id, ['nom' => ""]);
        $response->assertStatus(422);

    }
}
