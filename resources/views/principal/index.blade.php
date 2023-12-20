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
        @can('Admin')
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
        @endcan
        <!-- Contenedor de enfermeros (color lúcuma)-->
        @can('Admin')
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
        @endcan

        @can('Propiedades')
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
        @endcan

        @can('Secretaria')
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
        @endcan

        <!-- Contenedor de administradores (color rojo)-->
        @can('Admin')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Judiciales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file-invoice"></i> <!--Icono de usuario admin-->
                </div>
                <a href="judiciales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
        @can('Judiciales')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Judiciales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file-invoice"></i> <!--Icono de usuario admin-->
                </div>
                <a href="judiciales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
        @can('Secretaria')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Judiciales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file-invoice"></i> <!--Icono de usuario admin-->
                </div>
                <a href="judiciales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
        <!-- Contenedor de administradores (color celeste)-->
        @can('Admin')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Jurídicas/Naturales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file"></i> <!--Icono de usuario admin-->
                </div>
                <a href="juridicas_naturales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
        @can('Juridicas')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Jurídicas/Naturales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file"></i> <!--Icono de usuario admin-->
                </div>
                <a href="juridicas_naturales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
        @can('Secretaria')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="height: 220px;">
                <div class="inner">
                    <h2 style="margin-top: 50px; font-size: 40px; font-weight: bold;">
                    </h2>
                    <h5>Jurídicas/Naturales</h5>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-file"></i> <!--Icono de usuario admin-->
                </div>
                <a href="juridicas_naturales" class="small-box-footer">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop