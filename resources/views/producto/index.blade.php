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
            <th>Nombre de producto</th>
            <th>Tipo de categoria</th>
            <th>Tipo de Precentacion</th>
            <th>Operaciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $x)
          <tr>
            <td>{{$x ->producto}}</td>
            <td>{{$x ->tcategoria}}</td>
            <td>{{$x ->tipo_precentacion}}</td>
          <td>
                <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">Detalle</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Editar</button>
                <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Eliminar</button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <input type="hidden" name="hidden_view" id="hidden_view" value="{{ url('producto/show') }}">
      <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{ url('producto/delete') }}">
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
              <h4 class="modal-title">Añadir Prodcuto</h4>
            </div>
            <div class="modal-body">
              <form action="{{ url('producto/store') }}" method="post">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="last_name">Tipo de unidad del producto:</label>
                    <select class="form-control" id="last_name" name="tuproducto" >
                      <option value="toneladas">Toneladas</option>
                      <option value="kilos">kilos</option>
                      <option value="libras">Libras</option>
                      <option value="gramos">Gramos</option>
                      <option value="litros">Litros</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="first_name">Producto:</label>
                    <input type="text" class="form-control" id="first_name" name="producto">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Tipo de precentacion:</label>
                    <select class="form-control" id="last_name" name="tprecentacion" >
                      <option value="conserva">Conserva</option>
                      <option value="frescos">Frescos</option>
                      <option value="congelados">Congelados</option>
                      <option value="deshidratados">Deshidratados</option>
                      <option value="granos">Granos</option>
                      <option value="otros">otros</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="last_name">Tipo de categorias:</label>
                <select class="form-control" id="last_name" name="tcategoria" >
                      <option value="puré">Puré</option>
                      <option value="liofilizados">Liofilizados</option>
    
                  </select>                 
                  </div>
                  <div  class="form-group">
                <label for="last_name">Categorias:</label>
                    <select class="form-control" id="last_name" name="categoria" >
                      <option value="frutas">Frutas</option>
                      <option value="verduras">Verduras</option>
                      <option value="hidrobiologicos">Hidrobiologicos</option>
                      <option value="otros">Otros</option>
                  </select>
                </div>
          
                <div  class="form-group">
                  <label for="email">Cantidad de Producto:</label>
                  <input type="text" class="form-control" name="cproducto">
                  <input type="hidden" class="form-control" value="{{$_GET['$id_prod']}}" name="id_prod">
                  <input type="hidden" class="form-control" value="{{$_GET['$user_id']}}" name="user_id">

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
              <h4 class="modal-title">Detalle del producto</h4>
            </div>
            <div class="modal-body lead text-uppercase">
              <p><b>Tipo de unidad del producto: </b><span id="show_tuproducto" class="text-danger "></span></p>
              <p><b>Producto: </b><span id="show_producto" class="text-danger"></span></p>
              <p><b>Tipo de precentacion: </b><span id="show_tprecentacion" class="text-danger"></span></p>
              <p><b>Tipo de categoria: </b><span id="show_tcategoria" class="text-danger"></span></p>
              <p><b>Categoria: </b><span id="show_categorias" class="text-danger"></span></p>
              <p><b>Cantidad segun unidad: </b><span id="show_cantidad_Producto" class="text-danger"></span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
              <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
              <form action="{{ url('producto/update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                   <div class="form-group">
                    <label for="tuproducto">Tipo de producto:</label>
                    <input type="text" class="form-control" id="tuproducto" name="tuproducto">
                  </div>
                  <div class="form-group">
                    <label for="producto">Producto:</label>
                    <input type="text" class="form-control" id="producto" name="producto">
                  </div>
                   <div class="form-group">
                  <label for="tprecentacion">Tipo de precentacion:</label>
                  <input type="text" class="form-control" id="tprecentacion" name="tprecentacion">
                </div>  
                <div class="form-group">
                  <label for="tcategoria">Tipo de categoria:</label>
                  <input type="text" class="form-control" id="tcategoria" name="tcategoria">
                </div>  
                  <div class="form-group">
                    <label for="categorias">Categorias:</label>
                    <input type="text" class="form-control" id="categorias" name="categorias">
                  </div>
                      <div class="form-group">
                    <label for="cproducto">Cantidad:</label>
                    <input type="text" class="form-control" id="cproducto" name="cproducto">                   
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
                  $("#show_tuproducto").text(result.tipo_unidad_producto);
                  $("#show_producto").text(result.producto);
                  $("#show_tprecentacion").text(result.tipo_precentacion);
                  $("#show_tcategoria").text(result.tcategoria);
                  $("#show_categorias").text(result.categorias);
                  $("#show_cantidad_Producto").text(result.cantidad_Producto);
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
                  $("#tuproducto").val(result.tipo_unidad_producto);
                  $("#producto").val(result.producto);
                  $("#tprecentacion").val(result.tipo_precentacion);
                  $("#tcategoria").val(result.tcategoria);
                  $("#categorias").val(result.categorias);
                  $("#cproducto").val(result.cantidad_Producto);
         
           
           
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