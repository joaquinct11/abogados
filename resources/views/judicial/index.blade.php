@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')

<br>
@can('Admin')
<a href="judiciales/create" class="btn btn-success">
    <i class="fas fa-fw fa-file"></i> AGREGAR CASO
</a>

@endcan
@can('Secretaria')
<a href="judiciales/create" class="btn btn-success">
    <i class="fas fa-fw fa-file"></i> AGREGAR CASO
</a>
@endcan

@can('Asistente_Secretaria')
<a href="judiciales/create" class="btn btn-success">
    <i class="fas fa-fw fa-file"></i> AGREGAR CASO
</a>
@endcan
<hr>
<table id="judiciales" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">ABOGADO</th>
            <th scope="col">N° EXPEDIENTE</th>
            <th scope="col">CLIENTE</th>
            <th scope="col">AREA</th>
            <th scope="col">ACTO</th>
            <th scope="col">OTROS</th>
            <th scope="col">FECHA INGRESO</th>
            <th scope="col">FECHA FIN</th>
            <th scope="col">FECHA CREACION</th>
            <th scope="col">DRIVE</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($judiciales as $judicial)
        @if($judicial->area->id_area ==2)
            <tr>
                <td>{{$judicial->numero_expediente}}</td>
                <td>{{$judicial->user->name}}</td>
                <td>{{$judicial->nro_expediente}}</td>
                <td>{{$judicial->cliente}}</td>
                <td>{{$judicial->area->nombre_area}}</td>
                <td>{{$judicial->acto}}</td>
                <td>{{$judicial->otros}}</td>
                <td>{{$judicial->fecha_ingreso}}</td>
                <td>{{$judicial->fecha_fin}}</td>
                <td>{{$judicial->created_at}}</td>
                <td><i class="fab fa-google-drive"></i> <a href="https://drive.google.com/drive/folders/1l-DTMOVYsNR29e6GDMUS4x7UKraBm2QD?usp=drive_link" target="_blank">Drive</a></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleModal{{$judicial->numero_expediente}}">
                    <i class="fas fa-search"></i>
                    </button>
                    @can('Admin')
                    <form action="{{ route('judiciales.destroy', $judicial->id) }}" method="POST" style="display: inline">
                        <a href="/judiciales/{{ $judicial->id }}/edit" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        @endcan
                        @can('Admin')
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
<!-- Modal -->
@foreach ($judiciales as $judicial)
    <div class="modal fade" id="detalleModal{{$judicial->numero_expediente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Expediente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <p>ID del Expediente: {{$judicial->numero_expediente}} </p>

                    <!-- Tabla para detalles adicionales -->
                    <table class="table table-bordered table-detalles">
                        <thead>
                            <tr>
                                <th>Sub Acto</th>
                                <th>Ubicación</th>
                                <th>Intervinientes</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th> 
                                @can('Admin')
                                <th>Opciones</th>
                                @endcan
                            </tr>   
                        </thead>
                        <tbody>
                            @if ($judicial->detallesPagos1)
                                @foreach ($judicial->detallesPagos1 as $detalle)
                                    <tr>
                                        <td>{{$detalle->subacto}}</td>
                                        <td>{{$detalle->ubicacion}}</td>
                                        <td>{{$detalle->intervinientes}}</td>
                                        <td>{{$detalle->created_at}}</td>
                                        <td>{{$detalle->fecha_fin}}</td>
                                        @can('Admin')
                                        <td>
                                        <button class="btn btn-danger" onclick="eliminarDetalle({{ $detalle->id }})">Eliminar</button>
                                        </td>
                                        @endcan

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No hay detalles disponibles.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <!-- Formulario para agregar más detalles -->
                    <form action="{{ route('agregar.detalle.subacto1', $judicial->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subacto">Sub Acto:</label>
                            <input type="money" class="form-control" name="subacto" required>
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicación:</label>
                            <input type="text" class="form-control" name="ubicacion" required>
                        </div>
                        <div class="form-group">
                            <label for="intervinientes">Intervinientes:</label>
                            <input type="text" class="form-control" name="intervinientes" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Fecha Inicio:</label>
                            <input type="date" class="form-control" name="created_at" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin">Fecha Fin:</label>
                            <input type="date" class="form-control" name="fecha_fin" required>
                        </div>
                        <input type="hidden" name="numero_expediente" value="{{ $judicial->numero_expediente }}">
                        <!-- Añade un campo oculto con el número de expediente -->
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function eliminarDetalle(detalleId) {
        // Utilizar SweetAlert2 para la confirmación
        Swal.fire({
            title: '¿Estás seguro de eliminar este subacto?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud DELETE usando Axios
                axios.delete(`/eliminar-detalle-subacto1/${detalleId}`)
                    .then(response => {
                        if (response.data.success) {
                            // Eliminación exitosa, mostrar mensaje de éxito
                            Swal.fire('Eliminado', 'La cuota ha sido eliminado correctamente', 'success').then(() => {
                                // Recargar la página o actualizar la vista si es necesario
                                location.reload();
                            });
                        } else {
                            // Mostrar mensaje de error si la eliminación no fue exitosa
                            Swal.fire('Error', 'Hubo un error al eliminar el subacto', 'error');
                        }
                    })
                    .catch(error => {
                        // Mostrar mensaje de error si hay un problema con la solicitud
                        console.error('Error al eliminar el subacto:', error);
                        Swal.fire('Error', 'Hubo un error al procesar la solicitud', 'error');
                    });
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#judiciales').DataTable({
            
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] // Especifica las columnas a exportar
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] // Especifica las columnas a exportar
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] // Especifica las columnas a exportar
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] // Especifica las columnas a exportar
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7] // Especifica las columnas a exportar
                    }
                }
            ],
        "pageLength": 10,
        "order":[[9,'desc']],
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
            },
            "columnDefs": [
                {
                    "type": "date",
                    "targets": [7, 8], // Indica las columnas que contienen fechas (empezando desde 0)
                    "render": function (data, type, row) {
                        // Utiliza moment.js para formatear la fecha
                        return moment(data).format('DD-MM-YYYY');
                    }
                }
            ],
            "drawCallback": function (settings) {
                // Aplicar colores a las filas después de cada dibujo de la tabla
                $('#judiciales tbody tr').each(function () {
                    var fechaIngreso = $(this).find('td:eq(7)').text();
                    var fechaIngresoMoment = moment(fechaIngreso, 'DD-MM-YYYY');
                    var hoy = moment();

                    var diasDiferencia = hoy.diff(fechaIngresoMoment, 'days');

                    if (diasDiferencia >= 5) {
                        $(this).css('background-color', '#FADBD8');
                    } else if (diasDiferencia >= 3) {
                        $(this).css('background-color', '#FDEBD0');
                    } else if (diasDiferencia <= 2) {
                        $(this).css('background-color', '#D5F5E3');
                    }
                });
            }
        });

        // Agregar confirmación antes de eliminar la incidencia
        $('#judiciales').on('click', '.btn-danger', function (e) {
            e.preventDefault();
            var form = this.form;
            Swal.fire({
                title: '¿Estás seguro de eliminar este caso?',
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
<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Función para mostrar los detalles del caso en el modal
            window.mostrarDetallesCaso = function(cliente, area, acto) {
                // Actualiza el contenido del modal con los detalles específicos del caso
                document.getElementById('clienteDetalle').innerText = cliente;
                document.getElementById('areaDetalle').innerText = area;
                document.getElementById('actoDetalle').innerText = acto;
                // Puedes agregar más actualizaciones según sea necesario

                // Muestra el modal
                var myModal = new bootstrap.Modal(document.getElementById('detalleCasoModal'));
                myModal.show();
            }
        });
    </script>
    <script>
   $(document).ready(function() {
    // Configuración de DataTables para la tabla dentro del modal
    var tableDetalles = $('.table-detalles').DataTable({
        "pageLength": 2,
        "searching": false,
        "lengthChange": false,
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
        },
            "columnDefs": [
                {
                    "type": "date",
                    "targets": [3, 4], // Indica las columnas que contienen fechas (empezando desde 0)
                    "render": function (data, type, row) {
                        // Utiliza moment.js para formatear la fecha
                        return moment(data).format('DD-MM-YYYY');
                    }
                }
            ],
            "drawCallback": function (settings) {
                    console.log('drawCallback ejecutado'); // Agrega esto para verificar si se ejecuta correctamente

                    // Aplicar colores a las filas después de cada dibujo de la tabla
                    $('.table-detalles tbody tr').each(function () {
                        var fechaInicio = $(this).find('td:eq(3)').text();
                        var fechaIngresoMoment = moment(fechaInicio, 'DD-MM-YYYY');
                        var hoy = moment();

                        var diasDiferencia = hoy.diff(fechaIngresoMoment, 'days');

                        console.log('Días de diferencia:', diasDiferencia); // Agrega esto para verificar los días de diferencia

                        if (diasDiferencia >= 5) {
                            $(this).css('background-color', '#FADBD8');
                        } else if (diasDiferencia >= 3) {
                            $(this).css('background-color', '#FDEBD0');
                        } else if (diasDiferencia <= 2) {
                            $(this).css('background-color', '#D5F5E3');
                        }
                    });
                }

    });

    // Resto de tu código...
});
</script>
@stop