@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'facturas Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('facturas.create') }}" class="btn btn-primary">Agregar</a>

        @if ($facturacion->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Num Caja</th>
                                <th scope="col">Forma de pago</th>
                                <th scope="col">tipo de factura</th>
                                <th scope="col">Dni socio</th>
                                <th scope="col">Dni cliente</th>
                                <th scope="col">Monto fac</th>
                                <th scope="col">Estado de factura</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturacion as $fact)
                                <tr class="">
                                    <td>{{ $fact->id_caja }}</td>
                                    <td>{{ $fact->id_fdp }}</td>
                                    <td>{{ $fact->tipo_fac }}</td>
                                    <td>{{ $fact->dni_soc }}</td>
                                    <td>{{ $fact->dni_cli }}</td>
                                    <td>{{ $fact->monto_fac }}</td>
                                    <td>{{ $fact->pagada_fac }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('facturas.edit', $fact->id_caja)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $fact->id_caja }}" data-nombre="{{ $fact->id_caja }}">
                                            Eliminar
                                        </button>   
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $facturacion->links() }} 
        @else
            <h4>¡No hay facturas cargadas!</h4>
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