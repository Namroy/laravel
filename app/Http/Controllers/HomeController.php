<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Planta;
    class HomeController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
            $data = Planta::all();
            return view('home')->with('data',$data);
	    }
 
        /*
         * Add Planta data
         */
        public function add(Request $request)
        {
            $data = new Planta;
            $data -> user_id = 1;
            $data -> nombre_planta = $request -> first_name;
            $data -> rubro = $request -> last_name;
            $data -> ubicacion = $request -> email;
            $data -> save();
            return back()
                    ->with('success','El registro se agregó correctamente.');
        }
 
        /*
         * View data
         */
        public function view(Request $request)
        {
            if($request->ajax()){
                $id = $request->id;
                $info = Planta::find($id);
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
            $data = Planta::find($id);
            $data -> nombre_planta = $request -> edit_first_name;
            $data -> rubro = $request -> edit_last_name;
            $data -> ubicacion = $request -> edit_email;
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
            $data = Planta::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }

