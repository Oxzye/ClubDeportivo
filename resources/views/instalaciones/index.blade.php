@extends('layouts.app')

@section('title', 'instalaciones Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('instalaciones.create') }}" class="btn btn-primary">Agregar</a>

        @if ($instalaciones->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre instalacion</th>
                                <th scope="col">Tipo de instalacion</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($instalaciones as $instalacion)
                                <tr class="">
                                    <td scope="row">{{ $instalacion->id_inst }}</td>
                                    <td>{{ $instalacion->nombre_inst }}</td>
                                    <td>{{ $instalacion->tipo_inst}}</td>
                                    <td>{{ $instalacion->capacidad_inst}} personas</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('instalaciones.edit', $instalacion->id_inst)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('instalaciones.destroy', $instalacion->id_inst ) }}" method="post">
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
            <h4>¡No hay instalaciones cargadas!</h4>
        @endif
    </div>
@endsection