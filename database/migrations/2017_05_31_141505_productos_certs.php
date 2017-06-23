<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductosCerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('productos', function(Blueprint $table){
         $table->increments('id')->unsigned();
         $table->integer('user_id')->unsigned();
         $table->integer('planta_id')->unsigned();
         $table->string('producto',100);
         $table->enum('tipo_precentacion',['conserva','frescos','congelados','desidratados','granos','otros']);
         $table->string('tcategoria',100);
         $table->enum('categorias',['frutas','verduras','hidrobiologicos']);
         $table->double('cantidad_Producto', 15, 2);
         $table->enum('tipo_unidad_producto',['toneladas','kilos','libras','gramos','litros']);
         $table->foreign('user_id')->references('id')->on('users');
         $table->foreign('planta_id')->references('id')->on('plantas');
         $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('productos');
    }
}
