@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Localidades')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Localidades</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Localidades.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="nombre_loc">Nombre Localidad:</label>
              <input type="text" class="form-control" name="nombre_loc" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 row">
                <label for="Provincia" class="col-sm-4 col-form-label"> * Provincia </label>
                <div class="col-sm-8">
                <select id="id_prov" name="id_prov" class="form-control">
                    @foreach ($provincia as $prov)
                        <option value="{{ $prov->id_prov }}"> 
                            {{ $prov->nombre_prov }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label" name="cod_postal">Codigo postal:</label>
              <input type="text" class="form-control" name="cod_postal" id="" aria-describedby="helpId" placeholder="">
            </div>   
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Localidades.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection