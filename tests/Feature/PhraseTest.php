<?php

namespace Tests\Feature;

use App\Http\Resources\Type;
use App\Phrase;
use App\Configuration;
use Tests\TestCase;

class PhraseTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get('/api/phrases');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $model = Phrase::all()->random();
        $response = $this->get('/api/phrase/' . $model->id);
        $response->assertStatus(200);
    }

    public function test_store_post()
    {
        $model = Phrase::all()->random();
        $response = $this->post('/api/phrase', ['type' => $model->id, 'texte' => "ceci est un test post !"]);
        $response->assertStatus(201);
    }


    public function test_store_put()
    {
        $model = Phrase::all()->last();
        $response = $this->put('/api/phrase/' . $model->id, ['type' => $model->type, 'texte' => 'ceci est un test put method']);
        $response->assertStatus(200);
    }
    public function test_destroy()
    {
        $model = Phrase::all()->last();
        $response = $this->delete('/api/phrase/' . $model->id);
        $response->assertStatus(200);
        $response = $this->get('/api/phrase/' . $model->id);
        $response->assertStatus(404);
    }


}
