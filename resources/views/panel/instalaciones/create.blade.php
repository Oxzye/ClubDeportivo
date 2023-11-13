{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'instalaciones Index')

{{-- Titulo en el contenido de la Pagina --}}

@section('content')
    <div class="container">

        <h1>Crear nueva Instalacion</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('instalaciones.store') }}" method="post">
        @csrf
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre_inst" name="nombre_inst">
            <label for="floatingInput">Nombre de instalacion:</label>
            </div>

            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tipo_inst" name="tipo_inst">
            <label for="floatingInput">tipo_inst:</label>
            </div>

            <div class="form-floating mb-3">
            <input type="number" class="form-control" id="capacidad_inst" name="capacidad_inst">
            <label for="floatingInput">Capacidad:</label>
            </div>

            


             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('instalaciones.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection