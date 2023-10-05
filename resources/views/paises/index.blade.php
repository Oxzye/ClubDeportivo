@extends('layouts.app')

@section('title', 'Paises Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('paises.create') }}" class="btn btn-primary">Agregar</a>

        @if ($paises->count())
            
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
                            @foreach ($paises as $pais)
                                <tr class="">
                                    <td scope="row">{{ $pais->id_pais }}</td>
                                    <td>{{ $pais->nombre_pais }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('paises.edit', $pais->id_pais)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('paises.destroy', $pais->id_pais ) }}" method="post">
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
            <h4>¡No hay países cargados!</h4>
        @endif
    </div>
@endsection