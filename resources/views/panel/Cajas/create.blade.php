@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Crear Cajas')
    
@section('content')
    <div class="container-fluid">

        <h1>Crear nueva Cajas</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('Cajas.store') }}" method="post">
        @csrf
            <div class="mb-3">
              <label for="" class="form-label" name="monto_inicial_caja">Monto inicial:</label>
              <input type="text" class="form-control" name="monto_inicial_caja" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label" name="Total_ventas_caja">Total de ventas:</label>
                <input type="text" class="form-control" name="Total_ventas_caja" id="" aria-describedby="helpId" placeholder="">
              </div>
            <div class="mb-3 ">
            <div class="mb-3">
                <label for="" class="form-label" name="saldo_caja">Saldo:</label>
                <input type="text" class="form-control" name="saldo_caja" id="" aria-describedby="helpId" placeholder="">
            </div>   
                <label for="Empleado" class="col-sm-4 col-form-label"> * Empleado</label>
                <div class="col-sm-8">
                <select id="id_emp" name="id_emp" class="form-control">
                    @foreach ($empleado as $emp)
                        <option value="{{ $emp->nombre }}"> 
                            {{ $emp->nombre }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('Cajas.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection