@extends('layouts..menu')
@section('contenido')
@if(session('mensaje'))
<div class="row">
    <h5 class="center-align cyan-text text-darken-3">{{ session('mensaje') }}</h5>
</div>
@endif
<div class="row">
    <h1 class="cyan-text text-darken-3">NUEVO PRODUCTO</h1>
</div>
<div class="row">
    <form class='col s8' method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre de Producto" id="nombre" type="text" name="nombre" class="validate" value="{{ old('nombre') }}">
                <label for="nombre">Nombre de Producto</label>
                <span class="red-text text-red accent-4">{{ $errors->first('nombre') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea name="desc" id="desc" class="materialize-textarea">
                {{ old('desc') }}
                </textarea>
                <label for="desc">Descripción</label>
                <span class="red-text text-red accent-4">{{ $errors->first('desc') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio de Producto" id="precio" type="text" name="precio" class="validate" value="{{ old('precio') }}">
                <label for="precio">Precio de Producto</label>
                <span class="red-text text-red accent-4">{{ $errors->first('precio') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <select name="marca" id="marca">
                    <option value="{{ old('marca') }}">Elija Marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                <label>Seleccione la Marca</label>
                <span class="red-text text-red accent-4">{{ $errors->first('marca') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <select name="categoria" id="categoria">
                    <option value="{{ old('categoria') }}">Elija Categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <label>Seleccione la Categoria</label>
                <span class="red-text text-red accent-4">{{ $errors->first('categoria') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn cyan darken-3">
                    <span>Imagen</span>
                    <input type="file" name="imagen" id="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Imagen de Producto">
                    <span class="red-text text-red accent-4">{{ $errors->first('imagen') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action">GUARDAR
            </button>
        </div>
    </form>
</div>
@endsection