@extends('app')
@section('content')
<div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('lineas.update',['linea' => $linea->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @if(session('success'))
                    <h6 class="alert alert-success">{{session('success')}}</h6>
                @endif
                @error('title')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror   
                <div class="mb-3">
                    <label for="nombre" class="form-label">Ingrese nombre de linea</label>
                    <input type="text" class="form-control" name="nombre" value="{{$linea->nombre}}">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color de la nueva linea</label>
                    <input type="color" class="form-control" name="color" value="{{$linea->color}}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Linea</button>
            </form>
            <div>
                @if($linea->estaciones->count() > 0)
                    @foreach($linea->estaciones as $estacion)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('estaciones-edit',['id'=>$estacion->id])}}">{{ $estacion->nombre}} </a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$estacion->id}}">Borrar</button>                           
                        </div>    
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$estacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de consentimiento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Esta seguro que desea eliminar la estacion {{$estacion->nombre}} perteneciente a la línea {{$linea->nombre}}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('estaciones-delete',[$estacion->id])}}" method="POST">
                                @method('DELETE')
                                @csrf 
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>    
                        </div>
                        </div>
                    </div>
                    </div> 
                    @endforeach
                @else
                 No hay estaciones
                @endif
            </div>   
        </div>
    </div>        
@endsection()