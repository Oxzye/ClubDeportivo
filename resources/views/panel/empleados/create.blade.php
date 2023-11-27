{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Empleados')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Crear nuevo Empleado</h1>
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
        <form action="{{ route('empleados.store') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}">
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}">
                                @error('dni')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CUIT</label>
                                <input type="text" class="form-control @error('cuit_emp') is-invalid @enderror" name="cuit_emp" value="{{ old('cuit_emp') }}">
                                @error('cuit_emp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="text" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}">
                                @error('fecha_nac')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Genero</label>
                            <select id="cod_genero" name="cod_genero" class="form-control">
                                <option value="" selected>Seleccione uno...</option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->cod_genero }}"> 
                                        {{ $genero->tipo_genero }}
                                    </option>
                                @endforeach
                            </select> 
                                @error( 'cod_genero' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domicilio</label>
                                <input type="text" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" value="{{ old('domicilio') }}">
                                @error('domicilio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nro de telefono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                             </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">País</label>
                                <select class="form-control @error('id_pais') is-invalid @enderror" id="id_pais" name="id_pais">
                                    <option value="" selected>Seleccionar</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id_pais }}">{{ $pais->nombre_pais }}</option>
                                    @endforeach
                                </select>
                                @error('id_pais')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Provincias</label>
                                <select class="form-control" id="provincia" name="provincia">
                                    <option selected>Seleccionar</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincias->id_prov }}"> 
                                            {{ $provincias->nombre_prov }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('provincia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad" >
                                <option selected>Seleccionar</option>
                                 @foreach ($paises as $pais)
                                <option value="{{ $pais->id_pais }}"> 
                                    {{ $pais->nombre_pais }}
                                </option>
                            @endforeach
                                </select>
                                @error( 'id_loc' )
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                {{-- <small id="emailHelp" class="form-text text-muted">Obligatorio.</small> --}}
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="localidad">Contraseña</label>
                                <input class="form-control" type="text" value="La contraseña autogenerada será enviada al usuario vía email" readonly>
                                <input type="text" value="1" name="password" hidden>
                                <small id="" class="form-text text-muted">.</small>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Cargo de empleado</label>
                                <select id="id_cargo" name="id_cargo" class="form-control">
                                    <option value="" selected>Seleccione uno...</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id_cargo }}"> 
                                            {{ $cargo->nombre_cargo }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error( 'id_cargo' )
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInput">Fecha de alta de empleado</label>
                                <input type="text" class="form-control @error('fecha_alt_emp') is-invalid @enderror" name="fecha_Alt_emp" value="{{ old('fecha_alt__emp') }}">
                                @error('fecha_alt_emp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInput">Fecha de baja de empleado</label>
                                <input type="text" class="form-control @error('fecha_baja_emp') is-invalid @enderror" name="fecha_baja_emp" value="{{ old('fecha_baja_emp') }}">
                                @error('fecha_baja_emp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="observaciones_soc">¿Hay algo a tener en cuenta sobre este empleado?</label>
                                <textarea class="form-control" name="observaciones_soc" aria-label="With textarea"></textarea>
                            </div>
                        </div>  
                    </div>
                </div>

                <input type="hidden" name="id_user" value="">
                <div class="row mt-4">
                    <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                <a href="{{ route('empleados.index') }}" class="btn btn-danger mx-4">Cancelar</a>
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
    <script src="{{ asset('js/productos.js') }}"></script>
@stop