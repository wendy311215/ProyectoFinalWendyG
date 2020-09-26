<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\validator;
use App\Empleado;
use Illuminate\Http\Request;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperar todos los empleados
        $empleados=\App\Empleado::paginate(3);
        //mostrar lista a empleados
        return view ('empleados.index')->with("empleados", $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar empleados cuyo id sea 1,2,6
        $managers = Empleado::find([1,2,6] );
        //SELECCIONE LOS CARGOS
        $cargos = Empleado::select("Title")->distinct()->get();
        //mostrar vista de crear empleado
        return view('empleados.insert')
             ->with("jefes" , $managers)
             ->with("cargos", $cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //crear objerto
        $empleado = new Empleado();
        //declarar variables
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input('contrato');
        $empleado->Email = $request->input('Email');
        $empleado->Address = $request->input('direccion');
        $empleado->City = $request->input('ciudad');
        //guardar registro
        $empleado->save();

        return redirect("empleados")->with("mensaje","Empleado Registrado");

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar detalle empleado id
        $empleado = \App\Empleado::with('subalternos')
                                    ->with('clientes')
                                    ->with('jefe_directo')
                                    ->find($id);//SELECT*FROM
        
        //Enviar el objeto a la vista
        return view('empleados.show')->with("empleado", $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //seleccionar el empleado a esitas;
        $empleado = Empleado::find($id);

         //seleccionar empleados cuyo id sea 1,2,6
         $managers = Empleado::find([1,2,6] );
         //SELECCIONE LOS CARGOS
         $cargos = Empleado::select("Title")->distinct()->get();
         //mostrar vista de crear empleado
         return view('empleados.edit')->with("empleado", $empleado)
              ->with("jefes" , $managers)
              ->with("cargos", $cargos);

        //llevar el empleado a editar a la vits
        return view("empleados.edit")->with("empleado", $empleado)
                                     ->with("jefes" , $managers)
                                     ->with("cargo" , $cargos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regla=[
            "jefe" => 'required'
        ];

        //crear objeto validadorDB;
        $validador = validator::make( $request->all() , $regla);
        

        //validar
        if($validador->fails()){
            return redirect("empleados/$id/edit")
                            ->withErrors($validador);
        }


        //seleccion de empleados 
        $empleado = Empleado::find($id);
        //asignar atributos
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input('contrato');
        $empleado->Email = $request->input('Email');
        $empleado->Address = $request->input('direccion');
        $empleado->City = $request->input('ciudad');
        //guardar
        $empleado->save();
        return redirect("empleados/$empleado->EmployeeId/edit")
                        ->with("mensaje", "Empleado Actualizado");
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
