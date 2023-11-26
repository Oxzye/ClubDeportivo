@extends('layouts.app')

@section( 'title', 'Vista de empleado por actividad #' . $cliente->dni_cli )

@section( 'content' )
    <h1>Vista del cliente #{{ $cliente->dni_cli }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">

            <li class="list-group-item"><strong>DNI:<u></u></strong>{{ $cliente->dni_cli }}</li>
            <li class="list-group-item"><strong><u>Nombre: </u></strong>{{ $cliente->nombre_cli }}</li>
            <li class="list-group-item"><strong><u>Apellido: </u></strong>{{ $cliente->apellido_cli }}</li>
            <li class="list-group-item"><strong><u>Domicilio: </u></strong>{{ $cliente->domicilio_cli }}</li>
            <li class="list-group-item"><strong><u>Localidad: </u></strong>{{ $cliente->Localidades->id_loc }}</li>
            <li class="list-group-item"><strong><u>Genero: </u></strong>{{ $cliente->generos->cod_genero }}</li>
            <li class="list-group-item"><strong><u>Fecha de nacimineto: </u></strong>{{ $cliente->fecha_nac_cli }}</li>
            <li class="list-group-item"><strong><u>Telefono: </u></strong>{{ $cliente->telefono_cli }}</li>
            <li class="list-group-item"><strong><u>Email: </u></strong>{{ $cliente->email_cli }}</li>
            <li class="list-group-item"><strong><u>Observaciones: </u></strong>{{ $cliente->observaciones }}</li>
            <li class="list-group-item"><strong><u>Imagen: </u></strong> 
                <img src="" alt="imagen cliente" class="img-fluid" style="width: 150px;"> 
            </li>

        </ul>
        
        <br>
        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
@endsection