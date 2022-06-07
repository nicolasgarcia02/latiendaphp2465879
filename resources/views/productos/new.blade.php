@extends('layoust.menu')
@section('contenido')
<div class="row">
    <h1 class="blue-text text-accent-1">
        Nuevo Producto
    </h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="{{ url('productos') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre del Producto" id="nombre" name="nombre" value="{{ old('nombre') }}" type="text">
                <label for="nombre">Nombre del Producto</label>
                <span class="blue-text text-accent-1">{{ $errors->first('nombre') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea" placeholder="Descripcion del Producto" id="desc" name="desc">{{ old('desc') }}</textarea>
                <label for="desc">Descripcion del Producto</label>
                <span class="blue-text text-accent-1">{{ $errors->first('desc') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio del Producto" id="precio" name="precio" value="{{ old('precio') }}" type="text">
                <label for="precio">Precio del Producto</label>
                <span class="blue-text text-accent-1">{{ $errors->first('precio') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    <option value="">Elija marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{ $marca->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">Marca</label>
                <span class="blue-text text-accent-1">{{ $errors->first('marca') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                <option value="">Elija Categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">Categoria</label>
                <span class="blue-text text-accent-1">{{ $errors->first('categoria') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn #42a5f5 blue lighten-1">
                    <span>Imagen de producto...</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                        <input class="file-path validate" placeholder="Imagen del Producto" type="text">
                        <span class="blue-text text-accent-1">{{ $errors->first('imagen') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="s8">
                <button class="btn waves-effect waves-light #42a5f5 blue lighten-1" type="submit" name="action">Guardar</button>
            </div>
        </div>
    </form>
</div>
@if(session('mensaje'))
<div class="row">
    <h5 class="blue-text text-accent-1">{{ session('mensaje')}}</h5>
</div>
@endif
@endsection