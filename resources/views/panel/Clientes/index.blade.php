{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Clientes')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            <a href="{{ route('clientes.create') }}" class="btn btn-success text-uppercase">
                Nuevo Cliente
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
@if ($clientes->count())       
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabla-productos" class="table table-striped table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-uppercase">DNI</th>
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Apellido</th>
                            <th scope="col" class="text-uppercase">Domicilio</th>
                            <th scope="col" class="text-uppercase">Localidad</th>
                            <th scope="col" class="text-uppercase">Genero</th>
                            <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                            <th scope="col" class="text-uppercase">Telefono</th>
                            <th scope="col" class="text-uppercase">Email</th>
                            <th scope="col" class="text-uppercase">Observaciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->dni_cli }}</td>
                            <td>{{ $cliente->nombre_cli }}</td>
                            <td>{{ $cliente->apellido_cli }}</td>
                            <td>{{ $cliente->domicilio_cli }}</td>
                            <td>{{ $cliente->Localidades->id_loc}}</td>
                            <td>{{ $cliente->generos->cod_genero}}</td>
                            <td>{{ $cliente->fecha_nac_cli }}</td>
                            <td>{{ $cliente->telefono_cli }}</td>
                            <td>{{ $cliente->user->email }}</td>
                            <td>{{ Str::limit($cliente->observaciones, 80) }}</td>
                            <td>
                                <img src="" alt="imagen cliente" class="img-fluid" style="width: 150px;">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                        Ver
                                    </a>
                                    <a href="{{ route('socios.edit', $cliente->dni_cli) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        Editar
                                    </a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $cliente->dni_cli }}" data-nombre="{{ $cliente->nombre_cli }}">
                                        Eliminar
                                    </button>   
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


@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/cargos.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const dni_cli = button.data('id') // Extract info from data-* attributes
                const nombre_cli = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/clientes/${dni_cli}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${dni_cli, nombre_cli}"?`)
            })
        });
    </script>
@stop