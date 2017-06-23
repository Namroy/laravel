<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
     {!!Html::style('css/bootstrap.min.css')!!}
     {!!Html::style('css/metisMenu.min.css')!!}
     {!!Html::style('css/sb-admin-2.css')!!}
     {!!Html::style('css/font-awesome.min.css')!!}
     {!!Html::style('css/mystyle.css')!!}
</head>

<body>

    <div id="wrapper">
            
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/laravel/public/"><img src="img/certincal.png" id="logo" alt=""></a>                
            </div>
            <ul class="nav navbar-top-links navbar-right">
                   @if(Auth::check())Holla, {{ Auth::user()->name }}@endif
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/laravel/public/perfil"><i class='fa fa-plus fa-fw'></i> Datos de perfil</a>
                                </li>
                                <li>
                                    <!--a href="#"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a-->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cloud"></i> Certificaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="laravel/public/"><i class='fa fa-plus fa-fw'></i>Lista de plantas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-cloud-download"></i> Descargas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

     </nav>
        <div id="page-wrapper">
         <div class="lineheder container-fluid">
            @section('sidebar')
           
            @show
            
         </div>
            @yield('content')
        </div>

    </div>

        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/bootstrap.min.js')!!}
        {!!Html::script('js/metisMenu.min.js')!!}
        {!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>