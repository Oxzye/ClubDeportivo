@extends('adminlte::page')

@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('title', 'Dias por Actividades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <h1>Dias por Actividades</h1>
        </div>
        <div class="row-2 bd-highlight mb-3">
        <a href="{{ route('DiasxAct.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>
        </div>

        @if ($diasxact->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">id_diasxact</th>
                                <th class="text-center">id_act</th>
                                <th class="text-center">id_dia</th>
                                <th class="text-center">horario_inicio</th>
                                <th class="text-center">horario_fin</th>
                                <th class="d-flex flex-row-reverse bd-highlight px-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diasxact as $dxact)
                                <tr class="">
                                    <td class="text-center">{{ $dxact->id_diasxact }}</td>
                                    <td class="text-center">{{ $dxact->actividad->nombre_act }}</td>
                                    <td class="text-center">{{ $dxact->dia->nombre_dia }}</td>
                                    <td class="text-center">{{ $dxact->horario_inicio }}</td>
                                    <td class="text-center">{{ $dxact->horario_fin }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'DiasxAct.show', $dxact->id_diasxact) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>
                                        <a href="{{ route('DiasxAct.edit', $dxact->id_diasxact)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span>
                                        </a>
                                        <form action="{{ route('DiasxAct.destroy', $dxact->id_diasxact ) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                cancel
                                            </span>
                                        </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $diasxact->links() }} 
        @else
            <h4>¡No hay Dias por actividades cargadas!</h4>
        @endif
    </div>
@endsection