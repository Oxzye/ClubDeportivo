@extends('layouts.app')

{{-- @include('components.pagination') --}}

@section('title', 'Formas de pago Index')
    
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row-2 d-flex flex-row-reverse bd-highlight mb-3">
            <a href="{{ route('Formas_pago.create') }}" class="btn btn-primary">Agregar</a>
        </div>

        @if ($Formas_pago->count())
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripción</th>
                                <th class="d-flex flex-row-reverse bd-highlight pe-5">Acciones &nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Formas_pago as $fdp)
                                <tr class="">
                                    <td class="text-center">{{ $fdp->id_fdp }}</td>
                                    <td class="text-center">{{ $fdp->forma_pago_fdp }}</td>
                                    <td class="text-center">{{ $fdp->descripcion_fdp }}</td>
                                    <td class="d-flex flex-row-reverse bd-highlight">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route( 'Formas_pago.show',  $fdp->id_fdp) }}"><button type="button" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                info
                                                </span>
                                            </button></a>

                                            <a href="{{ route('Formas_pago.edit', $fdp->id_fdp)  }}" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
                                                <span class="material-symbols-outlined d-flex justify-content-center">
                                                edit_square
                                                </span>
                                            </a>

                                            <form action="{{ route('Formas_pago.destroy', $fdp->id_fdp ) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-outline-dark rounded-circle me-3" style="width:2.5em; height:2.5em;">
                                                    <span class="material-symbols-outlined d-flex justify-content-center">
                                                    cancel
                                                    </span>
                                                </button>
                                            </form>
                                    </td>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $Formas_pago->links() !!}
                    </div>
                </div>
    
        @else
            <h4>¡No hay Formas de pago cargados!</h4>
        @endif
    </div>
@endsection