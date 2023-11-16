@extends('adminlte::page')

@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('title', 'Empleados por Actividades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <h1>Empleados por Actividades</h1>
        </div>
        <div class="row-2 bd-highlight mb-3">
        <a href="{{ route('EmpxAct.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>
        </div>

        @if ($empxact->count())
            
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th class="text-center">id_exa</th>
                                <th class="text-center">id_emp</th>
                                <th class="text-center">id_act</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empxact as $exa)
                                <tr class="">
                                    <td class="text-center">{{ $exa->id_exa }}</td>
                                    <td class="text-center">{{ $exa->id_emp }}</td>
                                    <td class="text-center">{{ $exa->id_act }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                            {{-- <a href="{{ route( 'EmpxAct.show', $exa->id_exa) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a> --}}
                                        <a href="{{ route('EmpxAct.edit', $exa->id_exa)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span>
                                        </a>
                                        <form action="{{ route('EmpxAct.destroy', $exa->id_exa ) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                cancel
                                            </span>
                                        </button>
                                        </form>
                                        {{-- </div> --}}
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{ $empxact->links() }} 
        @else
            <h4>¡No hay empleados por actividades cargadas!</h4>
        @endif
    </div>
@endsection