{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')
{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
{{-- @include('components.pagination') --}}

@section('title', 'Formas de pago Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row-2 bd-highlight mb-3">
            <a href="{{ route('Formas_pago.create') }}" class="btn btn-primary  mb-4 mt-4">Agregar</a>
        </div>

        @if ($Formas_pago->count())
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Formas_pago as $fdp)
                                <tr class="">
                                    <td class="text-center">{{ $fdp->id_fdp }}</td>
                                    <td class="text-center">{{ $fdp->forma_pago_fdp }}</td>
                                    <td class="text-center">{{ $fdp->descripcion_fdp }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'Formas_pago.show',  $fdp->id_fdp) }}"><button type="button" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>

                                            <a href="{{ route('Formas_pago.edit', $fdp->id_fdp)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                                </span>
                                            </a>

                                            <button type="button" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;"
                                            data-toggle="modal" data-target="#deleteModal" data-id="{{ $fdp->id_fdp }}" data-nombre="{{ $fdp->forma_pago_fdp }}">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                cancel
                                            </span>
                                        </button>   
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {!! $Formas_pago->links() !!}
                </div>
        @else
            <h4>¡No hay Formas de pago cargados!</h4>
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
@endsection

{{-- Importacion de Archivos CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
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
                const id_fdp = button.data('id') // Extract info from data-* attributes
                const forma_pago_fdp = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/Formas_pago/${id_fdp}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${forma_pago_fdp}"?`)
            })
        });
    </script>
@stop