@extends('layouts.app')

@section( 'title', 'Vista de empleado por actividad #' . $empxact->id_exa )

@section( 'content' )
    <h1>Vista de empleado por actividad #{{ $empxact->id_exa }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID empleado por actividad:</strong></u> {{ $empxact->id_exa }}</li>
            <li class="list-group-item"><strong><u>Empleado:</strong></u> {{ $empxact->empleado->user->name .' '. $empxact->empleado->user->apellido }}</li>
            <li class="list-group-item"><strong><u>DNI empleado:</u></strong> {{  $empxact->empleado->user->dni }}</li>
            <li class="list-group-item"><strong><u>Actividad:</u></strong> {{ $empxact->actividad->nombre_act. ', '. $empxact->actividad->descripcion_act }}</li>
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $empxact->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $empxact->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('EmpxAct.index') }}" class="btn btn-primary">Volver</a>
@endsection