@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Disponibilidades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Disponibilidad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Disponibilidades.store') }}" method="post">
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
            {{-- instalaciones con select --}}
            <div class="mb-3 row">
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> ID instalación: </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($instalacion as $instalacion)
                        <option value="{{ $instalacion->id_inst }}"> 
                            {{ $instalacion->nombre_inst }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin instalaciones con select --}}
            <div class="mb-3">
              <label for="" class="form-label" name="horariodisp">Horario disponible:</label>
              <input type="text" class="form-control" name="horariodisp" id="" aria-describedby="helpId" placeholder="">
            </div>   
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Localidades.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection