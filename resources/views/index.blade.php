@extends('app')
@section('content')
<h3>Pagina de inicio</h3>
@if(session('pin'))
    <h6 class="alert alert-success">{{session('pin')}}</h6>
@endif
@if(session('nuevapass'))
    <h6 class="alert alert-success">{{session('nuevapass')}}</h6>
@endif

@endsection