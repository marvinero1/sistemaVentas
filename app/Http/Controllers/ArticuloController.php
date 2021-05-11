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
    public function getArticulos(){
      return Articulo::latest()->get();
    }

    public function getNovedades(Request $request){
        $articulo = Articulo::where('novedad', 'true')->get();
        return view('novedad.index', compact('articulo'));
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

        // $request->validate([
        //      'nombre' => 'required',
        //      'tipo_comprobante'=> 'required',
        //      'num_comprobante' => 'required',
        //      'fecha' => 'required',
        //      'cantidad' => 'required',
        //      'unidad' => 'required',
        //      'precio_compra' => 'required',
        //      'precio_venta' => 'required',
        //      'codigo_barras' => 'nullable',
        //      'imagen' => 'nullable',
        //      'flag_carrito' => 'nullable'
        //      'descripcion' => 'nullable',
        //      'categoria_id' => 'nullable',
        //      'proveedors_id' => 'nullable',
        // ]);


        DB::beginTransaction();
        $requestData = $request->all();
        //dd($requestData);

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
                $requestData['flag_carrito'] = 'false';
                
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

    public function showArticulo($id){
       return Articulo::findOrFail($id);
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

        $imagen = null;
        $articulo = Articulo::find($id);
        $mensaje = 'Articulo Creado Exitosamente!!!';

        $request->validate([
            'novedad' => 'required',
            'imagen_novedad' => 'nullable',
         ]);

        DB::beginTransaction();
        $requestData = $request->all();
        //dd($request);

        if($request->imagen_novedad == ''){
            unset($requestData['imagen_novedad']);
        }

        $mensaje = "Articulo Actualizado correctamente :3";
        if($request->imagen_novedad){
            $data = $request->imagen_novedad;
            $file = file_get_contents($request->imagen_novedad);
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
                $archivo_antiguo = $articulo->imagen_novedad;
                $requestData['imagen_novedad'] = $img;
                $requestDataNovedad['novedad'] = true;
                $mensaje = "Articulo Actualizado correctamente :3";
                if ($archivo_antiguo != '' && !File::delete($archivo_antiguo)) {
                    $mensaje = "Articulo Actualizado. error al eliminar la imagen";
                }
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }
        //dd($requestData);

        if($articulo->update($requestData, $requestDataNovedad)){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message','Articulo Agregado a Novedad Exisitosamente!');
        return redirect()->route('articulos.index');

   }
}
