@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Artículos</h1>
<div class="content">
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="float-left">
        <a href="{{ route('articulos.create')}}"><button class="btn btn-primary" >
            <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Articulo</button></a>
    </div>
    <div class="float-right">
        <form class="form-inline my-2 my-lg-0">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscador Nombre Articulo"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px #3097D1 solid;">
                <span class="search"></span>&nbsp;Buscar</button>
        </form>
    </div><br><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Descripción</th>
                    <th style="text-align:center;">Fecha</th>
                    <th style="text-align:center;">Categoria</th>
                    <th style="text-align:center;">Proveedor</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulo as $articulos)
                    <tr>
            
                    <td><a class="image-popup-vertical-fit" href="/{{  $articulos->imagen }}">
                        <img img src="/{{ $articulos->imagen }}" class="img-thumbnail" alt="articulo" height="100px"
                            width="100px" style="display: block;margin: 0 auto;">
                    </a></td>  
            
                
                        <td style="text-align:center;">{{ $articulos->nombre }}</td>
                        <td style="text-align:center;">{{ $articulos->descripcion }}</td>
                        <td style="text-align:center;">{{ $articulos->fecha }}</td>
                        <td style="text-align:center;">{{ $articulos->categoria->nombre }}</td>
                        <td style="text-align:center;">{{ $articulos->proveedor->nombre }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('articulos.show',$articulos->id ) }}">
                                <button class="btn btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Ver
                                </button></a>
                            <!-- <a title="Edit" href="{{ route('articulos.edit',$articulos->id ) }}">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>
                                            Editar</button></a> -->
                            <form action="{{ route('articulos.destroy',$articulos->id ) }}" method="POST" accept-charset="UTF-8"
                                style="display:inline">
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