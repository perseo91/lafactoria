@extends('blogs.app')
@section('content')
<div class="container">
    
    <div class="mb-3 d-flex justify-content-center">
       <h4> {{$blog->titulo}} </h4>
    </div>
    <div class="mb-3 d-flex justify-content-center">
      <img src="{{asset($blog->imagen)}}" class="img-thumbnail"> 
    
    </div>  
    <div class="mb-3 d-flex justify-content-center">
        <p> {{$blog->descripcion}} </p>
    </div>  
</div>    
@endsection