<?php

namespace App\Http\Controllers;

use App\Cliente;
use Session;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $nombre = $request->get('buscarpor');
        $cliente = Cliente::where('nombre','like',"%$nombre%")->latest()->get();
        
        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'num_carnet' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'whatsapp' => 'required',
            'email' => 'nullable',
            'descripcion' => 'nullable',
            'user' => 'nullable',
        ]);
        
        Cliente::create([
            'nombre' => $request->nombre,
            'num_carnet' => $request->num_carnet,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'descripcion' => $request->descripcion,
            'user' => $request->user,
        ]);
        
        Session::flash('message','Cliente creado exisitosamente!');
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return view('cliente.edit', ['cliente' =>Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required',
            'num_carnet' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'whatsapp' => 'required',
            'email' => 'nullable',
            'descripcion' => 'nullable',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->nombre = $request->get('nombre');
        $cliente->num_carnet = $request->get('num_carnet');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->whatsapp = $request->get('whatsapp');
        $cliente->email = $request->get('email');
        $cliente->descripcion = $request->get('descripcion');
        $cliente->update();

        Session::flash('message','Cliente Editado Exisitosamente!');
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        Session::flash('message','Cliente eliminado exitosamente!');
        return redirect()->route('cliente.index'); 
    }
}
