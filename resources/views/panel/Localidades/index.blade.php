@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Localidades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('Localidades.create') }}" class="btn btn-primary">Agregar</a>

        @if ($localidad->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre de Localidad</th>
                                <th scope="col">Provincias</th>
                                <th scope="col">Código Postal</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($localidad as $loc)
                                <tr class="">
                                    <td>{{ $loc->id_loc }}</td>
                                    <td>{{ $loc->nombre_loc }}</td>
                                    <td>{{ $loc->provincias->nombre_prov }}</td>
                                    <td>{{ $loc->cod_postal }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('Localidades.edit', $loc->id_loc)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $loc->id_loc }}" data-nombre="{{ $loc->nombre_loc }}">
                                            Eliminar
                                        </button>   
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $localidad->links() }} 
        @else
            <h4>¡No hay Localidades cargadas!</h4>
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

 {{-- Importacion de Archivos JS --}}
 @section('js')
 <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
 <script src="{{ asset('js/cargos.js') }}"></script>
 <script>
     $(document).ready(function(){

         $('#deleteModal').on('show.bs.modal', function (event) {
             const button = $(event.relatedTarget) // Button that triggered the modal
             const id_loc = button.data('id') // Extract info from data-* attributes
             const nombre_loc = button.data('nombre') // Extract info from data-* attributes
             
             const modal = $(this)
             const form = $('#formDelete')
             form.attr('action', `{{ env('APP_URL') }}/panel/Localidades/${id_loc}`);
             modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${nombre_loc}"?`)
         })
     });
 </script>
@stop