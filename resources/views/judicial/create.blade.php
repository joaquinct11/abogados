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
<form action="/judiciales" method="POST">
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
            <input id="id_area" name="id_area" type="text" class="form-control" value="JUDICIALES" readonly tabindex="1">
        </div>
        <div class="mb-3">
                <label for="" class="form-label">ACTO</label>
                <select name="acto" id="acto" class="form-control" tabindex="1">
                    <option value="PRESCRIPCION ADQUISITIVA">PRESCRIPCION ADQUISITIVA</option>
                    <option value="INTERDICTOS">INTERDICTOS</option>
                    <option value="DESALOJO">DESALOJO</option>
                    <option value="ALIMENTOS">ALIMENTOS</option>
                    <option value="SUCESION INTESTADA">SUCESION INTESTADA</option>
                    <option value="OTORGAMIENTO DE ESCRITURA PUBLICA">OTORGAMIENTO DE ESCRITURA PUBLICA</option>
                    <option value="DIVORCIO / SEPARACION DE CUERPOS">DIVORCIO / SEPARACION DE CUERPOS</option>
                    <option value="OBLIGACION DE DAR SUMA DE DINERO">OBLIGACION DE DAR SUMA DE DINERO</option>
                    <option value="NULIDAD DE ACTO JURIDICO">NULIDAD DE ACTO JURIDICO</option>
                    <option value="REINVINDICACION">REINVINDICACION</option>
                    <option value="RECTIFICACION DE AREA">RECTIFICACION DE AREA</option>
                    <option value="INCLUSION DE HEREDERO / PETICION DE HERENCIA">INCLUSION DE HEREDERO / PETICION DE HERENCIA</option>
                    <option value="OTROS">OTROS</option>
                </select>
        </div>
        
        <!-- Agrega más campos según sea necesario -->
    </div>
    <div class="col-md-6">
    <div class="mb-3">
            <label for="" class="form-label">NRO EXPEDIENTE</label>
            <input id="nro_expediente" name="nro_expediente" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">CLIENTE</label>
            <input id="cliente" name="cliente" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">OTROS</label>
            <input id="otros" name="otros" type="text" class="form-control" tabindex="1">
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
        <a href="/judiciales" class="btn btn-secondary" tabindex="5">Cancelar</a>
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