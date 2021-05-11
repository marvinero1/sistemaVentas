@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Clientes</h1>
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
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control "
                        type="search" placeholder="Buscador Nombre Usuario" aria-label="Search"
                        style="width: 55% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div><br><br><br>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Telefono</th>
                    <th style="text-align:center;">Whatsapp</th> 
                    <th style="text-align:center;">Rol</th>
                  
                    <th style="text-align:center;">Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $articulos)
                <tr>
                    <td><a class="image-popup-vertical-fit" href="/{{  $articulos->imagen }}">
                        <img img src="/{{ $articulos->imagen }}" class="img-thumbnail" alt="articulo" height="100px"
                            width="100px" style="display: block;margin: 0 auto;">
                    </a></td>
                        <td style="text-align:center;">{{ $articulos->name }}</td>
                        <td style="text-align:center;">{{ $articulos->email }}</td>
                        <td style="text-align:center;">{{ $articulos->telefono }}</td>
                        <td style="text-align:center;">{{ $articulos->whatsapp }}</td>
                        <td style="text-align:center;">{{ $articulos->rol }}</td>

                        <td style="text-align:center;">
                          <div class="card-body">
                               <form action="{{ route('articulos.destroy', $articulos->id ) }}" method="POST"
                                   accept-charset="UTF-8" style="display:inline">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-app" title="Delete Image"
                                   class="btn btn-danger btn-sm"
                                   title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                           aria-hidden="true"></i> Eliminar</button>
                               </form>
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