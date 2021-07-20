<?php

namespace App\Http\Controllers;

use App\Categoria;
use Session;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $nombre = $request->get('buscarpor');
        
        $categoria = Categoria::where('nombre','like',"%$nombre%")->latest()->get();
        
        return view('categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'descripcion' => 'nullable',
            'user' => 'nullable',
        ]);
        
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'user' => $request->user,
        ]);
        
        Session::flash('message','Categoria creado exisitosamente!');
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        Session::flash('message','Categoria Eliminado exitosamente!');
        return redirect()->route('categorias.index');
    }
}
