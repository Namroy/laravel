@extends('layouts.admin')
@section('title', 'Añadir Datos')
@section('sidebar')
    @parent
    <h1></h1>


@stop   
@section('content')
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    @if(Auth::check())
   
    @if($estado=='false')
    <div id="wrap">
      <div class="clear"></div>
        {!!Form::open(['url' => 'perfil'])!!}
       <div class="form-group row">
              {!!Form::label('Nombre de la empresa',null,['class'=>'col-2 col-form-label'])!!}
          <div class="col-10">
              {!!Form::text('name_company',null,['Class'=>'form-control'])!!}
          </div>
      </div>
         <div class="form-group row">
              {!!Form::label('Ruc de la empresa',null,['class'=>'col-2 col-form-label'])!!}
          <div class="col-10">
              {!!Form::text('ruc',null,['Class'=>'form-control'])!!}
          </div>
      </div>

       <div class="form-group row">
             {!!Form::label('Teléfono celular',null,['class'=>'col-2 col-form-label'])!!}
          <div class="col-10">
              {!!Form::text('cellphone',null,['Class'=>'form-control'])!!}
          </div>
      </div>
  
    
       <div class="form-group row">
              {!!Form::label('Teléfono de la empresa',null,['class'=>'col-2 col-form-label'])!!}
          <div class="col-10">
              {!!Form::text('phone_company',null,['Class'=>'form-control'])!!}
          </div>
      </div>
       <div class="form-group row">
              {!!Form::label('Dirección de la empresa',null,['class'=>'col-2 col-form-label'])!!}
          <div class="col-10">
              {!!Form::textarea('address',null,['Class'=>'form-control'])!!}
          </div>
      </div>
      {!!Form::submit('Guardar Datos',['Class'=>'form-control btn btn-primary'])!!}
         <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>AQUÍ INFORMACIÓN DEL PORQUE SUS DATOS SE RECOPILAN</strong>
      </div>
          </div>

    {!! Form::close() !!}

    @endif
 

    
    @if($estado<>'false')
        <div class="container-fluid">
        <h1>DATOS DE PERFIL</h1>
            <div class="content">
              <div class="panel panel-primary">
              <h2>&nbsp;&nbsp;PERFIL</h2>
                <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                                    
                    </tr>
                    
                    @foreach($perfil as $row)
                        <tr>
                        <td><strong>Nombre</strong></td>
                        <td>{{$row->nombre_empresa}}</td>
                        </tr>
                        <tr>
                        <td><strong>Teléfono Local</strong></td>
                        <td>{{$row->telefono_empresa}}</td>
                        </tr>
                        <tr>
                         <td><strong>Teléfono Celular</strong></td>
                        <td>{{$row->celular_empresa}}</td>
                        </tr>
                        <tr>
                         <td><strong>Numero de RUC</strong></td>
                        <td>{{$row->ruc_empresa}}</td>
                        </tr>
                        <tr>
                         <td><strong>Direccion</strong></td>
                        <td>{{$row->direccion}}</td>            
                        </tr>
                    @endforeach

            </table> 
            </div>
         </div>
       </div>
    </div>
    @endif
       @endif

    @if(Auth::guest())
      NO LOGEADO
    @endif

@endsection