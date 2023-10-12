<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Models\Usuarios;
use App\Models\User;
use App\Mail\PinCorreo;
class UsuariosController extends Controller
{
    //
    public function store(Request $request){
        $request->validate(['nombre'=>'required|min:3', 'correo' => 'required|min:4|email','clave' => 'required|min:4']);
        $usuario=new Usuarios;
        $usuario->nombre=$request->nombre;
        $usuario->correo=$request->correo;
        $cifrado=Hash::make($request->clave);
        $usuario->clave=$cifrado;
        $usuario->save();
        return redirect('login')->with('creado','Has sido registrado con éxito');
        


      
    }
    public function update(Request $request){
        $id = Usuarios::where('correo', $request->correo)->first()->id;
        //dd($id);
        $usuario=Usuarios::find($id);
        //dd($usuario);

        $numero_aleatorio=mt_rand(100000,999999);
        //$pin=strval($numero_aleatorio);
        $cadena_libre=Str::random(6);
        $usuario->clave=Hash::make($cadena_libre);
        //$usuario->clave=Crypt::encrypt($cadena_libre)
        //$usuario->clave=Crypt::encryptString($cadena_libre);
        //$usuario->clave=$cadena_libre;
        $email=$usuario->correo;
        $aviso="Ha sido enviado un pin a su correo electrónico";
        Mail::to($usuario->correo)->send(new PinCorreo($cadena_libre));
        $usuario->save();
        return view('nueva_clave',['email'=>$email,'aviso'=>$aviso,'cadena_libre'=>$cadena_libre]);
        //return redirect()->route('index')->with('pin','Pin enviado con exito');
       

    }
    public function generarnuevaclave(Request $request){
        $usuario=User::where('correo',$request->correo)->first();
        $inputemail=$request->correo;
        $comparado="";
        $request->validate(['pin' => 'required|min:6', 'clave' => 'required|min:4', 'confirmclave'=>'required|min:4']);
        if(Hash::check($request->pin,$usuario->clave)){
            if($request->confirmclave==$request->clave){
                $comparado="Las claves coinciden";
                $usuario->clave=Hash::make($request->clave);
                $usuario->save();
                return redirect()->route('index')->with('nuevapass','Su clave ha sido actualizada con éxito');
            }
        }         


        


    }

}
