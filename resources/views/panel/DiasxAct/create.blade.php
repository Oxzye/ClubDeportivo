@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Dias por Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nuevo Dias por Actividades</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('DiasxAct.store') }}" method="post">
        @csrf
            {{-- dias con select --}}
            <div class="mb-3 row">
                <label for="id_dia" class="col-sm-4 col-form-label" name="id_dia"> Día: </label>
                <select id="id_dia" name="id_dia" class="form-control">
                    @foreach ($dias as $dia)
                        <option value="{{ $dia->id_dia }}"> 
                            {{ $dia->nombre_dia }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin  dias con select--}}
            {{-- actividades con select --}}
            <div class="mb-3 row">
                <label for="id_act" class="col-sm-4 col-form-label" name="id_act">Actividad (nombre_act | descripcion_act): </label>
                <select id="id_act" name="id_act" class="form-control">
                    @foreach ($actividades as $act)
                        <option value="{{ $act->id_act }}"> 
                            {{ $act->nombre_act . ' | '. $act->descripcion_act }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin actividades con select --}}
            <div class="mb-3">
              <label for="" class="form-label" name="horario_inicio">Horario de inicio, con formato YYYY-MM-DD HH:mm:ss:</label>
              <input type="text" class="form-control" name="horario_inicio" value="{{ old( 'horario_inicio' ) }}" aria-describedby="helpId" @error('horario_inicio') is-invalid @enderror">
              @error( 'horario_inicio' )
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <br>
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="horario_fin">Horario de fin, con formato YYYY-MM-DD HH:mm:ss:</label>
                <input type="text" class="form-control" name="horario_fin" value="{{ old( 'horario_fin' ) }}" aria-describedby="helpId" @error('horario_fin') is-invalid @enderror">
                @error( 'horario_fin' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   
             <button type="submit" class="btn btn-success">Guardar</button>
             <a href="{{ route('DiasxAct.index') }}" class="btn btn-danger mx-3">Cancelar</a>
        </form>
    </div>

@endsection