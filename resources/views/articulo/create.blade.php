@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registro Artículo</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('articulos.store')}}" method="POST" enctype="multipart/form-data">       
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Categoria</label>
                                            <select class="form-control" id="unidad">
                                                <option value="unidad">Unidad</option>
                                                <option value="qq">Quintal</option>
                                                <option value="kg">Kilogramos</option>
                                                <option value="gr">Gramos</option>
                                                <option value="mg">Miligramos</option>
                                                <option value="litro">Litros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Proveedor</label>
                                            <select class="form-control" id="unidad">
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
                                            <label for="nombre">Nombre Artículo</label>
                                            <input type="text" class="form-control" id="nombre"
                                                placeholder="Nombre Artículo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Tipo Comprobante</label>
                                            <input type="text" class="form-control" id="tipo_comprobante"
                                                placeholder="Tipo Comprobante">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="num_comprobante">Número Comprobante</label>
                                            <input type="text" class="form-control" id="num_comprobante"
                                                placeholder="Numero Comprobante">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Fecha</label>
                                            <input type="date" class="form-control" id="fecha"
                                                placeholder="Fecha Ingreso">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Cantidad</label>
                                            <input type="number" class="form-control" id="cantidad"
                                                placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="unidad">Unidad</label>
                                            <select class="form-control" id="unidad">
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
                                            <input type="number" class="form-control" id="precio_compra"
                                                placeholder="Precio Compra">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_comprobante">Precio Venta</label>
                                            <input type="number" class="form-control" id="precio_venta"
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
                                            <textarea class="form-control" id="descripcion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{url('/articulos')}}"><button class="btn btn-danger float-right">Cancelar</a>

                                <button type="submit" class="btn btn-primary float-right">Guardar</button>
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