@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>EDITAR CLIENTE</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/clientes/{{$cliente->id_cliente}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">NOMBRES</label>
        <input id="nombres" name="nombres" type="text" class="form-control" value="{{$cliente->nombres}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">APELLIDO PATERNO</label>
        <input id="ap_paterno" name="ap_paterno" type="text" class="form-control" value="{{$cliente->ap_paterno}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">APELLIDO MATERNO</label>
        <input id="ap_materno" name="ap_materno" type="text" class="form-control" value="{{$cliente->ap_materno}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DOMICILIO</label>
        <input id="domicilio" name="domicilio" type="text" class="form-control" value="{{$cliente->domicilio}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">TELEFONO</label>
        <input id="telefono" name="telefono" type="text" class="form-control" value="{{$cliente->telefono}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">EMAIL</label>
        <input id="email" name="email" type="text" class="form-control" value="{{$cliente->email}}" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">TIPO IDENTIDAD</label>
        <select id="id_identidad" name="id_identidad" type="text" class="form-control" value="{{$cliente->id_identidad}}" >
        <option value="1" @if($cliente->id_identidad == 'DNI') selected @endif>DNI</option>
        <option value="2" @if($cliente->id_identidad == 'Pasaporte') selected @endif>Pasaporte</option>
    </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">IDENTIDAD</label>
        <input id="identidad" name="identidad" type="text" class="form-control" value="{{$cliente->identidad}}" >
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