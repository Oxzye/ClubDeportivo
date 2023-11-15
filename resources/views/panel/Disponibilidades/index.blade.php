@extends('adminlte::page')

@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('title', 'Disponibilidades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row-2 bd-highlight mb-3">
        <a href="{{ route('Disponibilidades.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>
        </div>

        @if ($disponibilidades->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th class="text-center">id_disp</th>
                                <th class="text-center">id_inst</th>
                                <th class="text-center">id_dia</th>
                                <th class="text-center">horariodisp</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disponibilidades as $disp)
                                <tr class="">
                                    <td class="text-center">{{ $disp->id_disp }}</td>
                                    <td class="text-center">{{ $disp->instalaciones->nombre_inst }}</td>
                                    <td class="text-center">{{ $disp->dias->nombre_dia }}</td>
                                    <td class="text-center">{{ $disp->horariodisp }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                            {{-- <a href="{{ route( 'paises.show', $pais->id_pais) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a> --}}
                                        <a href="{{ route('Disponibilidades.edit', $disp->id_disp)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span>
                                        </a>

                                        <button type="button" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;"
                                         data-toggle="modal" data-target="#deleteModal" data-id="{{ $disp->id_disp }}" data-nombre="{{ $disp->instalaciones->nombre_inst }}">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                cancel
                                            </span>
                                        </button>      
                                        {{-- </div> --}}
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $disponibilidades->links() }} 
        @else
            <h4>¡No hay Disponibilidades cargadas!</h4>
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
                const id_disp = button.data('id') // Extract info from data-* attributes
                const nombre_instal = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/Disponibilidades/${id_disp}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${nombre_instal}"?`)
            })
        });
    </script>
@stop