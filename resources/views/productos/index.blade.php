@extends('layoust.menu')
@section('contenido')
    <div class="row">
        <h1 class="blue-text text-accent-1">CATALOGO DE PRODUCTOS</h1>
    </div>
    @foreach($productos as $producto)
    <div style="display: inline-block" class="row">
        <div class="col">
            <div style="height:350px; width:300px" class="card">
                <div class="card-image">
                    @if($producto->imagen === null)
                        <img src="{{ asset('img/producto-no-disponible.jpg') }}">
                    @else
                        <img src="{{ asset('img/'.$producto->imagen) }}">
                    @endif
                    <span class="card-title">{{ $producto->nombre }}</span>
                </div>
                <div class="card-content">
                    <p>{{ $producto->desc }}</p>
                </div>
                <div class="card-action blue-text text-accent-1">
                    <a href="{{route ('productos.show', $producto->id)}}">VER DETALLES</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection