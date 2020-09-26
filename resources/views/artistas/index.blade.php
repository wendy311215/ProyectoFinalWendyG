<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Artistas</title>
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

    <h1><i class="fas fa-list-alt">Lista de Artistas</i></h1>

    <a class="btn btn-dark" href="{{ url('artistas/create')  }}">
    Nuevo Artista
    </a>
    <table>
       <thead>
         <tr>
            <th>Artista(Grupo)</th>
            <th>Albumes </th>
            </tr>
            </thead>
            <tbody>
              @foreach($artistas as $artista)
              <!--Aqui muestro cada artista -->
              <tr>
                 <td>{{ $artista->Name  }}</td>
                 <td>
                     <ul>
                     @foreach($artista->albumes()->get() as $album  )

                     @endforeach
                     <li> {{$album->Title}} </li> 
                     
                     </ul>
                     </td>
                 </tr>
                 </form>
              @endforeach
              </tbody>
              </table>
              </body>
              </html>