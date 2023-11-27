@extends('adminlte::page')


@section('title', 'Cajas Index')

@section('content')
<div class="container">
    <!--<div id="caja-indicator" class="alert alert-success" style="display: none;">
        La caja ha sido abierta.
      </div>-->
      
    <h1>Apertura y Cierre de Caja</h1>
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($cajaAbierta->isEmpty())
        <!-- No se han creado cajas, muestra el botón "Abrir caja" -->
        <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj">Abrir caja</a>
        <button id="cierrecj" class="btn btn-danger" style="display: none;">Cierre de caja</button>
        @else
        <!-- Se han creado cajas, oculta el botón "Abrir caja" -->
        <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj" style="display: none;">Abrir caja</a>
        <button id="cierrecj" class="btn btn-danger">Cierre de caja</button>
    @endif  
         <!-- <a href="{{ route('Cajas.create') }}" class="btn btn-primary" id="abrircj">Abrir caja</a>
            <button id="cierrecj" class="btn btn-danger">Cierre de caja</button>-->
            <div class="cierre_cajas" id="cierre_cajas" style="display: none">
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title" >Cierre de Caja</h3>
                        </div>
                        <div class="box-body">
                            @foreach ($cajas as $caja)
                            @if (is_object($caja))
                                @if ($caja->estado_caja)
                            <form method="POST" action="{{ route('Cajas.update', $caja->id_caja) }}">
                                @csrf
                                @method('PATCH')
                                <input type="text" class="" name="monto_inicial_caja" id="" aria-describedby="helpId" value="{{ $caja->monto_inicial_caja }}" hidden>
                                
                                <div class="form-group">
                                    <label for="Monto_final" >Monto final:</label>
                                    <input type="number" name="monto_final" id="" class="form-control" value="{{ $caja->monto_final }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total_ventas_caja">Total de ventas:</label>
                                    <input type="number" name="total_ventas_caja" id="" class="form-control" value="{{ $caja->total_ventas_caja }}" readonly>
                                </div>
                                <input type="text" name="estado_caja" id="" class="form-control" placeholder="" aria-describedby="helpId" value="0" hidden>
                                <input type="text" class="" name="saldo_caja" id="" aria-describedby="helpId" value="{{ $caja->saldo_caja }}" hidden>
                                <input type="text" class="" name="id_emp" id="" aria-describedby="helpId" value="{{ $caja->id_emp }}" hidden>
                        
                                <button type="submit" class="btn btn-danger">Cerrar Caja</button>
                            </form>
                                @endif
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <form action="{{ route('Cajas.index') }}" method="get" id="form-salida-tactica">
                @csrf
                <label for="mes">Seleccionar Mes:</label>
                <select name="mes" id="mes">
                    <!-- Puedes cargar las opciones con fechas actuales o de alguna otra manera -->
                    <!-- Aquí asumo un rango de 1 a 12 para representar los meses -->
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">
                            {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                        </option>
                    @endfor
                </select>
                <button type="submit">Ver Monto Mensual</button>
            </form>
            
            <div class="modal fade" id="modal-salida-tactica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            @if (isset($mes))
                                <h5 class="modal-title" id="exampleModalLabel">Monto del Mes: {{ \Carbon\Carbon::create()->month($mes)->formatLocalized('%B') }}</h5>
                            @else
                                <h5 class="modal-title" id="exampleModalLabel">Recaudacion</h5>
                            @endif
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del modal -->
                            @if (isset($mes) && isset($montoFinal) && isset($transacciones))
                                <p>Monto Final del Mes: {{ $montoFinal }}</p>
                        
                                <h3>Detalles de Ventas</h3>
                                <ul>
                                    @foreach($transacciones as $transaccion)
                                        <li>{{ $transaccion->empleados->user->name }} - {{ $transaccion->monto_final }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">


    document.getElementById('cierrecj').addEventListener('click', function() {
        var div = document.getElementById('cierre_cajas');

        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
            
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Esta función se ejecutará después de que la página se haya cargado completamente

        // Obtener el valor del mes almacenado en una variable PHP
        var mesSeleccionado = {{ isset($mes) ? $mes : $mesActual }};

        // Mostrar el modal con la información correspondiente
        mostrarSalidaTactica(mesSeleccionado);
    });

    // Función para mostrar el modal
    function mostrarSalidaTactica(mes) {
        // Abre el modal
        $('#modal-salida-tactica').modal('show');
        
        // Puedes hacer otras cosas con el valor del mes si es necesario
        console.log('Mes seleccionado:', mes);
    }
    
</script>

@endsection