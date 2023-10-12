<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    //
    public function store(Request $request){
        $request->validate(['titulo'=>'required|min:3', 'descripcion' => 'required|min:3','imagen'=>'image']);
        $blog=new Blog;
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/blogs/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $blog->imagen=$rutadestino.$filename;
        }
        $blog->titulo=$request->titulo;
        $blog->descripcion=$request->descripcion;
        $blog->save();
        return redirect()->route('blogs')->with('success','Blog almacenado con éxito');
    }
    public function index_blog(){
        $blogs=Blog::get();
        $subset = $blogs->map->only(['id', 'titulo', 'descripcion','imagen']);
        $lista= $subset->map(function($item) {
         
         $porcion=explode(" ",$item['descripcion']);
         $detalle=implode(PHP_EOL,(array_slice($porcion, 0,12)));
 
            return [$item['id'],$item['titulo'],$detalle,$item['imagen']];
        });
         return view('blogs.panorama',['lista'=>$lista]);
    }
    /*public function index_blog(){
        $blogs=Blog::get();
        
 
        $subset = $blogs->map->only(['id', 'titulo', 'descripcion','imagen']);
       $lista= $subset->map(function($item) {
        $porcion=explode(".",$item['descripcion']);
           return [$item['id'],$item['titulo'],$porcion[0],$item['imagen']];
        
           
        });
       //dd($lista);
      return view('blogs.panorama',['lista'=>$lista]);
    }*/
    public function index(){
        $blogs=Blog::get();
        $subset = $blogs->map->only(['id', 'titulo', 'descripcion','imagen']);
       $lista= $subset->map(function($item) {
        
        $porcion=explode(" ",$item['descripcion']);
        $detalle=implode(PHP_EOL,(array_slice($porcion, 0,12)));

           return [$item['id'],$item['titulo'],$detalle,$item['imagen']];
       });
        return view('blogs.index',['lista'=>$lista]);
    }
    public function show_detalle($id){

        $blog=Blog::find($id);
        return view('blogs.detalle',['blog'=>$blog]);
    }
    public function show($id){
        $blog=Blog::find($id);
        return view('blogs.show',['blog'=> $blog]);
    }

    public function update(Request $request, $id){
        $blog=Blog::find($id);
        if ($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/blogs/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $blog->imagen=$rutadestino.$filename;
        }
        $blog->titulo=$request->titulo;
        $blog->descripcion=$request->descripcion;
        $blog->save();
        return redirect()->route('blogs')->with('success','Registro actualizado con exito');
    }
    public function destroy($id){

        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs')->with('success','Registro borrado de la base de datos');
        
    }

}
