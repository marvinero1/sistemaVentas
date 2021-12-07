@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Artículos</h1>
<div class="content">
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="col-md-6 float-left">
            <div class="input-group col-md-8 float-left">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fas fa-search"></i></span>
                </div>
                <form style="display: contents !important;margin-top: 0em !important;margin-block-end: 0em !important">
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control "
                        type="search" placeholder="Buscador Nombre Articulo" aria-label="Search"
                        style="width: 60% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div>

        <div class="float-right">
            <a href="{{ route('articulos.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Articulo</button></a>
        </div>&nbsp;
        <div class="float-right mr-3">
          <button class="btn btn-primary" onclick="bar();"><i class="fas fa-barcode"></i>&nbsp; Codigo Barra</button>
        </div>
        <br><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre</th>
                    <!-- <th style="text-align:center;">Fecha</th> -->
                    <th style="text-align:center;">Categoria</th>
                    <th style="text-align:center;">Cantidad </th> 
                    <th style="text-align:center;">Codigo Barras</th>
                    <!-- <th style="text-align:center;">Descripción</th> -->

                    
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulo as $articulos)
                <tr>
                    <td><a class="image-popup-vertical-fit" href="/{{  $articulos->imagen }}">
                        <img img src="/{{ $articulos->imagen }}" class="img-thumbnail" alt="articulo" height="80px"
                            width="80px" style="display: block;margin: 0 auto;">
                    </a></td>
                        <td style="text-align:center;">{{ $articulos->nombre }}</td>
                        <!-- <td style="text-align:center;">{{ $articulos->fecha }}</td> -->
                        <td style="text-align:center;">{{ $articulos->categoria_id }}</td>
                        <td style="text-align:center;"> {{ $articulos->cantidad }}</td>
                        <td style="text-align: center;"><input placeholder="000000-000000" type="text" class="form-control" id="barcodeValue" name="codigo_barras" value="{{ $articulos->codigo_barras }}" disabled="true" hidden="true"> <svg id="barcode"></svg></td>
                        <!-- <td style="text-align:center;">{{ $articulos->descripcion }}</td> -->

                       <td style="text-align:center;"> 
                            <div class="row">
                                <a class="btn btn-app btn-md" data-toggle="modal"
                                       data-target="#modalFavoritos{{$articulos->id}}" class="btn btn-danger btn-sm">
                                       <i class="fas fa-heart"></i> Favoritos
                                   </a>

                                   <a class="btn btn-app " href="{{ route('articulos.show', $articulos->id ) }}">
                                       <i class="fas fa-eye"></i> Ver
                                   </a>
                                   <form action="{{ route('articulos.destroy', $articulos->id ) }}" method="POST"
                                       accept-charset="UTF-8" style="display:inline">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-app" title="Delete Image"
                                       class="btn btn-danger btn-sm"
                                       title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                               aria-hidden="true"></i> Eliminar</button>
                                   </form>

                                   @if(Auth::user()->rol == 'admin')
                                   <a class="btn btn-app" data-toggle="modal"
                                       data-target="#modalNovedades{{$articulos->id}}" class="btn btn-danger btn-sm">
                                       <i class="fas fa-star"></i> Novedad
                                   </a>
                                   @endif 
                            </div>  
                        </td>         
                     
                            {{-- MODAL FAVORITOS --}}
                            <div class="modal fade" id="modalFavoritos{{$articulos->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Agregar a Lista de Favoritos</strong> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" >
                                            <h5 class="text-center">¿Desea Agregar este Artículo a Favoritos?</h5>
                                            <form action="{{route('favoritos.store')}}" method="POST"
                                                enctype="multipart/form-data" style="margin-block-end:-1em !important;display: none">
                                                {{ csrf_field() }}
                                                
                                                <input type="hidden" name="articulo_id" value="{{$articulos->id}}">
                                                <input type="hidden" name="nombre" value="{{$articulos->nombre}}">
                                                <input type="hidden" name="tipo_comprobante" value="{{$articulos->tipo_comprobante}}">
                                                <input type="hidden" name="num_comprobante" value="{{$articulos->num_comprobante}}">
                                                <input type="hidden" name="fecha" value="{{$articulos->fecha}}">
                                                <input type="hidden" name="cantidad" value="{{$articulos->cantidad}}">
                                                <input type="hidden" name="unidad" value="{{$articulos->unidad}}">
                                                <input type="hidden" name="precio_compra" value="{{$articulos->precio_compra}}">
                                                <input type="hidden" name="precio_venta" value="{{$articulos->precio_venta}}">
                                                <input type="hidden" name="descripcion" value="{{$articulos->descripcion}}">
                                                <input type="hidden" name="imagen" value="{{$articulos->imagen}}">
                                                <input type="hidden" name="flag_carrito" value="{{$articulos->flag_carrito}}">
                                                <input type="hidden" name="novedad" value="{{$articulos->novedad}}">

                                                @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endif
                                                
                                                <div class="row" style="display: block;">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 100% !important; "><i class="fa fa-heart" aria-hidden="true"></i>&nbsp; Añadir</button>
                                                         <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                         style="width: 100% !important; "><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cerrar</button> -->
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                           
                                                      
                    </tr>
                   
                      
                          
                    {{-- MODAL Novedades --}}
                     <div class="modal fade" id="modalNovedades{{$articulos->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Administración Novedades</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <i class="fa fa-times" aria-hidden="true"></i>
                                         </button>
                                     </div>
                                     <div class="modal-body" style="text-align: center;">
                                         <form action="{{route('articulo.addNovedad', $articulos->id)}}"
                                             method="POST" enctype="multipart/form-data"
                                             style="margin-block-end:-1em !important;">
                                             {{ csrf_field() }}
                                             {{ method_field('PUT') }}
                                             <input type="hidden" name="novedad" value="true">

                                             @if(Auth::user())
                                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                             @endif
                                             <h4>Agregar a Lista de Novedad</h4>
                                             <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="imagen">Imagen Novedad</label>
                                                      <label for="file-upload" class="custom-file-upload"
                                                          style="text-align: center;">
                                                          <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                                      </label>
                                                      <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                                          recomienda<strong> 500 × 250 pixels</strong></p>
                                                      <input id="file-upload" type="file" name="imagen_novedad">
                                                  </div>
                                              </div>
                                          </div>
                                             <div class="row" style="display: block;">
                                                 <div class="modal-footer">
                                                     <button type="submit" class="btn btn-primary"
                                                         style="width: 100% !important; "><span
                                                             class="icon-star"></span>&nbsp; Añadir</button>
                                                  
                                                 </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                    </div> 

                
                                     
                @endforeach
            </tbody>
        </table><br><br>
    </div>
</div>
</div>
<script type="text/javascript">
    function bar(){
        var valor = document.getElementById("barcodeValue").value;
        console.log(valor);

        JsBarcode("#barcode", valor, {
            format: "EAN13",
            lineColor: "#000",
            width: 2,
            height: 50,
            displayValue: true
        });
     }
</script>

@endsection
<style>
    .modal-dialog {
        max-width: 780px !important;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

</style>
