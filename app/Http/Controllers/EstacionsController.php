<?php

namespace App\Http\Controllers;
use App\Models\Estacion;
use App\Models\Linea;
use Illuminate\Http\Request;

class EstacionsController extends Controller
{
    public function store(Request $request){
        $request->validate(['nombre' => 'required||min:3']);
        $estacion=new Estacion;
        $estacion->nombre=$request->nombre;
        $estacion->linea_id=$request->linea_id;

        $estacion->save();
        return redirect()->route('estaciones')->with('success','Estacion ingresada con éxito');
    }
    public function index(){
        $estaciones=Estacion::all();
        $lineas=Linea::all();
        return view('estaciones.index',['estaciones'=>$estaciones , 'lineas' => $lineas]);
    }
    public function show($id){
        $estacion=Estacion::find($id);
        return view('estaciones.show',['estacion'=>$estacion]);
    }
    public function update(Request $request,$id){
        $estacion=Estacion::find($id);
        $estacion->nombre=$request->nombre;
        $estacion->save();
        return redirect()->route('estaciones')->with('success','nombre de estacion actualizado');


    }
    public function destroy($id){
        $estacion=Estacion::find($id);
        $estacion->delete();
        //dd($estacion);
        return redirect()->route('lineas.show',[$estacion->linea_id])->with('success','estacion borrada con exito');
    }
    //
}
