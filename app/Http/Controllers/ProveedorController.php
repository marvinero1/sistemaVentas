<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Session;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $nombre = $request->get('buscarpor');
        $proveedor = Proveedor::where('nombre','like',"%$nombre%")->latest()->get();
        
        return view('proveedor.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'nullable',
            'descripcion' => 'nullable',
            'user' => 'nullable',
        ]);
        
        Proveedor::create([
            'nombre' => $request->nombre,
            'nit' => $request->nit,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'descripcion' => $request->descripcion,
            'user' => $request->user,
        ]);
        
        Session::flash('message','Proveedor creado exisitosamente!');
        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('proveedor.edit', ['proveedor' =>Proveedor::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);

        $request->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'nullable',
            'descripcion' => 'nullable',
            'user' => 'nullable',
        ]);

        $proveedor = Proveedor::findOrFail($id);

        $proveedor->nombre = $request->get('nombre');
        $proveedor->nit = $request->get('nit');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->descripcion = $request->get('descripcion');
        $proveedor->update(); 
        
        Session::flash('message','Proveedor Editado Exisitosamente!');
        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        Session::flash('message','Proveedor eliminado exitosamente!');
        return redirect()->route('proveedor.index'); 
    }
}
