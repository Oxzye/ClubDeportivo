{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

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
            <div class="col-12 mb-3">
                <a href="{{ route('empleados.create') }}" class="btn btn-success text-uppercase">
                    Nuevo Empleado
                </a>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

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
                    <table id="tabla-productos" class="table table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-uppercase">DNI/CUIT</th>
                                <th scope="col" class="text-uppercase">Cargo</th>
                                <th scope="col" class="text-uppercase">Nombre(y apellido)</th>
                                <th scope="col" class="text-uppercase">Email</th>
                                <th scope="col" class="text-uppercase">Localidad</th>
                                <th scope="col" class="text-uppercase">Genero</th>
                                <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                                <th scope="col" class="text-uppercase">Domicilio</th>
                                <th scope="col" class="text-uppercase">Telefono</th>
                                <th scope="col" class="text-uppercase">Foto</th>
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->id_emp }}</td>
                                    <td>{{ $empleado->user->dni .' / '. $empleado->cuit_emp}}</td>
                                    <td>{{ $empleado->cargo->nombre_cargo}}</td>
                                    <td>{{ $empleado->user->name .' '. $empleado->user->apellido }}</td>
                                    <td>{{ $empleado->user->email }}</td>
                                    <td>{{ $empleado->user->id_loc }}</td>
                                    <td>{{ $empleado->user->genero->abreviatura_genero }}</td>
                                    <td>{{ $empleado->user->fecha_nac }}</td>
                                    <td>{{ $empleado->user->domicilio }}</td>
                                    <td>{{ $empleado->user->telefono }}</td>
                                    <td>
                                        <img src="" alt="imagen empleado" class="img-fluid" style="width: 150px;">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                                Ver
                                            </a>
                                            <a href="{{ route('empleados.edit', $empleado->id_emp) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                                Editar
                                            </a>
                                            <form action="{{ route('empleados.destroy', $empleado->id_emp ) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                    <div class="col-12 mb-3">
                        <a href="{{ route('empleados.create') }}" class="btn btn-success">
                            Agregar
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="tabla-productos" class="table table-striped table-hover w-100">
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
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->id_emp }}</td>
                                    <td>{{ $empleado->user->dni}}</td>
                                    <td>{{ $empleado->user->name .' '. $empleado->user->apellido }}</td>
                                    <td>{{ $empleado->cargo->nombre_cargo}}</td>
                                    <td>{{ $empleado->user->email }}</td>
                                    {{--<td>{{ $empleado->user->id_loc }}</td>--}}
                                    {{--<td>{{ $empleado->user->genero->abreviatura_genero }}</td>--}}
                                    {{--<td>{{ $empleado->user->fecha_nac }}</td>--}}
                                    {{--<td>{{ $empleado->user->domicilio }}</td>--}}
                                    {{--<td>{{ $empleado->user->telefono }}</td>--}}
                                    <td>
                                        <img src="" alt="imagen empleado" class="img-fluid" style="width: 150px;">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                                Ver
                                            </a>
                                            <a href="{{ route('empleados.edit', $empleado->id_emp) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                                Editar
                                            </a>
                                            <form action="{{ route('empleados.destroy', $empleado->id_emp ) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $empleados->links() }} 
            </div>
        </div>
    </div>
@stop

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
    <script src="{{ asset('js/productos.js') }}"></script>
@stop