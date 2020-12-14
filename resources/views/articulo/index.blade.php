@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Artículos</h1>
<div class="container mb-5">
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
                    {{--  <th>Id</th>  --}}
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Descripción</th>
                    <th style="text-align:center;">Interés</th>
                    <th style="text-align:center;">Dias Plazo</th>
                    <th style="text-align:center;">Monto Maximo</th>
                    <th style="text-align:center;">Monto Minimo</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
                <tr>
        
                  <td><a class="image-popup-vertical-fit" href="">
                    <img img src="images/defaultBanco.jpg" class="img-thumbnail" alt="DPF" height="100px"
                        width="100px" style="display: block;margin: 0 auto;">
                </a></td>  
           
                <td><a class="image-popup-vertical-fit" href="">
                    <img src="" class="img-thumbnail" alt="DPF" height="100px"
                        width="100px" style="display: block;margin: 0 auto;">
                </a></td>

                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>

                    <td style="text-align:center;">
                    
                            
                    </td>
                </tr>
     

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