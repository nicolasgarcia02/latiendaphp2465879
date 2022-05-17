<?php
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('paises', function(){
    $paises=[
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "peso",
            "poblacion" => 51.6,
            "ciudades" => [
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "sol",
            "poblacion" => 32.97,
            "ciudades" => [
                "Cusco",
                "Arequipa",
                "Chiclayo"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "guarani",
            "poblacion" => 7.133,
            "ciudades" => [
                "Encarnacion",
                "Villarrica",
                "Paraguari"
            ]
        ]
    ];
    return view('paises')-> with('paises', $paises);
});
Route::get('prueba', function(){
    return view('productos.new');
});
Route::resource('productos', ProductoController::class);