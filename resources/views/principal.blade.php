  <!DOCTYPE html>
 <html lang="es">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>:: Sistema ::</title>
  {!! Html::style('assets/css/bootstrap.min.css') !!}
  <style>
    .dashboard {
      width: 100%;
      height: 85vh;
    }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Desplegar Navegacion</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistema de Seg. de Ventas y Clientes</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- Items  -->
            @foreach ($roles as $role)
              @if (strcasecmp($role->name, 'administrador') == 0) 
                  @include('roles.administrador');
              @elseif (strcasecmp($role->name, 'vendedor') == 0) 
                  <?php $data = ['roles' => $roles] ?>
                  @include('roles.vendedor', $data);
              @else
                  <?php $data = ['roles' => $roles] ?>
                  @include('roles.telemarketing', $data);
              @endif
            @endforeach
          </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Roles <span class="caret"></span></a>
              <ul class="dropdown-menu">
                   @foreach($roles as $role)
                    <li><a href="role/'{{$role->name}}">{{ $role->name }}</a></li>
                  @endforeach
              </ul>
            </li>
            <li><a href="/auth/logout">Cerrar Sesion</a></li>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
  <div class="container-fluid dashboard">
    @section('content')
    @show
  </div>
  {!! Html::script('assets/js/jquery.js') !!}
  {!! Html::script('assets/js/bootstrap.min.js') !!}
  @section('script')
  @show
 </body>
 </html>