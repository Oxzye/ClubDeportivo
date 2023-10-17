@extends('layouts.app')

@section('title','Crear Paises')
    
@section('content')
    <div class="container">

        <h1>Crear nuevo país</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('paises.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_pais">Nombre país:</label>
              <input type="text" class="form-control" name="nombre_pais" value="{{ old( 'nombre_pais' ) }}" aria-describedby="helpId" @error('nombre_pais') is-invalid @enderror">
                @error( 'nombre_pais' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('paises.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection