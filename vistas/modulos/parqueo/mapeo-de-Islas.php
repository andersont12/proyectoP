<?php
require_once("app/config.php");

$perfil=$_SESSION['perfil'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Listado de vehiculos visitantes en el cuviculo</h2>

            <br>

            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable( {
                        "pageLength": 5,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Espacios",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Espacios",
                            "infoFiltered": "(Filtrado de _MAX_ total Espacios)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Espacios",
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
                } );
            </script>

            <?php
            if ($perfil == 'Administrador'){
                echo '<button class="btn btn-primary" id="btn_registrar">Registrar nuevo cuviculo</button>';
            }
            ?>
            <script>
                $(document).ready(function() {
                    $('#btn_registrar').click(function (event) {
                        // Evitar el envío del formulario
                        event.preventDefault();
                        
                        var url = 'vistas/modulos/parqueo/controller_create.php';
                        
                        $.get(url)
                        .done(function(datos) {
                            $('#respuesta').html(datos);
                            if (datos.includes("Registro satisfactorio")) {
                                // Redirigir al usuario si el registro es exitoso
                                window.location.href = "principal"; // Asegúrate de que esta URL sea correcta
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            alert('Error en la solicitud: ' + textStatus);
                        });
                    });
                });
            </script>

            <hr>
            

            <div class="row">
                <div class="col-md-10">
                    <table id="table_id" class="table table-bordered table-sm table-striped">
                       <thead>
                       <th><center>ID</center></th>
                       <th><center>Nro de cuviculo</center></th>
                       <th><center>Placa</center></th>
                       <th><center>Fecha de entrada</center></th>
                       <th><center>Hora de entrada</center></th>
                       <th><center>Fecha de salida</center></th>
                       <th><center>Hora de salida</center></th>
                       <th><center>Duración</center></th>
                       
                       
                       
                       </thead>
                        <tbody>
                        <?php
                        $contador = 0;
                        $query_mapeos = $link->prepare("SELECT t.placa_auto, t.cuviculo, t.fecha_ingreso, t.hora_ingreso,
                                                    (SELECT MAX(f.fecha_salida) FROM tb_facturaciones f WHERE f.cuviculo = t.cuviculo) AS fecha_salida,
                                                    (SELECT MAX(f.hora_salida) FROM tb_facturaciones f WHERE f.cuviculo = t.cuviculo) AS hora_salida,
                                                    (SELECT MAX(f.tiempo) FROM tb_facturaciones f WHERE f.cuviculo = t.cuviculo) AS tiempo
                                                FROM tb_tickets t
                                                WHERE t.estado = '1';");
                        $query_mapeos->execute();
                        $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                        foreach($mapeos as $mapeo){
                            $cuviculo = $mapeo['cuviculo'];
                            $placa_auto = $mapeo['placa_auto'];
                            $fecha_ingreso = $mapeo['fecha_ingreso'];
                            $hora_ingreso = $mapeo['hora_ingreso'];
                            $fecha_salida = $mapeo['fecha_salida'];
                            $hora_salida = $mapeo['hora_salida'];
                            $tiempo = $mapeo['tiempo'];
                            $contador = $contador + 1;
                            ?>
                            <tr>
                                <td><center><?php echo $contador;?></center></td>
                                <td><center><?php echo $cuviculo ;?></center></td>
                                <td><center><?php echo $placa_auto;?></center></td>
                                <td><center><?php echo $fecha_ingreso;?></center></td>
                                <td><center><?php echo $hora_ingreso;?></center></td>
                                <td><center><?php echo $fecha_salida;?></center></td>
                                <td><center><?php echo $hora_salida;?></center></td>
                                <td><center><?php echo $tiempo;?></center></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <hr>
            
            <a href="vistas\modulos\parqueo\generar-reporte.php" class="btn btn-primary">Generar reporte
                <i class="fa fa"></i>
            </a>

        </div>

    </div>
    <!-- /.content-wrapper -->
  
</div>

</body>
</html>

