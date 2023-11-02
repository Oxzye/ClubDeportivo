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
                                        <form action="{{ route('deportes.destroy', $deporte->id_dep ) }}" method="post">
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
            <h4>¡No hay deportes cargados!</h4>
        @endif
    </div>
@endsection