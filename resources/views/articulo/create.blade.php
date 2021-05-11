@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark p-3">
                        <div class="card-header">
                            <h3 class="card-title">Registro Artículo</h3>
                        </div>

                        <form action="{{route('articulos.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;margin-bottom:23px;">
                                <br><div class="col-md-6">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="categoria_id" class="form-control select2" style="width: 100%;" required>
                                                @foreach ($categoria as $categorias)
                                                    <option value="{{ $categorias->nombre }}">{{$categorias->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><strong>Sub Categoria *</strong> </label>
                                       <select name="subcategoria_id" class="select2" style="width: 100% !important"
                                            data-live-search="true" required>
                                            @foreach ($subcategoria as $subcategorias)
                                            <option value="{{ $subcategorias->nombre }}">{{$subcategorias->nombre}}
                                            </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigo"><strong>Código</strong></label>
                                        <label>*El codigo tiene que tener al menos 12 caracteres numericos</label>
                                        <input placeholder="000000-000000" type="text" class="form-control" id="barcodeValue" name="codigo_barras">
                                        <br>   <br>
                                        <button class="btn btn-success" type="button" onclick="bar();"><i class="fas fa-barcode"></i> Generar</button>
                                        {{-- <button class="btn btn-info" onclick="imprimir()"type="button"><i class="fas fa-print"></i> Imprimir</button> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Codigo de Barras:</strong></label>
                                    <svg id="barcode"></svg>
                                </div>
                            <p class="p-2"><strong> Los campos marcados con (*) son requeridos</strong> </p>

                            </div>

                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Artículo *</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre Artículo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Tipo Comprobante *</label>
                                                <select class="form-control" id="tipo_comprobante" name="tipo_comprobante"
                                                placeholder="Tipo Comprobante" required>
                                                    <option value="factura">Factura</option>
                                                    <option value="recibo">Recibo</option>
                                                    <option value="nota">Nota de venta</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="num_comprobante">Número Comprobante *</label>
                                            <input type="text" class="form-control" id="num_comprobante" name="num_comprobante"
                                                placeholder="Numero Comprobante" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fecha">Fecha Ingreso</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha"
                                                placeholder="Fecha Ingreso">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad *</label>
                                            <input type="number" class="form-control" id="cantidad" name="cantidad"
                                                placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="unidad">Unidad</label>
                                            <select class="form-control" id="unidad" name="unidad">
                                                <option value="piezas">Pieza</option>
                                                <option value="caja">Caja</option>
                                                <!-- <option value="kg"></option>
                                                <option value="gr">Gramos</option>
                                                <option value="mg">Miligramos</option>
                                                <option value="litro">Litros</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4">
                                      <label for="nombre">Precio Compra</label>
                                      <div class="input-group form-group">
                                        <input type="double" class="form-control" id="precio_compra" name="precio_compra"
                                        placeholder="Precio Compra">
                                        <div class="input-group-append">
                                          <span class="input-group-text">Bs.</span>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="precio_venta">Precio Venta</label>
                                      <div class="input-group form-group">
                                          <input placeholder="Precio Venta" type="double" class="form-control" id="precio_venta" name="precio_venta">
                                          <div class="input-group-append">
                                            <span class="input-group-text">Bs.</span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      
                                      <label for="imagen">Imagen</label>
                                      <label for="file-upload" class="custom-file-upload"
                                          style="text-align: center;">
                                          <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                      </label>
                                      <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                          recomienda<strong> 500 × 250 pixels</strong></p>
                                      <input id="file-upload" type="file" name="imagen">
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user" hidden="true" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{url('/articulos')}}"><button class="btn  float-right" style="color: white"> <i class="fas fa-window-close"></i>
                                  Cancelar</a>

                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                                   Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
</div>

<h1>asdasdasdas</h1>

<script>
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

<style type="text/javascript">
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
@endsection
