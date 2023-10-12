<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Grupo;

class ArticulosController extends Controller
{
    //

    public function store(Request $request){
        $request->validate(['nombre' => 'required|min:3', 'precio' => 'required', 'imagen'=>'image']);
        $articulo=new Articulo;
        if ($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/articulos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $articulo->imagen=$rutadestino.$filename;
        }
        $articulo->nombre=$request->nombre;
        $articulo->precio=$request->precio;
        $articulo->grupo_id=$request->grupo_id;
        $articulo->save();
        return redirect()->route('articulos')->with('success','Articulo almacenado con éxito');
    }
    public function index(){
        $articulos=Articulo::all();
        $grupos=Grupo::all();
        return view('articulos.index',['articulos'=> $articulos , 'grupos' => $grupos]);
    }
    public function index_catalogo(){
        $articulos=Articulo::get();
        $subset = $articulos->map->only(['id', 'nombre','precio','imagen']);
        $lista= $subset->map(function($item) {
            return [$item['id'],$item['nombre'],$item['precio'],$item['imagen']];
        });
         return view('articulos.catalogo',['lista'=>$lista]);
    }
    public function detalle_articulo($id){
        $articulo=Articulo::find($id);
        return view('articulos.detalle',['articulo' => $articulo]);

    }
    public function destroy($id){
        $articulo=Articulo::find($id);
        $articulo->delete();
        return redirect()->route('articulos')->with('success','Articulo borrado');
    }
    public function update(Request $request,$id){
        $articulo=Articulo::find($id);
        if ($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/articulos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $articulo->imagen=$rutadestino.$filename;
        }
        $articulo->nombre=$request->nombre;
        $articulo->precio=$request->precio;
        $articulo->save();
        return redirect()->route('articulos')->with('success','Articulo actualizado con éxito');
        
    }
    public function show($id){
        $articulo=Articulo::find($id);
        $grupo=Grupo::find($id);
        return view ('articulos.show',['articulo' => $articulo ,'grupo' => $grupo]);
    }
}
