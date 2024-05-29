<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$cedula = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : '';

switch($opcion){
      
    case 3://baja
        $consulta = "DELETE FROM usuarios WHERE cedula='$cedula' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;