<?php

namespace App\Http\Controllers;

use App\Venta;
use App\User;
use App\Carrito;
use App\carrito_detalle;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $descripcion = $request->get('buscarpor');

        $carrito = Carrito::where('descripcion','like',"%$descripcion%")->where('estado','false')->paginate(10);

        //dd($carrito_detalle);
        return view('ventas.index', compact('carrito'));
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

     public function guardarPedidoRealizado(Request $request){

        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
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
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id);
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

         $totalTotal = 0;
        foreach($carrito_detalle as $carrito_detalles){
            $total = $carrito_detalles->cantidad_pedido * $carrito_detalles->precio_venta;
            $totalTotal +=  $total;
        }
         

        //dd($carrito_detalle);
        return view('ventas.show', compact('carrito_detalle','carrito','total','totalTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
