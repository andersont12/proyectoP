<?php
include('../../../app/config.php');
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
            $id_map_get = $_GET['id_map'];
            $query_mapeo = $link->prepare("SELECT * FROM tb_mapeos WHERE id_map = '$id_map_get' AND estado = '1' ");
            $query_mapeo->execute();
            $mapeos = $query_mapeo->fetchAll(PDO::FETCH_ASSOC);
            foreach($mapeos as $mapeo) {
                $id_map = $mapeo['id_map'];
                $nro_espacio = $mapeo['nro_espacio'];
            }
            ?>

            <h2>Eliminación del Usuario</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-danger" style="border: 1px solid #777777">
                            <div class="card-header">
                                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" value="<?php echo $nombres;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $email;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>" disabled>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" id="btn_borrar">Borrar</button>
                                    <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
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
    <!-- /.content-wrapper -->
   
</div>

</body>
</html>


<script>
    $('#btn_borrar').click(function () {

        var id_user = '<?php echo $id_get = $_GET['id'];?>';

        var url = 'controller_delete.php';
        $.get(url,{id_user:id_user},function (datos) {
            $('#respuesta').html(datos);
        });

    });
</script>

