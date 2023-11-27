@extends('adminlte::page')

@section('plugins.Datatables', true)
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                    <label for="" class="form-label">Actividad o Cuota Social</label>
                    <select name="detalles[0][id_act]" class="form-select actividad-producto-select" style="width: 50%;">
                        <option value=" ">--Ninguna--</option>
                        @foreach ($actividad as $act)
                            <option value="act_{{ $act->id_act }}" data-precio="{{ $act->precio_act }}">
                                {{ $act->nombre_act .' |'.$act->precio_act}}
                            </option>
                        @endforeach
                        @foreach ($tipodetfact as $tdf)
                            <option value="tdf_{{ $tdf->id_tipodetallefactura }}" data-precio="{{ $tdf->precio_tdf }}">
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
        <a href="/panel/facturas" class="btn btn-outline-dark rounded-circle mx-2" style="width:2.5em; height:2.5em;" title="Volver a facturas">
            <span class="material-symbols-outlined d-flex justify-content-center">
                article
                </span>
        </a>
        
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
                    <td>{{ $detf->tipodetfact ? $detf->tipodetfact->tipodetalle : '-no asignado-' }}</td>
                    <td>{{ $detf->actividad ? $detf->actividad->precio_act : '-no asignado-' }}</td>
                    @else 
                    <td>{{ $detf ->id_detallefactura }}</td>
                    <td>{{ '-no asignado-' }}</td>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function () {
    var numDetalles = 1;

    function inicializarSelect2() {
        $(".actividad-producto-select").select2();
    }

    inicializarSelect2();

    $(".actividad-producto-select").change(function () {
        actualizarPrecio($(this));
    });

    $("#detalles-container").on("change", ".actividad-producto-select", function () {
        actualizarPrecio($(this));
    });

    function actualizarPrecio(elemento) {
        var precioSeleccionado = elemento.find(':selected').data('precio');
        var detalle = elemento.closest(".detalle");
        var precioInput = detalle.find("[name$='[precio]']");

        if (precioInput.length === 0) {
            precioInput = detalle.find("[name$='[precio_act]']");
        }

        precioInput.val(precioSeleccionado);
    }

    $("#eliminar-ultimo-duplicado").on("click", function () {
        if (numDetalles > 1) {
            var ultimoDetalle = $("#detalles-container .detalle:last");
            ultimoDetalle.find(".actividad-producto-select").select2("destroy");
            ultimoDetalle.remove();
            numDetalles--;

            // Reinicializar Select2 después de eliminar un detalle
            inicializarSelect2();
        }
    });

    $("#agregar-detalle").on("click", function () {
    // Validar si ya existe un detalle con el mismo índice
    if ($("#detalles-container .detalle[data-indice='" + numDetalles + "']").length === 0) {
        var nuevoDetalle = $("#detalles-container .detalle:first").clone();
        nuevoDetalle.attr("data-indice", numDetalles);

        nuevoDetalle.find("select, input").each(function () {
            var originalName = $(this).attr("name");
            var newName = originalName.replace(/\[\d+\]/g, '[' + numDetalles + ']');
            $(this).attr("name", newName);
            $(this).val('');
        });

        // Eliminar clases y estilos que puedan interferir con Select2
        nuevoDetalle.find(".select2, .select2-container, .select2-selection").remove();

        nuevoDetalle.find(".actividad-producto-select").select2();
        $("#detalles-container").append(nuevoDetalle);
        numDetalles++;

        // Reinicializar Select2 después de agregar un detalle
        inicializarSelect2();
    }
    });
});
    </script>
@endpush
