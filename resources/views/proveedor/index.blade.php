@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Proveedores</h1>
<div class="content">
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="float-left">
        <a href="{{ route('proveedor.create')}}"><button class="btn btn-primary" >
            <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Proveedor</button></a>
    </div>
    <div class="float-right">
        <form class="form-inline my-2 my-lg-0">
            <input name="buscarpor" class="form-control mr-md-2" type="search" placeholder="Buscador Nombre Proveedor"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px #3097D1 solid;">
                <span class="search"></span>&nbsp;Buscar</button>
        </form>
    </div><br><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    {{-- <th>Id</th>  --}}
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">NIT</th>
                    <th style="text-align:center;">Direccion</th>
                    <th style="text-align:center;">Teléfono</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Descripción</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedor as $proveedors)
                    <tr>
                        <td style="text-align:center;">{{ $proveedors->nombre }}</td>
                        <td style="text-align:center;">{{ $proveedors->nit }}</td>
                        <td style="text-align:center;">{{ $proveedors->direccion }}</td>
                        <td style="text-align:center;">{{ $proveedors->telefono }}</td>
                        <td style="text-align:center;">{{ $proveedors->email }}</td>
                        <td style="text-align:center;">{{ $proveedors->descripcion }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('proveedor.edit',$proveedors->id ) }}">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i>
                                    Editar</button></a>
                            <form action="{{ route('proveedor.destroy',$proveedors->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br><br>
    </div>
</div>   
</div>

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