@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>EDITAR PAGO</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/pagos1/{{$pago1->id_pagos}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">N° EXPEDIENTE</label>
            <input id="numero_expediente" name="numero_expediente" type="text" class="form-control" value="{{$pago1->numero_expediente}} " readonly>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">MONTO TOTAL</label>
            <input id="monto_total" name="monto_total" type="text" class="form-control" value="{{$pago1->monto_total}}">
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">FECHA INGRESO MONTO</label>
            <input id="fecha_monto_total" name="fecha_monto_total" type="date" class="form-control" value="{{$pago1->fecha_monto_total}}">
        </div>
    </div>
</div>

    <div class="mb-3">
        <a href="/pagos1" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
@stop