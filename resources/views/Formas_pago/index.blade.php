@extends('layouts.app')

@section('title', 'Formas de pago Index')
    
@section('content')
    <div class="container">
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
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Formas_pago as $fdp)
                                <tr class="">
                                    <td scope="row">{{ $fdp->id_fdp }}</td>
                                    <td>{{ $fdp->forma_pago_fdp }}</td>
                                    <td>{{ $fdp->descripcion_fdp }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'Formas_pago.show',  $fdp->id_fdp) }}"><button type="button" class="btn btn-info m-1">Ver</button>
                                            </a>

                                            <a href="{{ route('Formas_pago.edit', $fdp->id_fdp)  }}" class="btn btn-warning m-1">Editar</a>

                                            <form action="{{ route('Formas_pago.destroy', $fdp->id_fdp ) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1">Eliminar</button>
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