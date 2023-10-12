@extends('app')
@section('content')
<div class="container">
    <div class="row ">
        @foreach($lista as $item)
        
        <div class="col-xs-3 col-sm-6 col-md-4 col-lg-3 mt-3 mb-5">
            <div class="card" style="width:100%; height:100%;">
              
                <img src="{{$item[3]}}" class="card-img-top" alt="..." style="height:300px;">
                    
                <div class="card-body">
                    <div class="row align-items-center" id="contenedor-texto"style="height:50%;">
                        <h5 class="card-title">{{$item[1]}}</h5>
                        <p class="card-text">{{$item[2].'...'}}</p>
                    </div>
                    <div class="row align-items-center" style="height:50%;" id="contenedor-boton">
                        <a href="{{ route('blogs-detalle',[$item[0]])}}" class="btn btn-info" id="btn-detalle-blog">Ver mas</a>
                    </div>    
                </div>
            </div>
        </div>
    @endforeach    
    </div>
</div>        
@endsection