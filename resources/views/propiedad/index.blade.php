@extends('adminlte::page')

@section('title', 'ESTUDIO ATC')

@section('content_header')
@stop

@section('content')
<br>
<a href="propiedades/create" class="btn btn-success">
    <i class="fas fa-fw fa-file"></i> AGREGAR CASO
</a>
<hr>
<table id="propiedades" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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
            <th scope="col">DRIVE</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($propiedades as $propiedad)
        @if($propiedad->area->id_area == 1)
            <tr>
                <td>{{$propiedad->id_expediente}}</td>
                <td>{{$propiedad->user->name}}</td>
                <td>{{$propiedad->cliente}}</td>
                <td>{{$propiedad->area->nombre_area}}</td>
                <td>{{$propiedad->acto}}</td>
                <td>{{$propiedad->otros}}</td>
                <td>{{$propiedad->fecha_ingreso}}</td>
                <td>{{$propiedad->fecha_fin}}</td>
                <td><i class="fab fa-google-drive"></i> <a href="https://drive.google.com/drive/folders/1feEux2M-DDGCVmmronGbBqPYsaAMoNIe?usp=drive_link" target="_blank">Drive</a></td>
                <td>
                    <form action="{{ route('propiedades.destroy', $propiedad->id_expediente) }}" method="POST" style="display: inline">
                        <a href="/propiedades/{{ $propiedad->id_expediente }}/edit" class="btn btn-info">
                            <i class="fas fa-search"></i>
                        </a>
                        <a href="/propiedades/{{ $propiedad->id_expediente }}/edit" class="btn btn-primary">
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
        $('#propiedades').DataTable({
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
            "pageLength": 5, // Mostrar solo 5 registros por página
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
        });

        // Agregar confirmación antes de eliminar la incidencia
        $('#propiedades').on('click', '.btn-danger', function (e) {
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
         // Agregar colores a las filas según las fechas
        $('#propiedades tbody tr').each(function() {
            var fechaIngreso = $(this).find('td:eq(6)').text(); // Índice 6 es la columna de fecha de ingreso
            var fechaIngresoMoment = moment(fechaIngreso, 'DD-MM-YYYY');
            var hoy = moment();
            
            // Calcular la diferencia en días
            var diasDiferencia = hoy.diff(fechaIngresoMoment, 'days');

            // Aplicar estilos según la diferencia en días
            if (diasDiferencia >= 7) {
                $(this).css('background-color', '#FADBD8'); // Rojo pastel
            } else if (diasDiferencia >= 5) {
                $(this).css('background-color', '#FDEBD0'); // Naranja pastel
            } else if (diasDiferencia <= 2) {
                $(this).css('background-color', '#D5F5E3'); // Verde pastel
            }
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