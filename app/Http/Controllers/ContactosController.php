<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index(Request $nombre, Request $correo){
        return view('mails.enviar-correo', ['nombre'=>$nombre,'correo'=>$correo]);
    }
}
