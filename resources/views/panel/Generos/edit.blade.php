{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Editar Generos')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar tipo de detalle de factura</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Generos.update', $Generos->cod_genero) }}" method="post">
        @csrf @method('PUT')
        
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