<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['user_id','planta_id','tipo_unidad_producto','producto','tipo_precentacion','precentacion','categorias','cantidad_Producto'];
    protected $table = 'productos'; 
    public $timestamps = false;
}
