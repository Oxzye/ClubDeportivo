@extends('layouts.app')

@section('title','Crear tipos_detalle_factura')
    
@section('content')
    <div class="container">

        <h1>Crear nuevo tipo de detalle de factura</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('tipos_detalle_factura.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="tipodetalle">Tipo_detalle:</label>
              <input type="text" class="form-control" name="tipodetalle" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label" name="descripcion_tdf">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion_tdf" id="" aria-describedby="helpId" placeholder="">
              </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('tipos_detalle_factura.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection