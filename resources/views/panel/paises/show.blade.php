@extends('layouts.app')

@section( 'title', 'Vista del País #' . $pais->id_pais )

@section( 'content' )
    <h1>Vista del País #{{ $pais->id_pais }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID:</strong></u> {{ $pais->id_pais }}</li>
            <li class="list-group-item"><strong><u>Nombre del país:</strong></u> {{ $pais->nombre_pais }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $pais->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('paises.index') }}" class="btn btn-primary">Volver</a>
@endsection