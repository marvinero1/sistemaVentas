@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('user.store')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="nombre">Nombre</label>
                                    <input id="name" type="text" placeholder="Nombre"
                                    class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" placeholder="Apellido"
                                        name="apellido" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Direccion"
                                        name="direccion">
                                </div>
                                <div class="col-sm-6">
                                    <label>Teléfono</label>
                                    <input type="number" class="form-control" placeholder="Telefono"
                                        name="telefono" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Pais</label>
                                    <input type="text" class="form-control" placeholder="Pais" name="pais">
                                </div>
                                <div class="col-sm-6">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" placeholder="Ciudad"
                                        name="ciudad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Whatsapp</label>
                                    <input type="number" class="form-control" placeholder="Whatsapp"
                                        name="whatsapp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Correo Electronico</label>
                                    <input id="email" type="email" placeholder="Correo Electronico"
                                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <input type="hidden" name="rol" value="cliente">

                            <button type="submit" class="btn btn-primary px-4 float-right">
                            <span class="icon-save"></span>&nbsp;Guardar</button>

                            {{-- <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div> --}}
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
