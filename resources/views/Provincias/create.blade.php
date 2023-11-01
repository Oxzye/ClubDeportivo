@extends('layouts.app')

@section('title','Crear Provincias')
    
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
        
        <form action="{{ route('Provincias.store') }}" method="post">
        @csrf

        <div class="form-floating mb-3">
                <select id="id_pais" name="id_pais" class="form-control">
                    @foreach ($paises as $pais)
                        <option {{ $provincia->id_pais && $provincia->id_pais == $pais->id ? 'selected': ''}} value="{{ $pais->id }}"> 
                            {{ $pais->nombre_pais }}
                        </option>
                    @endforeach
                </select>                
        </div>

            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre_prov" name="nombre_prov">
            <label for="floatingInput">Nombre de la Provincia:</label>
            </div>

             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Provincias.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection