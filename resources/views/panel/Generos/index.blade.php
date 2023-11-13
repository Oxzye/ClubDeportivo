{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Generos Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('generos.create') }}" class="btn btn-primary">Agregar</a>

        @if ($generos->count())
            
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
                            @foreach ($generos as $gender)
                                <tr class="">
                                    <td scope="row">{{ $gender->cod_genero }}</td>
                                    <td>{{ $gender->tipo_genero}}</td>
                                    <td>{{ $gender->abreviatura_genero }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('Generos.edit', $gender->cod_genero)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Generos.destroy', $gender->cod_genero ) }}" method="post">
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
            <h4>¡No hay tipos de generos cargados!</h4>
        @endif
    </div>
@endsection