@extends('blogs.app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <form action="{{ route('blogs-update',['id' => $blog->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
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
            <input type="text" class="form-control" name="titulo" value="{{$blog->titulo}}">
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="descripcion" class="form-label me-3">Ingrese descripcion</label>
            <textarea class="form-control" name="descripcion" rows="5" >{{$blog->descripcion}}</textarea>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <label for="imagen" class="form-label me-3">Ingrese una imagen</label>
            <input type="file" class="form-control" accept="image/*" name="imagen">
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
    </form>
</div>  
@endsection  