@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Registro Categoria</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('categorias.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Artículo</label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Artículo" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="user" hidden="true" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-danger float-right"><a href="{{url('/categorias')}}">Cancelar</a></button>&nbsp; 
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