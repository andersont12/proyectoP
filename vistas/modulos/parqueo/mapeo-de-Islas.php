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

            <h2>Listado de islas</h2>

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
                echo '<button class="btn btn-primary" id="btn_registrar">Registrar nueva isla</button>';
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
                       <th><center>Nro de isla</center></th>
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
                        $query_mapeos = $link->prepare("SELECT m.*, t.placa_auto, t.cuviculo, f.fecha_ingreso, f.hora_ingreso, f.fecha_salida, f.hora_salida, f.tiempo
                                                        FROM tb_mapeos m
                                                        JOIN tb_tickets t ON m.id_map = t.cuviculo
                                                        JOIN tb_facturaciones f ON t.cuviculo = f.id_facturacion
                                                        WHERE m.estado = '1' ");
                        $query_mapeos->execute();
                        $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                        foreach($mapeos as $mapeo){
                            $id_map = $mapeo['id_map'];
                            $nro_espacio = $mapeo['nro_espacio'];
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
                                <td><center><?php echo $nro_espacio;?></center></td>
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
                <i class="fa fa">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                        <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                </i>
            </a>

        </div>

    </div>
    <!-- /.content-wrapper -->
  
</div>

</body>
</html>

