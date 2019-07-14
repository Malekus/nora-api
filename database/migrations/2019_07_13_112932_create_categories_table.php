<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nom_id')->unsigned()->index();
            $table->foreign('nom_id')->references('id')->on('configurations')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['id', 'nom_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
