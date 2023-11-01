{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Formas de pago Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('Formas_pago.create') }}" class="btn btn-primary">Agregar</a>

        @if ($Formas_pago->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Formas_pago as $fdp)
                                <tr class="">
                                    <td scope="row">{{ $fdp->id_fdp }}</td>
                                    <td>{{ $fdp->forma_pago_fdp }}</td>
                                    <td>{{ $fdp->descripcion_fdp }}</td>
                                    <td>Ver</td>
                                    <td>
                                        <a href="{{ route('Formas_pago.edit', $fdp->id_fdp)  }}" class="btn btn-warning">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Formas_pago.destroy', $fdp->id_fdp ) }}" method="post">
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
            <h4>¡No hay Formas de pago cargados!</h4>
        @endif
    </div>
@endsection