@extends('layouts.app')

@section( 'title', 'Vista de día por actividad #' . $dxact->id_diasxact )

@section( 'content' )
    <h1>Vista de día por actividad #{{ $dxact->id_diasxact }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID día por actividad:</strong></u> {{ $dxact->id_diasxact }}</li>
            <li class="list-group-item"><strong><u>Nombre de la actividad:</u></strong> {{ $dxact->actividad->nombre_act }}</li>
            <li class="list-group-item"><strong><u>Nombre de día:</strong></u> {{ $dxact->dia->nombre_dia }}</li>
            <li class="list-group-item"><strong><u>Horario de inicio:</strong></u> {{ $dxact->horario_inicio }}</li>
            <li class="list-group-item"><strong><u>Horario de fin:</strong></u> {{ $dxact->horario_fin }}</li>
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $dxact->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $dxact->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('DiasxAct.index') }}" class="btn btn-primary">Volver</a>
@endsection