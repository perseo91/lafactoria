@extends('app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <form action="{{ route('grupos') }}" method="POST">
        @csrf
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
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="color" class="form-label me-3">Ingrese color</label>
            <input type="color" class="form-control" name="color">
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Registrar</button>
        </div>
    </form>
    <div>
        @foreach($grupos as $grupo)
            <div class="row">
                <div class="col-md-6 mt-3 d-flex justify-content-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('grupos-show',['id'=>$grupo->id])}}"><span style="background-color:{{ $grupo->color }}; width:70px; height:10px;"></span> {{$grupo->nombre}}</a>
                </div>
                <div class="col-md-6 mt-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$grupo->id}}">Borrar</button>
                </div>       
            </div>
               <!-- Modal -->
<div class="modal fade" id="modal-{{$grupo->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ventanilla de Confirmación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el grupo {{$grupo->nombre}} de los registros?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{ route('grupos-delete',[$grupo->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Borrar</button>
        </form>    
      </div>
    </div>
  </div>
</div>
        @endforeach
     

    </div>   
@endsection