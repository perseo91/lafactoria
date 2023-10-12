@extends('blogs.app')
@section('content')
<div class="container w-25 border p4 mt-4">
    <h3>Envio de correo electrónico </h3>
    <form action="{{ route('enviar-correo')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session('success'))
        <li>{{ session('success')}}</li>
        @endif
        <div class="mb-3 d-flex justify-content-end">
            <input type="hidden" name="destinatario" value="{{ env('MAIL_USERNAME')}}" class="form-control">
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <label for="">Nombre </label>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" name="nombre"  class="form-control" required>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <label for="">Correo electrónico </label>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="email" name="correo"  class="form-control" required>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <textarea name="mensaje" rows="3" > </textarea>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <input type="file" name="adjunto">
        </div>

        <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit">Registrar</button>
        </div>
    </form>
</div>
@endsection