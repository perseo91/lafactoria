@extends('app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <form action="{{ route('blogs')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('titulo')
            <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('descripcion')
        <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('imagen')
        <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        <div class="mt-3 mb-3 d-flex justify-content-center">
            <label for="titulo" class="form-label me-3">Ingrese nombre</label>
            <input type="text" class="form-control" name="titulo">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="descripcion" class="form-label me-3">Ingrese descripcion</label>
            <textarea class="form-control" name="descripcion" rows="5"  > </textarea>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="imagen" class="form-label me-3">Ingrese una imagen</label>
            <input type="file" class="form-control" accept="image/*" name="imagen">
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Registrar</button>
        </div>
    </form>
    <div>
        @foreach($lista as $item)
        
        <div class="row mb-5">
            <div class="col-md-3">
                <a href="{{ route('blogs-show',['id'=>$item[0]]) }}">{{$item[1]}} </a>
            </div>
            <div class="col-md-3">
            <a href="{{ route('blogs-show',['id'=>$item[0]])}}">{{$item[2].'...'}} </a>
            </div>
            <div class="col-md-3">
            <a href="{{ route('blogs-show',['id'=>$item[0]])}}"> <img src="{{asset($item[3])}}" class="img-fluid img-thumbnail"> </a>
            </div>
            <div class="col-md-3">
                <form action="{{route('blogs-delete',[$item[0]])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$item[0]}}"> Borrar 
                    </button>
                    
                </form>    
            </div>    
        </div>
         <!-- Modal -->
<div class="modal fade" id="modal-{{$item[0]}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ventanilla de confirmación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el blog {{$item[1]}} de los registros ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{route('blogs-delete',[$item[0]])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Borrar</button>
        </form>
        </div>
    </div>
  </div>
</div>
        @endforeach

    </div>    
</div>
@endsection