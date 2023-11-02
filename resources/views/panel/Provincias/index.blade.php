{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Provincias Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('Provincias.create') }}" class="btn btn-primary">Agregar</a>

        @if ($provincia->count())
            
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
                            @foreach ($provincia as $prov)
                                <tr class="">
                                    <td>{{ $prov->id_prov }}</td>
                                    <td>{{ $prov->nombre_prov }}</td>
                                    <td>{{ $prov->id_pais }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('Provincias.edit', $prov->id_prov)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Provincias.destroy', $prov->id_prov ) }}" method="post">
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
            <h4>¡No hay Provincias cargados!</h4>
        @endif
    </div>
@endsection