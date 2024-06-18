<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$Id_map = (isset($_POST['id_map'])) ? $_POST['id_map'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO tbl_vehiculos (placa, cedula, vehi_tipo, vehi_marca) VALUES('$idPlaca', '$idCedula', '$tipoVehiculo', '$marcaVehiculo')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM tbl_vehiculos ORDER BY placa DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll();
        echo json_encode($data);
        break;
    case 2: //modificación
        $consulta = "UPDATE tbl_vehiculos SET vehi_tipo='$tipoVehiculo', vehi_marca='$marcaVehiculo' WHERE placa='$idPlaca' AND cedula='$idCedula' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_vehiculos WHERE placa='$idPlaca'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;        
    case 3://baja
        $consulta = "DELETE FROM tb_mapeos WHERE id_map='$Id_map' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();     
        $data=$resultado->fetchAll();  
        echo json_encode($data);                    
        break;    
      
}

$conexion = NULL;