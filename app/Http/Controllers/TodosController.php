<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    public function store(Request $request){
        $request->validate(['title'=>'required|min:3']);
        $todo=new Todo;
        $todo->title=$request->title;
        $todo->save();
        return redirect()->route('todos')->with('success','Registro guardado con exito');
        //return redirect()->back();

    }
    public function index(){
        $todo=Todo::all();
        return view('todos.index',['todos' => $todo]);

    }
}
