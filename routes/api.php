<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Articulo;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CarritoDetalleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
   
});

Auth::routes();

Route::post('login', 'UserController@login'); //ESTE FUNCIONA
Route::get("logout", 'UserController@logout');


Route::get('favoritos',[FavoritoController::class, 'getFavoritos']);
Route::get('getNovedades',[ArticuloController::class, 'getNovedades']);
Route::get('articulo/{id}',[ArticuloController::class, 'showArticulo']);
Route::get('articulos',[ArticuloController::class, 'getArticulos']);
Route::get('getPedido',[CarritoController::class, 'getPedido']);
Route::get('getCartAttribute/{id}', [CarritoController::class,'getCartAttribute']);
Route::get('carritoProductosIonic/{id}',[CarritoDetalleController::class, 'carritoProductosIonic']);
Route::get('getMisCotizaciones', [CarritoController::class,'getMisCotizaciones']); 
Route::get('getNovedadesIonic',[ArticuloController::class, 'getNovedadesIonic']);
Route::get('getNovedadesIonicBuscador',[ArticuloController::class, 'getNovedadesIonicBuscador']);
Route::get('usuariosStorage/{id}',[UserController::class, 'usuariosStorage']);

Route::get('getMisCotizaciones/{id}', [PedidoController::class,'getMisCotizaciones']); 
Route::get('downloads/{file}','PedidoController@download')->name('downloads');

Route::post('guardarFavorito',[FavoritoController::class, 'guardarFavorito']);
Route::post('guardarPedido',[CarritoDetalleController::class, 'guardarPedido']);
Route::post('guardarPedidoRealizado',[VentaController::class, 'guardarPedidoRealizado']);
Route::post('guardarCarrito',[CarritoController::class, 'guardarCarrito']);
Route::post('registerIonic',[UserController::class, 'registerIonic']);

Route::put('controlInventario/{id}', [CarritoDetalleController::class,'controlInventario']);
Route::put('controlInventarioDevolver/{id}/{cantidadPedido}', [CarritoDetalleController::class,'controlInventarioDevolver']);

Route::put('updateStatusCart/{id}', [CarritoController::class,'updateStatusCart']);

Route::delete('favoritoDelete/{id}/', [FavoritoController::class, 'delete']);
Route::delete('pedidoDelete/{id}/', [CarritoDetalleController::class, 'delete']);

Route::get('images/{filename}', function ($filename)
{
    $file = \Illuminate\Support\Facades\Storage::get($filename);
    return response($file, 200)->header('Content-Type', 'image/jpeg');
});
