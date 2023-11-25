@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Socio por Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nuevo Socio por Actividades</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('SocxAct.store') }}" method="post">
        @csrf
            {{-- dias con select --}}
            <div class="mb-3 row">
                <label for="id_soc" class="col-sm-4 col-form-label" name="id_soc"> Socio (nombre y apellido | dni): </label>
                <select id="id_soc" name="id_soc" class="form-control is-invalid">
                    <option value="" selected>Seleccione uno...</option>
                    @foreach ($socios as $socio)
                        <option value="{{ $socio->id_soc }}"> 
                            {{ $socio->user->name .' '. $socio->user->apellido .' | '. $socio->user->dni}}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="mensajeError" style="color: red;"></div>
            </div>
            {{-- fin  dias con select--}}
            {{-- actividades con select --}}
            <div class="mb-3 row">
                <label for="id_act" class="col-sm-4 col-form-label" name="id_act"> Actividad (nombre_act | descripcion_act): </label>
                <select id="id_act" name="id_act" class="form-control is-invalid">
                    <option value="" selected>Seleccione uno...</option>
                    @foreach ($actividades as $act)
                        <option value="{{ $act->id_act }}"> 
                            {{ $act->nombre_act . ' | '. $act->descripcion_act }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="mensajeError" style="color: red;"></div>
            </div>
            {{-- fin actividades con select --}}
            <div class="mb-3">
              <label for="" class="form-label" name="fecha_inscripcion">Fecha de inscripción:</label>
              <input type="date" class="form-control" name="fecha_inscripcion" value="{{ old( 'fecha_inscripcion' ) }}" aria-describedby="helpId" @error('fecha_inscripcion') is-invalid @enderror">
              @error( 'fecha_inscripcion' )
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <br>
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="opinion_soc">Opinión de socio:</label>
                <input type="text" class="form-control" name="opinion_soc" value="{{ old( 'opinion_soc' ) }}" aria-describedby="helpId" @error('opinion_soc') is-invalid @enderror">
                @error( 'opinion_soc' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   
             <button type="submit" class="btn btn-success">Guardar</button>
             <a href="{{ route('SocxAct.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var selectLoc = document.getElementById("id_soc");
            var selectGenero = document.getElementById("id_act");
            var initialClassLoc = selectLoc.className;
            var initialClassGenero = selectGenero.className;
            var mensajeError = document.getElementById("mensajeError");

            // Validación para el campo de localidad al cambiar
            selectLoc.addEventListener("change", function () {
                var localidad = this.value;

                if (localidad === "" || localidad === "Seleccionar") {
                    mensajeError.innerHTML = "Por favor, selecciona una localidad.";

                    // Restaurar clase inicial y quitar la clase de validación
                    selectLoc.className = initialClassLoc;
                } else {
                    mensajeError.innerHTML = ""; // Limpiar el mensaje de error si se ha seleccionado una localidad válida

                    // Agregar clases de Bootstrap para indicar que el campo es válido
                    selectLoc.classList.remove("is-invalid");
                    selectLoc.classList.add("is-valid");
                }
            });

            // Validación para el campo de género al cambiar
            selectGenero.addEventListener("change", function () {
                var genero = this.value;

                if (genero === "" || genero === "Seleccionar") {
                    mensajeError.innerHTML = "Por favor, selecciona un género.";

                    // Restaurar clase inicial y quitar la clase de validación
                    selectGenero.className = initialClassGenero;
                } else {
                    mensajeError.innerHTML = ""; // Limpiar el mensaje de error si se ha seleccionado un género válido

                    // Agregar clases de Bootstrap para indicar que el campo es válido
                    selectGenero.classList.remove("is-invalid");
                    selectGenero.classList.add("is-valid");
                }
            });
        });
    </script>
@stop