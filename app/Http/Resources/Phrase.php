<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Phrase extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categorie' => new Categorie($this->categorie),
            'texte' => $this->texte
        ];
    }
}
