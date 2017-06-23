<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use App\Perfil;
use App\User;

class PerfilController extends Controller
{
  public function store(Request $request)
   {
    $estado = Perfil::count();
    \App\perfil::create([
      'user_id'=>1,
      'nombre_empresa'=>$request['name_company'],
      'telefono_empresa'=>$request['phone_company'],
      'celular_empresa'=>$request['cellphone'],
      'ruc_empresa'=>$request['ruc'],
      'direccion'=>$request['address'],
    ]);
    return redirect()->route('perfil.index', ['estado' => $estado]);
    
   }
    
  public function index()
  {
  $perfil = Perfil::all();
  $estado = Perfil::count();
  return view('perfil.index')->with('perfil',$perfil)->with('estado',$estado);  
  }

  public function create()
    {
    return "Usuario registrado";
    }

    public function show()
    {
    return "Usuario registrado";
    }

    public function update(Request $request)
    {
      //
    }

    public function delete(Request $request)
    {
        //
    }

}
