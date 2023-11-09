@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>NUEVO CLIENTE</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/clientes" method="POST">
    @csrf
    <div class="mb-3">
    <label for="" class="form-label">NOMBRE CLIENTE</label>
    <input id="nombres" name="nombres" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">APELLIDO PATERNO</label>
        <input id="ap_paterno" name="ap_paterno" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">APELLIDO MATERNO</label>
        <input id="ap_materno" name="ap_materno" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DOMICILIO</label>
        <input id="domicilio" name="domicilio" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">TELEFONO</label>
        <input id="telefono" name="telefono" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">EMAIL</label>
        <input id="email" name="email" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
            <label for="" class="form-label">TIPO IDENTIDAD</label>
                <select name="id_identidad" id="id_identidad" class="form-control" tabindex="1">
                    <option value="1">DNI</option>
                    <option value="2">Pasaporte</option>
                </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">IDENTIDAD</label>
        <input id="identidad" name="identidad" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <a href="/clientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
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