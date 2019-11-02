<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nom_id'];

    public function nom()
    {
        return $this->belongsTo(Configuration::class);
    }
}
