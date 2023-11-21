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
        <div class="detalles-container">
            <div class="detalle mb-3">
                <form action="{{ route('Detalle_fact.store') }}" method="post" id="form-detalle">
                    @csrf
                    <label for="" class="form-label">* Actividades</label>
                    <select name="id_act[]" class="form-select actividad-select">
                        <option value=" ">--Ninguna--</option>
                        @foreach ($actividad as $act)
                            <option value="{{ $act->id_act }}">
                                {{ $act->nombre_act }}
                            </option>
                        @endforeach
                    </select>

                    <label for="" class="form-label">* Producto</label>
                    <select name="id_tipodetfact[]" class="select-tdf producto-select">
                        <option value="0">-nada-</option>
                        @foreach ($tipodetfact as $tdf)
                            <option value="{{ $tdf->id_tipodetallefactura }}" data-precio="{{ $tdf->precio_tdf }}">
                                {{ $tdf->tipodetalle }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="detalles[0][precio]" value='0' readonly>

                    <button type="button" class="btn btn-primary agregar-detalle">Agregar Detalle</button>
                    <button type="submit" class="btn btn-success text-uppercase">Guardar Detalles</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
      $(document).ready(function () {
    $(".detalles-container").on("change", ".select-tdf", function () {
        var precioSeleccionado = $(this).find(':selected').data('precio');
        $(this).closest(".detalle").find("[name$='[precio]']").val(precioSeleccionado);
    });
    $('.clonar').click(function() {
  // Clona el .input-group
  var $clone = $('#formulario .input-group').last().clone();

  // Borra los valores de los inputs clonados
  $clone.find(':input').each(function () {
    if ($(this).is('select')) {
      this.selectedIndex = 0;
    } else {
      this.value = '';
    }
  });

  // Agrega lo clonado al final del #formulario
  $clone.appendTo('#formulario');
});
    $("#form-detalle").on("click", ".agregar-detalle", function () {
        var nuevoDetalle = $(".detalle:first").clone();
        var numDetalles = $(".detalle").length;

        nuevoDetalle.find("select, input").each(function () {
            var originalName = $(this).attr("name");
            if (originalName) {
                // Modificar solo el índice numérico al final del nombre del campo
                var newName = originalName.replace(/\[\d+\]/g, '[' + numDetalles + ']');
                $(this).attr("name", newName);
            }
        });

        $(".detalles-container").append(nuevoDetalle);
    });
});

    </script>
@endpush




