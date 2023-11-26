{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'tipos_detalle_factura Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('tipos_detalle_factura.create') }}" class="btn btn-primary">Agregar</a>

        @if ($tdf->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tdf as $tipodetfact)
                                <tr class="">
                                    <td scope="row">{{ $tipodetfact->id_tipodetallefactura }}</td>
                                    <td>{{ $tipodetfact->tipodetalle}}</td>
                                    <td>{{ $tipodetfact->descripcion_tdf }}</td>
                                    <td>Ver</td>
                                    {{-- <td>
                                        <a href="{{ route('tipos_detalle_factura.edit', $tipodetfact->id_tipodetallefactura)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $tipodetfact->id_tipodetallefactura }}" data-nombre="{{ $tipodetfact->tipodetalle }}">
                                            Eliminar
                                        </button>  
                                    </td> --}}
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $tdf->links() }}
        @else
            <h4>¡No hay tipos de detalles de facturas cargados!</h4>
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
             const id_tipodetallefactura = button.data('id') // Extract info from data-* attributes
             const tipodetalle = button.data('nombre') // Extract info from data-* attributes
             
             const modal = $(this)
             const form = $('#formDelete')
             form.attr('action', `{{ env('APP_URL') }}/panel/tipodetfactura/${id_tipodetallefactura}`);
             modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${tipodetalle}"?`)
         })
     });
 </script>
@stop