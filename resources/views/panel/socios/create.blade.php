{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Socios')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Crear nuevo Socio</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}

            <div class="col-12">
                <form action="{{ route('socios.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old( 'name' ) }}" aria-describedby="helpId">
                                        @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old( 'apellido' ) }}" aria-describedby="helpId">
                                        @error('apellido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">DNI</label>
                                        <input type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" id="dni" value="{{ old( 'dni' ) }}" aria-describedby="helpId">
                                        @error('dni')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CUIL</label>
                                        <input type="text" class="form-control @error('cuil_soc') is-invalid @enderror" name="cuil_soc" value="{{ old('cuil_soc') }}">
                                @error('cuil_soc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                        {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="date" class="form-control @error('fecha_nac') is-invalid @enderror" name="fecha_nac" value="{{ old('fecha_nac') }}">
                                @error('fecha_nac')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                        {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                                    </div>
                                </div>
                               <div class="col-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Genero</label>
                                <select class="form-control @error('cod_genero') is-invalid @enderror" id="cod_genero" name="cod_genero">
                                <option value="" selected>Seleccione uno...</option>
                                @foreach ($generos as $genero)
                                <option value="{{ $genero->cod_genero }}">{{ $genero->tipo_genero }}</option>
                            @endforeach
                        </select>
                        @error('cod_genero')
                            <div class="invalid-feedback">{{ $message }}</div>
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
                                        {{-- <small id="" class="form-text text-muted">Obligatorio</small> --}}
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
                                        <select class="form-control @error('id_prov') is-invalid @enderror" id="id_prov" name="id_prov">
                                            <option value="" selected>Seleccionar</option>
                                            @foreach ($provincias as $provincia)
                                                <option value="{{ $provincia->id_prov }}">{{ $provincia->nombre_prov }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_prov')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Localidad</label>
                                        <select class="form-control @error('id_loc') is-invalid @enderror" id="id_loc" name="id_loc">
                                            <option value="" selected>Seleccionar</option>
                                            @foreach ($localidades as $localidad)
                                                <option value="{{ $localidad->id_loc }}">{{ $localidad->nombre_loc }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_loc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electronico</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old( 'email' ) }}" aria-describedby="helpId">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="localidad">Contraseña</label>
                                        <input class="form-control" type="text"
                                            value="La contraseña autogenerada será enviada al usuario vía email" readonly>
                                        <input type="text" value="1" name="password" hidden>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fecha de Asociacion</label>
                                        <input type="date" class="form-control @error('fecha_asociacion') is-invalid @enderror" name="fecha_asociacion" value="{{ old('fecha_asociacion') }}">
                                @error('fecha_asociacion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="observaciones_soc">¿Hay algo a tener en cuenta sobre este
                                            socio?</label>
                                        <textarea class="form-control" name="observaciones_soc" id="observaciones_soc" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id_user" value="9">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('socios.index') }}" class="btn btn-danger mx-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    @stop

    {{-- Importacion de Archivos CSS --}}
    @section('css')

    @stop


    {{-- Importacion de Archivos JS --}}
    {{-- Importacion de Archivos JS --}}
@section('js')

{{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
<script src="{{ asset('js/socios.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputs = document.querySelectorAll('input, select');

        inputs.forEach(function (input) {
            input.addEventListener('input', function () {
                // Remover la clase de error al escribir
                this.classList.remove('is-invalid');
            });
        });
    });
</script>

@stop