@extends('layouts.app')

@section('title','Crear Paises')
    
@section('content')
    <div class="container">

        <h1>Crear nuevo Forma de pago:</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Formas_pago.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="forma_pago_fdp">Nombre de forma de pago:</label>
              <input type="text" class="form-control" name="forma_pago_fdp" id="" aria-describedby="helpId" @error('forma_pago_fdp') is-invalid @enderror">
                @error( 'forma_pago_fdp' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <br>

              <label for="" class="form-label" name="descripcion_fdp">Descripción de forma de pago:</label>
              <input type="text" class="form-control" name="descripcion_fdp" id="" aria-describedby="helpId" @error('descripcion_fdp') is-invalid @enderror">
                @error( 'descripcion_fdp' )
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
      <br>
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Formas_pago.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection