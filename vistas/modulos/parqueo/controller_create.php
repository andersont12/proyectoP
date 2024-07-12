<?php

include('../../../app/config.php');

$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

//echo $nro_espacio."-".$estado_espacio."-".$obs;

date_default_timezone_set("America/bogota");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $link->prepare("INSERT INTO tb_mapeos 
        (nro_espacio, estado_espacio, obs, fyh_creacion, estado) 
VALUES (:nro_espacio,:estado_espacio,:obs,:fyh_creacion,:estado)");

$sentencia->bindParam('nro_espacio',$nro_espacio);
$sentencia->bindParam('estado_espacio',$estado_espacio);
$sentencia->bindParam('obs',$obs);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "mapeo-de-Islas";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}
