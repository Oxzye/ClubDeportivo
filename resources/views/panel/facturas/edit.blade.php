@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title','Editar Facturas')
    
@section('content')
    <div class="container-fluid">
            <h1>Editar Factura</h1>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        <form action="{{ route('facturas.update', $facturas->num_fac) }}" method="post">
            @csrf @method('PUT')
            <input type="hidden" class="" name="id_caja" value="{{ $facturas->id_caja }}">
            <input type="number" class="form-control" name="monto_fac" value="{{ $facturas->monto_fac}}" readonly>
                
            <div class="mb-3">
                <label for="fdp" class="col-sm-4 col-form-label"> * Forma de pago </label>
                <div class="col-sm-8">
                <select id="id_fdp" name="id_fdp" class="form-control">
                    @foreach ($formdp as $fdp)
                        <option value="{{ $fdp->id_fdp }}"> 
                            {{ $fdp->forma_pago_fdp }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="tipofac" class="col-sm-4 col-form-label"> * Tipo de fac </label>
                <div class="col-sm-8">
                <select id="tipo_fac" name="tipo_fac" class="form-control">
                    @foreach ($tipofac as $tfac)
                        <option value="{{ $tfac->id_tipo_fac }}"> 
                            {{ $tfac->tipo_fac }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="cli" class="col-sm-4 col-form-label"> * DNI cliente </label>
                <div class="col-sm-8">
                <select id="dni_cli" name="dni_cli" class="form-control">
                    <option value=" ">--Seleccionar--</option>
                    @foreach ($clientes as $cli)
                        <option value="{{ $cli->id_cli }}"> 
                            {{ $cli->user->dni }}, {{ $cli->user->name }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="socio" class="col-sm-4 col-form-label"> * DNI socio </label>
                <div class="col-sm-8">
                <select id="dni_soc" name="dni_soc" class="form-control">
                    <option value=" ">--Seleccionar--</option>
                    @foreach ($socio as $soc)
                        <option value="{{ $soc->id_soc }}"> 
                            {{ $soc->user->dni }}, {{ $soc->user->name }}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label" name="estado_fac">Estado de factura</label>
                <select class="form-select" id="pagada_fac" name="pagada_fac">
                <option value="1">Pagada</option>
                <option value="0">No Pagada</option>
                </select>
            </div>  
             <button type="submit" class="btn btn-primary">Guardar</button>
             <a href="{{ route('facturas.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>

@endsection