@extends('adminlte::page')


@section('title', 'Cajas Index')

@section('content')
<div class="container">
    <div id="caja-indicator" class="alert alert-success" style="display: none;">
        La caja ha sido abierta.
      </div>
    <h1>Apertura y Cierre de Caja</h1>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Apertura de Caja</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('panel.Cajas.apertura') }}">
                            @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label" name="monto_inicial_caja">Monto inicial:</label>
                                  <input type="text" class="form-control" name="monto_inicial_caja" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label" name="Total_ventas_caja">Total de ventas:</label>
                                    <input type="text" class="form-control" name="Total_ventas_caja" id="" aria-describedby="helpId" placeholder="">
                                  </div>
                                <div class="mb-3">
                                    <label for="" class="form-label" name="saldo_caja">Saldo:</label>
                                    <input type="text" class="form-control" name="saldo_caja" id="" aria-describedby="helpId" placeholder="">
                                </div>  
                                
                                <div class="mb-3 ">
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
                        <button type="submit" class="btn btn-success">Abrir Caja</button>
                        <a href="{{ route('Cajas.index') }}" class="btn btn-danger">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>

        <!--<div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Cierre de Caja</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('panel.Cajas.cierre') }}">
                        @csrf
                        <div class="form-group">
                            <label for="monto_cierre">Monto de Cierre</label>
                            <input type="number" name="monto_cierre" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger">Cerrar Caja</button>
                    </form>
                </div>
            </div>
        </div>-->
    </div>
</div>
<script src="js/cajas.js"></script>

@endsection