<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pedido;
use App\User;
use App\Carrito;
use App\carrito_detalle;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class PedidoController extends Controller{
    
    public function index(Request $request)
    {
        $importadora = $request->get('buscarpor');
        $user = User::all()->sortBy('name');

        $carrito = Carrito::where('carritos.confirmacion', '=', 'false')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         
        //dd( $producto );
        return view('pedidos.index', compact('carrito', 'user'));
    }

    public function ventaConfirmada(Request $request){

        $user = User::all()->sortBy('name');

        $pedido = Pedido::where('pedidos.estado', '=', 'true')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
         
        //dd( $producto );
        return view('pedidos.index', compact('pedido', 'user'));
    }

    public function getMisCotizaciones(Request $request, $id){

        $pedido = Pedido::where('pedidos.user_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($pedido, 200);
    }

    public function store(Request $request){
        
        $id = $request->carrito_id;
        $totalTotal = 0;
        $carrito = Carrito::findOrFail($id);
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();
        
        $requestData = $request->all(); 

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $requestData['file'] = auth()->id() .'_'. time() .'_'. $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('files', $requestData['file']);
        }
        $pedido = Pedido::create($requestData);

        $mensaje= 'Cotizacion Enviada Exitosamente';

        Session::flash('message',$mensaje);

        return back()->withInput();
   }

   public function download(Request $request, $file){

        //dd($request->all());
       
        //dd(json_encode($request->file));
        $file = $request->file;

        $path = storage_path("app/files/". $file);

        return response()->download($path);

      
    }
}
