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

  	public function guardarPedido(Request $request){

        $carrito = Carrito::create($request->all());
        
        return response()->json($carrito, 201);
    }

    public function getPedido(Request $request){
        return Carrito::orderBy('created_at', 'asc')->where('confirmacion','false')->get();
		
	}
	
	public function delete($id){
        $carrito = Carrito::findOrFail($id);

        $carrito->delete();

        return response()->json($carrito, 200); 
    }
}
