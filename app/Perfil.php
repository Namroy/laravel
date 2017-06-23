<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
protected $fillable = ['user_id','telefono_empresa','celular_empresa','nombre_empresa','ruc_empresa','direccion'];
  protected $table = 'perfil'; 
  public $timestamps = false;
}
