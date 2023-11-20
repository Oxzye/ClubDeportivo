{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Empleados')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <div class="container-fluid text-uppercase">
        <h1>Lista de Empleados dados de baja</h1>
    </div>

@stop

{{-- Contenido de la Pagina --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (session('alert'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="col-12 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($empleados->count())
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <a href="{{ route('empleados.index') }}" class="btn btn-info">Regresar</a>
                            </div>
                        </div>
                        <table id="tabla-socios" class="table table-striped table-hover w-80">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">DNI</th>
                                    <th scope="col" class="text-uppercase">Cargo</th>
                                    <th scope="col" class="text-uppercase">Empleado</th>
                                    <th scope="col" class="text-uppercase">Email</th>
                                    {{-- <th scope="col" class="text-uppercase">Localidad</th>
                                        <th scope="col" class="text-uppercase">Genero</th> --}}
                                    <th scope="col" class="text-uppercase">Fecha de baja</th>
                                    {{-- <th scope="col" class="text-uppercase">Domicilio</th>
                                        <th scope="col" class="text-uppercase">Telefono</th>
                                        <th scope="col" class="text-uppercase">Observaciones</th> --}}
                                    <th scope="col" class="text-uppercase">Foto</th>
                                    <th scope="col" class="text-uppercase">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->id_emp }}</td>
                                        <td>{{ $empleado->user->dni }}</td>
                                        <td>{{ $empleado->cargo->nombre_cargo }}</td>
                                        <td><b>{{ $empleado->user->name }}</b>{{ ' ' . $empleado->user->apellido }}</td>
                                        <td>{{ $empleado->user->email }}</td>
                                        {{--  <td>{{ $socio->user->id_loc }}</td>
                                            <td>{{ $socio->user->genero->abreviatura_genero }}</td> --}}
                                        <td><b>{{ $empleado->deleted_at->format('H:i:s d/m/Y') }}</b></td>
                                        {{-- <td>{{ $socio->user->domicilio }}</td>
                                            <td>{{ $socio->user->telefono }}</td>

                                            <td>{{ Str::limit($socio->observaciones_soc, 80) }}</td> --}}
                                        <td>
                                            <img src="{{ $empleado->user->imagen }}" alt="imagen_socio" class="img-fluid"
                                                style="width: 100px;">
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('empleados.restore', $empleado->id_user) }}">Recuperar</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    @else
        <div class="col-12">
            <h4>¡No hay Empleados cargados!</h4>
        </div>
        @endif
    </div>
    </div>
@stop


{{-- Importacion de Archivos CSS --}}
@section('css')

@stop


{{-- Importacion de Archivos JS --}}
@section('js')

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/socios.js') }}"></script>
@stop
