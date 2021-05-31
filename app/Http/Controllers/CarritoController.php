<?php

namespace App\Http\Controllers;

use App\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCartAttribute(Request $request, $id){
        $carrito = Carrito::where('estado','false')
        ->where('carritos.user_id', '=', $id)
        ->first();

        return response()->json($carrito, 201);

    }

     public function guardarCarrito(Request $request){

        $carrito = Carrito::create($request->all());
        return response()->json($carrito, 200);
    }
    

    public function getPedido(Request $request){
        return Carrito::orderBy('created_at', 'asc')->where('confirmacion','false')->get();
	}

     public function updateStatusCart(Request $request, $id){
        
        $carrito = Carrito::findOrFail($id);
        $carrito->update($request->all());

        return response()->json($carrito, 200);
    }

}
