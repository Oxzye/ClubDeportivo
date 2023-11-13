{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Crear Cargos')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nuevo cargo</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('cargos.store') }}" method="post" id="form">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_cargo">Nombre del Cargo:</label>
              <input type="text" class="form-control" name="nombre_cargo" id="nombre_cargo" aria-describedby="helpId" placeholder="">
            </div>
            <div id="nombre_validacion" class="form-text text-danger"></div>
            
            <div class="mb-3">
                <label for="" class="form-label" name="nombre_dia">Descripcion del Cargo:</label>
                <input type="text" class="form-control" name="descripcionCargo" id="descripcionCargo" aria-describedby="helpId" placeholder="">
                <div id="descripcion_validacion" class="form-text text-danger"></div>
              </div>

              <div class="mb-3">
                <label for="" class="form-label" name="nombre_dia">Salario Base:</label>
                <input type="text" class="form-control" name="salario_base" id="salario_base" aria-describedby="helpId" placeholder="">
              </div>
              <div id="salario_validacion" class="form-text text-danger"></div>

              <div class="mb-3">
                <label for="" class="form-label" name="nombre_dia">Horas de Trabajo/Mes:</label>
                <input type="text" class="form-control" name="horas_de_trabajoxmes" id="horas_de_trabajoxmes" aria-describedby="helpId" placeholder="">
                <div id="horasxtrabajo_validacion" class="form-text text-danger"></div>
              </div>

              <div class="mb-3">
                <label for="" class="form-label" name="nombre_dia">Horario de Trabajo:</label>
                <input type="text" class="form-control" name="horario_de_trabajo" id="horario_de_trabajo" aria-describedby="helpId" placeholder="">
              </div>
              <div id="horas_validacion" class="form-text text-danger"></div>


             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('cargos.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection