@extends('adminlte::page')

@section('plugins.Datatables', true)

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
                                        Item: {{ $detalle->tipodetfact->tipodetalle }}
                                        <ul>
                                            <li>Precio: {{ $detalle->tipodetfact->precio_tdf }}</li>
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