@extends('layoust.menu')
@section('contenido')
<div class="row">
    <h1 class="blue-text text-accent-1">
        Nuevo Producto
    </h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="{{ url('productos') }}">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre del Producto" id="nombre" name="nombre" type="text">
                <label for="nombre">Nombre del Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea" placeholder="Descripcion del Producto" id="desc" name="desc"></textarea>
                <label for="desc">Descripcion del Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio del Producto" id="precio" name="precio" type="text">
                <label for="precio">Precio del Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">Marca</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">Categoria</label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn">
                    <span>Imagen de producto...</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                        <input class="file-path validate" placeholder="Imagen del Producto" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="s8">
                <button class="btn waves-effect waves-light" type="submit" name="action">Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection