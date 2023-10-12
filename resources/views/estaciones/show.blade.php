<doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Bienvenido a nuestro sitio </title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <div class="container w-25 border p-4 mt-3">
            <form action="{{ route ('estaciones-update',['id'=> $estacion->id])}}" method="POST">
                @csrf
                @method('PATCH')
                @if(session('success'))
                    <h6 class="alert alert-success">{{session('success')}} </h6>
                @endif
                @error('nombre')
                <h6 class="alert alert-danger">{{ $message }} </h6>
                @enderror

                <div class="mb-3">
                    <label for="nombre" class="form-label">Ingrese nombre de estación </label>
                    <input type="text" name="nombre" class="form-control" value="{{$estacion->nombre}}">
                </div>
                <div class="mb-3"> 
                    <button type="submit" class="btn btn-success"> Actualizar </button>
                </div>
            </form>
        </div>       
    </body>       
</html>    
