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
        $productos = Producto::all();
        return view('productos.categoria')
               ->with('productos', $productos);
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
               ->with('marcas' , $marcas)
               ->with('categorias' , $categorias);
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
        $mensajes = [
            "required" => "Campos Obligatorios",
            "numeric" => "Solo Numeros",
            "alpha" => "Solo Letras",
            "image" => "Ingrese Imagen",
            "unique" => "Nombre Producto Repetido"
        ];
        $v =  Validator::make($r->all(),
                              $reglas, 
                              $mensajes);
        if($v->fails()) {
        return redirect('productos/create')
               ->withErrors($v)
               ->withInput();
        }
        else {  
        $nombre_archivo = $r->imagen->getClientOriginalName();
        $archivo = $r->imagen;
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
               ->with('mensaje', 'PRODUCTO REGISTRADO EXITOSAMENTE');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        $producto = Producto::find($producto);
        return view('productos.details')
               ->with('producto', $producto);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va la edicion del producto cuyo id es: $producto";
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