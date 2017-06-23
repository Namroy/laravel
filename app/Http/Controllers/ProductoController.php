<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use App\Producto;
use App\Planta;
use App\User;

    class ProductoController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
            $data = Producto::all();
            return view('producto.index')->with('data',$data);
	    }
 
        /*
         * Add Planta data
         */
        public function store(Request $request)
        {
            $data = new Producto;
            $data -> user_id = $request-> user_id;
            $data -> planta_id = $request-> id_prod;
            $data -> tipo_unidad_producto = $request -> tuproducto;
            $data -> producto = $request -> producto;
            $data -> tipo_precentacion = $request -> tprecentacion;
            $data -> tcategoria = $request -> tcategoria;
            $data -> categorias = $request -> categoria;
            $data -> cantidad_Producto = $request -> cproducto;
           
          
            $data -> save();
            return back()
                    ->with('success','El registro se agregó correctamente.');
        }
 
        /*
         * View data
         */
        public function show(Request $request)
        {
            if($request->ajax()){
                $id = $request->id;
                $info = Producto::find($id);
                //echo json_decode($info);
                return response()->json($info);
            }
        }
 
        /*
        *   Update data
        */
        public function update(Request $request)
        {
            $id = $request -> edit_id;
            $data = Producto::find($id);
             $data = Planta::find($id);
            $data -> user_id = 1;
            $data -> planta_id = 1;
            $data -> tipo_unidad_producto = $request -> tuproducto;
            $data -> producto = $request -> producto;
            $data -> tipo_precentacion = $request -> tprecentacion;
            $data -> tcategoria = $request -> tcategoria;
            $data -> categorias = $request -> categorias;
            $data -> cantidad_Producto = $request -> cproducto;
            $data -> save();
            return back()
                    ->with('success','Registro actualizado correctamente.');
        }
 
        /*
        *   Delete record
        */
        public function delete(Request $request)
        {
            $id = $request -> id;
            $data = Producto::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }

