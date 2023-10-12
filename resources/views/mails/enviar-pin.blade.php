<h3> Tu nuevo pin de acceso es </h3>
<p>
@isset($mensaje)
 {{$mensaje}}
@endisset
</p>
<p>Este pin es de uso temporal, por favor reemplazar este pin por una nueva contraseña</p>

<h4> Para cambiar su clave ingrese a este link <a href="{{ route('nueva_clave')}}" target="_blank" >Ingrese aquí</a></h4>