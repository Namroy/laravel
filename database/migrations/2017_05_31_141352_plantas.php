<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plantas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

     Schema::create('plantas', function(Blueprint $table){
         $table->increments('id')->unsigned();
         $table->integer('user_id')->unsigned();
         $table->string('nombre_planta',100);
         $table->enum('rubro',['alimentos','hosteleria','operador turistico']);
         $table->string('ubicacion',500);
         $table->foreign('user_id')->references('id')->on('users');
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
     Schema::dropIfExists('plantas');
    }
}
