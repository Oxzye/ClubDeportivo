@extends('layouts.app')

@section('title', 'Paises Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('paises.create') }}" class="btn btn-primary mb-4">Agregar</a>

        @if ($paises->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paises as $pais)
                                <tr class="">
                                    <td>{{ $pais->id_pais }}</td>
                                    <td>{{ $pais->nombre_pais }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'paises.show', $pais->id_pais) }}"><button type="button" class="btn btn-info m-1">Ver</button></a>

                                            <a href="{{ route('paises.edit', $pais->id_pais)  }}" class="btn btn-warning m-1">Editar</a>
                                        
                                            <form action="{{ route('paises.destroy', $pais->id_pais ) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
    
        @else
            <h4>¡No hay países cargados!</h4>
        @endif
    </div>
@endsection