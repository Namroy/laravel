@extends('layouts.admin')
@section('content')
  <div class="container-fluid">
    <h2>planta operations in Laravel 5.3</h2>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
	
    @if(Auth::Check())
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Añade</button>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre de planta</th>
          <th>Rubro</th>
          <th>Ubicación</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $x)
        <tr>
          <td>{{$x -> nombre_planta}}</td>
          <td>{{$x -> rubro}}</td>
          <td>{{$x -> ubicacion}}</td>
        <td>
              <a href="laravel/public/producto/?$id_prod={{$x -> id}}&$user_id={{$x ->user_id}}" class="btn btn-primary"  onclick="">Productos Asociados</a>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Editar</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Eliminar</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/delete')}}">
    @endif(Auth::gest())
   <!-- Add Modal start -->
         @if(Auth::guest())
              <a href="/laravel/public/login" class="btn btn-info btn-login"> Tu necesitas Iniciar sesión</a>
              <br><br><br>
                <div class="background"></div>
            @endif
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Añadir Planta</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/add') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="first_name">Nombre de planta:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                  <label for="last_name">Rubro:</label>
                  <select class="form-control" id="last_name" name="last_name" >
                    <option value="Alimentos">Alimentos</option>
                    <option value="hosteleria">Hosteleria</option>
                    <option value="operador turistico">Operador turistico</option>
                </select>
                </div>
                <label for="email">Ubicación</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              
              <button type="submit" class="btn btn-success">Guardar</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->

    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View</h4>
          </div>
          <div class="modal-body">
            <p><b>First Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>Last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>Email : </b><span id="view_email" class="text-success">bhaskar.panja@quadone.com</span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- view modal ends -->

    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar planta</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/update') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="edit_first_name">Nombre de planta:</label>
                  <input type="text" class="form-control" id="edit_first_name" name="edit_first_name">
                </div>
                <div class="form-group">
                  <label for="edit_last_name">Rubro:</label>
                  <input type="text" class="form-control" id="edit_last_name" name="edit_last_name">
                </div>
                <label for="edit_email">Ubicación:</label>
                <input type="text" class="form-control" id="edit_email" name="edit_email">
              </div>
              
              <button type="submit" class="btn btn-success">Actualizar</button>
              <input type="hidden" id="edit_id" name="edit_id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          
        </div>
        
      </div>
    </div>
    <!-- Edit code ends -->
  </div>
  <script type="text/javascript">
    function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
          $("#view_fname").text(result.nombre_planta);
          $("#view_lname").text(result.rubro);
          $("#view_email").text(result.ubicacion);
        }
      });
    }

    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
          $("#edit_id").val(result.id);
          $("#edit_first_name").val(result.nombre_planta);
          $("#edit_last_name").val(result.rubro);
          $("#edit_email").val(result.ubicacion);
        },
        error : function(xhr, result) {
        alert('Disculpe, existió un problema');
    }
      });
    }

    function fun_delete(id)
    {
      var conf = confirm("Are you sure want to delete??");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }


  </script>
@endsection