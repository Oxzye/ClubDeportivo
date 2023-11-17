@extends('layouts.app')

@section( 'title', 'Vista de disponibilidad #' . $disp->id_disp )

@section( 'content' )
    <h1>Vista de día por disponibilidad #{{ $disp->id_disp }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID de disponibilidad:</strong></u> {{ $disp->id_disp }}</li>
            <li class="list-group-item"><strong><u>Nombre de la instalación:</u></strong> {{ $disp->instalacion->nombre_inst }}</li>
            <li class="list-group-item"><strong><u>Nombre de día:</strong></u> {{ $disp->dia->nombre_dia }}</li>
            <li class="list-group-item"><strong><u>Horario disponible:</strong></u> {{$disp->horariodisp }}</li>
            <li class="list-group-item"><strong><u>Creación:</strong></u> {{ $disp->created_at }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $disp->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('Disponibilidades.index') }}" class="btn btn-primary">Volver</a>
@endsection