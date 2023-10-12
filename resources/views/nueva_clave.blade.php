@extends('app')
@section('content')
<div class="container-fluid w-25 border mt-3">

    <form action="{{route('usuarios-generarnuevaclave')}}" method="POST" id="formulario">
        @csrf
        @method('PATCH')
        @error('pin')
        <h6 class="alert alert-danger">{{$message}} </h6>
        @enderror
        @error('clave')
        <h6 class="alert alert-danger">{{$message}} </h6>
        @enderror
        @error('confirmclave')
        <h6 class="alert alert-danger">{{$message}} </h6>
        @enderror
        @isset($comparado)
        <h6 class="alert alert-success"> {{$comparado}}</h6>
        @endisset
        @isset($aviso)
         {{$aviso}}
        @endisset
        @isset($cadena_libre)
         {{$cadena_libre}}
        @endisset
        @if (session('notconfirm'))
          <h6 class="alert alert-danger">{{session('notconfirm')}} </h6>
        @endif
        @if (session('notvalid'))
          <h6 class="alert alert-danger">{{session('notvalid')}} </h6>
        @endif
        <div class="mb-3">
         @isset($email)

            <input type="hidden" class="form-control" name="correo"  value="{{$email}}" >
        @endisset
        @isset($inputemail)
        <input type="hidden" class="form-control" name="correo"  value="{{$inputemail}}">
        @endisset
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="pin"  id="realpin" value="{{$cadena_libre}}">
        </div>
        <div class="mb-3">
            <label for="clave" class="form-label"> Ingrese pin </label>
            <input type="password" class="form-control" name="pin" id="pin" required >
        </div>
        <p>
            <h6 class="alert alert-danger" id="adver-pin"> </h6>
        </p>   
        <div class="mb-3">
            <label for="clave" class="form-label"> Ingrese nueva clave </label>
            <input type="password" class="form-control" name="clave" id="clave1" required >
        </div>
        <p>
            <h6 class="alert alert-danger" id="adver-clave"> </h6>
        </p>
        <p>
            <h6 class="alert alert-info" id="info-clave"> </h6>
        </p>
        <div class="mb-3">
            <label for="confirmclave" class="form-label"> confirme nueva clave </label>
            <input type="password" class="form-control" name="confirmclave" id="clave2" required >
        </div>
        <div class="mb-3">
            <h6 class="alert alert-danger" id="advertencia"> </h6>

        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Vamos</button>
        </div>     
    </form>
</div>    

@endsection()