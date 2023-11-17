@extends('layouts.app')

@section( 'title', 'Vista de actividad #' . $act->id_act )

@section( 'content' )
    <h1>Vista de actividad #{{ $act->id_act }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID de actividad:</strong></u> {{ $act->id_act }}</li>
            <li class="list-group-item"><strong><u>Nombre del deporte:</u></strong> {{ $act->deporte->nombreDep }}</li>
            <li class="list-group-item"><strong><u>Nombre de la la instalación:</u></strong> {{ $act->instalacion->nombre_inst }}</li>

            <li class="list-group-item"><strong><u>Nombre de la actividad:</u></strong> {{ $act->nombre_act }}</li>
            <li class="list-group-item"><strong><u>Limite de socios por actividad:</strong></u> {{ $act->limite_soc_atc }}</li>
            <li class="list-group-item"><strong><u>Descripción de actividad:</strong></u> {{ $act->descripcion_act }}</li>
            <li class="list-group-item"><strong><u>Actividad en curso 0(no) ó 1(si):</strong></u> {{ $act->actividad_en_curso }}</li>
            <li class="list-group-item"><strong><u>Fecha de inicio de actividad:</strong></u> {{ $act->fecha_inicio_act }}</li>
            <li class="list-group-item"><strong><u>Fecha de fin de actividad:</strong></u> {{ $act->fecha_fin_act }}</li>            
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $act->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $act->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('Actividades.index') }}" class="btn btn-primary">Volver</a>
@endsection