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
<div class="main-panel">
                <div class="content-wrapper">
                  <section class="row mt-5">
                    <div class="col-12 grid-margin">
                <div class="table" style="background-color: #D6F8FF;">
                  <div class="card-body">
                    <h4 class="card-title">Actualizar Empleado: {{ $empleado->FirstName }} , {{  $empleado->LastName }}</h4>
@section('Contenido_vistas')
<form class="form-horizontal"  method="post" action="{{  url('empleados/'.$empleado->EmployeeId ) }}">
@method('PUT')
@csrf 
@if(session("mensaje"))
	<p class="alert-success">{{ session("mensaje")   }}</p>
@endif


	<fieldset>
	
	<!--form name-->
	<legend></legend>
	<!--text input-->
	<table>
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Nombre</label>
		<div class="col-md-12">
		<input id="textinput" value="{{ $empleado->FirstName  }}" name="nombre" type="text"  class="form-control">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Apellido</label>
		<div class="col-md-12">
		<input id="textinput" value="{{ $empleado->LastName  }}" name="apellido" type="text"  class="form-control ">
		</div>
	</div>
	
	<!--select basic-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="selectbasic">Jefe Directo</label>
		<div class="col-md-12">
		<select id="selectbasic" name="jefe"  class="form-control">
		@if( $empleado->jefe_directo()->count() === 0)
				<option selected value="">....Seleccione jefe directo</option>
				@foreach($jefes as $j)
					<option value="{{ $j->EmployeeId }}"> 
						{{ $j->LastName }}  ,  {{ $j->FirstName }} 
					</option>
				@endforeach	  
			@else
				<option selected value="">....Seleccione jefe directo</option>
			
			<!--recorrer los jefes-->
			@foreach($jefes as $j)

					@if( $j->EmployeeId === $empleado->jefe_directo()->first()->EmployeeId)
						<option value="{{ $j->EmployeeId }}" selected> 
							{{ $j->LastName }}  ,  {{ $j->FirstName }} 
						</option>
					
					@else
					<option value="{{ $j->EmployeeId }}"> 
							{{ $j->LastName }}  ,  {{ $j->FirstName }} 
					</option>
					@endif
			@endforeach
		@endif
			</select>
			<p>{{ $errors->first('jefe') }} </p>
		</div>
	</div>
	<!--select basic-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="selectbasic">Cargo</label>
		<div class="col-md-12">
		<select id="selectbasic" name="cargo"  class=" form-control">
		<!--recorrer los cargos-->
		@foreach($cargos as $c)
  			@if ($empleado->Title === $c->Title)
			<option selected >{{ $c->Title }} </option>
			@else
			<option >{{ $c->Title }} </option>
			@endif
		@endforeach
		</select>
		</div>
	</div>
	<!--date-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="">Fecha De Contratación</label>
		<div class="col-md-12">
		<input id=""  value="{{ $empleado->HireDate->format('Y-m-d') }}" name="contrato"  class="datepicker form-control input-md">
		</div>
	</div>
	<!--date-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="">Fecha De Nacimiento</label>
		<div class="col-md-12">
		<input id="datepicker" value="{{ $empleado->BirthDate->format('Y-m-d') }}" name="nacimiento"  class="datepicker form-control input-md">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Email</label>
		<div class="col-md-12">
		<input id="email" value="{{ $empleado->Email  }}" name="Email" type="text"  class=" form-control">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Dirección</label>
		<div class="col-md-12">
		<input id="textinput" value="{{ $empleado->Address  }}" name="direccion" type="text" placeholder="" class="form-control ">
		</div>
	</div>
	<!--text input-->
	<div class="form-group">
		<label class="col-md-12 control-label" for="textinput">Ciudad</label>
		<div class="col-md-12">
		<input id="textinput" value="{{ $empleado->City  }}" name="ciudad" type="text" placeholder="" class="form-control ">
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
			</table>
        </div>
</section>
	</div>
</div>
</fieldset>
<!--fin de la vista-->
@endsection