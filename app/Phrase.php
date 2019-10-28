<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $table = 'phrases';

    protected $fillable = ['*'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
