<?php
include('app/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Asegúrate de incluir los estilos y scripts necesarios para Bootstrap y jQuery -->
  
   
    
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <br>
        <div class="container">
            <h2>Listado de precios</h2>
            <br>
            <a href="crearPrecio" class="btn btn-primary">Registrar nuevo</a> <br><br>
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Precios establecidos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#table_id').DataTable( {
                                    "pageLength": 5,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Precios",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Precios",
                                        "infoFiltered": "(Filtrado de _MAX_ total Precios)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Precios",
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    }
                                });

                                // Manejo del clic en el botón Editar
                                $(document).on('click', '.btn-edit', function(event) {
                                    event.preventDefault();
                                    var id_precio = $(this).data('id');
                                    $('#modalEdit').modal('show');

                                    // Puedes hacer una petición AJAX para cargar los datos del precio
                                    $.ajax({
                                        url: 'vistas/modulos/precios/get_precio.php',
                                        type: 'GET',
                                        data: { id_precio: id_precio },
                                        success: function(data) {
                                            // Asume que 'data' es un objeto JSON con la información del precio
                                            $('#editCantidad').val(data.cantidad);
                                            $('#editDetalle').val(data.detalle);
                                            $('#editPrecio').val(data.precio);
                                            $('#editId').val(data.id_precio);
                                        }
                                    });
                                });
                            });
                        </script>
                        <div class="card-body" style="display: block;">
                            <table id="table_id" class="table table-bordered table-sm table-striped">
                                <thead>
                                    <th><center>Nro</center></th>
                                    <th>Cantidad</th>
                                    <th>Detalle</th>
                                    <th>Precio</th>
                                    <th><center>Acción</center></th>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_precio = 0;
                                    $query_precios = $link->prepare("SELECT * FROM tb_precios WHERE estado = '1'");
                                    $query_precios->execute();
                                    $datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($datos_precios as $datos_precio){
                                        $contador_precio++;
                                        $id_precio = $datos_precio['id_precio'];
                                        $cantidad = $datos_precio['cantidad'];
                                        $detalle = $datos_precio['detalle'];
                                        $precio = $datos_precio['precio'];
                                    ?>
                                    <tr>
                                        <td><center><?php echo $contador_precio;?></center></td>
                                        <td><center><?php echo $cantidad;?></center></td>
                                        <td><center><?php echo $detalle;?></center></td>
                                        <td><center><?php echo $precio;?></center></td>
                                        <td>
                                            <center>
                                                <a href="#" data-id="<?php echo $id_precio; ?>" class="btn btn-success btn-edit">Editar</a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <a href="vistas/modulos/precios/generar-reporte.php" class="btn btn-primary">Generar reporte <i class="fa fa"></i></a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar Precio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="POST" action="vistas\modulos\precios\controller_update.php">
                    <input type="hidden" id="editId" name="id_precio">
                    <div class="form-group">
                        <label for="editCantidad">Cantidad</label>
                        <input type="text" class="form-control" id="editCantidad" name="cantidad">
                    </div>
                    <div class="form-group">
                        <label for="editDetalle">Detalle</label>
                        <input type="text" class="form-control" id="editDetalle" name="detalle">
                    </div>
                    <div class="form-group">
                        <label for="editPrecio">Precio</label>
                        <input type="text" class="form-control" id="editPrecio" name="precio">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>


