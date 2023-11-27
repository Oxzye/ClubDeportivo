{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Socios')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <div class="container-fluid text-uppercase">
        <h1>Lista de Socios</h1>
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

            @if ($socios->count())
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if (session('status'))
                                    <div class="col-12 alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @can('crear_socio')
                                    <div class="col-12 mb-3">
                                        <a href="{{ route('socios.create') }}" class="btn btn-success">
                                            Agregar
                                        </a>
                                        <a href="{{ route('exportar-socios-excel') }}" class="btn btn-warning mx-3" title="Excel" target="_blank">
                                            <i class="fas fa-file-excel"></i> Excel
                                        </a>
                                        <a href="{{ route('exportar-socios-pdf') }}" class="btn btn-warning mx-1" title="PDF" target="_blank">
                                            <i class="fas fa-file-pdf"></i> PDF
                                        </a>
                                        <a href="{{ route('socios.dadosdebaja') }}" class="btn btn-danger mx-3">
                                            Recuperar Socio
                                        </a>
                                    </div>
                                @endcan
                                @can('recepcionista_vista')
                                    <div class="col-lg-5 mb-3">
                                        <a href="{{ route('socios.dadosdebaja') }}" class="btn btn-danger">
                                            Socios dados de baja
                                        </a>
                                    </div>
                                @endcan
                                <div class="col-lg-2 mb-3 ml-auto">
                                    <select class="custom-select filter-select">
                                        <option selected value="Todos">--filtrar por--</option>
                                        <option value="0">Socios Inactivos</option>
                                        <option value="1">Socios Activos</option>
                                    </select>
                                </div>

                            </div>
                            <table id="tabla-socios" class="table table-striped table-hover w-80">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="text-uppercase">DNI</th>
                                        <th scope="col" class="text-uppercase">Socio</th>
                                        <th scope="col" class="text-uppercase">Email</th>
                                        {{-- <th scope="col" class="text-uppercase">Localidad</th>
                                        <th scope="col" class="text-uppercase">Genero</th>
                                        <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                                        <th scope="col" class="text-uppercase">Domicilio</th>
                                        <th scope="col" class="text-uppercase">Telefono</th>
                                        <th scope="col" class="text-uppercase">Observaciones</th> --}}
                                        <th scope="col" class="text-uppercase">Foto</th>
                                        <th scope="col" class="text-uppercase">Estado</th>
                                        <th class="d-flex flex-row-reverse bd-highlight px-5">Opciones  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socios as $socio)
                                        <tr>
                                            <td>{{ $socio->id_soc }}</td>
                                            <td>{{ $socio->user->dni }}</td>
                                            <td><b>{{ $socio->user->name }}</b>{{ ' ' . $socio->user->apellido }}</td>
                                            <td>{{ $socio->user->email }}</td>
                                            {{--  <td>{{ $socio->user->id_loc }}</td>
                                            <td>{{ $socio->user->genero->abreviatura_genero }}</td>
                                            <td>{{ $socio->user->fecha_nac }}</td>
                                            <td>{{ $socio->user->domicilio }}</td>
                                            <td>{{ $socio->user->telefono }}</td>

                                            <td>{{ Str::limit($socio->observaciones_soc, 80) }}</td> --}}
                                            <td>
                                                <img src="{{ $socio->user->imagen }}" alt="imagen_socio" class="img-fluid"
                                                    style="width: 100px;">
                                            </td>
                                            <td>
                                                <div class="d-none">{{ $socio->enabled }}</div>
                                                {{ $socio->getStatusText() }}
                                            </td>
                                            <td class="d-flex flex-row-reverse bd-highlight">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button href="" class="btn btn-outline-dark rounded-circle mx-2" data-toggle="modal" data-target="#exampleModal"
                                                        style="width:2.5em; height:2.5em;">
                                                        <span
                                                            class="material-symbols-outlined d-flex justify-content-center">
                                                            info
                                                        </span>
                                                    </button>
                                                    
                                                    @can('editar_socio')
                                                        <a href="{{ route('socios.edit', $socio->id_soc) }}"
                                                            class="btn btn-outline-dark rounded-circle mx-2"
                                                            style="width:2.5em; height:2.5em;">
                                                            <span
                                                                class="material-symbols-outlined d-flex justify-content-center">
                                                                edit_square
                                                            </span>
                                                        </a>
                                                    @endcan
                                                    @can('eliminar_socio')
                                                       
                                                            @csrf @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-dark rounded-circle mx-2"
                                                                style="width:2.5em; height:2.5em;" data-toggle="modal" data-target="#deleteModal" data-id="{{ $socio->id_soc }}" data-nombre="{{ $socio->user->name }}" >
                                                                <span
                                                                    class="material-symbols-outlined d-flex justify-content-center">
                                                                    cancel
                                                                </span>
                                                            </button>
                                                       
                                                    @endcan
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
                    <h4>¡No hay socios cargados!</h4>
                </div>
            @endif
        </div>
          {{-- Modal de eliminacion --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formDelete" method="POST" action="#">
            <div class="modal-body">
                @csrf 
                @method('DELETE')
                <p id="message"></p>   
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger text-uppercase">
                    Eliminar
                </button>
                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
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
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id_soc = button.data('id') // Extract info from data-* attributes
                const nombre_soc = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/socios/${id_soc}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${nombre_soc}"?`)
            })
        });
    </script>
@stop
