<?php

namespace App\Http\Controllers;
use App\Models\Linea;
use Illuminate\Http\Request;

class LineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineas=Linea::all();
        return view('lineas.index',['lineas'=> $lineas]);

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
        $request->validate(['nombre' => 'required|unique:lineas|max:50', 'color'=> 'required|max:7']);
        $linea=new Linea;
        $linea->nombre=$request->nombre;
        $linea->color=$request->color;
        $linea->save();
        return redirect()->route('lineas.index')->with('success','Registro guardado con exito');
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
        $linea=Linea::find($id);
        return view('lineas.show',['linea'=>$linea]);

        //
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
        $linea=Linea::find($id);
        $linea->nombre=$request->nombre;
        $linea->color=$request->color;
        $linea->save();
        return redirect()->route('lineas.index')->with('success','Registro actualizado');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linea=Linea::find($id);
        $linea->estaciones()->each(function($estacion){
            $estacion->delete();
        });
        $linea->delete();
        return redirect()->route('lineas.index')->with('success','Registro borrado con exito');

        //
    }
}
