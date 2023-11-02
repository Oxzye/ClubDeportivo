{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Crear Países')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar país</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Provincias.update', $provincia->id_prov) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_prov">Nombre Provincia:</label>
              <input type="text" class="form-control" name="nombre_prov" id="" aria-describedby="helpId" value="{{ $provincia->nombre_prov }}">
            </div>
            <div class="mb-3 row">
                <label for="Pais" class="col-sm-4 col-form-label"> * Pais </label>
                <div class="col-sm-8">
                <select id="id_pais" name="id_pais" class="form-control">
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id_pais }}"> 
                            {{ $pais->nombre_pais }}
                        </option>
                    @endforeach
                </select>
                </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Provincias.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection