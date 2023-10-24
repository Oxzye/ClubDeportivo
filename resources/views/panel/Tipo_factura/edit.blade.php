{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('title','Crear Tipos de Facturas')
    
@section('content')
    <div class="container-fluid">

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
              <label for="" class="form-label" name="tipo_fac">Tipo de Factura:</label>
              <input type="text" class="form-control" name="tipo_fac" id="" aria-describedby="helpId" value="{{old('tipo_fac', $Tipo_factura->tipo_fac) }}">
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Tipo_factura.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection