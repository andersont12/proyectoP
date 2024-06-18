<?php
require_once("../../../app/config.php");
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


            <?php
                        $id_get = $_GET['id_map'];
                        $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE id_map = '$id_get' AND estado = '1' ");
                        $query_mapeos->execute();
                        $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                        foreach($mapeos as $mapeo){
                            $id_map = $mapeo['id_map'];
                            $nro_espacio = $mapeo['nro_espacio'];
                        }
            ?>

            <h2>Eliminación de isla</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-danger" style="border: 1px solid #777777">
                            <div class="card-header">
                                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">nro</label>
                                    <input type="text" class="form-control" id="id_map" value="<?php echo $id_map;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">nro espacio</label>
                                    <input type="text" class="form-control" id="nro_espacio" value="<?php echo $nro_espacio;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" id="btn_borrar">Borrar</button>
                                    <a href="<?php echo $URL;?>/mapeo-de-vehiculos" class="btn btn-default">Cancelar</a>
                                </div>
                                <div id="respuesta">

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>


<script>
    $('#btn_borrar').click(function () {

        alert("Botón clickeado");

        var ID_map = '<?php echo $id_get = $_GET['id_map'];?>';

        var url = 'controller_delete.php';
        $.get(url,{ID_map:ID_map},function (datos) {
            $('#respuesta').html(datos);
        });

    });
</script>
