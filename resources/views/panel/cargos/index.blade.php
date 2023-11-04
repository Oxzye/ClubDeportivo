{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title', 'Cargos Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('cargos.create') }}" class="btn btn-primary">Agregar</a>

        @if ($cargos->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Salario Base</th>
                                <th scope="col">Horas de trabajo/Mes</th>
                                <th scope="col">Horario de trabajo</th>
                                <th scope="col" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>




                            @foreach ($cargos as $cargo)
                                <tr class="">
                                    <td scope="row">{{ $cargo->id_cargo }}</td>
                                    <td>{{ $cargo->nombre_cargo }}</td>
                                    <td>{{ $cargo->descripcionCargo }}</td>
                                    <td>$ {{ $cargo->salario_base }}</td>
                                    <td>{{ $cargo->horas_de_trabajoxmes}}</td>
                                    <td>{{ $cargo->horario_de_trabajo}}</td>

                                    <td class="mb-3">
                                    <a href="{{route('cargos.show',$cargo->id_cargo)}}" class="btn btn-sm btn-info text-white text-uppercase me-1">Ver</a>
                                    
                                    <a>
                                        <a href="{{ route('cargos.edit', $cargo->id_cargo)  }}" class="btn btn-warning">Editar</a>
                                    </a>

                                    
                                        <form action="{{ route('cargos.destroy', $cargo->id_cargo ) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>  
                            @endforeach
                           
                        </tbody>
                    
                    </table>
                </div>
                {{ $cargos->links() }} 
        @else
            <h4>¡No hay Cargos cargados!</h4>
        @endif
    </div>
   
@endsection