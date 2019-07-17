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
        $model = Type::all()->random();
        $response = $this->get('/api/type/' . $model->id);
        $response->assertStatus(200);
    }

    public function test_store_post()
    {
        $model = Type::all()->last();
        $response = $this->delete('/api/type/' . $model->id);
        $response->assertStatus(200);
        $response1 = $this->post('/api/type', ['categorie' => $model->categorie->id, 'nom' => $model->nom->id]);
        $response1->assertStatus(201);
    }

}
