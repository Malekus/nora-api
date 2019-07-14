<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{

    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id')->unsigned()->index();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('nom_id')->unsigned()->index();
            $table->foreign('nom_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['categorie_id', 'nom_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
