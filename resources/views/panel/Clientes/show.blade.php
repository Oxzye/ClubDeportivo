{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('layouts.app')

@section('title','Ver')

@section('plugins.Datatables', true)

@section('content_header')

@stop
    
@section('content')

<div class="row">
       
    <div class="col-12 mb-3">
        <h1>Datos del Cliente #{{$clientes->dni_cli}}</h1>
        <a href="{{ route('clientes.index')}}" class="btn btn-sm btn-secondary text-uppercase">
            Volver al Listado de Clientes
        </a> 
    </div>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <div class="mb-3">
                        <div class="mb-3">
                            Nombre del Cliente: {{ $clientes->nombre_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Apellido del Cliente: {{ $clientes->apellido_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Genero  : {{ $clientes->generos->abreviatura_genero }}
                          </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Domicilio del Cliente: {{ $clientes->domicilio_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Fecha de Nacimiento del Cliente: {{ $clientes->fecha_nac_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Telefono del Cliente: {{ $clientes->telefono_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                          Localidad  : {{ $clientes->localidades->nombre_loc }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Email del Cliente: {{ $clientes->email_cli }}
                        </div>
                        <div>--------------------------------------------------</div>
                        <div class="mb-3">
                            Observaciones: {{ $clientes->observaciones }}
                        </div>
                 </div>
            </div>
        </div>
    </div> 
</div>
@endsection
      

@section('css')

@stop

@section('js')

@stop@extends('layouts.app')

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