{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Actividades Index')

@section('content')
    <div class="container-fluid">
        <div class="row"><h1>Actividades</h1></div>
        <div class="row">
            <div class="col-12 mb-3">

                <a href="{{ route('Actividades.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>
                <a href="{{ route('exportar-actividades-excel') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
                    <i class="fas fa-file-excel"></i> Excel
                </a>

                <a href="{{ route('exportar-actividades-pdf') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
                    <i class="fas fa-file-pdf"></i> PDF
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-actividades" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">id_act</th>
                                    <th class="text-center">Deporte</th>
                                    <th class="text-center">Instalación</th>
                                    <th class="text-center">nombre_act</th>
                                    <th class="text-center">limite_soc_atc</th>
                                    <th class="text-center">descripcion_act</th>
                                    <th class="text-center">actividad_en_curso</th>
                                    <th class="text-center">fecha_inicio_act</th>
                                    <th class="text-center">fecha_fin_act</th>
                                    <th class="d-flex flex-row-reverse bd-highlight px-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actividades as $act)
                                    <tr class="">
                                        <td class="text-center">{{ $act->id_act }}</td>
                                        <td class="text-center">{{ $act->deporte->nombreDep }}</td>
                                        <td class="text-center">{{ $act->instalacion->nombre_inst }}</td>
                                        <td class="text-center">{{ $act->nombre_act }}</td>
                                        <td class="text-center">{{ $act->limite_soc_atc }}</td>
                                        <td class="text-center">{{ $act->descripcion_act }}</td>
                                        <td class="text-center">{{ $act->actividad_en_curso }}</td>
                                        <td class="text-center">{{ $act->fecha_inicio_act }}</td>
                                        <td class="text-center">{{ $act->fecha_fin_act }}</td>
                                        <td class="d-flex flex-row-reverse bd-highlight">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route( 'Actividades.show',  $act->id_act) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                    <span class="material-symbols-outlined d-flex justify-content-center">
                                                    info
                                                    </span>
                                                </button></a>
                                            <a href="{{ route('Actividades.edit', $act->id_act)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                    edit_square
                                                </span>
                                            </a>

                                            @csrf @method('DELETE') 
                                            <button type="submit" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;"  data-toggle="modal" data-target="#deleteModal" data-id="{{ $act->id_act  }}" data-nombre="{{ $act->nombre_act }}">
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
    @endsection

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
        </div>




    {{-- Importacion de Archivos CSS --}}
    @section('css')

    @stop


    {{-- Importacion de Archivos JS --}}
    @section('js')

        {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
        <script src="{{ asset('js/actividades.js') }}"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
        {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
        <script>
            $(document).ready(function(){
    
                $('#deleteModal').on('show.bs.modal', function (event) {
                    const button = $(event.relatedTarget) // Button that triggered the modal
                    const id_act = button.data('id') // Extract info from data-* attributes
                    const nombre_act = button.data('nombre') // Extract info from data-* attributes
                    
                    const modal = $(this)
                    const form = $('#formDelete')
                    form.attr('action', `{{ env('APP_URL') }}/panel/Actividades/${id_act}`);
                    modal.find('.modal-body #message').text(`¿Estás seguro de eliminar la actividad "${nombre_act}"?`)
                })
            });
        </script>
    @stop

{{-- codigo andando --}}
{{-- codigo andando --}}
{{-- codigo andando --}}

