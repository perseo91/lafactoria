@extends('app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <form action="{{ route('articulos')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('nombre')
            <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('precio')
        <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('imagen')
        <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        <div class="mt-3 mb-3 d-flex justify-content-center">
            <label for="nombre" class="from-label me-3">Ingrese nombre</label>
            <input type="text" class="from-control" name="nombre">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="precio" class="from-label me-3">Ingrese precio</label>
            <input type="text" class="from-control" name="precio">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="imagen" class="from-label me-3">Ingrese una imagen</label>
            <input type="file" class="from-control" accept="image/*" name="imagen">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="grupo_id" class="form-label me-3">Seleccione grupo</label>
            <select name="grupo_id" class="form-select">
                @foreach($grupos as $grupo)
                    <option value="{{$grupo->id}}">{{ $grupo->nombre}}</option>
                @endforeach
            </select>    
        </div>
        
        
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Registrar</button>
        </div>
    </form>
    <div>
        @foreach($articulos as $articulo)
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('articulos-show',['id'=>$articulo->id]) }}">{{$articulo->nombre}} </a>
            </div>
            <div class="col-md-3">
            <a href="{{ route('articulos-show',['id'=>$articulo->id])}}">{{$articulo->precio}} </a>
            </div>
            <div class="col-md-3">
            <a href="{{ route('articulos-show',['id'=>$articulo->id])}}"> <img src="{{asset($articulo->imagen)}}" class="img-fluid img-thumbnail"> </a>
            </div>
            <div class="col-md-3">
                <form action="{{route('articulos-delete',[$articulo->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$articulo->id}}"> Borrar 
                    </button>
                    
                </form>    
            </div>    
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="modal-{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ventanilla de confirmación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el articulo {{$articulo->nombre}} de los registros ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{route('articulos-delete',[$articulo->id])}}" method="POST">
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