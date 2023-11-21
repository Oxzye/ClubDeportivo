@extends('layouts.app')

@section( 'title', 'Vista de socio por actividad #' . $sxa->id_sxa )

@section( 'content' )
    <h1>Vista de socio por actividad #{{ $sxa->id_sxa }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID de socio por actividad:</strong></u> {{ $sxa->id_sxa }}</li>
            <li class="list-group-item"><strong><u>Actividad:</strong></u> {{ $sxa->actividad->nombre_act . ', '. $sxa->actividad->descripcion_act  }}</li>
            <li class="list-group-item"><strong><u>Socio:</u></strong> {{ $sxa->socio->user->name .' '. $sxa->socio->user->apellido }}</li>
            <li class="list-group-item"><strong><u>DNI socio:</u></strong> {{  $sxa->socio->user->dni }}</li>
            <li class="list-group-item"><strong><u>Fecha de inscripción:</strong></u> {{ $sxa->fecha_inscripcion }}</li>
            <li class="list-group-item"><strong><u>Opinión de socio:</strong></u> {{ $sxa->opinion_soc }}</li>
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $sxa->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $sxa->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('SocxAct.index') }}" class="btn btn-primary">Volver</a>
@endsection