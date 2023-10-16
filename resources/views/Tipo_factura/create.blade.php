@extends('layouts.app')

@section('title','Crear Tipos de Facturas')
    
@section('content')
    <div class="container">

        <h1>Crear nueva Tipo de Factura</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Tipo_factura.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="tipo_fac">Tipo de Factura:</label>
              <input type="text" class="form-control" name="tipo_fac" id="tipo_fac" atipo_facia-desctipo_facibedby="helpId" placeholder="">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Tipo_factura.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection