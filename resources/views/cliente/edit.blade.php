@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Editar Cliente</h3>
                        </div>
                        <form action="{{route('cliente.update',$cliente->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Proveedor</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre Proveedor" value="{{$cliente->nombre}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nit">Numero Carnet</label>
                                            <input type="number" class="form-control" id="num_carnet" name="num_carnet"
                                                placeholder="Numero de Carnet" value="{{$cliente->num_carnet}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Dirección</label>
                                            <input type="text" class="form-control" id="nombre" name="direccion"
                                                placeholder="Dirección" value="{{$cliente->direccion}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Teléfono</label>
                                            <input type="number" class="form-control" id="nombre" name="telefono"
                                                placeholder="Teléfono" value="{{$cliente->telefono}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="whatsapp">Whatsapp</label>
                                            <input type="number" class="form-control" id="whatsapp" name="whatsapp"
                                                placeholder="Whatsapp" value="{{$cliente->whatsapp}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="E-mail" value="{{$cliente->email}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input class="form-control" id="descripcion" rows="3"
                                                name="descripcion" value="{{$cliente->descripcion}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user" hidden="true" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{url('/cliente')}}"><button class="btn btn-danger float-right">Cancelar</a>

                                <button type="submit" class="btn btn-primary float-right">Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
</div>
@endsection