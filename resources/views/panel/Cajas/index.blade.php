@extends('adminlte::page')


@section('title', 'Cajas Index')

@section('content')
<div class="container">
    <h1>Apertura y Cierre de Caja</h1>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('Cajas.create') }}" class="btn btn-primary">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Apertura de Caja</h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('panel.Cajas.apertura') }}">
                        @csrf
                        <div class="form-group">
                            <label for="monto_apertura">Monto de Apertura</label>
                            <input type="number" name="monto_apertura" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Abrir Caja</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
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
        </div>
    </div>
</div>
@endsection