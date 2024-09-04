<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idIsla = (isset($_POST['idIsla'])) ? $_POST['idIsla'] : '';


switch($opcion){    
    case 1://baja
        $consulta = "DELETE FROM tb_mapeos WHERE id_map='$idIsla' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();     
        $data=$resultado->fetchAll();  
        echo json_encode($data);                    
        break;    
      
}

$conexion = NULL;