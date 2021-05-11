@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Ventas</h1>
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
                    placeholder="Buscador Nombre de Usuario" aria-label="Search" style="width: 60% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
              </div>
        </div>
       <!--  <div class="float-right">
            <a href="{{ route('subcategorias.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Sub-Categorias</button></a>
        </div> --><br><br><br>
         <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Usuario</th>
                    <th style="text-align:center;">Fecha Pedido</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta as $articulos)
                <tr>
                  <td style="text-align:center;">{{ $articulos->user_name }}</td>
               
                  <td style="text-align:center;">{{ $articulos->created_at}} </td>
                  <td style="text-align:center;">
                    <div class="card-body">

                         <a class="btn btn-app " href="{{ route('venta.show',$articulos->id ) }}">
                             <i class="fas fa-eye"></i> Ver
                         </a>
                         @if(Auth::user()->rol == 'admin')
                         <form action="{{ route('venta.destroy', $articulos->id ) }}" method="POST"
                             accept-charset="UTF-8" style="display:inline">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-app" title="Delete Image"
                             class="btn btn-danger btn-sm"
                             title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                     aria-hidden="true"></i> Eliminar</button>
                         </form>
                         @endif()
                     </div>
                  </td>
                        
                                                
                </tr>
                @endforeach
            </tbody>
        </table><br><br>
    </div>
     
    </div>
</div>
@endsection