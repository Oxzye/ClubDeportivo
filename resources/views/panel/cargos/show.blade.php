{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

@section('title','Ver')

@section('content_header')

@stop
    
@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Cargo "{{$cargo->id_cargo}}"</h1>
            <a href="{{ route('cargos.index')}}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a> 
        </div>
    </div>
        
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="mb-3">
                            <div class="mb-3">
                                Nombre del Cargo: {{$cargo->nombre_cargo}}
                            </div>
                            <div class="mb-3">
                                Descripcion del Cargo : {{$cargo->descripcionCargo}}
                            </div>
                            <div class="mb-3">
                                Salario Base : {{$cargo->salario_base}}
                            </div>
                            <div class="mb-3">
                                Horas de Trabajo/Mes : {{$cargo->horas_de_trabajoxmes}}
                            </div>
                            <div class="mb-3">
                                Horario de Trabajo : {{$cargos->horario_de_trabajo}}
                            </div>
                     </div>
                </div>
            </div>
        </div>
@stop

@section('css')

@stop

@section('js')

@stop