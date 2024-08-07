<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID del producto
            $table->string('name'); // Nombre del producto
            $table->decimal('cost', 8, 2); // Costo del producto
            $table->unsignedBigInteger('id_category'); // ID de la categoría
            $table->string('status'); // Estado del producto
            $table->date('date'); // Fecha del producto
            $table->text('description')->nullable(); // Descripción del producto
            $table->integer('quantity'); // Cantidad del producto
            $table->timestamps(); // Created_at y Updated_at

            // Clave foránea para la categoría
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['id_category']);
        });

        Schema::dropIfExists('products');
    }
}
