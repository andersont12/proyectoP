<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';
$tipoVehiculo = (isset($_POST['tipoVehiculo'])) ? $_POST['tipoVehiculo'] : '';
$marcaVehiculo = (isset($_POST['marcaVehiculo'])) ? $_POST['marcaVehiculo'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idPlaca = (isset($_POST['idPlaca'])) ? $_POST['idPlaca'] : '';
$idCedula = (isset($_POST['idCedula'])) ? $_POST['idCedula'] : '';

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
        $consulta = "DELETE FROM tbl_vehiculos WHERE placa='$idPlaca' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();     
        $data=$resultado->fetchAll();  
        echo json_encode($data);                    
        break;    
    case 4: //modificación
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d');
	    $hora = date('H:i:s');
        $fechaActual = $fecha.' '.$hora;
        $consulta = "UPDATE tbl_vehiculos SET ultimo_ingreso='$fechaActual' WHERE placa='$idPlaca' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_vehiculos WHERE placa='$idPlaca'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;
    case 5: //modificación
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $fechaActual = $fecha.' '.$hora;
        $consulta = "UPDATE tbl_vehiculos SET ultima_salida='$fechaActual' WHERE placa='$idPlaca' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM tbl_vehiculos WHERE placa='$idPlaca'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
        break;  
      
}

$conexion = NULL;
