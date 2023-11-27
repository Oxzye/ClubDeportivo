@extends('adminlte::page')

@section('plugins.Datatables', true)
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@section('title', 'Finalizar factura')

@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="container">
    <a href="/panel/facturas" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;">
        <span class="material-symbols-outlined d-flex justify-content-center">
            article
            </span>
    </a>
</div>
<div class="container">
    <h1>Factura</h1>

        <div>
            
            <p>Número de Factura: {{ $facturas->num_fac }}</p>
            <p>Fecha de Factura: {{ $facturas->fecha_fac }}</p>
            <p>id_caja: {{ $facturas->id_caja }}</p>
            <p>Forma de pago: {{ $facturas->formas_pago->forma_pago_fdp }}</p>
            <p>Tipo de factura: {{ $facturas->Tipo_fac->tipo_fac}}</p>
            @if ($facturas->dni_soc == null)
            <p>Cliente: {{ $facturas->client->nombre_cli }}</p>
            @else
            <p>Cliente-socio: {{ $facturas->dnisocio->user->dni }}, {{ $facturas->dnisocio->user->name }}</p>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Detalles de Factura</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($detalles as $detalle)
                        
                            <tr>
                                @if ($detalle->id_act != null)
                                <td>
                                        Actividad: {{ $detalle->actividad->nombre_act }}
                                        <br>
                                        <ul>
                                            <li>Precio: {{ $detalle->actividad->precio_act }}</li>
                                        </ul>
                                </td>
                                    @else
                                    <td>
                                        Item: {{ $detalle->tipodetfact->tipodetalle }}
                                        <ul>
                                            <li>Precio: {{ $detalle->tipodetfact->precio_tdf }}</li>
                                        </ul>
                                    @endif
                                    </td>
                            </tr>
                       
                    @endforeach
                    
                </tbody>
            </table>

            <p>Monto: {{ $facturas->monto_fac }}</p><p>Estado de factura: @if($facturas->pagada_fac == 0) No pagada @else Pagada @endif </p></p>
        </div>

        <hr>
    
</div>

@endsection
@section('css')

@stop