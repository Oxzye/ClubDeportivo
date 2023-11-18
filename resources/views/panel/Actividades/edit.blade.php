@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Actividad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Actividades.update', $act->id_act) }}" method="post" novalidate>
        @csrf @method('PUT')
            {{-- deportes con select --}}
            <div class="mb-3 row">
                <label for="id_dep" class="col-sm-4 col-form-label" name="id_dep"> Deporte: </label>
                <select id="id_dep" name="id_dep" class="form-control">
                    @foreach ($deportes as $deporte)
                        <option value="{{ $deporte->id_dep }}" {{ $deporte->id_dep == $act->id_dep ? 'selected' : '' }}> 
                            {{ $deporte->id_dep }}
                            {{ $deporte->nombreDep }}
                            {{ $deporte->M_F_Mixto }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin deportes con select --}}

            {{-- instalaciones con select --}}
            <div class="mb-3 row">
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> Instalación: </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($instalaciones as $instalacion)
                        <option value="{{ $instalacion->id_inst }}" {{ $instalacion->id_inst == $act->id_inst ? 'selected' : '' }}> 
                            {{ $instalacion->nombre_inst }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin instalaciones con select --}}

            {{-- fin empleado por act con select --}}
                        
            <div class="mb-3">
                <label for="" class="form-label" name="nombre_act">Nombre de la actividad:</label>
                <input type="text" class="form-control" name="nombre_act"  value="{{ old( 'nombre_act', $act->nombre_act ) }}" aria-describedby="helpId" @error('nombre_act') is-invalid @enderror">
                @error( 'nombre_act' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   
              
            <div class="mb-3">
                <label for="" class="form-label" name="limite_soc_atc">Limite de socios por actividad:</label>
                <input type="number" class="form-control" name="limite_soc_atc"  value="{{ old( 'limite_soc_atc', $act->limite_soc_atc ) }}" aria-describedby="helpId" @error('limite_soc_atc') is-invalid @enderror">
                @error( 'limite_soc_atc' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

            <div class="mb-3">
              <label for="" class="form-label" name="descripcion_act">descripción de actividad:</label>
              <input type="text" class="form-control" name="descripcion_act"  value="{{ old( 'descripcion_act', $act->descripcion_act ) }}" aria-describedby="helpId" @error('descripcion_act') is-invalid @enderror">
              @error( 'descripcion_act' )
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <br>
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="actividad_en_curso">Actividad en curso. Ingrese 0 (falso) o 1 (verdadero):</label>
                <input type="number" class="form-control" name="actividad_en_curso"  value="{{ old( 'actividad_en_curso', $act->actividad_en_curso ) }}" aria-describedby="helpId" @error('actividad_en_curso') is-invalid @enderror">
                @error( 'actividad_en_curso' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

              <div class="mb-3">
                <label for="" class="form-label" name="fecha_inicio_act">Fecha de inicio de actividad:</label>
                <input type="date" class="form-control" name="fecha_inicio_act"  value="{{ old( 'fecha_inicio_act', $act->fecha_inicio_act ) }}" aria-describedby="helpId" @error('fecha_inicio_act') is-invalid @enderror">
                @error( 'fecha_inicio_act' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

              <div class="mb-3">
                <label for="" class="form-label" name="fecha_fin_act">Fecha de fin de actividad:</label>
                <input type="date" class="form-control" name="fecha_fin_act"  value="{{ old( 'fecha_fin_act', $act->fecha_fin_act ) }}" aria-describedby="helpId" @error('fecha_fin_act') is-invalid @enderror">
                @error( 'fecha_fin_act' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

              <div class="row mb-4">
                <button type="submit" class="btn btn-primary mx-4">Guardar</button>
             <a href="{{ route('Actividades.index') }}" class="btn btn-danger">Cancelar</a>
             </div>
        </form>
    </div>

@endsection