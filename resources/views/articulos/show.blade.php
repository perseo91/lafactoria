@extends('articulos.app')
@section('content')

<div class="container w-25 border p4 mt-4">
    <form action="{{ route('articulos-update',['id' => $articulo->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('nombre')
            <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        @error('precio')
        <h6 class="alert alert-warning">{{$message}}</h6>
        @enderror
        <div class="mt-3 mb-3 d-flex justify-content-center">
            <label for="nombre" class="from-label me-3">Ingrese nombre</label>
            <input type="text" class="from-control" name="nombre" value="{{ $articulo->nombre }}">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="precio" class="from-label me-3">Ingrese precio</label>
            <input type="text" class="from-control" name="precio" value="{{ $articulo->precio }}">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <img src="{{$articulo->imagen}}" class="img-fluid img-thumbnail">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="imagen" class="from-label me-3">Ingrese una imagen</label>
            <input type="file" class="from-control" accept="image/*" name="imagen">
        </div>
       
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection