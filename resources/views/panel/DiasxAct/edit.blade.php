@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Dias por Actividades')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Dias por Actividades</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('DiasxAct.update', $dxact->id_diasxact) }}" method="post" novalidate>
            @csrf @method('PUT')
            {{-- dias con select --}}
            <div class="mb-3 row">
                <label for="id_dia" class="col-sm-4 col-form-label" name="id_dia"> Día: </label>
                <select id="id_dia" name="id_dia" class="form-control">
                    @foreach ($dias as $dia)
                        <option value="{{ $dia->id_dia }}" {{ $dia->id_dia == $dxact->id_dia ? 'selected' : '' }}> 
                            {{ $dia->nombre_dia }}
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
                        <option value="{{ $act->id_act }}" {{ $act->id_act == $dxact->id_act ? 'selected' : '' }}> 
                            {{ $act->nombre_act }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin actividades con select --}}
            <div class="mb-3">
                <label for="" class="form-label" name="horario_inicio">Horario de inicio, con formato YYYY-MM-DD HH:mm:ss:</label>
                <input type="text" class="form-control" name="horario_inicio" value="{{ old( 'horario_inicio', $dxact->horario_inicio ) }}" aria-describedby="helpId" @error('horario_inicio') is-invalid @enderror">
                @error( 'horario_inicio' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
              </div>   
  
              <div class="mb-3">
                  <label for="" class="form-label" name="horario_fin">Horario de fin, con formato YYYY-MM-DD HH:mm:ss:</label>
                  <input type="text" class="form-control" name="horario_fin" value="{{ old( 'horario_fin', $dxact->horario_fin ) }}" aria-describedby="helpId" @error('horario_fin') is-invalid @enderror">
                  @error( 'horario_fin' )
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <br>
                </div>   
             <button type="submit" class="btn btn-success">Guardar</button>
             <a href="{{ route('DiasxAct.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection