{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Empleados')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Empleados</h1>
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
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (session('status'))
                            <div class="col-12 alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-12 mb-3">
                            <a href="{{ route('empleados.create') }}" class="btn btn-success">
                                Agregar
                            </a>
                            <a href="{{ route('exportar-empleados-excel') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
                                <i class="fas fa-file-excel"></i> Excel
                            </a>
                            <a href="{{ route('exportar-empleados-pdf') }}" class="btn btn-warning mx-1" title="PDF" target="_blank">
                                <i class="fas fa-file-pdf"></i> PDF
                            </a>
                            <a href="{{ route('empleados.dadosdebaja') }}" class="btn btn-danger mx-3">
                                Recuperar Empleado
                            </a>
                        </div>
                        <table id="tabla-empleados" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">DNI</th>
                                    <th scope="col" class="text-uppercase">Empleado</th>
                                    <th scope="col" class="text-uppercase">Cargo</th>
                                    <th scope="col" class="text-uppercase">Email</th>
                                    <!--<th scope="col" class="text-uppercase">Localidad</th>-->
                                    <!--<th scope="col" class="text-uppercase">Genero</th>-->
                                    <!--<th scope="col" class="text-uppercase">Fecha de nac/edad</th>-->
                                    <!--<th scope="col" class="text-uppercase">Domicilio</th>-->
                                    <!--<th scope="col" class="text-uppercase">Telefono</th>-->
                                    <th scope="col" class="text-uppercase">Foto</th>
                                    <th class="d-flex flex-row-reverse bd-highlight px-5">Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->id_emp }}</td>
                                        <td>{{ $empleado->user->dni }}</td>
                                        <td>{{ $empleado->user->name . ' ' . $empleado->user->apellido }}</td>
                                        <td>{{ $empleado->cargo->nombre_cargo }}</td>
                                        <td>{{ $empleado->user->email }}</td>
                                        {{-- <td>{{ $empleado->user->id_loc }}</td> --}}
                                        {{-- <td>{{ $empleado->user->genero->abreviatura_genero }}</td> --}}
                                        {{-- <td>{{ $empleado->user->fecha_nac }}</td> --}}
                                        {{-- <td>{{ $empleado->user->domicilio }}</td> --}}
                                        {{-- <td>{{ $empleado->user->telefono }}</td> --}}
                                        <td>
                                            <img src="" alt="imagen empleado" class="img-fluid"
                                                style="width: 150px;">
                                        </td>
                                        <td class="d-flex flex-row-reverse bd-highlight">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                {{-- <a href=""
                                                   class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                    <span class="material-symbols-outlined d-flex justify-content-center">
                                                    info
                                                    </span>
                                                </a> --}}
                                                <a href="{{ route('empleados.edit', $empleado->id_emp) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                        <span class="material-symbols-outlined d-flex justify-content-center">
                                                            edit_square
                                                        </span>
                                                </a>
                                                <form action="{{ route('empleados.destroy', $empleado->id_emp) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                        <span class="material-symbols-outlined d-flex justify-content-center">
                                                            cancel
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
