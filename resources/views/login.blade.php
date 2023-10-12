@extends('app')
@section('content')
 <div class="container w-25 border mt-3" >
    <pre>{{ Auth::user() }} </pre>
    
     <form method="POST"> 
        @csrf
        @error('email')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        @error('password')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <div class="mb-3">
            <label for="" class="form-label">Ingrese email </label>
            <input type="text" name="email" class="form-control" value="{{ old('email')}}" autofocus >
        </div> 
        <div class="mb-3">
        <label for="" class="form-label">Ingrese clave </label>
            <input type="password" name="password" id="password"  class="form-control">
        
        </div>
        <div class="mb-3">
            <input type="checkbox" id="checa" >
        </div> 
        <div class="mb-3">
        <div class="mb-3">
            <input type="button" id="btn1" value="Dale">
        </div> 
        <div class="mb-3">
        
            <input type="checkbox" name="remember">
            <label for="" class="form-label">Recuerdame </label>
        </div>
        <div class="mb-3">
            <a href="{{ route('reset_password')}}" >Olvidé mi clave </a>
        </div>   
        
        <div class="mb-3 d-flex">
            <div class="justify-content-start me-5">    
                <button type="submit" class="btn btn-primary"> Iniciar Sesion </button>
            </div>
            <div class="justify-content-end ">    
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear cuenta nueva </button>
            </div>
  

    </form>
              <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrarte</h1>
       
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <form action="{{ route('usuarios')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="correo" placeholder="correo electrónico">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="clave"  placeholder="Contraseña nueva">
                </div> 
                <div class="mb-3">
                <div class="mb-3">
                    <input type="checkbox">
                </div> 
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Registrarte </button>
                </div>     
            </form>
      </div>
      
    </div>
  </div>
</div>

        </div> 

</div>


@endsection