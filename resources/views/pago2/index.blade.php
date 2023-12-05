@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')
<br>
<a href="pagos2/create" class="btn btn-success">
    <i class="fas fa-fw fa-donate"></i> AGREGAR PAGO
</a>
<hr>
<table id="pagos2" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID EXPEDIENTE</th>
            <th scope="col">MONTO TOTAL</th>
            <th scope="col">FECHA MONTO</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pagos2 as $pago2)
            <tr>
                <td>{{$pago2->juridica_natural->numero_expediente}}</td>
                <td>{{$pago2->monto_total}}</td>
                <td>{{$pago2->fecha_monto_total}}</td>
                <td>
                    <!-- Botón adicional para abrir el modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detalleModal{{$pago2->id_pagos2}}">
                    <i class="fas fa-plus"></i>
                </button>
                <form action="{{ route('pagos2.destroy', $pago2->id_pagos2) }}" method="POST" style="display: inline">
                    <a href="/pagos2/{{ $pago2->id_pagos2 }}/edit" class="btn btn-info">
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
<!-- Modal -->
@foreach ($pagos2 as $pago2)
    <div class="modal fade" id="detalleModal{{$pago2->id_pagos2}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <p>ID del Expediente: {{$pago2->juridica_natural->numero_expediente}} </p>
                    <p>Monto Total: {{$pago2->monto_total}}</p>
                    <p>Monto Restante:Monto Restante: {{$pago2->monto_total - $pago2->detallesPagos2->sum('adelanto')}} </p>

                    <!-- Tabla para detalles adicionales -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Adelanto</th>
                                <th>Fecha de Adelanto</th>
                                <th>Detalle</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($pago2->detallesPagos2)
                                @foreach ($pago2->detallesPagos2 as $detalle)
                                    <tr>
                                        <td>{{$detalle->adelanto}}</td>
                                        <td>{{$detalle->fecha_adelanto}}</td>
                                        <td>{{$detalle->detalle_adelanto}}</td>
                                        <td>
                                        <button class="btn btn-danger" onclick="eliminarDetalle({{ $detalle->id }})">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No hay detalles disponibles.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <!-- Formulario para agregar más detalles -->
                    <form action= "{{ route('agregar.detalle.pago2', $pago2->id_pagos2) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="adelanto">Monto del Adelanto:</label>
                            <input type="money" class="form-control" name="adelanto" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_adelanto">Fecha de Adelanto:</label>
                            <input type="date" class="form-control" name="fecha_adelanto" required>
                        </div>
                        <div class="form-group">
                            <label for="detalle_adelanto">Detalle:</label>
                            <input type="text" class="form-control" name="detalle_adelanto" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Detalle</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function eliminarDetalle(detalleId) {
    Swal.fire({
        title: '¿Estás seguro de eliminar esta cuota?',
        text: "Esta acción no se puede revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Realizar la solicitud DELETE usando Axios
            axios.delete(`/eliminar-detalle-pago2/${detalleId}`)
                .then(response => {
                    if (response.data.success) {
                        // Eliminación exitosa, mostrar mensaje de éxito
                        Swal.fire('Eliminado', 'La cuota ha sido eliminada correctamente', 'success').then(() => {
                            // Recargar la página o actualizar la vista si es necesario
                            location.reload();
                        });
                    } else {
                        // Mostrar mensaje de error si la eliminación no fue exitosa
                        Swal.fire('Error', 'Hubo un error al eliminar la cuota', 'error');
                    }
                })
                .catch(error => {
                    // Mostrar mensaje de error si hay un problema con la solicitud
                    console.error('Error al eliminar la cuota:', error);
                    Swal.fire('Error', 'Hubo un error al procesar la solicitud', 'error');
                });
        }
    });
}

</script>
<script>
    $(document).ready(function() {
        $('#pagos2').DataTable({
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
        $('#pagos2').on('click', '.btn-danger', function (e) {
            e.preventDefault();
            //AGREGADO
            //console.log('Botón de eliminar hace clic');
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