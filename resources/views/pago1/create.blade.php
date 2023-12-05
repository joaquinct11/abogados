@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
<h2>NUEVO PAGO</h2>
@stop

@section('content')
<head>
    <!-- Otros enlaces -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<form action="/pagos1" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <!-- Primera columna -->
            <div class="mb-3">
                    <label for="numero_expediente" class="form-label">N° EXPEDIENTE</label>
                    <select id="numero_expediente" name="numero_expediente" class="form-control" tabindex="1">
                        @foreach($codigosJudiciales as $id => $codigo)
                            <option value="{{ $codigo }}">{{ $codigo }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">FECHA INGRESO MONTO</label>
                <input id="fecha_monto_total" name="fecha_monto_total" type="date" class="form-control" tabindex="1">
            </div>
        </div>
        <div class="col-md-6">
        <div class="mb-3">
                <label for="" class="form-label">MONTO TOTAL</label>
                <input id="monto_total" name="monto_total" type="text" class="form-control" tabindex="1">
            </div>
            <!-- Agrega más campos aquí si es necesario -->
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