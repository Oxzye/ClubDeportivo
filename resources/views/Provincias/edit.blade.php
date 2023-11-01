@extends('layouts.app')

@section('title','Editar Provincias')
    
@section('content')
    <div class="container">

        <h1>Editar Provincias</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Provincias.update', $Provincias->id_prov) }}" method="post">
        @csrf @method('PUT')
        <div class="form-floating mb-3">
            <select id="id_pais" name="id_pais" class="form-control">
                @foreach ($paises as $pais)
                    <option {{ $provincias->id_pais && $provincias->id_pais == $pais->id ? 'selected': ''}} value="{{ $pais->id }}"> 
                        {{ $pais->nombre_pais }}
                    </option>
                @endforeach
            </select>           
    </div>

        <div class="mb-3">
            <label for="" class="form-label" name="nombre_prov">nombre_prov:</label>
            <input type="text" class="form-control" name="nombre_prov" id="" aria-describedby="helpId" placeholder="">
          </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Provincias.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection