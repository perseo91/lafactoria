@extends('app')
@section('content')
<div class="row">
@foreach($products as $product)
    <div class="col-xs-18 col-sm-6 col-md-4 col-lg-3" style="margin-top:10px;">
        <div class="img_thumbnail productlist">
            <div  class="row align-items-start" style="height:33%;" >
                <a href="{{ route('detalle-producto',$product->id)}}"> <img src="{{ $product->imagen }}" class="img-fluid"> </a>
            </div>    
            <div class="row align-items-center" style="height: 33%;" >
                <div class="caption">
                    <a href="{{ route ('detalle-producto', $product->id)}}" id="link_nombre"> <h5>{{ $product->nombre }}</h5> </a>
                    <p>{{ $product->descripcion }}</p>
                    <p><strong>Precio: </strong> ${{ $product->precio }}</p>
                </div>
            </div>
            <div class="row align-items-end" style="height: 33%;">      
                <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Agregar al carro</a> </p>
            </div>    
        </div>
    </div>
    @endforeach
</div>
@endsection