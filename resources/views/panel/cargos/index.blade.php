{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Cargos Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('cargos.create') }}" class="btn btn-primary">Agregar</a>

        @if ($cargos->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Salario Base</th>
                                <th scope="col">Horas de trabajo/Mes</th>
                                <th scope="col">Horario de trabajo</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>




                            @foreach ($cargos as $cargo)
                                <tr class="">
                                    <td scope="row">{{ $cargo->id_cargo }}</td>
                                    <td>{{ $cargo->nombre_cargo }}</td>
                                    <td>{{ $cargo->descripcionCargo }}</td>
                                    <td>$ {{ $cargo->salario_base }}</td>
                                    <td>{{ $cargo->horas_de_trabajoxmes}}</td>
                                    <td>{{ $cargo->horario_de_trabajo}}</td>

                                    <td class="d-flex">

                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $cargo->id_cargo }}" data-nombre="{{ $cargo->nombre_cargo }}">
                                            Eliminar
                                        </button>       
                                    <a href="{{route('cargos.show',$cargo->id_cargo)}}" class="btn btn-sm btn-info text-white text-uppercase me-1">Ver</a>
                                    
                                    <a href="{{ route('cargos.edit', $cargo->id_cargo)  }}" class="btn btn-warning me-1">Editar</a>
                                        
                                    
                                    </td>
                                </tr>  
                            @endforeach
                           
                        </tbody>
                        
                    </table>
                    
                </div>
                {{ $cargos->links() }} 
        @else
            <h4>¡No hay Cargos cargados!</h4>
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
                const id_cargo = button.data('id') // Extract info from data-* attributes
                const nombre_cargo = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/cargos/${id_cargo}`);
                modal.find('.modal-body #message').text(`¿Estás seguro de eliminar el cargo "${nombre_cargo}"?`)
            })
        });
    </script>
@stop
