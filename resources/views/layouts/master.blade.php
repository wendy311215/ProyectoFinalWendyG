<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PROYECTO ADSI</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <!--yield para colocar la hoja estilo particulas-->
  @yield('estilos-particulares')

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <!--yield para librerias particulares-->
  @yield('j-deps')
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <!--libreria iconos-->
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-meteor">MigosR</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{  url('empleados/') }}">Lista Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('artistas/') }}">Lista Artistas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
        @yield('Contenido_vistas')
    </div>
  </div>

  

</body>

</html>
