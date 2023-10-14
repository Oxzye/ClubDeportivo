@extends('layouts.app')

@section('title','Crear Dias')
    
@section('content')
    <div class="container">

        <h1>Editar Forma de pago</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Formas_pago.update', $Formas_pago->id_fdp) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="forma_pago_fdp">Nombre Forma de pago:</label>
              <input type="text" class="form-control" name="forma_pago_fdp" id="" aria-describedby="helpId" value="{{ $Formas_pago->forma_pago_fdp }}">

              <label for="" class="form-label" name="descripcion_fdp">Descripción de forma de pago:</label>
              <input type="text" class="form-control" name="descripcion_fdp" id="" aria-describedby="helpId" value="{{ $Formas_pago->descripcion_fdp }}">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Formas_pago.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection