
@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset($producto->imagen)}}" style="height:400px;">
        </div>
        <div class="col-md-6">
            
            <h5>{{ $producto->nombre }}</h5>
            <p>{{ $producto->descripcion }}</p>
            <p><strong>${{ $producto->precio }}</strong></p>
            <h6><strong>Características principales</strong></h6>
            <hr> 
            <ul>
            @foreach($producto->caracteristica as $caracteristica)
               @isset($caracteristica) 
                <li>{{ $caracteristica}}</li>
               @endisset
            @endforeach
            </ul>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-success">Agregar</button>
            </div>
        </div>    
    </div>
</div>    
@endsection
