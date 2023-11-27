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
                <label for="id_dia" class="col-sm-4 col-form-label" name="id_dia">Día: </label>
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
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst">Instalación (nombre_inst | tipo_inst | capacidad): </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($instalaciones as $instalacion)
                        <option value="{{$instalacion->id_inst}}">
                            {{$instalacion->nombre_inst}}|
                            {{$instalacion->tipo_inst}}|
                            {{$instalacion->capacidad_inst}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            {{-- fin instalaciones con select --}}
            <div class="mb-3">
                <label for="" class="form-label" name="horariodisp">Horario disponible, con formato "HH:mm a HH:mm":</label>
                <input type="text" class="form-control" name="horariodisp" value="{{ old( 'horariodisp' ) }}" aria-describedby="helpId" @error('horariodisp') is-invalid @enderror">
                @error( 'horariodisp' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
            </div>   
             <button type="submit" class="btn btn-success">Guardar</button>
             <a href="{{ route('Disponibilidades.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection