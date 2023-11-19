@extends('adminlte::page')

@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('title', 'Socios por Actividades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <h1>Socios por Actividades</h1>
        </div>
        <div class="row-2 bd-highlight mb-3">
        <a href="{{ route('SocxAct.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>

        <a href="{{ route('exportar-socxact-excel') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
            <i class="fas fa-file-excel"></i> Excel
        </a>
        </div>

        @if ($socxact->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">id_sxa</th>
                                <th class="text-center">id_act</th>
                                <th class="text-center">socio</th>
                                <th class="text-center">fecha_inscripcion</th>
                                <th class="text-center">opinion_soc</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socxact as $sxa)
                                <tr class="">
                                    <td class="text-center">{{ $sxa->id_sxa }}</td>
                                    <td class="text-center">{{ $sxa->actividad->nombre_act }}</td>
                                    <td class="text-center">{{ $sxa->socio->user->name .' '. $sxa->socio->user->apellido }}</td>
                                    <td class="text-center">{{ $sxa->fecha_inscripcion }}</td>
                                    <td class="text-center">{{ $sxa->opinion_soc }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'SocxAct.show', $sxa->id_sxa) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>
                                        <a href="{{ route('SocxAct.edit', $sxa->id_sxa)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span>
                                        </a>
                                        <form action="{{ route('SocxAct.destroy', $sxa->id_sxa ) }}" method="post">
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
                {{ $socxact->links() }} 
        @else
            <h4>¡No hay socios por actividades cargadas!</h4>
        @endif
    </div>
@endsection