@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Disponibilidades')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Disponibilidad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Disponibilidades.update', $disp->id_disp) }}" method="post" novalidate>
        @csrf @method('PUT')
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
                <label for="id_inst" class="col-sm-4 col-form-label" name="id_inst"> Instalación (nombre_inst | tipo_inst | capacidad): </label>
                <select id="id_inst" name="id_inst" class="form-control">
                    @foreach ($instalaciones as $instalacion)
                        <option value="{{ $instalacion->id_inst, old( 'id_inst' ) }}" aria-describedby="helpId" @error('id_inst') is-invalid @enderror">
                        @error( 'id_inst' )
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{ $instalacion->nombre_inst .' | '.$instalacion->tipo_inst .' | '. $instalacion->capacidad_inst}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- fin instalaciones con select --}}
            <div class="mb-3">
                <label for="" class="form-label" name="horariodisp">Horario disponible, formato "HH:mm a HH:mm":</label>
                <input type="text" class="form-control" name="horariodisp" value="{{ old( 'horariodisp', $disp->horariodisp ) }}" aria-describedby="helpId" @error('horariodisp') is-invalid @enderror">
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