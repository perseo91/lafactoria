<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\EnviarCorreo;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EstacionsController;
use App\Http\Controllers\LineasController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// rutas de vistas principales
Route::get('/', function () {
    return view('welcome');
});
Route::get('/todos', function () {
    return view('todos.index');
});
Route::get('/productos', function () {
    return view('productos.index');
});
Route::get('/estaciones', function () {
    return view('estaciones.index');
});
Route::get('/articulos', function () {
    return view('articulos.index');
});
Route::get('/grupos', function () {
    return view('grupos.index');
});
Route::get('/blogs', function () {
    return view('blogs.index');
});
Route::get('/contacto', function () {
    return view('contacto.home');
})->name('home-contacto');
//rutas de usuarios
Route::view('/', 'index')->name('index');
Route::view('login','login')->name('login')->middleware('guest');
Route::view('dashboard','dashboard')->middleware('auth')->name('dashboard');
Route::view('logout','logout')->name('logout');
Route::view('nueva_clave','nueva_clave')->name('nueva_clave');
Route::view('reset_password','reset_password')->name('reset_password');
Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout']);
Route::patch('nueva_clave',[UsuariosController::class,'update'])->name('usuarios-generarpin');

//rutas de correo
Route::post('enviar-correo', function () {
    Mail::to(request()->destinatario)->cc('oscarfabianparra@gmail.com')->send(new EnviarCorreo(request()->mensaje, request()->adjunto, request()->nombre , request()->correo));
    return redirect()->route('home')->with('success','Message has been send successfully');
})->name('enviar-correo');
//rutas de blog
Route::post('/blogs', [BlogsController::class,'store'])->name('blogs');
Route::get('/blogs-panorama', [BlogsController::class,'index_blog'])->name('blogs-panorama');
Route::get('/blogs-detalle{id}', [BlogsController::class,'show_detalle'])->name('blogs-detalle');
Route::get('/blogs', [BlogsController::class,'index'])->name('blogs');
Route::get('/blogs{id}', [BlogsController::class,'show'])->name('blogs-show');
Route::patch('/blogs{id}', [BlogsController::class,'update'])->name('blogs-update');
Route::delete('/blogs{id}', [BlogsController::class,'destroy'])->name('blogs-delete');
//rutas de grupo
Route::post('/grupos', [GruposController::class,'store'])->name('grupos');
Route::get('/grupos', [GruposController::class,'index'])->name('grupos');
Route::get('/grupos{id}', [GruposController::class,'show'])->name('grupos-show');
Route::patch('/grupos{id}', [GruposController::class,'update'])->name('grupos-update');
Route::delete('/grupos{id}', [GruposController::class,'destroy'])->name('grupos-delete');
//rutas de articulos
Route::get('/articulos{id}',[ArticulosController::class,'show'])->name('articulos-show');
Route::post('/articulos',[ArticulosController::class,'store'])->name('articulos');
Route::get('/articulos',[ArticulosController::class,'index'])->name('articulos');
Route::patch('/articulos{id}',[ArticulosController::class,'update'])->name('articulos-update');
Route::delete('/articulos{id}',[ArticulosController::class,'destroy'])->name('articulos-delete');
Route::get('/catalogo',[ArticulosController::class,'index_catalogo'])->name('catalogo');
Route::get('/detalle-articulo{id}',[ArticulosController::class,'detalle_articulo'])->name('detalle-articulo');


//rutas de estaciones
Route::post('/estaciones',[EstacionsController::class,'store'] )->name('estaciones');
Route::get('/estaciones',[EstacionsController::class,'index'] )->name('estaciones');
Route::get('/estaciones/{id}',[EstacionsController::class,'show'] )->name('estaciones-edit');
Route::patch('/estaciones/{id}',[EstacionsController::class,'update'] )->name('estaciones-update');
Route::delete('/estaciones/{id}',[EstacionsController::class,'destroy'] )->name('estaciones-delete');
//rutas de productos
Route::post('/productos',[ProductosController::class,'store'])->name('productos');
Route::get('/productos',[ProductosController::class,'index'])->name('productos');
Route::get('/productos/{id}',[ProductosController::class,'show'])->name('productos-edit');
Route::patch('/productos/{id}',[ProductosController::class,'update'])->name('productos-update');
Route::delete('/productos/{id}',[ProductosController::class,'destroy'])->name('productos-destroy');
Route::get('/crear',[ProductosController::class,'crear']);
Route::post('/crear-producto',[ProductosController::class,'hacerProducto'])->name('crear-producto');
Route::get('/tienda',[ProductosController::class,'index_tienda'])->name('tienda');
Route::get('/detalle-producto{id}',[ProductosController::class,'detalle_producto'])->name('detalle-producto');
Route::get('add-to-cart/{id}',[ProductosController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductosController::class, 'carroUpdate'])->name('update_cart');
Route::delete('remove-from-cart', [ProductosController::class, 'carroRemove'])->name('remove_from_cart');
Route::get('/products', [ProductosController::class, 'index_products'])->name('products');
//rutas carro de compras
Route::get('cart', [ProductosController::class, 'cart'])->name('cart');
//rutas de todos
Route::get('/todos', [TodosController::class ,'index'])->name('todos');
Route::patch('/todos', [TodosController::class ,'index'])->name('todos-edit');
Route::get('/todos', [TodosController::class ,'index'])->name('todos-destroy');
Route::post('/todos', [TodosController::class ,'store'])->name('todos');
//rutas de lineas
Route::resource('lineas', LineasController::class);
//rutas de usuarios
Route::post('usuarios',[UsuariosController::class,'store'])->name('usuarios');
Route::patch('/usuarios-generarnuevaclave',[UsuariosController::class,'generarnuevaclave'])->name('usuarios-generarnuevaclave');
// rutas de item
Route::get('item', [ItemController::class, 'index']);