{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Clientes')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Actualizar Cliente</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    <div class="col-12">
         
        <form action="{{ route('clientes.update', $clientes->dni_cli) }}" method="post" novalidate>
            @csrf @method('PUT')
            <div class="row">
                <div class="col-6 border border-dark">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="nombre_cli" id="nombre_cli" value="{{$clientes->nombre_cli }}">
                                <small id="" class="form-text text-muted">Obligatorio.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido_cli" name="apellido_cli" value="{{ $clientes->apellido_cli }}">
                                <small id="" class="form-text text-muted">Obligatorio.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="number" class="form-control" name="dni_cli" id="dni_cli" value="{{$clientes->dni_cli }}">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
              
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac_cli" name="fecha_nac_cli" value="{{ $clientes->fecha_nac_cli }}">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Genero</label>
                            <select id="cod_genero" name="cod_genero" class="form-control">
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->cod_genero }}"> 
                                        {{ $genero->tipo_genero }}
                                    </option>
                                @endforeach
                            </select> 
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio_cli" id="domicilio_cli" value="{{$clientes->domicilio_cli }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nro de telefono</label>
                                <input type="number" class="form-control" id="telefono_cli" name="telefono_cli" value="{{ $clientes->telefono_cli }}">
                                <small id="" class="form-text text-muted">We'll never share</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Localidade|Provincia|Paises</label>
                            <select class="form-control" id="id_loc" name="id_loc" >
                            @foreach ($localidades as $loc)
                            <option value="{{ $loc->id_loc }}"> 
                                {{ $loc->nombre_loc }} |
                                {{ $loc->Provincias->nombre_prov }} |
                                {{ $loc->Provincias->Paises->nombre_pais }}
                            </option>
                        @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                   <div class="col-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" class="form-control" name="email_cli" id="email_cli" value="{{ $clientes->email_cli }}" aria-describedby="helpId" @error('email_cli') is-invalid @enderror">
                                @error( 'email_cli' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                        </div>

                        <div class="col-10">
                            <div class="form-group">
                                <label for="observaciones">¿Hay algo a tener en cuenta sobre este cliente?</label>
                                <textarea class="form-control" name="observaciones" id="observaciones" aria-label="With textarea" value="{{$clientes->observaciones}}"></textarea>
                            </div>
                        </div>  
                    </div>

                <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
                
            </div>
        </form>
    </div>
</div>

@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop


{{-- Importacion de Archivos JS --}}
@section('js')

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    
@stop