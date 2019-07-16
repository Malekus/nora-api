<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = ['*'];

    public function nom()
    {
        return $this->belongsTo(Configuration::class);
    }
}
