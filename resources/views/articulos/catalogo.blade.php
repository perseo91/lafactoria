@extends('app')
@section('content')
<div class="container">
    <div class="row ">
        @foreach($lista as $item)
        
        <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 mt-3 mb-5">
            <div class="card" style="width:100%; height:100%;">
                <img src="{{$item[3]}}" class="card-img-top" alt="..." style="height:400px;">
                <div class="card-body">
                <a href="{{ route('detalle-articulo',[ $item[0]])}}"> <h5 class="card-title">{{$item[1]}}</h5> </a>
                    <p class="card-text">{{$item[2]}}</p>
                    <!--<a href="{{ route('blogs-detalle',[$item[0]])}}" class="btn btn-info">Ver mas</a>-->
                </div>
            </div>
        </div>
    @endforeach    
    </div>
</div>        
@endsection