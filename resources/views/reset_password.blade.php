@extends('app')
@section('content')
<div class="container-fluid w-25 border mt-3">
    <form action="{{route('usuarios-generarpin')}}" method="POST">
        @csrf
        @method('PATCH')
        @if(session('mensaje'))
     
        <h6 class="alert alert-success">{{ session('mensaje')}}</h6>
    
        @endif
       
        <div class="mb-3">
            <label for="correo" class="form-label"> Ingrese su email</label>
            <input type="email" class="form-control" name="correo">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Vamos</button>
        </div>     
    </form>
</div>    

@endsection()