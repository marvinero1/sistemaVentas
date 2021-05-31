<?php

namespace App\Http\Controllers;

use App\carrito_detalle;
use App\Carrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarritoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){   

        
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function guardarPedido(Request $request){

        // $cant_inventario = 0; 
        $cant_inventario = $request->cantidad;
        $error = "Cantidad insuficiente";
        if($cant_inventario > 0){

            $carrito_detalle = carrito_detalle::create($request->all()); 

            }else{
                return $error;
            }

            return response()->json($carrito_detalle, 201);
            //Verificar inventario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function show(carrito_detalle $carrito_detalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito_detalle $carrito_detalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrito_detalle $carrito_detalle)
    {
        //
    }

    public function carritoProductosIonic(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id)->first();
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

        //dd($carrito_detalle);
        return response()->json($carrito_detalle, 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito_detalle $carrito_detalle)
    {
        //
    }

    public function delete($id){
        $carrito_detalle = carrito_detalle::find($id);

        $carrito_detalle->delete();

        return response()->json($carrito_detalle, 200); 
    }
}
