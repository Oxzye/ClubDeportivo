@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Localidades')
    
@section('content')
    <div class="container-fluid">

        <h1>Editar Localidad</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Localidades.update', $localidad->id_loc) }}" method="post">
        @csrf @method('PUT')
        
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_loc">Nombre Localidad:</label>
              <input type="text" class="form-control" name="nombre_loc" id="" aria-describedby="helpId" value="{{ $localidad->nombre_loc }}">
            </div>
            <div class="mb-3">
                <label for="Localidad" class="col-sm-4 col-form-label"> * Localidad </label>
                <div class="col-sm-8">
                <select id="id_loc" name="id_loc" class="form-control">
                    @foreach ($provincia as $prov)
                        <option value="{{ $prov->id_prov }}"> 
                            {{ $prov->nombre_prov }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label" name="cod_postal">Codigo_postal:</label>
                <input type="text" class="form-control" name="cod_postal" id="" aria-describedby="helpId" value="{{ $localidad->cod_postal }}">
              </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Localidades.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection