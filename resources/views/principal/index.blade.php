@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')
<br>
<div class="container-fluid">
    <h4>Menú Principal</h4><br>
    <div class="row">
        <!-- Contenedor de usuarios (color verde)-->
        <div class="col-lg-3 col-6" id="usuarios-box">
            <div class="small-box bg-success" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Total de usuarios</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i> <!--Icono de usuario-->
                </div>
                <a href="usuarios" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Contenedor de enfermeros (color lúcuma)-->
        <div class="col-lg-3 col-6" id="enfermeros-box">
            <div class="small-box bg-warning" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Propiedades</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-building"></i> <!--Icono de enfermero-->
                </div>
                <a href="propiedades" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Contenedor de administradores (color rojo)-->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Jurídicas</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file-invoice"></i> <!--Icono de usuario admin-->
                </div>
                <a href="" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Judiciales/Naturales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file"></i> <!--Icono de usuario admin-->
                </div>
                <a href="" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop