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

        
        $cant_inventario - $request->cantidad;
        if($cant_inventario > 0){

            $carrito = Carrito::create($request->all()); 

            }else{
                return 0;
            }
           

            return response()->json($carrito, 201);
            //Verificar inventario
        }
    }

    public function getPedido(Request $request){
        return Carrito::orderBy('created_at', 'asc')->where('confirmacion','false')->get();
		
	}
    //para admi visualizar todos los pedidos y despacho solo los que faltan 
	
	public function delete($id){
        $carrito = Carrito::findOrFail($id);

        $carrito->delete();

        return response()->json($carrito, 200); 
    }
}
