@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Actividad</h1>

        <form action="{{ route('Actividades.store') }}" method="post" id="actividadForm">
            @csrf

            {{-- deportes con select --}}
            <div class="mb-3 row">
                <label for="id_dep" class="col-sm-4 col-form-label" name="id_dep"> Deporte (nombreDep | M_F_Mixto | descripcionDep): </label>
                <select id="id_dep" name="id_dep" class="form-control">
                    @foreach ($deportes as $deporte)
                        <option value="{{ $deporte->id_dep }}">
                            {{ $deporte->nombreDep .' | '. $deporte->M_F_Mixto .' | '. $deporte->descripcionDep }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- instalaciones con select --}}
            <div class="mb-3 row">
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> Instalación (nombre_inst | tipo_inst | capacidad): </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($instalaciones as $instalacion)
                        <option value="{{ $instalacion->id_inst }}"> 
                            {{ $instalacion->nombre_inst .' | '.$instalacion->tipo_inst .' | '. $instalacion->capacidad_inst}}
                        </option>
                    @endforeach
                </select>
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
        function validateForm() {
            var nombre_act = document.querySelector('[name="nombre_act"]');
            var limite_soc_atc = document.querySelector('[name="limite_soc_atc"]');
            var descripcion_act = document.querySelector('[name="descripcion_act"]');
            var actividad_en_curso = document.querySelector('[name="actividad_en_curso"]');
            var fecha_inicio_act = document.querySelector('[name="fecha_inicio_act"]');
            var fecha_fin_act = document.querySelector('[name="fecha_fin_act"]');

            clearErrors();

            var isValid = true;

            if (nombre_act.value.trim() === '') {
                displayError(nombre_act, 'El nombre de la actividad es obligatorio');
                isValid = false;
            }

            if (limite_soc_atc.value.trim() === '') {
                displayError(limite_soc_atc, 'El límite de socios por actividad es obligatorio');
                isValid = false;
            }

            if (descripcion_act.value.trim() === '') {
                displayError(descripcion_act, 'La descripción de la actividad es obligatoria');
                isValid = false;
            }

            if (actividad_en_curso.value.trim() === '') {
                displayError(actividad_en_curso, 'Ingrese 0 (falso) o 1 (verdadero) para la actividad en curso');
                isValid = false;
            }

            if (fecha_inicio_act.value.trim() === '') {
                displayError(fecha_inicio_act, 'La fecha de inicio de actividad es obligatoria');
                isValid = false;
            }

            if (fecha_fin_act.value.trim() === '') {
                displayError(fecha_fin_act, 'La fecha de fin de actividad es obligatoria');
                isValid = false;
            }

            if (isValid) {
                document.getElementById('actividadForm').submit();
            }
        }

        function displayError(input, message) {
            var errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger mt-2';
            errorDiv.innerText = message;
            input.parentNode.appendChild(errorDiv);
            input.classList.add('border', 'border-danger');
        }

        function clearError(input) {
            var parent = input.parentNode;
            var errorDiv = parent.querySelector('.alert-danger');
            if (errorDiv) {
                parent.removeChild(errorDiv);
                input.classList.remove('border', 'border-danger');
            }
        }

        function clearErrors() {
            var errorDivs = document.querySelectorAll('.alert-danger');
            errorDivs.forEach(function (div) {
                div.parentNode.removeChild(div);
            });

            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function (input) {
                input.classList.remove('border', 'border-danger');
            });
        }
    </script>
@endsection