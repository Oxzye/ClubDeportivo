@extends('adminlte::page')

@section('title', 'Inicio')
@section('content_header')
    <h1>Bienvenido al sistema</h1>
@stop
@section('content')
    @role(['admin', 'cajero', 'gerente'])
        {{-- Apertura y cierre de cajas --}}
        <div class="container-fluid">
            <div class="col-12">
                <x-adminlte-card title="Apertura y cierre de cajas" theme="light" icon="fas fa-cash-register" collapsible
                    maximizable>
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

                        @can('listado_cajas')
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

                                </div>
                            </div>
                        @endcan

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>Cierre</h3>
                                    <h4>Caja</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('Cajas.index') }}" class="small-box-footer">
                                    Cerrar caja <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </x-adminlte-card>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-12">
                <x-adminlte-card title="Venta y Facturacion" theme="light" icon="fas fa-cash-register" collapsible
                    maximizable>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Cuota Social</h3>
                                    <h4>Cobro</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <a href="{{ route('cuota_social.index') }}" class="small-box-footer">
                                    Ir a cobrar <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Actividad Part</h3>
                                    <h4>Cobro</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('insc_act_part.index') }}" class="small-box-footer">
                                    Ir a cobrar <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Facturas</h3>
                                    <p>Ver facturas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('facturas.index') }}" class="small-box-footer">
                                    Ir a ver <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </x-adminlte-card>
            </div>
        </div>

        
    @endrole

    @role(['admin', 'recepcionista', 'gerente'])
        {{-- Gestion de actividad --}}
        <div class="container-fluid">
            <div class="col-12">
                <x-adminlte-card title="Gestión de Actividades" theme="light" icon="fas fa-cash-register" collapsible
                    maximizable>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Actividades</h3>
                                    <h4>Gestión de actividades</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <a href="{{ route('Actividades.index') }}" class="small-box-footer">
                                    Ir a actividades <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-running"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Deportes</span>
                                            <span class="info-box-number">{{ $deport }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-building"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Instalaciones</span>
                                            <span class="info-box-number">{{ $instalation }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>SocxAct</h3>
                                    <p>Inscribir un socio a una actividad</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('SocxAct.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>EmpxAct</h3>
                                    <p>Incluir empleado/s en actividad/es</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('EmpxAct.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>DíasxAct</h3>
                                    <p>Gestiónar que dias se hace una actividad</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('DiasxAct.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Disponibilidades</h3>
                                    <p>Ver Disponibilidad de instalaciones</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('Disponibilidades.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </x-adminlte-card>
            </div>
        </div>
        {{-- Gestion de actividad --}}

        {{-- Gestion de socios --}}
        <div class="container-fluid">
            <div class="col-12">
                <x-adminlte-card title="Gestión de Socios" theme="light" icon="fas fa-cash-register" collapsible
                    maximizable>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Listado de socios</h3>
                                    <h4>Gestión de socios</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <a href="{{ route('socios.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-running"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Cantidad de socios activos</span>
                                            <span class="info-box-number">{{ $sociosAct }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Crear socio</h3>
                                    <h4>Gestión de socios</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('socios.create') }}" class="small-box-footer">
                                    Ir a ver <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Recuperar Contraseña</h3>
                                    <h4>Gestión de socios</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('socios.resetPassword') }}" class="small-box-footer">
                                    Ir a ver <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </x-adminlte-card>
            </div>
        </div>
        {{-- Gestion de Socios --}}

        {{-- Gestion de empleados --}}
        <div class="container-fluid">
            <div class="col-12">
                <x-adminlte-card title="Gestión de Empleados" theme="light" icon="fas fa-cash-register" collapsible
                    maximizable>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Listado de empleados</h3>
                                    <h4>Gestión de empleados</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>
                                <a href="{{ route('empleados.index') }}" class="small-box-footer">
                                    Ir <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-running"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Cantidad de empleados activos</span>
                                            <span class="info-box-number">{{ $empleadosAct }}</span>
                                        </div>

                                    </div>

                                </div>

                                {{-- <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-building"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Instalaciones</span>
                                        <span class="info-box-number">{{ $instalation }}</span>
                                    </div>

                                </div>

                            </div> --}}

                                {{-- <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Uploads</span>
                                        <span class="info-box-number">13,648</span>
                                    </div>

                                </div>

                            </div> --}}
                                {{-- 
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Deportes</span>
                                        <span class="info-box-number">93,139</span>
                                    </div>

                                </div>

                            </div> --}}

                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Crear empleado</h3>
                                    <h4>Gestión de empleados</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('empleados.create') }}" class="small-box-footer">
                                    Ir a ver <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Cargos</h3>
                                    <h4>Gestión de empleados</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <a href="{{ route('cargos.index') }}" class="small-box-footer">
                                    Ir a ver <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </x-adminlte-card>
            </div>
        </div>
        {{-- Gestion de empleados --}}
    @endrole


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
