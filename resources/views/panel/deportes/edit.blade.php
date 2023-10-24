{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Crear Deportes')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Deporte</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('deportes.update', $deporte->id_dep) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_dep">Nombre de deporte:</label>
              <input type="text" class="form-control" name="nombre_dep" id="" aria-describedby="helpId" value="{{ $deporte->nombreDep }}">
            </div>
            
            <div class="form-floating mb-3">
              <textarea class="form-control" id="descripcionDep" name="descripcionDep" style="height: 100px" >{{ $deporte->descripcionDep}}</textarea>
              <label for="floatingTextarea2">Descripcion:</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="M_F_Mixto" aria-label="Floating label select example">
                    <option value="Masculino" @if($deporte->M_F_Mixto == 'Masculino') selected @endif>Masculino</option>
                    <option value="Femenino" @if($deporte->M_F_Mixto == 'Femenino') selected @endif>Femenino</option>
                    <option value="Mixto" @if($deporte->M_F_Mixto == 'Mixto') selected @endif>Mixto</option>
                </select>
                <label for="floatingSelect">Seleccione una Orientación</label>
            </div>

            
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('deportes.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection