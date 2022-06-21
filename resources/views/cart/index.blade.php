@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h1 class="cyan-text text-darken-3">CARRITO DE COMPRAS</h1>
</div>
@if(session('cart'))
<div class="row">
    <div class="col s8">
        <table class="highlight centered">
            <thead class="cyan darken-3 white-text text-white">
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </thead>
            <tbody>
            @foreach(session('cart') as $producto)
                <tr>
                    <td>{{ $producto[0]["nombre"] }}</td>
                    <td>{{ $producto[0]["cantidad"] }}</td>
                    <td>{{ $producto[0]["precio"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<h5 class="center-align red-text text-accent-4">NO HAY ITEMS EN EL CARRITO</h5>
@endif
<div class="row">
    <form action="{{ route('cart.destroy' , 1) }}" method="POST">
        @method('DELETE')
        @csrf
        <button class="btn waves-effect waves-light cyan darken-3" type="submit">ELIMINAR</button>
    </form>
</div>
@endsection