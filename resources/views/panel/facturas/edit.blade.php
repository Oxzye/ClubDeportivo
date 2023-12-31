@extends('adminlte::page')

@section('plugins.Datatables', true)
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                <label for="socio" class="col-sm-4 col-form-label"> * DNI socio </label>
                <div class="col-sm-8">
                    <select id="dni_soc" name="dni_soc" class="form-control select2">
                        @foreach ($socio as $soc)
                            <option value="{{ $soc->id_soc }}"> 
                                {{ $soc->user->dni }}, {{ $soc->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="cli" class="col-sm-4 col-form-label"> * DNI cliente </label>
                <div class="col-sm-8">
                    <select id="dni_cli" name="dni_cli" class="form-control select2">
                        @foreach ($clientes as $cli)
                            <option value="{{ $cli->dni_cli }}"> 
                                {{ $cli->dni_cli }}, {{ $cli->nombre_cli }}
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

@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush