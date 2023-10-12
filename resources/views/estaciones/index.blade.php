@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-3">
        <form action="{{ route ('estaciones')}}" method="POST">
            @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{session('success')}} </h6>
            @endif
            @error('nombre')
            <h6 class="alert alert-danger">{{ $message }} </h6>
            @enderror

            <div class="mb-3">
                <label for="nombre" class="form-label">Ingrese nombre de estación </label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <label for="linea_id"  class="form-label">Esta estación pertenece a: </label>
            <select name="linea_id" class="form-select">
                @foreach($lineas as $linea)
                    <option value="{{ $linea->id }}">{{$linea->nombre}} </option>
                @endforeach
            </select>    
            <div class="mb-3"> 
                <button type="submit" class="btn btn-success"> Ingresar </button>
            </div>
        </form>
        <div>
            @foreach($estaciones as $estacion)
                <div class="row py-1">
                    <div class="col-md-6">
                        <a href="{{ route('estaciones-edit',['id'=> $estacion->id])}}">{{$estacion->nombre}} </a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('estaciones-delete',[$estacion->id])}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$estacion->id}}"> Borrar</button>
                                
                        </form>
                             
                    </div> 
                       
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal-{{$estacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Esta seguro que desea eliminar la estación {{$estacion->nombre}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            
        </div>
        
    </div>
    
@endsection           

