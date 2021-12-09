<?php

namespace App\Http\Controllers;

use App\Favorito;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFavoritos(Request $request){
        return Favorito::all();
    }

    public function getMisFavoritos(Request $request, $id){
        $favorito = Favorito::where('favoritos.user_id', '=', $id)->orderBy('created_at', 'desc')
        ->get();

        return response()->json($favorito, 200);
    }

    public function index(Request $request){

        $buscar = $request->get('buscarpor');

        $favorito = Favorito::where('id','like',"%$buscar%")->latest()->paginate(10);
        return view('favoritos.index', ['favorito' => $favorito]);
    }

    public function guardarFavorito(Request $request){

       $favorito = Favorito::create($request->all());
       
       return response()->json($favorito, 201);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->all();

        $exit = Favorito::where(function($q1)use($request){
            if($request->articulo_id){
                $q1->where('user_id',$request->user_id)->where('articulo_id',$request->articulo_id);
            }
        })
        // ->orWhere(function($q1)use($request){
        //     if($request->bono_id){
        //     $q1->where('user_id',$request->user_id)->where('bono_id',$request->bono_id);
        //     }

        // })
        // ->orWhere(function($q1)use($request){
        //     if($request->titulo_id){
        //     $q1->where('user_id',$request->user_id)->where('titulo_id',$request->titulo_id);
        //     }
        //})
        ->get();
        if(count($exit) == 0){
            Favorito::create([
                'nombre' => $request->nombre,
                'tipo_comprobante' => $request->tipo_comprobante,
                'imagen' => $request->imagen,
                'precio' => $request->precio,
                'num_comprobante' => $request->num_comprobante,
                'fecha' => $request->fecha,
                'cantidad' => $request->cantidad,
                'unidad' => $request->unidad,
                'precio_compra' => $request->precio_compra,
                'precio_venta' => $request->precio_venta,
                'descripcion' => $request->descripcion,
                'flag_carrito' => $request->flag_carrito,

                'articulo_id' => $request->articulo_id,
                'user_id' => $request->user_id,

            ]);
            Session::flash('message','Agregado a Favoritos!');
        }else{
            Session::flash('message','Ya esta agregado a Favoritos!');
        }
        return redirect()->route('favoritos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorito = Favorito::findOrFail($id);

        $favorito->delete();

        Session::flash('message','Favorito eliminado exitosamente!');
        return redirect()->route('favoritos.index');
    }

     public function delete($id){
        $favorito = Favorito::findOrFail($id);

        $favorito->delete();

        return response()->json($favorito, 200); 
    }
}
