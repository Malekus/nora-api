<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Type extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categorie' => $this->categorie,
            'nom' => $this->nom
        ];
    }
}
