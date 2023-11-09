@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
    <h1>ESTUDIO ATC</h1>
@stop

@section('content')
<br>
<h1>INDEX PRINCIPAL</h1>
<!-- <a href="incidencias/create" class="btn btn-success">NUEVO INCIDENCIA</a>
<hr>
<table id="incidencias" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE REGISTRO</th>
            <th scope="col">TIPO</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col">SOLUCIÓN</th>
            <th scope="col">FECHA SOLUCIÓN</th>
            <th scope="col">ESTADO</th>
                <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                        <form action="" method="POST">
                            <a href="" class="btn btn-info">Editar</a>
                            <a href="" class="btn btn-secondary">Solucionar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                </td>
            </tr>
    </tbody>
</table> -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop