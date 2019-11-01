<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $table = 'phrases';

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
