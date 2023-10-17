@extends('layouts.app')

@section('title','Crear Países')
    
@section('content')
    <div class="container">

        <h1>Editar país</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('paises.update', $pais->id_pais) }}" method="post" novalidate>
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_pais">Nombre dia:</label>
              <input type="text" class="form-control" name="nombre_pais" aria-describedby="helpId" value="{{ old( 'nombre_pais', $pais->nombre_pais) }}" @error('nombre_pais') is-invalid @enderror">
              @error( 'nombre_pais' )
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('paises.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection