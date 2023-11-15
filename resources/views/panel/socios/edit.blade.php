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

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    <div class="col-12">
        <form action="{{ route('socios.update', $socio->id_soc) }}" method="post">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-6 border border-dark">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $socio->user->name) }}">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $socio->user->apellido) }}">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="number" class="form-control" name="dni" id="dni" value="{{ old('dni', $socio->user->dni) }}">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CUIL</label>
                                <input type="number" class="form-control" name="cuil_soc" id="cuil_soc" value="{{ old('cuil_soc', $socio->cuil_soc) }}">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac', $socio->user->fecha_nac) }}">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Genero</label>
                            <select id="cod_genero" name="cod_genero" class="form-control">
                                <option value="" selected>Seleccione uno...</option>
                                @foreach ($generos as $genero)
                                    <option {{ $socio->user->cod_genero && $socio->user->cod_genero == $genero->cod_genero ? 'selected': ''}} value="{{ $genero->tipo_genero }}"> 
                                        {{ $genero->tipo_genero }}
                                    </option>
                                @endforeach
                            </select> 
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="" value="{{ old('domicilio', $socio->user->domicilio) }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nro de telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $socio->user->telefono) }}">
                                <small id="" class="form-text text-muted">We'll never share</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">País</label>
                                <select class="form-control" id="pais" name="pais" >
                                <option selected>Seleccionar</option>
                                <option></option>
                                <option></option>
                                <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Provincia</label>
                                <select class="form-control" id="provincia" name="provincia" >
                                <option selected>Seleccionar</option>
                                <option></option>
                                <option></option>
                                <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad" >
                                <option selected>Seleccionar</option>
                                <option></option>
                                <option></option>
                                <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $socio->user->email) }}">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input class="form-control" type="text" value="La contraseña autogenerada será enviada al usuario vía email" readonly>
                                <input type="text" value="1" name="password" hidden>
                                <small id="" class="form-text text-muted"><a href="">Recuperar contraseña</a></small>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Asociacion</label>
                                <input class="form-control" type="text" value="{{ old('fecha_asociacion', $socio->fecha_asociacion) }}" readonly>
                                <!--<input type="date" class="form-control" id="fecha_asociacion" name="fecha_asociacion" value="{{ old('fecha_asociacion', $socio->fecha_asociacion) }}">-->
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <label for="observaciones_soc">¿Hay algo a tener en cuenta sobre este socio?</label>
                                <textarea class="form-control" name="observaciones_soc" id="observaciones_soc" aria-label="With textarea">{{ old('observaciones_soc', $socio->observaciones_soc) }}</textarea>
                            </div>
                        </div> 
                    </div>
                </div>

                <input type="hidden" name="id_user" value="9">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('socios.index') }}" class="btn btn-danger">Cancelar lo</a>
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