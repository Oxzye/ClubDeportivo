@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Actividad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Actividades.store') }}" method="post">
        @csrf
            {{-- dias con select --}}
            <div class="mb-3 row">
                <label for="id_diasxact" class="col-sm-4 col-form-label" name="id_diasxact"> Día por actividad: </label>
                <select id="id_diasxact" name="id_diasxact" class="form-control">
                    @foreach ($diasxact as $dxact)
                        <option value="{{ $dxact->id_diasxact }}"> 
                            {{ $dxact->id_diasxact }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin  dias con select--}}

            {{-- deportes con select --}}
            <div class="mb-3 row">
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> Deporte: </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($deportes as $deporte)
                        <option value="{{ $deporte->id_dep }}"> 
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
                        <option value="{{ $instalacion->id_inst }}"> 
                            {{ $instalacion->nombre_inst }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin instalaciones con select --}}

            {{-- empleado por act con select --}}
            <div class="mb-3 row">
                <label for="id_exa" class="col-sm-4 col-form-label" name="id_exa"> Empleado por actividad: </label>
                <select id="id_exa" name="id_exa" class="form-control">
                    @foreach ($empxact as $exa)
                        <option value="{{ $exa->id_exa }}"> 
                            {{ $exa->id_act }}
                        </option>
                    @endforeach
                </select>
            </div> 
            {{-- fin empleado por act con select --}}
            
            <div class="mb-3">
                <label for="" class="form-label" name="limite_soc_atc">Limite de socios por actividad:</label>
                <input type="number" class="form-control" name="limite_soc_atc"  value="{{ old( 'limite_soc_atc' ) }}" aria-describedby="helpId" @error('limite_soc_atc') is-invalid @enderror">
                @error( 'limite_soc_atc' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

            <div class="mb-3">
              <label for="" class="form-label" name="descripcion_act">descripción de actividad:</label>
              <input type="text" class="form-control" name="descripcion_act"  value="{{ old( 'descripcion_act' ) }}" aria-describedby="helpId" @error('descripcion_act') is-invalid @enderror">
              @error( 'descripcion_act' )
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <br>
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="actividad_en_curso">Actividad en curso:</label>
                <input type="text" class="form-control" name="actividad_en_curso"  value="{{ old( 'actividad_en_curso' ) }}" aria-describedby="helpId" @error('actividad_en_curso') is-invalid @enderror">
                @error( 'actividad_en_curso' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

              <div class="mb-3">
                <label for="" class="form-label" name="fecha_inicio_act">Fecha de inicio de actividad:</label>
                <input type="date" class="form-control" name="fecha_inicio_act"  value="{{ old( 'fecha_inicio_act' ) }}" aria-describedby="helpId" @error('fecha_inicio_act') is-invalid @enderror">
                @error( 'fecha_inicio_act' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

              <div class="mb-3">
                <label for="" class="form-label" name="fecha_fin_act">Fecha de fin de actividad:</label>
                <input type="date" class="form-control" name="fecha_fin_act"  value="{{ old( 'fecha_fin_act' ) }}" aria-describedby="helpId" @error('fecha_fin_act') is-invalid @enderror">
                @error( 'fecha_fin_act' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   

             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Actividades.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection