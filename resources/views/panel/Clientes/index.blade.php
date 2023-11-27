{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Clientes')

{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Empleados por Actividades Index')

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
                            <th scope="col">DNI</th>
                            {{-- <th scope="col" class="text-uppercase">DNI</th> --}}
                            <th scope="col" class="text-uppercase">Nombre</th>
                            <th scope="col" class="text-uppercase">Apellido</th>
                            <th scope="col" class="text-uppercase">Domicilio</th>
                            <th scope="col" class="text-uppercase">Localidad</th>
                            <th scope="col" class="text-uppercase">Genero</th>
                            <th scope="col" class="text-uppercase">Fecha de nac/edad</th>
                            <th scope="col" class="text-uppercase">Telefono</th>
                            <th scope="col" class="text-uppercase">Email</th>
                            <th scope="col" class="text-uppercase">Observaciones</th>
                            <th scope="col" class="text-uppercase">Imagen</th>
                            <th scope="col" class="text-uppercase"> Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->dni_cli }}</td>
                            <td>{{ $cliente->nombre_cli }}</td>
                            <td>{{ $cliente->apellido_cli }}</td>
                            <td>{{ $cliente->domicilio_cli }}</td>
                            <td>{{ $cliente->localidades->nombre_loc}}</td>
                            <td>{{ $cliente->generos->abreviatura_genero}}</td>
                            <td>{{ $cliente->fecha_nac_cli }}</td>
                            <td>{{ $cliente->telefono_cli }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ Str::limit($cliente->observaciones, 80) }}</td>
                            <td>
                                <img src="" alt="imagen cliente" class="img-fluid" style="width: 150px;">
                            </td>
                            <td class="d-flex flex-row-reverse bd-highlight">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route( 'clientes.show', $cliente->dni_cli) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                        <span class="material-symbols-outlined d-flex justify-content-center">
                                        info
                                        </span>
                                    </button></a>
                                    <a href="{{ route('clientes.edit', $cliente->dni_cli)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                        <span class="material-symbols-outlined d-flex justify-content-center">
                                            edit_square
                                        </span>

                                    </a>
                                    <form action="{{ route('clientes.destroy', $cliente->dni_cli ) }}" method="post">
                                    @csrf @method('DELETE')
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
@else
            <h4>¡No hay Clientes cargadas!</h4>
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