<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="/build/assets/app-e775fb79.css" rel="stylesheet">-->
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <body>
    
   
    <!--<script src="/js/funciones.js"> </script> -->
    <script type="module" src="/build/assets/app-f1a80ee9.js"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('index')}}">Home</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blogs-panorama')}}">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products')}}">Tienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('productos')}}">Productos</a>
            </li>
            <li class="nav-item">
              <form style="display:inline" action="/logout" method="POST">
                @csrf
                <a class="nav-link" href="#" onclick="this.closest('form').submit()">Logout</a>
              </form>  
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login')}}">Login</a>
            </li>
              @endauth
            <li class="nav-item">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <ul class="dropdown-menu">
                  <div class="row total-header-section">
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                      @php $total += $details['precio'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                      <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                    </div>
                  </div>
                  @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                      <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                          <img src="{{ $details['imagen'] }}" />
                        </div>
                      <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                        <p>{{ $details['nombre'] }}</p>
                        <span class="price text-info"> ${{ $details['precio'] }}</span> <span class="count"> Cantidad:{{ $details['quantity'] }}</span>
                      </div>
                    </div>
                    @endforeach
                  @endif
                  <div class="container">
                  <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                      <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Ver resumen</a>
                    </div>
                  </div>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status')}}</h6>
      @endif
      @if (session('creado'))
    <h6 class="alert alert-success">{{ session('creado')}}</h6>
      @endif
      @if (session('carrito-success'))
    <h6 class="alert alert-success">{{ session('carrito-success')}}</h6>
      @endif
      @yield('content')
      @yield('scripts')
  </body>
</html>
