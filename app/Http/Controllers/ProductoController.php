<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.new')
               ->with('marcas', $marcas)
               ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'
        ];
        $mensajes =[
            "required" => "este campo obligatorio",
            "numeric" => "solo se escriben numeros",
            "alpha" => "solo se escriben letras",
            "min" => "minino son 10 caracteres",
            "max" => "maximo son 50 caracteres",
            "image" => "en este campo va una imagen",
            "unique" => "este nombre de producto ya existe"
        ];
        $v = Validator::make($r->all(), $reglas, $mensajes);
        if($v->fails()){ 
            var_dump($v->errors());
        return redirect('productos/create')
                    ->withErrors($v)
                    ->withInput();
        }
        else{
        $nombre_archivo = $r->imagen->getClientOriginalName();
        $archivo = $r->imagen;
        var_dump (public_path());
        $ruta = public_path().'/img';
        $archivo->move($ruta, $nombre_archivo);
        $p = new Producto;    
        $p->nombre = $r->nombre;
        $p->desc = $r->desc;
        $p->precio = $r->precio;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        $p->imagen = $nombre_archivo;
        $p->save();
        return redirect('productos/create') 
                    ->with('mensaje' , 'Producto registrado');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo"aqui va la informacion del producto cuyo id es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo"aqui va a ir el formulario de edicion del producto cuyo id es: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
