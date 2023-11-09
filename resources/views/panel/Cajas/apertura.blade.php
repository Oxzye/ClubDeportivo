@extends('adminlte::page')


@section('title', 'Cajas Index')

@section('content')
<div class="container">

    <div id="caja-indicator" class="alert alert-success" style="display: none;">
    La caja ha sido abierta.
    </div>
    <h1>Apertura de Caja</h1>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    <button id="cierrecj" class="btn btn-danger">Cierre de caja</button>
    <div class="cierre_cajas" id="cierre_cajas" hidden>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title" >Cierre de Caja</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('panel.Cajas.cierre') }}">
                        @csrf
                        <div class="form-group">
                            <label for="monto_cierre">Monto de Cierre</label>
                            <input type="number" name="monto_final" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_vent">Total de ventas</label>
                            <input type="" name="" id="" value="<?php $ventas ?>" >
                        </div>
                          <input type="text" name="estado-caja" id="" class="form-control" placeholder="" aria-describedby="helpId" value="0">
                        <button type="submit" class="btn btn-danger">Cerrar Caja</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/cajas.js"></script>
@endsection