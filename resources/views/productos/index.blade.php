@extends('layouts.menu')
@section('contenido')
@if(session('mensaje'))
<div class="row">
    <h5 class="center-align cyan-text text-darken-3">
        {{ session('mensaje') }}
        <a href="{{ route('car.index') }}" class="blue-text text-blue darken-4">IR AL CARRITO</a>
    </h5>
</div>
@endif
<div class="row">
    <h1 class="cyan-text text-darken-3">CATALOGO DE PRODUCTOS</h1>
</div>
@foreach($productos as $producto)
<div class="row" style="display: inline-block">
    <div class="col">
        <div class="card">
            <div class="card-image" style="height:300px; width:300px">
                @if( $producto->imagen === null )
                <img src="{{ asset( 'img/producto_no_disponible.png' ) }}" alt="" />
                @else
                <img src="{{ asset( 'img/'.$producto->imagen ) }}" alt="" />
                @endif
                <span class="card-title cyan-text text-darken-3">{{ $producto->nombre }}</span>
            </div>
            <div class="card-content">
                <p>{{ $producto->desc }}</p>
            </div>
            <div class="card-action">
                <a href="{{route ('productos.show', $producto->id)}}" class="cyan-text text-darken-3"">Ver Detalles</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection