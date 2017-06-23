<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Perfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('perfil', function(Blueprint $table){
         $table->increments('id')->unsigned();
         $table->integer('user_id')->unsigned();
         $table->string('telefono_empresa',100);
         $table->string('celular_empresa',100);
         $table->string('nombre_empresa',100);
         $table->string('ruc_empresa',100);
         $table->string('direccion',500);
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
      Schema::dropIfExists('perfil');
    }
}
