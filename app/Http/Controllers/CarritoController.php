<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
  	public function guardarPedido(Request $request){
        $carrito = Carrito::create($request->all());
        return response()->json($carrito, 201);
    }
}
