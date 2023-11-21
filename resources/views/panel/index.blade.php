@extends('adminlte::page')

@section('title', 'Inicio')
@section('content_header')
    <h1>Bienvenido al sistema</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <x-adminlte-card title="Apertura y cierre de cajas" theme="light" icon="fas fa-cash-register" collapsible maximizable>
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Apertura</h3>
                                <h4>Caja</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-lock-open"></i>
                            </div>
                            <a href="{{ route('Cajas.create') }}" class="small-box-footer">
                                Abrir caja <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="">Ir</i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Cajas activas</span>
                                        <span class="info-box-number">{{ $cajasAbiertas }}</span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Saldo de cajas</span>
                                        <span class="info-box-number">{{ $saldo_cajas }}</span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Uploads</span>
                                        <span class="info-box-number">13,648</span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Likes</span>
                                        <span class="info-box-number">93,139</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-12">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Cierre</h3>
                                <h4>Caja</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Cerrar caja <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
