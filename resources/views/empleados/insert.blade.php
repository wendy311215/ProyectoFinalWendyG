<!--heredar la masterpage en esta vista-->
@extends('layouts.master')

@section('estilos-particulares')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('j-deps')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(document).ready ( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
  </script>
@endsection

<!--inicio form de las vistas-->
			<!--form name-->
			<div class="main-panel">
                <div class="content-wrapper">
                  <section class="row mt-5">
                    <div class="col-12 grid-margin">
					 <div class="table" style="background-color: #D6F8FF;">
					  <div class="card-body">
						<h4 class="card-title">Nuevo Empleado</h4>
@section('Contenido_vistas')
<form action="{{url('empleados')}} " method="post">
	@csrf 
	@if(session("mensaje"))
    <p class="alert-success">{{ session("mensaje")   }}</p>
	@endif
	<fieldset>
	
	<!--form name-->
    <!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Nombre</label>
		<div class="col-md-12">
		<input id="textinput" name="nombre" type="text"  class="form-control">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Apellido</label>
		<div class="col-md-12">
		<input id="textinput" name="apellido" type="text"  class="form-control ">
		</div>
	</div>
	
	<!--select basic-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="selectbasic">Jefe Directo</label>
		<div class="col-md-12">
		<select id="selectbasic" name="jefe"  class="form-control">
		<!--recorrer los jefes-->
		@foreach($jefes as $j)
		      <option value="{{ $j->EmployeeId }}"> {{ $j->LastName }}  ,  {{ $j->FirstName }} </option>
		@endforeach
		</select>
		</div>
	</div>
	<!--select basic-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="selectbasic">Cargo</label>
		<div class="col-md-12">
		<select id="selectbasic" name="cargo"  class=" form-control">
		<!--recorrer los cargos-->
		@foreach($cargos as $c)
		      <option> {{ $c->Title }} </option>
		@endforeach
		</select>
		</div>
	</div>
	<!--date-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="">Fecha De Nacimiento</label>
		<div class="col-md-12">
		<input id="datepicker" name="nacimiento"  class="datepicker form-control input-md">
		</div>
	</div>
	<!--date-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="">Fecha De Contratación</label>
		<div class="col-md-12">
		<input id="date" name="contrato"  class="datepicker form-control input-md">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Email</label>
		<div class="col-md-12">
		<input id="email" name="Email" type="text"  class=" form-control">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Dirección</label>
		<div class="col-md-12">
		<input id="textinput" name="direccion" type="text" placeholder="" class="form-control ">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Ciudad</label>
		<div class="col-md-12">
		<input id="textinput" name="ciudad" type="text" placeholder="" class="form-control ">
		</div>
	</div>
    <!--button-->
        <div class="form-group">
         <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
			<button type="submit" id="" name="" class="btn btn-primary">Enviar</button>
            </div>
        </div>
			</form>
        </div>
</section>
	</div>
</div>
</fieldset>
<!--fin de la vista-->
@endsection