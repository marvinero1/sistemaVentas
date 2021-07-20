<?php

namespace App\Http\Controllers;

use App\Subcategoria;
use App\Categoria;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all();
        $subcategoria = subcategoria::where('nombre','like',"%$nombre%")
        ->latest()->paginate(10);

        return view('subcategoria.index', compact('categoria','subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view('subcategoria.create', compact('categoria'));
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
            'descripcion' => 'nullable',

        ]);

        subcategoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
        ]);

        Session::flash('message','Sub-Categoria creado exisitosamente!');
        return redirect()->route('subcategorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategoria $subcategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all();
        return view('subcategoria.edit', ['subcategoria' =>subcategoria::findOrFail($id),'categoria'=>Categoria::all() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::all();

        $request->all();

        $subcategoria = subcategoria::find($id);

        $subcategoria->nombre = $request->get('nombre');
        $subcategoria->descripcion = $request->get('descripcion');

        $subcategoria->update();

        Session::flash('message','Sub-Categoria Editado Exisitosamente!');
        return redirect()->route('subcategorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $subcategoria = subcategoria::findOrFail($id);

        $subcategoria->delete();

        Session::flash('message','Sub-Categoria Eliminado exitosamente!');
        return redirect()->route('subcategorias.index');
    }
}
