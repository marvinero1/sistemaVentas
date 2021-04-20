@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Registro Artículo</h3>
                        </div>
                        <form action="{{route('articulos.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Categoria</label>
                                            <select name="categoria_id" class="form-control select2" style="width: 100%;" required>
                                                @foreach ($categoria as $categorias)
                                                    <option value="{{ $categorias->id }}">{{$categorias->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label><strong>Sub Categoria *</strong> </label>
                                        <select name="categorias_id" class="select2" style="width: 100% !important"
                                            data-live-search="true" required>
                                            @foreach ($subcategoria as $subcategorias)
                                            <option value="{{ $subcategorias->id }}">{{$subcategorias->nombre}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Artículo</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre Artículo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Tipo Comprobante</label>

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
                                            <label for="num_comprobante">Número Comprobante</label>
                                            <input type="text" class="form-control" id="num_comprobante" name="num_comprobante"
                                                placeholder="Numero Comprobante" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha"
                                                placeholder="Fecha Ingreso">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" class="form-control" id="cantidad" name="cantidad"
                                                placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="unidad">Unidad</label>
                                            <select class="form-control" id="unidad" name="unidad">
                                                <option value="unidad">Unidad</option>
                                                <option value="qq">Quintal</option>
                                                <option value="kg">Kilogramos</option>
                                                <option value="gr">Gramos</option>
                                                <option value="mg">Miligramos</option>
                                                <option value="litro">Litros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Precio Compra</label>
                                            <input type="number" class="form-control" id="precio_compra" name="precio_compra"
                                                placeholder="Precio Compra">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio Venta</label>
                                            <input type="number" class="form-control" id="precio_venta" name="precio_venta"
                                                placeholder="Precio Venta">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="imagen">Imagen</label>
                                            <label for="file-upload" class="custom-file-upload"
                                                style="text-align: center;">
                                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                                <strong>Imagen</strong>
                                            </label>
                                            <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                                recomienda<strong> 500 × 250 pixels</strong></p>
                                            <input id="file-upload" type="file" name="imagen">
                                        </div>
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
                                <a href="{{url('/articulos')}}"><button class="btn btn-secondary float-right"> <i class="fas fa-window-close"></i>
                                  Cancelar</a>

                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                                   Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
</div>
<style>
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
