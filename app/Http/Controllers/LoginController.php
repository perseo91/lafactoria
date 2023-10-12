<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $credenciales=$request->only('email','password');
        $request->validate(['email' => 'min:3 |required|email','password' =>'min:3|required']);
        $remember=$request->filled('remember');
        $usuario=User::where('correo',$request->email)->first();
        if(Hash::check($request->password,$usuario->clave)){
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect('dashboard')->with('status','Usuario ingresado correctamente');
        }  
        throw ValidationException::withMessages(['email'=> __('auth.failed')]);   
        return redirect('login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status','Sesion cerrada correctamente');
    }
}
