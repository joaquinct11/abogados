@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')
<br>
<a href="juridicas_naturales/create" class="btn btn-success">
    <i class="fas fa-fw fa-file"></i> AGREGAR CASO
</a>
<hr>
<table id="juridicas_naturales" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">ABOGADO</th>
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
    @foreach ($juridicas_naturales as $juridica_natural)
        @if($juridica_natural->area->id_area == 3)
            <tr>
                <td>{{$juridica_natural->numero_expediente}}</td>
                <td>{{$juridica_natural->user->name}}</td>
                <td>{{$juridica_natural->cliente}}</td>
                <td>{{$juridica_natural->area->nombre_area}}</td>
                <td>{{$juridica_natural->acto}}</td>
                <td>{{$juridica_natural->otros}}</td>
                <td>{{$juridica_natural->fecha_ingreso}}</td>
                <td>{{$juridica_natural->fecha_fin}}</td>
                <td>{{$juridica_natural->created_at}}</td>
                <td><i class="fab fa-google-drive"></i> <a href="https://drive.google.com/drive/folders/1feEux2M-DDGCVmmronGbBqPYsaAMoNIe?usp=drive_link" target="_blank">Drive</a></td>
                <td>
                    <form action="{{ route('juridicas_naturales.destroy', $juridica_natural->id) }}" method="POST" style="display: inline">
                        <a href="/juridicas_naturales/{{ $juridica_natural->id }}/edit" class="btn btn-info">
                            <i class="fas fa-search"></i>
                        </a>
                        <a href="/juridicas_naturales/{{ $juridica_natural->id }}/edit" class="btn btn-primary">
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
        @endif
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
<script>
    $(document).ready(function() {
        $('#juridicas_naturales').DataTable({
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
        "order":[[8,'desc']],
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
                    "targets": [6, 7], // Indica las columnas que contienen fechas (empezando desde 0)
                    "render": function (data, type, row) {
                        // Utiliza moment.js para formatear la fecha
                        return moment(data).format('DD-MM-YYYY');
                    }
                }
            ],
            "drawCallback": function (settings) {
                // Aplicar colores a las filas después de cada dibujo de la tabla
                $('#juridicas_naturales tbody tr').each(function () {
                    var fechaIngreso = $(this).find('td:eq(6)').text();
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
        $('#juridicas_naturales').on('click', '.btn-danger', function (e) {
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
@stop