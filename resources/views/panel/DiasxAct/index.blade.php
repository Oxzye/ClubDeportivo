{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)
{{-- Agregar este link para ver los iconos de opciones --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Dias por Actividades Index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Dias por Actividades</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-3">

                <a href="{{ route('DiasxAct.create') }}" class="btn btn-primary mb-4 mt-4">Agregar</a>

                <a href="{{ route('exportar-diasxact-excel') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
                    <i class="fas fa-file-excel"></i> Excel
                </a>
            </div>

            @if (session('alert'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-diasxact" class="table table-striped table-hover w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">id_diasxact</th>
                                    <th class="text-center">Actividad</th>
                                    <th class="text-center">Día</th>
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
                </div>
            </div>
        </div>
    @endsection

    {{-- Importacion de Archivos CSS --}}
    @section('css')

    @stop


    {{-- Importacion de Archivos JS --}}
    @section('js')

        {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
        <script src="{{ asset('js/diasxact.js') }}"></script>
    @stop


{{-- codigo andando --}}
{{-- codigo andando --}}
{{-- codigo andando --}}
{{-- codigo andando --}}

{{-- @extends('adminlte::page')

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

        <a href="{{ route('exportar-diasxact-excel') }}" class="btn btn-warning mx-3" title="PDF" target="_blank">
            <i class="fas fa-file-excel"></i> Excel
        </a>
        </div>

        @if ($diasxact->count())
            
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">id_diasxact</th>
                                <th class="text-center">Actividad</th>
                                <th class="text-center">Día</th>
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
@endsection --}}