@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'facturas Index')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <div class="row">
            <h1>Facturas</h1>
        </div>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('facturas.create') }}" class="btn btn-primary">Agregar</a>
            </div>
            @if ($facturacion->count())
           @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-factura" class="table table-striped table-hover w-100">
                            <thead>
                            <tr>

{{-- parte funcionando --}}
{{-- parte funcionando --}}
{{-- parte funcionando --}}
                                <th scope="col">ID</th>
                                <th scope="col">Num Caja</th>
                                <th scope="col">Forma de pago</th>
                                <th scope="col">tipo de factura</th>
                                <th scope="col">Dni socio</th>
                                <th scope="col">Dni cliente</th>
                                <th scope="col">Monto fac</th>
                                <th scope="col">Estado de factura</th>
                                <th class="d-flex flex-row-reverse bd-highlight px-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturacion as $fact)
                                <tr class="">
                                    <td>{{ $fact->num_fac }}</td>
                                    <td>{{ $fact->id_caja }}</td>
                                    <td>{{ $fact->Formas_pago->forma_pago_fdp }}</td>
                                    <td>{{ $fact->tipo_fac }}</td>
                                    <td>{{ $fact->dni_soc }}</td>
                                    <td>{{ $fact->dni_cli }}</td>
                                    <td>{{ $fact->monto_fac }}</td>
                                    <td>{{ $fact->pagada_fac }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'facturas.show', $fact->num_fac) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>
                                    
                                        <a href="{{ route('facturas.edit', $fact->num_fac)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span></a>

                                        <button type="button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $fact->id_caja }}" data-nombre="{{ $fact->id_caja }}"class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
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
            </div>
        </div>
    </div>
@endsection

{{-- Importacion de Archivos CSS --}}
@section('css')

@stop


{{-- Importacion de Archivos JS --}}
@section('js')

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/facturas.js') }}"></script>
@stop
                
       
    {{-- Modal de eliminacion 
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
@endsection--}}
