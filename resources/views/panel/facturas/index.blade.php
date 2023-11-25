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
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                                    <td>{{ $fact->num_fac }}</td>
                                    <td>{{ $fact->id_caja }}</td>
                                    <td>{{ $fact->id_fdp }}</td>
                                    <td>{{ $fact->tipo_fac }}</td>
                                    {{-- <td>{{ $fact->dnisocio->user->dni }}</td> --}}
                                    @if ($fact->dnisocio)
                                    @if ($fact->dnisocio->user)
                                        <td>
                                            {{ $fact->dnisocio->user->dni }}
                                        </td>
                                    @else
                                        <td> Usuario no encontrado para este socio.</td>
                                    @endif
                                    @else
                                        <td>Socio no encontrado para esta factura.</td>
                                    @endif

                                    {{-- <td>{{ $fact->dni_cli }}</td> --}}
                                    @if ($fact->client)
                                    @if ($fact->client->user)
                                        <td>
                                            {{ $fact->client->user->dni }}
                                        </td>
                                    @else
                                        <td> Usuario no encontrado para este cliente.</td>
                                    @endif
                                    @else
                                        <td>Cliente no encontrado para esta factura.</td>
                                    @endif

                                    <td>{{ $fact->monto_fac }}</td>
                                    <td>{{ $fact->pagada_fac }}</td>
                                    <td>
                                        <a href="{{ route('Detalle_fact.fin_factura',  $fact) }}" class="btn btn-primary">Ver Factura</a></td>
                                    <td>
                                        <a href="{{ route('facturas.edit', $fact->num_fac)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('facturas.destroy', $fact->num_fac) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                        Eliminar
                                                    </button>
                                                </form>
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
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