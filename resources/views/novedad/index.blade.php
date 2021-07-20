@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Productos de Novedad</h1>
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
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control " type="search"
                    placeholder="Buscador Nombre Producto" aria-label="Search" style="width: 55% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
              </div>
        </div><br><br><br>
          
        <div class="card-body table-responsive">
          <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    {{-- <th>Id</th>  --}}
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Precio</th>
                    <th style="text-align:center;">Descripción</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articulo as $productos)
                <tr>
                    <td style="text-align:center;"> 
                    @if( $productos->imagen == '')
                        <img img src="images/logo_original.png" class="img-thumbnail" alt="Producto" height="150px" width="150px">
                    @else
                        <img src="/{{$productos->imagen }}" class="img-thumbnail" alt="Producto" height="150px" width="150px"
                            style="display: block;margin: 0 auto;">
                    @endif</td>
                    <td style="text-align:center;">{{ $productos->nombre }}</td>
                    <td style="text-align:center;">{{ $productos->precio_venta }}</td>
                    <td style="text-align:center;">{{ $productos->importadora }}</td>
                    <td style="text-align:center;">{{ $productos->descripcion }}</td>
                        <td>
                            <a class="btn btn-app " href="{{ route('articulos.show',$productos->id ) }}">
                                <i class="fas fa-eye"></i> Ver
                            </a>   
                        </td>
          
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
           
    </div>
</div>
@endsection