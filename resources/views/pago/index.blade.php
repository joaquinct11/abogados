@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')
<br>
<a href="pagos/create" class="btn btn-success">
    <i class="fas fa-fw fa-donate"></i> AGREGAR PAGO
</a>
<hr>
<table id="pagos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID EXPEDIENTE</th>
            <th scope="col">MONTO TOTAL</th>
            <th scope="col">ADELANTO</th>
            <th scope="col">RESTANTE</th>
            <th scope="col">FECHA ADELANTO</th>
            <th scope="col">DETALLE</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pagos as $pago)
            <tr>
                <td>{{$pago->expediente->id_expediente}}</td>
                <td>{{$pago->monto_total}}</td>
                <td>{{$pago->adeltanto}}</td>
                <td>{{$pago->restante}}</td>
                <td>{{$pago->fecha_adelanto}}</td>
                <td>{{$pago->detalle}}</td>
                <td>
                <form action="{{ route('pagos.destroy', $pago->id_pagos) }}" method="POST" style="display: inline">
                    <a href="/pagos/{{ $pago->id_pagos }}/edit" class="btn btn-info">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#pagos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exporta todas las columnas excepto la última
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ],
            "pageLength": 5,
            language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    }); 

        // Agregar confirmación antes de eliminar la incidencia
        $('#pagos').on('click', '.btn-danger', function (e) {
            e.preventDefault();
            var form = this.form;
            Swal.fire({
                title: '¿Estás seguro de eliminar este usuario?',
                text: "No podrás revertir esto",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        
    });
</script>
@stop