@extends('layouts.app')

@section('title','Crear Dias')
    
@section('content')
    <div class="container">

        <h1>Editar dia</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('dias.update', $dia->id_dia) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_dia">Nombre dia:</label>
              <input type="text" class="form-control" name="nombre_dia" id="" aria-describedby="helpId" value="{{ $dia->nombre_dia }}">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('dias.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection