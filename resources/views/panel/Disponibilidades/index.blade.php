@extends('adminlte::page')

@section('plugins.Datatables', true)

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('title', 'Disponibilidades Index')
    
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row-2 bd-highlight mb-3">
        <a href="{{ route('Disponibilidades.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>
        </div>

        @if ($disponibilidades->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">id_disp</th>
                                <th class="text-center">id_inst</th>
                                <th class="text-center">id_dia</th>
                                <th class="text-center">horariodisp</th>
                                <th class="d-flex flex-row-reverse bd-highlight px-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disponibilidades as $disp)
                                <tr class="">
                                    <td class="text-center">{{ $disp->id_disp }}</td>
                                    <td class="text-center">{{ $disp->instalacion->nombre_inst }}</td>
                                    <td class="text-center">{{ $disp->dia->nombre_dia }}</td>
                                    <td class="text-center">{{ $disp->horariodisp }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'Disponibilidades.show', $disp->id_disp) }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>
                                        <a href="{{ route('Disponibilidades.edit', $disp->id_disp)  }}" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
                                            <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                            </span>
                                        </a>
                                        <form action="{{ route('Disponibilidades.destroy', $disp->id_disp ) }}" method="post">
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
                {{ $disponibilidades->links() }} 
        @else
            <h4>¡No hay Disponibilidades cargadas!</h4>
        @endif
    </div>
@endsection