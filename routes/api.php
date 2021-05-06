<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Articulo;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FavoritoController;


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
    return $request->user();
});

Auth::routes();

Route::get('favoritos',[FavoritoController::class, 'getFavoritos']);
Route::get('getNovedades',[ArticuloController::class, 'getNovedades']);
Route::get('articulo/{id}',[ArticuloController::class, 'showArticulo']);
Route::delete('favoritoDelete/{id}/', [FavoritoController::class, 'delete']);
Route::delete('pedidoDelete/{id}/', [CarritoController::class, 'delete']);
Route::get('articulos',[ArticuloController::class, 'getArticulos']);
Route::get('getPedido',[CarritoController::class, 'getPedido']);

Route::post('guardarFavorito',[FavoritoController::class, 'guardarFavorito']);
Route::post('guardarPedido',[CarritoController::class, 'guardarPedido']);



Route::get('images/{filename}', function ($filename)
{
    $file = \Illuminate\Support\Facades\Storage::get($filename);
    return response($file, 200)->header('Content-Type', 'image/jpeg');
});
