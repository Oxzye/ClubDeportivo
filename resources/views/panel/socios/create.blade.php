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
        <form action="{{ route('socios.store') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-6 border border-dark">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellido">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="number" class="form-control" name="dni" id="dni" aria-describedby="dni">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CUIL</label>
                                <input type="number" class="form-control" name="cuil" id="cuil" aria-describedby="dni">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" aria-describedby="fecha_nac">
                                <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Genero</label>
                                <select class="form-control" id="cod_genero" name="cod_genero" >
                                <option selected>Seleccione uno</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numero de telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="telefono">
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
                    <div class="col-10">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group">
                            <label for="localidad">Contraseña</label>
                            <input class="form-control" type="text" value="La contraseña autogenerada será enviada al usuario vía email" readonly>
                            <input type="text" value="1" name="password" hidden>
                            <small id="" class="form-text text-muted">ss</small>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group">
                            <label for="observaciones_soc">¿Hay algo a tener en cuenta sobre este socio?</label>
                            <textarea class="form-control" name="observaciones_soc" aria-label="With textarea"></textarea>
                        </div>
                    </div>

                    
                </div>

                <input type="hidden" name="id_user" value="9">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('socios.index') }}" class="btn btn-danger">Cancelar</a>
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