@extends('layouts.app')

@section('title', 'Cargos Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('cargos.create') }}" class="btn btn-primary">Agregar</a>

        @if ($cargos->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
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


                                    
                                    {{-- <td>Ver</td> --}}
                                    <td>
                                        <a href="{{ route('cargos.edit', $cargo->id_cargo)  }}" class="btn btn-warning">Editar</a>
                                    </td>

                                    <td>
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
    
        @else
            <h4>¡No hay Cargos cargados!</h4>
        @endif
    </div>
@endsection