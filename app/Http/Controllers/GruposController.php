<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=Grupo::all();
        return view('grupos.index',['grupos'=> $grupos]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre'=> 'required|unique:grupos|min:3','color'=>'required|max:7']);
        $grupo=new Grupo;
        $grupo->nombre=$request->nombre;
        $grupo->color=$request->color;
        $grupo->save();
        return redirect()->route('grupos')->with('success',"Grupo ingresado con éxito");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo=Grupo::find($id);
        return view('grupos.show',['grupo'=>$grupo]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $grupo=Grupo::find($id);
        $grupo->nombre=$request->nombre;
        $grupo->color=$request->color;
        $grupo->save();
        return redirect()->route('grupos')->with('success','Grupo actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo=Grupo::find($id);
        $grupo->articulos->each(function($articulo){
            $articulo->delete();
        });
        $grupo->delete();
        return redirect()->route('grupos')->with('success','Grupo eliminado con éxito');
        //
    }
}
