<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta de prueba
Route::get('hola' , function(){
    echo "hola";
});

//Ruta de arreglo
Route::get('arreglo' , function(){

    //defino un arreglo
    $estudiantes = [ "AN" =>  "Ana"  ,
                     "M" => "Maria" ,
                     "VA" => "Valeria" ,
                     "CA" => "Carlos" ];
    
     //ciclos foreach: recorrer arreglo
     foreach($estudiantes  as  $indice  =>  $e ){
         echo "$e  tiene el indice: $indice  <br />";
     }                

});
//Ruta de paises
Route::get('paises' , function(){

    $paises= [ 
        "Colombia" =>  [
                        "capital" => "Bogotá",
                        "Moneda" => "Peso",
                        "Poblacion" => 50372424,
                        "Ciudades" => [ "Medellin", "Cali", "Barranquilla" ]
                       ]  ,
        "Peru" => [
                   "capital" => "Lima",
                   "moneda" => "Sol",
                   "poblacion" => 33050325,
                   "ciudades" =>[ "Cuzco", "Trujillo","Arequipe"]    
         ],
        "Ecuador" => [ 
                        "capital" => "Quito",
                        "moneda" => "Dolar",
                        "poblacion" => 17517141,
                        "ciudades" =>[ "Guayaquil", "Manta","Cuenca"]
        ],
        "Brazil" => [
                        "capital" => "Brasilia",
                        "moneda" => "Real",
                        "poblacion" => 212216052,
                        "ciudades" => ["Rio de janeiro", "Recife","sau pablo"]
        ]
    ];

    //Enviar datos de paises a una vista
    //con la funcion view
    return view('paises')
           ->with("paises" , $paises );

});

//Rutas de controlador 
Route::get('artistas' , "ArtistaController@index");
Route::get('artistas/create', 'ArtistaController@create');
Route::post('artistas/store','ArtistaController@store');
Route::resource('empleados', 'EmpleadoController');
Route::get('master', function(){
    return view('layouts.master');
Route::get('empleados/create', 'EmpleadoController@create');
Route::post('empleados ','EmpleadoController@store');

});