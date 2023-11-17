@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar empleado por actividad')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar empleado por actividad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('EmpxAct.update', $empxact->id_exa) }}" method="post" novalidate>
            @csrf @method('PUT')
            {{-- empleados con select --}}
            <div class="mb-3 row">
                <label for="id_emp" class="col-sm-4 col-form-label" name="id_emp"> Empleado: </label>
                <select id="id_emp" name="id_emp" class="form-control">
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id_emp }}"> 
                            {{ $empleado->user->name .' '. $empleado->user->apellido }}
                        </option>
                    @endforeach
                </select>
            </div> 
            {{-- fin empleados con select --}}
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
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('EmpxAct.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection