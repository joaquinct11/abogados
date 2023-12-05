@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>NUEVO CASO</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/juridicas_naturales" method="POST">
    @csrf
    <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="id_usuario" class="form-label">ABOGADO</label>
            <select name="id_usuario" id="id_usuario" class="form-control" tabindex="1">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">AREA</label>
            <input id="id_area" name="id_area" type="text" class="form-control" value="JURIDICAS NATURALES" readonly tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">OTROS</label>
            <input id="otros" name="otros" type="text" class="form-control" tabindex="1">
        </div>
        <!-- Agrega más campos según sea necesario -->
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">CLIENTE</label>
            <input id="cliente" name="cliente" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
                <label for="" class="form-label">ACTO</label>
                <select name="acto" id="acto" class="form-control" tabindex="1">
                    <option value="COMPRA VENTA">COMPRA VENTA</option>
                    <option value="DONACION">DONACION</option>
                    <option value="ADJUDICACION">ADJUDICACION</option>
                    <option value="PRESCRIPCION ADQUISITIVA">PRESCRIPCION ADQUISITIVA</option>
                    <option value="SUBDIVISION E INDEPENDIZACION">SUBDIVISION E INDEPENDIZACION</option>
                    <option value="INMATRICULACION">INMATRICULACION</option>
                    <option value="DECLARATORIA DE FABRICA">DECLARATORIA DE FABRICA</option>
                    <option value="RECTIFICACION DE ASIENTOS REGISTRAL">RECTIFICACION DE ASIENTOS REGISTRAL</option>
                    <option value="RECTIFICACION DE AREA">RECTIFICACION DE AREA</option>
                    <option value="HABILITACION URBANA">HABILITACION URBANA</option>
                    <option value="OTROS">OTROS</option>
                </select>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">FECHA INGRESO</label>
                <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" tabindex="1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">FECHA FIN</label>
                <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" tabindex="1">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <a href="/juridicas_naturales" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
    @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ Session::get('error') }}',
        });
    @endif
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        // Cuando los campos de monto total o adelanto cambian, actualiza el campo restante
        $('#monto_total, #adelanto').on('input', function () {
            calcularRestante();
        });

        // Función para calcular y actualizar el campo restante
        function calcularRestante() {
            var montoTotal = parseFloat($('#monto_total').val()) || 0;
            var adelanto = parseFloat($('#adelanto').val()) || 0;

            // Calcula el restante
            var restante = montoTotal - adelanto;

            // Actualiza el valor del campo restante
            $('#restante').val(restante.toFixed(2));
        }
    });
</script>
<script>
    $(document).ready(function () {
        // Inicialmente, bloquea el campo 'otros'
        $('#otros').prop('disabled', true);

        // Cuando cambia el valor de 'acto'
        $('#acto').on('change', function () {
            // Habilita/deshabilita el campo 'otros' según el valor seleccionado en 'acto'
            if ($(this).val() === 'OTROS') {
                $('#otros').prop('disabled', false);
            } else {
                $('#otros').prop('disabled', true).val('');
            }
        });
    });
</script>

@stop