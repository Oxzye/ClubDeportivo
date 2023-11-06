{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('layouts.app')

@section('title','Ver')

@section('plugins.Datatables', true)

@section('content_header')

@stop
    
@section('content')

<div class="row">
       
    <div class="col-12 mb-3">
        <h1>Datos del Cargo #{{$cargos->id_cargo}}</h1>
        <a href="{{ route('cargos.index')}}" class="btn btn-sm btn-secondary text-uppercase">
            Volver al Listado
        </a> 
    </div>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <div class="mb-3">
                        <div class="mb-3">
                            Nombre del Cargo: {{ $cargos->nombre_cargo }}
                        </div>
                        <div class="mb-3">
                            Descripcion del Cargo : {{ $cargos->descripcionCargo }}
                        </div>
                        <div class="mb-3">
                            Salario Base : $ {{ $cargos->salario_base }}
                        </div>
                        <div class="mb-3">
                            Horas de Trabajo/Mes : {{ $cargos->horas_de_trabajoxmes}}
                        </div>
                        <div class="mb-3">
                            Horario de Trabajo : {{ $cargos->horario_de_trabajo}}
                        </div>
                        <div class="mb-3">
                            Actualización : {{ $cargos->updated_at}}
                        </div>
                 </div>
            </div>
        </div>
    </div> 
</div>
@endsection
      

@section('css')

@stop

@section('js')

@stop