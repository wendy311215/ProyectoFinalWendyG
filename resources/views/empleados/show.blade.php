<!--heredar la masterpage en esta vista-->
@extends('layouts.master')

<!--contenido de las vistas-->
@section('Contenido_vistas')

<html>
  <body>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <h5 class="card-header">
                Informacion del Empleado
              </h5>
              <div class="card-body">
                <p class="card-text">
                <h5 class="card-text">{{ $empleado->FirtsName}} {{ $empleado->LastName }}</h5>
              </p></div>
                <div class="card-body">
                    <h1 class="card-text">Cargo: {{ $empleado->Title }}</h1>
                    <ul class="list-group list-group-flush">
                    @if($empleado->jefe_directo)
                      <li class="list-group-item"> Jefe Directo:
                      {{ $empleado->jefe_directo->FirstName }}
                      {{ $empleado->jefe_directo->LastName }}
                      </li>
                      @else
                      <h2 class="text-danger">No tiene Jefe directo</h2>
                      @endif
                </p>
              </div>
              <div class="card-footer">
                <li class="list-group-item">
                          Direccion: {{ $empleado->Address }} , {{ $empleado->City}}, {{ $empleado->Country }}
                      <li class="list-group-item">
                          Fecha Nacimietno: {{ $empleado->BirthDate->toFormattedDateString() }}  
                      <li class="list-group-item">
                          Fecha Contratacion: {{ $empleado->HireDate->toFormattedDateString() }}   
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">Subalternos</a>
              <div class="list-group-item">
                <br>
                  @if($empleado->subalternos->count() !==0)
                <h2 clas="text-success"></h2>
                <ul class="list-group list-group-flush">
                    @foreach( $empleado->subalternos as $subalterno)
                    <li class="list-group-item"> {{ $subalterno->FirstName }} , {{ $subalterno->LastName }}</li> 

                    @endforeach

                </ul>
                @else
                <h2 class="text-danger">No tiene Subalternos</h2>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <h2 clas="text-success"> clientes: </h2>
                  @if($empleado->clientes->count() !==0)

                  <ul class="list-group list-group-flush">
                      @foreach( $empleado->clientes as $cliente)
                      <li class="list-group-item"> {{ $cliente->FirstName }} , {{ $cliente->LastName }}</li> 

                      @endforeach

                  </ul>
                  @else
                  <h2 class="text-danger">No tiene Clientes</h2>
                  @endif
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

          <script src="js/jquery.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/scripts.js"></script>
        </body>
      </html>
      @endsection