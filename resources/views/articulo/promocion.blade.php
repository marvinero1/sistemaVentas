@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Productos en Promocion</h1>
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
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articulo as $productos)
                <tr>
                    <td class="text-center"> 
                    @if( $productos->imagen == '')
                        <img img src="images/logo_original.png" class="img-thumbnail" alt="Producto" height="150px" width="150px">
                    @else
                        <img src="/{{$productos->imagen_promocion }}" class="img-thumbnail" alt="Producto" height="150px" width="150px"
                            style="display: block;margin: 0 auto;">
                    @endif</td>
                    <td class="text-center">{{ $productos->nombre }}</td>
                    <td class="text-center">{{ $productos->precio_venta }}</td>
                    <td class="text-center">
                        <a class="btn btn-app " href="{{ route('articulos.show', $productos->id ) }}">
                            <i class="fas fa-eye"></i> Ver
                        </a> 
                     
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $productos->id}}">
                          <i class="fas fa-trash"></i>Quitar Promocion
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Promocion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3><strong>Quitar Promocion</strong></h3>
                                    <form action="{{route('articulo.outPromocion',$productos->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <input type="text" name="promocion" value="false" hidden="true">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Quitar</button>
                                </div>
                                </form>
                            </div>
                          </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection