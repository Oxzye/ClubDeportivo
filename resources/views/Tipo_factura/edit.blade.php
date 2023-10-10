@extends('layouts.app')

@section('title','Crear Tipos de Facturas')
    
@section('content')
    <div class="container">

        <h1>Editar Tipo de Factura</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Tipo_factura.update', $Tipo_factura->id_tipo_fac) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="Tipo_factura">Tipo de Factura:</label>
              <input type="text" class="form-control" name="Tipo_factura" id="" aria-describedby="helpId" value="{{ $Tipo_factura->tipo_fac }}">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Tipo_factura.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection