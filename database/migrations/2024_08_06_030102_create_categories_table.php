<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID de categoría
            $table->string('name'); // Nombre de la categoría
            $table->timestamps(); // Created_at y Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
