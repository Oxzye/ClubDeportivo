{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Editar Países')
    
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
        
        <form action="{{ route('paises.update', $pais->id_pais) }}" method="post" novalidate>
        @csrf @method('PUT')
        
            <div class="col-9 mb-3">
              <label for="" class="form-label" name="nombre_pais">Nombre país:</label>
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