@extends('layouts.app')

@section('title','Crear Generos')
    
@section('content')
    <div class="container">

        <h1>Crear nuevo Genero</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Generos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label" name="tipo_genero">Tipo de genero:</label>
            <input type="text" class="form-control" name="tipo_genero" id="" aria-describedby="helpId" placeholder="">
          </div>
          <div class="mb-3">
              <label for="" class="form-label" name="abreviatura_genero">Abreviatura:</label>
              <input type="text" class="form-control" name="abreviatura_genero" id="" aria-describedby="helpId" placeholder="">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Generos.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection