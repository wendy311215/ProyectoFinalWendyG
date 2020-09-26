<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <form class="form-horizontal" method='POST' action="{{ url('artistas/store') }}">
    @csrf
        <fieldset>

        <!-- Form Name -->
        <legend>Nuevo Artista</legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Nombre Artista/Banda</label>  

         <div class="col-md-4">

         <input id="textinput" name="nombre_artista" type="text" placeholder="" class="form-control input-md">
         <strong class="bg-danger text-white m-5 p-3 rounded"> {{ $errors->first("nombre_artista")  }}  </strong>

         @error('nombre_artista')
              <div class="bg-danger text-white m-5 p-3 rounded">  {{$message}} </div>
              @enderror
     </div>
</div>

    <!-- Button -->
    <div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type="submit" id="" name="" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
<!--letrero de extito(solo va salir si hay redireccionaminto)-->
<!--¿Exite la variable de sesion?-->
<div class="container w-50 text-center">
@if( session("Exito"))
   <p class="bg-danger text-white m-5 p-3 rounded" > {{session("Exito")}}</p>
   <!--hay errores de validacion-->
    <!--@foreach($errors->all() as $error)
      <p class="bg-danger text-white m-5 p-3 rounded"> {{$error}} </p>
      @endforeach-->
   @endif-->
</form>
    
</body>
</html>