@extends('layouts.app')

@section('title','Crear Instalacion')
    
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
                <select class="form-select" id="floatingSelect" name="tipo_inst" aria-label="Floating label select example">
                    <option selected>-----</option>
                    <option value="Canchas Futbol 5">Canchas Futbol 5</option>
                    <option value="Canchas Futbol 11">Canchas Futbol 11</option>
                    <option value="Polideportivo">Polideportivo</option>
                </select>
                <label for="floatingSelect">Seleccione un tipo de instalacion</label>
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