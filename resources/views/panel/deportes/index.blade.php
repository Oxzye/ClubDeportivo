{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Deportes Index')
    
@section('content')
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
