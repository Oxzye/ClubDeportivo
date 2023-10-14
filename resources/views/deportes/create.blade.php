@extends('layouts.app')

@section('title','Crear Deportes')
    
@section('content')
    <div class="container">

        <h1>Crear nuevo deporte</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('deportes.store') }}" method="post">
        @csrf
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombreDep" name="nombreDep">
            <label for="floatingInput">Nombre del deporte:</label>
            </div>

            <div class="form-floating mb-3">
              <textarea class="form-control" id="descripcionDep" name="descripcionDep" style="height: 100px"></textarea>
              <label for="floatingTextarea2">Descripcion:</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="M_F_Mixto" aria-label="Floating label select example">
                    <option selected>-----</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Mixto">Mixto</option>
                </select>
                <label for="floatingSelect">Seleccione una Orientación</label>
            </div>


             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('deportes.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection