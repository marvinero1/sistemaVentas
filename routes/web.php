<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::put('articulo/{articulo}/addNovedad','ArticuloController@addNovedad')->name('articulo.addNovedad'); 

    Route::resource('articulos', 'ArticuloController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('proveedor', 'ProveedorController');
    Route::resource('subcategorias', 'SubcategoriaController');
    Route::resource('venta', 'VentaController');
 });
