@extends('layouts.main')

@section('content')

<div class="content-wrapper pt-3">
    <section class="container">       
        <div class="card">
            <div class="row p-3">
                <div class="col-xs-4 col-md-4 item-photo" style="display: inline-block;">
                    <img style="max-width:100%;padding-block-start: 21px;" src="/{{ $articulo->imagen }}"/>
                    <hr>
                    <div class="col" style="text-align: center; padding-block-start: 25px;background-color: forestgreen;color: white;">
                        <a class="btn btn-app" data-toggle="modal" data-target="#modalPromocion{{$articulo->id}}" class="btn btn-danger btn-sm"><i class="fa fa-bullhorn" aria-hidden="true"></i> Promoción
                        </a>

                        <a class="btn btn-app" data-toggle="modal"
                                   data-target="#modalStock{{$articulo->id}}" class="btn btn-danger btn-sm">
                                   <i class="fas fa-spinner"></i> Actualizar Stock
                               </a>
                    </div>               
                </div>


                <div class="col-xs-5 col-md-8 p-3" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>{{ $articulo->nombre }}</h3>
                    {{-- <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5> --}}

                    <h5>{{ $articulo->nombre }}</h5>
                    <!-- Precios -->
                    <div class="col-md-6">
                         <div class="col-md">
                            <h4><strong>Categoria</strong></h4>
                            <h5> {{ $articulo->categoria_id }}</h5>
                        </div> 

                        <div class="col-md">
                            <h4><strong>Sub-Categoria</strong></h4>
                            <h5> {{ $articulo->subcategoria_id }}</h5>
                        </div> 
                    </div>
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h4 class="title-attr" style="margin-top:20px;">
                            Tipo Comprobante</h4>
                        <div>
                            <div class="attr" style="width: 71px !important;height: 26px !important ;">
                                <h5 style="text-align: center;">{{ $articulo->tipo_comprobante }}</h5>
                            </div>
                            {{-- <div class="attr" style="width:25px;"></div> --}}
                        </div>
                    </div><br>
                    <div class="section" style="padding-bottom:5px;">
                        <h4 class="title-attr">Numero Comprobante
                        </h4>
                        <div>
                            <div class="attr" style="height: 31px !important;">
                                <h5 style="text-align: center;">{{ $articulo->num_comprobante }}</h5>
                            </div>
                            {{-- <div class="attr2">32 GB</div> --}}
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-3">
                            <label> Cantidad</label>
                            <h3>{{$articulo->cantidad }}</h3>
                        </div>
                        <div class="col-md-3">
                            <label> Cantidad</label>
                            <h3>{{$articulo->unidad }}</h3>
                        </div>
                        <div class="col-md-3">
                            <label> Codigo Barras</label>
                            <h3>{{$articulo->codigo_barras }}</h3>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-6">
                            <label> Precio Compra</label>
                            <h3>{{$articulo->precio_compra }} Bs.</h3>
                        </div>
                        <div class="col-md-6">
                            <label> Precio Venta</label>
                            <h3>{{$articulo->precio_venta }} Bs.</h3>
                        </div>
                    </div><br>

                    <div class="row p-3">
                        <div>
                            <label><strong>Descripción</strong></label>
                            <h5>{{$articulo->descripcion }}</h5>
                        </div>
                    </div>


                    {{-- <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>CANTIDAD</small></h6>
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                 --}}

                    <!-- Botones de compra -->
                    {{-- <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Agregar a lista de deseos</a></h6>
                    </div>--}}
                    <a href="{{url('/articulos')}}"><button class="btn  float-right" style="color: white"> <i class="fas fa-window-close"></i>
                        Atras</a>
                </div>
            </div>
        </div>


    </section>
            {{--<div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Detalle del producto</li>
                        <li>Garantía</li>
                        <li>Vendedor</li>
                        <li>Envío</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go.

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.
                            </small>
                        </p>
                        <small>
                            <ul>
                                <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                                <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                                <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                                <li>MicroUSB and USB connectivity</li>
                                <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                                <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                                <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                                <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                                <li>Features 16 GB memory and 2 GB RAM</li>
                                <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                                <li>17 hours of talk time, 350 hours standby time on one charge</li>
                                <li>Available in white or black</li>
                                <li>Model I337</li>
                                <li>Package includes phone, charger, battery and user manual</li>
                                <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                            </ul>
                        </small>
                    </div>
                </div>--}}



    </section>
    <div class="modal fade" id="modalPromocion{{$articulo->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Administración Promociones</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <i class="fa fa-times" aria-hidden="true"></i>
                                         </button>
                                     </div>
                                     <div class="modal-body" style="text-align: center;">
                                         <form action="{{route('articulo.addPromocion', $articulo->id)}}"
                                             method="POST" enctype="multipart/form-data"
                                             style="margin-block-end:-1em !important;">
                                             {{ csrf_field() }}
                                             {{ method_field('PUT') }}
                                             <input type="hidden" name="promocion" value="true">

                                             @if(Auth::user())
                                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                             @endif
                                             <h4>Agregar a Lista de Promoción</h4>
                                             <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="imagen">Imagen Promocional</label>
                                                      <label for="file-upload" class="custom-file-upload"
                                                          style="text-align: center;">
                                                          <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                                      </label>
                                                      <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                                          recomienda<strong> 500 × 250 pixels</strong></p>
                                                      <input id="file-upload" type="file" name="imagen_promocion">
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
</div>
                    {{-- MODAL Modal Stock --}}
                            <div class="modal fade" id="modalStock{{$articulo->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Agregar Stock</strong> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" >
                                            <h5 class="text-center">¿Cantidad a Añadir?</h5>
                                            <form action="{{route('articulo.addStock', $articulo->id)}}" method="POST"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                
                                                <input name="cantidad" type="number" class="form-control" placeholder="Cantidad"><br>
                                                <input name="precio_venta" type="number" class="form-control" placeholder="Precio Venta">
                                                 
                                                                                             
                                                      <br>                                         
                                                <div class="row" style="display: block;">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 100% !important; "><i class="fa fa-spinner" aria-hidden="true"></i>&nbsp; Actualizar</button>
                                                         <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                         style="width: 100% !important; "><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cerrar</button> -->
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
@endsection
<style>
    ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
    li.active{border-bottom:3px solid silver;}

    .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
    .menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
    .btn-success{width:100%;border-radius:0;}
    .section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
    .title-price{margin-top:30px;margin-bottom:0;color:black}
    .title-attr{margin-top:0;margin-bottom:0;color:black;}
    .btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
    .btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
    div.section > div {width:100%;display:inline-flex;}
    div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
    .attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
    .attr.active,.attr2.active{ border:1px solid orange;}

    @media (max-width: 426px) {
        .container {margin-top:0px !important;}
        .container > .row{padding:0 !important;}
        .container > .row > .col-xs-12.col-sm-5{
            padding-right:0 ;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > p{
            padding-left:0 !important;
            padding-right:0 !important;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > ul{
            padding-left:10px !important;

        }
        .section{width:104%;}
        .menu-items{padding-left:0;}
    }
</style>
