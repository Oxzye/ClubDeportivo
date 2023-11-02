{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Tipo de Factura Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('Tipo_factura.create') }}" class="btn btn-primary">Agregar</a>

        @if ($Tipo_factura->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Tipo_factura as $fac)
                                <tr class="">
                                    <td scope="row">{{ $fac->id_tipo_fac }}</td>
                                    <td>{{ $fac->tipo_fac}}</td>
                                    <td>Ver</td>
                                     <td>
                                        <a href="{{ route('Tipo_factura.edit', $fac->id_tipo_fac)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Tipo_factura.destroy', $fac->id_tipo_fac ) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
    
        @else
            <h4>¡No hay Tipo de Facturas cargadas!</h4>
        @endif
    </div>
@endsection