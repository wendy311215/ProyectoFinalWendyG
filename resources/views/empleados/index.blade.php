<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--libreria iconos-->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>
<body>
        <div class="main-panel">
                <div class="content-wrapper">
                  <section class="row mt-5">
                    <div class="col-12 grid-margin">
					 <div class="table" style="background-color: #D6F8FF;">
					  <div class="card-body">
                          
<h1><i class="fas fa-list-alt">Lista de Empleados</i></h1>

<a class="btn btn-dark" href="{{ url('empleados/create')  }}">
    Nuevo Empleado
</a>
@if(session("mensaje"))
    <p class="alert-success">{{ session("mensaje")   }}</p>
@endif

<table class="table table-bordered">
       <thead>
       <tr>
       <td>Nombre y Apellido</td>
       <td>Cargo</td>
       <td>Email</td>
       <td>Detalles</td>
       <td>Actualizar</td>
       </tr>
       </thead>
    <tbody>
    @foreach($empleados as $empleado)
      <tr>
          <td>{{ $empleado->FirstName}}
          <strong class="text-danger" >{{ $empleado->LastName}}</strong>
          </td>
          <td>{{ $empleado->Title }} </td>
          <td>{{ $empleado->Email }} </td>
          <td>
              <a href="{{ url('empleados/'.$empleado->EmployeeId)  }}" class="btn btn-success">Ver Detalles</a>
          </td>
          <td>
              <a href="{{ url('empleados/'.$empleado->EmployeeId.'/edit' )  }}" 
              class="btn btn-info">
              Actualizar
              </a>
          </td>
    @endforeach
    </tbody>
    </table>
    <!--TODO:poner el paginardor -->
    {{ $empleados->links()  }}
</body>
</html>