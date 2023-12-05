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
<form action="/judiciales/{{$judicial->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="row">
        <div class="col-md-6">
            <label for="id_usuario" class="form-label">ABOGADO</label>
                <select name="id_usuario" id="id_usuario" class="form-control" tabindex="1">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">NRO EXPEDIENTE</label>
                <input id="cliente" name="cliente" type="text" class="form-control" value="{{$judicial->nro_expediente}}">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">CLIENTE</label>
                <input id="cliente" name="cliente" type="text" class="form-control" value="{{$judicial->cliente}}">
            </div>
        </div>
    </div>

<div class="mb-3">
    <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">AREA</label>
                <input id="id_area" name="id_area" type="text" class="form-control" value="JUDICIALES" readonly>
                <input type="hidden" name="id_area" value="1">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">ACTO</label>
                <select name="acto" id="acto" class="form-control">
                    <option value="MEJOR DERECHO DE PROPIEDAD / POSESION" @if($judicial->acto == 'MEJOR DERECHO DE PROPIEDAD / POSESION') selected @endif>MEJOR DERECHO DE PROPIEDAD / POSESION</option>
                    <option value="INTERDICTOS" @if($judicial->acto == 'INTERDICTOS') selected @endif>INTERDICTOS</option>
                    <option value="DESALOJO" @if($judicial->acto == 'DESALOJO') selected @endif>DESALOJO</option>
                    <option value="ALIMENTOS" @if($judicial->acto == 'ALIMENTOS') selected @endif>ALIMENTOS</option>
                    <option value="SUCESION INTESTADA" @if($judicial->acto == 'SUCESION INTESTADA') selected @endif>SUCESION INTESTADA</option>
                    <option value="OTORGAMIENTO DE ESCRITURA PUBLICA" @if($judicial->acto == 'OTORGAMIENTO DE ESCRITURA PUBLICA') selected @endif>OTORGAMIENTO DE ESCRITURA PUBLICA</option>
                    <option value="DIVORCIO / SEPARACION DE CUERPOS" @if($judicial->acto == 'DIVORCIO / SEPARACION DE CUERPOS') selected @endif>DIVORCIO / SEPARACION DE CUERPOS</option>
                    <option value="OBLIGACION DE DAR SUMA DE DINERO" @if($judicial->acto == 'OBLIGACION DE DAR SUMA DE DINERO') selected @endif>OBLIGACION DE DAR SUMA DE DINERO</option>
                    <option value="NULIDAD DE ACTO JURIDICO" @if($judicial->acto == 'NULIDAD DE ACTO JURIDICO') selected @endif>NULIDAD DE ACTO JURIDICO</option>
                    <option value="REINVINDICACION" @if($judicial->acto == 'REINVINDICACION') selected @endif>REINVINDICACION</option>
                    <option value="RECTIFICACION DE AREA" @if($judicial->acto == 'RECTIFICACION DE AREA') selected @endif>RECTIFICACION DE AREA</option>
                    <option value="INCLUSION DE HEREDERO / PETICION DE HERENCIA" @if($judicial->acto == 'INCLUSION DE HEREDERO / PETICION DE HERENCIA') selected @endif>INCLUSION DE HEREDERO / PETICION DE HERENCIA</option>
                    <option value="OTROS" @if($judicial->acto == 'OTROS') selected @endif>OTROS</option>
                </select>
            </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
            <div class="col-md-6">
            <label for="" class="form-label">OTROS</label>
            <input id="otros" name="otros" type="text" class="form-control" value="{{$judicial->otros}}">
        </div>
</div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">FECHA INGRESO</label>
            <input id="fecha_ingreso" name="fecha_ingreso" type="date" class="form-control" value="{{$judicial->fecha_ingreso}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">FECHA FIN</label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" value="{{$judicial->fecha_fin}}">
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