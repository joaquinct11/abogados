@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>EDITAR USUARIO</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/usuarios/{{$usuario->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">NOMBRES</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$usuario->name}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">APELLIDO PATERNO</label>
            <input id="ap_paterno" name="ap_paterno" type="text" class="form-control" value="{{$usuario->ap_paterno}}">
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">APELLIDO MATERNO</label>
            <input id="ap_materno" name="ap_materno" type="text" class="form-control" value="{{$usuario->ap_materno}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">ROL</label>
            <select id="tipo" name="tipo" class="form-control">
                <option value="Admin" @if($usuario->tipo == 'Admin') selected @endif>Admin</option>
                <option value="Secretaria" @if($usuario->tipo == 'Secretaria') selected @endif>Secretaria</option>
                <option value="Asistente_Secretaria" @if($usuario->tipo == 'Asistente_Secretaria') selected @endif>Asistente Secretaria</option>
                <option value="Propiedades" @if($usuario->tipo == 'Propiedades') selected @endif>Propiedades</option>
                <option value="Juridicas" @if($usuario->tipo == 'Juridicas') selected @endif>Juridicas</option>
                <option value="Judiciales" @if($usuario->tipo == 'Judiciales') selected @endif>Judiciales</option>
            </select>
        </div>
    </div>
</div>

<!-- Repite el patrón para los siguientes campos -->

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">DOMICILIO</label>
            <input id="domicilio" name="domicilio" type="text" class="form-control" value="{{$usuario->domicilio}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">TELEFONO</label>
            <input id="telefono" name="telefono" type="text" class="form-control" value="{{$usuario->telefono}}">
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">EMAIL</label>
            <input id="email" name="email" type="text" class="form-control" value="{{$usuario->email}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">TIPO IDENTIDAD</label>
            <select id="id_identidad" name="id_identidad" class="form-control">
                <option value="1" @if($usuario->id_identidad == 'DNI') selected @endif>DNI</option>
                <option value="2" @if($usuario->id_identidad == 'Pasaporte') selected @endif>Pasaporte</option>
            </select>
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">IDENTIDAD</label>
            <input id="identidad" name="identidad" type="text" class="form-control" value="{{$usuario->identidad}}">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">CONTRASEÑA</label>
            <input id="password" name="password" type="password" class="form-control" tabindex="1">
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">CONFIRMAR CONTRASEÑA</label>
            <input id="password1" name="password1" type="password" class="form-control" tabindex="1">
        </div>
    </div>
</div>

    <div class="mb-3">
        <a href="/usuarios" class="btn btn-secondary" tabindex="5">Cancelar</a>
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