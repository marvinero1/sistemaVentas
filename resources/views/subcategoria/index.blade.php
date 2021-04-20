@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Sub-Categorias</h1>
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
                    placeholder="Buscador Nombre Sub-Categoria" aria-label="Search" style="width: 60% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
              </div>
        </div>
        <div class="float-right">
            <a href="{{ route('subcategorias.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Sub-Categorias</button></a>
        </div><br><br><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">Categoria</th>
                        <th style="text-align:center;">Nombre Sub-Categoria</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategoria as $subcategorias)
                    <tr>
                        <td style="text-align:center;">{{ $subcategorias->categoria->nombre }}</td>
                        <td style="text-align:center;">{{ $subcategorias->nombre }}</td>
                        <td style="text-align:center;">{{ $subcategorias->descripcion }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('subcategorias.edit',$subcategorias->id ) }}">
                                <button class="btn btn-primary btn-sm"><i class="fa  fa-pencil-alt"
                                        aria-hidden="true"></i> Editar
                                </button></a> 
                            <form action="{{ route('subcategorias.destroy',$subcategorias->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br><br>
        </div>
        <div style="text-align: center;">
            {{ $subcategoria->links() }}
        </div>
    </div>
</div>
@endsection