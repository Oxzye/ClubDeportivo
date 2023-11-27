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
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" aria-describedby="helpId" @error('name') is-invalid @enderror">
                                @error( 'name' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                                @error( 'name' )
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" aria-describedby="helpId" @error('apellido') is-invalid @enderror">
                                @error( 'apellido' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="number" class="form-control" name="dni" id="dni" value="{{ old('dni') }}" aria-describedby="helpId" @error('dni') is-invalid @enderror">
                                @error( 'dni' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <small id="" class="form-text text-muted">Obligatorio.</small> --}}
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CUIT</label>
                                <input type="number" class="form-control" name="cuit_emp" id="cuit_emp" value="{{ old('cuit_emp') }}">
                                <small id="" class="form-text text-muted">Posible alert.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac') }} "aria-describedby="helpId" @error('fecha_nac') is-invalid @enderror">
                                @error( 'fecha_nac' )
                                    <div class="alert alert-danger">{{ $message }}</div>
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
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" id="" value="{{ old( 'domicilio' ) }}" aria-describedby="helpId" @error('domicilio') is-invalid @enderror">
                                @error( 'domicilio' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">Domicilio donde reside actualmente.</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nro de telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="telefono" value="{{ old( 'telefono' ) }}" @error('telefono') is-invalid @enderror">
                                @error( 'telefono' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror>
                                <small id="" class="form-text text-muted">Obligatorio.</small>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">País</label>
                                <select class="form-control" id="id_pais" name="id_pais" >
                                <option value="" selected>Seleccionar</option>
                                @foreach ($paises as $pais)
                                <option value="{{ $pais->id_pais }}"> 
                                    {{ $pais->nombre_pais }}
                                </option>
                            @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Provincias</label>
                                <select class="form-control" id="provincia" name="provincia">
                                <option selected>Seleccionar</option>
                                @foreach ($paises as $pais)
                                <option value="{{ $pais->id_pais }}"> 
                                    {{ $pais->nombre_pais }}
                                </option>
                            @endforeach
                                </select>
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
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old( 'email' ) }}" aria-describedby="helpId" @error('email') is-invalid @enderror">
                                @error( 'email' )
                                    <div class="alert alert-danger">{{ $message }}</div>
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
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInput">Fecha de alta de empleado</label>
                                <input type="date" class="form-control" id="fecha_alta_emp" name="fecha_alta_emp" aria-describedby="fecha_nac" value="{{ old( 'fecha_alta_emp' ) }}"  @error('fecha_alta_emp') is-invalid @enderror">
                                @error( 'fecha_alta_emp' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <small id="" class="form-text text-muted">Obligatorio.</small>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="exampleInput">Fecha de baja de empleado</label>
                                <input type="date" class="form-control" id="fecha_baja_emp" name="fecha_baja_emp" aria-describedby="fecha_nac" value="{{ old( 'fecha_baja_emp' ) }}"  @error('fecha_baja_emp') is-invalid @enderror">
                                @error( 'fecha_baja_emp' )
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <small id="" class="form-text text-muted">Puede estar vacio.</small>
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