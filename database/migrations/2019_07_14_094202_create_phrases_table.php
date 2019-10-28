<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhrasesTable extends Migration
{

    public function up()
    {
        Schema::create('phrases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id')->unsigned()->index();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('texte');
            $table->timestamps();
            $table->unique(['categorie_id', 'texte']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('phrases');
    }
}
