<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = ['*'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function nom()
    {
        return $this->belongsTo(Configuration::class);
    }
}
