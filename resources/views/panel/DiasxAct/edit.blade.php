@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Dias por Actividades')
    
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
                <label for="id_dia" class="col-sm-4 col-form-label" name="id_dia"> ID día: </label>
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
                <label for="id_act" class="col-sm-4 col-form-label" name="id_act"> ID actividad: </label>
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
              <label for="" class="form-label" name="horario_inicio">Horario de inicio:</label>
              <input type="text" class="form-control" name="horario_inicio" id="" aria-describedby="helpId" placeholder="">
            </div>   

            <div class="mb-3">
                <label for="" class="form-label" name="horario_fin">Horario de fin:</label>
                <input type="text" class="form-control" name="horario_fin" id="" aria-describedby="helpId" placeholder="">
              </div>   
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('DiasxAct.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection