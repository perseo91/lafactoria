<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function store(Request $request){
        $request->validate(['nombre'=> 'required||min:3','precio' => 'required']);
        $producto=new Producto;
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/blogs/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $producto->imagen=$rutadestino.$filename;
        }
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->caracteristica=$request->caracteristica;
        $producto->save();
        return redirect()->route('productos')->with('success','Producto almacenado con exito');
    }
    public function index(){
        $productos=Producto::all();
        return view('productos.index',['productos'=>$productos]);
    }
    public function index_products()
    {
        $products = Producto::all();
        return view('productos.products', compact('products'));
    }
    public function show ($id){
       $producto=Producto::find($id);
       return view('productos.show',['producto'=> $producto]);
    }
    public function update(Request $request, $id){

        $producto=Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        //dd($request);
        $producto->save();
        return redirect()->route('productos')->with('success','Producto actualizado');
    }
    public function destroy($id){
        $producto=Producto::find($id);
        //dd($producto);
        $producto->delete();
        return redirect()->route('productos')->with('success',"Producto ha sido eliminado");
    }
    
    public function crear()
    {
        $input = [
            'nombre' => 'Cerveza Budweiser',
            'precio'=> 6300,
            'descripcion' => 'Pack 6 un. Cerveza Budweiser Lager lata 354 cc',
            'caracteristica' => [
                '1' => 'Origen: Checa',
                '2' => 'Alc°: 4,5 grados',
                '3' => 'Estilo: Lager'
            ]
        ];
  
        $producto = Producto::create($input);
  
        dd($producto->caracteristica);
  
    }

    public function hacerProducto(Request $request)
    {   
        
        if ($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $rutadestino='imagenes/productos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $subida=$request->file('imagen')->move($rutadestino,$filename);
            $request->imagen=$rutadestino.$filename;
        }
        $input = [
            'nombre' => $request->nombre,
            'precio'=> $request->precio,
            'imagen' => $request->imagen,
            'descripcion' => $request->descripcion,
            'caracteristica' => [
                '1' => $request->c1,
                '2' => $request->c2,
                '3' => $request->c3,
                '4' => $request->c4,
                '5' => $request->c5
            ]
        ];
  
        $producto = Producto::create($input);
  
        dd($producto->caracteristica);
  
    }

    public function index_tienda(){
        $productos=Producto::get();
        $subset = $productos->map->only(['id', 'nombre','precio','imagen','caracteristica']);
        $lista= $subset->map(function($item) {
            return [$item['id'],$item['nombre'],$item['precio'],$item['imagen'], $item['caracteristica']];
        });
         return view('productos.tienda',['lista'=>$lista]);
    }
    public function detalle_producto($id){
        $producto=Producto::find($id);
        return view('productos.detalle',['producto' => $producto]);

    }
    public function addToCart($id){
        $producto=Producto::findOrFail($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen,
                "quantity" => 1
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('carrito-success','Producto agregado al carro exitosamente!');
    }
    public function cart()
    {
        return view('productos.cart');
    }
    public function carroUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Carro actualizado correctamente!');
        }
    }
 
    public function carroRemove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Producto removido exitosamente!');
        }
    }


    //
}
