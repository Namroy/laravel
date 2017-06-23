<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $fillable = ['user_id','nombre_planta','rubro','ubicacion'];
    protected $table = 'plantas'; 
    public $timestamps = false;
}
