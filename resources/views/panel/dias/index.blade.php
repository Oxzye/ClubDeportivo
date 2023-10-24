{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Dias Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('dias.create') }}" class="btn btn-primary">Agregar</a>

        @if ($dias->count())
            
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
                            @foreach ($dias as $dia)
                                <tr class="">
                                    <td scope="row">{{ $dia->id_dia }}</td>
                                    <td>{{ $dia->nombre_dia }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('dias.edit', $dia->id_dia)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('dias.destroy', $dia->id_dia ) }}" method="post">
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
            <h4>¡No hay dias cargados!</h4>
        @endif
    </div>
@endsection