<?php

class controller_create{

    static public function ctrCrearIslas($item, $valor){

$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

    }

//echo $nro_espacio."-".$estado_espacio."-".$obs;

static public function ctrFechasIslas($item, $valor){

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

}

static public function ctrIngresoIslas($item, $valor){

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
    //header('index.html');
    ?>
    <script>location.href = "mapeo-de-vehiculos.php";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}

}
}
