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
            <li class="list-group-item"><strong><u>Empleado cuit del empleado:</strong></u> {{ $empxact->empleado->cuit_emp }}</li>
            <li class="list-group-item"><strong><u>Nombre de la actividad:</u></strong> {{ $empxact->actividad->nombre_act }}</li>
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $empxact->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $empxact->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('EmpxAct.index') }}" class="btn btn-primary">Volver</a>
@endsection