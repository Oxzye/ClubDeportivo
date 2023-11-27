@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Crear Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Actividad</h1>

        <form action="{{ route('Actividades.store') }}" method="post" id="actividadForm">
            @csrf

            {{-- Deportes con select --}}
            <div class="mb-3 row">
                <label for="id_idep" class="col-sm-4 col-form-label" name="id_dep"> Deporte (nombreDep | M_F_Mixto | descripcionDep): </label>
               
                    <select id="id_idep" name="id_dep" class="form-control @error('nombre_dep') is-invalid @endif @if(!$errors->has('nombre_dep') && old('nombre_dep')) is-valid @endif" aria-describedby="helpId">
                        <option value="seleccionar">Seleccione uno...</option>
                        @error('nombre_dep')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        @foreach ($deportes as $deporte)
                            <option value="{{ $deporte->id_dep }}" @if(old('nombre_dep') == $deporte->id_dep) selected @endif> 
                                {{ $deporte->nombreDep .' | '.$deporte->descripcionDep }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" id="mensajeErrorDep" style="color: red;"></div>
               
            </div>
            
            {{-- Instalaciones con select --}}
            <div class="mb-3 row">
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> Instalación (nombre_inst | tipo_inst | capacidad): </label>
                
                    <select id="id_inst" name="id_inst" class="form-control @error('nombre_inst') is-invalid @endif @if(!$errors->has('nombre_inst') && old('nombre_inst')) is-valid @endif" aria-describedby="helpId">
                        <option value="seleccionar">Seleccione una...</option>
                        @error('nombre_inst')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        @foreach ($instalaciones as $instalacion)
                            <option value="{{ $instalacion->id_inst }}" @if(old('nombre_inst') == $instalacion->id_inst) selected @endif> 
                                {{ $instalacion->nombre_inst .' | '. $instalacion->tipo_inst . '| ' . $instalacion->capacidad_inst }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" id="mensajeErrorInst" style="color: red;"></div>
                
            </div>

            {{-- Resto de los campos... --}}
            <div class="mb-3">
                <label for="" class="form-label" name="nombre_act">Nombre de la actividad:</label>
                <input type="text" class="form-control" name="nombre_act" value="{{ old( 'nombre_act' ) }}" aria-describedby="helpId">
                @error( 'nombre_act' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="limite_soc_atc">Límite de socios por actividad:</label>
                <input type="number" class="form-control" name="limite_soc_atc" value="{{ old( 'limite_soc_atc' ) }}" aria-describedby="helpId">
                @error( 'limite_soc_atc' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="descripcion_act">Descripción de actividad:</label>
                <input type="text" class="form-control" name="descripcion_act" value="{{ old( 'descripcion_act' ) }}" aria-describedby="helpId">
                @error( 'descripcion_act' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="actividad_en_curso">Actividad en curso. Ingrese 0 (falso) ó 1 (verdadero):</label>
                <input type="number" class="form-control" name="actividad_en_curso" value="{{ old( 'actividad_en_curso' ) }}" aria-describedby="helpId">
                @error( 'actividad_en_curso' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="fecha_inicio_act">Fecha de inicio de actividad:</label>
                <input type="date" class="form-control" name="fecha_inicio_act" value="{{ old( 'fecha_inicio_act' ) }}" aria-describedby="helpId">
                @error( 'fecha_inicio_act' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="fecha_fin_act">Fecha de fin de actividad:</label>
                <input type="date" class="form-control" name="fecha_fin_act" value="{{ old( 'fecha_fin_act' ) }}" aria-describedby="helpId">
                @error( 'fecha_fin_act' )
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>     

             <div class="row mb-4">
                <button type="submit" class="btn btn-success mx-4">Guardar</button>
                <a href="{{ route('Actividades.index') }}" class="btn btn-danger">Cancelar</a>
             </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var selectDep = document.getElementById("id_idep");
            var initialClassDep = selectDep.className;
            var mensajeErrorDep = document.getElementById("mensajeErrorDep");

            // Validación para el campo de deporte al cambiar
            selectDep.addEventListener("change", function () {
                var deporte = this.value;

                if (deporte === "" || deporte === "Seleccione uno...") {
                    mensajeErrorDep.innerHTML = "Por favor, selecciona un deporte.";

                    // Restaurar clase inicial y quitar la clase de validación
                    selectDep.className = initialClassDep;
                } else {
                    mensajeErrorDep.innerHTML = ""; // Limpiar el mensaje de error si se ha seleccionado un deporte válido

                    // Agregar clases de Bootstrap para indicar que el campo es válido
                    selectDep.classList.remove("is-invalid");
                    selectDep.classList.add("is-valid");
                }
            });
        });
    </script>
@endsection
