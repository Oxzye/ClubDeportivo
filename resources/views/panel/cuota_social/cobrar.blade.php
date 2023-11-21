@extends('adminlte::page')


@section('title', 'Cobro de cuotas sociales')

@section('content')
    <div class="container-fluid">
        <div class="col-12">
            <h3>Cobrar cuota/s del socio: {{ $socio->name . ' ' . $socio->apellido }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    @csrf
                    <input type="number" name="id_caja" value="{{ $cajasAbierta->id_caja }}" readonly>

                    @foreach ($allCuotas as $cuota)
                        <div class="col-lg-12">
                            <div class="input-group mb-1 border border-info">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input type="checkbox">
                                    </span>
                                </div>
                                <input type="number" name="id_tipodetallefactura"
                                    value="{{ $cuota->id_tipodetallefactura }}" hidden>
                                <div class="col-lg-4 form-control text-bold border border-0">
                                    {{ $cuota->descripcion_tdf }}
                                </div>
                                <div class="col-lg-4 form-control text-bold border border-0">
                                    {{ $cuota->tipodetalle }}
                                </div>
                                <div class="col-lg-4 form-control text-bold border border-0 ">
                                      Precio: $ <span class="precio">{{$cuota->precio_tdf }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="col-lg-12">
                            <div class="input-group mb-1">
                                <div class="col-lg-4 text-bold border border-0">
                                    <input type="reset" value="Desmarcar todo" class="btn btn-warning">
                                    <input type="submit" value="Cobrar Cuota/s" class="btn btn-success">
                                    <a href="" class="btn btn-danger">Cancelar</a>
                                </div>
                                <div class="col-lg-4 form-control text-bold ">
                                    <div id="cantidadSeleccionada" ></div>
                                </div>
                                <div class="col-lg-4 form-control text-bold  ">
                                      <div id="total"></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-12">
                        
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').change(function () {
                calcularTotal();
            });

            function calcularTotal() {
                var total = 0;
                var cantidadSeleccionada = 0;

                $('input[type="checkbox"]:checked').each(function () {
                    var precio = parseFloat($(this).closest('.input-group').find('.precio').text().replace('$', '').trim());
                    total += precio;
                    cantidadSeleccionada++;
                });

                $('#total').text('Total: $' + total.toFixed(2));
                $('#cantidadSeleccionada').text('Cantidad seleccionada: ' + cantidadSeleccionada);
            }
        });
    </script>
@endsection


