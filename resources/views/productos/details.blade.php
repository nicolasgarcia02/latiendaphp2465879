@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h5 class="cyan-text text-darken-3">{{ $producto->nombre }}</h5>
</div>
<div class="row">
    <div class="col s8">
        <h5 class="cyan-text text-darken-3">IMAGEN: </h5>
        <img src="{{ asset('img/'.$producto->imagen) }}" alt="" width="350px">
        <h5 class="cyan-text text-darken-3">MARCA: </h5>
        {{ $producto->marca->nombre }}
        <h5 class="cyan-text text-darken-3">DESCRIPCION: </h5>
        {{ $producto->desc }}
        <h5 class="cyan-text text-darken-3">PRECIO: </h5>
        ${{ $producto->precio }}
        <h5 class="cyan-text text-darken-3">CATEGORIA: </h5>
        {{ $producto->categoria_id }}
    </div>
    <div class="col s4">
        <div class="row">
            <h3 class="cyan-text text-darken-3">AÑADIR AL CARRITO</h3>
        </div>
        <form action="{{ route('car.store') }}" method="post">
            @csrf
            <input type="hidden" name="prod_id" value="{{ $producto->id }}">
            <input type="hidden" name="prod_nom" value="{{ $producto->nombre }}">
            <input type="hidden" name="prod_pre" value="{{ $producto->precio }}">
            <div class="row">
                <div class="col s4 input-field">
                    <select name="cantidad" id="cantidad">
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                    </select>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action">CANTIDAD</button>
        </form>
    </div>
</div>
@endsection