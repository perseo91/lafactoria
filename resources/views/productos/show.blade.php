<doctype html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
       <div class="container w-25 border p-4">
            <form action="{{ route('productos-update', ['id' => $producto->id]) }}" method="post">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success')}} </h6>
                @endif
                @error('nombre')
                    <h6 class="alert alert-danger">{{ $message }} </h6>
                @enderror
                @error('precio')
                    <h6 class="alert alert-danger">{{ $message }} </h6>
                @enderror
                <div class="mb-3">
                    <label for="nombre" class="form-label">Ingrese nombre </label>
                    <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}"> 
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Ingrese precio </label>
                    <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}"> 
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"> Actualizar producto </button>
                </div>
            </form>
        </div>
    </body>
</html>

