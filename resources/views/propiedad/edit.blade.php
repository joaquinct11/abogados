@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>EDITAR CASO</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/propiedades/{{$propiedad->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">ABOGADO</label>
                <select id="id_usuario" name="id_usuario" class="form-control">
                    <option value="1" @if($propiedad->id == 'JOAQUIN') selected @endif>JOAQUIN</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">CLIENTE</label>
                <input id="cliente" name="cliente" type="text" class="form-control" value="{{$propiedad->cliente}}">
            </div>
        </div>
    </div>

<div class="mb-3">
    <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">AREA</label>
                <input id="id_area" name="id_area" type="text" class="form-control" value="PROPIEDADES" readonly>
                <input type="hidden" name="id_area" value="1">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">ACTO</label>
                <select name="acto" id="acto" class="form-control">
                    <option value="COMPRA VENTA" @if($propiedad->acto == 'COMPRA VENTA') selected @endif>COMPRA VENTA</option>
                    <option value="DONACION" @if($propiedad->acto == 'DONACION') selected @endif>DONACION</option>
                    <option value="ADJUDICACION" @if($propiedad->acto == 'ADJUDICACION') selected @endif>ADJUDICACION</option>
                    <option value="PRESCRIPCION ADQUISITIVA" @if($propiedad->acto == 'PRESCRIPCION ADQUISITIVA') selected @endif>PRESCRIPCION ADQUISITIVA</option>
                    <option value="SUBDIVISION E INDEPENDIZACION" @if($propiedad->acto == 'SUBDIVISION E INDEPENDIZACION') selected @endif>SUBDIVISION E INDEPENDIZACION</option>
                    <option value="INMATRICULACION" @if($propiedad->acto == 'INMATRICULACION') selected @endif>INMATRICULACION</option>
                    <option value="DECLARATORIA DE FABRICA" @if($propiedad->acto == 'DECLARATORIA DE FABRICA') selected @endif>DECLARATORIA DE FABRICA</option>
                    <option value="RECTIFICACION DE ASIENTOS REGISTRAL" @if($propiedad->acto == 'RECTIFICACION DE ASIENTOS REGISTRAL') selected @endif>RECTIFICACION DE ASIENTOS REGISTRAL</option>
                    <option value="RECTIFICACION DE AREA" @if($propiedad->acto == 'RECTIFICACION DE AREA') selected @endif>RECTIFICACION DE AREA</option>
                    <option value="HABILITACION URBANA" @if($propiedad->acto == 'HABILITACION URBANA') selected @endif>HABILITACION URBANA</option>
                    <option value="OTROS" @if($propiedad->acto == 'OTROS') selected @endif>OTROS</option>
                </select>
            </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
            <div class="col-md-6">
            <label for="" class="form-label">OTROS</label>
            <input id="otros" name="otros" type="text" class="form-control" value="{{$propiedad->otros}}">
        </div>
</div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">FECHA INGRESO</label>
            <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" value="{{$propiedad->fecha_ingreso}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">FECHA FIN</label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" value="{{$propiedad->fecha_fin}}">
        </div>
    </div>
</div>

    <div class="mb-3">
        <a href="/propiedades" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencias a los elementos del DOM
        var actoSelect = document.getElementById('acto');
        var otrosInput = document.getElementById('otros');

        // Agregar evento onchange al campo "ACTO"
        actoSelect.addEventListener('change', function() {
            // Habilitar o deshabilitar el campo "Otros" según la selección
            if (actoSelect.value === 'OTROS') {
                otrosInput.removeAttribute('readonly');
            } else {
                otrosInput.setAttribute('readonly', 'readonly');
            }
        });

        // Llamar al evento onchange inicialmente para establecer el estado inicial
        actoSelect.dispatchEvent(new Event('change'));
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencias a los elementos del DOM
        var montoTotalInput = document.getElementById('monto_total');
        var adelantoInput = document.getElementById('adelanto');
        var restanteInput = document.getElementById('restante');

        // Función para calcular el RESTANTE
        function calcularRestante() {
            var montoTotal = parseFloat(montoTotalInput.value) || 0;
            var adelanto = parseFloat(adelantoInput.value) || 0;

            // Calcular el RESTANTE
            var restante = montoTotal - adelanto;

            // Actualizar el valor del campo "RESTANTE"
            restanteInput.value = restante.toFixed(2);
        }

        // Agregar eventos onchange a los campos "MONTO TOTAL" y "ADELANTO"
        montoTotalInput.addEventListener('input', calcularRestante);
        adelantoInput.addEventListener('input', calcularRestante);

        // Llamar a la función inicialmente para establecer el estado inicial
        calcularRestante();
    });
</script>
@stop