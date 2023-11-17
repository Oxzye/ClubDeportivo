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
                <label for="id_soc" class="col-sm-4 col-form-label" name="id_soc"> Socio: </label>
                <select id="id_soc" name="id_soc" class="form-control">
                    @foreach ($socios as $socio)
                        <option value="{{ $socio->id_soc }}"> 
                            {{ $socio->cuil_soc }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin  dias con select--}}
            {{-- actividades con select --}}
            <div class="mb-3 row">
                <label for="id_act" class="col-sm-4 col-form-label" name="id_act"> Actividad: </label>
                <select id="id_act" name="id_act" class="form-control">
                    @foreach ($actividades as $act)
                        <option value="{{ $act->id_act }}"> 
                            {{ $act->nombre_act }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin actividades con select --}}
            <div class="mb-3">
              <label for="" class="form-label" name="fecha_inscripcion">Fecha de inscripción, con formato YYYY-MM-DD HH:mm:ss:</label>
              <input type="text" class="form-control" name="fecha_inscripcion" value="{{ old( 'fecha_inscripcion' ) }}" aria-describedby="helpId" @error('fecha_inscripcion') is-invalid @enderror">
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
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('SocxAct.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection