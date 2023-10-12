@extends('app')
@section('content')
<div class="container">
    <div class="row ">
        @foreach($lista as $item)
        
        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 mt-3 mb-5">
            <div class="card" style="width:100%; height:100%;">
                <img src="{{$item[3]}}" class="card-img-top" alt="..." style="height:400px;">
                <div class="card-body">
                    <a href="{{ route('detalle-producto',[ $item[0]])}}"> <h5 class="card-title">{{$item[1]}}</h5> </a>
                    <p class="card-text">{{$item[2]}}</p>
                    <!--<a href="{{ route('blogs-detalle',[$item[0]])}}" class="btn btn-info">Ver mas</a>-->
                    <div class="d-flex justify-content-center">
                    <p class="btn-holder"><a href="{{route('add_to_cart', $item[0])}}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a></p>
            </div>
                </div>

            </div>
            @foreach($item[4] as $caracteristica)
            <div class="mb-3">
             {{ $caracteristica}}
            </div>
            @endforeach
            
        </div>
        
    @endforeach 

    </div>
</div>        
@endsection