<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pedido;
use Session;
use Illuminate\Http\Request;

class PedidoController extends Controller
{   
    public function getMisCotizaciones(Request $request)
    {
        $pedido = Pedido::all();
        return response()->json($pedido, 200);
    }


    public function store(Request $request){
        
       $requestData = $request->all(); 

      if($request->file('file')) {
         $file = $request->file('file');
         $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'files';

         // Upload file
        $img = $file->move($location,$filename);
        $requestData['file'] = $img;

        $pedido = Pedido::create($requestData);


        Session::flash('message','Cotizacion Enviada Exitosamente');
        Session::flash('alert-class', 'alert-success');

      }else{

        Session::flash('message','Cotizacion No Enviada.');
        Session::flash('alert-class', 'alert-danger');
      }
        return redirect()->route('venta.index'); 
   }
}
