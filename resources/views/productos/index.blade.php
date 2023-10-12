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
            <form action="{{ route('crear-producto') }}" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="nombre"> 
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Ingrese precio </label>
                    <input type="text" class="form-control" name="precio"> 
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <label for="imagen" class="form-label me-3">Ingrese una imagen</label>
                    <input type="file" class="form-control" accept="image/*" name="imagen">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <label for="descripcion" class="form-label me-3">Ingrese descripcion</label>
                    <textarea class="form-control" name="descripcion" rows="5"  > </textarea>
                </div>
                <div class="mb-3">
                    <label for="c1" class="form-label">Ingrese caracteristica 1 </label>
                    <input type="text"  class="form-control" name="c1"> 
                </div>
                <div class="mb-3">
                    <label for="c2" class="form-label">Ingrese caracteristica 2 </label>
                    <input type="text"  class="form-control" name="c2"> 
                </div>
                <div class="mb-3">
                    <label for="c3" class="form-label">Ingrese caracteristica 3 </label>
                    <input type="text"  class="form-control" name="c3"> 
                </div>
                <div class="mb-3">
                    <label for="c4" class="form-label">Ingrese caracteristica 4 </label>
                    <input type="text"  class="form-control" name="c4"> 
                </div>
                <div class="mb-3">
                    <label for="c5" class="form-label">Ingrese caracteristica 5 </label>
                    <input type="text"  class="form-control" name="c5"> 
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"> Vamos </button>
                </div>
            </form>
            <div>
                @foreach($productos as $producto)
                    <div class="row py-1">
                        <div class="col-md-3 d-flex align-items-center">
                          <a href="{{ route('productos-edit',['id' => $producto->id])}}"> {{$producto->nombre}}</a> 
                            
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                          <a href="#"><img src="{{ asset($producto->imagen)}}" class="img-fluid img-thumbnail"></a> 
                            
                        </div>
                        
                        <div class="col-md-3 d-flex justify-content-end">
                            <a href="{{ route('productos-edit',['id' => $producto->id])}}"> {{$producto->precio}}</a> 
                        </div>
                     
                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('productos-destroy',[$producto->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button  class="btn btn-danger btn-sm">Borrar</button>
                            </form>    
                        </div>
                    </div>   

                @endforeach
            </div>    
           

            
        </div>
    </body>
</html>

