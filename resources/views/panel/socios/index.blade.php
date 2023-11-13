{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Socios')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Socios</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('socios.create') }}" class="btn btn-success text-uppercase">
                Nuevo Socio
            </a>
        </div>
        
        @if (session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
@if ($socios->count())       
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-uppercase">DNI</th>
                            <th scope="col" class="text-uppercase">Socio</th>
                            <th scope="col" class="text-uppercase">Email</th>
                            <th scope="col" class="text-uppercase">Localidad</th>
                            <th scope="col" class="text-uppercase">Genero</th>
                            <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                            <th scope="col" class="text-uppercase">Domicilio</th>
                            <th scope="col" class="text-uppercase">Telefono</th>
                            <th scope="col" class="text-uppercase">Observaciones</th>
                            <th scope="col" class="text-uppercase">Foto</th>
                            <th scope="col" class="text-uppercase">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socios as $socio)
                        <tr>
                            <td>{{ $socio->id_soc }}</td>
                            <td>{{ $socio->user->dni /*$socio->cuil_soc*/}}</td>
                            <td><b>{{ $socio->user->name}}</b>{{' '. $socio->user->apellido }}</td>
                            <td>{{ $socio->user->email }}</td>
                            <td>{{ $socio->user->id_loc }}</td>
                            <td>{{ $socio->user->cod_genero }}</td>
                            <td>{{ $socio->user->fecha_nac }}</td>
                            <td>{{ $socio->user->domicilio }}</td>
                            <td>{{ $socio->user->telefono }}</td>

                            <td>{{ Str::limit($socio->observaciones_soc, 80) }}</td>
                            <td>
                                <img src="" alt="imagen socio" class="img-fluid" style="width: 150px;">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('socios.edit', $socio->id_soc) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    <form action="" method="POST">
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
        </div>
    </div>
@else
            <h4>¡No hay socios cargadas!</h4>
        @endif
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