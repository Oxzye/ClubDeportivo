@extends('layouts.app')

@section('title', 'Paises Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row-2 d-flex flex-row-reverse bd-highlight mb-3">
            <a href="{{ route('paises.create') }}" class="btn btn-primary mb-4">Agregar</a>
        </div>

        @if ($paises->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paises as $pais)
                                <tr class="">
                                    <td class="text-center">{{ $pais->id_pais }}</td>
                                    <td class="text-center">{{ $pais->nombre_pais }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'paises.show', $pais->id_pais) }}"><button type="button" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>

                                            <a href="{{ route('paises.edit', $pais->id_pais)  }}" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                    edit_square
                                                </span>
                                            </a>
                                        
                                            <form action="{{ route('paises.destroy', $pais->id_pais ) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
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
    
        @else
            <h4>¡No hay países cargados!</h4>
        @endif
    </div>
@endsection