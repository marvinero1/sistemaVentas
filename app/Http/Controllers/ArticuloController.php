<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use App\Subcategoria;
use App\Proveedor;
use File;
use Session;
use DB;
use Image;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all()->sortBy('nombre');
        $articulo = Articulo::where('nombre','like',"%$nombre%")->latest()->paginate(10);

        return view('articulo.index', compact('articulo','categoria'));
    }

    public function getNovedades(Request $request){
        $nombre = $request->get('buscarpor');

        $producto = Articulo::where('nombre','like',"%$nombre%")
        ->where('novedad', 'true')
        ->latest()
        ->paginate(10);

        return view('novedad.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categoria = Categoria::all()->sortBy('nombre');
        $subcategoria = Subcategoria::all()->sortBy('nombre');
        return view('articulo.create', compact('categoria','proveedor','subcategoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = "Articulo Registrado correctamente";

        $request->validate([
             'nombre' => 'required',
             'tipo_comprobante'=> 'required',
             'num_comprobante' => 'required',
             'fecha' => 'required',
             'cantidad' => 'required',
             'unidad' => 'required',
             'precio_compra' => 'required',
             'precio_venta' => 'required',
             'imagen' => 'nullable',
             'codigo_barras' => 'nullable',
             'codigo_barras'=>'nullable',
             'descripcion' => 'nullable',
             'categoria_id' => 'nullable',
             'proveedors_id' => 'nullable',
         ]);


        DB::beginTransaction();
        $requestData = $request->all();

        if($request->imagen){

            $data = $request->imagen;

            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension();
            $extension = explode('images/articulos', mime_content_type('images/articulos'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info;
            $path  = 'images/articulos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName;
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje;
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $articulo = Articulo::create($requestData);

        if($articulo){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('articulos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        $categoria = Categoria::all();
        $subcategoria = Subcategoria::all()->sortBy('nombre');

        return view('articulo.show', compact('articulo','categoria','subcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $articulo = Articulo::find($id);

      $articulo->delete();

      Session::flash('message','Articulo eliminado exitosamente!');
      return redirect()->route('articulos.index');
    }

    public function addNovedad(Request $request, $id){

       $articulo = Articulo::find($id);

       $request->validate([
           'novedad' => 'required',
       ]);

       $articulo->novedad = $request->get('novedad');

       $articulo->update();

       Session::flash('message','Novedad Agregada Exisitosamente!');
       return redirect()->route('articulos.index');
   }
}
