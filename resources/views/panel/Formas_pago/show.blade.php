@extends('layouts.app')

@section( 'title', 'Vista de forma de pago #' . $Formas_pago->id_fdp )

@section( 'content' )
    <h1>Vista de forma de pago #{{ $Formas_pago->id_fdp }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID:</strong></u> {{ $Formas_pago->id_fdp }}</li>
            <li class="list-group-item"><strong><u>Forma de pago:</strong></u> {{ $Formas_pago->forma_pago_fdp }}</li>
            <li class="list-group-item"><strong><u>Descripción de forma de pago:</u></strong> {{ $Formas_pago->descripcion_fdp }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $Formas_pago->updated_at }}</li>
        </ul>
        
        <br>
        <a href="{{ route('/Formas_pago.index') }}" class="btn btn-primary">Volver</a>
@endsection