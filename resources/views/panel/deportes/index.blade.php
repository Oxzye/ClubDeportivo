{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Deportes Index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="row"><h1>Deportes</h1></div>
            <div class="col-12 mb-3">

                <a href="{{ route('deportes.create') }}" class="btn btn-primary">Agregar</a>
            </div>

            @if (session('alert'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-deportes" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Deporte</th>
                                    <th scope="col">Orientacion</th>
                                    <th scope="col">Descripcion</th>
                                    <th class="d-flex flex-row-reverse bd-highlight px-5">Acciones &nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deportes as $deporte)
                                    <tr class="">
                                        <td scope="row">{{ $deporte->id_dep }}</td>
                                        <td>{{ $deporte->nombreDep }}</td>
                                        <td>{{ $deporte->M_F_Mixto}}</td>
                                        <td>{{ $deporte->descripcionDep}}</td>
                                        <td class="d-flex flex-row-reverse bd-highlight">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            {{-- <a href="" class="btn btn-outline-dark rounded-circle mx-2"
                                            style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                            </span>
                                        </a> --}}
                                            <a href="{{ route('deportes.edit', $deporte->id_dep)  }}" class="btn btn-outline-dark rounded-circle mx-2"
                                                style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                    edit_square
                                                </span>
                                            </a>
                                            {{-- <button type="button" class="btn btn-outline-dark rounded-circle mx-2"
                                            style="width:2.5em; height:2.5em; data-toggle="modal" data-target="#deleteModal" data-id="{{ $deporte->id_dep }}" data-nombre="{{ $deporte->nombreDep }}">
                                                <span
                                                class="material-symbols-outlined d-flex justify-content-center">
                                                cancel
                                            </span>
                                            </button>  --}}
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
    @endsection

    {{-- Importacion de Archivos CSS --}}
    @section('css')

    @stop


    {{-- Importacion de Archivos JS --}}
    @section('js')

        {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
        <script src="{{ asset('js/deportes.js') }}"></script>
    @stop



{{-- codigo andando --}}
{{-- codigo andando --}}
{{-- codigo andando --}}

{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
{{-- @extends('adminlte::page') --}}

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
{{-- @section('plugins.Datatables', true)

@section('title', 'Deportes Index')
     --}}
{{-- @section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('deportes.create') }}" class="btn btn-primary">Agregar</a>

        @if ($deportes->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Deporte</th>
                                <th scope="col">Orientacion</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deportes as $deporte)
                                <tr class="">
                                    <td scope="row">{{ $deporte->id_dep }}</td>
                                    <td>{{ $deporte->nombreDep }}</td>
                                    <td>{{ $deporte->M_F_Mixto}}</td>
                                    <td>{{ $deporte->descripcionDep}}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('deportes.edit', $deporte->id_dep)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $deporte->id_dep }}" data-nombre="{{ $deporte->nombreDep }}">
                                            Eliminar
                                        </button> 
                                    </td>
                                     
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $deportes->links() }} 
        @else
            <h4>¡No hay deportes cargados!</h4>
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
{{-- Importacion de Archivos CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@stop --}}


{{-- Importacion de Archivos JS --}}
@section('js')
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/cargos.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id_dep = button.data('id') // Extract info from data-* attributes
                const nombreDep = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/deportes/${id_dep}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${nombreDep}"?`)
            })
        });
    </script>
@stop
