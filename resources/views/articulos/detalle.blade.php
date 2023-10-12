
@extends('app')
@section('content')
<div class="container-fluid">
    <div class="mb-3"> 
       <img src="{{ asset($articulo->imagen)}}">
    </div>
    <div class="mb-3"> 

     {{ $articulo->nombre }} </a>
    </div>
    <div class="mb-3"> 
    {{ $articulo->precio }}
    </div>
 
</div>


@endsection
