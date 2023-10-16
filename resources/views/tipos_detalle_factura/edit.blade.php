@extends('layouts.app')

@section('title','Editar tipos_detalle_factura')
    
@section('content')
    <div class="container">

        <h1>Editar tipo de detalle de factura</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('tipos_detalle_factura.update', $tipos_detalle_factura->id_tipodetallefactura) }}" method="post">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label for="" class="form-label" name="tipodetalle">Tipo de detalle:</label>
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