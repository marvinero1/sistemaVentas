@extends('layouts.app')

@section('content')
<div class="site-section cta-big-image background col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="about-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-5">
                <div class="login-box">
                    <div class="login-logo">
                        <a href="/login"><b>Pro </b> Ventas</a>
                    </div>
                    <!-- /.login-logo -->

                    <p class="login-box-msg">Regístrese para iniciar su sesión </p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Recuerdame
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Ingresar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    {{-- <div class="social-auth-links text-center mb-3">
                                <p>- OR -</p>
                                <a href="#" class="btn btn-block btn-primary">
                                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                </a>
                                <a href="#" class="btn btn-block btn-danger">
                                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                </a>
                        </div> --}}
                    <!-- /.social-auth-links -->
                    <div style="text-align: center;">
                     <p class="mb-1">
                        <a href="forgot-password.html" style="color:black;background-color: white">Olvide mi Contraseña</a>
                    </p>
                   <!--  <p class="mb-0">
                        <a href="/register" class="text-center" style="color:black;background-color: white">Registrate</a>
                    </p> -->   
                    </div>
                    
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>


@endsection
<style>
    .background{
        background-size: cover;
        height: 93.5% !important;
        background-image: url("/images/background.png");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    @media screen and (max-width:400px){
        .background {
            height: 139% !important;
            background-repeat: cover;
            background-size: cover;     
        }
    }
    @media screen and (max-height:550px){
        .background {
            height: 100% !important;
               
        }
    }
    @media screen and (max-height:375px){
        .background {
            height: 136% !important;
               
        }
    }
    @media screen and (max-height:280px){
        .background {
            height: 193% !important;
               
        }
    }
    .content{
        display: block;
        margin: auto
    }

    .btncard{
        width: 22%;
        display: block;
        margin: auto;
    }
</style>
