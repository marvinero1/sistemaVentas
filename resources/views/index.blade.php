@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img" src="{{url('/images/logo_original.png')}}" alt="Logo">
            </div>
            <div class="col-md-8">
                <h1 class="font">Bienvenido a
                    <hr> Pro-Ventas</h1>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card hovercard2">
                    <div class="cardheader2">
                    </div>
                    <div class="info">
                        <div class="title">
                            <h2 target="_blank">Articulos</h2>
                        </div>
                    </div>
                    <div class="bottom" style="text-align: center;">
                        <button style="height: 65px;" class="btn "><a
                                style="color: whitesmoke;font-size: 17px;" href="{{url('/articulos')}}"><i
                                    class="fa fa-cube"></i>
                                <span><br> Articulos</span></a></button>
                    </div><br>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card hovercard1">
                    <div class="cardheader1">
                    </div>
                    <div class="info">
                        <div class="title">
                            <h2 target="_blank">Usuarios</h2>
                        </div>
                    </div>
                    <div class="bottom" style="text-align: center;">
                        <button style="height: 65px;" class="btn"><a
                                style="color: whitesmoke;font-size: 17px;" href="{{url('/users')}}"><i
                                    class="fa fa-users"></i>
                                <span><br> Usuarios</span></a>
                        </button>
                    </div><br>
                </div>                 
            </div>           
            <div class="col-md-4">               
                <div class="card hovercard3">
                    <div class="cardheader3">
                    </div>
                    <div class="info">
                        <div class="title">
                            <h2 target="_blank">Ventas</h2>
                        </div>
                    </div>
                    <div class="bottom" style="text-align: center;">
                        <button style="height: 65px;" class="btn"><a
                                style="color: whitesmoke;font-size: 17px;" href="{{url('/ventas')}}">
                                <i class="fa fa-money"></i>
                                <span><br> Ventas</span></a>
                        </button>
                    </div><br>
                </div>
            </div>    
        </div> -->
    </div>
</div>
@endsection
<style>
    .card.hovercard1 .cardheader1 {
        background: url("/images/productoDefault.png");
        background-size: cover;
        height: 200px;
    }
    .card.hovercard2 .cardheader2 {
        background: url("/images/novedades.png");
        background-size: cover;
        height: 200px;
    }
    .card.hovercard3 .cardheader3 {
        background: url("/images/inscrip.jpg");
        background-size: cover;
        height: 200px;
    }
    .info{
        text-align: center;
        padding: 25px;
    }
    .card {
        padding-top: 0px;
        margin: 10px 0 20px 0;
        background-color: rgba(214, 224, 226, 0.2);
        border-top-width: 0;
        border-bottom-width: 2px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card .card-heading {
        padding: 0 20px;
        margin: 0;
    }

    .card .card-heading.simple {
        font-size: 20px;
        font-weight: 300;
        color: #777;
        border-bottom: 1px solid #e5e5e5;
    }

    .card .card-heading.image img {
        display: inline-block;
        width: 46px;
        height: 46px;
        margin-right: 15px;
        vertical-align: top;
        border: 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .card .card-heading.image .card-heading-header {
        display: inline-block;
        vertical-align: top;
    }

    .card .card-heading.image .card-heading-header h3 {
        margin: 0;
        font-size: 14px;
        line-height: 16px;
        color: #262626;
    }

    .card .card-heading.image .card-heading-header span {
        font-size: 12px;
        color: #999999;
    }

    .card .card-body {
        padding: 0 20px;
        margin-top: 20px;
    }

    .card.people .card-top {
        position: absolute;
        top: 0;
        left: 0;
        display: inline-block;
        width: 170px;
        height: 150px;
        background-color: #ffffff;
    }

    .card.people .card-info {
        position: absolute;
        top: 150px;
        display: inline-block;
        width: 100%;
        height: 101px;
        overflow: hidden;
        background: #ffffff;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.people .card-info .title {
        display: block;
        margin: 8px 14px 0 14px;
        overflow: hidden;
        font-size: 16px;
        font-weight: bold;
        line-height: 18px;
        color: #404040;
    }

    .card.people .card-info .desc {
        display: block;
        margin: 8px 14px 0 14px;
        overflow: hidden;
        font-size: 12px;
        line-height: 16px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.hovercard .info {
        padding: 50px 8px 10px;
    }

    .card.hovercard .info .title {
        margin-bottom: 4px;
        font-size: 24px;
        line-height: 1;
        color: #262626;
        vertical-align: middle;
    }

    .card.hovercard .info .desc {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }
    .container {
        padding: 5px 80px;
    }
    .img {
        width: 270px;
        height: 270px;
        margin: 0 auto;
        display: block;
    }
    .font {
        font-size: 50px;
        text-align: center;
        padding: 30px;
        padding-right: 123px;
        text-shadow: 7px 4px 5px darkgrey;
    }
    .row {
        padding: 30px;
    }
    .btn {
        width: 70%;
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(121,9,82,1) 33%, rgba(57,157,177,1) 100%) !important;
    }
</style>