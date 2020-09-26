<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Validator;

class ArtistaController extends Controller
{
    //Los controladores estan compuestos
    //por ACCIONES: Metodos de la clase controladora
    //debe haber una ruta por cada accion

    public function index(){

        //capturar datos con los modelos
        $artistas = Artista::all();

      //retornar vista que me muestre los artistas
      return view ('artistas.index')
                   ->with('artistas', $artistas);
    }

public function create(){
    //mostrar el formulario para registrar artista
    return view('artistas.new');
}
public function store(Request $r){
    $reglas=[
        "nombre_artista" => ['required', 'alpha', 'min:3','max:6', 'unique:artists,Name']
    ];

    $mensajes =[
        'required' => "El nombre del artista es obligatorio",
        'alpha' => "Solo se registran letras en el sistema",
        'min' => "El :attribute debe tener :value caracter como minimo",
    ];

    $validador = Validator::make($r->all(), $reglas, $mensajes);

    if($validador->fails()){
        return redirect('artistas/create')->withErrors($validador);
    }

    //crear el objetivo Artista
    $nuevo_artista =new Artista();
    //Asignacion Atributos
    $nuevo_artista-> Name= $r ->input('nombre_artista');
    //grabar
    $nuevo_artista->save();
echo "Artista Registrado";

   //redireccionar a la vista de nuevo:
   //redirect: una ruta que exista en el web.php(de get)
   return redirect('artistas/create')
   ->with('Exito',"Artista registrado exitosamente");
}
}