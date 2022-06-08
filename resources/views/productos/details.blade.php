@extends('layoust.menu')
@section('contenido')
    <div class="row">
        <h1>{{ $producto->nombre }}</h1>
    </div>
    <div class="row">
        <div class="col s8">
            <ul>
                <li><img src="{{ asset('img/'.$producto->imagen) }}" alt="" width="500px"></li>
                <li><h5>Marca:</h5> {{ $producto->marca->nombre }}</li>
                <li><h5>Categoria:</h5> {{ $producto->categoria->nombre }}</li>
                <li><h5>Precio:</h5> US {{ $producto->precio }}</li>
                <li><h5>Descripcion:</h5> {{ $producto->desc }}</li>
            </ul>
        </div>
        <div class="col s4">
            <div class="row">
                <h3>Añadir al carrito</h3>
            </div>
            <div class="row">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $producto->id }}">
                    <div class="col s4 input-field">
                        <select name="cantidad" id="cantidad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="cantidad">Cantidad</label>
                        <div class="row">
                            <div class="s8">
                                <button class="btn waves-effect waves-light #42a5f5 blue lighten-1" type="submit" name="action">Añadir</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection