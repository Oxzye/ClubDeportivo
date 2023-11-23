@extends('adminlte::page')


@section('title', 'Cobro de cuotas sociales')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <h3>Cobrar cuota del socio: {{ $socio->name . ' ' . $socio->apellido }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('insc_act_part.store') }}" method="post">
                    @csrf
                    <label for="exampleFormControlSelect1">Id de socio</label>
                    <input type="number" name="id_soc" id="id_soc" value="{{ $socio->socio->id_soc }}" readonly>
                    <label for="exampleFormControlSelect1">Id de Caja</label>
                    <input type="number" name="id_caja" id="id_caja" value="{{ $cajasAbierta->id_caja }}" readonly>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Actividad a cobrar</label>
                        <select id="id_act" name="id_act" class="form-control">
                            <option value="" selected>Seleccione una...</option>
                            @foreach ($actividadesNoPagadas as $act)
                                <option value="{{ $act->id_act }}" class="">
                                    {{ $act->nombre_act .' '}}{{ $act->descripcion_act }} (Precio Act: ${{ $act->precio_act }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Metodo de pago</label>
                        <select id="id_fdp" name="id_fdp" class="form-control">
                            <option value="" selected>Seleccione uno...</option>
                            @foreach ($formdp as $fdp)
                                <option value="{{ $fdp->id_fdp }}">
                                    {{ $fdp->forma_pago_fdp }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de factura</label>
                        <select id="tipo_fac" name="tipo_fac" class="form-control">
                            <option value="" selected>Seleccione uno...</option>
                            @foreach ($tipofac as $tfac)
                                <option value="{{ $tfac->id_tipo_fac }}">
                                    {{ $tfac->tipo_fac }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadoFactura">Al guardar, la factura pasará al estado de</label>
                        <div class="input-group">
                            <input type="number" name="pagada_fac" id="pagada_fac" value="1" hidden>
                            <span class="form-control">Pagada</span>
                        </div>
                    </div>
                    <div class="form-group monto-final">
                        <label for="montoFinal">Importe Final:</label>
                        <input type="number" id="montoFinal" name="montoFinal" class="form-control" readonly
                            step="0.01">
                    </div>
                    <input type="submit" value="Guardar pago" class="btn btn-success">
                    <a href="{{ route('insc_act_part.index') }}" class="btn btn-danger">Cancelar</a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el cambio en la selección de la cuota
            $('#id_act').change(function() {
                // Obtener el precio de la cuota seleccionada
                var precioAct = parseFloat($(this).find(':selected').text().match(
                    /Precio Act: \$([\d.]+)/)[1]);

                // Establecer el valor del input "montoFinal" como número
                $('#montoFinal').val(precioAct.toFixed(2));
            });
        });
    </script>

@endsection
