{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Actualizar Cargos')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Cargo</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('cargos.update', $cargo->id_cargo) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_cargo">Nombre del Cargo:</label>
              <input type="text" class="form-control" name="nombre_cargo" id="nombre_cargo" aria-describedby="helpId" value="{{ $cargo->nombre_cargo }}">
            </div>

            <div class="mb-3">
              <label for="" class="form-label" name="descripcionCargo">Descripcion del Cargo:</label>
              <input type="text" class="form-control" name="descripcionCargo" id="descripcionCargo" aria-describedby="helpId" value="{{ $cargo->descripcionCargo }}">
            </div>

            <div class="mb-3">
              <label for="" class="form-label" name="salario_base">Salario Base:</label>
              <input type="text" class="form-control" name="salario_base" id="salario_base" aria-describedby="helpId" value="{{ $cargo->salario_base }}">
            </div>

            <div class="mb-3">
              <label for="" class="form-label" name="horas_de_trabajoxmes">Horas de Trabajo/Mes:</label>
              <input type="text" class="form-control" name="horas_de_trabajoxmes" id="horas_de_trabajoxmes" aria-describedby="helpId" value="{{ $cargo->horas_de_trabajoxmes }}">
            </div>

            <div class="mb-3">
              <label for="" class="form-label" name="horario_de_trabajo">Horario de Trabajo:</label>
              <input type="text" class="form-control" name="horario_de_trabajo" id="horario_de_trabajo" aria-describedby="helpId" value="{{ $cargo->horario_de_trabajo }}">
            </div>

             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('cargos.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection