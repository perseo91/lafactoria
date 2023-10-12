@extends('app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <form action="{{ route('grupos-update',['id'=>$grupo->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('nombre')
            <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('color')
            <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        <div class="mt-3 mb-3 d-flex justify-content-center">
            <label for="nombre" class="form-label me-3">Ingrese nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $grupo->nombre}}">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="color" class="form-label me-3">Ingrese color</label>
            <input type="color" class="form-control" name="color">
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
    </form>
    <div>
        @if($grupo->articulos->count() > 0)
            @foreach($grupo->articulos as $articulo)
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
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$articulo->id}}"> Borrar 
                    </button>
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
        @endif    

    </div>
@endsection