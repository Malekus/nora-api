<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Categorie extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => new Configuration($this->nom)
        ];
    }
}

