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

    public function getArticulos(){

        $articulo = Articulo::all();

        return response()->json($articulo, 200); 
    }

    public function getNovedadesIonic(Request $request){

        $articulo = Articulo::where('novedad', '=', 'true')->get();

        return response()->json($articulo, 200);
    }

     public function getNovedadesIonicBuscador(Request $request){

        $articulo = Articulo::where('promocion', '=','true')->get();

        return response()->json($articulo, 200);
    }


    public function index(Request $request){

        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all()->sortBy('nombre');
        $articulo = Articulo::where('nombre','like',"%$nombre%")->latest()->paginate(10);

        return view('articulo.index', compact('articulo','categoria'));
    }

    public function getNovedades(Request $request){
        $articulo = Articulo::where('novedad', 'true')->get();
        return view('novedad.index', compact('articulo'));
    }

    public function getPromocion(Request $request){
        $articulo = Articulo::where('promocion', 'true')->get();
        return view('articulo.promocion', compact('articulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categoria = Categoria::all()->sortBy('nombre');
        $subcategoria = Subcategoria::all()->sortBy('nombre');
        return view('articulo.create', compact('categoria','subcategoria'));
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
        $false = "false";
        
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
                $requestData['flag_carrito'] = $false;
                $requestData['promocion'] = $false;
                $requestData['novedad'] = $false;

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

    public function addStock(Request $request, $id){

        $request->all();

        $articulo = Articulo::find($id);

        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio_venta = $request->get('precio_venta');
        
        $articulo->update();

        Session::flash('message','Articulo con stock Añadido Exisitosamente!');
        return redirect()->route('articulos.index');
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

    public function viewNovedad(Request $request, $id){
        return view('articulo.addNovedad', ['articulo' =>Articulo::findOrFail($id)]);
    }

    public function addNovedad(Request $request, $id){

        $imagen = null;
        $novedad = "true"; 
        $articulo = Articulo::findOrFail($id);
        $mensaje = 'Articulo Creado Exitosamente!!!';

        $requestData = $request->all();
        // dd($requestData);

        // $requestData = $request->validate([
        //     'novedad' => 'required',
        //     'imagen_novedad' => 'required',
        //  ]);
        // dd($requestData);
        // DB::beginTransaction();
        
        

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
                $articulo->novedad = $novedad;
               
                $mensaje = "Articulo Actualizado correctamente :3";
                if ($archivo_antiguo != '' && !File::delete($archivo_antiguo)) {
                    $mensaje = "Articulo Actualizado. error al eliminar la imagen";
                }
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }
        //dd($requestData);

        if($articulo->update($requestData)){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message','Articulo Agregado a Novedad Exisitosamente!');
        return redirect()->route('articulos.index');

   }

    public function outNovedad(Request $request, $id){
        $novedad = "false";

        $articulo = Articulo::findOrFail($id);
        $novedad = $request->get('novedad');

        $articulo->novedad = $novedad;
        
        $articulo->update(); 

        return redirect()->route('articulos.getNovedades');
    }

    public function outPromocion(Request $request, $id){
        $promocion = "false";

        $articulo = Articulo::findOrFail($id);
        $promocion = $request->get('promocion');

        $articulo->promocion = $promocion;
        
        $articulo->update(); 

        return redirect()->route('articulos.getPromocion');
    }


   public function addPromocion(Request $request, $id){

        //dd($request);
        $imagen = null;
        $promocion = "true";
        $articulo = Articulo::find($id);
        $mensaje = 'Articulo Creado Exitosamente!!!';

        $request->validate([
            'promocion' => 'nullable',
            'imagen_promocion' => 'nullable',
         ]);

        DB::beginTransaction();
        $requestData = $request->all();
        
        

        if($request->imagen_promocion == ''){
            unset($requestData['imagen_promocion']);
        }

        $mensaje = "Articulo Actualizado correctamente :3";
        if($request->imagen_promocion){
            $data = $request->imagen_promocion;
            $file = file_get_contents($request->imagen_promocion);
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
                $archivo_antiguo = $articulo->imagen_promocion;
                $requestData['imagen_promocion'] = $img;
                $articulo->promocion = $promocion;
               
                $mensaje = "Articulo Actualizado correctamente :3";
                if ($archivo_antiguo != '' && !File::delete($archivo_antiguo)) {
                    $mensaje = "Articulo Actualizado. error al eliminar la imagen";
                }
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }
        //dd($requestData);

        if($articulo->update($requestData)){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message','Articulo Agregado a Promocion Exisitosamente!');
        return redirect()->route('articulos.index');

   }
}
