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
                                <th scope="col">Nombre</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($localidad as $loc)
                                <tr class="">
                                    <td>{{ $loc->id_loc }}</td>
                                    <td>{{ $loc->nombre_loc }}</td>
                                    <td>{{ $loc->id_prov }}</td>
                                    <td>{{ $loc->cod_postal }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('Localidades.edit', $loc->id_loc)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Localidades.destroy', $loc->id_loc ) }}" method="post">
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
            <h4>¡No hay Localidades cargadas!</h4>
        @endif
    </div>
@endsection