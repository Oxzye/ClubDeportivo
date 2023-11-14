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
                                    <td>
                                        <a href="{{ route('tipos_detalle_factura.edit', $tipodetfact->id_tipodetallefactura)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('tipos_detalle_factura.destroy', $tipodetfact->id_tipodetallefactura ) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
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
@endsection