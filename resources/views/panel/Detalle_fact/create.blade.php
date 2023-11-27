@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Crear facturas')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="container-fluid">
        <h2>Detalle de factura</h2>
        <form action="{{ route('Detalle_fact.store') }}" method="post" id="form-detalle">
            @csrf
            <div id="detalles-container">
                <div class="detalle mb-3">
                    <label for="" class="form-label">* Actividades</label>
                    <select name="detalles[0][id_act]" class="form-select actividad-select">
                        <option value=" ">--Ninguna--</option>
                        @foreach ($actividad as $act)
                            <option value="{{ $act->id_act }}">
                                {{ $act->nombre_act }}
                            </option>
                        @endforeach
                    </select>

                    <label for="" class="form-label">* Producto</label>
                    <select name="detalles[0][id_tipodetfact]" class="select-tdf producto-select">
                        <option value="0">-nada-</option>
                        @foreach ($tipodetfact as $tdf)
                            <option value="{{ $tdf->id_tipodetallefactura }}" data-precio="{{ $tdf->precio_tdf }}">
                                {{ $tdf->tipodetalle .' |'.$tdf->descripcion_tdf.'| $'.$tdf->precio_tdf }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="detalles[0][precio]" value='0' readonly>
                </div>
            </div>

            <button type="button" class="btn btn-primary" id="agregar-detalle">Agregar Detalle</button>
            <button type="button" class="btn btn-danger" id="eliminar-ultimo-duplicado">Eliminar Último Duplicado</button>
            <button type="submit" class="btn btn-success text-uppercase">Guardar Detalles</button>

            <!-- Nuevo botón para redireccionar -->
          
            
        <a href="{{ route('Detalle_fact.fin_factura',  $facturacion) }}" class="btn btn-primary">Ver Factura</a>
        
        </form>
        
    </div>

    <!-- ... Código existente ... -->
 <br><br>
    <div class="table-responsive">
        @if(count($detallesf) > 0)
        <h2>Detalles de la Factura</h2>
        <table class="table table-primary" id="detalles-factura-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Actividad</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Eliminar</th>
                    <!-- Agrega más columnas según tus detalles de factura -->
                </tr>
            </thead>
            <tbody>
                @foreach($detallesf as $detf)
                <tr>
                    @if ($detf->id_act != null)
                    <td>{{ $detf ->id_detallefactura }}</td>
                    <td>{{ $detf->actividad ? $detf->actividad->nombre_act : '-no asignado-'  }}</td>
                    <td>{{ $detf->tipodetfact->tipodetalle }}</td>
                    <td>{{ $detf->tipodetfact->precio_tdf }}</td>
                    @else 
                    <td>{{ $detf ->id_detallefactura }}</td>
                    <td>{{ '-sin asignar-' }}</td>
                    <td>{{ $detf->tipodetfact->tipodetalle }}</td>
                    <td>{{ $detf->tipodetfact->precio_tdf }}</td>
                    @endif
                    <td>
                        <form action="{{ route('Detalle_fact.destroy', $detf->id_detallefactura) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                        Eliminar
                                    </button>
                                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No hay detalles de factura cargados aun.</p>
    @endif
    </div>

    
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script><script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var numDetalles = 1;

            $(".actividad-select").change(function () {
                actualizarPrecio($(this));
            });

            $("#detalles-container").on("change", ".select-tdf", function () {
                actualizarPrecio($(this));
            });

            function actualizarPrecio(elemento) {
                var precioSeleccionado = elemento.find(':selected').data('precio');
                elemento.closest(".detalle").find("[name$='[precio]']").val(precioSeleccionado);
            }

            $("#eliminar-ultimo-duplicado").on("click", function () {
                if (numDetalles > 1) {
                    $("#detalles-container .detalle:last").remove();
                    numDetalles--;
                }
            });

            $("#agregar-detalle").on("click", function () {
                var nuevoDetalle = $("#detalles-container .detalle:first").clone();
                nuevoDetalle.find("select, input").each(function () {
                    var originalName = $(this).attr("name");
                    var newName = originalName.replace(/\[\d+\]/g, '[' + numDetalles + ']');
                    $(this).attr("name", newName);
                    $(this).val('');
                });

                $("#detalles-container").append(nuevoDetalle);
                numDetalles++;
            });

            
            // Cargar detalles de la factura al cargar la página
            
        });
            
    </script>
@endpush
